<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Seance;
use App\Models\Paymenteleve;
use App\Models\Groupe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class EleveController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search=$request->input('search');
        
        $eleves = Eleve::when($search, function ($query, $search) {
            return $query->whereRaw('LOWER(nom_pr_eleve_fr) LIKE ?', ['%' . strtolower($search) . '%'])
                                     ->orWhere('nom_pr_eleve_ar', 'like', "%{$search}%");
        })->orderBy('classe_lycee')->paginate(20);
        $groupes= Groupe::all();
        // dd($eleves);
        $seances = Seance::all();

        // Tableau pour stocker le résultat pour chaque élève
        $resultats = [];

        foreach ($eleves as $eleve) {
                

            // Récupérer les séances payées de l'élève
            $paidSeancesIds = $eleve->paidseances ?? [];

            // Récupérer les séances où l'élève est présent
            $seancesPresentIds = [];

            foreach ($seances as $seance) {
                if (in_array($eleve->id, $seance->eleves_presents)) {
                    $seancesPresentIds[] = $seance->id;
                }
            }
            $eleve['toutesPayees'] = empty(array_diff($seancesPresentIds, $paidSeancesIds));
        }
        //  dd($eleves);
        return view('Admin.Eleve.index',compact('eleves','groupes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  dd($request);
        
        
    $rules = array(
        'nom_pr_eleve_fr'       => 'required',
        'nom_pr_eleve_ar'       => 'required',
        'tel'      => 'required'
    );

    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
        return redirect()->route('eleves.index')
        ->with('Error','Vérifiez vos champs.');
    } else {
        // Vérifier si l'élève existe déjà
        $eleveExiste = Eleve::where('nom_pr_eleve_fr', $request->nom_pr_eleve_fr)
            ->orWhere('nom_pr_eleve_ar', $request->nom_pr_eleve_ar)
            ->where('classe_lycee', $request->classe_lycee)
            ->exists();
            if ($eleveExiste) {
                // Retourner une erreur si l'élève existe déjà
                
                    $notification = array(
                        'message' => 'Cet élève est déjà enregistré.',
                        'alert-type' => 'Error'
                    );
                    return redirect()->route('eleves.index')
                    ->with($notification);
            }else {
                $montant = [];
                for ($month = 1; $month <= 12; $month++) {
                    $montant[$month] = 0;
                }
        // store eleve
        $eleve = new Eleve;
        $eleve->nom_pr_eleve_fr = $request-> nom_pr_eleve_fr;
        $eleve->nom_pr_eleve_ar = $request-> nom_pr_eleve_ar;
        $eleve->tel = $request-> tel;
        $eleve->tel_parent = $request-> tel_parent;
        $eleve->type = $request-> type;
        $eleve->classe_lycee      =  $request-> classe_lycee;
        $eleve->lycee      =  $request-> lycee;
        $eleve->montant      =  $montant;
        $eleve->save();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
        // store groupes
        // Attacher les groupes dans la table pivot
    $eleve->groupes()->attach($request->groupes);
        

        // redirect
        $notification = array(
            'message' => 'Nouveau Elève crée avec succés.',
            'alert-type' => 'success'
        );
        return redirect()->route('eleves.index')
        ->with($notification);
    }}

        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $eleve = Eleve::find($id);
        $g=['1','2'];
        $groupes = Groupe::whereIn('id', $g)->get();
            dd($groupes);
       
        dd($eleve->groupes);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    { 
        $eleve = Eleve::find($id);
        $eleve['groupes']=$eleve->groupes->toArray(); 
                return response()->json([
                               'success' => true,
                                'data' => $eleve 
                                  ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        
        $rules = array(
            'nom_pr_eleve_fr'       => 'required',
            'nom_pr_eleve_ar'       => 'required',
            'tel'      => 'required'
        );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $notification = array(
                    'message' => 'Vérifiez vos champs.',
                    'alert-type' => 'Error'
                );
                return redirect()->route('eleves.index')
                ->with($notification);
                
            } else {
                // update
            $eleve = Eleve::findOrFail($id);
            $ancienGroupes=$eleve['groupes'];
            $eleve->nom_pr_eleve_fr = $request-> nom_pr_eleve_fr;
            $eleve->nom_pr_eleve_ar = $request-> nom_pr_eleve_ar;
            $eleve->tel = $request-> tel;
            $eleve->tel_parent = $request-> tel_parent;
            $eleve->type = $request-> type;
            $eleve->classe_lycee      =  $request-> classe_lycee;
            $eleve->lycee      =  $request-> lycee;
                $eleve->save();
            if ($eleve->groupes->isNotEmpty()) {
                    // Détacher tous les groupes
                    $eleve->groupes()->detach();
                }
            $eleve->groupes()->attach($request->groupes);
            

                return response()->json(['success' => true,    
                       ]); 
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $eleve = Eleve::find($id);
        
        $eleve->groupes()->detach();
        $eleve->delete();
    
        // redirect
        $notification = array(
            'message' => 'Eleve supprimé avec succés.',
            'alert-type' => 'warning'
        );
        return redirect()->route('eleves.index')
        ->with($notification);
    }
}
