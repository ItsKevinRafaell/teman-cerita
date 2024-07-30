    <!-- START::NAVBAR -->
    <nav class="navbar">
      <div class="logo_item">
        <i class="bx bx-menu" id="sidebarOpen"></i>
        <img src="{{ asset("/assets/images/logo-only-dark.svg") }}" alt="logo-only-dark"></i>RuangTenang
      </div>
    </nav>
    <!-- END::NAVBAR -->


    <!-- START::SIDEBAR -->
    <nav class="sidebar close">
      <div class="menu_content">
        <ul class="menu_items">
          <div class="menu_title menu_dahsboard"></div>

            <!-- start -->
            <li class="item">
              <a href="/dashboard" class="nav_link {{ request()->is('dashboard') ? 'active' : '' }}">
                <span class="navlink_icon">
                  <i class="bx bxs-dashboard"></i>
                </span>
                <span class="navlink">Dashboard</span>
              </a>
            </li>
            <!-- end -->

          <!-- start -->
          <li class="item">
            <a href="/dashboard-chat.html" class="nav_link {{ request()->is('chat') ? 'active' : '' }}">
              <span class="navlink_icon">
                <i class='bx bxs-chat'></i>
              </span>
              <span class="navlink">Chatbot AI</span>
            </a>
          </li>
          <!-- end -->

          <!-- start -->
          <li class="item">
            <a href="/index.html" class="nav_link">
              <span class="navlink_icon">
                <i class='bx bx-task'></i>
              </span>
              <span class="navlink">Asesmen</span>
            </a>
          </li>
          <!-- end -->

        </ul>

        <ul class="menu_items">
          <div class="menu_title menu_setting"></div>

          <li class="item">
            <a href="#" class="nav_link">
              <span class="navlink_icon">
                <i class="bx bxs-user"></i>
              </span>
              <span class="navlink">Profil</span>
            </a>
          </li>

          <li class="item">
            <a href="#" class="nav_link">
              <span class="navlink_icon">
                <i class='bx bxs-log-out'></i>
              </span>
              <span class="navlink">Logout</span>
            </a>
          </li>

        </ul>

        <!-- Sidebar Open / Close -->
        <div class="bottom_content">
          <div class="bottom expand_sidebar">
            <i class='bx bx-right-arrow-alt' ></i>
          </div>
          <div class="bottom collapse_sidebar">

            <i class='bx bx-left-arrow-alt' ></i>
          </div>
        </div>
      </div>
    </nav>
    <!-- END::SIDEBAR -->
