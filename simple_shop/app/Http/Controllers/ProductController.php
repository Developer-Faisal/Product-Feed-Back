<?php


namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Profile;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Image;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Auth::user()->products;
        return view('products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'image' => 'required|image',
            'name' => 'required|unique:products',
            'description' => 'required',
        ]);


        if ($request->file('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = "Product_" . time() . "." . $extension;
            Image::make($file)->save(public_path() . '/uploads/' . $image);

        }


        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = $image;
        $product->user_id = Auth::user()->id;
        $product->save();
        return redirect()->action('HomeController@index');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show( $id, $ProductsUserID)
    {

//emran vi er code start

        $user = User::findOrFail($ProductsUserID);
        $product = Product::where('id', $id)->where('user_id', $ProductsUserID)->firstOrFail();

//emran vi er code end




        $populars = Product::orderBy('created_at','desc')->limit(3)->get();


//        $products = Product::findOrFail($id);
        return view('product-details', compact('product', 'user','populars'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, $id)
    {
        $products = Product::findOrFail($id);
        return view('edit-product', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products = Product::findOrFail($id);


            if ($request->file('image')) {
                @unlink(public_path() . '/uploads/' . $products->image);
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $image = "Product_" . time() . "." . $extension;
                Image::make($file)->save(public_path() . '/uploads/' . $image);
                $products->image = $image;
            } else {

            $products->name = $request->name;
            $products->description = $request->description;
            $products->user_id = Auth::user()->id;
            $products->save();
        }


        return redirect()->action('ProductController@index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
        $products = Product::findOrFail($id);
        @unlink(public_path() . '/uploads/' . $products->image);
        $products->delete();
        return redirect()->action('ProductController@index');

    }
}
