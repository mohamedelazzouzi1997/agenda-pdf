<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="{{ route('dashboard') }}" class="flex"><img class="" src="{{ asset('assets/images/loader.svg') }}"
                width="25" alt=""><span class="m-l-10">{{ config('app.name') }}</span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <div class="detail py-3">
                        <h4 class="text-sm">{{ Auth::user()->name }}</h4>
                        <small>
                            Admin
                        </small>
                    </div>
                </div>
            </li>
            <li data-toggle="modal" data-target="#addNotification"
                class="{{ Request::segment(1) === 'my-profile' ? 'active open' : null }}"><a href="#"><i
                        class="zmdi zmdi-plus-circle text-green-500"></i><span class="hover:text-green-500">Ajouter
                        Notification</span></a></li>
            <li class="{{ Request::segment(2) === 'agenda' ? 'active open' : null }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="zmdi zmdi-calendar"></i><span class="uppercase">Agenda</span>
                </a>
            </li>
            <li class="{{ Request::segment(2) === 'all' ? 'active open' : null }}">
                <a href="{{ route('admin.all.event') }}">
                    <i class="zmdi zmdi-notifications"></i><span class="uppercase">All Notifications</span>
                </a>
            </li>
            <li class="{{ Request::segment(2) === 'valide' ? 'active open' : null }}">
                <a href="{{ route('admin.valide.event') }}">
                    <i class="zmdi zmdi-check-all"></i><span class="uppercase">Valide Notification</span>
                </a>
            </li>
            <li>
                <a href="">
                    <button form="logoutform" type="submit">
                        <i class="zmdi zmdi-power text-danger"></i>
                        <span class="uppercase text-danger">Se déconnecter</span>
                    </button>
                </a>
            </li>

            <form id='logoutform' class='inline' action="{{ route('logout') }}" method="post">
                @csrf
            </form>
        </ul>
    </div>
</aside>
