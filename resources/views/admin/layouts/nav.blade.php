<li class="treeview">
  <a href="#">
    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
    <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
  </ul>
</li>

{{--Users--}}
<li class="treeview">
  <a href="#">
    <i class="fa fa-users"></i> <span>Userrs</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li><a href="{{ url('/adminpanel/user') }}"><i class="fa fa-circle-o"></i>All Users</a></li>
    <li class="active"><a href="{{ url('/adminpanel/user/create') }}"><i class="fa fa-circle-o"></i> Add User</a></li>
  </ul>
</li>
