<div class="sidebar">
  <div class="sidebar-inner">
    <!-- ### $Sidebar Header ### -->
    <div class="sidebar-logo">
      <div class="peers ai-c fxw-nw">
        <div class="peer peer-greed">
          <a class="sidebar-link td-n" href="index.html">
            <div class="peers ai-c fxw-nw">
              <div class="peer">
                <div class="logo">
                  <img src="{{ asset('assets/static/images/logo.png') }}" alt="">
                </div>
              </div>
              <div class="peer peer-greed">
                <h5 class="lh-1 mB-0 logo-text">Adminator</h5>
              </div>
            </div>
          </a>
        </div>
        <div class="peer">
          <div class="mobile-toggle sidebar-toggle">
            <a href="" class="td-n">
              <i class="ti-arrow-circle-left"></i>
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- ### $Sidebar Menu ### -->
    <ul class="sidebar-menu scrollable pos-r">
      <li class="nav-item mT-30 active">
        <a class="sidebar-link" href="{{ url('admin') }}">
          <span class="icon-holder">
            <i class="c-blue-500 ti-home"></i>
          </span>
          <span class="title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class='sidebar-link' href="{{ url('admin/posts') }}">
          <span class="icon-holder">
            <i class="c-deep-orange-500 ti-layout-media-left-alt"></i>
          </span>
          <span class="title">Posts</span>
        </a>
      </li>
      <li class="nav-item">
        <a class='sidebar-link' href="{{ url('admin/partners') }}">
          <span class="icon-holder">
            <i class="c-orange-500 ti-layout-grid2"></i>
          </span>
          <span class="title">Partners</span>
        </a>
      </li>
      <li class="nav-item">
        <a class='sidebar-link' href="{{ url('') }}">
          <span class="icon-holder">
            <i class="c-green-500 ti-map"></i>
          </span>
          <span class="title">View Website</span>
        </a>
      </li>
      <!-- <li class="nav-item dropdown">
        <a class="dropdown-toggle" href="javascript:void(0);">
          <span class="icon-holder">
            <i class="c-teal-500 ti-view-list-alt"></i>
          </span>
          <span class="title">Multiple Levels</span>
          <span class="arrow">
            <i class="ti-angle-right"></i>
          </span>
        </a>
        <ul class="dropdown-menu">
          <li class="nav-item dropdown">
            <a href="javascript:void(0);">
              <span>Menu Item</span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a href="javascript:void(0);">
              <span>Menu Item</span>
              <span class="arrow">
                <i class="ti-angle-right"></i>
              </span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="javascript:void(0);">Menu Item</a>
              </li>
              <li>
                <a href="javascript:void(0);">Menu Item</a>
              </li>
            </ul>
          </li>
        </ul>
      </li> -->
    </ul>
  </div>
</div>