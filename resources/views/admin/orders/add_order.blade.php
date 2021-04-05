@extends('layouts.admin')

@section('content')
<style type="text/css">
    .checkbox-zoom label input[type="checkbox"], .checkbox-zoom label input[type="radio"]{
        display: none!important ;
    }
</style>
    <!-- Page-header start -->
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Tạo đơn hàng</h4>
                        <!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}"> <i class="feather icon-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('list.orders')}}">Đơn hàng</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Tạo đơn hàng mới</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->

    

    <div class="row">
        <div class="col-sm-12">
            <!-- Shopping cart start -->
            <div class="card">
                <div class="card-header">
                    <h5>Tạo đơn hàng mới</h5>
                </div>
                <div class="">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="wizard">
                                <section>
                                    <form class="wizard-form" method="post" action="{{ route('add.order.post') }}" id="example-advanced-form">
                                        @csrf
                                        <!-- Shopping cart field et start -->
                                        <h3> Thông tin khách hàng </h3>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-sm-12">

                                                            <!-- <label class="form-label">Khách hàng <span style="color: red">*</span></label> -->
                                                            <div class="input-group">
                                                                <select class="js-example-basic-single col-sm-12" name="customer_id" id="customer_id" onchange="getCustomer()" required="">
                                                                    <option value="">---- Chọn khách hàng ----</option>
                                                                    @foreach($list_cus as $customer)
                                                                        <option value="{{ $customer->id }}">{{ $customer->name }} - {{ $customer->phone }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Tên người nhận hàng <span style="color: red">*</span></label>
                                                                <input id="name_receiver" class="form-control" type="text" name="name_receiver" value="" required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Điện thoại người nhận hàng <span style="color: red">*</span></label>
                                                                <input id="phone_receiver" class="form-control" type="text" name="phone_receiver" value="" required="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Địa chỉ người nhận hàng <span style="color: red">*</span></label>
                                                                <input id="address_receiver" class="form-control" type="text" name="address_receiver" value="" required="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="checkbox-zoom zoom-primary">
                                                        <label>
                                                            <input type="checkbox" name="person_pay_shipping" value="2">
                                                            <span class="cr">
                                                                <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                            </span>
                                                            <span>Bao cước ship</span>
                                                        </label>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Thu tiền COD</label>
                                                                <input id="cod" class="form-control" type="text" name="cod" value="" placeholder="VNĐ">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Ghi chú</label>
                                                                <textarea class="form-control" id="note" name="note" rows="2" cols="100">
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </fieldset>
                                        <!-- Shopping cart fieldset end -->
                                        <!-- Delivery Details fieldset start -->
                                        <h3> Thông tin sản phẩm </h3>
                                        <fieldset class="bank-detail p-t-5">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <table id="e-product-list" class="table table-responsive table-striped dt-responsive nowrap dataTable no-footer dtr-inline cart-page" role="grid" style="width: 100%;">
                                                            <tr id="row_1" style="border: 1px solid #ccc">
                                                                <td style="width: 715px;padding-bottom:20px;">
                                                                    <select class="js-example-basic-single1" name="product_id[]" required="" style="width: 100%;" onchange="getProducts1()" id="select_pro1">
                                                                        <option selected="selected" disabled>---- Chọn sản phẩm ----</option>
                                                                        @foreach($list_products as $product)
                                                                            <option value="{{ $product->id }}">{{ $product->code }} - {{ $product->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <br/>
                                                                    <lable style="padding: 15px 15px 15px 0px;float: left">Số lượng</lable>
                                                                    <input type="number" class="form-control" style="width: 30%;float: left;margin-top: 10px;" value="1" name="quantity[]" required="">
                                                                    <span id="unit1" style="padding: 15px 15px 5px 5px;float: left"></span>
                                                                    <!-- <a href="#!" class="text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" style="float: left;padding: 15px 15px 5px 0px;"><i class="icofont icofont-delete-alt"></i></a> -->
                                                                </td>
                                                                
                                                            </tr>
                                                    </table>
                                                    <input class="btn btn-grd-info " type="button" onclick="addRow()" value="Thêm">
                                                </div>
                                            </div>
                                        </fieldset>
                                        <!-- Delivery Details fieldset end -->
                                        
                                    </form>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Shopping cart start -->
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js" integrity="sha512-quHCp3WbBNkwLfYUMd+KwBAgpVukJu5MncuQaWXgCrfgcxCJAq/fo+oqrRKOj+UKEmyMCG3tb8RB63W+EmrOBg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.js" integrity="sha512-nqIFZC8560+CqHgXKez61MI0f9XSTKLkm0zFVm/99Wt0jSTZ7yeeYwbzyl0SGn/s8Mulbdw+ScCG41hmO2+FKw==" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).ready(function() {
            $(".js-example-basic-single1").select2();
        });
    });

    function getProducts1(){
        var id = document.getElementById("select_pro1").value;
        axios.get('/product/show-product/' + id ).then(res=>{
            if(res.status==200){
                console.log(res.data);
                if(res.data.unit == 1){
                    document.getElementById("unit1").innerHTML = "Kg";
                }else{
                    document.getElementById("unit1").innerHTML = "Hộp";
                }
            }
        }).catch(err=>{
            console.log(err)
        });
    }

    function getProduct(id_row){
        var id = document.getElementById("select_pro"+id_row).value;
        axios.get('/product/show-product/' + id ).then(res=>{
            if(res.status==200){
                console.log(res.data);
                if(res.data.unit == 1){
                    document.getElementById("unit"+id_row).innerHTML = "Kg";
                }else{
                    document.getElementById("unit"+id_row).innerHTML = "Hộp";
                }
            }
        }).catch(err=>{
            console.log(err)
        });
    }

    function getCustomer() {
            var id = document.getElementById("customer_id").value;
            axios.get('/customer/show-customer/' + id ).then(res=>{
                if(res.status==200){
                    console.log(res.data);

                    $('#name_receiver').val(res.data.name);
                    $('#address_receiver').val(res.data.adress + ", " + res.data.ward.name + ", " + res.data.district.name + ", " + res.data.province.name);
                    $('#phone_receiver').val(res.data.phone);
                }
            }).catch(err=>{
                console.log(err)
            });
    }

    function addRow()
    {
      var new_id = $('tr').length + 1;

      var new_row = '';
      new_row += '<tr id="row_'+new_id+'" style="border: 1px solid #ccc">';
      new_row += '<td style="width: 715px;padding-bottom:20px;" >'+
                        '<select class="js-example-basic-single'+new_id+'" style="width: 100%;" name="product_id[]" onchange="getProduct('+new_id+')" id="select_pro'+new_id+'">'+
                          '<option selected="selected" disabled>---- Chọn sản phẩm ----</option>'+
                            @foreach($list_products as $product)
                                '<option value="{{ $product->id }}">{{ $product->code }} - {{ $product->name }}</option>'+
                            @endforeach
                        '</select>'+
                        '<lable style="padding: 15px 15px 15px 0px;float: left">Số lượng</lable>'+
                        '<input type="number" class="form-control" style="width: 30%;float: left;margin-top: 10px;" value="1" name="quantity[]" required="">'+
                        '<span id="unit'+new_id+'" style="padding: 15px 15px 5px 5px;float: left"></span>'+
                        '<a href="javascript:deleteRow('+new_id+')" class="text-muted" data-toggle="tooltip" data-placement="top" title="Xóa" data-original-title="Xóa" style="float: left;padding: 15px;"><i class="icofont icofont-delete-alt"></i></a>'+
                    '</td>';

      $("#e-product-list").append(new_row);
      $(".js-example-basic-single"+new_id).select2();
    }

    function deleteRow(rowid)  
    {   
        var row = document.getElementById("row_"+rowid);
        row.parentNode.removeChild(row);
    }
</script>

@endsection