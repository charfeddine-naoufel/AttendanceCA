<?php

namespace App\Http\Controllers;

use App\Models\Paymentpack;

use App\Models\Prof;
use App\Models\Seance;
use App\Models\Matiere;
use App\Models\Groupe;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PaymentpackController extends Controller
{
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
        $payment->sprof = $seancesInfo;
    
        return $payment;
    });
    //    dd($payments);
      $profs= Prof::all();
      
      
      $matieres=Matiere::all()->keyBy('id');
      $groupes=Groupe::all()->keyBy('id');
    // dd($matieres);
      $seancesbyprof = $profs->mapWithKeys(function ($prof) {
        return [$prof->id => Seance::where([['payprof',false],['prof_id',$prof->id]])->get()];
    });
    
      
      return view('Admin.PaiementProf.index',compact('payments','profs','seancesbyprof','matieres','groupes'));
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
      'prof_id'       => 'required',
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
      return redirect()->route('paiementsProf.index')
      ->with($notification);
  } else {
    if (is_null($request-> seances)) {
        $request['seances']=[];
    }
      // store Prof
      $paymentprof = new Paymentprof;
      $paymentprof->prof_id = $request-> prof_id;
      $paymentprof->date = $request-> date;
      $paymentprof->prix = $request-> prix;
      $paymentprof->document = $request-> document;
      $paymentprof->seances = json_encode(array_values($request-> seances));
      
      $paymentprof->save();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
             

      // redirect
      $notification = array(
          'message' => 'Paiement effectué avec succés.',
          'alert-type' => 'success'
      );
      return redirect()->route('paiementsProf.index')
      ->with($notification);
  }

      
  }

  /**
   * Display the specified resource.
   */
  public function show(Prof $paymentprof)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit($id)
  { 
      $paymentprof = Prof::find($id);
      $paymentprof['groupes']=$paymentprof->groupes->toArray(); 
              return response()->json([
                             'success' => true,
                              'data' => $paymentprof 
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
          $paymentprof = Prof::find($id);
          $paymentprof->nom_pr_prof_fr = $request-> nom_pr_prof_fr;
          $paymentprof->nom_pr_prof_ar = $request-> nom_pr_prof_ar;
          $paymentprof->tel_prof = $request-> tel_prof;
          $paymentprof->matiere_id = $request-> matiere_id;
              $paymentprof->save();
          $paymentprof->groupes()->detach();
          // Attacher les groupes dans la table pivot
           $paymentprof->groupes()->attach($request->groupes);
      
              

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
      $paymentprof = Prof::find($id);
      
      $paymentprof->groupes()->detach();
      $paymentprof->delete();
  
      // redirect
      $notification = array(
          'message' => 'Prof supprimé avec succés.',
          'alert-type' => 'warning'
      );
      return redirect()->route('paiementsProf.index')
      ->with($notification);
  }
}

