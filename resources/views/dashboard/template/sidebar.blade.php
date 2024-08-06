<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/" class="brand-link">
    <img src="/AdminLTE/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">HookPull</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="/profile" class="d-block">{{ Auth::user()->username }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

        <li class="nav-header">Hook</li>
        @can('admin')
        <li class="nav-item">
          <a href="{{ route('dashboard') }}" class="nav-link {{ ($active === 'dashboard') ? 'active': ''}}">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('webhook') }}" class="nav-link {{ ($active === 'webhook') ? 'active': ''}}">
            <i class="nav-icon fa fa-code"></i>
            <p>
              Webhook
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('public-status') }}" class="nav-link {{ ($active === 'public-status') ? 'active': ''}}">
            <i class="nav-icon fa fa-bolt"></i>
            <p>
              Public Status
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('terminal.permission') }}" class="nav-link {{ ($active === 'terminal-permission') ? 'active': ''}}">
            <i class="nav-icon fa fa-terminal"></i>
            <p>
              Terminal Permission
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('log') }}" class="nav-link {{ ($active === 'log') ? 'active': ''}}">
            <i class="nav-icon fas fa-clock-rotate-left"></i>
            <p>
              Log
            </p>
          </a>
        </li>
        @endcan

        <li class="nav-item">
          <a href="{{ route('terminal') }}" class="nav-link {{ ($active === 'terminal') ? 'active': ''}}">
            <i class="nav-icon fa fa-terminal"></i>
            <p>
              Terminal
            </p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>