@extends('layout')

@section('content')


    <div class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif
        <form  method="POST" action="{{ route('products.store') }}">
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="ean">EAN-13:</label>
                    @csrf
                    <input type="text" class="form-control" id="ean" name="ean">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="qty">Quantity:</label>
                    <input type="text" class="form-control" id="qty" name="qty">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="text" class="form-control" id="price" name="price">
                </div>
            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-lg btn-primary ">+</button>
            </div>
        </form> 
    </div>
    <table id="products" class="display" data-order='[[ 1, "asc" ]]' data-page-length='25'>
        <thead>
            <tr>
                <th>EAN-13</th>
                <th data-class-name="priority">Title</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Price (VAT)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{$product->ean}}</td>
                <td>{{$product->title}}</td>
                <td>{{$product->qty}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->price + ($product->price * 0.21)}}</td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-xs btn-primary" >edit</a> 
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-xs btn-danger ">delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        $(document).ready( function () {
            $('#products').DataTable();
        } );
    </script>
@stop