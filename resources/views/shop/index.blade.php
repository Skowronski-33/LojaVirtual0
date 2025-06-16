@extends('layouts.shop')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 text-center">
        <h1 class="text-4xl md:text-6xl font-bold mb-4">
            Bem-vindo à Nossa Loja
        </h1>
        <p class="text-xl md:text-2xl mb-8 opacity-90">
            Encontre os melhores produtos com os melhores preços
        </p>
        @guest
        <div class="space-x-4">
            <a href="{{ route('login') }}" class="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-200">
                Fazer Login
            </a>
            <a href="{{ route('register') }}" class="border-2 border-white text-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition duration-200">
                Criar Conta
            </a>
        </div>
        @endguest
    </div>
</div>

<!-- Filtros e Busca -->
<div class="bg-white dark:bg-gray-800 shadow-sm border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <form method="GET" action="{{ route('shop.index') }}" class="flex flex-wrap gap-4 items-end">

            <!-- Busca por nome -->
            <div class="flex-1 min-w-64">
                <label for="search" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                    Buscar produtos
                </label>
                <input type="text"
                    id="search"
                    name="search"
                    value="{{ $search }}"
                    placeholder="Digite o nome do produto..."
                    class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-300">
            </div>

            <!-- Filtro por tipo -->
            <div class="min-w-48">
                <label for="type_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                    Categoria
                </label>
                <select id="type_id"
                    name="type_id"
                    class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-300">
                    <option value="">Todas as categorias</option>
                    @foreach($types as $type)
                    <option value="{{ $type->id }}" {{ $selectedType == $type->id ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <!-- Botões -->
            <div class="flex gap-2">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md font-medium transition duration-200">
                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    Buscar
                </button>
                <a href="{{ route('shop.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-md font-medium transition duration-200">
                    Limpar
                </a>
            </div>
        </form>
    </div>
</div>

<!-- Lista de Produtos -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <!-- Contador de produtos -->
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
            @if($selectedType)
            {{ $types->find($selectedType)->name ?? 'Categoria' }}
            @else
            Todos os Produtos
            @endif
            <span class="text-lg font-normal text-gray-600 dark:text-gray-400">
                ({{ $products->count() }} {{ $products->count() == 1 ? 'produto' : 'produtos' }})
            </span>
        </h2>
    </div>

    @if($products->count() > 0)
    <!-- Grid de produtos -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach($products as $product)
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden">

            <!-- Imagem do produto (placeholder) -->
            <div class="h-48 bg-gradient-to-br from-gray-200 to-gray-300 dark:from-gray-700 dark:to-gray-600 flex items-center justify-center">
                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
            </div>

            <!-- Informações do produto -->
            <div class="p-4">
                <!-- Categoria -->
                <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full mb-2">
                    {{ $product->type->name }}
                </span>

                <!-- Nome -->
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2 line-clamp-2">
                    {{ $product->name }}
                </h3>

                <!-- Descrição -->
                @if($product->description)
                <p class="text-gray-600 dark:text-gray-400 text-sm mb-3 line-clamp-3">
                    {{ Str::limit($product->description, 100) }}
                </p>
                @endif

                <!-- Preço e Estoque -->
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <span class="text-2xl font-bold text-green-600 dark:text-green-400">
                            R$ {{ number_format($product->price, 2, ',', '.') }}
                        </span>
                    </div>
                    <div class="text-right">
                        <span class="text-sm text-gray-500 dark:text-gray-400">
                            {{ $product->quantity }} em estoque
                        </span>
                    </div>
                </div>

                <!-- Botão de ação -->
                <div class="flex space-x-2">
                    <a href="{{ route('shop.product', $product->id) }}"
                        class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center py-2 px-4 rounded-md font-medium transition duration-200">
                        Ver Detalhes
                    </a>
                    @auth
                    <button class="bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-md font-medium transition duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m6 0a1 1 0 100-2 1 1 0 000 2zm-8 0a1 1 0 100-2 1 1 0 000 2z" />
                        </svg>
                    </button>
                    @endauth
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <!-- Estado vazio -->
    <div class="text-center py-16">
        <svg class="mx-auto h-24 w-24 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2-2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
        </svg>
        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-2">
            @if($search || $selectedType)
            Nenhum produto encontrado
            @else
            Nenhum produto disponível
            @endif
        </h3>
        <p class="text-gray-600 dark:text-gray-400 mb-6">
            @if($search || $selectedType)
            Tente ajustar seus filtros para ver mais produtos.
            @else
            Nossos produtos estão sendo preparados. Volte em breve!
            @endif
        </p>
        @if($search || $selectedType)
        <a href="{{ route('shop.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md font-medium transition duration-200">
            Ver Todos os Produtos
        </a>
        @endif
    </div>
    @endif
</div>
@endsection