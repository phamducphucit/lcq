@extends('layouts.admin')

@section('content')

<!-- Page-header start -->
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Edit Customer</h4>
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
                        <li class="breadcrumb-item"><a href="{{ route('list.customers')}}">Customers</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Edit Customer</a>
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
        	<form method="post" action="{{route('update.customer.post',$customer->id)}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}"> 
			    <div class="card">
			        <!-- <div class="card-header">
			            <h5>Add Customer</h5>
			            <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
			            <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>
			        </div> -->
			        <div class="card-block">
			            <h4 class="sub-title">Edit Customer</h4>
			            <div class="form-group row">
	                        <div class="col-sm-6">
	                        	<label>Name :</label>
	                           <input type="text" name="name" id="name" class="form-control pname {{$errors->has('name') ? 'is-invalid' : '' }}" value="{{ $customer->name }}" placeholder="Enter Name">
	                           @if($errors->has('name'))
		                          <span class="messages" style="color: red;">{{$errors->first('name')}}</span>
		                       @endif 
	                        </div>
	                        <div class="col-sm-6">
	                        	<label>User Id :</label>
	                            <select class="form-control stock {{$errors->has('user_id') ? 'is-invalid' : '' }}" name="user_id" id="category_id">
                                <option value="">---- Select User id ----</option>
                                <option value="1" {{$customer->user_id == 1 ? 'selected' : '' }}>1</option>
                                <option value="2" {{$customer->user_id == 2 ? 'selected' : '' }}>2</option>
                                <option value="3" {{$customer->user_id == 3 ? 'selected' : '' }}>3</option>
                            	</select>
                            	@if($errors->has('user_id'))
		                          <span class="messages" style="color: red;">{{$errors->first('user_id')}}</span>
		                       @endif 
	                        </div>
	                    </div>
	                    <div class="form-group row">
	                        <div class="col-sm-6">
	                        	<label>Phone :</label>
	                            <input type="text" name="phone" id="phone" class="form-control pamount {{$errors->has('phone') ? 'is-invalid' : '' }}" value="{{ $customer->phone }}" placeholder="Enter Phone">
	                            @if($errors->has('phone'))
		                          <span class="messages" style="color: red;">{{$errors->first('phone')}}</span>
		                      	@endif 
	                        </div>
	                        <div class="col-sm-6">
	                        	<label>Address :</label>
	                        	<input type="text" name="address" id="address" class="form-control pamount {{$errors->has('address') ? 'is-invalid' : '' }}" placeholder="Enter Address" value="{{ $customer->adress }}">
	                        	@if($errors->has('address'))
		                          <span class="messages" style="color: red;">{{$errors->first('address')}}</span>
		                      	@endif 
	                        </div>
	                    </div>

	                    <div class="form-group row">                       

	                        <div class="col-6">
                            <div class="form-group">
                              <label>Tỉnh/Thành phố</label>
                              <select class="form-control select2bs4" style="width: 100%;"  name="province_id" id="province_id">
                                <option >--- Tỉnh/Thành phố ---</option>
                                    @foreach($provinces as $province)
                                        <option value="{{$province->id}}" {{ $province->id == $customer->province_id ? 'selected' : '' }} > {{$province->name}} </option>
                                    @endforeach
                              </select>
                            </div>
                          </div>
                            <div class="col-6">
                            <div class="form-group">
                              <label>Quận/Huyện</label>
                              <select class="form-control select2bs4" style="width: 100%;" name="district_id" id="district_id">
                                <option>--- Quận/Huyện ---</option>
                                
                              </select>
                            </div>
                          </div>
                           
	                    </div>
                                      
	                    

	                    <div class="form-group row">
	                        <div class="col-sm-6">
	                        	<div class="form-group">
	                              <label>Xã/Phường</label>
	                              <select class="form-control select2bs4" style="width: 100%;" name="ward_id" id="ward_id">
	                                <option>--- Xã/Phường ---</option>                     
	                              </select>
	                            </div>
	                        </div>
	                        <div class="col-sm-6">
	                            <label>Transport :</label>
	                        	<div class="input-group">
		                            <input type="text"  name="transport" class="form-control pname {{$errors->has('transport') ? 'is-invalid' : '' }}" value="{{ $customer->transport }}" placeholder="Enter Transport">
		                            @if($errors->has('transport'))
		                          		<span class="messages" style="color: red;">{{$errors->first('transport')}}</span>
		                       		@endif 
	                        	</div>
	                    	</div>
	                    </div>
	                   	
	                    <div class="form-group row">
	                        <div class="col-sm-6">
	                        	<label>Image :</label>
	                        	<div class="input-group" style="height: 35px;">
		                            <input type="file"  name="image" class="form-control pname {{$errors->has('image') ? 'is-invalid' : '' }}" placeholder="Prodcut Name">
		                            @if($errors->has('image'))
			                          <span class="messages" style="color: red;">{{$errors->first('image')}}</span>
			                      	@endif 
		                            <span class="input-group-addon btn btn-primary">Chooese File</span>
		                            
	                        	</div>
	                        </div>
	                        <div class="col-sm-6">
	                        	<!--  -->
	                        </div>
	                        	
	                    </div>

	                    <div class="form-group row">
	                        <div class="col-sm-6">
	                        	<!--  -->
	                        </div>
	                        <div class="col-sm-6">
	                        	<button type="submit" class="btn btn-primary" style="float: right;">Update Customer</button>
	                        </div>
	                    </div>
			        </div>
			    </div>
			</form>
		    <!-- Input Validation card end -->        	
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js" integrity="sha512-quHCp3WbBNkwLfYUMd+KwBAgpVukJu5MncuQaWXgCrfgcxCJAq/fo+oqrRKOj+UKEmyMCG3tb8RB63W+EmrOBg==" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.js" integrity="sha512-nqIFZC8560+CqHgXKez61MI0f9XSTKLkm0zFVm/99Wt0jSTZ7yeeYwbzyl0SGn/s8Mulbdw+ScCG41hmO2+FKw==" crossorigin="anonymous"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript">
    $(function(){
        id = $('#province_id').val();
        // console.log(id);
            $("#district_id").empty();
            $('#district_id').append($('<option>', {
                      value: null,
                      text : ' --- Chọn Quận/Huyện ---'
                  }));
            axios.get('/admin/config/district/' + id ).then(res=>{
             if(res.status==200){
                // console.log(res.data);
                $.each(res.data, function (i, item) {
                 if(item.id == {{$customer->district_id}}){
                   $('#district_id').append($('<option>', {
                      value: item.id,
                      text : item.name,
                      selected : true
                      ,
                  }));
                 }else{
                  $('#district_id').append($('<option>', {
                      value: item.id,
                      text : item.name,
                      selected : false
                      ,

                  }));
                 }
              });

              district_id = $('#district_id').val();
            $("#ward_id").empty();
            $('#ward_id').append($('<option>', {
                      value: null,
                      text : ' --- Chọn Xã/Phường ---'
                  }));
            axios.get('/admin/config/ward/' + district_id ).then(res=>{
             if(res.status==200){
                // console.log(res.data);
                $.each(res.data, function (i, item) {
                 if(item.id == {{$customer->ward_id}}){
                   $('#ward_id').append($('<option>', {
                      value: item.id,
                      text : item.name,
                      selected : true
                      ,
                  }));
                 }else{
                  $('#ward_id').append($('<option>', {
                      value: item.id,
                      text : item.name,
                      selected : false
                      ,

                  }));
                 }
              });

             }
            }).catch(err=>{
                console.log(err)
            });


             }
            }).catch(err=>{
                console.log(err)
            });



    });

    $( document ).ready(function() {
          //option list district theo province_id

          $('#province_id').on('change',function(){
            id = $('#province_id').val();
            $("#district_id").empty();
            $('#district_id').append($('<option>', {
                      value: null,
                      text : ' --- Chọn Quận/Huyện ---'
                  }));
            axios.get('/admin/config/district/' + id ).then(res=>{
             if(res.status==200){
                // console.log(res.data);
                $.each(res.data, function (i, item) {
                  $('#district_id').append($('<option>', {
                      value: item.id,
                      text : item.name
                  }));
              });

             }
            }).catch(err=>{
                console.log(err)
            });
        });

        // Bắt đầu viết chỗ này
        //option list ward theo district_id

        $('#district_id').on('change',function(){
            id = $('#district_id').val();
            $("#ward_id").empty();
            $('#ward_id').append($('<option>', {
                      value: null,
                      text : ' --- Chọn Xã/Phường ---'
                  }));
            axios.get('/admin/config/ward/' + id ).then(res=>{
             if(res.status==200){
                // console.log(res.data);
                $.each(res.data, function (i, item) {
                  $('#ward_id').append($('<option>', {
                      value: item.id,
                      text : item.name
                  }));
              });
             }
            }).catch(err=>{
                console.log(err)
            });
        });

      });
  </script>


@endsection






