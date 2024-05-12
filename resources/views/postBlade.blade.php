<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="http://www.one.org.ma/images/Txt_ONEE.jpg">
    <title>ONEE</title>
    <link rel="stylesheet" href="/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
        <div class="landing-sectionHead">
            <img src="http://www.one.org.ma/FR/Projet_Simulation/img/Bann_accueil.gif" alt="">
        </div>
        <x-admin_navbar/>
        <div class="AddPostSection">
            <form action="{{ route('p.store', $id) }}" method="POST">
                @csrf
                <div class="addPost">
                    <div class="addPostone">Affectation d'un post</div>
                    <div class="addPosttwo">
                        <div class="label">Nom de poste</div>
                        <div><input type="text" name="np" class="@if($errors->has('np')) notValidate @endif" value="{{ old('np') }}"></div>
                        <div class="label">Matricule</div>
                        <div><input type="text" name="mat" class="@if($errors->has('mat')) notValidate @endif" value="{{ old('mat') }}"></div>
                        <div class="label">PI</div>
                        <div><input type="text" name="pi" class="@if($errors->has('pi')) notValidate @endif" value="{{ old('pi') }}"></div>
                        <div class="label">PA</div>
                        <div><input type="text" name="pa" class="@if($errors->has('pa')) notValidate @endif" value="{{ old('pa') }}"></div>
                        <div class="label">Disjoncteur Pt</div>
                        <div><input type="text" name="dis" class="@if($errors->has('dis')) notValidate @endif" value="{{ old('dis') }}"></div>
                    </div>
                    <div class="addPostthree">
                        <div class="label" style="margin-top: 43px">Ampérage</div>
                            <div class="testFormTwoNineThreeP" style="margin-bottom: 60px; width: 60%">
                                <input type="hidden" name="ten" id="amperage" value="{{ old('ten') }}">
                                <div class="dropdown testTwotheDropdownP @if ($errors->has('ten')) notValidate @endif">
                                    <div class="dropdown-btn notChoosed">Ampérage</div>
                                    <ul class="testdropdown-list">
                                        @php
                                            $values = [
                                                10,
                                                15,
                                                40,
                                                50,
                                                60,
                                                80,
                                                100,
                                                120
                                            ];
                            
                                        @endphp
                                        @foreach ($values as $value)
                                            <li>{{ $value }}</li>
                                        @endforeach
                                    </ul>
                
                                </div>
                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const dropdownBtn = document.querySelector(".testFormTwoNineThreeP .dropdown-btn");
                                        const dropdownList = document.querySelector(".testFormTwoNineThreeP .testdropdown-list");
                                        let inpGender = document.querySelector('#amperage');
                                
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
                        <div class="label">Tx0 charge pt</div>
                        <div><input type="text" name="tx" class="@if($errors->has('tx')) notValidate @endif" value="{{ old('tx') }}"></div>
                        <div class="label">Panv</div>
                        <div><input type="text" name="panv" class="@if($errors->has('panv')) notValidate @endif" value="{{ old('panv') }}"></div>
                        <div class="label">Txnv charge pt</div>
                        <div><input type="text" name="txnv" class="@if($errors->has('txnv')) notValidate @endif" value="{{ old('txnv') }}"></div>
                    </div>
                    <div class="addPostfive">
                        <div class="title">Charge avant raccordement</div>
                        <div class="label">In Av/Racc</div>
                        <div><input type="text" name="ln" class="@if($errors->has('ln')) notValidate @endif" value="{{ old('ln') }}"></div>
                        <div class="label">In Av/Racc1</div>
                        <div><input type="text" name="ln1" class="@if($errors->has('ln1')) notValidate @endif" value="{{ old('ln1') }}"></div>
                        <div class="label">In Av/Racc2</div>
                        <div><input type="text" name="ln2" class="@if($errors->has('ln2')) notValidate @endif" value="{{ old('ln2') }}"></div>
                        <div class="label">In Av/Racc3</div>
                        <div><input type="text" name="ln3" class="@if($errors->has('ln3')) notValidate @endif" value="{{ old('ln3') }}"></div>
                    </div>
            
                    <div class="addPostsix">
                        <div class="title">Charge apres raccordement</div>
                        <div class="label">In Ap/Racc</div>
                        <div><input type="text" name="lna" class="@if($errors->has('lna')) notValidate @endif" value="{{ old('lna') }}"></div>
                        <div class="label">In Ap/Racc1</div>
                        <div><input type="text" name="lna1" class="@if($errors->has('lna1')) notValidate @endif" value="{{ old('lna1') }}"></div>
                        <div class="label">In Ap/Racc2</div>
                        <div><input type="text" name="lna2" class="@if($errors->has('lna2')) notValidate @endif" value="{{ old('lna2') }}"></div>
                        <div class="label">In Ap/Racc3</div>
                        <div><input type="text" name="lna3" class="@if($errors->has('lna3')) notValidate @endif" value="{{ old('lna3') }}"></div>
                    </div>
                    <div class="addPostseven">
                        <div><button type="submit" class="press">Affecter</button></div>
                    </div>
                </div>
            </form>
        </div>

        
<x-foo_ter/>
</body>
</html>


