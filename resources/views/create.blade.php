@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #6c757d;">
                    <img src="{{asset('storage/Product.png')}}" style="width: 25px;">
                    {{ __('Productos') }}</div>

					<form action="{{route('product.save')}}" enctype="multipart/form-data" method="POST" style="display: flex; flex-direction: column; align-items: center;">
    				@csrf

    					<label style="margin-top: 10px">Nombre</label>
                        <input type="text" name="name"><br>

                        <label>Descripcion</label>
                        <input type="text" name="description"><br>

                        <label>Precio</label>
                        <input type="number" name="price"><br>

                        <label>Stock</label>
                        <input type="number" name="stock">

                        <button class="btn btn-secondary" style="margin-top: 10px; margin-bottom: 10px;">Crear producto</button>
    				</form>
    			</div>
    		</div>
    	</div>
    </div>
</div>
@endsection