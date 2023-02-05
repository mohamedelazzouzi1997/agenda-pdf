<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="#" class="flex"><img class="" src="../assets/images/logo.svg" width="25"
                alt="Aero"><span class="m-l-10">Aero</span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <div class="image"><a href="#"><img
                                src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="User"></a>
                    </div>
                    <div class="detail">
                        <h4 class="text-sm">{{ Auth::user()->name }}</h4>
                        <small>Employee</small>
                    </div>
                </div>
            </li>
            <li data-toggle="modal" data-target="#addNotification"
                class="{{ Request::segment(1) === 'my-profile' ? 'active open' : null }}"><a href="#"><i
                        class="zmdi zmdi-plus-circle text-green-500"></i><span class="hover:text-green-500">Ajouter
                        Notification</span></a></li>
            <li class="{{ Request::segment(1) === 'dashboard' ? 'active open' : null }}"><a href="#"><i
                        class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li class="{{ Request::segment(1) === 'app' ? 'active open' : null }}">
                <a href="#App" class="menu-toggle"><i class="zmdi zmdi-apps"></i> <span>App</span></a>
                <ul class="ml-menu">
                    <li class="{{ Request::segment(2) === 'inbox' ? 'active' : null }}"><a href="#">Inbox</a></li>
                    <li class="{{ Request::segment(2) === 'chat' ? 'active' : null }}"><a href="#">Chat</a></li>
                    <li class="{{ Request::segment(2) === 'calendar' ? 'active' : null }}"><a
                            href="#">Calendar</a></li>
                    <li class="{{ Request::segment(2) === 'contact-list' ? 'active' : null }}"><a href="#">Contact
                            list</a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
