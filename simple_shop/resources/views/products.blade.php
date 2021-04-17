@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">


            <table class="table">
                <thead>
                <tr>
                    <th >#</th>
                    <th > Product  </th>
                    <th > Product Name  </th>
                    <th > Author Name  </th>
                    <th > Product Description  </th>
                    <th class="2"> Action  </th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td>   <img style="width: 200px;height: 100px" src="{{url("uploads")}}/{{$product->image}}" class="card-img-top" alt="..."> </td>
                    <td>{{$product->name}}</td>
                    <td> {{$product->user->name}}  </td>
                    <td> {{$product->description}} </td>
                    <td > <a href="{{route('edit.products',['id'=> $product->id ])}}" class="btn btn-primary"> Edit </a> </td>
                    <td > <form method="POST" action="{{ route('delete.products', [ 'id'=> $product->id ]) }}">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger btn-icon">
                                Delete
                            </button>
                        </form> </td>

                </tr>
                @endforeach
                </tbody>
            </table>



@endsection
