<aside class="main-sidebar sidebar-light-primary elevation-4" style="background:rgb(204, 204, 204)">

    <!-- Brand Logo -->
    <a class="brand-link" style="text-align: center">
        Admin Panel
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <style>
            .image {
                margin: 10px 5px 5px 5px
            }

            .image img {
                border-radius: 20%
            }
        </style>
        <div class="a">
            <div class="image" style="color:aliceblue">
                <div class="image" style="color:rgb(5, 5, 5); border-radius:20%;text-align:center">
                    <img width="90" src="{{ asset(Auth::user()->images) }}" alt="User Image">
                    <br>
                    Xin chào {{ Auth::user()->name }} !
                </div>
            </div>
            <br />

        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                @if (Auth::user()->role === 'admin')
                    <li class="nav-item">
                        <a href="{{ route('admin.user.showalluser') }}" class="nav-link">
                            <i class="fas fa-list"></i>
                            <p>
                                Tất cả nhân sự

                            </p>
                        </a>

                    </li>
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-regular fa-calendar-check"></i>
                        <p>
                            Đặt Lịch
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.booking.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách đặt lịch</p>
                            </a>
                        </li>
                        @if (Auth::user()->role === 'admin')
                            <li class="nav-item">
                                <a href="{{ route('admin.booking.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tạo lịch</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
                @if (Auth::user()->role === 'admin')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa-regular fa-user"></i>
                            <p>
                                Đăng Ký Bác Sĩ
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.user.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh sách Bác sĩ</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.user.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tạo Bác Sĩ</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if (Auth::user()->role === 'admin')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-list"></i>
                            <p>
                                Dịch Vụ
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.service.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Danh Sách Dịch Vụ</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.service.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tạo Dịch Vụ</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (Auth::user()->role === 'admin')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-list"></i>
                            <p>
                                Combo
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.category.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh sách Combo</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.category.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tạo Combo</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (Auth::user()->role === 'doctor')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-list"></i>
                            <p>
                                Đăng Kí Ngày Nghỉ
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.date_off.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh sách đăng kí</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.date_off.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Đăng kí</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (Auth::user()->role === 'admin')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-list"></i>
                            <p>
                                Đăng Kí Ngày Nghỉ
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.date_off.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh sách đăng kí</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                @endif
                @if (Auth::user()->role === 'admin')
                    <li class="nav-item">
                        <a href="{{ route('admin.bill.index') }}" class="nav-link">
                            <i class="fa-solid fa-money-bill-1"></i>
                            <p>
                                Đơn Hàng
                            </p>
                        </a>
                        {{-- <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.bill.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tạo Hóa Đơn</p>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="{{ route('admin.cash.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Thanh Toán Hóa Đơn</p>
                                </a>
                            </li> 
                        </ul> --}}
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.history.history') }}" class="nav-link">
                            <i class="fas fa-history"></i>
                            <p>
                                Lịch Sử

                            </p>
                        </a>

                    </li>
                @endif
            </ul>
        </nav>

        <!-- /.sidebar-menu -->
        <form method="POST" action="{{ route('auth.logout') }}">
            @csrf
            <li>
                <a class="dropdown-item d-flex" href="javascript:void(0);" onclick="this.closest('form').submit();">
                    <i class="ti ti-logout fs-18 me-2 op-7"></i>Log Out
                </a>
            </li>
        </form>
    </div>

    <!-- /.sidebar -->
</aside>
