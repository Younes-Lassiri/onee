<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ONEE</title>
    <link rel="stylesheet" href="/css/main.css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>
<body>
      <div class="navbarDiv">
        <div class="navbarDivTwo">
            <ul class="navbar-ul">
                <li><a href="{{ route('home') }}" style="text-decoration: none;display: flex; gap: 10px; align-items: center"><i class='bx bx-home ii'></i>Accueil</a></li>
                <li><a href="{{ route('listClient') }}" style="text-decoration: none">List de clients</a></li>
            </ul>
        </div>
        <div class="navbarDivOne">
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              @auth
              <div class="logoutDiv">
                <a href="{{ route('listClient') }}">Tableau de bord<i class='bx bxs-dashboard iiD'></i></a>
                <button type="submit">Se déconnecter<i class='bx bx-right-arrow-circle ii'  ></i></button>
              </div>
              @endauth
            </form>
        </div>
      </div>
</body>
</html>