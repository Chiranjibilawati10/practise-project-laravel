<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Lawati's Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <li class="{{Request::is('/') ? "active" : ""}}"><a class="nav-item nav-link" href="/">Home</a></li>
        <li class="{{Request::is('about') ? "active" : ""}}"> <a class="nav-item nav-link " href="about">About</a><li>
        <li class="{{Request::is('contact') ? "active" : ""}}"><a class="nav-item nav-link " href="contact">Contact</a></li>
      </div>
    </div>
</nav>