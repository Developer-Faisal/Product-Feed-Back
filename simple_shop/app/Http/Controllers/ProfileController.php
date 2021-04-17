<?php

namespace App\Http\Controllers;
use Image;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        dd(Auth::user());
        return view('edit_profile');
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
            'image' => 'image',
            'bio' => 'required',
        ]);


        if ($request->file('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = "Profile_".time().".".$extension;
            Image::make($file)->save(public_path().'/uploads/'.$image);

        }

        $profile = new Profile();
        $profile->image = $image;
        $profile->bio = $request->bio;
        $profile->user_id = Auth::user()->id;

        $profile->save();


        return redirect()->action('HomeController@index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $profile = Profile::findOrFail($id);
//        dd($profile->user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $id)
    {

//
//        $profile = Profile::findOrFail($id);
//
//        if ($request->file('image')){
//            @unlink(public_path().'/uploads/'.$profile->image);
//            $file = $request->file('image');
//            $extension = $file->getClientOriginalExtension();
//            $image = "Product_".time().".".$extension;
//            Image::make($file)->save(public_path().'/uploads/'.$image);
//
//        }
//
//
//        $profile = new Profile();
//        $profile->image = $image;
//        $profile->bio = $request->bio;
//        $profile->user_id = Auth::user()->id;
//
//        $profile->save();
//
//
//        return redirect()->action('HomeController@index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
