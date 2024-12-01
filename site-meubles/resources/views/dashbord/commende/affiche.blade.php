@include('layouts_blade.header')
<div class="card col-lg-10 offset-1 mt-5 p-4">


    <div class="table-responsive text-nowrap">
        <div class="d-flex justify-content-sm-around align-items-baseline">
            <h4 class="card-title">Informations sur la commande </h4>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <p><strong>Date:</strong>{{ $commende->created_at }}</p>
                <p><strong>Client:</strong>{{ $commende->clients->nom }} {{ $commende->clients->prenom }} </p>
                <p><strong>Prix:</strong>{{ $commende->prix }}</p>
                <p><strong>Etat:</strong>
                    @if ($commende->etat == 0)
                        En Attente
                    @elseif ($commende->etat == 1)
                        Accepter
                    @elseif ($commende->etat == 2)
                        Refuser
                    @endif
                </p>
            </div>
            <div>
                @if ($commende->etat == 0)
                    <a class="btn btn-success"
                        href="{{ route('modif_etat_commende', ['id' => $commende->id, 'etat' => 1]) }}">
                        Accepter
                    </a>
                    <a class="btn btn-danger"
                        href="{{ route('modif_etat_commende', ['id' => $commende->id, 'etat' => 2]) }}">
                        Refusrer
                    </a>
                @endif
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Article</th>
                    <th>Prix Unitaire</th>
                    <th>Quantité</th>
                    <th>Prix Totale</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($commende->lignieComnd as $lignie)
                    <tr>
                        <td>{{ $lignie->articles->nom }}</td>
                        <td>{{ $lignie->prixU }}DT</td>
                        <td>{{ $lignie->quantite }}</td>
                        <td>{{ $lignie->prixT }}DT</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('layouts_blade.footer')
