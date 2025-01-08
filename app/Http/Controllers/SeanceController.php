<?php

namespace App\Http\Controllers;

use App\Models\Seance;
use App\Models\Eleve;
use App\Models\Groupe;
use App\Models\Matiere;
use App\Models\Prof;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SeanceController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seances = Seance::orderBy('date', 'DESC')->orderBy('heure_deb', 'desc')->get();
        $groupes= Groupe::all();
        $matieres= Matiere::all();
        $profs= Prof::all();
        $groups = Groupe::with('eleves')->get();

    // Transformer en tableau où la clé est groupe_id et la valeur est la liste des élèves
    $eleves = $groups->mapWithKeys(function ($groupe) {
        return [$groupe->id => $groupe->eleves];
    });
        
        //  dd($eleves);
        return view('Admin.Seance.index',compact('seances','groupes','matieres','profs','eleves'));
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
       
        
        
        $request['user_id']=Auth::user()->first()->id;
         
    $rules = array(
        'matiere_id'       => 'required',
        'groupe_id'       => 'required',
        'prof_id'      => 'required',
        'date'      => 'required',
        'heure_deb'      => 'required',
        'heure_fin'      => 'required',
        'user_id'      => 'required',
    );
    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
        return redirect()->route('seances.index')
        ->with('Error','Vérifiez vos champs.');
    } else {
        if (is_null($request-> presents)) {
            $request['presents']=[];
        }
        $allStudents = Groupe::whereId($request-> groupe_id)->first()->eleves->pluck('id')->toArray();
        // dd($request['presents']);
        $request['absents'] = array_diff($allStudents, $request-> presents);   
        //  dd($request['presents'],'---',$request['absents']);    
         // store seance

        $seance = new Seance;
        $seance->matiere_id = $request-> matiere_id;
        $seance->groupe_id = $request-> groupe_id;
        $seance->prof_id = $request-> prof_id;
        $seance->date = $request-> date;
        $seance->heure_deb      =  $request-> heure_deb;
        $seance->heure_fin      =  $request-> heure_fin;
        $seance->user_id      =  $request-> user_id;
        $seance->salle      =  $request-> salle;
        $seance->eleves_presents      =  $request-> presents;
        $seance->eleves_absentss      =  $request-> absents;
        // dd($seance->eleves_presents,'---', $seance->eleves_absentss);   
        $seance->save();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
        
        

        // redirect
        $notification = array(
            'message' => 'Nouvelle séance crée avec succés.',
            'alert-type' => 'success'
        );
        return redirect()->route('seances.index')
        ->with($notification);
    }

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Eleve $seance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    { 
        $seance = Seance::find($id);
        $seance['groupes']=$seance->groupes->toArray(); 
                return response()->json([
                               'success' => true,
                                'data' => $seance 
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
                return redirect()->route('seances.index')
                ->with($notification);
                
            } else {
                // update
            $seance = Seance::findOrFail($id);
            $seance->nom_pr_eleve_fr = $request-> nom_pr_eleve_fr;
            $seance->nom_pr_eleve_ar = $request-> nom_pr_eleve_ar;
            $seance->tel = $request-> tel;
            $seance->tel_parent = $request-> tel_parent;
            $seance->classe_lycee      =  $request-> classe_lycee;
            $seance->lycee      =  $request-> lycee;
                $seance->save();
            $seance->groupes()->detach();
            // Attacher les groupes dans la table pivot
             $seance->groupes()->attach($request->groupes);
        
                // redirect
                // return redirect()->route('seances.index')
                // ->with('success','Groupe modifiée avec succés.');

                return response()->json(['success' => true,    
                       ]); 
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $seance = Seance::find($id);
        
        $seance->groupes()->detach();
        $seance->delete();
    
        // redirect
        $notification = array(
            'message' => 'Eleve supprimé avec succés.',
            'alert-type' => 'warning'
        );
        return redirect()->route('seances.index')
        ->with($notification);
    }
}
