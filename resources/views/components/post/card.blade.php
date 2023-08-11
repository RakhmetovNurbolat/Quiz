<x-card>
    <x-card-body>
        <div class="mb-2"> 
            <h5>
                <a href="{{ route('blog.show', $post->id) }}">
                    {{$post->title}}
                </a>
            </h5>
            <div class="small text-muted">
                {{-- {{ now()->format('d.m.Y H:i:s') }} --}}
                {{-- {{ $post->published_at->format('d.m.Y H:i:s') }} --}}
                {{ $post->published_at->diffForHumans() }}
            </div> 
        </div>

        {{ $post->id }}

    </x-card-body>
</x-card>