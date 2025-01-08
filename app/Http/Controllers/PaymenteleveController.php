<?php

namespace App\Http\Controllers;

use App\Models\Paymenteleve;

use App\Models\Prof;
use App\Models\Seance;
use App\Models\Matiere;
use App\Models\Groupe;
use App\Models\Eleve;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymenteleveController extends Controller
{
    public function downloadRecu($id)
    {
        $payment = Paymenteleve::find($id);
        
        $seancesInfo = Seance::whereIn('id', json_decode($payment->seances))->get();
        
        // Ajouter le champ 'sprof' au paiement
        $payment->seleve = $seancesInfo;
        // dd($payment);
    return view('Admin.Paiementeleve.recu',compact('payment'));
    }
    /**
   * Display a listing of the resource.
   */
  public function index()
  {
      $payments = Paymenteleve::all();
      $payments = $payments->map(function ($payment) {
        // Récupérer les informations des séances à partir des IDs
        $seancesInfo = Seance::whereIn('id', json_decode($payment->seances))->get();
    
        // Ajouter le champ 'sprof' au paiement
        $payment->seleve = $seancesInfo;
    
        return $payment;
    });
    //    dd($payments);
        $matieres=Matiere::all()->keyBy('id');
      $groupes= Groupe::all();
      $profs= Prof::all();
      
      $elevesbygroupe = $groupes->mapWithKeys(function ($groupe) {
        return [$groupe->id => $groupe->eleves];})->toArray();
      
    //   seances
            $seances= Seance::all();
            $eleveSeances = [];

            foreach ($seances as $seance) {
                foreach ($seance->eleves_presents as $eleveId) {
                    // Ajouter la séance à l'élève correspondant
                    $eleveSeances[$eleveId][] = $seance;
                }
            }
        
      $matieres=Matiere::all()->keyBy('id');
      $groupes=Groupe::all()->keyBy('id');
    // dd($matieres);
      $seancesbyprof = $profs->mapWithKeys(function ($prof) {
        return [$prof->id => Seance::where([['payprof',false],['prof_id',$prof->id]])->get()];
    });
    
      
      return view('Admin.PaiementEleve.index',compact('payments','elevesbygroupe','eleveSeances','matieres','groupes'));
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
      
    //   dd($request);
  $rules = array(
      'groupe_id'       => 'required',
      'eleve_id'       => 'required',
      'date'       => 'required',
      'prix'      => 'required'
      
  );

  $request['document']='test';

  $validator = Validator::make($request->all(), $rules);
  if ($validator->fails()) {
      $notification = array(
          'message' => 'Vérifiez vos champs.',
          'alert-type' => 'Error'
      );
      return redirect()->route('paiementsEleve.index')
      ->with($notification);
  } else {
    if (is_null($request-> seances)) {
        $request['seances']=[];
    }
      // store Eleve
      $paymenteleve = new Paymenteleve;
      $paymenteleve->groupe_id = $request-> groupe_id;
      $paymenteleve->eleve_id = $request-> eleve_id;
      $paymenteleve->date = $request-> date;
      $paymenteleve->prix = $request-> prix;
      $paymenteleve->document = $request-> document;
      $paymenteleve->seances = json_encode(array_values($request-> seances));
      
      $paymenteleve->save();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
             

      // redirect
      $notification = array(
          'message' => 'Paiement effectué avec succés.',
          'alert-type' => 'success'
      );
      return redirect()->route('paiementsEleve.index')
      ->with($notification);
  }

      
  }

  /**
   * Display the specified resource.
   */
  public function show(Prof $paymenteleve)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit($id)
  { 
      $paymenteleve = Prof::find($id);
      $paymenteleve['groupes']=$paymenteleve->groupes->toArray(); 
              return response()->json([
                             'success' => true,
                              'data' => $paymenteleve 
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
              return redirect()->route('paiementsProf.index')
              ->with($notification);
              
          } else {
              // update
          $paymenteleve = Prof::find($id);
          $paymenteleve->nom_pr_prof_fr = $request-> nom_pr_prof_fr;
          $paymenteleve->nom_pr_prof_ar = $request-> nom_pr_prof_ar;
          $paymenteleve->tel_prof = $request-> tel_prof;
          $paymenteleve->matiere_id = $request-> matiere_id;
              $paymenteleve->save();
          $paymenteleve->groupes()->detach();
          // Attacher les groupes dans la table pivot
           $paymenteleve->groupes()->attach($request->groupes);
      
              

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
      $paymenteleve = Prof::find($id);
      
      $paymenteleve->groupes()->detach();
      $paymenteleve->delete();
  
      // redirect
      $notification = array(
          'message' => 'Prof supprimé avec succés.',
          'alert-type' => 'warning'
      );
      return redirect()->route('paiementsProf.index')
      ->with($notification);
  }
}

