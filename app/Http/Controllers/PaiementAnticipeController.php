<?php

namespace App\Http\Controllers;

use App\Models\PaiementAnticipe;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PaiementAnticipeController extends Controller
{
    public function downloadRecu($id)
    {
        $payment = PaiementAnticipe::find($id);
        
        
    return view('Admin.PaiementAnticipe.recu',compact('payment'));
    }
    /**
   * Display a listing of the resource.
   */
  public function index()
  {
      $payments = PaiementAnticipe::all();
     
    
    
      
      return view('Admin.PaiementAnticipe.index',compact('payments'));
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
    'eleve_id' => 'required|exists:eleves,id',
    'groupe_id' => 'required|exists:groupes,id',
    'montant' => 'required|numeric|min:0',
    'mois' => 'required|array',
    'mois.*' => 'integer|min:1|max:12',
      
  );

  

  $validator = Validator::make($request->all(), $rules);
  if ($validator->fails()) {
      $notification = array(
          'message' => 'Vérifiez vos champs.',
          'alert-type' => 'Error'
      );
      return redirect()->route('paiementsPack.index')
      ->with($notification);
  } else {
    
    
      // store Eleve
      $paymentanticipe = new PaymentAnticipe;
      $paymentanticipe->eleve_id = $request-> eleve_id;
      $paymentanticipe->groupe_id = $request-> groupe_id;
      $paymentanticipe->montant = $request-> montant;
      $paymentanticipe->mois = $request-> mois;
      $paymentanticipe->utilise = $request->utilise;
      
      $paymentanticipe->save();
      
      
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
  public function show(Prof $paymentanticipe)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit($id)
  { 
      $payment = PaiementAnticipe::find($id);
    
     
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
          $paymentanticipe = PaiementAnticipe::find($id);
          $paymentanticipe->montant = $request-> montant;
          $paymentanticipe->date = $request-> date;
          $paymentanticipe->mois = $request-> mois;
          $paymentanticipe->eleve_id = $request-> eleve_id;
          $paymentanticipe->document = $request-> document;
          $paymentanticipe->seances = $seances;
              $paymentanticipe->save();
          
      
              

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
      $paymentanticipe = PaiementAnticipe::find($id);
      
      
      $paymentanticipe->delete();
      $eleve = Eleve::find($paymentanticipe->eleve_id);
      $month = Carbon::parse($paymentanticipe->date)->month;
      $montant = $eleve->montant ?? [];
        for ($i = 1; $i <= 12; $i++) {
            if (!isset($montant[$i])) {
                $montant[$i] = 0;
            }
        }
      $montant[$month] =0;
      $eleve->montant = $montant;

      $seancesToRemove = $paymentanticipe->seances;
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
