{{-- SideBar --}}
<nav class="sidebar">
    <div class="text">IPS System</div>
    <ul>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('beranda') }}" style="{{ Request::segment(1) === 'beranda' ? 'color: orange' : null }}"><i class="fa-solid fa-house mr-3"></i>Beranda</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('log_serangan') }}" style="{{ Request::segment(1) === 'log_serangan' ? 'color: orange' : null }}"><i class="fa-solid fa-bug mr-3"></i>Log Serangan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('notifikasi') }}" style="{{ Request::segment(1) === 'notifikasi' ? 'color: orange' : null }}"><i class="fa-solid fa-bell mr-3"></i>Notifikasi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('sensor') }}" style="{{ Request::segment(1) === 'sensor' ? 'color: orange' : null }}"><i class="fa-solid fa-heart-pulse mr-3"></i>Sensor</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('ranges') }}" style="{{ Request::segment(1) === 'ranges' ? 'color: orange' : null }}"><i class="fa-solid fa-pen mr-3"></i>Range</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" style="{{ Request::segment(1) === 'logout' ? 'color: orange' : null }}"><i class="fa-solid fa-arrow-right-from-bracket mr-3"></i></i>Logout</a>
        </li>
    </ul>
</nav>
{{-- End SideBar --}}
