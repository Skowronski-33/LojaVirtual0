@extends('layouts.shop')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <!-- Breadcrumb -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('shop.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                        </svg>
                        Loja
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">{{ $product->name }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Produto -->
        <div class="lg:grid lg:grid-cols-2 lg:gap-x-8 lg:items-start">
            
            <!-- Imagem do produto -->
            <div class="aspect-w-1 aspect-h-1 rounded-lg bg-gradient-to-br from-gray-200 to-gray-300 dark:from-gray-700 dark:to-gray-600 overflow-hidden">
                <div class="w-full h-96 flex items-center justify-center">
                    <svg class="w-32 h-32 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
            </div>

            <!-- Informações do produto -->
            <div class="mt-10 px-4 sm:px-0 sm:mt-16 lg:mt-0">
                
                <!-- Categoria -->
                <span class="inline-block bg-blue-100 text-blue-800 text-sm px-3 py-1 rounded-full mb-4">
                    {{ $product->type->name }}
                </span>

                <!-- Nome -->
                <h1 class="text-3xl font-extrabold tracking-tight text-gray-900 dark:text-gray-100">
                    {{ $product->name }}
                </h1>

                <!-- Preço -->
                <div class="mt-6">
                    <div class="flex items-center">
                        <span class="text-4xl font-bold text-green-600 dark:text-green-400">
                            R$ {{ number_format($product->price, 2, ',', '.') }}
                        </span>
                    </div>
                </div>

                <!-- Estoque -->
                <div class="mt-4">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-green-600 font-medium">
                            {{ $product->quantity }} {{ $product->quantity == 1 ? 'unidade disponível' : 'unidades disponíveis' }}
                        </span>
                    </div>
                </div>

                <!-- Descrição -->
                @if($product->description)
                    <div class="mt-6">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Descrição</h3>
                        <div class="mt-2 prose prose-sm text-gray-600 dark:text-gray-400">
                            {{ $product->description }}
                        </div>
                    </div>
                @endif

                <!-- Botões de ação -->
                <div class="mt-8 space-y-4">
                    @auth
                        <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 px-8 rounded-md font-medium text-lg transition duration-200">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m6 0a1 1 0 100-2 1 1 0 000 2zm-8 0a1 1 0 100-2 1 1 0 000 2z"/>
                            </svg>
                            Adicionar ao Carrinho
                        </button>
                        
                        <button class="w-full bg-green-600 hover:bg-green-700 text-white py-3 px-8 rounded-md font-medium text-lg transition duration-200">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                            Comprar Agora
                        </button>
                    @else
                        <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-md p-4">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-yellow-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                <div>
                                    <h4 class="text-sm font-medium text-yellow-800 dark:text-yellow-200">
                                        Faça login para comprar
                                    </h4>
                                    <p class="text-sm text-yellow-700 dark:text-yellow-300 mt-1">
                                        Você precisa estar logado para adicionar produtos ao carrinho.
                                    </p>
                                </div>
                            </div>
                            <div class="mt-4 flex space-x-3">
                                <a href="{{ route('login') }}" class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded-md text-sm font-medium transition duration-200">
                                    Fazer Login
                                </a>
                                <a href="{{ route('register') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-md text-sm font-medium transition duration-200">
                                    Criar Conta
                                </a>
                            </div>
                        </div>
                    @endauth
                </div>

                <!-- Informações adicionais -->
                <div class="mt-8 border-t border-gray-200 dark:border-gray-700 pt-8">
                    <div class="grid grid-cols-1 gap-6">
                        
                        <!-- Entrega -->
                        <div class="flex items-start">
                            <svg class="w-6 h-6 text-gray-400 mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h1.586a1 1 0 01.707.293l1.414 1.414a1 1 0 00.707.293H15a2 2 0 012 2v0M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                            </svg>
                            <div>
                                <h4 class="text-sm font-medium text-gray-900 dark:text-gray-100">Entrega Rápida</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Receba em até 3 dias úteis</p>
                            </div>
                        </div>

                        <!-- Garantia -->
                        <div class="flex items-start">
                            <svg class="w-6 h-6 text-gray-400 mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                            <div>
                                <h4 class="text-sm font-medium text-gray-900 dark:text-gray-100">Garantia</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-400">30 dias para troca ou devolução</p>
                            </div>
                        </div>

                        <!-- Suporte -->
                        <div class="flex items-start">
                            <svg class="w-6 h-6 text-gray-400 mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                            <div>
                                <h4 class="text-sm font-medium text-gray-900 dark:text-gray-100">Suporte</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Atendimento especializado</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Voltar para loja -->
                <div class="mt-8">
                    <a href="{{ route('shop.index') }}" class="text-blue-600 hover:text-blue-700 font-medium text-sm flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Voltar para a loja
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection