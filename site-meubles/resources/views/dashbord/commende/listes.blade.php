@include('layouts_blade.header')
<div class="card col-lg-10 offset-1 mt-5 p-4">

    <div>
        <h1 class="h3 mb-0 text-gray-800">Commendes</h1>
    </div>

    <div class="table-responsive text-nowrap">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Clients</th>
                    <th>Etat</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($commendes as $commende)
                    <tr>
                        <td>{{ $commende->created_at }}</td>
                        <td>{{ $commende->clients->nom }} {{ $commende->clients->prenom }}</td>
                        <td>
                            @if ($commende->etat == 0)
                               En Attente
                            @elseif ($commende->etat == 1)
                               Accepter
                            @elseif ($commende->etat == 2)
                                Refuser
                            @endif
                        </td>
                        <td>
                            <a type="button" class="btn btn-warning btn-rounded"  href="{{ route('detaille_commende', ['id' => $commende->id]) }}">
                                <i class="ti-file btn-icon-append"></i> Afficher
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('layouts_blade.footer')
