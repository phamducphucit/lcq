@extends('layouts.admin')

@section('content')
<!-- Page-header start -->
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Manager Products</h4>
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
                        <li class="breadcrumb-item"><a href="#!">Products</a>
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
        					 <h4>List Products </h4>
        				</div>
        				<div class="col-sm-6">
        					<h5 style="float: right;"><a href="{{ route('add.product') }}" class="btn btn-primary">Add New Product</a></h5>

        				</div>
        			</div>		            
		        </div>
		        <div class="card-block">
		            <div class="dt-responsive table-responsive">
		                <table id="simpletable" class="table table-striped table-bordered nowrap">
		                    <thead>
		                    <tr>
		                    	<th>No</th>
		                    	<th>Image</th>
		                        <th>Name</th>
		                        <th>Category</th>
		                        <th>Code</th>
		                        <th>Description</th>
		                        <th>Price</th>
		                        <th>Quantity</th>
		                        <th>Unit</th>
		                        <th>Active</th>
		                    </tr>
		                    </thead>
		                    <tbody>
		                    	@foreach($list_products as $product)
		                        <tr>
		                        	<td>{{ $product->id }}</td>
		                            <td>
		                            	<img src="/{{ $product->image }}" style="width: 50px; height: 50px;">
		                            </td>
		                            <td>{{ $product->name }}</td>
		                            <td>{{ $product->category->name }}</td>
		                            <td>{{ $product->code }}</td>
		                            <td>{{ $product->description }}</td>
		                            <td>{{ $product->price }}</td>
		                            <td>{{ $product->quantity }}</td>
		                            <td>{{ $product->unit }}</td>
		                            <!-- <td>
		                            	<a href="{{route('edit.product', $product->id)}}">
					                     <i class="fa fa-edit blue"></i>Edit
					                     </a>
					                     /
					                     <span onclick="deleteProduct({{ $product->id }})">
						                     <i class="fa fa-trash" style="color: red" ></i>Xóa
						                   </span>
		                            </td> -->
		                            <td class="action-icon">
                                        <a href="{{ route('edit.product',$product->id)}}" class="m-r-15 text-muted" data-placement="top" title="" data-original-title="Edit"><i class="icofont icofont-ui-edit"></i></a>
                                        <a href="#!" onclick="deleteProduct({{ $product->id }})" class="text-muted" data-placement="top" title="" data-original-title="Delete"><i class="icofont icofont-delete-alt"></i></a>
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


		    <!-- Add Contact Start Model start-->
            <!-- <div class="md-modal md-effect-13 addcontact" id="modal_create_product">
                <div class="md-content">
                    <h3 class="f-26">Add Product</h3>
                    <div>
                        <div class="input-group">
                            <input type="file" class="form-control pname" placeholder="Prodcut Name">
                            <span class="input-group-addon btn btn-primary">Chooese File</span>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icofont icofont-user"></i></span>
                            <input type="text" name="name" id="name" class="form-control pname" placeholder="Product Name">
                        </div>
                        <div class="input-group">
                            <select class="form-control stock" name="category_id" id="category_id">
                                <option value="">---- Select Category ----</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icofont icofont-user"></i></span>
                            <input type="text" name="code" id="code" class="form-control pamount" placeholder="Enter Code">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icofont icofont-user"></i></span>
                            <input type="text" name="description" id="description" class="form-control pamount" placeholder="Enter Description">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icofont icofont-user"></i></span>
                            <input type="text" name="price" id="price" class="form-control pamount" placeholder="Enter Price">
                        </div>

                         <div class="input-group">
                            <span class="input-group-addon"><i class="icofont icofont-user"></i></span>
                            <input type="text" name="quantity" id="quantity" class="form-control pamount" placeholder="Enter Quantity">
                        </div>
                         <div class="input-group">
                            <select class="form-control stock" name="unit" id="unit">
                                <option value="">---- Select Unit ----</option>
                                <option value="1">Kg</option>
                                <option value="2">Box</option>
                            </select>
                        </div>

                        <div class="text-center">
                            <button type="submit" id="submit" class="btn btn-primary waves-effect m-r-20 f-w-600 d-inline-block save_btn">Save</button>
                            <button type="button" class="btn btn-primary waves-effect m-r-20 f-w-600 md-close d-inline-block close_btn">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md-overlay"></div> -->
            <!-- Add Contact Ends Model end-->
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
   function deleteProduct(id){
         Swal.fire({
       title: 'Are you sure you want to delete the product?',
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
                url: "{{url('/product/delete-product/')}}/"+id,
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


                                                                              