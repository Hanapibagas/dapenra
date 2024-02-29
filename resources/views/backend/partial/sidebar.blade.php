<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{asset('admin/assets/img/profile.jpg')}}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            Dapenra
                            <span class="user-level">Administrator</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item {{request()->routeIs('home') ? 'active' : ''}} ">
                    <a href="{{route('home')}}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{request()->routeIs('admin.jadwal.index') ? 'active' : ''}}">
                    <a href="{{route('admin.jadwal.index')}}">
                        <i class="fas fa-calendar-times"></i>
                        <p>Jadwal Otentikasi</p>
                    </a>
                </li>
                <li class="nav-item {{request()->routeIs('admin.pegawai.index') ? 'active' : ''}}">
                    <a href="{{route('admin.pegawai.index')}}">
                        <i class="fas fa-users"></i>
                        <p>Data Pegawai</p>
                    </a>
                </li>
                <li class="nav-item {{request()->routeIs('admin.pegawai.index') ? 'active' : ''}}">
                    <a href="{{route('admin.pegawai.index')}}">
                        <i class="fas fa-users"></i>
                        <p>Data Tertanggung</p>
                    </a>
                </li>

                <li class="nav-item {{request()->routeIs('admin.registrasi.index') ? 'active' : ''}}">
                    <a href="{{route('admin.registrasi.index')}}">
                        <i class=" fab fa-readme"></i>
                        <p>Data Registrasi</p>
                    </a>
                </li>
                <li class="nav-item {{request()->routeIs('admin.otentikasi.index') ? 'active' : ''}}">
                    <a href="{{route('admin.otentikasi.index')}}">
                        <i class="fas fa-check"></i>
                        <p>Otentikasi</p>
                    </a>
                </li>
                <li class="nav-item {{request()->routeIs('admin.informasi.index') ? 'active' : ''}}">
                    <a href="{{route('admin.informasi.index')}}">
                        <i class="fas fa-users"></i>
                        <p>Informasi</p>
                    </a>
                </li>



            </ul>
        </div>
    </div>`
</div>