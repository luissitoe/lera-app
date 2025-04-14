<x-layout>
    <section class="section">
        @if (session('success'))
            <div id="flash" class="p-4 text-center bg-green-50 text-green-500 font-bold mb-3">
                {{ session('success') }}
            </div>
        @endif
        <h1 class="text-xl font-bold text-black-200 mb-10">Registar Autor</h1>
        <div class="author__container">
            <form class="form mb-3" action="{{ route('authors.save') }}" method="POST">
                @csrf
                <div class="grid grid-cols-2 gap-4 mb-5">
                    <div class="form__group">
                        <label class="form__label" for="nome">Nome do Autor</label>
                        <input class="form__input" type="text" name="nome" placeholder="Nome do Autor"
                            value="{{ old('nome') }}" />
                    </div>
                    <div class="form__group">
                        <label class="form__label" for="data_nascimento">Data de Nascimento</label>
                        <input class="form__input" type="date" name="data_nascimento"
                            value="{{ old('data_nascimento') }}" />
                    </div>
                    <div class="form__group">
                        <label class="form__label" for="nacionalidade">Nacionalidade</label>
                        <input class="form__input" type="text" name="nacionalidade" placeholder="Nacionalidade"
                            value="{{ old('nacionalidade') }}" />
                    </div>
                    <div class="form__group">
                        <label class="form__label" for="biografia">Biografia</label>
                        <textarea name="biografia" class="form__input" placeholder="Sobre o autor">{{ old('biografia') }}</textarea>
                    </div>
                </div>
                <div class="flex justify-end">
                    <button class="btn--primary" type="submit">Registar Autor</button>
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
