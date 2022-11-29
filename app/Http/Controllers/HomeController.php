<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $products = Products::orderBy('id')->get();

        return view('home', [
            'products' => $products,
        ]);
    }

     public function create(){
        
        return view('create');
    }

    public function save(Request $request){
        $api = Http::get('https://www.dolarsi.com/api/api.php?type=valoresprincipales');
        $cotizacion = $api->json();

        //Dolar oficial
        $ofi = $cotizacion['0']['casa']['venta'];
        $ofi = str_replace(',','.',$ofi);
        $oficial = (float) $ofi;

        //Dolar Blue
        $libre = $cotizacion['1']['casa']['venta'];
        $libre = str_replace(',','.',$libre);
        $blue = (float) $libre;
        
        //Validacion
        $validate = $this->validate($request, [
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'price' => ['required', 'integer'],
            'stock' => ['required', 'integer'],
        ]);

        if (!$validate)
            return "alguno de los campos no son correctos";

        //Recoger los datos
        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');
        $dollarprice = $price / $oficial;
        number_format($dollarprice, 4);
        $blueprice = $price / $blue;
        number_format($blueprice, 4);
        $cash = ($blueprice * 3) * $blue;
        $stock = $request->input('stock');


        //Asignar valores al nuevo objeto
        $user = \Auth::user();
        $product = new products();
        $product->user_id = $user->id;
        $product->name = $name;        
        $product->description = $description;
        $product->price = $price;
        $product->dollar_price = $dollarprice;
        $product->blue_price = $blueprice;
        $product->cash = $cash;
        $product->stock = $stock;

        $product->save();

        return redirect()->route('home')->with([
            'message' => 'producto creado correctamente'
        ]);             
    }

    public function edit($id){
        $product = Products::find($id);
        return view('edit',[
            'product' => $product
        ]);
    }

    public function update(Request $request){
        $api = Http::get('https://www.dolarsi.com/api/api.php?type=valoresprincipales');
        $cotizacion = $api->json();

        //Dolar oficial
        $ofi = $cotizacion['0']['casa']['venta'];
        $ofi = str_replace(',','.',$ofi);
        $oficial = (float) $ofi;

        //Dolar Blue
        $libre = $cotizacion['1']['casa']['venta'];
        $libre = str_replace(',','.',$libre);
        $blue = (float) $libre;

         //Validacion
        $validate = $this->validate($request, [
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'price' => ['required', 'integer'],
            'stock' => ['required', 'integer'],
        ]);

        //Recoger los datos
        $id = $request->input('product_id');
        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');
        $dollarprice = $price / $oficial;
        number_format($dollarprice, 4);
        $blueprice = $price / $blue;
        number_format($blueprice, 4);
        $cash = ($blueprice * 3) * $blue;
        $stock = $request->input('stock');



        $product = Products::find($id);
        $product->name = $name;        
        $product->description = $description;
        $product->price = $price;
        $product->dollar_price = $dollarprice;
        $product->blue_price = $blueprice;
        $product->cash = $cash;
        $product->stock = $stock;

        $product->update();

        return redirect()->route('home')->with([
            'message' => 'producto editado correctamente'
        ]);;
    }

    public function delete($id){
        $product = Products::find($id);

        $product->delete();

        return redirect()->route('home');
    } 

    public function price($id){
        $producto = Products::find($id);

        $api = Http::get('https://www.dolarsi.com/api/api.php?type=valoresprincipales');
        $cotizacion = $api->json();

        //Dolar oficial
        $ofi = $cotizacion['0']['casa']['venta'];
        $ofi = str_replace(',','.',$ofi);
        $oficial = (float) $ofi;

        //Costo dolar oficial
        $pricedollar = $producto->dollar_price;
        
        $contado = ($pricedollar * 3) * $oficial;

        $producto->cash = $contado;

        $producto->update();

        return redirect()->route('home');
    }

    public function priceBlue($id){
        $producto = Products::find($id);

        $api = Http::get('https://www.dolarsi.com/api/api.php?type=valoresprincipales');
        $cotizacion = $api->json();

        //Dolar Blue
        $libre = $cotizacion['1']['casa']['venta'];
        $libre = str_replace(',','.',$libre);
        $blue = (float) $libre;

        //Costo dolar blue
        $priceblue = $producto->blue_price;

        $contado = ($priceblue * 3) * $blue;
        
        $producto->cash = $contado;

        $producto->update();

        return redirect()->route('home');
    } 
}
