<!-- navbar_left -->
@if(Auth::check())
<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <div class="pcoded-navigatio-lavel">Menu</div>
        <ul class="pcoded-item pcoded-left-item">
            
            <li class="">
                <a href="{{ route('home') }}">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Bảng điều khiển</span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('list.orders') }}">
                    <span class="pcoded-micon"><i class="feather icon-shopping-cart"></i></span>
                    <span class="pcoded-mtext">Đơn hàng</span>
                </a>
            </li>
            @if (Auth::user()->isAdmin())
            <li class="">
                <a href="{{ route('list.categories') }}">
                    <span class="pcoded-micon"><i class="icon-book-open"></i></span>
                    <span class="pcoded-mtext">Danh mục sản phẩm</span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('list.products') }}">
                    <span class="pcoded-micon"><i class="icon-bag"></i></span>
                    <span class="pcoded-mtext">Sản phẩm</span>
                </a>
            </li>
            @endif
            <li class="">
                <a href="{{ route('list.customers') }}">
                    <span class="pcoded-micon"><i class="icon-people"></i></span>
                    <span class="pcoded-mtext">Khách hàng</span>
                </a>
            </li>
            
            
        </ul>
        @if (Auth::user()->isAdmin())
        <div class="pcoded-navigatio-lavel">Nhân viên</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="icon-user-follow"></i></span>
                    <span class="pcoded-mtext">Quản lý nhân viên</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="{{ route('list.users')}} ">
                            <span class="pcoded-mtext">Danh sách nhân viên</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{route('list.roles')}}">
                            <span class="pcoded-mtext">Quyền</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="button.htm">
                            <span class="pcoded-mtext">List Permission</span>
                        </a>
                    </li>
                </ul>
            </li>
            
        </ul>
        @endif

        <div class="pcoded-navigatio-lavel" menu-title-theme="theme5">Tài khoản</div>
        <ul class="pcoded-item pcoded-left-item" item-border="true" item-border-style="none" subitem-border="true">
            <li class="">
                <a href="{{ route('logout') }}" >
                    <span class="pcoded-micon"><i class="feather icon-power"></i></span>
                    <span class="pcoded-mtext">Đăng xuất</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
@endif