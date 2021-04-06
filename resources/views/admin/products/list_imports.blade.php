@extends('layouts.admin')

@section('content')
<!-- Page-header start -->
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Quản lý nhập kho</h4>
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
                        <li class="breadcrumb-item"><a href="#!">Nhập kho</a>
                        </li>
                        <!-- <li class="breadcrumb-item"><a href="#!">Basic Initialization</a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->
    <div class="row">
        <div class="col-sm-12">
        	<!-- Zero config.table start -->
		    <div class="card">
		        <div class="card-header">
		        	<div class="row">
        				<div class="col-sm-6">
        					 <h4>Danh sách nhập kho </h4>
        				</div>
        				<div class="col-sm-6">
        					<h5 style="float: right;"><a href="{{ route('add.import') }}" class="btn btn-primary">Nhập hàng vào kho</a></h5>

        				</div>
        			</div>		            
		        </div>
		        <div class="card-block">
		            <div class="dt-responsive table-responsive">
		                <table id="simpletable" class="table table-striped table-bordered nowrap">
		                    <thead>
		                    <tr>
		                    	  <th>Hình</th>
		                        <th>Bill</th>
		                        
		                        <th>Thời gian</th>
		                    </tr>
		                    </thead>
		                    <tbody>
		                    	@foreach($list_imports as $import)
		                        <tr>
		                            <td>
                                  <a href="/{{$import->image}}" data-lightbox="{{ $import->name }}" data-title="{{$import->name}}">
  		                            	<img src="/{{ $import->image }}" style="width: 50px; height: 50px;">
                                  </a>
		                            </td>
		                            <td><a href="#!" onclick="showImportDetail({{$import->id}})">{{ $import->name }}</a> <br/> <small><b>{{ $import->order_date }}</b></small></td>
		                            <td>{{ $import->created_at }}</td>
		                        </tr>
		                        @endforeach
		                    </tbody>
		                    
		                </table>
		            </div>
		        </div>
		    </div>
		    <!-- Zero config.table end -->

        </div>
    </div>


    <div class="modal fade show" id="myModalImport"  tabindex="-1" role="dialog" aria-hidden="true" style="display: none">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title" id="divID">THÔNG TIN NHẬP KHO</h4>
              <button type="button" class="close" data-dismiss="modal" title="Đóng">&times;</button>
            </div>
                <div class="modal-body">
                   <input type="hidden" id="order_id" name="order_id" value="">
                   <u>Mã bill</u> : <b><span id="name"></span></b> <br/>
                   <u>Ngày nhập</u> : <b><span id="date"></span></b> <br/>
                  
                   <u>Thông tin sản phẩm</u> : <br/>
                    
                   <table class="table-responsive">
                    <thead>
                       <tr>
                           <th scope="col">Sản phẩm</th>
                           <th scope="col">Số lượng nhập</th>
                           <th scope="col">Số lượng trước khi nhập</th>
                           <th scope="col">Số lượng sau khi nhập</th>
                       </tr>
                    </thead>
                    <tbody id="products">
                       
                    </tbody>
                   </table>
                    

                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
          </div>
        </div>
    </div>
@endsection


<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>
<script>
    function showImportDetail(id_import)
    {
        $("#myModalImport").modal('show');

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        
        // get price from Quickbook API
        $.ajax({
            url: "/product/show-import-detail/"+id_import,
            type: 'GET',
            success: function (data) {
                console.log(data);
                $("#name").html(data.name);
                 $("#date").html(data.order_date);
                $("#products").html(data.products);
            },
        });
    }
</script>

                                                                              