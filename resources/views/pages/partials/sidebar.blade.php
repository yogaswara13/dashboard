<aside class="main-sidebar sidebar-dark-primary elevation-4 bg-orange">
    <!--  Logo -->
    <a href="home" class="brand-link bg-orange">
      <img src="{{asset('assets/img/LogoUnpas.png')}}" alt="Unpas Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Fakultas Teknik Unpas </span>
    </a>
    <!--  Profile -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/img/user7-128x128.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2"> 
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item {{ ($title === "about")? 'menu-open' : '' }}p"> 
              <a href="home" class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <li class="nav-item {{ ($title === "about")? 'menu-open' : '' }}">
              <a href="about" class="nav-link">
                <i class="nav-icon fas fa-address-card"></i>
                <p>
                  Tentang FT UNPAS
                </p>
              </a>
            </li>

            <li class="nav-item {{ ($title === "about")? 'menu-open' : '' }}">
              <a href="kelolakontent" class="nav-link">
                <i class="fas fa-solid fa-tasks nav-icon"></i> 
                <p>Kelola Konten</p>
                <i class="fas fa-angle-left right"></i>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="home" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tambah</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="home" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Hapus</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="home" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ubah</p> 
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item {{ ($title === "about")? 'menu-open' : '' }}">
              <a href="users" class="nav-link">
                <i class="fas fa-users nav-icon"></i>
                <p>Kelola User</p>
              </a>
            </li>

            <li class="nav-item {{ ($title === "about")? 'menu-open' : '' }}">
              <a href="" class="nav-link">
                <i class="fas fa-moon nav-icon"></i>
                <p>Mode</p>
                <i class="fas fa-sun nav-icon"></i>
                <i class="fas fa-angle-left right"></i>
              </a>  
              <ul class="nav nav-treeview">
                  <li class="nav-item {{ ($title === "about")? 'menu-open' : '' }}">
                    <a href="" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      Mode Gelap
                    </a>
                  </li>
                  <li class="nav-item {{ ($title === "about")? 'menu-open' : '' }}">
                    <a href="" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      Mode Terang
                    </a>
                  </li>
              </ul>
            </li>

            <li class="nav-header">KETERANGAN WARNA</li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-circle text-info"></i>
                <p class="text">Informasi</p>
              </a>
            </li>
            <li class="nav-item {{ ($title === "about")? 'menu-open' : '' }}">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-circle text-warning"></i>
                <p>Penting</p>
              </a>
            </li>
            <li class="nav-item {{ ($title === "about")? 'menu-open' : '' }}">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-circle text-danger"></i>
                <p>Darurat</p>
              </a>
            </li>
            <li class="nav-item {{ ($title === "about")? 'menu-open' : '' }}">
              <a href="#" class="nav-link">
                <i class="fas fa-sign-out-alt nav-icon"></i>
                <p>Keluar</p>
              </a>
            </li>
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>