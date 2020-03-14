<li class="nav-item dropdown">
  <a class="nav-link" align="center" data-toggle="dropdown" href="#">
    <i class="fas fa-user-tie">
      <p>Pengguna</p></i>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-center" width="50px">
      <div class="dropdown-divider"></div>
      <a href="{{ url('/user') }}" class="nav-link"><i class="fas fa-users"></i> All User</a>
      <div class="dropdown-divider"></div>
      <a href="{{ url('/staff') }}" class="nav-link"><i class="fas fa-user-tie"></i> Staff</a>
      <div class="dropdown-divider"></div>
      <a href="{{ url('/mahasiswa') }}" class="nav-link"><i class="fas fa-user-graduate"></i> Mahasiswa</a>
    </div>
  </li>

  <li class="nav-item dropdown">
    <a class="nav-link" align="center" data-toggle="dropdown" href="#">
      <i class="nav-icon fas fa-copy">
        <p> All Inventaris</p></i>
      </a>  
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-center">
        <div class="dropdown-divider"></div>
        <a href="{{ url('/device') }}" class="nav-link nav-icon fas fa-copy"> Daftar Perangkat</a>
        <a href="{{ url('/category') }}" class="nav-link nav-icon fas fa-copy"> Kategory Inventaris</a>
        <div class="dropdown-divider"></div>
        <a href="{{ url('/inventory') }}" class="nav-link nav-icon fas fa-copy"> Daftar Peralatan Inventaris</a>
        <div class="dropdown-divider"></div>
        <a href="{{ url('/borrow') }}" class="nav-link nav-icon fas fa-copy"> Daftar Peminjaman</a>
      </div>
    </li>