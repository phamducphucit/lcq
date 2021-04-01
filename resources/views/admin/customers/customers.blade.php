@extends('layouts.admin')

@section('content')
<!-- Page-header start -->
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Quản lý khách hàng</h4>
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
                        <li class="breadcrumb-item"><a href="#!">Khách hàng</a>
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
        					 <h4>Danh sách khách hàng </h4>
        				</div>
        				<div class="col-sm-6">
        					<h5 style="float: right;"><a href="{{ route('add.customer') }}" class="btn btn-primary">Thêm khách hàng mới</a></h5>

        				</div>
        			</div>		            
		        </div>
		        <div class="card-block">
		            <div class="dt-responsive table-responsive">
		                <table id="simpletable" class="table table-striped table-bordered nowrap">
		                    <thead>
		                    <tr>
		                    	<th>Hình</th>
		                        <th>Khách hàng</th>
		                        <th>Điện thoại</th>
		                        <th>Địa chỉ</th>
		                        <th>Hành động</th>
		                    </tr>
		                    </thead>
		                    <tbody>
		                    	@foreach($list_customers as $customer)
		                        <tr>
		                            <td>
                                  <a href="/{{$customer->image}}" data-lightbox="{{ $customer->name }}" data-title="{{$customer->name}}">
  		                            	<img src="/{{ $customer->image }}" style="width: 50px; height: 50px;">
                                  </a>
		                            </td>
		                            <td>{{ $customer->name }} <br/> <small><b>{{ $customer->phone }}</b></small> <br/> <small><i>{{ $customer->province->name }}</i></small></small></td>
		                            <td>{{ $customer->phone }}</td>
		                            <td>{{ $customer->adress }}</td>
		                            
		                            <td class="action-icon">
                                        <a href="{{ route('edit.customer',$customer->id)}}" class="m-r-15 text-muted" data-placement="top" title="" data-original-title="Edit"><i class="icofont icofont-ui-edit"></i></a>
                                        <a href="#!" onclick="deleteCustomer({{ $customer->id }})" class="text-muted" data-placement="top" title="" data-original-title="Delete"><i class="icofont icofont-delete-alt"></i></a>
                                    </td>
		                        </tr>
		                        @endforeach
		                    </tbody>
		                    <!-- <tfoot>
		                    <tr>
		                        <th>Name</th>
		                        <th>Position</th>
		                        <th>Office</th>
		                        <th>Age</th>
		                        <th>Start date</th>
		                        <th>Salary</th>
		                    </tr>
		                    </tfoot> -->
		                </table>
		            </div>
		        </div>
		    </div>
		    <!-- Zero config.table end -->


		   
        </div>
    </div>
@endsection

<!-- @push('ajax_crud')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

@endpush  -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>
<script>
   function deleteCustomer(id){
         Swal.fire({
       title: 'Bạn có chắc chắn muốn xóa khách hàng này không?',
       text: "Nếu xóa bạn sẽ không khôi phục lại được.",
       icon: 'warning',
       type: 'warning',
       timer: 14400, 
       showCancelButton: true,
       showConfirmButton: true,
       confirmButtonColor: '#3085d6',
       cancelButtonColor: '#d33',
       confirmButtonText: 'Có, xóa nó đi!'
     }).then((result) => {
       if (result.value) {
            $.ajax({
                type: "GET",
                url: "{{url('/customer/delete-customer/')}}/"+id,
                success: function (data) {
                    }         
            });
         Swal.fire(
           'Đã xóa!',
           'Khách hàng này đã bị xóa!',
           'success',
         )
       }
       location.reload();
     })
   }
</script>


                                                                              