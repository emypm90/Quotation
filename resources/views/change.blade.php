@extends('layouts.app')

@section('content')
<div class="container" style="margin-bottom: 314px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #b7f165; border: 0;">
                	<img style="width: 30px;" src="{{asset('storage/change.png')}}">
                	{{ __('Conversor de divisas') }}
            	</div>

                <div class="card-body" style="display: flex; justify-content: space-evenly;">
                	<form action="{{route('change.update')}}" enctype="multipart/form-data" method="POST">
                		@csrf
	                    <select id="roles" name="roles[]" style="border: 0;">
	                        @if(empty($_POST))
	                    		<option value="PES" selected>Pesos</option>
	                    		<option value="USD">Dolar Oficial</option>
	                    		<option value="USDB">Dolar Blue</option>
	                    	@else
		                    	@if($vroles == 'PES')
		                    		<option value="PES" selected>Pesos</option>
		                    		<option value="USD">Dolar Oficial</option>
		                    		<option value="USDB">Dolar Blue</option>
		                    	@elseif($vroles == 'USD')
		                    		<option value="PES">Pesos</option>
		                    		<option value="USD" selected>Dolar Oficial</option>
		                    		<option value="USDB">Dolar Blue</option>
		                    	@else
		                    		<option value="PES">Pesos</option>
		                    		<option value="USD">Dolar Oficial</option>
		                    		<option value="USDB" selected>Dolar Blue</option>
		                    	@endif
		                    @endif
	                    </select>

	                    <input type="text" id="cantidad-uno" name="cantidad-uno" style="margin-bottom: 10px; border: 0; text-align: right;" placeholder="0" value="@if($_POST)${{number_format($input, 2)}}@endif"><br>

	                    <select id="roles1" name="roles1[]"style="border: 0;">
	                    	@if(empty($_POST))
	                    		<option value="PES">Pesos</option>
	                    		<option value="USD" selected>Dolar Oficial</option>
	                    		<option value="USDB">Dolar Blue</option>
	                    	@else
		                    	@if($vroles1 == 'PES')
		                    		<option value="PES" selected>Pesos</option>
		                    		<option value="USD">Dolar Oficial</option>
		                    		<option value="USDB">Dolar Blue</option>
		                    	@elseif($vroles1 == 'USD')
		                    		<option value="PES">Pesos</option>
		                    		<option value="USD" selected>Dolar Oficial</option>
		                    		<option value="USDB">Dolar Blue</option>
		                    	@else
		                    		<option value="PES">Pesos</option>
		                    		<option value="USD">Dolar Oficial</option>
		                    		<option value="USDB" selected>Dolar Blue</option>
		                    	@endif
		                    @endif
	                    </select>

	                    <input type="text" id="cantidad-dos" name="cantidad-dos" style="border: 0; text-align: right;" placeholder="0" value="@if($_POST)${{number_format($total, 2)}}@endif"><br>	
	                

	                    <div class="tasa-cambio">
	                    	<button class="btn btn-secondary" style="margin-left: 207px; margin-top: 10px;" id="tasa">Convertir</button>
	                    </div>
	                </form>
	            </div>
            </div>
        </div>
    </div>
</div>
@endsection