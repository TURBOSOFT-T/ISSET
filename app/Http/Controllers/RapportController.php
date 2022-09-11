<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rapport;
use App\Models\Agent;
use DataTables;
use Auth;

class RapportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        if(request()->ajax()) {

            $query =Rapport::query();

               $query->select([
                    'rapports.id',
                    'rapports.date',
                    'rapports.id_agent',
                    'rapports.nomcomplet',
                    'rapports.nbre_tf_impactes',
                    'rapports.nbre_inscription',
                    'rapports.nbre_tf_crees'
                ]);

               /* $query->select([
                    'rapports.id',
                    'rapports.date',
                    'agents.name',
                    'rapports.nbre_tf_impactes',
                    'rapports.nbre_inscription',
                    'rapports.nbre_tf_crees',

                ])->join('agents', 'rapports.id_agent', '=', 'agents.id');*/



            return datatables()->of($query)
                ->addColumn('action', 'action_datatable')
                ->editColumn('action', 'rapport.actionTable')
                ->editColumn('date', 'rapport.actionDateAgent')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('rapport.list');
    }


    public function rapport_directeur(Request $request)
    {
 /*
        $search_agent = $request->get('search_id_agent');
        $search_date = explode(' - ', $request->input('search_id_date'));
*/


        if(request()->ajax()) {

            $query ="";

            $idagent = $request->id_agent;
            $date = explode(' - ', $request->date);

            if(!empty($date[0])){

                $from = $date[0];
                $to = $date[1];
            }
            else{
                $from = "";
                $to = "";
            }

        if(empty($idagent)){

                $query =Rapport::query();
                //@dd($idagent);
                $query->select([
                    'rapports.id',
                    'rapports.date',
                    'rapports.id_agent',
                    'rapports.nomcomplet',
                    'rapports.nbre_tf_impactes',
                    'rapports.nbre_inscription',
                    'rapports.nbre_tf_crees'
                ]);
        }

          if(!empty($idagent) && empty($from) && empty($to)){

              $query =Rapport::query();
            //@dd($idagent);
              $query->select([
                  'rapports.id',
                  'rapports.date',
                  'rapports.id_agent',
                  'rapports.nomcomplet',
                  'rapports.nbre_tf_impactes',
                  'rapports.nbre_inscription',
                  'rapports.nbre_tf_crees'
              ])->where('id_agent',$idagent);
          }

          if(empty($idagent) && !empty($from) && !empty($to)){

              $query =Rapport::query();
              $query->select([
                  'rapports.id',
                  'rapports.date',
                  'rapports.id_agent',
                  'rapports.nomcomplet',
                  'rapports.nbre_tf_impactes',
                  'rapports.nbre_inscription',
                  'rapports.nbre_tf_crees'
              ])->whereBetween('date', [date("Y-m-d",strtotime($from)), date("Y-m-d",strtotime($to))]);
          }

          if(!empty($idagent) && !empty($from) && !empty($to)){

              $query =Rapport::query();
              $query->select([
                  'rapports.id',
                  'rapports.date',
                  'rapports.id_agent',
                  'rapports.nomcomplet',
                  'rapports.nbre_tf_impactes',
                  'rapports.nbre_inscription',
                  'rapports.nbre_tf_crees'
              ])->where('id_agent',$idagent)->whereBetween('date', [date("Y-m-d",strtotime($from)), date("Y-m-d",strtotime($to))]);
          }


            return datatables()->of($query)
                ->editColumn('date', 'rapport-directeur.actionDateAgent')
                ->addIndexColumn()
                ->make(true);
        }
        return view('rapport-directeur.list');
    }



    public function rapport_export(Request $request)
    {

            $id_agent_export = $request->input('search_id_agent');
            $date_export = explode(' - ', $request->input('search_id_date'));

            $nom_agent_complet = "";
            $nom_agent = "";
            $prenom_agent = "";

            if(!empty($date_export[0])){

                $from = $date_export[0];
                $to = $date_export[1];
            }
            else{
                $from = "";
                $to = "";
            }

            $rapport_export = new Rapport();

            if(!empty($id_agent_export) && !empty($from) && !empty($to) ){

                $data_export = $rapport_export::where('id_agent',$id_agent_export)->whereBetween('date', [date("Y-m-d",strtotime($from)), date("Y-m-d",strtotime($to))])->orderBy('date', 'DESC')->get();
                $nom_agent = Agent::where('id', $id_agent_export)->pluck('name');
                $prenom_agent = Agent::where('id', $id_agent_export)->pluck('prenom');

                $nom_agent_complet = $nom_agent[0].' '.$prenom_agent[0];

            }
            elseif(!empty($id_agent_export) && empty($from) && empty($to)){


                $data_export = $rapport_export::where('id_agent',$id_agent_export)->orderBy('date', 'DESC')->get();
                $nom_agent = Agent::where('id', $id_agent_export)->pluck('name');
                $prenom_agent = Agent::where('id', $id_agent_export)->pluck('prenom');

                $nom_agent_complet = $nom_agent[0].' '.$prenom_agent[0];


            }
            elseif(empty($id_agent_export) && !empty($from) && !empty($to)){


                $data_export = $rapport_export::whereBetween('date', [date("Y-m-d",strtotime($from)), date("Y-m-d",strtotime($to))])->orderBy('date', 'DESC')->get();


            }
            elseif(empty($id_agent_export) && empty($from) && empty($to)){


                $data_export = $rapport_export::orderBy('date', 'DESC')->get();


            }

        return view('rapport-directeur.excel', compact('data_export'))->with('from',$from)->with('to',$to)->with('nom_agent_complet',$nom_agent_complet);
    }



    public function details(Request $request){

        $list_rapport = Rapport::find($request->id);
        return view('rapport.details', compact('list_rapport'));

    }


    public function modifier(Request $request){

        $modifier_rapport = new Rapport();
        $modifier_rapport->where('id',$request->input('id_rapport'))->update([
            'date' => $request->input('date'),
            'id_agent' => $request->input('id_agent'),
            'nbre_tf_impactes' => $request->input('nbre_tf_impactes'),
            'nbre_inscription' => $request->input('nbre_inscription'),
            'nbre_tf_crees' => $request->input('nbre_tf_crees')
        ]);

        return redirect('/rapports')->with('success','Informations modifiés avec succes');

    }

    protected function register_rapport(Request $request)
    {
        $request->validate([
            'date' => ['required'],
            'id_agent' => ['required']
        ],
            [
                'date.required' => 'Le champ date est obligatoire.',
                'id_agent.required' => 'Ce champ obligatoire.'

            ]);


        $rapport_verif = new Rapport();
        $verif = $rapport_verif::where('date',date("Y-m-d",strtotime($request->input('date'))))->where('id_agent',$request->input('id_agent'))->get();

        if(count($verif) > 0 ){

            return redirect('/rapports')->with('error','Vous avez déja enregistrer un rapport pour cet agent a cette date');

        }elseif(date("Y-m-d",strtotime($request->input('date'))) > date("Y-m-d",time())){

            return redirect('/rapports')->with('error','Imposssible d\'ajouter un rapport pour la date selectionner');

        }else{

            $val1=$request->input('nbre_tf_impactes');
            $val2=$request->input('nbre_inscription');
            $val3=$request->input('nbre_tf_crees');

            if(empty($request->input('nbre_tf_impactes'))){
                $val1=0;
            }

            if(empty($request->input('nbre_inscription'))){
                $val2=0;
            }

            if(empty($request->input('nbre_tf_crees'))){
                $val3=0;
            }

            $nom_agent = Agent::where('id', $request->input('id_agent'))->pluck('name');
            $prenom_agent = Agent::where('id', $request->input('id_agent'))->pluck('prenom');

            $nom_agent_complet = $nom_agent[0].' '.$prenom_agent[0];

            $create =  Rapport::create([
                'date' => date("Y-m-d",strtotime($request->input('date'))),
                'id_agent' => $request->input('id_agent'),
                'id_user' => $request->input('id_user'),
                'nomcomplet' => $nom_agent_complet,
                'nbre_tf_impactes' => $val1,
                'nbre_inscription' => $val2,
                'nbre_tf_crees' => $val3,
                'date_save' => $request->input('date_save'),

            ]);

            return redirect('/rapports')->with('success','Rapport enregistré avec succes');
        }

    }

    public function delete(Request $request)
    {
        $agent = Rapport::where('id',$request->id)->delete();

        return Response()->json($agent);
    }
}
