@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 1366px;">
    <div class="row justify-content-center" style="padding-bottom: 86px;">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: #b7f165; border: 0;">
                    <img src="{{asset('storage/Product.png')}}" style="width: 25px;">
                    {{ __('Productos') }}</div>

                    <a href="{{route('product.create')}}">
                        <button type="button" class="btn border border-0 mt-4 text-black float-end me-4" style="background-color: #b7f165;">Nuevo producto</button>
                    </a>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Costo</th>
                                    <th scope="col">Costo Oficial</th>
                                    <th scope="col">Costo Blue</th>
                                    <th scope="col">Contado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td scope="row">{{$product->name}}</td>
                                    <td scope="row">{{$product->description}}</td>
                                    <td scope="row">{{$product->stock}}</td>
                                    <td scope="row">$ {{number_format($product->price, 2,',', '.')}}</td>
                                    <td scope="row">US$ {{number_format($product->dollar_price, 4)}}</td>
                                    <td scope="row">US$ {{number_format($product->blue_price, 4)}}</td>
                                    <td scope="row">$ {{number_format($product->cash, 2,',', '.')}}</td>
                                    
                                    <td style="margin-left: 1px">
                                        <a href="{{route('product.edit', ['id' => $product->id])}}">
                                            <button class="btn border border-0 text-black btn-sm" style="background-color: #b7f165">Editar</button>
                                        </a>
                                    </td>
                                    <td scope="row">
                                        <a href="{{route('product.delete', ['id' => $product->id])}}">
                                            <button class="btn border border-0 text-black btn-sm" style="background-color: #b7f165">Eliminar</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('product.price', ['id' => $product->id])}}">
                                            <button class="btn border border-0 text-black btn-sm" style="background-color: #b7f165">Oficial</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('product.blue', ['id' => $product->id])}}">
                                            <button class="btn border border-0 text-black btn-sm" style="background-color: #b7f165">Blue</button>
                                        </a>
                                    </td>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
