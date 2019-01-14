<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('images/MOKUZAI-01.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="/home" class="nav-link active">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Menu
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @role('admin')
              <li class="nav-item">
                <a href="{{route('product.index')}}" class="nav-link active">
                  <i class="fa fa-black-tie nav-icon"></i>
                  <p>Product</p>
                </a>
                @endrole
              </li>

              <li class="nav-item">
                @role('admin')
                <a href="{{route('kategori.index')}}" class="nav-link active">
                  <i class="fa fa-black-tie nav-icon"></i>
                  <p>Kategori</p>
                </a>
                @endrole
              </li>

              <li class="nav-item">
                @role('admin')
                <a href="{{route('customadmin.index')}}" class="nav-link active">
                  <i class="fa fa-black-tie nav-icon"></i>
                  <p>Custom Admin</p>
                </a>
                @endrole
              </li>

              <li class="nav-item">
                @role('admin')
                <a href="{{route('customorderadmin.index')}}" class="nav-link active">
                  <i class="fa fa-black-tie nav-icon"></i>
                  <p>Custom Order Admin</p>
                </a>
                @endrole
              </li>

               <li class="nav-item">
                @role('admin')
                <a href="{{route('product.index')}}" class="nav-link active">
                  <i class="fa fa-black-tie nav-icon"></i>
                  <p>Rekap</p>
                </a>
                @endrole
              </li>

              <li class="nav-item">
                @role('member')
                <a href="{{route('custom.index')}}" class="nav-link active">
                  <i class="fa fa-black-tie nav-icon"></i>
                  <p>Custom</p>
                </a>
                @endrole
              </li>

               <li class="nav-item">
                @role('membercustom')
                <a href="{{route('customorder.index')}}" class="nav-link active">
                  <i class="fa fa-black-tie nav-icon"></i>
                  <p>Custom</p>
                </a>
                @endrole
              </li>

              <!-- <li class="nav-item">
                <a href="{{route('custom.index')}}" class="nav-link active">
                  <i class="fa fa-black-tie nav-icon"></i>
                  <p>Custom</p>
                </a>
              </li> -->

            </ul>
          </li>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>