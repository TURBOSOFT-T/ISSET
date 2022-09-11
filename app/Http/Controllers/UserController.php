<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(request()->ajax()) {
            $query =User::query();
            $query->select([
                'users.id',
                'users.name',
                'users.prenom',
                'users.role',
                'users.email'
            ]);

            return datatables()->of($query)
                ->addColumn('action', 'action_datatable')
                ->editColumn('action', 'user.actionTable')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('user.list');
    }

    public function viewcreate()
    {
        return view('user.create');
    }

    protected function register_user(Request $request)
    {
        $request->validate([
            'name' => ['required','max:255'],
            'prenom' => ['required','max:255'],
            'role' => ['required'],
            'email' => ['required', 'max:255', 'unique:users'],
            'password' => ['required','min:8', 'confirmed']
        ],
            [
                'role.required' => 'Le role est obligatoire.',
                'name.required' => 'Le nom est obligatoire.',
                'name.max' => 'Le nom ne doit pas dépasser 255 caractère.',
                'prenom.required' => 'Le prenom est obligatoire.',
                'prenom.max' => 'Le Prenom ne doit pas dépasser 255 caractère.',
                'email.required' => 'L\'adresse Email est obligatoire.',
                'email.max' => 'L\'adresse email ne doit pas dépasser 255 caractères.',
                'email.unique' => 'Cet email est déjà utilisé',
                'password.required' => 'Le Mot de passe est obligatoire.',
                'password.min' => 'Le Mot de passe doit dépasser au moins 8 caractères.',
                'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.'
            ]);

        $create =  User::create([
            'name' => $request->input('name'),
            'prenom' => $request->input('prenom'),
            'telephone' => $request->input('telephone'),
            'role' => $request->input('role'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        return redirect('/users')->with('success','Utilisateur enregistré avec succes');

    }

    public function delete(Request $request)
    {
        $agent = User::where('id',$request->id)->delete();

        return Response()->json($agent);
    }

    public function compte(Request $request){

        $list_user = User::find(Auth::user()->id);
        return view('user.compte', compact('list_user'));

    }

    public function modifierCompte(Request $request){

        $request->validate([
            'name' => ['required','max:255'],
            'prenom' => ['required','max:255'],
            'email' => ['required', 'max:255']
        ],
            [
                'name.required' => 'Le nom est obligatoire.',
                'name.max' => 'Le nom ne doit pas dépasser 255 caractère.',
                'prenom.required' => 'Le prenom est obligatoire.',
                'prenom.max' => 'Le prenom ne doit pas dépasser 255 caractère.',
                'email.required' => 'L\'adresse email est obligatoire.',
                'email.max' => 'L\'adresse email ne doit pas dépasser 255 caractères.',
                'email.unique' => 'Cet email est déjà utilisé'
            ]);

        $modifier_agent = new User();

        if(!empty($request->input('password'))){

            $modifier_agent->where('id',$request->input('id_user'))->update([
                'name' => $request->input('name'),
                'telephone' => $request->input('telephone'),
                'prenom' => $request->input('prenom'),
                'role' => $request->input('role'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password'))
            ]);
        }
        else{

            $modifier_agent->where('id',$request->input('id_user'))->update([
                'name' => $request->input('name'),
                'prenom' => $request->input('prenom'),
                'telephone' => $request->input('telephone'),
                'role' => $request->input('role'),
                'email' => $request->input('email')
            ]);
        }



        return redirect('/account')->with('success','Informations du compte modifiés avec succes');

    }


    public function details(Request $request){

        $list_user = User::find($request->id);
        return view('user.details', compact('list_user'));

    }

    public function modifier(Request $request){

        $modifier_agent = new User();
        $modifier_agent->where('id',$request->input('id_user'))->update([
            'name' => $request->input('name'),
            'prenom' => $request->input('prenom'),
            'telephone' => $request->input('telephone'),
            'role' => $request->input('role'),
            'email' => $request->input('email')
        ]);

        return redirect('/users')->with('success','Informations modifiés avec succes');

    }
}
