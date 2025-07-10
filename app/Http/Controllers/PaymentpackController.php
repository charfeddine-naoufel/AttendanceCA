<?php

namespace App\Http\Controllers;

use App\Models\Paymentpack;


use App\Models\Prof;
use App\Models\Seance;
use App\Models\Matiere;
use App\Models\Groupe;
use App\Models\Eleve;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PaymentpackController extends Controller
{
    public function downloadRecu($id)
    {
        $payment = Paymentpack::find($id);
        
        $seancesInfo = Seance::whereIn('id', json_decode($payment->seances, true))->get();
        
        // Ajouter le champ 'seleve' au paiement
        $payment->seleve = $seancesInfo;
        //  dd($payment);
    return view('Admin.PaiementPack.recu',compact('payment'));
    }
    /**
   * Display a listing of the resource.
   */
  public function index()
  {
      $payments = Paymentpack::all();
      $payments = $payments->map(function ($payment) {
        // Récupérer les informations des séances à partir des IDs
        $seancesInfo = Seance::whereIn('id', json_decode($payment->seances))->get();
    
        // Ajouter le champ 'sprof' au paiement
        $payment->seleve = $seancesInfo;
    
        return $payment;
    });
    //    dd($payments);
        $matieres=Matiere::all()->keyBy('id');
      $groupes= Groupe::whereType('pack')->get();
      $profs= Prof::all();
      
      $elevesbygroupe = $groupes->mapWithKeys(function ($groupe) {
        return [$groupe->id => $groupe->eleves];})->toArray();
      
   // Charger tous les élèves et les indexer par leur ID
$eleves = Eleve::whereType('pack')->get()->keyBy('id');

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
            if (in_array($seance->id, $eleve->paidseances ?? [])) {
                continue;
            }
            // Sinon, on ajoute la séance dans le tableau de l'élève
            $eleveSeances[$eleveId][] = $seance;
        }
    }
}
      $matieres=Matiere::all()->keyBy('id');
      $groupes=Groupe::whereType('pack')->get()->keyBy('id');
    // dd($matieres);
    
    
      
      return view('Admin.PaiementPack.index',compact('payments','elevesbygroupe','eleveSeances','matieres','groupes'));
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
      'groupe_id'       => 'required',
      'eleve_id'       => 'required',
      'date'       => 'required',
      'mois'      => 'required',
      'montant'      => 'required'
      
  );

  $request['document']='test';

  $validator = Validator::make($request->all(), $rules);
  if ($validator->fails()) {
      $notification = array(
          'message' => 'Vérifiez vos champs.',
          'alert-type' => 'Error'
      );
      return redirect()->route('paiementsPack.index')
      ->with($notification);
  } else {
    
    $seances = Seance::whereJsonContains('eleves_presents', $request-> eleve_id)
    ->whereMonth('date', $request-> mois)
    ->pluck('id');
      // store Eleve
      $paymenteleve = new Paymentpack;
      $paymenteleve->eleve_id = $request-> eleve_id;
      $paymenteleve->date = $request-> date;
      $paymenteleve->montant = $request-> montant;
      $paymenteleve->mois = $request-> mois;
      $paymenteleve->document = $request-> document;
      $paymenteleve->seances = $seances;
      
      $paymenteleve->save();
      
      
      $eleve = Eleve::find($request->eleve_id);
      $currentPaidSeances = $eleve->paidseances ?? [];
      
    $eleve->montant = $request->prix;


    // Sauvegarder les modifications
    $eleve->save();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
             

      // redirect
      $notification = array(
          'message' => 'Paiement effectué avec succés.',
          'alert-type' => 'success'
      );
      return redirect()->route('paiementsPack.index')
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
      $payment = Paymentpack::find($id);
    
     
              return response()->json([
                             'success' => true,
                              'data' => $payment
                              
                                ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, $id)
  {
      
      
    $rules = array(
        // 'groupe_id'       => 'required',
        'eleve_id'       => 'required',
        'date'       => 'required',
        'mois'      => 'required',
        'montant'      => 'required'
        
    );
    $request['document']='test';
          $validator = Validator::make($request->all(), $rules);
          if ($validator->fails()) {
              $notification = array(
                  'message' => 'Vérifiez vos champs.',
                  'alert-type' => 'Error'
              );
              return redirect()->route('paiementsPack.index')
              ->with($notification);
              
          } else {
            $seances = Seance::whereJsonContains('eleves_presents', $request-> eleve_id)
            ->whereMonth('date', $request-> mois)
            ->pluck('id');
              // update
          $paymenteleve = Paymentpack::find($id);
          $paymenteleve->montant = $request-> montant;
          $paymenteleve->date = $request-> date;
          $paymenteleve->mois = $request-> mois;
          $paymenteleve->eleve_id = $request-> eleve_id;
          $paymenteleve->document = $request-> document;
          $paymenteleve->seances = $seances;
              $paymenteleve->save();
          
      
              

              return response()->json(['message' => 'Paiement modifié avec succés.',
              'alert-type' => 'info'    
                     ]); 
          }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy($id)
  {
      $paymenteleve = Paymentpack::find($id);
      
      
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

