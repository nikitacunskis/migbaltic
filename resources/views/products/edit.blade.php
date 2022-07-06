@extends('layout')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif
<form  method="POST" action="{{ route('products.update', $product->id) }}">
    <div class="form-group">
        <label for="ean">EAN-13:</label>
        @csrf
        @method('PATCH')
        <input type="text" class="form-control" value="{{$product->ean}}" disabled>
    </div>
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" id="title" name="title" value="{{$product->title}}">
    </div>
    <div class="form-group">
        <label for="qty">Quantity:</label>
        <input type="text" class="form-control" id="qty" name="qty" value="{{$product->qty}}">
    </div>
    <div class="form-group">
        <label for="price">Price:</label>
        <input type="text" class="form-control" id="price" name="price" value="{{$product->price}}">
    </div>
    <button type="submit" class="btn btn-lg btn-primary ">EDIT</button>
</form> 

@stop