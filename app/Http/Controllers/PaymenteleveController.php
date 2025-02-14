<?php

namespace App\Http\Controllers;

use App\Models\Paymenteleve;

use App\Models\Prof;
use App\Models\Seance;
use App\Models\Matiere;
use App\Models\Groupe;
use App\Models\Eleve;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymenteleveController extends Controller
{
    public function downloadRecu($id)
    {
        $payment = Paymenteleve::find($id);
        
        $seancesInfo = Seance::whereIn('id', json_decode($payment->seances))->get();
        
        // Ajouter le champ 'seleve' au paiement
        $payment->seleve = $seancesInfo;
        //  dd($payment);
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
      
   // Charger tous les élèves et les indexer par leur ID
$eleves = Eleve::all()->keyBy('id');

// Récupérer toutes les séances
$seances = Seance::all();
$eleveSeances = [];

foreach ($seances as $seance) {
    // Pour chaque séance, parcourir la liste des élèves présents (tableau d'IDs)
    foreach ($seance->eleves_presents as $eleveId) {
        // Vérifier que l'élève existe (pour éviter d'éventuelles erreurs)
        if (isset($eleves[$eleveId])) {
            $eleve = $eleves[$eleveId];
            // On suppose ici que $eleve->paidseances contient déjà un tableau d'IDs
            // Si la séance a déjà été payée par cet élève, on passe à l'itération suivante
            if (in_array($seance->id, $eleve->paidseances)) {
                continue;
            }
            // Sinon, on ajoute la séance dans le tableau de l'élève
            $eleveSeances[$eleveId][] = $seance;
        }
    }
}
      $matieres=Matiere::all()->keyBy('id');
      $groupes=Groupe::all()->keyBy('id');
    // dd($matieres);
    
    
      
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
      
      
      $eleve = Eleve::find($request->eleve_id);
      $currentPaidSeances = $eleve->paidseances ?? [];
      $montant = $eleve->montant ?? [];
        for ($i = 1; $i <= 12; $i++) {
            if (!isset($montant[$i])) {
                $montant[$i] = 0;
            }
        }
        $month = Carbon::parse($paymenteleve->date)->month;
      $montant[$month] += $paymenteleve->prix*count($request->seances);
    // Ajouter les nouveaux ID de séances payées +++
    $newPaidSeances = array_unique(array_merge($currentPaidSeances,$request->seances));

    
    $eleve->paidseances = $newPaidSeances;
    $eleve->montant = $montant;


    // Sauvegarder les modifications
    $eleve->save();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
             

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
      $paymenteleve = Paymenteleve::find($id);
      
      
      $paymenteleve->delete();
      $eleve = Eleve::find($paymenteleve->eleve_id);
      $month = Carbon::parse($paymenteleve->date)->month;
      $montant = $eleve->montant ?? [];
        for ($i = 1; $i <= 12; $i++) {
            if (!isset($montant[$i])) {
                $montant[$i] = 0;
            }
        }
      $montant[$month] =0;
      $eleve->montant = $montant;

      $seancesToRemove = $paymenteleve->seances;
      if (is_string($seancesToRemove)) {
        $seancesToRemove = json_decode($seancesToRemove, true);
    }
      $currentPaidSeances = $eleve->paidseances ?? [];
      $updatedPaidSeances = array_values(array_diff($currentPaidSeances, $seancesToRemove));
        
        // Mettre à jour le champ paidseances de l'élève
        $eleve->paidseances = $updatedPaidSeances;


    // Sauvegarder les modifications
    $eleve->save();

  
      // redirect
      $notification = array(
          'message' => 'Payment eleve supprimé avec succés.',
          'alert-type' => 'warning'
      );
      return redirect()->route('paiementsEleve.index')
      ->with($notification);
  }
}

