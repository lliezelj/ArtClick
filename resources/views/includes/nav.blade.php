<nav class="main-nav">
              <ul class="menu sf-arrows">
                <li class="megamenu-container {{ request()->routeIs('homepage') ? 'active' : '' }}">
                  <a href="{{ route('homepage') }}" class="sf-with-ul">Home</a>
                </li>
                <li class="megamenu-container {{ request()->routeIs('customer.shop') ||request()->routeIs('customer.getProducts') ? 'active' : '' }}">
                  <a href="{{ route('customer.shop') }}" class="sf-with-ul">Shop</a>
                </li>
                <li>
                  <a href="{{ route('gallery') }}" class="sf-with-ul">Gallery</a>
                </li>

                <li>
                  <a href="{{ route('announcement') }}" class="sf-with-ul">Announcement</a>
                </li>
                <li>
                  <a href="{{ route('about') }}" class="sf-with-ul">About</a>
                </li>
                <li>
                  <a href="{{ route('contact') }}" class="sf-with-ul">Contact</a>
                </li>
              </ul>

              <!-- End .menu -->
            </nav>
            <!-- End .main-nav -->