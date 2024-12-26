<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matieres = Matiere::all();
        // dd($matieres);
        return view('Admin.Matiere.index',compact('matieres'));
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
        'nom_mat_fr'       => 'required',
        'nom_mat_ar'      => 'required'
    );
    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
        return redirect()->route('matieres.index')
        ->with('Error','Vérifiez vos champs.');
    } else {
        // store
        $matiere = new Matiere;
        $matiere->nom_mat_fr = $request-> nom_mat_fr;
        $matiere->nom_mat_ar      =  $request-> nom_mat_ar;
        $matiere->save();

        // redirect
        return redirect()->route('matieres.index')
        ->with('success','Nouvelle matière crée avec succés.');
    }

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Matiere $matiere)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    { 
        $matiere = Matiere::find($id); 
                return response()->json([
                               'success' => true,
                                'data' => $matiere 
                                  ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Matiere $matiere)
    {
        
        
               $rules = array(
                'nom_mat_fr'       => 'required',
                'nom_mat_ar'      => 'required'
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->route('matieres.index')
                ->with('Error','Vérifiez vos champs.');
            } else {
                // update
                // $matiere = Matiere::find(id);
                $matiere->nom_mat_fr = $request-> nom_mat_fr;
                $matiere->nom_mat_ar      =  $request-> nom_mat_ar;
                $matiere->save();
        
                // redirect
                // return redirect()->route('matieres.index')
                // ->with('success','Matière modifiée avec succés.');

                return response()->json(['success' => true,    
                       ]); 
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matiere $matiere)
    {
        $matiere->delete();
    
        return redirect()->route('matieres.index')
                        ->with('success','Matière supprimée avec succés');
    }

}
