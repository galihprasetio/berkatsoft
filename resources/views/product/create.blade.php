@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong>Create Product</strong></div>

                <div class="card-body">
                  
                    <form action="{{route('product.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <strong>Product Name</strong>
                            <input type="text" name="product_name" id="" value="{{old('product_name')}}"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <strong>Spesification</strong>
                            <input type="text" name="spec" id="" class="form-control" value="{{old('spec')}}">
                        </div>
                        <div class="form-group">
                            <strong>Unit</strong>
                            <select name="unit" id="" class="form-control">
                                <option value="">Select Unit</option>
                                <option value="EA">EA</option>
                                <option value="PCS">PCS</option>
                                <option value="BOX">BOX</option>
                                <option value="Unit">Unit</option>
                                <option value="Kg">Kg</option>
                                <option value="Meter">Meter</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <strong>Stock</strong>
                            <input type="number" name="stock" id="" class="form-control" value="{{old('stock')}}">
                        </div>
                        <div class="form-group">
                            <strong>Price</strong>
                            <input type="number" name="price" id="" class="form-control" value="{{old('price')}}">
                        </div>
                        <div class="form-group">
                            <strong>Diskon Price</strong>
                            <input type="number" name="diskon_price" id="" class="form-control"
                                value="{{old('diskon_price')}}">
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
