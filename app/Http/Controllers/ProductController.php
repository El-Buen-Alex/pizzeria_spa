<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products=DB::table('products')
        ->select('products.id','products.name','products.url_img', 'products.price', 'products.id_prCategory', 'categories.name as name_category')
        ->join('categories', 'id_prCategory','=','categories.id')
        ->where('products.state','=','A')
        ->orderBy('products.updated_at','desc')->paginate(19);
       // $products= DB::table('products')->orderBy('updated_at','desc')->paginate(20);
        return response()->json($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if($request->method==='post'){
            return DB::transaction(function () use ($request) {
                if($request->file('image')!=null){
                    $image = $request->image;
                    $url_image= $image->store('','images_products');
                    $url_image='/images/products/'.$url_image;
                    $product=Product::create([
                        'name'=>$request->name,
                        'price'=>$request->price,
                        'url_img'=>$url_image,
                        'state'=>'A',
                        'id_prCategory'=>$request->id_prcategory
                    ]);
                    return response()->json([
                        'product'=>$product
                    ]);
                }
            }, 5);
        }else if($request->method==='put'){
            $product=Product::query()->find($request->id);
            $this->update($request,  $product);
        }
        //$product  = Product::create($request->post());
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        // $product->fill($request->post())->save();
        // return response()->json([
        //     'product'=>$product
        // ]);
        return DB::transaction(function () use ($request, $product) {
            if($request->file('image')!=null){
                $image = $request->image;
                $url_image= $image->store('','images_products');
                $url_image='/images/products/'.$url_image;
                $product->url_img=$url_image;
            }
            $product->name=$request->name;
            $product->price=$request->price;
            $product->id_prCategory=$request->id_prCategory;
            $product->save();
            return response()->json([
                'category'=>$product,
                'message'=>"category saved successfully!"
           ]); 
         }, 5);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $response="Yes";
        $product->state='N';
        $product->save();

        return response()->json([
            'mensaje'=>$response
        ]);
    }
}
