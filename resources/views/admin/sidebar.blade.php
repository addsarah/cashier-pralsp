<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="{{ asset("/admin/dist/img/AdminLTELogo.png") }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-light">Toko Semudah Cerdas Inovatif</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset("/admin/dist/img/user2-160x160.jpg") }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        @if(Auth::check())
        <span class="hidden-xs">{{ Auth::user()->name}}</span>
        @endif
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item menu-close">
          <a href="{{ url("#") }}" class="nav-link active">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Menu Master
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('user.index')}}" class="nav-link">
                <i class="far fa-user nav-icon"></i>
                <p>User</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route("pembeli.index") }}" class="nav-link">
                <i class="fas fa-users nav-icon"></i>
                <p>Pembeli</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('barang.index') }}" class="nav-link">
                <i class="fas fa-box-open nav-icon"></i>
                <p>Barang</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item menu-close">
          <a href="{{ url("#") }}" class="nav-link">
            <i class="fas fa-book-reader nav-icon"></i>
            <p>
              Pesanan
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('pesanan.index') }}" class="nav-link">
                <i class="fas fa-sign-in-alt	nav-icon"></i>
                <p>Pesanan Diterima</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url("./index2.html") }}" class="nav-link">
                <i class="fas fa-sign-out-alt nav-icon"></i>
                <p>Pesanan Batal</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item menu-close">
          <a href="{{ url("#") }}" class="nav-link">
            <i class="fas fa-dollar-sign nav-icon"></i>
            <p>
              Transaksi
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url("./index.html") }}" class="nav-link">
                <i class="fas fa-shopping-basket nav-icon"></i>
                <p>Keranjang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url("./index2.html") }}" class="nav-link">
                <i class="fas fa-money-bill nav-icon"></i>
                <p>Pembayaran</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item menu-close">
          <a href="{{ url("#") }}" class="nav-link">
            <i class="fas fa-file nav-icon"></i>
            <p>
              Laporan
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('reportuser.index') }}" class="nav-link">
                <i class="fas fa-address-book nav-icon"></i>
                <p>Report User</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>