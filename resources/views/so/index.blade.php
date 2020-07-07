@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>List Sales Order</strong>
                </div>
                <div class="card-body">
                    <form action="{{route('so.index')}}" method="get">
                    @csrf
                    <input type="date" name="startDate" id="" value="{{ date('Y-m-d', strtotime($startDate))}}" >
                    <input type="date" name="endDate" id="" value="{{ date('Y-m-d', strtotime($endDate))}}" >
                    <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                    <a href="{{route('so.create')}}" class="btn btn-success pull-right">Add New</a>
                    <br>
                    <br>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">SO Code</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Contact Person</th>
                            <th scope="col">Email</th>
                            <th scope="col">Posting Date</th>
                            <th scope="col">Delivery Date</th>
                            <th scope="col">Status</th>
                            {{-- <th scope="col">Action</th> --}}
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($salesOrders as $item)
                          <tr>
                              <td>{{++$i}}</td>
                              <td>{{$item->so_code}}</td>
                              <td>{{$item->customer_name}}</td>
                              <td>{{$item->contact_person}}</td>
                              <td>{{$item->email}}</td>
                              <td>{{$item->posting_date}}</td>
                              <td>{{$item->delivery_date}}</td>
                              <td>{{$item->status}}</td>                        
                              {{-- <td>
                                  <form action="{{route('so.destroy',$item->id)}}" method="post">
                                    <a href="{{route('so.edit',$item->id)}}" class="btn btn-default"><i class="fa fa-edit"></i> Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-default"><i class="fa fa-trash"></i> Delete</button>
                                  </form>
                              </td> --}}
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {!! $salesOrders->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
