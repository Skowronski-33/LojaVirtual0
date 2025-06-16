<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('type')
                       ->where('quantity', '>', 0) // Apenas produtos em estoque
                       ->orderBy('name', 'asc');

        // Filtro por tipo
        if ($request->has('type_id') && $request->type_id != '') {
            $query->where('type_id', $request->type_id);
        }

        // Filtro por busca
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->get();
        $types = Type::orderBy('name', 'asc')->get();

        return view('shop.index', [
            'products' => $products,
            'types' => $types,
            'selectedType' => $request->type_id,
            'search' => $request->search
        ]);
    }

    public function show($id)
    {
        $product = Product::with('type')->findOrFail($id);
        
        if ($product->quantity <= 0) {
            return redirect()->route('shop.index')
                           ->with('error', 'Produto indisponível no momento.');
        }

        return view('shop.product', compact('product'));
    }
}