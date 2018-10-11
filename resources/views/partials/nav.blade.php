<nav class="custom-wrapper" id="menu">
  <div class="pure-menu"></div>
  <ul class="container-flex list-unstyled">
      <li>
      	<a href="{{url('/')}}" class="text-uppercase {{request()->routeIs('page.home') ? 'active' : ''}}">Home</a></li>
      <li>
      	<a href="{{route('page.about')}}" class="text-uppercase {{request()->routeIs('page.about') ? 'active' : ''}}">About</a></li>
      <li>
      	<a href="{{route('page.archive')}}" class="text-uppercase {{request()->routeIs('page.archive') ? 'active' : ''}}">Archive</a></li>
      <li
      ><a href="{{route('page.contact')}}" class="text-uppercase {{request()->routeIs('page.contact') ? 'active' : ''}}">Contact</a></li>
  </ul>
</nav>