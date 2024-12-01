@include('layouts_blade.header')
<form action="{{ route('categories.update', $categorie->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="col-md-11 m-5">
        <div class="card mb-4">
            <h5 class="card-header">Modifier une catégorie</h5>
            <div class="card-body">
                <div>
                    <label class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" value={{ "$categorie->nom" }}
                        placeholder="Choisir le nom du catégorie" aria-describedby="defaultFormControlHelp" />
                </div>
                <div>
                    <label class="form-label">Image</label>
                    <img src="{{ $categorie->image }}" width="130" />
                    <input type="text" class="form-control" name="image" placeholder="Choisir l'image du catégorie"
                        aria-describedby="defaultFormControlHelp" value={{ "$categorie->image" }} />
                </div>
                @if (!$categories->isEmpty())
                    <div class="form-group">
                        <label for="exampleInputEmail1">Catégories</label>
                        <select class="form-control" id="id_categorie" name="id_categorie">
                            <option selected disabled>Choisir une catégorie parente</option>
                            @foreach ($categories as $cat)
                                @if ($cat->id != $categorie->id)
                                    @if ($cat->id_categorie == $categorie->id)
                                        <option value="{{ $cat->id }}" >{{ $cat->nom }}</option>
                                    @else
                                        <option value="{{ $cat->id }}" selected>{{ $cat->nom }}</option>
                                    @endif
                                @endif
                            @endforeach
                        </select>
                    </div>
                @endif
                <button type="submit" class="btn rounded-pill btn-success col-lg-2">Modifier</button>
                <a type="button" class="btn rounded-pill btn-secondary col-lg-2"
                    href="{{ route('categories.index') }}">Annuler</a>
            </div>
        </div>
    </div>
</form>

@include('layouts_blade.footer')
