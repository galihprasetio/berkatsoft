@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong>Edit Product</strong></div>

                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops</strong>there is error input
                        @foreach ($errors->all() as $error)
                        <label for="">{{$error}}</label>
                        @endforeach
                    </div>
                    @endif
                    <form action="{{route('product.update',$product->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <strong>Product Name</strong>
                            <input type="text" name="product_name" id="" value="{{$product->product_name}}"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <strong>Spesification</strong>
                            <input type="text" name="spec" id="" class="form-control" value="{{$product->spec}}">
                        </div>
                        <div class="form-group">
                            <strong>Unit</strong>
                            <select name="unit" id="" class="form-control">
                                <option value="">Select Unit</option>
                                <option value="EA" {{($product->unit == "EA") ? 'selected': ''}}>EA</option>
                                <option value="PCS" {{($product->unit == "PCS") ? 'selected': ''}}>PCS</option>
                                <option value="BOX" {{($product->unit == "BOX") ? 'selected': ''}}>BOX</option>
                                <option value="Unit" {{($product->unit == "Unit") ? 'selected': ''}}>Unit</option>
                                <option value="Kg" {{($product->unit == "Kg") ? 'selected': ''}}>Kg</option>
                                <option value="Meter" {{($product->unit == "Meter") ? 'selected': ''}}>Meter</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <strong>Stock</strong>
                            <input type="number" name="stock" id="" class="form-control" value="{{$product->stock}}">
                        </div>
                        <div class="form-group">
                            <strong>Price</strong>
                            <input type="number" name="price" id="" class="form-control" value="{{$product->price}}">
                        </div>
                        <div class="form-group">
                            <strong>Diskon Price</strong>
                            <input type="number" name="diskon_price" id="" class="form-control"
                                value="{{$product->diskon_price}}">
                        </div>

                </div>
                <div class="card-footer">
                    <div class="pull-right">
                        <a href="{{route('product.index')}}" class="btn btn-warning">Back</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
