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
      <li><a href="{{route('admin.ports.create')}}">Crear</a></li>
      <li {{request()->is('admin/posts') ? 'class=active' : ''}}><a href="{{route('admin.posts.index')}}">ver</a></li>
    </ul>
  </li>
</ul>