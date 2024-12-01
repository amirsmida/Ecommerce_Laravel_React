@include('layouts_blade.header')
<div class="card col-lg-10 offset-1 mt-5 p-4">

    <div>
        <h1 class="h3 mb-0 text-gray-800">Clients</h1>
        @if ($type == 0)
            <a class="btn btn-danger" type="button" href="{{ route('clients_archive') }}">
                <i class="menu-icon tf-icons bx bx-archive-in"></i>
            </a>
        @else
            <a class="btn btn-success" type="button" href="{{ route('client.index') }}">
                <i class="menu-icon tf-icons bx bx-archive-out"></i>
            </a>
        @endif
    </div>

    <div class="table-responsive text-nowrap">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Telephone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->nom }} {{ $client->prenom }}</td>
                        <td>
                            {{ $client->adresse }}
                        </td>
                        <td>
                            {{ $client->telephone }}
                        </td>
                        <td>
                            @if ($client->etat == 0)
                                <a class="btn btn-danger"
                                    href="{{ route('modif_etat_client', ['id' => $client->id, 'etat' => 1]) }}">
                                    Archiver
                                </a>
                            @else
                                <a class="btn btn-success"
                                    href="{{ route('modif_etat_client', ['id' => $client->id, 'etat' => 0]) }}">
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
