<x-app-layout>
    <div class="max-w-4xl mx-auto py-12 px-6">

    <div class="w-full flex justify-between items-start mb-6 flex-wrap gap-4">
        <div class="flex-1 min-w-[250px]">
            <h1 class="text-3xl font-bold text-blue-700 dark:text-blue-400 mb-2">
                {{ $post->title }}
            </h1>
            <p class="text-sm text-gray-500">
                Publicado em {{ $post->created_at->format('d/m/Y') }}
                por <span class="font-medium text-gray-700 dark:text-gray-300">{{ $post->user->name ?? 'Autor desconhecido' }}</span>
            </p>
        </div>

        <div class="flex-shrink-0">
            <a href="{{ route('post.index') }}"
            class="inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                ← Voltar
            </a>
        </div>
    </div>

        

        <div class="prose dark:prose-invert max-w-none mb-10 text-justify">
            {!! nl2br(e($post->content)) !!}
        </div>

        <hr class="border-t border-gray-300 dark:border-gray-600 mb-6">

        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-semibold text-green-700 dark:text-green-400">
                Comentários ({{ count($post->comments) }})
            </h2>

            <a href="#"
               class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition text-sm">
                + Adicionar Comentário
            </a>
        </div>

        @forelse ($post->comments as $comment)
            <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 border-l-4 border-blue-500 dark:border-blue-400 rounded-md shadow-sm">
                <div class="flex items-center justify-between mb-1">
                    <span class="text-sm font-semibold text-blue-800 dark:text-blue-300">
                        {{ $comment->user->name ?? 'Anônimo' }}
                    </span>
                    <span class="text-xs text-gray-500">
                        {{ $comment->created_at->format('d/m/Y H:i') }}
                    </span>
                </div>
                <p class="text-gray-800 dark:text-gray-100 text-sm">
                    {{ $comment->content }}
                </p>
            </div>
        @empty
            <p class="text-sm text-gray-500">Nenhum comentário ainda.</p>
        @endforelse
    </div>
</x-app-layout>
