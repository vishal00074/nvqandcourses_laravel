<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">
    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->


    <!-- Sidebar content -->
    <div class="sidebar-content">
        <div class="card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">
                <li class="nav-item">
                    <a href="{{url('/admin')}}" class="nav-link {{Request::segment(1)=='' ? 'active' : ''}}">
                        <i class="icon-home4"></i>
                        <span>
                            Dashboard
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/admin/general')}}" class="nav-link {{Request::segment(1)=='general' ? 'active' : ''}}">
                        <i class="icon-cog2"></i>
                        <span>
                            General
                        </span>
                    </a>
                </li>
				<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-files-empty"></i>Web Pages
                    </a>
                    <div class="dropdown-menu">
                        <a href="{{url('/admin/home')}}" class="nav-link ">
                            <i class="icon-minus2"></i>
                            <span>Home</span>
                        </a>
                        <a href="{{url('/admin/home_header')}}" class="nav-link ">
                            <i class="icon-minus2"></i>
                            <span>Home Header</span>
                        </a>
                        <a href="{{url('/admin/contact_us')}}" class="nav-link ">
                            <i class="icon-minus2"></i>
                            <span>Contact us</span>
                        </a>
                        <a href="{{url('/admin/about_us')}}" class="nav-link ">
                            <i class="icon-minus2"></i>
                            <span>About Us</span>
                        </a>
                        <!--<a href="{{url('/admin/blogs')}}" class="nav-link ">-->
                        <!--    <i class="icon-minus2"></i>-->
                        <!--    <span>Blog</span>-->
                        <!--</a>-->
                        <a href="{{url('/admin/policy')}}" class="nav-link ">
                            <i class="icon-minus2"></i>
                            <span>Privacy Policy</span>
                        </a>
                        <a href="{{url('/admin/terms')}}" class="nav-link ">
                            <i class="icon-minus2"></i>
                            <span>Terms & Conditions</span>
                        </a>
                    </div>
                </li>
				<li class="nav-item">
                    <a href="{{url('/admin/courses_level')}}" class="nav-link {{Request::segment(1)=='courses_level' ? 'active' : ''}}">
                        <i class="icon-stats-bars2"></i>
                        <span>
                            Courses Level
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/admin/courses')}}" class="nav-link {{Request::segment(1)=='courses' ? 'active' : ''}}">
                        <i class="icon-grid4"></i>
                        <span>
                            Courses
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/admin/users')}}" class="nav-link {{Request::segment(1)=='users' ? 'active' : ''}}">
                        <i class="icon-users4"></i>
                        <span>
                            Users
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/admin/user_queries')}}" class="nav-link {{Request::segment(1)=='user_queries' ? 'active' : ''}}">
                        <i class="icon-notification2"></i>
                        <span>
                            User Queries
                        </span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-stack-check"></i>Enrolled NVQ Courses
                    </a>
                    <div class="dropdown-menu">
                        <a href="{{url('/admin/enrolled_courses')}}" class="nav-link">
                            <i class="icon-minus2"></i>
                            <span>USERS</span>
                        </a>
                        <a href="{{url('/admin/enrolled_guest')}}" class="nav-link">
                            <i class="icon-minus2"></i>
                            <span>GUEST USERS</span>
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{url('/admin/applied_courses')}}" class="nav-link {{Request::segment(1)=='applied_courses' ? 'active' : ''}}">
                        <i class="icon-plus-circle2"></i>
                        <span>
                            Applied Courses
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /sidebar content -->
</div>