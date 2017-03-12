<li class="treeview">
  <a href="#">
    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li class="active"><a href="{{url('/adminpanel/sitesetting')}}"><i class="fa fa-circle-o"></i> Main Settings</a></li>
    <li><a href="index2.html"><i class="fa fa-circle-o"></i> Other Settings</a></li>
  </ul>
</li>

{{--Users--}}
<li class="treeview">
  <a href="#">
    <i class="fa fa-users"></i> <span>Manage Userrs</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li><a href="{{ url('/adminpanel/user') }}"><i class="fa fa-circle-o"></i>All Users</a></li>
    <li class="active"><a href="{{ url('/adminpanel/user/create') }}"><i class="fa fa-circle-o"></i> Add User</a></li>
  </ul>
</li>

{{--Buildings (bu)--}}
<li class="treeview">
  <a href="#">
    <i class="fa fa-users"></i> <span>Manage Estates</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li><a href="{{ url('/adminpanel/bu') }}"><i class="fa fa-circle-o"></i>All Estates</a></li>
    <li class="active"><a href="{{ url('/adminpanel/bu/create') }}"><i class="fa fa-circle-o"></i> Add Estate</a></li>
  </ul>
</li>
