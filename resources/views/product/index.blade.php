@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>List Product</strong>
                </div>
                <div class="card-body">
                    <form action="{{route('product.index')}}" method="get">
                    @csrf
                    <input type="text" name="product_name" id="" placeholder="Product Name" value="{{$product_name}}">
                    <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                    <a href="{{route('product.create')}}" class="btn btn-success pull-right">Add New</a>
                    <br>
                    <br>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Spec</th>
                            <th scope="col">Unit</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Price</th>
                            <th scope="col">Disc</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($products as $item)
                          <tr>
                              <td>{{++$i}}</td>
                              <td>{{$item->product_name}}</td>
                              <td>{{$item->spec}}</td>
                              <td>{{$item->unit}}</td>
                              <td>{{$item->stock}}</td>
                              <td>Rp {{number_format($item->price,2,',','.')}}</td>
                              <td>Rp {{number_format($item->diskon_price,2,',','.')}}</td>
                              <td>
                                  <form action="{{route('product.destroy',$item->id)}}" method="post">
                                    <a href="{{route('product.edit',$item->id)}}" class="btn btn-default"><i class="fa fa-edit"></i> Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-default"><i class="fa fa-trash"></i> Delete</button>
                                  </form>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {!! $products->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
