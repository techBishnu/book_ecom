
<nav class="navbar navbar-expand-lg navbar-light bg-secondary">
        <div class="container-fluid">
          <a class="navbar-brand text-white " href="{{ route('index') }}"><strong>Library Management System</strong> </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-3 mb-lg-0">
                <form class="d-flex" action="{{ route('search_book') }}" method="post">
                    @csrf
                    <input class="form-control me-2 " type="search" style="width:100%" required name="search" id="search" placeholder="Search Book " aria-label="Search">
                    <button class="btn btn-gray btn-sm" type="submit" >search</button>
                  </form>
              <li class="nav-item">
                <a class="nav-link active  text-white"  aria-current="page" href="{{ route('books') }}">Books</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white" href="{{ route('new_arrival') }}"> New Arrival Book</a>
              </li>
              <li class="nav-item ">
                  <a class="nav-link text-white" href="{{ route('best_selling') }}"> Best Selling Book</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-white" href="{{ route('trendingBook') }}">Trending Book</a>
                  </li>
  
           @php
               $cartCount=0;
               $cart=session()->get('cart',[]);
               foreach($cart as $id=>$item){
                 $cartCount ++;
               }
           @endphp 
                <a class="nav-link text-white " href="{{ route('getcart') }}"> 
                  <i class="fa fa-shopping-cart"></i><span class="badge">{{ $cartCount }}</span>
                    </a>
              
          
            @guest
            @if (Route::has('login'))
                
                    <a class="nav-link text-white flex-end btn "  href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i></a>
              
            @endif

            @if (Route::has('register'))
                    <a class="nav-link text-white 
                    " href="{{ route('register') }}">Sign Up</i></a>
            @endif
        @else
            {{-- <li class="nav-item dropdown"> --}}
                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="nav-link text-black" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <a class="btn" href="{{ route('userProfile') }}">Profile</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none ">
                        @csrf
                    </form>
                </div>
            {{-- </li> --}}
        @endguest
        </div>
            <a class="nav-link text-white" href="{{ route('aboutUs') }}">About Us</a>
      </ul>
            
            
          </div>
        </div>
      </nav>