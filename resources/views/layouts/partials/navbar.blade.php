<div class="container-fluid page-body-wrapper">
  <!-- partial:partials/_sidebar.html -->
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="profile-image">
            <img class="img-xs rounded-circle" src="{{ Auth::user()->getGravatarAttribute() }}" alt="profile image">
            <div class="dot-indicator bg-success"></div>
          </div>
          <div class="text-wrapper">
            <p class="profile-name">{{ Auth::user()->nama }}</p>
            <p class="designation">{{ Auth::user()->keanggotaan }}</p>
          </div>
        </a>
      </li>
      <li class="nav-item nav-category">Main Menu</li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('anggota.dashboard') }}">
          <i class="menu-icon typcn typcn-document-text"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      @if (Auth::user()->checkPermission())
        <li class="nav-item nav-category">Sekretaris</li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#sekretaris" aria-expanded="false" aria-controls="sekretaris">
              <i class="menu-icon typcn typcn-document-add"></i>
              <span class="menu-title">Management Siswa</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="sekretaris">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('anggota.manage.index') }}"> Blank Page </a>
                </li>
                {{-- <li class="nav-item">
                  <a class="nav-link" href="pages/samples/login.html"> Login </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/register.html"> Register </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/error-404.html"> 404 </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/error-500.html"> 500 </a>
                </li> --}}
              </ul>
            </div>
          </li>
        <li class="nav-item nav-category">Bendahara</li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#bendahara" aria-expanded="false" aria-controls="bendahara">
              <i class="menu-icon typcn typcn-document-add"></i>
              <span class="menu-title">Management Kas</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="sekretaris">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('anggota.kas.index') }}"> index </a>
                </li>
                {{-- <li class="nav-item">
                  <a class="nav-link" href="pages/samples/login.html"> Login </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/register.html"> Register </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/error-404.html"> 404 </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/error-500.html"> 500 </a>
                </li> --}}
              </ul>
            </div>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('anggota.kas.index') }}">
              <i class="menu-icon typcn typcn-shopping-bag"></i>
              <span class="menu-title">Management Kas</span>
            </a>
          </li> --}}
      @endif
      @if (Auth::user()->isAdmin)
      <li class="nav-item nav-category">Administrator</li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('anggota.admin.index') }}">
          <i class="menu-icon typcn typcn-shopping-bag"></i>
          <span class="menu-title">Settings</span>
        </a>
      </li>
      @endif
      
      {{-- <li class="nav-item">
        <a class="nav-link" href="pages/charts/chartjs.html">
          <i class="menu-icon typcn typcn-th-large-outline"></i>
          <span class="menu-title">Charts</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/tables/basic-table.html">
          <i class="menu-icon typcn typcn-bell"></i>
          <span class="menu-title">Tables</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/icons/font-awesome.html">
          <i class="menu-icon typcn typcn-user-outline"></i>
          <span class="menu-title">Icons</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="menu-icon typcn typcn-document-add"></i>
          <span class="menu-title">User Pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/samples/login.html"> Login </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/samples/register.html"> Register </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/samples/error-404.html"> 404 </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/samples/error-500.html"> 500 </a>
            </li>
          </ul>
        </div>
      </li> --}}
    </ul>
  </nav>
  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      @yield('main')
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
      <div class="container-fluid clearfix">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Kazuki 2022</span>
      </div>
    </footer>
    <!-- partial -->
  </div>
  <!-- main-panel ends -->
</div>