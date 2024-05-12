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

    @if (session()->has('signUp'))
        <script>
            Swal.fire({
                position: "center-center",
                icon: "success",
                title: "{{ session('signUp') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif
    @if (session()->has('succeSend'))
        <script>
            Swal.fire({
                position: "center-center",
                icon: "success",
                title: "{{ session('succeSend') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif
    @if (session()->has('loginSucce'))
        <script>
            Swal.fire({
                position: "center-center",
                icon: "success",
                title: "{{ session('loginSucce') }}",
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
                <h1 style="color: #058FC1">Envoyer un demande</h1>
            <br>
            <span>Veuillez remplir tous les champs marqués en rouge.</span>
        <form action={{ route('send') }} method="POST">
            @csrf
            <div class="theGrid">
                <div class="inputLabel">
                    <input type="text" id="w" class="input-field @if($errors->has('fn')) notValidate @endif" name="fn" value="{{ old('fn') }}">
                    <label for="" class="input-label" id="x">Prenom de client  <span>*</span></label>
                </div>
                <div class="inputLabel">
                    <input type="text" id="l" class="input-field @if($errors->has('ln')) notValidate @endif" name="ln" value="{{ old('ln') }}">
                    <label for="" class="input-label" id="m">Nom de client  <span>*</span></label>
                </div>
            </div>
            <div class="theGridd">
                
                <div class="inputLabel">
                    <input type="text" id="c" class="input-field @if($errors->has('ad')) notValidate @endif" name="ad" value="{{ old('ad') }}">
                    <label for="" class="input-label" id="v">Address  <span>*</span></label>
                </div>
                <div class="inputLabel">
                    <input type="text" id="b" class="input-field @if($errors->has('cin')) notValidate @endif" name="cin" value="{{ old('cin') }}">
                    <label for="" class="input-label" id="n">Cin  <span>*</span></label>
                </div>
            </div>
            <div class="inputLabel">
                <input type="number" id="a" class="input-field @if($errors->has('telephone')) notValidate @endif" name="telephone" value="{{ old('telephone') }}">
                <label for="" class="input-label" id="z">Telephone  <span>*</span></label>
            </div>
            <div class="theGrid">
                <div class="testFormTwoNineThree">
                    <input type="hidden" name="type_activite" id="messageObject" value="{{ old('type_activite') }}" onchange="handleActivite()">
                    <div class="dropdown testTwotheDropdown @if ($errors->has('type_activite')) notValidate @endif">
                        <div class="dropdown-btn notChoosed">Type d'activité</div>
                        <ul class="testdropdown-list">
                            @php
                                $types = [
                                    "Provisoire",
                                    "Maison individuelle",
                                    "Villa",
                                    "Appartement",
                                    "Immeuble",
                                    "Local administratif",
                                    "Local commercial",
                                    "Mosquée",
                                    "Pompage",
                                    "Moulin",
                                    "Soudure",
                                    "Huilerie",
                                    "Menuiserie",
                                    "Coopérative Laitière",
                                    "Autre activité à préciser"
                                ];
                
                            @endphp
                            @foreach ($types as $type)
                                <li>{{ $type }}</li>
                            @endforeach
                        </ul>
                        <label for="" class="">Type d'activité  <span>*</span></label>
    
                    </div>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            const dropdownBtn = document.querySelector(".testFormTwoNineThree .dropdown-btn");
                            const dropdownList = document.querySelector(".testFormTwoNineThree .testdropdown-list");
                            let inpGender = document.querySelector('#messageObject');
                    
                            function updateDropdownText() {
                                if (inpGender.value.trim() !== '') {
                                    dropdownBtn.textContent = inpGender.value;
                                    dropdownBtn.classList.remove('notChoosed');
                                    dropdownBtn.classList.add('choosed');
                                } else {
                                    dropdownBtn.classList.remove('choosed');
                                    dropdownBtn.classList.add('notChoosed');
                                }
                            }
                    
                            updateDropdownText();
                    
                            inpGender.addEventListener("input", function() {
                                updateDropdownText();
                                dropdownList.style.display = 'block'; 
                            });
                    
                            dropdownBtn.addEventListener("click", function() {
                                dropdownList.style.display = dropdownList.style.display === "block" ? "none" : "block";
                            });
                    
                            dropdownList.addEventListener("click", function(e) {
                                if (e.target.tagName === "LI") {
                                    dropdownBtn.textContent = e.target.textContent;
                                    dropdownBtn.classList.remove('notChoosed');
                                    dropdownBtn.classList.add('choosed');
                                    dropdownList.style.display = "none";
                                    inpGender.value = e.target.textContent;
                    
                                    const event = new Event('change');
                                    inpGender.dispatchEvent(event);
                                }
                            });
                        });
                    </script>
                </div>
                <div class="testFormTwoNineThreeP">
                    <input type="hidden" name="puissance_demande" id="puissance" value="{{ old('puissance_demande') }}">
                    <div class="dropdown testTwotheDropdownP @if ($errors->has('puissance_demande')) notValidate @endif">
                        <div class="dropdown-btn notChoosed">Puissance demandé</div>
                        <ul class="testdropdown-list">
                            @php
                                $values = [
                                    6582,
                                    9873,
                                    26327,
                                    32909,
                                    39491,
                                    42122,
                                    52653,
                                    63183
                                ];
    
                
                            @endphp
                            @foreach ($values as $value)
                                <li>{{ $value }}</li>
                            @endforeach
                        </ul>
                        <label for="" class="">Puissance demandé  <span>*</span></label>
    
                    </div>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            const dropdownBtn = document.querySelector(".testFormTwoNineThreeP .dropdown-btn");
                            const dropdownList = document.querySelector(".testFormTwoNineThreeP .testdropdown-list");
                            let inpGender = document.querySelector('#puissance');
                    
                            function updateDropdownText() {
                                if (inpGender.value.trim() !== '') {
                                    dropdownBtn.textContent = inpGender.value;
                                    dropdownBtn.classList.remove('notChoosed');
                                    dropdownBtn.classList.add('choosed');
                                }else{
                                    dropdownBtn.classList.remove('choosed');
                                    dropdownBtn.classList.add('notChoosed');
                                }
                            }
                    
                            updateDropdownText();
                    
                            inpGender.addEventListener("input", updateDropdownText);
                    
                            dropdownBtn.addEventListener("click", function() {
                                dropdownList.style.display = dropdownList.style.display === "block" ? "none" : "block";
                            });
                    
                            dropdownList.addEventListener("click", function(e) {
                                if (e.target.tagName === "LI") {
                                    dropdownBtn.textContent = e.target.textContent;
                                    dropdownBtn.classList.remove('notChoosed');
                                    dropdownBtn.classList.add('choosed');
                                    dropdownList.style.display = "none";
                                    inpGender.value = e.target.textContent;
                                }
                            });
                        });
                    </script>
                    
                    
                </div>
            </div>
            <div class="inputLabel" id="autreActivite">
                <input type="text" id="a" class="input-field @if($errors->has('type_activitev')) notValidate @endif" name="type_activitev" value="{{ old('type_activitev') }}">
                <label for="" class="input-label" id="z">Autre Type d'activité  <span>*</span></label>
            </div>
            <div class="sendDemandeBtn">
                <button type="submit">Confirme</button>
            </div>
        </form>
        </div>
    </div>
    
</div>
<x-foo_ter/>

<script>
    let autreInput = document.querySelector('#autreActivite');
    let sendDemandeBtn = document.querySelector('.sendDemandeBtn');
    function handleActivite(){
    let activitInp = document.querySelector('#messageObject').value;
        if (activitInp === 'Autre activité à préciser') {
            autreInput.style.display = 'block';
            sendDemandeBtn.style.marginTop = '30px';
        }else{
            autreInput.style.display = 'none';
            sendDemandeBtn.style.marginTop = '110px';
        }
    }
</script>
<script src="/js/main.js"></script>
</body>
</html>









