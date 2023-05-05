<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(5);
        return view('index',compact('products'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $categories = Category::all();
        return view('create', compact('categories'));
    } 
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
            $request->validate([
                'name' => 'required|string|max:255', 
                'desc' => 'required|string|max:255', 
                'price'=> 'required', 
                'ImgURL' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
                'brand'=> 'required', 
                'status'=> 'required', 
                'category_id' => 'required|exists:App\Models\Category,id'
            ]);
            $input = $request->all();
            if($ImgURL = $request->file('ImgURL')){
                $destinationPath = 'ImgURLs/';
                $profileImage = date('YmdHis') . "." . $ImgURL->getClientOriginalExtension();
                $ImgURL->move($destinationPath, $profileImage);
                $input['ImgURL'] = "$profileImage";
            }else{
                unset($input['ImgURL']);
            }
          
            Product::create($input);
            return redirect()->route('products.index')->with('msg','Product created successfully!');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {   
        $categories = Category::all();
        return view('edit', compact('categories','product')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255', 
            'desc' => 'required|string|max:255', 
            'price'=> 'required', 
            'brand'=> 'required', 
            'status'=> 'required', 
            'category_id' => 'required|exists:App\Models\Category,id'
        ]);
        
        // $product->name = $request->name;
        // $product->desc = $request->desc;
        // $product->price = $request->price;
        $input = $request->all();
        if($ImgURL = $request->file('ImgURL')){
            $destinationPath = 'ImgURLs/';
            $profileImage = date('YmdHis') . "." . $ImgURL->getClientOriginalExtension();
            $ImgURL->move($destinationPath, $profileImage);
            $input['ImgURL'] = "$profileImage";
        }
        else{
            unset($input['ImgURL']);
        }
        // $product->brand = $request->brand;
        // $product->status = $request->status;
        // $product->category_id = $request->category_id;

        $product->update($input);
        return redirect()->route('products.index')->with('msg','Product updated successfully!');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('msg','Product deleted successfully!');
     }
}

