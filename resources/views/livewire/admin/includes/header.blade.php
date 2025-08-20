<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

    <ul class="navbar-nav d-none d-lg-flex">
        @can('isSuperAdmin')
         {{--   <li class="nav-item px-2 dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="megaDropdown" role="button" data-bs-toggle="dropdown"
                   aria-haspopup="true"
                   aria-expanded="false">
                    Artisan Commands
                </a>
                <div class="dropdown-menu dropdown-menu-start dropdown-mega" aria-labelledby="megaDropdown">
                    <div class="d-md-flex align-items-start justify-content-start">
                        <div class="dropdown-mega-list">
                            <div class="dropdown-header">Artisan</div>
                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#createTable">Create Table
                                (Migration)</a>
                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#alterTable">Add New Column
                                (Migration)</a>
                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#createController">Create
                                Controller</a>
                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#createModel">Create
                                Model</a>
                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#createAll">Create
                                Controller + Model + Migration</a>
                        </div>

                    </div>
                </div>
            </li>--}}
        @endcan
        <li>
            @can('isSuperAdmin')
                <div class="btn btn-success btn-lg">
                    You have Super Admin Access
                </div>
            @elsecan('isAdmin')
                <div class="btn btn-primary btn-lg">
                    You have Admin Access
                </div>
            @else
                <div class="btn btn-info btn-lg">
                    You have User Access
                </div>
            @endcan
        </li>
    </ul>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item">
                <a class="nav-icon js-fullscreen d-none d-lg-block" href="#">
                    <div class="position-relative">
                        <i class="align-middle" data-feather="maximize"></i>
                    </div>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-icon pe-md-0 dropdown-toggle" href="#" data-bs-toggle="dropdown">
                    <img src="{{asset('admin/img/avatars/avatar.jpg')}}" class="avatar img-fluid rounded"
                         alt="Charles Hall"/>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="{{route('admin.profile')}}"><i class="align-middle me-1"
                                                                          data-feather="user"></i> Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('admin.setting')}}"><i class="align-middle me-1"
                                                                           data-feather="settings"></i> Settings &
                        Privacy</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('admin.logout')}}">Log out</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
