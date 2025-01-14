<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
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
        // store eleve
        $eleve = new Eleve;
        $eleve->nom_pr_eleve_fr = $request-> nom_pr_eleve_fr;
        $eleve->nom_pr_eleve_ar = $request-> nom_pr_eleve_ar;
        $eleve->tel = $request-> tel;
        $eleve->tel_parent = $request-> tel_parent;
        $eleve->classe_lycee      =  $request-> classe_lycee;
        $eleve->lycee      =  $request-> lycee;
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
    public function show(Eleve $eleve)
    {
        //
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
            $eleve->nom_pr_eleve_fr = $request-> nom_pr_eleve_fr;
            $eleve->nom_pr_eleve_ar = $request-> nom_pr_eleve_ar;
            $eleve->tel = $request-> tel;
            $eleve->tel_parent = $request-> tel_parent;
            $eleve->classe_lycee      =  $request-> classe_lycee;
            $eleve->lycee      =  $request-> lycee;
                $eleve->save();
            $eleve->groupes()->detach();
            // Attacher les groupes dans la table pivot
             $eleve->groupes()->attach($request->groupes);
        
                // redirect
                // return redirect()->route('eleves.index')
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
