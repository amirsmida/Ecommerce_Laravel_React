@include('layouts_blade.header')
<div class="card col-lg-10 offset-1 mt-5 p-4">

    <div>
        <h1 class="h3 mb-0 text-gray-800">Articles</h1>
        <a type="button" class="btn rounded-pill btn-dark col-lg-2" href="{{ route('articles.create') }}">Ajouter</a>
        @if ($type == 0)
            <a class="btn btn-danger" type="button" href="{{ route('articles_archive') }}">
                <i class="menu-icon tf-icons bx bx-archive-in"></i>
            </a>
        @else
            <a class="btn btn-success" type="button" href="{{ route('articles.index') }}">
                <i class="menu-icon tf-icons bx bx-archive-out"></i>
            </a>
        @endif
    </div>

    <div class="table-responsive text-nowrap">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Catégorie Parente</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($articles as $article)
                    <tr>
                        <td>
                            <img src="{{ $article->logo }}" width="130" />
                        </td>
                        <td>{{ $article->nom }}</td>
                        <td>
                            {{ $article->description }}
                        </td>
                        <td>
                            {{ $article->prix }}
                        </td>
                        <td>
                            <a class="btn btn-warning" type="button" href="{{ route('articles.edit', $article->id) }}">
                                Modifier
                            </a>
                            @if ($article->etat == 0)
                                <a class="btn btn-danger"
                                    href="{{ route('modif_etat_article', ['id' => $article->id, 'etat' => 1]) }}">
                                    Archiver
                                </a>
                            @else
                                <a class="btn btn-success"
                                    href="{{ route('modif_etat_article', ['id' => $article->id, 'etat' => 0]) }}">
                                    Désarchiver
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('layouts_blade.footer')
