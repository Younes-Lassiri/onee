<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="http://www.one.org.ma/images/Txt_ONEE.jpg">
    <title>ONEE</title>
    <link rel="stylesheet" href="/css/second.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<style>
    @media print {
    @page {
        margin: 0;
    }

    @page {
        margin-top: 10 !important;
        margin-bottom: 0 !important;
    }
    button{
        display: none
    }
}
</style>
<body>
    <div class="demandeClientsSection">
        <h1>Les infrmations de Client</h1>
        <div class="tableDiv">
            <table class="two-table" border="1">
                <tr>
                    <th>Prenom de client</th>
                    <th>Nom de client</th>
                    <th>Cin</th>
                    <th>Address</th>
                    <th>Telephone</th>
                    <th>Type d'activité</th>
                    <th>Puissance demandé</th>
                </tr>
                <tr class="messageRow">
                    <td>{{ $client->firstName }}</td>
                    <td>{{ $client->lastName }}</td>
                    <td>{{ $client->cin }}</td>
                    <td>{{ $client->address }}</td>
                    <td>{{ $client->telephone }}</td>
                    <td>{{ $client->type_activite }}</td>
                    <td>{{ $client->puissance_demande }}</td></tr>
            </table>
        </div>
    </div>


    <div class="demandeClientsSection">
        <h1>Les infrmations de Post</h1>
        <div class="tableDiv">
            <table class="one-table" border="1">
                <tr>
                    <th>Matriule</th>
                    <th>Nom de poste</th>
                    <th>Pi</th>
                    <th>Pa</th>
                    <th>Disjoncteur</th>
                    <th>In Av/Racc</th>
                    <th>I1 Av/Racc</th>
                    <th>I2 Av/Racc</th>
                    <th>I3 Av/Racc</th>
                    <th>In Ap/Racc</th>
                    <th>I1 Ap/Racc</th>
                    <th>I2 Ap/Racc</th>
                    <th>I3 Ap/Racc</th>
                    <th>Ampérage</th>
                </tr>
                <tr class="messageRow">
                    <td>{{ $client->post->matricule }}</td>
                    <td>{{ $client->post->nomPost }}</td>
                    <td>{{ $client->post->pi }}</td>
                    <td>{{ $client->post->pa }}</td>
                    <td>{{ $client->post->dis }}</td>
                    <td>{{ $client->post->ln }}</td>
                    <td>{{ $client->post->ln1 }}</td>
                    <td>{{ $client->post->ln2 }}</td>
                    <td>{{ $client->post->ln3 }}</td>
                    <td>{{ $client->post->lna }}</td>
                    <td>{{ $client->post->lna1 }}</td>
                    <td>{{ $client->post->lna2 }}</td>
                    <td>{{ $client->post->lna3 }}</td>
                    <td>{{ $client->post->tension }}</td>
                </tr>
            </table>
        </div>
    </div>
   


    <div class="demandeClientsSection">
        <h1>Les infrmations sur le chute Tension</h1>
        <div class="tableDiv">
            <table class="chute-table" border="1">
                <tr>
                    <th>Chute de tension</th>
                    <th>Valeur tension</th>
                    <th>Chute % par Rapport à 380V</th>
                </tr>
                <tr class="messageRow">
                    <td>Support de Dérivation avant Réalisation de l'Ouvrage</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                </tr>
                <tr class="messageRow">
                    <td>Bout de ligne avant Réalisation de l'Ouvrage</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                </tr>
                <tr class="messageRow">
                    <td>Support de Dérivation après Réalisation de l'Ouvrage</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                </tr>
                <tr class="messageRow">
                    <td>Bout de ligne après Réalisation de l'Ouvrage</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                </tr>
            </table>
        </div>
    </div>
        <button onclick="printW()" class="print">Print</button>

    <script>
        function printW(){
            window.print();
        }
    </script>

</body>
</html>