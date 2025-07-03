<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Produtos &raquo; Criar
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ isset($produto) && $produto->id ? route('produtos.update', $produto->id) : route('produtos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($produto) && $produto->id)
                            @method('PUT')
                        @endif

                        <!-- Nome -->
                        <div>
                            <x-input-label class="mt-4" for="nome" :value="__('Nome')" />
                            <x-text-input id="nome" class="block mt-2" type="text" name="nome"
                                :value="old('nome') ?? ($produto->nome ?? '')" required autofocus autocomplete="nome" />
                            <x-input-error :messages="$errors->get('nome')" class="mt-2" />
                        </div>

                        <!-- Preço -->
                        <div>
                            <x-input-label class="mt-4" for="preco" :value="__('Preço')" />
                            <x-text-input id="preco" class="block mt-2" type="number" name="preco" step="0.01"
                                :value="old('preco') ?? ($produto->preco ?? '')" required autocomplete="preco" />
                            <x-input-error :messages="$errors->get('preco')" class="mt-2" />
                        </div>

                        <!-- Descrição -->
                        <div>
                            <x-input-label class="mt-4" for="descricao" :value="__('Descrição')" />
                            <x-textarea id="descricao" class="block" name="descricao" required autocomplete="descricao">
                                {{ old('descricao') ?? ($produto->descricao ?? '') }}
                            </x-textarea>
                            <x-input-error :messages="$errors->get('descricao')" class="mt-2" />
                        </div>

                        <!-- Imagem -->
                        <div class="px-6 py-4">
                            @if (!empty($produto?->imagem))
                                <h1 class="mt-4">Imagem Cadastrada:</h1>
                                <img src="{{ asset('storage/' . $produto->imagem) }}" alt="Imagem do produto" class="mt-2 w-48 h-48 object-cover rounded">
                            @endif

                            <h1 class="mt-4">Cadastre uma {{ !empty($produto?->imagem) ? 'nova' : '' }} imagem:</h1>
                            <div>
                                <x-input-label class="mt-4" for="imagem" :value="__('Imagem')" />
                                <input id="imagem" type="file" class="block mt-2" name="imagem" autocomplete="imagem" />
                                <x-input-error :messages="$errors->get('imagem')" class="mt-2" />
                            </div>
                        </div>

                        <x-primary-button class="mt-3">
                            Salvar Produto
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
