<?php

namespace App\Http\Controllers;

use App\Models\Paymentprof;
use App\Models\Prof;
use App\Models\Seance;
use App\Models\Matiere;
use App\Models\Groupe;
use App\Services\ReceiptService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentprofController extends Controller
{
    protected $receiptService;

    public function __construct(ReceiptService $receiptService)
    {
        $this->receiptService = $receiptService;
    }
    
    // public function downloadReceipt(Paymentprof $payment)
    // {   
    //     // $payment=Paymentprof::find($id)->first();
    //     dd($payment);
    //     $pdf = $this->receiptService->generateReceipt($payment);
    //     return $pdf->download('recu-' . $payment->id . '.pdf');
    // }
    public function downloadRecu($id)
    {
        $payment = Paymentprof::find($id);
        
        $seancesInfo = Seance::whereIn('id', json_decode($payment->seances))->get();
        
        // Ajouter le champ 'sprof' au paiement
        $payment->sprof = $seancesInfo;
        // dd($payment);
    return view('Admin.PaiementProf.recu',compact('payment'));
    }
    /**
   * Display a listing of the resource.
   */
  public function index()
  {
      $payments = Paymentprof::all();
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
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
      Seance::whereIn('id', $paymentprof->seances)->update(['payprof' => 1]);     

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
      
    $request['document']='test'; 
    $rules = array(
        'prof_id'       => 'required',
        'date'       => 'required',
        'prix'      => 'required'
        
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
            if (is_null($request-> seances)) {
                $request['seances']=[];
            }
              // update
          $paymentprof = Prof::find($id);
          $paymentprof->prof_id = $request-> prof_id;
          $paymentprof->date = $request-> date;
          $paymentprof->prix = $request-> prix;
          $paymentprof->document = $request-> document;
          $paymentprof->seances = json_encode(array_values($request-> seances));
          
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
      $paymentprof = Paymentprof::find($id);
      
    //   $paymentprof->groupes()->detach();
      $paymentprof->delete();
  
      // redirect
      $notification = array(
          'message' => 'Paiement supprimé avec succés.',
          'alert-type' => 'warning'
      );
      return redirect()->route('paiementsProf.index')
      ->with($notification);
  }
}
