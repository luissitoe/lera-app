<x-layout>
    <section class="section">
        @if (session('success'))
            <div id="flash" class="p-4 text-center bg-green-50 text-green-500 font-bold mb-3">
                {{ session('success') }}
            </div>
        @endif
        <h1 class="text-xl font-bold text-black-200 mb-10">Registar Género</h1>
        <div class="author__container">
            <form class="form max-w-[400px] mb-5 grid gap-5" action="{{ route('genres.save') }}" method="POST">
                @csrf
                <div class="form__group">
                    <label class="form__label" for="genero">Nome do Género</label>
                    <input class="form__input" type="text" name="genero" placeholder="Nome do Género"
                        value="{{ old('genero') }}" />
                </div>
                <div class="form__group">
                    <button class="btn--primary" type="submit">Registar Género</button>
                </div>
            </form>

            <!-- validation errors -->
            @if ($errors->any())
                <ul class="px-4 py-4 bg-red-100 rounded-[30px]">
                    @foreach ($errors->all() as $error)
                        <li class="my-2 text-red-500">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </section>
</x-layout>
