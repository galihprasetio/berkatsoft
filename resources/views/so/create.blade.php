@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong>Create Sales Order</strong></div>

                <div class="card-body">

                    <form action="{{route('so.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Customer Name</strong>
                                    <select name="id_customer" id="id_customer" class="form-control">
                                        <option value="">Select Customer</option>
                                        @foreach ($customers as $item)
                                        <option value="{{$item->id}}">{{$item->customer_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <strong>Contact Person</strong>
                                    <input type="text" name="contact_person" id="contact_person" class="form-control"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <strong>Email</strong>
                                    <input type="email" name="email" id="email" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <strong>Address</strong>
                                    <textarea name="address" id="address" cols="30" rows="3" class="form-control"
                                        readonly></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Posting Date</strong>
                                    <input type="date" name="posting_date" id="posting_date" class="form-control"
                                        value="{{old('posting_date')}}">
                                </div>
                                <div class="form-group">
                                    <strong>Delivery Date</strong>
                                    <input type="date" name="delivery_date" id="delivery_date" class="form-control"
                                        value="{{old('delivery_date')}}">
                                </div>
                                <div class="form-group">
                                    <strong>Status</strong>
                                    <input type="text" name="status" id="status" class="form-control" value="Open"
                                        readonly>
                                </div>
                            </div>

                        </div>
                        <div class="pull-right">
                            <button type="button" class="btn btn-success btn-sm add-product" >Add Product</button>
                        </div>
                        <br>
                        <br>
                        <div class="table-responsive">
                        <table class="table table-bordered" id="product-table">
                            <thead>
                                <tr>
                                    <th scope="col" class="col-">Product Name</th>
                                    <th scope="col" class="col-">Spec</th>
                                    <th scope="col" class="col-">Unit</th>
                                    <th scope="col" class="col-">Price</th>
                                    <th scope="col" class="col-">Qty</th>
                                    <th scope="col" class="col-">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                        <div class="pull-right">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Sub Total</th>
                                        <br>
                                        <th><input type="number" name="sub_total" id="sub_total" class="form-control" readonly>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong> Tax (%)</strong></td>
                                        <td><input type="number" name="tax" id="tax" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td><strong> Shipment</strong></td>
                                        <td><input type="number" name="shipment" id="shipment" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong> Total Payment </strong></td>
                                        <td><input type="number" name="total_payment" id="total_payment" class="form-control" readonly></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                </div>
                <div class="card-footer">
                    <div class="pull-right">
                        <a href="{{route('so.index')}}" class="btn btn-warning">Back</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="addProduct" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <strong>Product Name</strong>
                    <select name="id_product" id="id_product" class="form-control" style="width: 100%;">
                        <option value="">Select Product</option>
                        @foreach ($products as $item)
                        <option value="{{$item->id}}">{{$item->product_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <strong>Spesification</strong>
                    <input type="text" name="spec" id="spec" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <strong>Unit</strong>
                    <input type="text" name="unit" id="unit" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <strong>Price</strong>
                    <input type="number" name="price" id="price" class="form-control" readonly>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="addProduct()">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
    $("#id_customer").select2({
        placeholder: 'Select Customer',
        language: 'id',
        allowClear: true
    });
    $("#id_product").select2({
        placeholder: 'Select Product',
        language: 'id',
        allowClear: true,
        dropdownParent: $("#addProduct")
    });
    $('.add-product').click(function(){
        var id_customer = document.getElementById("id_customer");
        var posting_date = document.getElementById("posting_date");
        var delivery_date = document.getElementById("delivery_date");
        if (id_customer.value != "" && posting_date.value != "" && delivery_date.value != "") {
            $('#addProduct').modal({
			    backdrop: 'static'
		    });
        }else{
            alert('Please complete input field');
        }
    });
    function addProduct(){
        id_product = document.getElementById("id_product").selectedIndex;
        product_name = $("#id_product option:selected" ).text();
        var spec = document.getElementById("spec");
        var unit = document.getElementById("unit");
        var price = document.getElementById("price");
        $("#product-table > tbody").append("<tr><td class='col-'><input type='hidden' name='id_product[]' value="+id_product+" readonly/><input type='text' name='product_name[]' value='"+product_name+"' readonly/></td><td class='col-'><input type='text' name='spec[]' value='"+spec.value+"' readonly></td><td class='col-'><input type='text' name='unit[]' value="+unit.value+" readonly></td><td class='col-'><input type='number' class='price' name='price[]' value='"+price.value+"' readonly/></td><td class='col-'><input type='number' class='quantity' id='quantity' name='quantity[]'></td><td class='col-'><button class='btn btn-sm btn-danger btn-delete'>Delete</button></td></tr>");
        document.getElementById("spec").value ="";
        document.getElementById("unit").value ="";
        document.getElementById("price").value ="";
        $('#addProduct').modal('toggle');
    }
    function subTotal(){
        var sum = 0.0;
        $('#product-table > tbody  > tr').each(function() {
            var qty = $(this).find('.quantity').val();
            var price = $(this).find('.price').val();
            var amount = parseFloat(qty) * parseFloat(price);
            amount = isNaN(amount) ? 0 : amount;  //checks for initial empty text boxes
            sum += amount;
        });
        $("#sub_total").val(sum);
    }
    function grandTotal(){
        var tax = $("#tax").val();
        var subTotal = $("#sub_total").val();
        var shipment = $("#shipment").val();
        tax = isNaN(parseFloat(tax)) ? 0 : tax;
        shipment = isNaN(parseFloat(shipment)) ? 0 : shipment;
        var calTax = (tax / 100) * subTotal;
        var total_payment = parseFloat(subTotal) + parseFloat(calTax) + parseFloat(shipment);
        $("#total_payment").val(total_payment);
    }
    $(document).on('change','#quantity',function(){
     subTotal();
    });
    
    $("#id_customer").change(function(){
        const id_customer = $(this).val();
        $.ajax({
                url: "{{route('getCustomer')}}",
                type: "get",
                dataType: "json",
                async: true,
                data: {
                    id_customer: id_customer
                },
                success: function(data){
                    if(data.id === undefined){
                        $('#contact_person').val('');
                        $('#email').val('');
                        $('#address').val('');
                    }else{
                        $('#contact_person').val(data.contact_person);
                        $('#email').val(data.email);
                        $('#address').val(data.address);
                    }
                }     
            });  
    });
    $("#id_product").change(function(){
        const id_product = $(this).val();
        $.ajax({
                url: "{{route('getProduct')}}",
                type: "get",
                dataType: "json",
                async: true,
                data: {
                    id_product: id_product
                },
                success: function(data){
                    if(data.id === undefined){
                        $('#spec').val('');
                        $('#unit').val('');
                        $('#price').val('');
                    }else{
                        $('#spec').val(data.spec);
                        $('#unit').val(data.unit);
                        $('#price').val(data.price);
                    }
                }     
            });  
    });
    $("#tax").change(function(){
        grandTotal();
    })
    $("#shipment").change(function(){
        grandTotal();
    })
    $("body").on("click", ".btn-delete", function(){
        $(this).parents("tr").remove();
        subTotal();
    });
</script>
@endpush
