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
                    <form action="{{ $produto->id ? route('produtos.update', $produto->id) : route('produtos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($produto->id)        
                            @method('PUT')
                        @endif

                        <!-- Name -->
                        <div>
                            <x-input-label class="mt-4" for="nome" :value="__('Nome')" />
                            <x-text-input id="nome" class="block mt-2" type="text" name="nome"
                                :value="old('nome') ?? $produto->nome" required autofocus autocomplete="nome" />
                            <x-input-error :messages="$errors->get('nome')" class="mt-2" />
                        </div>

                        <!-- Preco -->
                        <div>
                            <x-input-label class="mt-4" for="preco" :value="__('Preço')" />
                            <x-text-input id="preco" class="block mt-2" type="number" name="preco"
                                :value="old('preco') ?? $produto->preco" required autofocus autocomplete="preco" />
                            <x-input-error :messages="$errors->get('preco')" class="mt-2" />
                        </div>

                        <!-- Descricao -->
                        <div>
                            <x-input-label class="mt-4" for="descricao" :value="__('Descrição')" />
                            <x-textarea id="descricao" class="block" name="descricao"
                            required autofocus autocomplete="descricao">
                                {{ old('descricao') ?? $produto->descricao }}
                            </x-textarea>
                            <x-input-error :messages="$errors->get('descricao')" class="mt-2" />
                        </div>

                       <!-- Imagem -->
                        <div>
                            <x-input-label class="mt-4" for="imagem" :value="__('Imagem')" />
                            <input id="imagem" type="file" class="block mt-2" name="imagem" autofocus autocomplete="imagem" />
                            <x-input-error :messages="$errors->get('imagem')" class="mt-2" />
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