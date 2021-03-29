@extends('layouts.admin')

@section('content')

<!-- Page-header start -->
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Edit Category</h4>
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
                        <li class="breadcrumb-item"><a href="{{ route('list.categories')}}">Categories</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Edit Category</a>
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
        	<form method="post" action="{{route('update.category.post', $category->id)}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}"> 
			    <div class="card">
			        <!-- <div class="card-header">
			            <h5>Add Product</h5>
			            <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
			            <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>
			        </div> -->
			        <div class="card-block">
			            <h4 class="sub-title">Edit Category</h4>
			            <div class="form-group row">
	                        <div class="col-sm-6">
	                        	<label>Name :</label>
	                           <input type="text" name="name" id="name" class="form-control pname {{$errors->has('name') ? 'is-invalid' : '' }}" value="{{ $category->name }}" placeholder="Enter Category">
	                           @if($errors->has('name'))
		                          <span class="messages" style="color: red;">{{$errors->first('name')}}</span>
		                       @endif 
	                        </div>
	                        <div class="col-sm-6">
	                        	<label>Status :</label>
	                            <select class="form-control stock {{$errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                                <option value="">---- Select Status ----</option>
                                <option value="1" {{ $category->status == 1 ? 'selected' : ''}}>Active</option>
                                <option value="2" {{ $category->status == 2 ? 'selected' : ''}}>Deactive</option>
                            	</select>
                            	@if($errors->has('status'))
		                          <span class="messages" style="color: red;">{{$errors->first('status')}}</span>
		                       @endif 
	                        </div>
	                    </div>
	                    <div class="form-group row">
	                        <div class="col-sm-6">
	                        	<label>Description :</label>
	                            <input type="text" name="description" id="code" class="form-control pamount {{$errors->has('description') ? 'is-invalid' : '' }}" value="{{ $category->description }}" placeholder="Enter Description">
	                            @if($errors->has('description'))
		                          <span class="messages" style="color: red;">{{$errors->first('description')}}</span>
		                      	@endif 
	                        </div>
	                        <div class="col-sm-6">
	                        	<label>Image :</label>
	                        	<div class="input-group" style="height: 34px;">
		                            <input type="file"  name="image" class="form-control pname {{$errors->has('image') ? 'is-invalid' : '' }}" placeholder="Prodcut Name">
		                            @if($errors->has('image'))
			                          <span class="messages" style="color: red;">{{$errors->first('image')}}</span>
			                      	@endif 
		                            <span class="input-group-addon btn btn-primary">Chooese File</span>
		                            
	                        	</div>
	                        </div>
	                    </div>
	                    <div class="form-group row">
	                        <div class="col-sm-6">
	                        	<!--  -->
	                        </div>
	                        <div class="col-sm-6">
	                        	<button type="submit" class="btn btn-primary" style="float: right;">Update Category</button>
	                        </div>
	                    </div>
			        </div>
			    </div>
			</form>
		    <!-- Input Validation card end -->        	
        </div>
    </div>


    


@endsection