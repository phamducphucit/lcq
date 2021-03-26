@extends('layouts.admin')

@section('content')
<!-- Page-header start -->
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Manager Permissions</h4>
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
                        <li class="breadcrumb-item"><a href="#!">Permissions</a>
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
        					 <h4>List Permissions </h4>
        				</div>
        				<div class="col-sm-6">
        					<h5 style="float: right;"><a href="{{ route('add.permission') }}" class="btn btn-primary">Add New Permission</a></h5>
        				</div>
        			</div>		            
		        </div>
		        <div class="card-block">
		            <div class="dt-responsive table-responsive">
		                <table id="simpletable" class="table table-striped table-bordered nowrap">
		                    <thead>
		                    <tr>
		                        <th>Name</th>
		                        <th>Display Name</th>
		                        <th>Action</th>
		                    </tr>
		                    </thead>
		                    <tbody>
		                    	@foreach($list_permissions as $permission)
		                        <tr>
		                            <td>{{ $permission->name }}</td>
		                            <td>{{ $permission->display_name }}</td>
		                            <td>
		                            	<a href="{{route('edit.permission', $permission->id)}}">
    					                     <i class="fa fa-edit blue"></i>Edit
    					                     </a>
    					                     /
    					                     <span onclick="deletePermission({{ $permission->id }})">
    						                     <i class="fa fa-trash" style="color: red" ></i>Xóa
    						                   </span>
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


<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>
<script>

   function deletePermission(id){
         Swal.fire({
       title: 'Are you sure?',
       text: "You won't be able to revert this!",
       icon: 'warning',
       type: 'warning',
       timer: 14400, 
       showCancelButton: true,
       showConfirmButton: true,
       confirmButtonColor: '#3085d6',
       cancelButtonColor: '#d33',
       confirmButtonText: 'Yes, delete it!'
     }).then((result) => {
       if (result.value) {
            $.ajax({
                type: "GET",
                url: "{{url('/delete-permission/')}}/"+id,
                success: function (data) {
                    }         
            });
         Swal.fire(
           'Deleted!',
           'Your file has been deleted.',
           'success',
         )
       }
       location.reload();
     })
   }
</script>


