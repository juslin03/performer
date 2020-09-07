<div class="sidebar" data-color="orange">
    {{-- background: linear-gradient(to right, #0c2646 0%, #204065 60%, #2a5788 100%); --}}
    <div class="logo">
      <a href="{{ url('/admin') }}" class="simple-text logo-mini">
        <img src="{{ asset('images/logo_performer.png') }}" alt="logo_performer" style="border-radius: 25px;">
      </a>
      <a href="{{ url('/admin') }}" class="simple-text logo-normal">
        Admin
      </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
      <ul class="nav">
        <li class="{{ Request::is('admin') ? 'active': '' }}">
          <a href="/admin">
            <i class="now-ui-icons design_app"></i>
            <p>Tableau de bord</p>
          </a>
        </li>
        <li class="{{ Request::is('menus') ? 'active': '' }}">
            <a href="{{ route('menus') }}">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Menus</p>
            </a>
          </li>
        <li class="{{ Request::is('admin/formations') ? 'active': '' }}">
          <a href="{{ route('formations') }}">
            <i class="now-ui-icons education_hat"></i>
            <p>Formations</p>
          </a>
        </li>
        <li class="{{ Request::is('admin/events') ? 'active': '' }}">
            <a href="{{ route('all-events') }}">
              <i class="now-ui-icons objects_globe"></i>
              <p>Evenements</p>
            </a>
          </li>
          <li class="{{ Request::is('admin/blog') ? 'active': '' }}">
            <a href="{{ route('blog') }}">
              <i class="now-ui-icons location_world"></i>
              <p>Blog d'actualites</p>
            </a>
          </li>
        <li>
          <a href="./map.html">
            <i class="now-ui-icons location_map-big"></i>
            <p>Maps</p>
          </a>
        </li>
        <li>
          <a href="./notifications.html">
            <i class="now-ui-icons ui-1_bell-53"></i>
            <p>Notifications</p>
          </a>
        </li>
        <li class="{{ Request::is('service-category') ? 'active': '' }}">
            <a href="{{ route('service-category') }}">
              <i class="now-ui-icons travel_info"></i>
              <p>services categories</p>
            </a>
        </li>
        <li class="{{ Request::is('services-list') ? 'active': '' }}">
            <a href="{{ route('services-list') }}">
              <i class="now-ui-icons travel_info"></i>
              <p>services list</p>
            </a>
        </li>
        <li class="{{ Request::is('role-register') ? 'active': '' }}">
            <a href="{{ route('roles') }}">
                <i class="now-ui-icons users_single-02"></i>
                <p>Utilisateurs</p>
            </a>
        </li>
        <li class="{{ Request::is('about-us') ? 'active': '' }}">
          <a href="{{ route('about-us') }}">
            <i class="now-ui-icons travel_info"></i>
            <p>About us</p>
          </a>
        </li>
        <li>
          <a href="./tables.html">
            <i class="now-ui-icons design_bullet-list-67"></i>
            <p>Parametres</p>
          </a>
        </li>
        {{-- <li>
          <a href="./typography.html">
            <i class="now-ui-icons text_caps-small"></i>
            <p>Typography</p>
          </a>
        </li> --}}
      </ul>
    </div>
  </div>
