@extends('layouts.admin')

@section('content')

<!-- Page-header start -->
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Thêm sản phẩm Mới</h4>
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
                        <li class="breadcrumb-item"><a href="{{ route('list.products')}}">Sản phẩm</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Thêm sản phẩm mới</a>
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
        	<form method="post" action="{{route('add.product.post')}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}"> 
			    <div class="card">
			        <!-- <div class="card-header">
			            <h5>Add Product</h5>
			            <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
			            <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>
			        </div> -->
			        <div class="card-block">
			            <h4 class="sub-title">Thông tin sản phẩm</h4>
			            <div class="form-group row">
			            	<div class="col-sm-6">
	                        	<label>Danh mục :</label>
	                            <select class="form-control stock {{$errors->has('category_id') ? 'is-invalid' : '' }}" name="category_id" id="category_id">
                                <option value="">---- Chọn danh mục ----</option>
                                @foreach($list_categories as $category)
                                	<option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            	</select>
                            	@if($errors->has('category_id'))
		                          <span class="messages" style="color: red;">{{$errors->first('category_id')}}</span>
		                       @endif 
	                        </div>

	                        <div class="col-sm-6">
	                        	<label>Tên sản phẩm :</label>
	                           <input type="text" name="name" id="name" class="form-control pname {{$errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}" placeholder="Nhập tên sản phẩm">
	                           @if($errors->has('name'))
		                          <span class="messages" style="color: red;">{{$errors->first('name')}}</span>
		                       @endif 
	                        </div>
	                        
	                    </div>
	                    <div class="form-group row">
	                        <div class="col-sm-6">
	                        	<label>Mã sản phẩm :</label>
	                            <input type="text" name="code" id="code" class="form-control pamount {{$errors->has('code') ? 'is-invalid' : '' }}" value="{{ old('code') }}" placeholder="Nhập mã sản phẩm">
	                            @if($errors->has('code'))
		                          <span class="messages" style="color: red;">{{$errors->first('code')}}</span>
		                      	@endif 
	                        </div>
	                        <div class="col-sm-6">
	                        	<label>Mô tả :</label>
	                        	<input type="text" name="description" id="description" class="form-control pamount {{$errors->has('description') ? 'is-invalid' : '' }}" value="{{ old('description') }}" placeholder="Nhập mô tả">
	                        	@if($errors->has('description'))
		                          <span class="messages" style="color: red;">{{$errors->first('description')}}</span>
		                      	@endif 
	                        </div>
	                    </div>

	                    <div class="form-group row">
	                        <div class="col-sm-6">
	                        	<label>Giá :</label>
	                            <input type="text" name="price" id="price" class="form-control" data-a-sep="." data-a-dec="," value="{{ old('price') }}" placeholder="Nhập giá sản phẩm">
	                            @if($errors->has('price'))
		                          <span class="messages" style="color: red;">{{$errors->first('price')}}</span>
		                      	@endif 
	                        </div>
	                        <div class="col-sm-6">
	                        	<label>Số lượng :</label>
	                        	<input type="text" name="quantity" id="quantity" class="form-control pamount {{$errors->has('quantity') ? 'is-invalid' : '' }}" value="{{ old('quantity') }}" placeholder="Nhập số lượng">
	                        	@if($errors->has('quantity'))
		                          <span class="messages" style="color: red;">{{$errors->first('quantity')}}</span>
		                      	@endif 
	                        </div>
	                    </div>

	                     <div class="form-group row">
	                        <div class="col-sm-6">
	                        	<label>Đơn vị :</label>
	                           <select class="form-control stock {{$errors->has('unit') ? 'is-invalid' : '' }}" name="unit" id="unit">
	                                <option value="">---- Chọn đơn vị ----</option>
	                                <option value="1">Kg</option>
	                                <option value="2">Hộp</option>
	                                <option value="3">Túi</option>
                            	</select>
                            	@if($errors->has('unit'))
		                          <span class="messages" style="color: red;">{{$errors->first('unit')}}</span>
		                      	@endif 
	                        </div>
	                        <div class="col-sm-6">
	                        	<label>Hình sản phẩm :</label>
	                        	<div class="input-group">
		                            <input type="file"  name="image" class="form-control pname {{$errors->has('image') ? 'is-invalid' : '' }}" placeholder="Hình">
		                            @if($errors->has('image'))
			                          <span class="messages" style="color: red;">{{$errors->first('image')}}</span>
			                      	@endif 
		                            <span class="input-group-addon btn btn-primary">Chọn hình</span>
		                            
	                        	</div>
	                    	</div>
	                    </div>
	                   
	                    <div class="form-group row">
	                        <div class="col-sm-6">
	                        	<!--  -->
	                        </div>
	                        <div class="col-sm-6">
	                        	<button type="submit" class="btn btn-primary" style="float: right;">Lưu lại</button>
	                        </div>
	                    </div>
			        </div>
			    </div>
			</form>
		    <!-- Input Validation card end -->        	
        </div>
    </div>


@endsection