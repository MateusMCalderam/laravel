<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-link-button href="{{ route('produtos.create') }}">
                        + Produto
                    </x-link-button>

                    @if (count($produtos) > 0)
                    
                    
                    <div class="relative overflow-x-auto mt-6">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nome
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Preço
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Descrição
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Imagem
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($produtos as $produto)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $produto->nome }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $produto->preco }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $produto->descricao }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if ($produto->imagem)
                                            <img src="{{ asset('storage/' . $produto->imagem) }}" alt="Imagem do produto" class="mt-2 w-8 h-8 object-cover rounded">
                                            @else
                                            <h1 class="mt-4">Nenhum Imagem Cadastrado</h1>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('produtos.edit', $produto->id) }}">Editar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                        <h1 class="mt-4">Nenhum Produto Cadastrado</h1>
                    @endif
                </div>
            </div>
        </div>
</x-app-layout>