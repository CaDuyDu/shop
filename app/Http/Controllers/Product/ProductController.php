<?php

namespace App\Http\Controllers\product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Kind;
use App\color;
use App\sizes;
use App\provider;
use App\Gallary;
use Storage;
use Yajra\Datatables\Datatables;

class ProductController extends Controller
{
    public function index(){
    	$product = Product::orderBy('id', 'desc')->get();
        $kind = Kind::all();
        $provider = provider::all();
        $color = color::all();
        $size = sizes::all();
    	return view('product.index',[
            'product' => $product,
            'kind' => $kind,
            'provider' => $provider,
            'size' => $size, 
            'color' => $color,
        ]);
    }
    public function store(Request $request){
        $pro = array();
        $pro['name'] = $request['name'];
        $pro['description'] = $request['description'];
        $pro['origin_prime'] = $request['origin_prime'];
        $pro['sale_prime'] = $request['sale_prime'];
        $pro['code'] = time();
        $pro['slug'] = str_slug($request['name']);
        Product::create($pro);

        $img = array();
        if($files = $request->file('uploadFile')){
            foreach ($files as $key =>$file) {
                $temp['link'] = Storage::disk('local')->put('public/images/product',$file);
                // $temp['product_id'] = $
                 $file->move($temp['link'],$file); 
                Gallary::create($temp);
            }
        }
        return response()->json(['data'=> $temp], 200);
    }
    public function datatableListProduct(){
    	return Datatables::of(Product::query())->addColumn('action', function ($product8) {
                return '<button class="btn-sm btn-info"><i class="fa fa-eye" aria-hidden="true"><a href=""></a></i></button>  <button class="btn-sm btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"><a href=""></a></i></button>  <button class="btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"><a href=""></a></i></button>';             
            })
            ->make(true);
    }
}
