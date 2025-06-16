<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <div class="text-sm text-gray-600 dark:text-gray-400">
                {{ now()->format('d/m/Y H:i') }}
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Saudação personalizada -->
            <div class="bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg shadow-sm overflow-hidden">
                <div class="px-6 py-4 text-white">
                    <h3 class="text-lg font-semibold">
                        Olá, {{ Auth::user()->name }}! 👋
                    </h3>
                    <p class="text-blue-100 mt-1">
                        Bem-vindo ao painel de controle da sua loja virtual
                    </p>
                </div>
            </div>

            <!-- Cards de estatísticas principais -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                
                <!-- Total de Produtos -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-blue-500">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4 flex-1">
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total de Produtos</p>
                                <p class="text-2xl font-semibold text-gray-900 dark:text-gray-100">{{ \App\Models\Product::count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Produtos em Estoque -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-green-500">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 bg-green-100 dark:bg-green-900 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4 flex-1">
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Em Estoque</p>
                                <p class="text-2xl font-semibold text-gray-900 dark:text-gray-100">{{ \App\Models\Product::where('quantity', '>', 0)->count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total de Tipos -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-yellow-500">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 bg-yellow-100 dark:bg-yellow-900 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4 flex-1">
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Categorias</p>
                                <p class="text-2xl font-semibold text-gray-900 dark:text-gray-100">{{ \App\Models\Type::count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total de Fornecedores -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-purple-500">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 bg-purple-100 dark:bg-purple-900 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4 flex-1">
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Fornecedores</p>
                                <p class="text-2xl font-semibold text-gray-900 dark:text-gray-100">{{ \App\Models\Supplier::count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Seção de ações rápidas -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                
                <!-- Ações Rápidas -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Ações Rápidas</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <a href="{{ route('products.create') }}" class="flex items-center p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg hover:bg-blue-100 dark:hover:bg-blue-900/30 transition-colors">
                                <svg class="w-8 h-8 text-blue-600 dark:text-blue-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                <div>
                                    <p class="font-medium text-gray-900 dark:text-gray-100">Novo Produto</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Adicionar produto</p>
                                </div>
                            </a>
                            
                            <a href="{{ route('suppliers.create') }}" class="flex items-center p-4 bg-purple-50 dark:bg-purple-900/20 rounded-lg hover:bg-purple-100 dark:hover:bg-purple-900/30 transition-colors">
                                <svg class="w-8 h-8 text-purple-600 dark:text-purple-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                                </svg>
                                <div>
                                    <p class="font-medium text-gray-900 dark:text-gray-100">Novo Fornecedor</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Cadastrar fornecedor</p>
                                </div>
                            </a>
                            
                            <a href="{{ route('types.create') }}" class="flex items-center p-4 bg-yellow-50 dark:bg-yellow-900/20 rounded-lg hover:bg-yellow-100 dark:hover:bg-yellow-900/30 transition-colors">
                                <svg class="w-8 h-8 text-yellow-600 dark:text-yellow-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                                <div>
                                    <p class="font-medium text-gray-900 dark:text-gray-100">Nova Categoria</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Criar tipo</p>
                                </div>
                            </a>
                            
                            <a href="{{ route('shop.index') }}" class="flex items-center p-4 bg-green-50 dark:bg-green-900/20 rounded-lg hover:bg-green-100 dark:hover:bg-green-900/30 transition-colors">
                                <svg class="w-8 h-8 text-green-600 dark:text-green-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                </svg>
                                <div>
                                    <p class="font-medium text-gray-900 dark:text-gray-100">Ver Loja</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Acessar loja</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Produtos com Estoque Baixo -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Estoque Baixo</h3>
                            <span class="text-xs bg-red-100 text-red-800 px-2 py-1 rounded-full">Atenção</span>
                        </div>
                        
                        @php
                            $lowStockProducts = \App\Models\Product::where('quantity', '<=', 10)->where('quantity', '>', 0)->take(5)->get();
                        @endphp
                        
                        @if($lowStockProducts->count() > 0)
                            <div class="space-y-3">
                                @foreach($lowStockProducts as $product)
                                    <div class="flex items-center justify-between p-3 bg-red-50 dark:bg-red-900/20 rounded-lg">
                                        <div class="flex-1">
                                            <p class="font-medium text-gray-900 dark:text-gray-100">{{ $product->name }}</p>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ $product->type->name ?? 'Sem categoria' }}</p>
                                        </div>
                                        <div class="text-right">
                                            <span class="text-lg font-bold text-red-600 dark:text-red-400">{{ $product->quantity }}</span>
                                            <p class="text-xs text-gray-500">unidades</p>
                                        </div>
                                    </div>
                                @endforeach
                                <a href="{{ route('products.index') }}" class="block text-center text-sm text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                                    Ver todos os produtos →
                                </a>
                            </div>
                        @else
                            <div class="text-center py-8">
                                <svg class="mx-auto h-12 w-12 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Todos os produtos com estoque adequado</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Últimas atividades e resumo por categoria -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                
                <!-- Produtos Recentes -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Produtos Recentes</h3>
                        
                        @php
                            $recentProducts = \App\Models\Product::latest()->take(5)->get();
                        @endphp
                        
                        @if($recentProducts->count() > 0)
                            <div class="space-y-3">
                                @foreach($recentProducts as $product)
                                    <div class="flex items-center p-3 border border-gray-200 dark:border-gray-700 rounded-lg">
                                        <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900 rounded-lg flex items-center justify-center mr-3">
                                            <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <p class="font-medium text-gray-900 dark:text-gray-100">{{ $product->name }}</p>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                                R$ {{ number_format($product->price, 2, ',', '.') }} | 
                                                {{ $product->quantity }} unidades
                                            </p>
                                        </div>
                                        <span class="text-xs text-gray-500">
                                            {{ $product->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2-2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                </svg>
                                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Nenhum produto cadastrado ainda</p>
                                <a href="{{ route('products.create') }}" class="mt-2 text-sm text-blue-600 hover:text-blue-800">
                                    Cadastrar primeiro produto →
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Resumo por Categoria -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Produtos por Categoria</h3>
                        
                        @php
                            $typeStats = \App\Models\Type::withCount('products')->get();
                        @endphp
                        
                        @if($typeStats->count() > 0)
                            <div class="space-y-3">
                                @foreach($typeStats as $type)
                                    <div class="flex items-center justify-between p-3 border border-gray-200 dark:border-gray-700 rounded-lg">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-purple-100 dark:bg-purple-900 rounded-lg flex items-center justify-center mr-3">
                                                <svg class="w-4 h-4 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                                </svg>
                                            </div>
                                            <span class="font-medium text-gray-900 dark:text-gray-100">{{ $type->name }}</span>
                                        </div>
                                        <span class="text-lg font-bold text-gray-900 dark:text-gray-100">{{ $type->products_count }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Nenhuma categoria cadastrada</p>
                                <a href="{{ route('types.create') }}" class="mt-2 text-sm text-blue-600 hover:text-blue-800">
                                    Criar primeira categoria →
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Links úteis -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Acesso Rápido</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <a href="{{ route('products.index') }}" class="text-center p-4 rounded-lg border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <svg class="mx-auto w-8 h-8 text-blue-600 dark:text-blue-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                            <p class="text-sm font-medium text-gray-900 dark:text-gray-100">Produtos</p>
                        </a>
                        <a href="{{ route('types.index') }}" class="text-center p-4 rounded-lg border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <svg class="mx-auto w-8 h-8 text-yellow-600 dark:text-yellow-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                            <p class="text-sm font-medium text-gray-900 dark:text-gray-100">Categorias</p>
                        </a>
                        <a href="{{ route('suppliers.index') }}" class="text-center p-4 rounded-lg border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <svg class="mx-auto w-8 h-8 text-purple-600 dark:text-purple-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                            <p class="text-sm font-medium text-gray-900 dark:text-gray-100">Fornecedores</p>
                        </a>
                        <a href="{{ route('shop.index') }}" class="text-center p-4 rounded-lg border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <svg class="mx-auto w-8 h-8 text-green-600 dark:text-green-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                            <p class="text-sm font-medium text-gray-900 dark:text-gray-100">Loja</p>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>