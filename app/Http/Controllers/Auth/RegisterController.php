<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required','max:255'],
            'matricule' => ['required','max:255'],
            'prenom' => ['required','max:255'],
            'email' => ['required', 'max:255', 'unique:agents'],
            'password' => ['required','min:8', 'confirmed'],
        ],[
            'matricule.required' => 'Le Matricule est obligatoire.',
            'matricule.max' => 'Le Matricule ne doit pas dépasser 255 caractère.',
            'name.required' => 'Le Nom est obligatoire.',
            'name.max' => 'Le Nom ne doit pas dépasser 255 caractère.',
            'prenom.required' => 'Le Prenom est obligatoire.',
            'prenom.max' => 'Le Prenom ne doit pas dépasser 255 caractère.',
            'email.required' => 'L\'Adresse Email est obligatoire.',
            'email.max' => 'L\'Adresse Email ne doit pas dépasser 255 caractères.',
            'email.unique' => 'Cet email est déjà utilisé',
            'password.required' => 'Le Mot de passe est obligatoire.',
            'password.min' => 'Le Mot de passe doit dépasser au moins 8 caractères.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.'
            ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'matricule' => $data['matricule'],
            'prenom' => $data['prenom'],
            'fonction' => $data['fonction'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

    }
}
