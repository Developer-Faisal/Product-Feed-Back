@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-12 " >

                @if($products->isNotEmpty())
                    @foreach ($products as $post)
                        <div class="post-list">
{{--                            <p>{{ $post->name }}</p>--}}
{{--                            <p>  {{ $post->description }}</p>--}}
{{--                            <p>  {{ $post->image }}</p>--}}
                        </div>
                    @endforeach
                @else
                    <div>
                        <h2>No posts found</h2>
                    </div>
                @endif
            </div>
        </div>
    </div>
{{--    style="display: none"--}}
    <div class="container">
        <div class="row mb-5">


            @foreach($products as $product)
                <div class="col-md-4 mt-3">

                    <div class="card" style="width: 22rem;">
                        <img src="{{url("uploads")}}/{{$product->image}}" class="card-img-top cardImageStyle" alt="...">
                        <div class="card-body">
                            <div class="">
                                <h5 class="card-title cardTextStyle">{{$product->name}}</h5>
                                <p class="card-text ">{{Str::limit($product->description, 50)}}</p>

                                <p class="cardNameStyle ">
                                    <span class="">
                                        <a
                                            href="{{route('profile.show',['id'=>$product->user->id])}}">
                                    {{$product->user->name}}
                                        </a>
                                    </span>
                                    <span class="lovePosition">
                                    {{$product->created_at->diffForHumans()}} / 50*
                                </span>
                                </p>

                                <a href="{{route('show.product',['id'=>$product->id , 'ProductsUserID' => $product->user->id])}}" class="btn btn-primary form-control"> Read More</a>

                            </div>
                        </div>
                    </div>

                </div>

            @endforeach
        </div>
        {{$products->links()}}

    </div>
    </div>
@endsection
