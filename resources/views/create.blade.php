@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin-bottom: 110px;">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header border border-0" style="background-color: #b7f165;">
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

                        <button class="btn btn border border-0 text-black mt-3 mb-3" style="background-color: #b7f165;">Crear producto</button>
    				</form>
    			</div>
    		</div>
    	</div>
    </div>
</div>
@endsection