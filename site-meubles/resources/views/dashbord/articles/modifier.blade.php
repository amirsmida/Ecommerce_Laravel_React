@include('layouts_blade.header')
   <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
    <div class="col-md-11 m-5">
        <div class="card mb-4">
            <h5 class="card-header">Modifier une catégorie</h5>
            <div class="card-body">
                <div>
                    <label class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" value={{"$article->nom"}}
                        placeholder="Choisir le nom du catégorie" aria-describedby="defaultFormControlHelp" />
                </div>
                <div>
                    <label class="form-label">Image</label>
                      <img src="{{ $article->image }}" width="130" />
                    <input type="text" class="form-control" name="logo" placeholder="Choisir l'image du catégorie"
                         value={{"$article->image"}} />
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{$article->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Prix</label>
                    <input type="text" class="form-control" id="prix" name="prix"
                        value='{{ $article->prix }}' aria-describedby="emailHelp"
                        placeholder="Choisir le prix de l'article...">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Catégories</label>
                    <select class="form-control" id="id_categorie" name="id_categorie">
                        <option selected disabled>Choisir une catégorie parente</option>
                        @foreach ($categories as $cat)
                            @if ($article->id_categorie == $cat->id)
                                <option value="{{ $cat->id }}" selected>{{ $cat->nom }}</option>
                            @else
                                <option value="{{ $cat->id }}">{{ $cat->nom }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn rounded-pill btn-success col-lg-2"
        >Modifier</button>
        <a type="button" class="btn rounded-pill btn-secondary col-lg-2"
        href="{{ route('articles.index') }}" >Annuler</a>
            </div>
        </div>
    </div>
</form>

@include('layouts_blade.footer')