@include('layouts_blade.header')
<form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
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
                    <input type="text" class="form-control" name="logo" placeholder="Choisir l'image du catégorie"
                        aria-describedby="defaultFormControlHelp" />
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Prix</label>
                    <input type="text" class="form-control" id="prix" name="prix"
                        aria-describedby="emailHelp" placeholder="Choisir le prix de l'article...">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Catégories</label>
                    <select class="form-control" id="id_categorie" name="id_categorie">
                        <option selected disabled>Choisir une catégorie parente</option>
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn rounded-pill btn-success col-lg-2">Ajouter</button>
                <a type="button" class="btn rounded-pill btn-secondary col-lg-2"
                    href="{{ route('categories.index') }}">Annuler</a>
            </div>
        </div>
    </div>
</form>
@include('layouts_blade.footer')
