<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="margin-left: 0px">
  <!-- Left navbar links -->
  <ul class="navbar-nav center">
    <li class="nav-item">
    <table>
      <tbody>
        <tr>
          <td><img src="{{ asset('admin/dist/img/poliban.png') }}" width="50px"></td>
          <td><b>POLITEKNIK NEGERI BANJARMASIN <br> Jurusan Administrasi Bisnis</b></td>
        </tr>
      </tbody>
    </table>    
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link" align="center" data-toggle="dropdown" href="#">
        <i class="fas fa-home">
          <p>Halama Depan</p></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-center" width="50px">
          <div class="dropdown-divider"></div>
          <a href="{{ url('/') }}" class="nav-link">  Profile Jurusan Adminstrasi Bisnis</a>
          <div class="dropdown-divider"></div>
          <a href="{{ url('/struktur') }}" class="nav-link"><i class="fas fa-sitemap"></i> Struktur Organisasi</a>
         <!--  <div class="dropdown-divider"></div>
          <a href="{{ url('/galery') }}" class="nav-link">Gallery</a> -->
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" align="center" data-toggle="dropdown" href="#">
          <i class="nav-icon fas fa-tachometer-alt">
            <p>Daftar Inventaris</p></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-center" width="50px">
            <div class="dropdown-divider"></div>
            <a href="{{ url('/places') }}" class="nav-link"><i class="fas fa-university"></i> Daftar Laboraturium </a>
            <div class="dropdown-divider"></div>
            <a href="{{ url('/inventaris') }}" class="nav-link"><i class="fas fa-tv"></i> Data Inventaris</a>
          </div>
        </li>
        
        @if(auth()->check())
          @if(auth()->user()->role == 'admin')
            @include('layouts.include._navbar_admin')
          @endif
        @endif
          </ul>

            <!-- SEARCH FORM -->
            <!-- Right navbar links -->

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
              <!-- Notifications Dropdown Menu -->
              <!-- Authentication Links -->
              @guest
              <li class="nav-item">
                <i class="sign-out-alt">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></i>
              </li>
              @if (Route::has('register'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
              @endif
              @else
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  <b>{{ Auth::user()->name }}</b> <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <!-- <div class="fas fa-user-tie"> -->
                  <div class="dropdown-item">
                  <a class="fas fa-user-tie" href="{{ url('/profile/'.auth()->id().'/show') }}">Profile</a>
                </div>
                <div class="dropdown-item">
                  <a class="fas fa-sign-out-alt" href="{{ route('logout') }}" 
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
            </li>
            @endguest
            <li class="nav-item">
              <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                <i class="fas fa-th-large"></i>
              </a>
            </li>
          </ul>
        </ul>
  </nav>