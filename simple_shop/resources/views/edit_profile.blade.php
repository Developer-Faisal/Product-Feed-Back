@extends('layouts.app')

@section('title')
    {{$user->name}} Edit_Profile
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Profile') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif



                            <form action="{{route('profile.update',['id' => $user->id])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="image"> Photo </label>
                                    <input type="file" name="image" class="form-control" id="image" >
                                </div>

                                <div class="form-group">
                                    <label for="email"> Email </label>
                                    <input type="email" name="email" class="form-control" id="email" value="{{$user->email}}" >
                                </div>

                                <div class="form-group">
                                    <label for="bio">  Bio Data </label>
                                    <textarea class="form-control" name="bio" id="bio"> {{$user->profile ? $user->profile->bio : ""}} </textarea>
                                </div>

                                <input type="submit" name="submit" class="form-control btn btn-success"  value="Submit" >

                            </form>







                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
