@extends('layouts.master')

	@section('footer-code')

	<script type="text/javascript" charset="utf-8" >
		$('button.run').click(function () { 
		    $(this).attr('disabled', '');
		    $('table > tbody > tr').children('td:nth-child(3),td:nth-child(4),td:nth-child(5)').children('span').removeClass('label-success label-warning label-danger').addClass('label-info');
		    $('table > tbody > tr').each(function (i) { 

		    	$(this).children('td:nth-child(7)').children('span').removeClass('label-warning').addClass('label-success').text('Kontrol Ediliyor ...');
		    	$(this).children('td:nth-child(7)').children('span').text();
		    	var backlinkid = $(this).children('td:nth-child(1)').text();
		    	var selected =$(this);
		    	
		    		//alert($(this).children('td:nth-child(1)').text());
		    		$.ajax({
		    			url: "{{ URL::to('/check/check') }}",
		    			type: 'POST',
		    			dataType: 'json',
		    			data: {bkid: backlinkid},
		    			//async: false
		    		})

		    		.done(function(data) {
		    			console.log("success");
		    		})
		    		.fail(function(data) {
		    			console.log("Server Not Found !");
		    		})
		    		.always(function(data) {
		    			//alert(data.link1);
		    			console.log("complete");
		    			if (data.status==true) {
		    				if (data.link1=="on") {
		    					selected.children('td:nth-child(3)').children('span').removeClass('label-info').addClass('label-success');
		    				} else{
		    					selected.children('td:nth-child(3)').children('span').removeClass('label-info').addClass('label-danger');
		    				};
		    				if (data.link2=="on") {
		    					selected.children('td:nth-child(4)').children('span').removeClass('label-info').addClass('label-success');
		    				} else{
		    					selected.children('td:nth-child(4)').children('span').removeClass('label-info').addClass('label-danger');
		    				};
		    				if (data.link3=="on") {
		    					selected.children('td:nth-child(5)').children('span').removeClass('label-info').addClass('label-success');
		    				} else{
		    					selected.children('td:nth-child(5)').children('span').removeClass('label-info').addClass('label-danger');
		    				};
							selected.children('td:nth-child(7)').children('span').removeClass('label-success').addClass('label-warning').text('Tamamlandı');    				
		    			} else{
		    				selected.children('td:nth-child(3),td:nth-child(4),td:nth-child(5)').children('span').removeClass('label-info').addClass('label-danger');
		    				selected.children('td:nth-child(7)').children('span').removeClass('label-warning').addClass('label-danger').text('Hata Oluştu');
		    			};
		    				
		    		});
		    });
			
		});
		$( document ).ajaxStop(function() {
		  console.log("End all ajaxs." );
		  $('button.run').removeAttr('disabled').text('Yenile'); 
		});
		    
	</script>
	@stop

	@section('body')
	<div class="panel panel-default">
		<div class="panel-heading">Check List
			<button type="button" class="run btn btn-success btn-xs pull-right">Kontrol Et</button>
		</div>
		<div class="panel-body">

			<table class="table table-striped">
		      <thead>
		        <tr>
		          <th>#ID</th>
		          <th>Back Link URL</th>
		          <th>Link 1</th>
		          <th>Link 2</th>
		          <th>Link 3</th>
		          <th>Kontrol Sayısı</th>
		          <th>Kontrol Durumu</th>
		        </tr>
		      </thead>
		      <tbody>
		      	@foreach ($backlinks as $backlink) 
			      	<tr>
			        	<td>{{ $backlink->id }}</td>
			        	<td>{{ $backlink->check_url }}</td>
			        	<td><span class="label label-info">{{ $backlink->link_one }}</span></td>
			        	<td><span class="label label-info">{{ $backlink->link_two }}</span></td>
			        	<td><span class="label label-info">{{ $backlink->link_three }}</span></td>
			        	<td>{{ $backlink->check_count }}</td>
			        	<td><span class="label label-warning ">Kontrol Edilmedi</span></td>
					</tr>
				@endforeach
		      </tbody>
		    </table>

		</div>
	</div>
	@stop

@stop