@extends('layouts.admin')

@section('content')

<!-- Page-header start -->
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Edit User</h4>
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
                        <li class="breadcrumb-item"><a href="{{ route('list.users')}}">Users</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Edit User</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->

    <div class="row">
        <div class="col-sm-12">
        	<!-- Input Validation card start -->
        	<form method="post" action="{{ route('update.user.post', $user->id )}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}"> 
			    <div class="card">
			        <!-- <div class="card-header">
			            <h5>Edit User</h5>
			            <span>Edit class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
			            <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>
			        </div> -->
			        <div class="card-block">
			            <h4 class="sub-title">Edit User</h4>
			            <div class="form-group row">
	                        <div class="col-sm-6">
	                        	<label>Name :</label>
	                            <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ $user->name }}">
	                        </div>
	                        <div class="col-sm-6">
	                        	<label>Email :</label>
	                            <input type="text" name="email" class="form-control" placeholder="Enter Email" value="{{ $user->email }}">
	                        </div>
	                    </div>
	                    <div class="form-group row">
	                        <div class="col-sm-6">
	                        	<label>Password :</label>
	                            <input type="password" name="password" class="form-control" placeholder="Enter Password">
	                        </div>
	                        <div class="col-sm-6">
	                        	<!--  -->
	                        </div>
	                    </div>
	                    <div class="form-group row">
	                    	<div class="col-sm-12">
	                    	<label>Role :</label>
	                        <select class="js-example-basic-multiple col-sm-12" multiple="multiple" name="role_id[]">
	                        	@foreach($list_roles as $list_role)
	                        		 <option 
		                        		{{ $roleofuser->contains($list_role->id) ? 'selected' : '' }}
		                        		value="{{ $list_role->id }}">{{ $list_role->name }}	                        		 
	                        		</option>
	                        	@endforeach
	                        </select>
	                    	</div>
	                    </div>
	                    <div class="form-group row">
	                        <div class="col-sm-6">
	                        	<!--  -->
	                        </div>
	                        <div class="col-sm-6">
	                        	<button type="submit" class="btn btn-primary" style="float: right;">Edit User</button>
	                        </div>
	                    </div>
			        </div>
			    </div>
			</form>
		    <!-- Input Validation card end -->        	
        </div>
    </div>


    


@endsection