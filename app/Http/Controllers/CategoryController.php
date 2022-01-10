<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories=Category::all()->where('state','A');
        return response()->json($categories);
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
         return DB::transaction(function () use ($request) {

            if($request->file('image')!=null){
                $image = $request->image;
                $url_image= $image->store('','images');
                $url_image='/images/'.$url_image;
                 $category = Category::create([
                     'name'=>$request->name,
                     'url_img'=>$url_image,
                     'state'=>$request->state,
        
                 ]);
                
                 return response()->json([
                     'category'=>$category
                ]); 
            }
         }, 5);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return response()->json($id);
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
    public function update(Request $request, Category $category)
    {
        //
        //$category->fill($request->post())->save();
        
        dd($request);
        $category->name=$request->name;

        $category->save();
        return response()->json([
            'category'=>$category
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $response="Yes";
        $category->state='N';
        $category->save();

        return response()->json([
            'mensaje'=>$response
        ]);
    }
}
