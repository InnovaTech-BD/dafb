<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="nav-profile-image">
            <img src="{{ Storage::url(auth()->user()->profile->avatar) }}" alt="profile">
            <span class="login-status online"></span>
            <!--change to offline or busy as needed-->
          </div>
          <div class="nav-profile-text d-flex flex-column">
            <span class="font-weight-bold mb-2">{{ auth()->user()->name }}</span>
            <span class="text-secondary text-small">{{ auth()->user()->role->title }}</span>
          </div>
          <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{ route('app.users.index') }}">
          <span class="menu-title">Users</span>
          <i class="mdi mdi-view-dashboard menu-icon"></i>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{ route('app.contact.index') }}">
          <span class="menu-title">Contact</span>
          <i class="mdi mdi-message-bulleted menu-icon"></i>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{ route('app.scholarships.index') }}">
          <span class="menu-title">Scholarships</span>
          <i class="mdi  mdi-library menu-icon"></i>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{ route('app.areas.index') }}">
          <span class="menu-title">Areas</span>
          <i class="mdi mdi-message-bulleted menu-icon"></i>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{ route('app.about.edit',1) }}">
          <span class="menu-title">About Page</span>
          <i class="mdi mdi-message-bulleted menu-icon"></i>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{ route('app.teams.index') }}">
          <span class="menu-title">Teams</span>
          <i class="mdi mdi-message-bulleted menu-icon"></i>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{ route('app.projects.index') }}">
          <span class="menu-title">Programs</span>
          <i class="mdi mdi-hospital menu-icon"></i>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{ route('app.events.index') }}">
          <span class="menu-title">Events</span>
          <i class="mdi mdi-message-bulleted menu-icon"></i>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{ route('app.events.upcoming.index') }}">
          <span class="menu-title">Upcong Events</span>
          <i class="mdi mdi-shape-rectangle-plus menu-icon"></i>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{ route('app.sliders.index') }}">
          <span class="menu-title">Sliders</span>
          <i class="mdi mdi-image-album menu-icon"></i>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{ route('app.faces.index') }}">
          <span class="menu-title">Happy faces</span>
          <i class="mdi mdi-image-album menu-icon"></i>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{ route('app.galleries.index') }}">
          <span class="menu-title">Galleries</span>
          <i class="mdi mdi-image-multiple menu-icon"></i>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{ route('app.volunteers.index') }}">
          <span class="menu-title">Volunteers</span>
          <i class="mdi mdi-human-male-female menu-icon"></i>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{ route('app.reports.index') }}">
          <span class="menu-title">Reports</span>
          <i class="mdi mdi-human-male-female menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#settings" aria-expanded="false" aria-controls="settings">
        <span class="menu-title">Settings</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-lock menu-icon"></i>
      </a>
      <div class="collapse" id="settings">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('app.settings.roles.index') }}"> Roles </a></li>
        </ul>
      </div>
    </li>
    </ul>
  </nav>