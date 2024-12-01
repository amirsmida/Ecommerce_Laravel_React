@include('layouts_blade.header')
<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <div class="col-md-11 m-5">
        <div class="card mb-4">
            <h5 class="card-header">Ajouter une nouvelle catégorie</h5>
            <div class="card-body">
                <div>
                    <label class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom"
                        placeholder="Choisir le nom du catégorie" aria-describedby="defaultFormControlHelp" />
                </div>
                <div>
                    <label class="form-label">Image</label>
                    <input type="text" class="form-control" name="image" placeholder="Choisir l'image du catégorie"
                        aria-describedby="defaultFormControlHelp" />
                </div>
                @if (!$categories->isEmpty())
                    <div class="form-group">
                        <label for="exampleInputEmail1">Catégories</label>
                        <select class="form-control" id="id_categorie" name="id_categorie">
                            <option selected disabled>Choisir une catégorie parente</option>
                            @foreach ($categories as $categorie)
                                <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
                <button type="submit" class="btn rounded-pill btn-success col-lg-2">Ajouter</button>
                <a type="button" class="btn rounded-pill btn-secondary col-lg-2"
                    href="{{ route('categories.index') }}">Annuler</a>
            </div>
        </div>
    </div>
</form>
@include('layouts_blade.footer')
