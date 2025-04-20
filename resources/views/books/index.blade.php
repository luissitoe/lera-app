<x-layout>
    <section class="section">
        @if (session('success'))
            <div id="flash" class="p-4 text-center bg-green-50 text-green-500 font-bold mb-3">
                {{ session('success') }}
            </div>
        @endif
        <div class="">
            <h1 class="text-xl font-bold text-black-200 mb-10">Lista de Livros</h1>
            <table class="bg-white table-auto w-full border-collapse border border-border">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="border border-border px-4 py-2">#</th>
                        <th class="border border-border px-4 py-2">Título</th>
                        <th class="border border-border px-4 py-2">Autor</th>
                        <th class="border border-border px-4 py-2">Ano de Publicação</th>
                        <th class="border border-border px-4 py-2">ISBN</th>
                        <th class="border border-border px-4 py-2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($livros as $livro)
                        <tr>
                            <td class="border border-border px-4 py-2">{{ $livro->id }}</td>
                            <td class="border border-border px-4 py-2">{{ $livro->titulo }}</td>
                            <td class="border border-border px-4 py-2">{{ $livro->autores->pluck('nome')->join(',') }}
                            </td>
                            <td class="border border-border px-4 py-2">{{ $livro->ano_publicacao }}</td>
                            <td class="border border-border px-4 py-2">{{ $livro->isbn }}</td>
                            <td class="border border-border px-4 py-2 flex gap-2">
                                <a href="{{ route('books.entregar', $livro->id) }}"
                                    class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Entregar</a>

                                <a href="{{ route('books.edit', $livro->id) }}"
                                    class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Editar</a>
                                <form action="{{ route('books.destroy', $livro->id) }}" method="POST"
                                    onsubmit="return confirm('Tem certeza que deseja excluir este livro?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">Nenhum livro encontrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </section>
</x-layout>
