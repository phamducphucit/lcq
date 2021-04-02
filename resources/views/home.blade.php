@extends('layouts.admin')

@section('content')
    <!-- list css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('..\files\assets\pages\list-scroll\list.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('..\files\bower_components\stroll\css\stroll.css')}}">

    <div class="row">
        <!-- task, page, download counter  start -->
        <div class="col-xl-3 col-md-6">
            <a href="{{ route('list.orders')}}" title="Danh sách đơn hàng">
                <div class="card bg-c-blue text-white">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col">
                                <p class="m-b-5">Đơn hàng</p>
                                <h4 class="m-b-0">{{$count_order}}</h4>
                            </div>
                            <div class="col col-auto text-right">
                                <i class="feather icon-shopping-cart f-50 text-c-blue"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @if (Auth::user()->isAdmin())
            <div class="col-xl-3 col-md-6">
                <a href="{{ route('list.products')}}" title="Danh sách đơn hàng">
                    <div class="card bg-c-green text-white">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col">
                                    <p class="m-b-5">Sản phẩm</p>
                                    <h4 class="m-b-0">{{$count_product}}</h4>
                                </div>
                                <div class="col col-auto text-right">
                                    <i class="feather icon-credit-card f-50 text-c-green"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endif
        <div class="col-xl-3 col-md-6">
            <a href="{{ route('list.customers')}}" title="Danh sách đơn hàng">
                <div class="card bg-c-yellow text-white">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col">
                                <p class="m-b-5">Khách hàng</p>
                                <h4 class="m-b-0">{{$count_customer}}</h4>
                            </div>
                            <div class="col col-auto text-right">
                                <i class="feather icon-user f-50 text-c-yellow"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- task, page, download counter  end -->
    </div>

    <div class="row">
        <div class="col-sm-12">
            <!-- List type card start -->
            <div class="card">
               
                <div class="row card-block">
                    <div class="col-md-12 col-lg-4">
                        <h6 class="sub-title"><label class="label  label-success">SÂM TƯƠI</label></h6>
                        <ul class="basic-list">
                            @foreach($list_samtuoi as $samtuoi)
                                @if($samtuoi->quantity <= 0) 
                                <li class="" style="color: #bd4147;opacity: 0.8;">
                                    <div class="row m-b-2">
                                        <div class="col-auto p-r-0">
                                            <a href="{{$samtuoi->image}}" data-lightbox="{{ $samtuoi->name }}"  data-title="{{$samtuoi->name}}">
                                                <img src="/{{ $samtuoi->image }}" alt="" class="img-fluid img-50">
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h6><strong><small>{{$samtuoi->code}}</small> - {{$samtuoi->name}}</strong></h6>
                                            <p><i>Số lượng trong kho: <b>{{$samtuoi->quantity}}</b> {{$samtuoi->donvi}}</i></p>
                                        </div>
                                    </div>
                                </li>
                                @else 
                                <li class="" style="color: green">
                                    <div class="row m-b-2">
                                        <div class="col-auto p-r-0">
                                            <a href="{{$samtuoi->image}}" data-lightbox="{{ $samtuoi->name }}"  data-title="{{$samtuoi->name}}">
                                                <img src="/{{ $samtuoi->image }}" alt="" class="img-fluid img-50">
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h6><strong><small>{{$samtuoi->code}}</small> - {{$samtuoi->name}}</strong></h6>
                                            <p><i>Số lượng trong kho: <b>{{$samtuoi->quantity}}</b> {{$samtuoi->donvi}}</i></p>
                                        </div>
                                    </div>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>

                    <div class="col-md-12 col-lg-4">
                        <h6 class="sub-title"><label class="label  label-info">SÂM TRỌC</label></h6>
                        <ul class="basic-list">
                            @foreach($list_samtroc as $samtroc)
                                @if($samtroc->quantity <= 0) 
                                <li class="" style="color: #bd4147;opacity: 0.8;">
                                    <div class="row m-b-2">
                                        <div class="col-auto p-r-0">
                                            <a href="{{$samtroc->image}}" data-lightbox="{{ $samtroc->name }}"  data-title="{{$samtroc->name}}">
                                                <img src="/{{ $samtroc->image }}" alt="" class="img-fluid img-50">
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h6><strong><small>{{$samtroc->code}}</small> - {{$samtroc->name}}</strong></h6>
                                            <p><i>Số lượng trong kho: <b>{{$samtroc->quantity}}</b> {{$samtroc->donvi}}</i></p>
                                        </div>
                                    </div>
                                </li>
                                @else 
                                <li class="" style="color: green">
                                    <div class="row m-b-2">
                                        <div class="col-auto p-r-0">
                                            <a href="{{$samtroc->image}}" data-lightbox="{{ $samtroc->name }}"  data-title="{{$samtroc->name}}">
                                                <img src="/{{ $samtroc->image }}" alt="" class="img-fluid img-50">
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h6><strong><small>{{$samtroc->code}}</small> - {{$samtroc->name}}</strong></h6>
                                            <p><i>Số lượng trong kho: <b>{{$samtroc->quantity}}</b> {{$samtroc->donvi}}</i></p>
                                        </div>
                                    </div>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>

                    <div class="col-md-12 col-lg-4">
                        <h6 class="sub-title"><label class="label  label-info">SÂM GÃY</label></h6>
                        <ul class="basic-list">
                            @foreach($list_samgay as $samgay)
                                @if($samgay->quantity <= 0) 
                                <li class="" style="color: #bd4147;opacity: 0.8;">
                                    <div class="row m-b-2">
                                        <div class="col-auto p-r-0">
                                            <a href="{{$samgay->image}}" data-lightbox="{{ $samgay->name }}"  data-title="{{$samgay->name}}">
                                                <img src="/{{ $samgay->image }}" alt="" class="img-fluid img-50">
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h6><strong><small>{{$samgay->code}}</small> - {{$samgay->name}}</strong></h6>
                                            <p><i>Số lượng trong kho: <b>{{$samgay->quantity}}</b> {{$samgay->donvi}}</i></p>
                                        </div>
                                    </div>
                                </li>
                                @else 
                                <li class="" style="color: green">
                                    <div class="row m-b-2">
                                        <div class="col-auto p-r-0">
                                            <a href="{{$samgay->image}}" data-lightbox="{{ $samgay->name }}"  data-title="{{$samgay->name}}">
                                                <img src="/{{ $samgay->image }}" alt="" class="img-fluid img-50">
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h6><strong><small>{{$samgay->code}}</small> - {{$samgay->name}}</strong></h6>
                                            <p><i>Số lượng trong kho: <b>{{$samgay->quantity}}</b> {{$samgay->donvi}}</i></p>
                                        </div>
                                    </div>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>

                    <div class="col-md-12 col-lg-4">
                        <h6 class="sub-title"><label class="label  label-info">SÂM KHÔ</label></h6>
                        <ul class="basic-list">
                            @foreach($list_samkho as $samkho)
                                @if($samkho->quantity <= 0) 
                                <li class="" style="color: #bd4147;opacity: 0.8;">
                                    <div class="row m-b-2">
                                        <div class="col-auto p-r-0">
                                            <a href="{{$samkho->image}}" data-lightbox="{{ $samkho->name }}"  data-title="{{$samkho->name}}">
                                                <img src="/{{ $samkho->image }}" alt="" class="img-fluid img-50">
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h6><strong><small>{{$samkho->code}}</small> - {{$samkho->name}}</strong></h6>
                                            <p><i>Số lượng trong kho: <b>{{$samkho->quantity}}</b> {{$samkho->donvi}}</i></p>
                                        </div>
                                    </div>
                                </li>
                                @else 
                                <li class="" style="color: green">
                                    <div class="row m-b-2">
                                        <div class="col-auto p-r-0">
                                            <a href="{{$samkho->image}}" data-lightbox="{{ $samkho->name }}"  data-title="{{$samkho->name}}">
                                                <img src="/{{ $samkho->image }}" alt="" class="img-fluid img-50">
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h6><strong><small>{{$samkho->code}}</small> - {{$samkho->name}}</strong></h6>
                                            <p><i>Số lượng trong kho: <b>{{$samkho->quantity}}</b> {{$samkho->donvi}}</i></p>
                                        </div>
                                    </div>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>

                    <div class="col-md-12 col-lg-4">
                        <h6 class="sub-title"><label class="label  label-info">SÂM NƯỚC</label></h6>
                        <ul class="basic-list">
                            @foreach($list_samnuoc as $samnuoc)
                                @if($samnuoc->quantity <= 0) 
                                <li class="" style="color: #bd4147;opacity: 0.8;">
                                    <div class="row m-b-2">
                                        <div class="col-auto p-r-0">
                                            <a href="{{$samnuoc->image}}" data-lightbox="{{ $samnuoc->name }}"  data-title="{{$samnuoc->name}}">
                                                <img src="/{{ $samnuoc->image }}" alt="" class="img-fluid img-50">
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h6><strong><small>{{$samnuoc->code}}</small> - {{$samnuoc->name}}</strong></h6>
                                            <p><i>Số lượng trong kho: <b>{{$samnuoc->quantity}}</b> {{$samnuoc->donvi}}</i></p>
                                        </div>
                                    </div>
                                </li>
                                @else 
                                <li class="" style="color: green">
                                    <div class="row m-b-2">
                                        <div class="col-auto p-r-0">
                                            <a href="{{$samnuoc->image}}" data-lightbox="{{ $samnuoc->name }}"  data-title="{{$samnuoc->name}}">
                                                <img src="/{{ $samnuoc->image }}" alt="" class="img-fluid img-50">
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h6><strong><small>{{$samnuoc->code}}</small> - {{$samnuoc->name}}</strong></h6>
                                            <p><i>Số lượng trong kho: <b>{{$samnuoc->quantity}}</b> {{$samnuoc->donvi}}</i></p>
                                        </div>
                                    </div>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>

                    <div class="col-md-12 col-lg-4">
                        <h6 class="sub-title"><label class="label  label-info">NẤM</label></h6>
                        <ul class="basic-list">
                            @foreach($list_nam as $nam)
                                @if($nam->quantity <= 0) 
                                <li class="" style="color: #bd4147;opacity: 0.8;">
                                    <div class="row m-b-2">
                                        <div class="col-auto p-r-0">
                                            <a href="{{$nam->image}}" data-lightbox="{{ $nam->name }}"  data-title="{{$nam->name}}">
                                                <img src="/{{ $nam->image }}" alt="" class="img-fluid img-50">
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h6><strong><small>{{$nam->code}}</small> - {{$nam->name}}</strong></h6>
                                            <p><i>Số lượng trong kho: <b>{{$nam->quantity}}</b> {{$nam->donvi}}</i></p>
                                        </div>
                                    </div>
                                </li>
                                @else 
                                <li class="" style="color: green">
                                    <div class="row m-b-2">
                                        <div class="col-auto p-r-0">
                                            <a href="{{$nam->image}}" data-lightbox="{{ $nam->name }}"  data-title="{{$nam->name}}">
                                                <img src="/{{ $nam->image }}" alt="" class="img-fluid img-50">
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h6><strong><small>{{$nam->code}}</small> - {{$nam->name}}</strong></h6>
                                            <p><i>Số lượng trong kho: <b>{{$nam->quantity}}</b> {{$nam->donvi}}</i></p>
                                        </div>
                                    </div>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>

                    <div class="col-md-12 col-lg-4">
                        <h6 class="sub-title"><label class="label  label-info">THỰC PHẨM CHỨC NĂNG</label></h6>
                        <ul class="basic-list">
                            @foreach($list_thucpham as $thucpham)
                                @if($thucpham->quantity <= 0) 
                                <li class="" style="color: #bd4147;opacity: 0.8;">
                                    <div class="row m-b-2">
                                        <div class="col-auto p-r-0">
                                            <a href="{{$thucpham->image}}" data-lightbox="{{ $thucpham->name }}"  data-title="{{$thucpham->name}}">
                                                <img src="/{{ $thucpham->image }}" alt="" class="img-fluid img-50">
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h6><strong><small>{{$thucpham->code}}</small> - {{$thucpham->name}}</strong></h6>
                                            <p><i>Số lượng trong kho: <b>{{$thucpham->quantity}}</b> {{$thucpham->donvi}}</i></p>
                                        </div>
                                    </div>
                                </li>
                                @else 
                                <li class="" style="color: green">
                                    <div class="row m-b-2">
                                        <div class="col-auto p-r-0">
                                            <a href="{{$thucpham->image}}" data-lightbox="{{ $thucpham->name }}"  data-title="{{$thucpham->name}}">
                                                <img src="/{{ $thucpham->image }}" alt="" class="img-fluid img-50">
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h6><strong><small>{{$thucpham->code}}</small> - {{$thucpham->name}}</strong></h6>
                                            <p><i>Số lượng trong kho: <b>{{$thucpham->quantity}}</b> {{$thucpham->donvi}}</i></p>
                                        </div>
                                    </div>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- List type card end -->
        </div>
    </div>






@endsection