<x-layout>
    <section class="section container">
        @if (session('success'))
            <div id="flash" class="p-4 text-center bg-green-50 text-green-500 font-bold mb-3">
                {{ session('success') }}
            </div>
        @endif
        <div class="author__container">
            <h1 class="text-xl font-bold text-black-200 mb-10">Registar Livro</h1>
            <form class="form mb-5 " action="{{ route('books.save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-3 gap-2 gap-x-4">
                    <div class="form__group">
                        <label class="form__label" for="titulo">Título do Livro</label>
                        <input class="form__input" type="text" name="titulo" placeholder="Título do Livro"
                            value="{{ old('titulo') }}" />
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
                        <select name="formato" id="formato" class="form__input"
                            onchange="mostrarCamposPorFormato(this.value)">
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
                <div class="grid grid-cols-3 gap-2 gap-x-4 mt-4" id="campos-condicionais">
                    <!-- preenchido via JS -->
                </div>
                <div class="flex justify-end mt-5">
                    <button class="btn--primary" type="submit">Registar Livro</button>
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

<button data-modal-target="autorModal" data-modal-toggle="autorModal"
    class="btn w-[55px] h-[55px] border border-gray-300 rounded-xl text-xl font-bold flex items-center justify-center bg-white">
    +
</button>

<div id="autorModal" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex items-center justify-center">
    <div class="relative p-4 w-full max-w-md">
        <div class="relative bg-white rounded-lg shadow">
            <div class="p-4 border-b rounded-t  border-border">
                <h3 class="text-lg font-semibold text-gray-900">Novo Autor</h3>
            </div>
            <form id="formAutor" class="p-4">
                <input type="text" name="nome" placeholder="Nome" class="form__input w-full mb-3" required>
                <textarea name="biografia" placeholder="Biografia" class="form__input w-full mb-3"></textarea>
                <div class="flex justify-end gap-2">
                    <button data-modal-hide="autorModal" type="button" class="btn">Cancelar</button>
                    <button type="submit" class="btn--primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    function mostrarCamposPorFormato(formato) {
        const camposDiv = document.getElementById('campos-condicionais');
        camposDiv.innerHTML = '';

        if (formato === 'fisico') {
            camposDiv.innerHTML = `
            <div class="form__group">
                <label class="form__label">Peso (g)</label>
                <input class="form__input" type="number" name="peso">
            </div>
            <div class="form__group">
                <label class="form__label">Dimensões</label>
                <input class="form__input" type="text" name="dimensoes" placeholder="Ex: 21x14x3 cm">
            </div>
            <div class="form__group">
                <label class="form__label">Quantidade</label>
                <input class="form__input" type="number" name="quantidade">
            </div>
        `;
        }

        if (formato === 'digital') {
            camposDiv.innerHTML = `
            <div class="form__group">
                <label class="form__label">Arquivo (PDF, ePub, etc)</label>
                <input class="form__input" type="file" name="arquivo" accept=".pdf,.epub,.mobi">
            </div>
        `;
        }

        if (formato === 'audiobook') {
            camposDiv.innerHTML = `
            <div class="form__group">
                <label class="form__label">Narrador</label>
                <input class="form__input" type="text" name="narrador">
            </div>
            <div class="form__group">
                <label class="form__label">Tempo de Duração (min)</label>
                <input class="form__input" type="number" name="tempo_duracao">
            </div>
        `;
        }
    }
</script>
