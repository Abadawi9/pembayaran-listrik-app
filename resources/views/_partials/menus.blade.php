@php
    $routeActive = Route::currentRouteName();
@endphp

<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'home' ? 'active' : '' }}" href="{{ route('home') }}">
        <i class="ni ni-tv-2 text-primary"></i>
        <span class="nav-link-text">Dashboard</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'users.index' ? 'active' : '' }}" href="{{ route('users.index') }}">
        <i class="fas fa-users text-warning"></i>
        <span class="nav-link-text">Users</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'tarifs.index' ? 'active' : '' }}" href="{{ route('tarifs.index') }}">
        <i class="fas fa-building text-primary"></i>
        <span class="nav-link-text">Tarif</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'pelanggans.index' ? 'active' : '' }}" href="{{ route('pelanggans.index') }}">
        <i class="fas fa-user-tie text-default"></i>
        <span class="nav-link-text">Pelanggan</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'tagihans.index' ? 'active' : '' }}" href="{{ route('tagihans.index') }}">
        <i class="fas fa-building text-warning"></i>
        <span class="nav-link-text">Tagihan</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'profile' ? 'active' : '' }}" href="{{ route('profile') }}">
        <i class="fas fa-user-tie text-success"></i>
        <span class="nav-link-text">Profile</span>
    </a>
</li>