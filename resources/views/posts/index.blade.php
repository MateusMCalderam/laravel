<x-app-layout>
    <div class="flex items-center justify-between px-6 my-6">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            Notícias Recentes
        </h2>

        <form method="GET" action="{{ route('post.index') }}">
            <select name="category" onchange="this.form.submit()" class="border rounded px-2 py-1 text-sm">
                <option value="">Todas as categorias</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </form>
    </div>


    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($posts as $post)
                <div class="flex flex-col bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden h-full">

                    <div class="aspect-w-1 aspect-h-1 w-full">
                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" 
                                 class="w-full h-full object-cover" />
                        @else
                            <div class="w-full h-full bg-gray-200 dark:bg-gray-700"></div>
                        @endif
                    </div>

                    <div class="p-4 flex flex-col h-full">
                        <span class="inline-block px-2 py-1 mb-2 text-xs font-semibold rounded-full text-white" @if ($post->category->color)
                                        style='background-color: {{ "#" . $post->category->color }}'
                                    @else
                                        style="background-color: #6b7280;"
                                    @endif>
                            {{ $post->category->name ?? 'Sem categoria' }}
                        </span>

                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2 line-clamp-2">
                            {{ $post->title }}
                        </h3>

                        <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm line-clamp-3">
                            {{ Str::limit($post->content, 120) }}
                        </p>

                        <div class="mt-auto">
                            <div class="flex justify-between items-center text-xs text-gray-500 mb-3">
                                <span>{{ $post->created_at->format('d/m/Y') }}</span>
                                <span>{{ $post->user->name ?? 'Autor desconhecido' }}</span>
                            </div>

                            <a href="{{ route('post.show', $post->id) }}"
                               class="w-full block text-center px-4 py-2 text-white rounded-md transition-colors"   
                               @if ($post->category->color)
                                        style='background-color: {{ "#" . $post->category->color }}'
                                    @else
                                        style="background-color: #6b7280;"
                                    @endif>
                                Ver mais
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>