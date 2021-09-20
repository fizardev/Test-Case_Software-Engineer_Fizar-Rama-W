<!-- Navbar Start -->
<nav
class="navbar navbar-expand-lg navbar-light bg-light fixed-top navbar-dashboard"
>
<div class="container-fluid">
  <button
    class="btn btn-secondary d-md-none mr-auto mr-2 btn-toggler"
  >
    &laquo; Menu
  </button>
  <button
    class="navbar-toggler ml-auto"
    type="button"
    data-toggle="collapse"
    data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent"
    aria-expanded="false"
    aria-label="Toggle navigation"
  >
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a
          class="nav-link dropdown-toggle"
          href="#"
          id="navbarDropdown"
          role="button"
          data-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false"
        >
          <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="" width="35px" height="35px" style="object-fit: cover; object-position: center;" /> Hi,
          {{ auth()->user()->name }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
        </div>
      </li>
    </ul>
  </div>
</div>
</nav>
<!-- Navbar End -->