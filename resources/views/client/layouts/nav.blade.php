<nav class="navbar navbar-transparent navbar-absolute">
    <div class="container-fluid">
        <div class="navbar-minimize">
            <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                <i class="material-icons visible-on-sidebar-mini">view_list</i>
            </button>
        </div>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="material-icons">dashboard</i>
                        <p class="hidden-lg hidden-md">Dashboard</p>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="material-icons">notifications</i>
                        <span class="notification">5</span>
                        <p class="hidden-lg hidden-md">
                            Notifications
                            <b class="caret"></b>
                        </p>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">Mike John responded to your email</a>
                        </li>
                        <li>
                            <a href="#">You have 5 new tasks</a>
                        </li>
                        <li>
                            <a href="#">You're now friend with Andrew</a>
                        </li>
                        <li>
                            <a href="#">Another Notification</a>
                        </li>
                        <li>
                            <a href="#">Another One</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="material-icons">person</i>
                        <p class="hidden-lg hidden-md">Profile</p>
                    </a>
                </li>
                <li class="separator hidden-lg hidden-md"></li>
            </ul>
            <form class="navbar-form navbar-right" action="/search" method="GET" role="search">
                <div class="form-group form-search is-empty">
                    <input type="text" class="form-control" name="keySearch" placeholder=" Tìm Kiếm ">
                    <span class="material-input"></span>
                </div>
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                    <i class="material-icons">search</i>
                    <div class="ripple-container"></div>
                </button>
            </form>
        </div>
    </div>
</nav>
<div id="modalLogin" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="card card-signup">
                        <h2 class="card-title text-center" id="title">Đăng Nhập</h2>
                        <div class="row">
                            <div class="">
                                <div class="social text-center">
                                    <button class="btn btn-just-icon btn-round btn-dribbble">
                                        <i class="fa fa-google"></i>
                                    </button>
                                    <button class="btn btn-just-icon btn-round btn-facebook">
                                        <i class="fa fa-facebook"> </i>
                                    </button>
                                    <h4>
                                        <a href="javascript:void(0)"  class="hide" id="openLogin">Bạn đã có tài khoản</a>
                                        <a href="javascript:void(0)" id="openRegister">Bạn chưa có tài khoản</a>
                                    </h4>
                                </div>
                                <form class="form hide" id="formRegister">
                                    <div class="card-content">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">face</i>
                                            </span>
                                            <input type="text" class="form-control" name="name" placeholder="Họ Tên">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                            <input type="text" class="form-control" name="email" placeholder="Email...">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                            <input type="password" name="password" placeholder="Mật khẩu" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="footer text-center">
                                        <a class="btn btn-primary btn-round" id="register">Tạo Tài Khoản</a>
                                    </div>
                                </form>
                                <form class="form" id="formLogin">
                                    <div class="card-content">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                            <input type="text" name="email" class="form-control" placeholder="Email...">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                            <input type="password" name="password" placeholder="Mật khẩu" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="footer text-center">
                                        <a class="btn btn-primary btn-round" id="login">Đăng nhập</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>