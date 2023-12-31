<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link"  href="{{url('/admin/home')}}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">DashBoard</span>
        </a>
      </li>
      <li class="nav-item">
            <a class="nav-link" href="{{ route('category') }}">
              <i class="mdi mdi-emoticon menu-icon"></i>
              <span class="menu-title">Category</span>
            </a>
          </li>
          
      <li class="nav-item">
        <a class="nav-link"  href="{{ route('book') }}">
                <i class="mdi mdi-emoticon menu-icon"></i>
          <span class="menu-title">Books</span>
          {{-- <i class="menu-arrow"></i> --}}
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="{{ route('author') }}">
                <i class="mdi mdi-emoticon menu-icon"></i>
          <span class="menu-title">Authors</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="{{ route('slider') }}">
                <i class="mdi mdi-emoticon menu-icon"></i>
          <span class="menu-title">Slider</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="{{route('orderList')}}">
                <i class="mdi mdi-emoticon menu-icon"></i>
          <span class="menu-title">Order List</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link"  href="{{ route('user') }}" >
          <i class="mdi mdi-account menu-icon"></i>
          <span class="menu-title">User Pages</span>
          {{-- <i class="menu-arrow"></i> --}}
        </a>
       
      </li>
      
      <li class="nav-item">
       
        <a class="nav-link" href="{{ route('roles') }}">
         
          <i class="mdi mdi-file-document-box-outline menu-icon"></i>
          <span class="menu-title">Roles and Permission </span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="{{ route('permissions') }}">
          <i class="mdi mdi-file-document-box-outline menu-icon"></i>
          <span class="menu-title">Permissions </span>
        </a>
      </li>
     
    </ul>
  </nav>