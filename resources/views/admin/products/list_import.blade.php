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
		                            <td>{{ $import->name }} <br/> <small><b>{{ $import->order_date }}</b></small></td>
		                            <td>{{ $import->order_date }}</td>
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
@endsection




                                                                              