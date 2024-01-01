<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use Illuminate\Validation\Rules\Unique;

class productsController extends Controller
{
    function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }
    //

    // Index Function***********************
    function adminProducts()
    {
        $products = Product::all();
        return view("adminView.products", ["products" => $products]);
    }

    // Destroy Function***********************
    function destroyProducts($id)
    {
        $product = Product::findorfail($id);
        if ($product->image) {
            try {
                unlink("images/productsImage/{$product->image}");
            } catch (\Throwable $th) {
            }
        }
        $product->delete();
        return to_route("adminProducts");
    }

    // show Function***********************
    function showProduct($id)
    {
        $product = Product::findorfail($id);
        return view("adminView.viewPro", ["viewItem" => $product]);
    }

    // Add  Function***********************
    function addProduct()
    {
        $categories = Category::all();
        // dd($category);
        return view("adminView.addProduct", ["categories" => $categories]);
    }

    //  Store Function***********************
    function store()
    {
        // dd(\request()->all());
        $request = \request();
        $request_data = \request()->all();
        if ($request->hasFile("image")) {
            $image = $request_data['image'];
            $path = $image->store("catLogo", "products_images");
            $image = $path;
        }

        \request()->validate([
            'name' => 'required|min:3|unique:products',
            'image' => 'required|unique:products',
            'price' => 'required|max:5',
            'category_id' => 'required',
        ], [
            "name.required" => "The name Is Required",
            "name.unique" => "The name Is unique",
            "name.min" => "The name At Least 3 Char",

            "image.required" => "The Image Source Is Required",
            "image.unique" => "The Image Source Used Before",

            "price.required" => "The price Is Required",
            "price.max" => "The price Max 5 Number",

            "category_id.required" => "The category Is Required",

        ]);

        $name = \request()->get("name");
        $price = \request()->get("price");
        $stock = \request()->get("stock");
        $category_id = \request()->get("category_id");
        // $category = \request()->get("category");
        $product = new Product();

        $product->name = $name;
        $product->price = $price;
        $product->stock = $stock;
        $product->category_id = $category_id;
        // $product->category = $category;
        $product->image = $image;
        $product->save();

        return to_route("adminProducts");
    }

    //  Edit Function***********************
    function editProduct($id)
    {
        $product = Product::findorfail($id);

        $categories = Category::all();
        // dd($category);


        return view("adminView.editProduct", ["editItem" => $product, "categories" => $categories]);
    }

    //  Update Function***********************
    function updateProduct()
    {
        $request = \request();
        $request_data = \request()->all();
        if ($request->hasFile("image")) {
            $image = $request_data['image'];
            $path = $image->store("catLogo", "products_images");
            $image = $path;
        }
        $id = \request()->get("id");

        \request()->validate([
            'name' => ['required', 'min:3', 'unique:products,name,' . $id,],
            'image' => ['required'],

        ], [

            "name.required" => "The name Is Required",
            "name.unique" => "The name Is unique",
            "name.min" => "The name At Least 3 Char",
            "image.required" => "The Image Source Is Required",



        ]);





        $productID = Product::where("id", $id)->first();

        $name = \request()->get("name");
        $price = \request()->get("price");
        $category_id = \request()->get("category_id");
        // $category = \request()->get("category");

        $productID->name = $name;
        $productID->price = $price;
        $productID->category_id = $category_id;
        // $productID->category = $category;
        $productID->image = $image;
        $productID->save();


        return to_route("adminProducts");
    }

    function index()
    {
        $products = Product::all();
        // $users = User::all();
        return view("userView.index", ["products" => $products]);
    }
    function orders()
    {

        return view("userView.myOrderUser");
    }
    function adminIndex()
    {
        $products = Product::all();
        $users = User::all();
        return view("adminView.index", ["products" => $products, "users" => $users]);
    }



    function adminUser()
    {

        return view("adminView.users");
    }
    function adminManualOrder()
    {

        return view("adminView.manualOrder");
    }
    function adminChecks()
    {

        return view("adminView.checks");
    }
    function addUser()
    {

        return view("adminView.addUser");
    }
    function view($id)
    {

        return view("adminView.view", ["viewItem" => $id]);
    }
    function editUser($id)
    {

        return view("adminView.edit", ["editItem" => $id]);
    }
    function destroyUser()
    {

        return view("adminView.users");
    }
}
