<nav class="main-nav">
              <ul class="menu sf-arrows">
                <li class="megamenu-container {{ request()->routeIs('homepage') ? 'active' : '' }}">
                  <a href="{{ route('homepage') }}" class="sf-with-ul">Home</a>
                </li>
                <li class="megamenu-container {{ request()->routeIs('customer.shop') ||request()->routeIs('customer.getProducts') ? 'active' : '' }}">
                  <a href="{{ route('customer.shop') }}" class="sf-with-ul">Shop</a>
                </li>
                <li class="megamenu-container {{ request()->routeIs('customer.gallery') ? 'active' : '' }}">
                  <a href="{{ route('customer.gallery') }}" class="sf-with-ul">Gallery</a>
                </li>

                <li class="megamenu-container {{ request()->routeIs('customer.announcements') ? 'active' : '' }}">
                  <a href="{{ route('announcements') }}" class="sf-with-ul">Announcement</a>
                </li>
                <li class="megamenu-container {{ request()->routeIs('customer.about') ? 'active' : '' }}">
                  <a href="{{ route('about') }}" class="sf-with-ul">About</a>
                </li>
                <li class="megamenu-container {{ request()->routeIs('customer.contact') ? 'active' : '' }}">
                  <a href="{{ route('contact') }}" class="sf-with-ul">Contact</a>
                </li>
              </ul>

              <!-- End .menu -->
            </nav>
            <!-- End .main-nav -->