 
<div class="content">

 <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->
   

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
        <div class="info">
          <a href="#" class="d-block"> Management</a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('user')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Management</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="{{url('welcome')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Main Deshboard</p>
                </a>
              </li>
              
            </ul>

          <li class="nav-header">Action</li>
          <li class="nav-item">
            
               <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                      <i class="nav-icon far fa-circle text-danger"></i>   
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>  
                                    

                    
                                                        
          </li>
        </ul>
      
         
            
          
         
       
         
         
          
      
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  </div>