@props(['livro'])

<div class="book__card w-full max-w-[280px] p-[20px] rounded-[30px]">
    <img class="book__card-image w-full rounded-[20px] object-cover mb-3" src="{{ asset('storage/' . $livro->imagem) }}"
        alt="{{ $livro->titulo }}">

    <p class="book__card-author text-[14px] font-semibold text-[#A6A6A6]">
        {{ $livro->autores->pluck('nome')->join(', ') }}
    </p>

    <h3 class="book__card-title font-semibold mb-3">{{ $livro->titulo }}</h3>

    <div>
        <div class="flex items-center justify-between">
            <a href="{{ route('books.show', $livro->id) }}"
                class="border-[#A6A6A6] border-2 py-2 px-3 rounded-[15px] text-black font-semibold">
                Detalhes
            </a>
        </div>
    </div>
</div>
