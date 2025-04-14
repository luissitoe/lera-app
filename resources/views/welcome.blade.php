<x-layout>
    <section class="section">
        <div class="flex items-center justify-between">
            <h1 class="text-xl font-bold text-black-200 mb-10">Adicionados Recentemente</h1>
        </div>
        <div class="books__container grid grid-cols-4 grid-cols-g  gap-2">
            @foreach ($livros as $livro)
                <x-book-card :livro="$livro"></x-book-card>
            @endforeach
        </div>
    </section>
</x-layout>
