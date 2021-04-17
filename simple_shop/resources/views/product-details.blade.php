@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row py-5">
            <div class="col-md-8">

                <img style="width:100%;height:50vh" src="{{url("uploads")}}/{{$product->image}}">
                <div class="profile p-3">

                    {{$product->description}}

                </div>

                <div class="profile">
                    <div class="row">
                        <div class="col-md-3">
                            <img class="mt-4" style="width:70px;height:70px;border-radius: 50%;"
                                 src="{{ url( 'uploads')}}/{{$product->user->profile->image}}"
                                 alt="">
                        </div>
                        <div class="col-md-6">
                            <h4 style="margin-left:-100px;margin-top:30px"><a
                                    href="{{route('profile.show',['id'=>$product->user->id])}}">
                                    {{$product->user->name}}
                                </a></h4>
                        </div>

                        @php
                            $totalRatings = 0;
                            $totalReview = count($product->reviews);
                                for ($i=0;$i < $totalReview; $i++){
                                    $totalRatings += $product->reviews[$i]->rating;
                                }

                        @endphp
                        <div class="col-md-3 mt-4">
                            <h5 class="d-inline mr-4">
                                @if (!empty($product->reviews))
                                    @if (!empty($totalRatings))
                                    {{ $totalRatings/$totalReview}}
                                    @endif
                                @else
                                    {{$totalRatings / $totalReview}}
                                @endif
                                <span style="color:red"> <i class="fas fa-star"></i> </span> </h5>
                            <h5 class="d-inline"> 40 <span style="color:red">  <i class="far fa-eye"></i> </span>  </h5>
                        </div>

                    </div>
                </div>


                <div class="pt-5 post-customer-review mt-2">
                    <form action="{{route('review.add', ['id'=> Auth::user()->id, 'ProductsID' => $product->id])}}"
                          method="post">
                        @csrf


                        <select name="rating" id="rating" class="form-select form-select-sm"
                                aria-label=".form-select-sm example">
                            <option selected> Provide Ratting</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>


                        <div class="row">
                            <div class="col-md-1">
                                <img class="mt-2" style="width:40px;height:40px;border-radius: 50%;"
                                     src="{{ url( 'uploads')}}/{{Auth::user()->profile->image}}"
                                     alt="">
                            </div>
                            <div class="col-md-11">
                                <textarea  class="form-control mt-2 mb-2" name="comment" id="comment" cols="30"
                                          rows="5">
                            Add a Public Comment
                        </textarea>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary float-right" value="SUBMIT">
                    </form>
                </div>


                <div class="show-customer-review pt-5">

                    <div class="review ">

                        <div class="d-inline">

                            @if (!empty($product->reviews))

                                @foreach($product->reviews as $review)


                                    <h5 class="ml-3" style="display: inline">
                                        <img style="width: 30px;height: 30px;border-radius: 50%" src="{{url('uploads')}}/{{$review->user->profile->image}}" alt="">
                                      <span class="pl-2">  {{$review->user->name}}  </span> </h5>
                                    <span style="color:red" class=" ml-5 mt-2">
                                                                {{$review->rating}} *
                                                                </span>
                                    <span style="color:red" class=" ml-5 mt-2">
{{--                                   {{$products->reviews[]->rating}}--}}
                                </span>
                                    <div class="comment">
                                        <p class="pt-2 pb-2 pl-5 ml-2"> {{$review->comment}} </p>
                                    </div>
                                    <hr>
                                @endforeach
                            @endif
                        </div>

                    </div>

                </div>
            </div>


            <div class="col-md-4">
                <h2 class="text-white bg-dark p-4 font-weight-bold text-center">Popular Products</h2>

                @foreach($populars as $popular)
                    <div class="popular-product">
                        <a class=""
                           href="{{route('show.product',['id'=>$popular->id , 'ProductsUserID' => $popular->user->id])}}">

                            <img style="width:100%;height:200px;" src="{{url('uploads')}}/{{$popular->image}}" alt="">
                            <h4 class="mt-2"> {{$popular->name}} </h4>

                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>


@endsection
