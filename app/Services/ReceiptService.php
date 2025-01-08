<?php
// app/Services/ReceiptService.php
namespace App\Services;

use App\Models\Paymentprof;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class ReceiptService
{
    public function generateReceipt(Paymentprof $payment)
    { //dd($payment);
        $data = [
            'receipt_number' => 'RECU-' . str_pad($payment->id, 6, '0', STR_PAD_LEFT),
            // 'payment' => $payment,
            // 'student' => $payment->student,
            // 'sessions' => $payment->sessions,
            'date' => Carbon::now()->format('d/m/Y'),
            'school_info' => [
                'name' => config('app.school_name', 'Nom de l\'école'),
                'address' => config('app.school_address', 'Adresse de l\'école'),
                'phone' => config('app.school_phone', 'Téléphone de l\'école'),
                'email' => config('app.school_email', 'Email de l\'école'),
            ]
        ];

        $pdf = PDF::loadView('Admin.pdf.receipt', $data);
        return $pdf;
    }
}