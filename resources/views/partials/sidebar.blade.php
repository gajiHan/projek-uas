<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand px-4 py-3 m-0" href="" target="_blank">
                <img src="{{asset('adminpage')}}/assets/img/logo-ct-dark.png" class="navbar-brand-img" width="26" height="26" alt="main_logo">
                <span class="ms-1 text-sm text-dark">GajiHan</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-dark {{ Route::is('dashboard-gaji') ? 'active' : '' }}" href="{{ route('dashboard-gaji') }}">
                        <i class="material-symbols-rounded opacity-5">dashboard</i>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark {{ request()->routeIs('karyawan.index') ? 'active' : '' }}" href="{{ route('karyawan.index') }}">
                    <i class="material-symbols-rounded opacity-5">people</i>
                        <span class="nav-link-text ms-1">Karyawan</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark {{ request()->routeIs('departemen.index') ? 'active' : '' }}" href="{{ route('departemen.index') }}">
                    <i class="material-symbols-rounded opacity-5">business</i>
                        <span class="nav-link-text ms-1">Departemen</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark {{ request()->routeIs('lembur.index') ? 'active' : '' }}" href="{{ route('lembur.index') }}">
                    <i class="material-symbols-rounded opacity-5">schedule</i>
                        <span class="nav-link-text ms-1">Lembur</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark {{ request()->routeIs('potongan.index') ? 'active' : '' }}" href="{{ route('potongan.index') }}">
                    <i class="material-symbols-rounded opacity-5">money_off</i>
                        <span class="nav-link-text ms-1">Potongan</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark {{ request()->routeIs('tunjangan.index') ? 'active' : '' }}" href="{{ route('tunjangan.index') }}">
                    <i class="material-symbols-rounded opacity-5">add_card</i>
                        <span class="nav-link-text ms-1">Tunjangan</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark {{ request()->routeIs('gaji.index') ? 'active' : '' }}" href="{{ route('gaji.index') }}">
                    <i class="material-symbols-rounded opacity-5">payment</i>
                        <span class="nav-link-text ms-1">Gaji</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark {{ request()->routeIs('slip.index') ? 'active' : '' }}" href="{{ route('slip.index') }}">
                    <i class="material-symbols-rounded opacity-5">receipt</i>
                        <span class="nav-link-text ms-1">Slip</span>
                    </a>
                </li>

                <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}" class="nav-link">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" 
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Logout') }}
                    </x-responsive-nav-link>
                </form>
            </li>
            </ul>
        </div>
    </aside>