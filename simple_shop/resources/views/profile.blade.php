@extends('layouts.app')

@section('title')
    {{$user->name}} Profile
@endsection



@section('content')
    <div class="container">
        <div class="row ">
            <div class=" col-md-6 pt-5">
                <div class="clearfix">
                    <h3 class="float-left"> <strong> User : </strong> {{$user->name}} </h3>
{{--                    @can('update',$user,App\User::class)--}}
{{--                        <a class="btn btn-primary float-right" href="{{route('profile.edit',['id'=> Auth::user()->id ])}}">  Edit Profile </a>--}}
{{--                    @endcan--}}
                </div>

                <h3> <strong> Email : </strong> {{$user->email}} </h3>
                @if($user->profile)
                    <div class="mt-3">
                        <p> <strong> Bio : </strong> {{$user->profile->bio}} </p>

                    </div>
                @endif



{{--                @can('update',$user,App\User::class)--}}
{{--                    <a class="btn btn-primary " href="{{route('add.products')}}">  Add Product </a>--}}
{{--                @endcan--}}
            </div>
            <div class=" col-md-6 pt-5">


                    <div class="clearfix">
{{--                        <h3 class="float-left"> <strong> User : </strong> {{$user->name}} </h3>--}}
                        @can('update',$user,App\User::class)
                        <a class="btn btn-primary float-right" href="{{route('profile.edit',['id'=> Auth::user()->id ])}}">  Edit Profile </a> <br>
                        @endcan
                    </div>


{{--                    <div class="card-body ">--}}

{{--                        <span> <strong> Email : </strong> {{$user->email}} </span>--}}


{{--                        @if($user->profile)--}}
{{--                            <div class="mt-3">--}}
{{--                                <p> <strong> Bio : </strong> {{$user->profile->bio}} </p>--}}

{{--                            </div>--}}
{{--                        @endif--}}

{{--                    </div>--}}



            </div>

        </div>
    </div>
@endsection
