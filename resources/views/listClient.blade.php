<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="http://www.one.org.ma/images/Txt_ONEE.jpg">
    <title>ONEE</title>
    <link rel="stylesheet" href="/css/main.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

    @if (session()->has('clientDelete'))
        <script>
            Swal.fire({
                position: "center-center",
                icon: "success",
                title: "{{ session('clientDelete') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif
    @if (session()->has('succeeCable'))
        <script>
            Swal.fire({
                position: "center-center",
                icon: "success",
                title: "{{ session('succeeCable') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif
    @if (session()->has('succeePost'))
        <script>
            Swal.fire({
                position: "center-center",
                icon: "success",
                title: "{{ session('succeePost') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif
    <div class="demandeClientsSection">
        <div class="landing-sectionHead">
            <img src="http://www.one.org.ma/FR/Projet_Simulation/img/Bann_accueil.gif" alt="">
        </div>
        <x-admin_navbar/>
        <div class="theResult">
            <span class="suivie">List des clients</span>
          </div>
        <div class="tableDiv">
            <table class="messages-table">
                <tr>
                    <th>Prenom de client</th>
                    <th>Nom de client</th>
                    <th>Cin</th>
                    <th>Address</th>
                    <th>Telephone</th>
                    <th>Type activité</th>
                    <th>Puissance demandé</th>
                    <th>Nom de post</th>
                    <th>Matricule de post</th>
                    <th>Date de liaison</th>
                    <th>Print</th>
                    <th>Delete</th>
                </tr>
                    @foreach ($clients as $client)
        <tr class="messageRow">
            <td>{{ $client->firstName }}</td>
            <td>{{ $client->lastName }}</td>
            <td>{{ $client->cin }}</td>
            <td>{{ $client->address }}</td>
            <td>{{ $client->telephone }}</td>
            <td>{{ $client->type_activite }}</td>
            <td>{{ $client->puissance_demande }}</td>
            @if ($client->post)
                <td>{{ $client->post->nomPost }}</td>
                <td>{{ $client->post->matricule }}</td>
                <td>{{ explode(' ', $client->post->created_at)[0] }}</td>
                    <td>
                        <form action="{{ route('demandePdf', $client->id) }}">
                            @csrf
                            <button type="submit" class="pressP">Print</button>
                        </form>
                    </td>
            @else
                <td colspan="4" style="text-align: center">
                    <form action="{{ route('p.blade', $client->id) }}">
                        @csrf
                        <button type="submit" class="press">Affecter un post</button>
                    </form>
                </td>
            @endif
            
            
            <td>
                <form action="{{ route('client.delete', $client->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="deleteClient">Supprimer</button></form>
            </td>
        </tr>
    @endforeach

            </table>
        </div>
    </div>

<x-foo_ter/>
</body>
</html>