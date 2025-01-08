<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .school-info {
            margin-bottom: 20px;
        }
        .receipt-details {
            margin-bottom: 20px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .total {
            text-align: right;
            font-weight: bold;
            margin-top: 20px;
        }
        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>REÇU DE PAIEMENT</h1>
        <h2>{{ $receipt_number }}</h2>
    </div>

    <div class="school-info">
        <h3>{{ $school_info['name'] }}</h3>
        <p>{{ $school_info['address'] }}<br>
        Tél: {{ $school_info['phone'] }}<br>
        Email: {{ $school_info['email'] }}</p>
    </div>

    <div class="receipt-details">
        <p><strong>Date:</strong> {{ $date }}</p>
        <p><strong>Élève:</strong> ******</p>
        <p><strong>Mode de paiement:</strong> *****</p>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Date de séance</th>
                <th>Matière</th>
                <th>Enseignant</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach($sessions as $session)
            <tr>
                <td>{{ $session->start_time->format('d/m/Y H:i') }}</td>
                <td>{{ $session->subject }}</td>
                <td>{{ $session->teacher->first_name }} {{ $session->teacher->last_name }}</td>
            </tr>
            @endforeach --}}
        </tbody>
    </table>

    <div class="total">
        <p>Total payé: 0000 DT</p>
    </div>

    <div class="footer">
        <p>Merci de votre confiance !</p>
    </div>
</body>
</html>