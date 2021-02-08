<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Lawati's Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <li class="{{Request::is('/') ? "active" : ""}}"><a class="nav-item nav-link" href="/">Home</a></li>
        <li class="{{Request::is('about') ? "active" : ""}}"> <a class="nav-item nav-link " href="/about">About</a><li>
        <li class="{{Request::is('contact') ? "active" : ""}}"><a class="nav-item nav-link " href="/contact">Contact</a></li>
        <li class="{{Request::is('blog') ? "active" : ""}}"><a class="nav-item nav-link" href="/blog">Blog</a></li>

      </div>
    </div>
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       Hello @if (Auth::check()) {{ Auth::user()->name }} @endif
      </button>
     
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('posts.index')}}">Posts</a>
              <a class="dropdown-item" href="{{ route('categories.index')}}">Category</a>
              <a class="dropdown-item" href="{{ route('tags.index')}}">Tags</a>
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          </div>
    </div>
</nav>
