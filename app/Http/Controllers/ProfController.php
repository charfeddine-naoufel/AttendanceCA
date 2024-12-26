<?php

namespace App\Http\Controllers;

use App\Models\Prof;
use App\Models\Groupe;
use App\Models\Matiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profs = Prof::all();
        $matieres = Matiere::all();
        $groupes= Groupe::all();
        return view('Admin.Prof.index',compact('profs','matieres','groupes'));
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
        'nom_pr_prof_fr'       => 'required',
        'nom_pr_prof_ar'       => 'required',
        'tel_prof'      => 'required',
        'matiere_id'      => 'required'
    );
    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
        $notification = array(
            'message' => 'Vérifiez vos champs.',
            'alert-type' => 'Error'
        );
        return redirect()->route('profs.index')
        ->with($notification);
    } else {
        // store Prof
        $prof = new Prof;
        $prof->nom_pr_prof_fr = $request-> nom_pr_prof_fr;
        $prof->nom_pr_prof_ar = $request-> nom_pr_prof_ar;
        $prof->tel_prof = $request-> tel_prof;
        $prof->matiere_id = $request-> matiere_id;
        
        $prof->save();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
        // Attacher les groupes dans la table pivot
        $prof->groupes()->attach($request->groupes);       

        // redirect
        $notification = array(
            'message' => 'Nouveau Groupe crée avec succés.',
            'alert-type' => 'success'
        );
        return redirect()->route('profs.index')
        ->with($notification);
    }

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Prof $prof)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    { 
        $prof = Prof::find($id);
        $prof['groupes']=$prof->groupes->toArray(); 
                return response()->json([
                               'success' => true,
                                'data' => $prof 
                                  ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        
        $rules = array(
            'nom_pr_Prof_fr'       => 'required',
            'nom_pr_Prof_ar'       => 'required',
            'tel_prof'      => 'required',
            'matiere_id'      => 'required'
        );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $notification = array(
                    'message' => 'Vérifiez vos champs.',
                    'alert-type' => 'Error'
                );
                return redirect()->route('profs.index')
                ->with($notification);
                
            } else {
                // update
            $prof = Prof::find($id);
            $prof->nom_pr_prof_fr = $request-> nom_pr_prof_fr;
            $prof->nom_pr_prof_ar = $request-> nom_pr_prof_ar;
            $prof->tel_prof = $request-> tel_prof;
            $prof->matiere_id = $request-> matiere_id;
                $prof->save();
            $prof->groupes()->detach();
            // Attacher les groupes dans la table pivot
             $prof->groupes()->attach($request->groupes);
        
                

                return response()->json(['message' => 'Prof modifié avec succés.',
                'alert-type' => 'info'    
                       ]); 
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $prof = Prof::find($id);
        
        $prof->groupes()->detach();
        $prof->delete();
    
        // redirect
        $notification = array(
            'message' => 'Prof supprimé avec succés.',
            'alert-type' => 'warning'
        );
        return redirect()->route('profs.index')
        ->with($notification);
    }
}
