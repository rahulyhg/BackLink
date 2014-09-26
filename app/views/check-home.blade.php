@extends('layouts.master')

	@section('body')
	<div class="panel panel-default">

			<div class="jumbotron">
			  <h1>Backlink Check</h1>
			  <p>Back Link Kontrolü yapmak için tıkla.</p>
			  <p><a href="{{URL::to('/check/list')}}" class="btn btn-primary btn-lg" role="button">Kontrol ET</a></p>
			</div>

	@stop

@stop