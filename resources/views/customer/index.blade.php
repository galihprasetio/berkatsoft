@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>List Customer</strong>
                </div>
                <div class="card-body">
                    <form action="{{route('customer.index')}}" method="get">
                    @csrf
                    <input type="text" name="customer_name" id="" placeholder="Customer Name" value="{{$customer_name}}">
                    <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                    <a href="{{route('customer.create')}}" class="btn btn-success pull-right">Add New</a>
                    <br>
                    <br>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Zip</th>
                            <th scope="col">City</th>
                            <th scope="col">Province</th>
                            <th scope="col">Email</th>
                            <th scope="col">Contact Person</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($customers as $item)
                          <tr>
                              <td>{{++$i}}</td>
                              <td>{{$item->customer_name}}</td>
                              <td>{{$item->zip}}</td>
                              <td>{{$item->city}}</td>
                              <td>{{$item->province}}</td>
                              <td>{{$item->email}}</td>
                              <td>{{$item->contact_person}}</td>
                              <td>
                                  <form action="{{route('customer.destroy',$item->id)}}" method="post">
                                    <a href="{{route('customer.edit',$item->id)}}" class="btn btn-default"><i class="fa fa-edit"></i> Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-default"><i class="fa fa-trash"></i> Delete</button>
                                  </form>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {!! $customers->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
