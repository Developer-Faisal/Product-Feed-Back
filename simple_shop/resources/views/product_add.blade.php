@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __(' Product') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif



                        <form action="/product/add" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="image"> Product </label>
                                <input type="file" name="image" class="form-control" id="image">
                            </div>

                            <div class="form-group">
                                <label for="name"> Product Name </label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter Product Name">
                            </div>

                            <div class="form-group">
                                <label for="description"> Product Description </label>
                                <textarea class="form-control" name="description" id="description"> </textarea>
                            </div>

                            <input type="submit" name="submit" class="form-control btn btn-success"  value="Submit" >

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
