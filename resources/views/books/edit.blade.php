<x-layout>
    <section class="section">
        @if (session('success'))
            <div id="flash" class="p-4 text-center bg-green-50 text-green-500 font-bold mb-3">
                {{ session('success') }}
            </div>
        @endif
        <div class="flex items-center justify-between">
            <h1 class="text-xl font-bold text-black-200 mb-10">Registar Livro</h1>
            <a href="{{ route('books.index') }}" class="btn--primary" type="submit">Lista de Livros</a>
        </div>
        <div class="author__container">
            <form class="form mb-5 " action="{{ route('books.edit', $livro->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-2 gap-2 gap-x-4">
                    <div class="form__group">
                        <label class="form__label" for="titulo">Título do Livro</label>
                        <input class="form__input" type="text" name="titulo" placeholder="Título do Livro"
                            value="{{ old('titulo', ) }}" />
                    </div>
                    <div class="form__group">
                        <label class="form__label" for="">Género</label>
                        <select class="form__input" name="generos[]" id="generos" multiple>
                            @foreach ($generos as $genero)
                                <option value="{{ $genero->id }}">{{ $genero->genero }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form__group">
                        <label class="form__label" for="data_nascimento">Ano de Publicação</label>
                        <input class="form__input" type="text" name="ano_publicacao"
                            value="{{ old('ano_publicacao') }}" placeholder="Ano de Publicação" />
                    </div>
                    <div class="form__group">
                        <label class="form__label" for="">ISBN</label>
                        <input class="form__input" type="text" name="isbn" placeholder="ISBN"
                            value="{{ old('isbn') }}" />
                    </div>
                    <div class="form__group">
                        <label class="form__label" for="descricao">Descrição</label>
                        <textarea class="form__input" name="descricao" placeholder="Sobre o Livro">
                        {{ old('descricao') }}
                    </textarea>
                    </div>
                    <div class="form__group">
                        <label class="form__label" for="">Autor</label>
                        <select id="autores" name="autores[]" class="form__input" multiple>
                            @foreach ($autores as $autor)
                                <option value="{{ $autor->id }}"
                                    {{ in_array($autor->id, old('autores', [])) ? 'selected' : '' }}>
                                    {{ $autor->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form__group">
                        <label for="formato" class="form__label" for="formato">Formato do Livro</label>
                        <select name="formato" id="formato" class="form__input">
                            <option value="fisico" {{ old('tipo') == 'fisico' ? 'selected' : '' }}>Físico</option>
                            <option value="digital" {{ old('tipo') == 'digital' ? 'selected' : '' }}>Digital</option>
                            <option value="audiobook" {{ old('tipo') == 'audiobook' ? 'selected' : '' }}>Audiobook
                            </option>
                        </select>
                    </div>
                    <div class="form__group">
                        <label class="form__label" for="imagem">Imagem da Capa</label>
                        <input class="form__input border-gray-600 border-3 border-dashed" type="file" name="imagem"
                            id="imagem" accept=".jpg,.jpeg,.png">
                    </div>

                </div>
                <div class="flex justify-end mt-5">
                    <a href="{{ route('books.index') }}" class="btn--primary" type="submit">Registar Livro</a>
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
