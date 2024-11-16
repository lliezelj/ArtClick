<nav class="main-nav">
              <ul class="menu sf-arrows">
                @if(Auth::user())
                <li class="megamenu-container {{ request()->routeIs('homepage') ? 'active' : '' }}">
                  <a href="{{ route('homepage') }}" class="sf-with-ul">Home</a>
                </li>
                @else
                <li class="megamenu-container {{ request()->routeIs('customer.landingpage') ? 'active' : '' }}">
                  <a href="{{ route('customer.landingpage') }}" class="sf-with-ul">Home</a>
                </li>
                @endif
                <li class="megamenu-container {{ request()->routeIs('customer.shop') || request()->routeIs('customer.getProducts') ? 'active' : '' }}">
                  <a href="{{ route('customer.shop') }}" class="sf-with-ul">Shop</a>
                </li>
                <li class="megamenu-container {{ request()->routeIs('customer.gallery') ? 'active' : '' }}">
                  <a href="{{ route('customer.gallery') }}" class="sf-with-ul">Gallery</a>
                </li>

                <li class="megamenu-container {{ request()->routeIs('announcements') ? 'active' : '' }}">
                  <a href="{{ route('announcements') }}" class="sf-with-ul">Announcement</a>
                </li>
                <li class="megamenu-container {{ request()->routeIs('about') ? 'active' : '' }}">
                  <a href="{{ route('about') }}" class="sf-with-ul">About</a>
                </li>
                <li class="megamenu-container {{ request()->routeIs('contact') ? 'active' : '' }}">
                  <a href="{{ route('contact') }}" class="sf-with-ul">Contact</a>
                </li>
              </ul>

              <!-- End .menu -->
            </nav>
            <!-- End .main-nav -->