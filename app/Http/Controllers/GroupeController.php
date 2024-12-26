<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use App\Models\Niveau;
use App\Models\Matiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GroupeController extends Controller
{ 
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groupes = Groupe::all();
        $niveaux= Niveau::all();
        $matieres= Matiere::all();
        // dd($groupes);
        return view('Admin.Groupe.index',compact('groupes','niveaux','matieres'));
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
        
    //    dd($request);
    $rules = array(
        'nom_groupe'       => 'required',
        'niveau_id'      => 'required',
        'matiere_id'      => 'required'
    );
    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
        return redirect()->route('groupes.index')
        ->with('Error','Vérifiez vos champs.');
    } else {
        // store
        $groupe = new Groupe;
        $groupe->nom_groupe = $request-> nom_groupe;
        $groupe->niveau_id      =  $request-> niveau_id;
        $groupe->matiere_id      =  $request-> matiere_id;
        $groupe->save();

        // redirect
        $notification = array(
            'message' => 'Nouveau Groupe crée avec succés.',
            'alert-type' => 'success'
        );
        return redirect()->route('groupes.index')
        ->with($notification);
    }

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Groupe $groupe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    { 
        $groupe = Groupe::find($id); 
                return response()->json([
                               'success' => true,
                                'data' => $groupe 
                                  ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Groupe $groupe)
    {
        
        
               $rules = array(
                'nom_groupe'       => 'required',
                'niveau_id'      => 'required',
                'matiere_id'      => 'required'
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->route('groupes.index')
                ->with('Error','Vérifiez vos champs.');
            } else {
                // update
                // $groupe = Groupe::find(id);
                $groupe->nom_groupe = $request-> nom_groupe;
                $groupe->niveau_id      =  $request-> niveau_id;
                $groupe->matiere_id      =  $request-> matiere_id;
                $groupe->save();
        
                // redirect
                // return redirect()->route('groupes.index')
                // ->with('success','Groupe modifiée avec succés.');

                return response()->json(['success' => true,    
                       ]); 
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Groupe $groupe)
    {
        $groupe->delete();
    
        // redirect
        $notification = array(
            'message' => 'Groupe supprimé avec succés.',
            'alert-type' => 'warning'
        );
        return redirect()->route('groupes.index')
        ->with($notification);
    }
}
