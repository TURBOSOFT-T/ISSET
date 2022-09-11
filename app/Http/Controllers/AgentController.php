<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;
use DataTables;
use Auth;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        if(request()->ajax()) {

            $query =Agent::query();

                $query->select([
                    'agents.id',
                    'agents.matricule',
                    'agents.name',
                    'agents.prenom',
                    'agents.fonction',
                    'agents.email'
                ]);

            return datatables()->of($query)
                ->addColumn('action', 'action_datatable')
                ->editColumn('action', 'agent.actionTable')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('agent.list');
    }
    public function viewcreate()
    {
        return view('agent.create');
    }

    protected function register_agent(Request $request)
    {
        $request->validate([
            'name' => ['required','max:255'],
            'matricule' => ['required','max:255'],
            'prenom' => ['required','max:255'],
            'email' => ['required', 'max:255', 'unique:agents'],
        ],
            [
                'matricule.required' => 'Le Matricule est obligatoire.',
                'matricule.max' => 'Le Matricule ne doit pas dépasser 255 caractère.',
                'name.required' => 'Le Nom est obligatoire.',
                'name.max' => 'Le Nom ne doit pas dépasser 255 caractère.',
                'prenom.required' => 'Le Prenom est obligatoire.',
                'prenom.max' => 'Le Prenom ne doit pas dépasser 255 caractère.',
                'email.required' => 'L\'Adresse Email est obligatoire.',
                'email.max' => 'L\'Adresse Email ne doit pas dépasser 255 caractères.',
                'email.unique' => 'Cet email est déjà utilisé'
            ]);

        $create =  Agent::create([
            'name' => $request->input('name'),
            'matricule' => $request->input('matricule'),
            'prenom' => $request->input('prenom'),
            'fonction' => $request->input('fonction'),
            'email' => $request->input('email'),
            'id_user' => $request->input('id_user')
        ]);

        return redirect('/agents')->with('success','Agent enregistré avec succes');

    }

    public function details(Request $request){

        $list_agent = Agent::find($request->id);
        return view('agent.details', compact('list_agent'));

    }

    public function modifier(Request $request){

        $modifier_agent = new Agent();
        $modifier_agent->where('id',$request->input('id_agent'))->update([
            'name' => $request->input('name'),
            'matricule' => $request->input('matricule'),
            'prenom' => $request->input('prenom'),
            'fonction' => $request->input('fonction'),
            'email' => $request->input('email')
        ]);

        return redirect('/agents')->with('success','Informations modifiés avec succes');

    }
    public function modifierCompte(Request $request){

        $request->validate([
            'name' => ['required','max:255'],
            'matricule' => ['required','max:255'],
            'prenom' => ['required','max:255'],
            'email' => ['required', 'max:255']
        ],
            [
                'matricule.required' => 'Le matricule est obligatoire.',
                'matricule.max' => 'Le matricule ne doit pas dépasser 255 caractère.',
                'name.required' => 'Le nom est obligatoire.',
                'name.max' => 'Le nom ne doit pas dépasser 255 caractère.',
                'prenom.required' => 'Le prenom est obligatoire.',
                'prenom.max' => 'Le prenom ne doit pas dépasser 255 caractère.',
                'email.required' => 'L\'adresse email est obligatoire.',
                'email.max' => 'L\'adresse email ne doit pas dépasser 255 caractères.',
                'email.unique' => 'Cet email est déjà utilisé'
            ]);

        $modifier_agent = new Agent();


            $modifier_agent->where('id',$request->input('id_agent'))->update([
                'name' => $request->input('name'),
                'matricule' => $request->input('matricule'),
                'prenom' => $request->input('prenom'),
                'fonction' => $request->input('fonction'),
                'email' => $request->input('email')
            ]);

        return redirect('/mon-compte/'.$request->input('id_agent'))->with('success','Informations du compte modifiés avec succes');

    }

    public function delete(Request $request)
    {
        $agent = Agent::where('id',$request->id)->delete();

        return Response()->json($agent);
    }
}
