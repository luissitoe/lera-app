<x-layout>
    <section class="section container">
        <h1 class="text-xl font-bold text-black-200 mb-10"><h1>
        <div class="books__container">
            <div class="flex flex-col justify-center book__details w-full bg-white p-8 rounded-[30px]">
                <h1 class="text-xl font-bold text-black-200 mb-10">Entrega do Livro: {{ $livro->titulo }}</h1>
                <p class="">{{ $mensagemEntrega }}</p>
            </div>
            <div class="flex justify-end align-end book__details w-full bg-white p-8 mt-6 rounded-[30px]">
                <a href="{{ route('books.index') }}" class="bg-red-500 text-white font-bold px-4 py-1 rounded hover:bg-red-600 ">Voltar</a>
            </div>

        </div>
    </section>
</x-layout>
