<nav class="navbar navbar-header navbar-expand-lg" >
    <div class="container-fluid">
        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            <li class="nav-item dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                    <div class="avatar-sm">
                        <img src="{{asset('admin/assets/img/profile.jpg')}}" alt="..."
                            class="avatar-img rounded-circle">
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                        <li>
                            <div class="user-box">
                                <div class="avatar-lg"><img src="{{asset('admin/assets/img/profile.jpg')}}"
                                        alt="image profile" class="avatar-img rounded"></div>
                                <div class="u-text">
                                    <h4>{{Auth::user()->name}}</h4>
                                    <p class="text-muted">{{Auth::user()->email}}</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                            <form class="dropdown-item" action="{{route('logout')}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-block btn-primary ">
                                    Logout
                                </button>
                            </form>
                        </li>
                    </div>
                </ul>
            </li>
        </ul>
    </div>
</nav>
