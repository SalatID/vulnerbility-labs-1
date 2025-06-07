@php
    $user = auth()->user();
@endphp
@if ($user != null)
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('dashboard.view') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        {{-- <!-- Heading -->
    <div class="sidebar-heading">
        Transaksi
    </div> --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('transactions.view') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Transaksi</span></a>
        </li>
        @if ($user->getRoleNames()->contains('administrator'))
            <!-- Menu Admin -->
            {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li> --}}
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('roles.view') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Roles</span></a>
            </li>
        @elseif($user->getRoleNames()->contains('general_user'))
            <!-- Menu User -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('products.view') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Produk</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('carts.view') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Keranjang Belanja</span></a>
            </li>
        @endif
        <li class="nav-item">
            <a class="nav-link" href="{{ route('users.view') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Users</span></a>
        </li>
    </ul>
@endif
