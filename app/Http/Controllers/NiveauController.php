<?php

namespace App\Http\Controllers;

use App\Models\Niveau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NiveauController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $niveaux = Niveau::all();
        // dd($niveaux);
        return view('Admin.Niveau.index',compact('niveaux'));
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
        'nom_niv_fr'       => 'required',
        'nom_niv_ar'      => 'required'
    );
    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
        return redirect()->route('niveaux.index')
        ->with('Error','Vérifiez vos champs.');
    } else {
        // store
        $niveau = new Niveau;
        $niveau->nom_niv_fr = $request-> nom_niv_fr;
        $niveau->nom_niv_ar      =  $request-> nom_niv_ar;
        $niveau->save();

        // redirect
        $notification = array(
            'message' => 'Nouveau niveau crée avec succés.',
            'alert-type' => 'success'
        );
        return redirect()->route('niveaux.index')
        ->with($notification);
    }

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Niveau $niveau)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    { 
        $niveau = Niveau::find($id); 
                return response()->json([
                               'success' => true,
                                'data' => $niveau 
                                  ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Niveau $niveau)
    {
        
        
               $rules = array(
                'nom_niv_fr'       => 'required',
                'nom_niv_ar'      => 'required'
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->route('niveaux.index')
                ->with('Error','Vérifiez vos champs.');
            } else {
                // update
                // $niveau = Niveau::find(id);
                $niveau->nom_niv_fr = $request-> nom_niv_fr;
                $niveau->nom_niv_ar      =  $request-> nom_niv_ar;
                $niveau->save();
        
                // redirect
                // return redirect()->route('niveaux.index')
                // ->with('success','Niveau modifiée avec succés.');

                return response()->json(['success' => true,    
                       ]); 
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Niveau $niveau)
    {
        $niveau->delete();
    
        // redirect
        $notification = array(
            'message' => 'Niveau supprimé avec succés.',
            'alert-type' => 'warning'
        );
        return redirect()->route('niveaux.index')
        ->with($notification);
    }
}
