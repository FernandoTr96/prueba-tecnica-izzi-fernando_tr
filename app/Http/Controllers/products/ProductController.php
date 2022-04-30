<?php

namespace App\Http\Controllers\products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subsidiary;
use App\Models\Product;


class ProductController extends Controller
{
    public function __construct(){

    }

    public function addProductPage(){
        $categories = Category::orderBy('categoria','asc')->get();
        $subsidiaries = Subsidiary::orderBy('sucursal','asc')->get();
        return view('products/addproducts', compact('categories', 'subsidiaries'));
    }

    public function adminProductsPage(){
        $products = Product::select('products.id','products.nombreProducto','categories.categoria','subsidiaries.sucursal')
        ->leftJoin('categories','categories.id','=','products.categoria_id')
        ->leftjoin('subsidiaries','subsidiaries.id','=','products.sucursal_id')
        ->orderBy('products.id','desc')
        ->get();
        return view('products/adminproducts',compact('products'));
    }

    public function create(Request $req){
        
        $req->validate([
            'producto' => 'required | max:30',
            'precio' => 'required | max:5 | numeric',
            'categoria' => 'required',
            'sucursal' => 'required',
            'fecha_compra' => 'required',
            'descripcion' => 'required | max:100'
        ]);

        $product = $req->all();

        try {

            Product::create([
                'nombreProducto' => $product['producto'],
                'precio' => $product['precio'],
                'categoria_id' => $product['categoria'],
                'sucursal_id' => $product['sucursal'],
                'fechaCompra' => $product['fecha_compra'],
                'descripcion' => $product['descripcion'],
                'fechaAlta' => date('Y-m-d')
            ]);

            return redirect()->route('addProductsPage')->with([
                'successAlert' => $product['producto'].' guardado correctamente !'
            ]);

        } catch (\Illuminate\Database\QueryException $e) {
            
            return back()->withErrors([
                'error' => 'Error: '.$e->getMessage()
            ]);

        }

    }

    public function show(Request $req, $id){
        
        $json = Product::select(
            'products.id',
            'products.nombreProducto',
            'products.descripcion',
            'products.precio',
            'products.fechaCompra',
            'products.estado',
            'products.comentario',
            'categories.categoria',
            'subsidiaries.sucursal'
        )
        ->leftJoin('categories','categories.id','=','products.categoria_id')
        ->leftjoin('subsidiaries','subsidiaries.id','=','products.sucursal_id')
        ->where('products.id','=',$id)
        ->get();
        
        $product = json_decode($json[0],true);

        return view('products/editproduct',compact('product'));

    }

    public function update(Request $req){
        
        $req->validate([
            'comentario' => 'required | max:100',
            'estado' => 'required'
        ]);

        $formData = $req->all();
    
        try {

            $product = Product::findOrFail($formData['id']);
            $product->comentario = $formData['comentario'];
            $product->estado = strtolower($formData['estado']);
            $product->save();

            return redirect()
            ->route('showProduct',['id' => $formData['id']])
            ->with([
                'editSuccess' => 'actualizado correctamente'
            ]);

        } catch (\Illuminate\Database\QueryException $e) {
            
            return back()->withErrors([
                'error' => 'Error: '.$e->getMessage()
            ]);

        }

    }

    public function destroy(Request $req){

        $id = $req->input('id_producto');
        Product::destroy($id);
        
        return back()->with([
            'productDestroyed' => 'El producto se elimino correctamente...'
        ]);

    }

}
