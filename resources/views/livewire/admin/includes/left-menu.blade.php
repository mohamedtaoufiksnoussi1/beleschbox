<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{route('admin.home')}}">
					<span class="sidebar-brand-text align-middle">
						Admin
					</span>
            <svg class="sidebar-brand-icon align-middle" width="32px" height="32px" viewBox="0 0 24 24" fill="none"
                 stroke="#FFFFFF" stroke-width="1.5"
                 stroke-linecap="square" stroke-linejoin="miter" color="#FFFFFF" style="margin-left: -3px">
                <path d="M12 4L20 8.00004L12 12L4 8.00004L12 4Z"></path>
                <path d="M20 12L12 16L4 12"></path>
                <path d="M20 16L12 20L4 16"></path>
            </svg>
        </a>

        <div class="sidebar-user">
            <div class="d-flex justify-content-center">
                <div class="flex-shrink-0">
                    <img src="{{asset('admin/img/avatars/avatar.jpg')}}" class="avatar img-fluid rounded me-1"
                         alt="Charles Hall"/>
                </div>
                <div class="flex-grow-1 ps-2">
                    <a class="sidebar-user-title dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        Charles Hall
                    </a>
                    <div class="dropdown-menu dropdown-menu-start">
                        <a class="dropdown-item" href="{{route('admin.profile')}}"><i class="align-middle me-1"
                                                                                      data-feather="user"></i>
                            Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('admin.setting')}}"><i class="align-middle me-1"
                                                                                      data-feather="settings"></i>
                            Settings &
                            Privacy</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('admin.logout')}}">Log out</a>
                    </div>

                    <div class="sidebar-user-subtitle">
                        @can('isSuperAdmin')
                            Super Admin
                        @elsecan('isAdmin')
                            Admin
                        @else
                            User
                        @endcan
                    </div>
                </div>
            </div>
        </div>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>
            <li class="sidebar-item active">
                <a href="{{route('admin.home')}}" class="sidebar-link">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboards</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a data-bs-target="#pages" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Pages</span>
                </a>
                <ul id="pages" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.slider')}}">Slider </a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.aboutUs')}}">About Us </a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="#">Services </a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.team')}}">Team </a></li>
                    <li class="sidebar-item"><a class="sidebar-link"
                                                href="{{route('admin.testimonial')}}">Testimonial </a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.gallery')}}">Gallery</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.partners')}}">Clients</a></li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('admin.profile')}}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('admin.setting')}}">
                    <i class="align-middle me-1" data-feather="settings"></i> <span class="align-middle">Settings & Privacy</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('admin.socialMedia')}}">
                    <i class="align-middle me-1" data-feather="linkedin"></i> <span
                        class="align-middle">Social Media</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a data-bs-target="#products" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Manage Products</span>
                </a>
                <ul id="products" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.products')}}">Products </a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.packages')}}">Packages </a></li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a data-bs-target="#Customers" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Manage Customers</span>
                </a>
                <ul id="Customers" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.customers')}}">Customers </a></li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a data-bs-target="#Orders" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="check-circle"></i> <span class="align-middle">Manage Orders</span>
                </a>
                <ul id="Orders" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.orders')}}">Orders </a></li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('admin.usefulLink')}}">
                    <i class="align-middle me-1" data-feather="link"></i> <span
                        class="align-middle">Useful Links </span>
                </a>
            </li>

        </ul>
    </div>
</nav>
