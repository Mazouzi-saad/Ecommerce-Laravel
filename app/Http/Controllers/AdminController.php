<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;


class AdminController extends Controller
{
    //
    public function __construct(){
        $this->middleware('guest:admin')
            ->except(["showAdminLoginForm","adminLogin"]);
    }
    public function index(){
        return view("admin.index")->with([
            "products" => Product::all(),
            "orders" =>Order::all(),
        ]);
    }
    public function showAdminLoginForm(){
        return view("admin.auth.login");
    }
    public function adminLogin(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'pasword'=> 'required|min:4'
        ]);
        if (auth()->guard("admin")->attempt([
            'email' => $request->email,
            'password' => $request->password
        ],$request->get("remember"))){
            return redirect("/admin");
        } else{
            return redirect()->route("admin.login");
        }
    }   
    public function adminLogout(){
        auth()->guard("admin")->logout();
        return redirect()->route("admin.login");
    }
    public function getProduct(){
        return view("admin.products.index")->with([
            "products" =>Product::latest()->paginate(30)
        ]);
    } 
    public function getOrder(){
        return view("admin.orders.index")->with([
            "orders" =>Order::latest()->paginate(100)
        ]);
    } 
    public function addProduct(){
        return view("admin.create.index");
    } 
}
