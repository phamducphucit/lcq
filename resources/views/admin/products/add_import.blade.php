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
                        <h4>Nhập hàng vào kho</h4>
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
                        <li class="breadcrumb-item"><a href="{{ route('list.imports')}}">Danh sách nhập Kho</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Nhập hàng vào kho</a>
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
                    <h5>Nhập hàng vào kho</h5>
                </div>
                <div class="" style="padding:8px;">
                    <div class="row">
                        <div class="col-md-12">
                                <section>
                                    <form method="post" action="{{ route('add.import.post') }}" enctype="multipart/form-data">
                                        @csrf
                                        
                                        <!-- Delivery Details fieldset start -->
                                        <fieldset class="bank-detail p-t-5">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Mã bill <span style="color: red">*</span></label>
                                                                <input id="name" class="form-control" type="text" name="name" value="" placeholder="Vui lòng nhập tên hoặc mã bill">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label>Hình bill:</label>
                                                            <div class="input-group">
                                                                <input type="file"  name="image" class="form-control pname {{$errors->has('image') ? 'is-invalid' : '' }}" placeholder="Hình">
                                                                @if($errors->has('image'))
                                                                  <span class="messages" style="color: red;">{{$errors->first('image')}}</span>
                                                                @endif 
                                                                <span class="input-group-addon btn btn-primary">Chọn hình</span>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <label>Sản phẩm cần nhập kho:</label>
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
                                                    
                                                    <div class="form-group row">
                                                        <div class="col-sm-6">
                                                            <input class="btn btn-sm btn-grd-info " type="button" onclick="addRow()" value="+ Thêm">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <button type="submit" class="btn btn-primary" style="float: right;">Nhập kho</button>
                                                        </div>
                                                    </div>
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
                    document.getElementById("unit1").innerHTML = "kg";
                }
                if(res.data.unit == 2){
                    document.getElementById("unit1").innerHTML = "hộp";
                }
                if(res.data.unit == 3){
                    document.getElementById("unit1").innerHTML = "túi";
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
                    document.getElementById("unit"+id_row).innerHTML = "kg";
                }
                if(res.data.unit == 2){
                    document.getElementById("unit"+id_row).innerHTML = "hộp";
                }
                if(res.data.unit == 3){
                    document.getElementById("unit"+id_row).innerHTML = "túi";
                }
                
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