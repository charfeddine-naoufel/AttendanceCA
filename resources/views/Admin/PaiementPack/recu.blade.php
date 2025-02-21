
<html>
	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
		<link rel="stylesheet" type="text/css" media="screen" href="{{asset('assets/css/invoice.css')}}">
		{{-- <link rel="license" href="https://www.opensource.org/licenses/mit-license/"> --}}
		{{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	</head>
	<body>
       <div class="divbtn"> <button id="print" class="button">Imprimer</button></div>
        <div class="to-print">
		<header>
			<h1>Reçu</h1>
			<address contenteditable>
				<p><h2>Classy Academy</h2></p>
				<p>classyacademy5@gmail.com</p>
				<p>29 099 632</p>
				<p>Elhamma</p>
			</address>
		</header>
		<article>
			<h1>Reçu de la part de:</h1>
			<address contenteditable>
				<p>Elève : {{$payment->eleve->nom_pr_eleve_fr}}<br>{{$payment->eleve->nom_pr_eleve_ar}}</p>
			</address>
			<table class="meta">
				<tr>
					<th><span contenteditable>Reçu #</span></th>
					<td><span contenteditable id="recu">2025-{{$payment->id}}</span></td>
				</tr>
				<tr>
					<th><span contenteditable>Date</span></th>
					<td><span contenteditable>{{date('d/m/Y',strtotime($payment->date))}}</span></td>
				</tr>
				<tr>
					<th><span contenteditable>Tarif Mois</span></th>
					<td><span contenteditable id="tarif">{{$payment->montant}}</span><span id="prefix" >DT</span></td>
				</tr>
			</table>

			<table class="title">
				<tr>
					<th><strong>Séances :<strong> </th>
					
				</tr>
				
			</table>
			
			<table class="inventory">
				
				<thead>
					<tr>
						<th style="width:10%"><span contenteditable>N°</span></th>
						<th style="width:30%"><span contenteditable>Date </span></th>
						<th style="width:60%"><span contenteditable>Groupe</span></th>
						
					</tr>
				</thead>
				<tbody>
					@if ($payment->seleve)
                    	@foreach ($payment->seleve as $seance )
                        
                    
						<tr>
							<td><span contenteditable>{{$loop->iteration}}</span></td>
							<td><span contenteditable>{{$payment->date}}</span></td>
							<td><span contenteditable >{{$seance->groupe->nom_groupe}}-{{$seance->groupe->niveau->nom_niv_fr}}</span></td>
						
						</tr>
                   		 @endforeach
					@else
							<p>Aucune séance trouvée.</p>
					@endif
				</tbody>
			</table>
			<table class="balance">
				<tr>
					<th><span contenteditable>Total</span></th>
					<td><span id="total">600.00</span><span data-prefix>DT</span></td>
				</tr>
				{{-- <tr>
					<th><span contenteditable>Total Ecole</span></th>
					<td><span contenteditable id="totalE">0.00</span><span data-prefix>DT</span></td>
				</tr>
				<tr>
					<th><span contenteditable>Total Net</span></th>
					<td><span id="totalnet"></span><span data-prefix>DT</span></td>
				</tr> --}}
			</table>
		</article>
    </div>
		{{-- <aside>
			<h1><span contenteditable>Additional Notes</span></h1>
			<div contenteditable>
				<p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>
			</div>
		</aside> --}}

        <script>
            $(document).ready(function() {
               
    
                    var nbs={!!count($payment->seleve)!!};
                    var tarif=$('#tarif').html();
                    var total=tarif;
                    $('#total').text(total);
                    // var totalE=total*20/100;
                    // $('#totalE').text(totalE);
                    // $('#totalnet').text(total-totalE);
                    console.log(tarif);
                    
        $('#print').click(function () {
        // Sélectionnez la div à imprimer
        const content = $('.to-print').clone();

        // Créez une nouvelle fenêtre pour l'impression
        const printWindow = window.open('', '', 'width=800,height=600');
        printWindow.document.write('<html><head><title>'+$('#recu').html()+'</title>');

        // Ajoutez les styles
        $('link[rel="stylesheet"]').each(function () {
          const href = $(this).attr('href');
          printWindow.document.write('<link rel="stylesheet" href="' + href + '">');
        });

        // Fermez les balises <head> et ajoutez le contenu
        printWindow.document.write('</head><body>');
        printWindow.document.write(content.html());
        printWindow.document.write('</body></html>');

        // Attendez le chargement complet, puis imprimez
        printWindow.document.close();
        printWindow.onload = function () {
          printWindow.print();
          printWindow.close();
        };
      });
               
    
               
    
    
            });
        </script>
	</body>
</html>