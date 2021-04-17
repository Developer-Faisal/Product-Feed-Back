<?php

namespace App\Http\Controllers;
use Image;
use App\Models\Product;
use App\Models\Profile;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('profile',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('update', $user,User::class);
        return view('edit_profile',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $this->authorize('update', $user,User::class);




        if ($user->profile){

           if ( $file = $request->file('image')){
               @unlink(public_path().'/uploads/'.$user->profile->image);
               $file = $request->file('image');
               $extension = $file->getClientOriginalExtension();
               $image = "Profile_".time().".".$extension;
               Image::make($file)->save(public_path().'/uploads/'.$image);
               $user->profile->image = $image;
            };


            $user->profile->bio = $request->bio;
            $user->profile->save();


        }else{
            $profile = new Profile();
            $profile->image = "someting.jpg";
            $profile->bio = $request->bio;
            $profile->user_id = $user->id;
            $profile->save();
        }
        $user->email = $request->email;
        $user->save();
        return redirect()->action('UserController@show',[$user->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
