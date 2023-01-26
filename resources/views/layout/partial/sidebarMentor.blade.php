<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon logo-sidebar">
            <img class="logo-sidebar" src="{{asset('template/img/bkpk-sq.png')}}"/>
        </div>
        <div class="sidebar-brand-text mx-3">BKPK STTNF</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/dashboard/{{Auth::user()->id}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="/presensi-kelompok">
            <i class="bi bi-clipboard-data"></i>
            <span>Presensi</span>
        </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Data Kelompok</span>
        </a>
    </li>

</ul>