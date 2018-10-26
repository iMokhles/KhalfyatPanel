@if (Auth::guard('admin')->check())
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        @include('admin.inc.sidebar_user_panel')

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          {{-- <li class="header">{{ trans('backpack::base.administration') }}</li> --}}
          <!-- ================================================ -->
          <!-- ==== Recommended place for admin menu items ==== -->
          <!-- ================================================ -->
          <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>

          <!-- ======================================= -->

           <li class="header">Wallpaper</li>

              <li><a href='{{ backpack_url('/wallpapers') }}'><i class='fa fa-image'></i> <span>Wallpapers</span></a></li>
              <li><a href='{{ backpack_url('/categories') }}'><i class='fa fa-list-ul'></i> <span>Categories</span></a></li>
              <li><a href='{{ backpack_url('/wallpaper_categories') }}'><i class='fa fa-image'></i><i class='fa fa-list-ul'></i> <span>Wallpaper Categories</span></a></li>

              <li><a href='{{ backpack_url('/daily_wallpapers') }}'><i class='fa fa-calendar'></i> <span>Daily Wallpapers</span></a></li>

              <li class="header">Social</li>

              <li><a href='{{ backpack_url('/wallpaper_comments') }}'><i class='fa fa-wechat'></i> <span>Wallpaper Comments</span></a></li>
              <li><a href='{{ backpack_url('/wallpaper_likes') }}'><i class='fa fa-heart'></i> <span>Wallpaper Likes</span></a></li>
              <li><a href='{{ backpack_url('/wallpaper_reports') }}'><i class='fa fa-sticky-note'></i> <span>Wallpaper Reports</span></a></li>

              <li class="header">Analytics</li>
              <li><a href='{{ backpack_url('/wallpaper_downloads') }}'><i class='fa fa-download'></i> <span>Wallpaper Downloads</span></a></li>
              <li><a href='{{ backpack_url('/wallpaper_views') }}'><i class='fa fa-eye'></i> <span>Wallpaper Views</span></a></li>

              <li class="header">Api</li>
              <li><a href='{{ backpack_url('/api_clients') }}'><i class='fa fa-code-fork'></i> <span>Api Clients</span></a></li>
              <li><a href='{{ backpack_url('/api_access') }}'><i class='fa fa-universal-access'></i> <span>Api Access</span></a></li>

              {{--              <li><a href='{{ backpack_url('/trending_wallpapers') }}'><i class='fa fa-line-chart'></i> <span>Trending Wallpapers</span></a></li>--}}

              <li class="header">Users</li>

              <li><a href='{{ backpack_url('/admins_list') }}'><i class='fa fa-user-secret'></i> <span>Admins</span></a></li>
              <li><a href='{{ backpack_url('/users_list') }}'><i class='fa fa-user'></i> <span>Users</span></a></li>
              <li><a href="{{ backpack_url('/roles') }}"><i class="fa fa-group"></i> <span>Admins Roles</span></a></li>
              <li><a href="{{ backpack_url('/permissions') }}"><i class="fa fa-key"></i> <span>Admins Permissions</span></a></li>

           <li class="header">System</li>

              <li><a href='{{ backpack_url('/backup') }}'><i class='fa fa-hdd-o'></i> <span>Backups</span></a></li>
              <li><a href='{{ backpack_url('/log') }}'><i class='fa fa-terminal'></i> <span>Logs</span></a></li>
              <li><a href="{{ backpack_url('/page') }}"><i class="fa fa-file-o"></i> <span>Pages</span></a></li>
              <li><a href="{{ backpack_url('/menu-item') }}"><i class="fa fa-list"></i> <span>Menu</span></a></li>
              <li><a href="{{ backpack_url('elfinder') }}"><i class="fa fa-files-o"></i> <span>File manager</span></a></li>
              <li><a href='{{ backpack_url('/setting') }}'><i class='fa fa-cog'></i> <span>Settings</span></a></li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
@endif
