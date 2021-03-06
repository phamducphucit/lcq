@extends('layouts.admin')

@section('content')
<!-- Page-header start -->
    <div class="page-header">
        <div class="row align-items-end">
            
            <div class="col-lg-12">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}"> <i class="feather icon-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Danh sách sản phẩm</a>
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
        <div class="col-sm-12 filter-bar">
        	<nav class="navbar navbar-light bg-faded m-b-30 p-10">
                                                    <ul class="nav navbar-nav">
                                                        <li class="nav-item active">
                                                            <a class="nav-link" href="#!"><span class="sr-only">(current)</span></a>
                                                        </li>
                                                        <li class="nav-item dropdown">
                                                            <a class="nav-link dropdown-toggle" href="#!" id="bydate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icofont icofont-clock-time"></i> Danh mục</a>
                                                            <div class="dropdown-menu" aria-labelledby="bydate">
                                                                <a class="dropdown-item" href="#!">Tất cả</a>
                                                                <div class="dropdown-divider"></div>
                                                                @foreach($list_categories as $category)
                                                                    <a class="dropdown-item" href="#!">{{ $category->name }}</a>
                                                                @endforeach       
                                                            </div>
                                                        </li>
                                                        <!-- end of by date dropdown -->
                                                        <li class="nav-item dropdown">
                                                            <a class="nav-link dropdown-toggle" href="#!" id="bystatus" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icofont icofont-chart-histogram-alt"></i> Trạng thái</a>
                                                            <div class="dropdown-menu" aria-labelledby="bystatus">
                                                                <a class="dropdown-item" href="#!">Tất cả</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item" href="#!">Còn hàng</a>
                                                                <a class="dropdown-item" href="#!">Hết hàng</a>
                                                            </div>
                                                        </li>
                                                        <!-- end of by status dropdown -->
                                                        <li>
                                                            <div style="margin:10px 0px;">
                                                                <input type="text" name="" class="form-control" placeholder="Tên sản phẩm...">
                                                            </div>
                                                        </li>
                                                        </ul>
                                                        <div class="nav-item nav-grid">
                                                                <a href="{{ route('add.product') }}" title="Thêm sản phẩm" class="btn btn-sm btn-primary">
                                                                    <i class="icofont icofont-plus"></i> Thêm sản phẩm
                                                                </a>
                                                        </div>
                                                        <!-- end of by priority dropdown -->

                                                </nav>
        </div>
    </div>
    <div class="row">
        @foreach($list_products as $product)
            
                <div class="col-xl-3 col-md-6">
                    <div class="card @if($product->quantity <= 0) bg-c-pink @else bg-c-green @endif update-card">
                        <div class="card-block p5">
                            <div class="row align-items-end">
                                <div class="col-8">
                                    <h4 class="text-white">{{ $product->name }}</h4>
                                    <h6 class="text-white m-b-0">{{ number_format($product->price) }} Vnđ</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="/{{$product->image}}" data-lightbox="{{ $product->name }}" data-title="{{$product->name}}">
                                        <img src="/{{ $product->image }}" style="width: 65px;height: 65px">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="task-list-table">
                                <p class="task-due"><strong> Số lượng : </strong><strong class="label label-primary">{{ $product->quantity }} {{ $product->donvi }}</strong></p>
                            </div>
                            <div class="task-board m-0">
                                <a href="#" class="btn btn-info btn-mini b-none">{{ $product->code }}</a>
                                <!-- end of dropdown-secondary -->
                                <div class="dropdown-secondary dropdown">
                                    <button class="btn btn-info btn-mini dropdown-toggle waves-light b-none txt-muted" type="button" id="dropdown14" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="icofont icofont-navigation-menu"></i></button>
                                    <div class="dropdown-menu" aria-labelledby="dropdown14" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 24px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a class="dropdown-item waves-light waves-effect" onclick="deleteProduct({{ $product->id }})" href="#!"><i class="icofont icofont-spinner-alt-5"></i> Xóa</a>
                                        <a class="dropdown-item waves-light waves-effect" href="{{ route('edit.product',$product->id)}}"><i class="icofont icofont-ui-edit"></i> Chỉnh sửa</a>
                                    </div>
                                    <!-- end of dropdown menu -->
                                </div>
                                <!-- end of seconadary -->
                            </div>
                        </div>
                    </div>
                </div>
            
        @endforeach                                
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
       title: 'Bạn có chắc chắn muốn xóa sản phẩm này không?',
       text: "Bạn sẽ không thể lấy lại sản phẩm này sau khi xóa.",
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
                url: "{{url('/product/delete-product/')}}/"+id,
                success: function (data) {
                    }         
            });
         Swal.fire(
           'Đã xóa sản phẩm!',
           'Bạn đã xóa sản phẩm!',
           'success',
         )
       }
       location.reload();
     })
   }
</script>


                                                                              