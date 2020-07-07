@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong>Create Customer</strong></div>

                <div class="card-body">
                  
                    <form action="{{route('customer.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <strong>Customer Name</strong>
                            <input type="text" name="customer_name" id="" value="{{old('customer_name')}}"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <strong>City</strong>
                            <input type="text" name="city" id="" class="form-control" value="{{old('city')}}">
                        </div>
                        <div class="form-group">
                            <strong>Province</strong>
                            <input type="text" name="province" id="" class="form-control" value="{{old('province')}}">
                        </div>
                        
                        <div class="form-group">
                            <strong>Zip Code</strong>
                            <input type="number" name="zip" id="" class="form-control" value="{{old('zip')}}">
                        </div>
                        <div class="form-group">
                            <strong>Address</strong>
                            <textarea name="address" id="" cols="30" rows="10" class="form-control">{{old('address')}}</textarea>
                        </div>
                        <div class="form-group">
                            <strong>Contact Person</strong>
                            <input type="text" name="contact_person" id="" class="form-control" value="{{old('contact_person')}}">
                        </div>
                        <div class="form-group">
                            <strong>Email</strong>
                            <input type="email" name="email" id="" class="form-control" value="{{old('email')}}">
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
