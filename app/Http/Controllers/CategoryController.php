<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view("category.index", ["categories" => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $logo = null;
        $request_data = $request->all();
        if ($request->hasFile("logo")) {
            # code...
            $logo = $request_data['logo'];


            $path = $logo->store("logos", "category_upload");
            $request_data['logo'] = $path;
        }
        request()->validate([
            'name' => ['required', 'string', 'max:255', 'unique:categories,name'],

        ]);

        // dd($logo);


        category::create($request_data);
        // category::create(["name"=>$request->get("name"),"logo"=>$request->get("logo")]);
        return to_route("categories.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view("category.show", ["category" => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)

    {

        return view('category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $id = $category['id'];
        request()->validate([
            'name' => ['required', 'string', 'max:255', 'unique:categories,name,' . $id,],

        ]);
        $category->update($request->all());
        return to_route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return to_route("categories.index");
    }
}
