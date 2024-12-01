@include('layouts_blade.header')
<div class="card col-lg-10 offset-1 mt-5 p-4">
    <h5 class="card-header">Listes Categories</h5>
    <div>
        <a type="button" class="btn rounded-pill btn-dark col-lg-2" href="{{ route('categories.create') }}">Ajouter</a>
        @if ($type == 0)
            <a class="btn btn-danger" type="button" href="{{ route('categories_archive') }}">
                <i class="menu-icon tf-icons bx bx-archive-in"></i>
            </a>
        @else
            <a class="btn btn-success" type="button" href="{{ route('categories.index') }}">
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
                    <th>Catégorie Parente</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($categories as $category)
                    <tr>
                        <td>
                            <img src="{{ $category->image }}" width="130" />
                        </td>
                        <td>{{ $category->nom }}</td>
                        <td>
                            @if (isset($category->id_categorie))
                                Sous catégorie: {{ $category->categoriesParnt->nom }}
                            @else
                                Catégorie
                            @endif
                        </td>
                        <td>
                            <a type="button" class="btn rounded-pill btn-warning "
                                href="{{ route('categories.edit', $category->id) }}">Modifier</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('layouts_blade.footer')
