<ul class="sidebar-menu" data-widget="tree">
  <li class="header">HEADER</li>
  <!-- Optionally, you can add icons to the links -->
  <li {{request()->is('admin') ? 'class=active' : ''}}><a href="{{route('dashboard')}}"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
 
  <li class="treeview" {{request()->is('admin/posts') ? 'active' : ''}}>
    <a href="#"><i class="fa fa-bars"></i> <span>Blog</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
      <li {{request()->is('admin/posts') ? 'class=active' : ''}}><a href="{{route('admin.posts.index')}}">ver</a></li>
      @if(request()->is('admin/posts/*'))
        <li><a href="{{route('admin.posts.index','#create')}}">Crear</a></li>
      @else
        <li><a href="#" data-toggle="modal" data-target="#exampleModal">Crear</a></li>
      @endif      
    </ul>
  </li>
</ul>