<aside id="sidebar" data-sidebar>
    <div class="sidebar-title">
        <!-- User avatar and welcome -->
        @auth
            <div class="user-welcome">
                <div class="user-avatar">
                    <!-- Include the user's avatar image or use a default image -->
                    @if(Auth::user()->profile_picture)
    <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="User Avatar">
@else
    <img src="{{ asset('assets/images/user-avatar.png') }}" alt="User Avatar">
@endif

                </div>
                <div class="user-info">
                    <span class="user-name">{{ Auth::user()->name }}</span>
                    <span class="user-email">{{ Auth::user()->email }}</span>
                </div>
            </div>
        @endauth
        <span class="icon material-icons-outlined" onclick="closeSidebar()">close</span>
    </div>
        
        <ul class="sidebar-list">
            <li class="sidebar-list-item">
                <a href="{{ route('home.dashboard') }}">
                    <span class="material-icons-outlined">dashboard</span> Dashboard
                </a>
            </li>            
          <li class="sidebar-list-item">
            <a href="../pages/watchlist.html">
              <span class="material-icons-outlined">favorite</span> Watchlist
            </a>
          </li>
          <li class="sidebar-list-item">
              <a href="../pages/messages.html">
                <span class="material-icons-outlined">trending_up</span> Prediction System
              </a>
            </li>
          <li class="sidebar-list-item">
            <a href="../pages/messages.html">
              <span class="material-icons-outlined">chat</span> Chat
            </a>
          </li>
          <li class="sidebar-list-item">
              <a href="{{ route('home.settings') }}">
                <span class="material-icons-outlined">settings</span> Settings
              </a>
            </li>
          <li class="sidebar-list-item logout-item">
            <form action="{{route('logout')}}" method="POST">
              @csrf
              <button ><span class="material-icons-outlined">logout</span> Logout</button>
            </form>
          </li>
        </ul>
</aside>