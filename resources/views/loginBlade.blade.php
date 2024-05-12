<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="/img/icon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="http://www.one.org.ma/images/Txt_ONEE.jpg">
    <title>ONEE</title>
    <link rel="stylesheet" href="/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</head>

<body>
    @if (session()->has('failedLogin'))
        <script>
            Swal.fire({
                position: "center-center",
                icon: "error",
                title: "{{ session('failedLogin') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif
    @if (session()->has('logOut'))
        <script>
            Swal.fire({
                position: "center-center",
                icon: "success",
                title: "{{ session('logOut') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif
<div class="admin-signup-section">
    <div class="landing-sectionHead">
        <img src="http://www.one.org.ma/FR/Projet_Simulation/img/Bann_accueil.gif" alt="">
    </div>
    <x-user_navbar/>
    <div class="adminCreationForm">
        <div class="adminCreationFormOne">
            <img src="https://www.mapbusiness.ma/wp-content/uploads/2020/09/onee-e1641485869149.jpg" alt="">
        </div>
        <div class="adminCreationFormTwo">
                <h1 style="color: #058FC1">Se connecter</h1>
            <br>
            <span>Veuillez remplir tous les champs marqués en rouge.</span>
        <form action={{ route('login') }} method="POST">
            @csrf
            <div class="inputLabel">
                <input type="email" id="a" class="input-field" name="email">
                <label for="" class="input-label" id="z">Email d'utilisateur  <span>*</span></label>
            </div>
            <div class="inputLabel">
                <input type="password" id="e" class="input-field" name="password">
                <label for="" class="input-label" id="r">Password  <span>*</span></label>
            </div>
            <div style="margin-top: 30px">
                <button type="submit">Connecter</button>
            </div>
        </form>
        </div>
    </div>
</div>
<x-foo_ter/>
<script src="/js/main.js"></script>
</body>
</html>









