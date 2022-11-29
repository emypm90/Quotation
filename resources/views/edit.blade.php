@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #6c757d;">
                    <img src="{{asset('storage/Product.png')}}" style="width: 25px;">
                    {{ __('Editar ') }}
                </div>
                <div class="card-body">
                	<form action="{{route('product.update', ['id' => $product->id])}}" enctype="multipart/form-data" method="POST" style="display: flex; flex-direction: column; align-items: center;">
    				@csrf
    					<input type="hidden" name="product_id" value="{{$product->id}}">

    					<label style="margin-top: 10px">Nombre</label>
                        <input type="text" name="name" value="{{$product->name}}"><br>

                        <label>Descripcion</label>
                        <input type="text" name="description" value="{{$product->description}}"><br>

                        <label>Precio</label>
                        <input type="text" name="price" value="{{$product->price}}"><br>

                        <label>Stock</label>
                        <input type="number" name="stock" value="{{$product->stock}}">

                        <button class="btn btn-secondary" style="margin-top: 10px; margin-bottom: 10px;">Editar producto</button>
    				</form>       
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection