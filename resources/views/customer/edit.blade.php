@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong>Edit Customer</strong></div>

                <div class="card-body">
                  
                    <form action="{{route('customer.update',$customer->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <strong>Customer Name</strong>
                            <input type="text" name="customer_name" id="" value="{{$customer->customer_name}}"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <strong>City</strong>
                            <input type="text" name="city" id="" class="form-control" value="{{$customer->city}}">
                        </div>
                        <div class="form-group">
                            <strong>Province</strong>
                            <input type="text" name="province" id="" class="form-control" value="{{$customer->province}}">
                        </div>
                        
                        <div class="form-group">
                            <strong>Zip Code</strong>
                            <input type="number" name="zip" id="" class="form-control" value="{{$customer->zip}}">
                        </div>
                        <div class="form-group">
                            <strong>Address</strong>
                            <textarea name="address" id="" cols="30" rows="10" class="form-control">{{$customer->address}}</textarea>
                        </div>
                        <div class="form-group">
                            <strong>Contact Person</strong>
                            <input type="text" name="contact_person" id="" class="form-control" value="{{$customer->contact_person}}">
                        </div>
                        <div class="form-group">
                            <strong>Email</strong>
                            <input type="email" name="email" id="" class="form-control" value="{{$customer->email}}">
                        </div>

                </div>
                <div class="card-footer">
                    <div class="pull-right">
                        <a href="{{route('customer.index')}}" class="btn btn-warning">Back</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
