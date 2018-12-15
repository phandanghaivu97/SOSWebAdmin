
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#" style="margin-bottom: 10%;">
                    <img src="{{url('img/logo.png')}}" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li id="tc" class="active has-sub">
                            <a class="js-arrow" href="{{route('sosadmin.trangchu')}}">
                                <i class="fas fa-tachometer-alt"></i>Trang Chính</a>
                        </li>
                        <li id="tknd" class="none">
                            <a href="{{route('sosadmin.taikhoan.index')}}">
                                <i class="fas fa-user"></i>Tài Khoản Người Dùng</a>
                        </li>
                        <li id="tkcs" class="none">
                            <a href="{{route('sosadmin.police.index')}}">
                                <i class="fas fa-user-tie"></i></i>Tài Khoản Cảnh Sát</a>
                        </li>
                        <li class="none">
                            <a href="#">
                                <i class="fas fa-calendar-alt"></i>Lịch Sử Gần Đây</a>
                        </li>
                        <li id="ddn" class="none">
                            <a href="">
                                <i class="fas fa-map-marker-alt"></i>Địa Điểm Nóng</a>
                        </li>
                        <li id="ndbc" class="none">
                            <a href="{{route('sosadmin.report.index')}}">
                                <i class="fas fa-users"></i>Người Dùng Bị Báo Cáo</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
