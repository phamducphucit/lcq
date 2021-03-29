@extends('layouts.admin')

@section('content')

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
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="wizard">
                                <section>
                                    <form class="wizard-form" method="post" action="#" id="example-advanced-form">
                                        <!-- Shopping cart field et start -->
                                        <h3> Thông tin khách hàng </h3>
                                        <fieldset>
                                            <div class="row justify-content-center">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-sm-12">

                                                            <label class="form-label">Khách hàng <span style="color: red">*</span></label>
                                                            <div class="input-group">
                                                                <select class="js-example-basic-single col-sm-12 select2-hidden-accessible" name="customer_id" id="customer_id" onchange="getCustomer()" required="">
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

                                                </div>
                                            </div>
                                        </fieldset>
                                        <!-- Shopping cart fieldset end -->
                                        <!-- Delivery Details fieldset start -->
                                        <h3> Thông tin sản phẩm </h3>
                                        <fieldset class="bank-detail p-t-5">
                                            <table id="e-product-list" class="table table-responsive table-striped dt-responsive nowrap dataTable no-footer dtr-inline cart-page" role="grid" style="width: 100%;">
                                                    <tr id="row_1" class="row">
                                                        <td>
                                                            <select class="js-example-data-array col-sm-12" name="product_id[]" required="">
                                                                <option value="">---- Chọn sản phẩm ----</option>
                                                                @foreach($list_products as $product)
                                                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="number[]" class="form-control" style="width: 100%;" value="">
                                                        </td>
                                                        <td class="action-icon text-center">
                                                            <a href="#!" class="text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="icofont icofont-delete-alt"></i></a>
                                                        </td>
                                                    </tr>
                                            </table>
                                            <input type="button" onclick="addRow()" value="Thêm">

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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">

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
      var new_id = $('.row').length + 1;

      var new_row = $("#e-product-list tr:first").clone().attr('id','row_'+new_id);

      $("#e-product-list").append(new_row);
    }
</script>

@endsection