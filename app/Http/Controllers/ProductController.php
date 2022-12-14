<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facade\File;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware("auth:admin")->except([
            "index","show"
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home')->with([
            "products"=> Product::latest()->paginate(5),
            "categories"=>Category::has("products")->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.products.create")->with([
            "categories"=> Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            "title" => "required|min:3",
            "description" => "required|min:5",
            "image" => "required|image|mimes:png,jpg,jpeg|max:2048",
            "price" => "required|numeric",
            "category_id" => "required|numeric",
        ]);
        if ($request->has("image")){
            $file=$request->image;
            $imageName = "images/products/" .time(). "_".$file->getClientOriginalName();
            $file->move(public_path("images/products"),$imageName);
            $title=$request->title;

            Product::create([
                "title"=>$title,
                "slug"  => Str::slug($title),
                "description"=>$request->desription,
                "price"=>$request->price,
                "old_price"=>$request->old_price,
                "inStock"=>$request->inStock,
                "category_id" => $request->category_id,
                "image"=>$imageName,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return view("products.show")->with([
            "product" =>$product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return view("admin.products.edit")->with([
            "product" => $product,
            "categories" => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
        $this->validate($request,[
            "title" => "required|min:3",
            "description" => "required|min:5",
            "image" => "image|mimes:png,jpg,jpeg|max:2048",
            "price" => "required|numeric",
            "category_id" => "required|numeric",
        ]);
        if ($request->has("image")){
            $image_path=public_path("images/products".$product->image);
            if(File::exists($image_path)){
                unlink($image_path);
            }
            $file=$request->image;
            $imageName = "images/products/".time()."_".$file->getClientOriginalName();
            $file->move(public_path("images/products"),$imageName);
            $product->image=$imageName;
        }
            $title=$request->title;
            $product->update([
                "title"=>$title,
                "slug"  => Str::slug($title),
                "description"=>$request->desription,
                "price"=>$request->price,
                "old_price"=>$request->old_price,
                "inStock"=>$request->inStock,
                "category_id" => $request->category_id,
                "image"=>$imageName,
            ]);
            return redirect()->route("admin.products")->withSuccess("Produit modifi??");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $image_path=public_path("images/products".$product->image);
        if(File::exists($image_path)){
            unlink($image_path);
        }
        $product->delete();
        return redirect()->route("admin.products")->withSuccess("Produit supprim??");
    }
    public function index2(){
        return view("admin.create");
    } 
}
