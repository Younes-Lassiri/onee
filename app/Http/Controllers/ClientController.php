<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Admin;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function sendDemande(Request $request){
        
        $request->validate([
            'fn'=> 'required|regex:/^[a-zA-Z]+$/',
            'ln'=> 'required|regex:/^[a-zA-Z]+$/',
            'cin'=> 'required|alpha_num',
            'ad'=> 'required',
            'telephone'=> 'required',
            'type_activite'=> 'required',
            'puissance_demande'=> 'required',
        ]);
        
        $newClient = [
            'firstName' =>$request->fn,
            'lastName' => $request->ln,
            'cin' => $request->cin,
            'address' => $request->ad,
            'telephone' => $request->telephone,
            'type_activite' => $request->type_activite == 'Autre activité à préciser'? $request->type_activitev : $request->type_activite,
            'puissance_demande' => $request->puissance_demande
        ];

        $client = Client::create($newClient);
        return redirect()->route('home')->with('succeSend', 'Votre demande a été envoyée avec succès. Nous vous remercions pour votre soumission.');
    }

    public function indexClient(){
        $clients = Client::get();

        return view('listClient', compact('clients'));
    }

    public function postBlade(Request $request){
        $id = $request->id;
        return view('postBlade', compact('id'));
    }

    public function postStore(Request $request)
{
    $request->validate([
        'mat' => 'required',
        'np' => 'required',
        'pi' => 'required',
        'pa' => 'required',
        'dis' => 'required',
        'ln' => 'required',
        'ln1' => 'required',
        'ln2' => 'required',
        'ln3' => 'required',
        'lna' => 'required',
        'lna1' => 'required',
        'lna2' => 'required',
        'lna3' => 'required',
        'ten' => 'required',
        'tx' => 'required',
        'panv' => 'required',
        'txnv' => 'required',
    ]);
    $newPost = [
        'matricule' => $request->mat,
        'nomPost' => $request->np,
        'pi' => $request->pi,
        'pa' => $request->pa,
        'dis' => $request->dis,
        'ln' => $request->ln,
        'ln1' => $request->ln1,
        'ln2' => $request->ln2,
        'ln3' => $request->ln3,
        'lna' => $request->lna,
        'lna1' => $request->lna1,
        'lna2' => $request->lna2,
        'lna3' => $request->lna3,
        'tension' => $request->ten
    ];

    $post = Post::create($newPost);

    $theClient = Client::findOrFail($request->id);
    $theClient->matricule_id = $post->id;
    $theClient->save();

    return redirect()->route('listClient')->with('succeePost', 'Le poste a été ajouté avec succès.');
}
    public function signupBlade()
    {
        return view('signUp');
    }
    public function signup(Request $request)
    {
        $request->validate([
            'fnu' => 'required|regex:/^[a-zA-Z]+$/',
            'lnu' => 'required|regex:/^[a-zA-Z]+$/',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:8|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]+$/|confirmed',
        ]);

        $newAdmin = [
            'name' => $request->fna. " ". $request->lna,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        $admin = Admin::create($newAdmin);

        return redirect()->route('home')->with('signUp', 'Votre compte a été créé avec succès');
    }


    public function loginBlade(){
        return view('loginBlade');
    }

    public function login(Request $request){

        $values = ['email' => $request->email,'password' => $request->password];
        if(Auth::attempt($values)){
            $request->session()->regenerate();
            return redirect()->route('home')->with('loginSucce', 'Connexion réussie. Bienvenue!');
        }else{
            return redirect()->route('login.blade')->with('failedLogin', 'Désolé, votre adresse e-mail ou mot de passe est incorrect. Veuillez réessayer');

        }
    }

    public function logout(){
        session()->flush();
        Auth::logout();
        return redirect()->route('login.blade')->with('logOut', 'Déconnexion réussie. À bientôt!');

    }

    public function cableBlade(Request $request){
        $id = $request->id;
        return view('cableBlade', compact('id'));
    }

    public function demandePdf(Request $request){
        $client = Client::findOrFail($request->id);
        return view('demandePdf', compact('client'));
    }

    public function delete(Request $request)
    {
        $client = Client::findOrFail($request->id);

        $newC = $client->delete();
        return redirect()->route('listClient')->with('clientDelete','Le client a etait supprimer avec succé');
}
}
