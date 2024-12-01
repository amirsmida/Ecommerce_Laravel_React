@include('layouts_blade.header')
<div class="card">
    <h5 class="card-header">Listes Categories</h5>
    <a type="button" class="btn rounded-pill btn-dark col-lg-2"
        href="{{ route('categories.create') }}" >Ajouter</a>

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
        href="{{ route('categories.edit', $category->id) }}" >Modifier</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('layouts_blade.footer')
