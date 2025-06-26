<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-link-button href="{{ route('carrinho.index') }}">
                        Carrinho
                    </x-link-button>


                    @if (count($produtos) > 0)


                    <div class="relative overflow-x-auto mt-6">

                        <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">

                            @foreach($produtos as $produto)

                            <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                                <div class="h-48 w-full flex items-center justify-center bg-gray-100 dark:bg-gray-700 overflow-hidden rounded">
                                    <a href="#">
                                        @if ($produto->imagem)
                                        <img src="{{ asset('storage/' . $produto->imagem) }}" alt="Imagem do produto" class="h-full w-full object-cover" />
                                        @else
                                        <img src="https://portal.crea-sc.org.br/wp-content/uploads/2017/11/imagem-indisponivel-para-produtos-sem-imagem_15_5.jpg" alt="Imagem não disponível" class="h-full w-full object-cover" />
                                        @endif
                                    </a>
                                </div>


                                <div class="pt-6">
                                    <!-- Benefícios -->
                                    <ul class="my-2 flex items-center gap-4">
                                        <li class="flex items-center gap-2">
                                            <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h6l2 4m-8-4v8m0-8V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v9h2m8 0H9m4 0h2m4 0h2v-4m0 0h-5m3.5 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm-10 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                                            </svg>
                                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Frete Rápido</p>
                                        </li>
                                        <li class="flex items-center gap-2">
                                            <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-width="2" d="M8 7V6c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1h-1M3 18v-7c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                            </svg>
                                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Melhor Preço</p>
                                        </li>
                                    </ul>

                                    <!-- Título -->
                                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white mt-4">
                                        {{ $produto->nome }}
                                    </h2>

                                    <!-- Descrição -->
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                                        {{ $produto->descricao }}
                                    </p>

                                    <!-- Preço e botão -->
                                    <div class="mt-4 flex items-center justify-between gap-4">
                                        <p class="text-2xl font-extrabold leading-tight text-gray-900 dark:text-white">R$ {{ $produto->preco }}</p>

                                        <a href="{{ route('carrinho.add', $produto->id) }}">
                                            <button type="button" class="inline-flex items-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                <svg class="-ms-2 me-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                                                </svg>
                                                Adicionar ao carrinho
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @else
                    <h1 class="mt-4">Nenhum Produto Cadastrado</h1>
                    @endif
                </div>
            </div>
        </div>
</x-app-layout>