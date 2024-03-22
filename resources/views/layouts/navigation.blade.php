<!-- Sidebar -->
<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="info">
      <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
          <i class="nav-icon fas fa-th"></i>
          <p>
            {{ __('Dashboard') }}
          </p>
        </a>
      </li>
      {{-- User Management --}}
      <li class="nav-header mt-2 font-weight-bold">User Management</li>
      <li class="nav-item">
        <a href="{{ route('dosen.index') }}"
           class="nav-link {{ request()->routeIs('dosen.index') ? 'active' : '' }}">
          <i class="nav-icon fas fa-chalkboard-teacher"></i>
          <p>
            {{ __('Dosen') }}
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('mahasiswa.index') }}"
           class="nav-link {{ request()->routeIs('mahasiswa.index') ? 'active' : '' }}">
          <i class="nav-icon fas fa-user-graduate"></i>
          <p>
            {{ __('Mahasiswa') }}
          </p>
        </a>
      </li>
      {{--  Master Data Management    --}}
      <li class="nav-header mt-2 font-weight-bold">Master Data</li>
      <li class="nav-item">
        <a href="{{ route('users.index') }}" class="nav-link">
          <i class="nav-icon fas fa-users"></i>
          <p>
            {{ __('Users') }}
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('semester.index') }}"
           class="nav-link {{ request()->routeIs('semester.index') ? 'active' : '' }}">
          <i class="nav-icon fas fa-code-branch"></i>
          <p>
            {{ __('Semester') }}
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('angkatan.index') }}"
           class="nav-link {{ request()->routeIs('angkatan.index') ? 'active' : '' }}">
          <i class="nav-icon far fa-calendar"></i>
          <p>
            {{ __('Angkatan') }}
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('ajaran.index') }}"
           class="nav-link {{ request()->routeIs('ajaran.index') ? 'active' : '' }}">
          <i class="nav-icon far fa-calendar-check"></i>
          <p>
            {{ __('Tahun Ajaran') }}
          </p>
        </a>
      </li>


      {{--      <li class="nav-header mt-2 font-weight-bold">Othe</li>--}}
      {{--      <li class="nav-item">--}}
      {{--        <a href="{{ route('about') }}" class="nav-link">--}}
      {{--          <i class="nav-icon far fa-address-card"></i>--}}
      {{--          <p>--}}
      {{--            {{ __('About us') }}--}}
      {{--          </p>--}}
      {{--        </a>--}}
      {{--      </li>--}}

      {{--      <li class="nav-item">--}}
      {{--        <a href="#" class="nav-link">--}}
      {{--          <i class="nav-icon fas fa-circle nav-icon"></i>--}}
      {{--          <p>--}}
      {{--            Two-level menu--}}
      {{--            <i class="fas fa-angle-left right"></i>--}}
      {{--          </p>--}}
      {{--        </a>--}}
      {{--        <ul class="nav nav-treeview" style="display: none;">--}}
      {{--          <li class="nav-item">--}}
      {{--            <a href="#" class="nav-link">--}}
      {{--              <i class="far fa-circle nav-icon"></i>--}}
      {{--              <p>Child menu</p>--}}
      {{--            </a>--}}
      {{--          </li>--}}
      {{--        </ul>--}}
      {{--      </li>--}}
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
