<button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>

            <form action="{{route('search')}}" method="get" class="mobile-search">
                <label for="mobile-search" class="sr-only">Search</label>
                <input type="search" name="search" class="form-control" name="mobile-search" id="mobile-search"
                    placeholder="Search in..." required>
                <button name="submit" class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
            </form>

            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li>
                        <a href="{{route('homepage')}}">Home</a>
                    </li>
                    <li class="{{ request()->routeIs('customer.shop') ? 'active' : '' }}">
                        <a href="{{route('customer.shop')}}">Shop</a>
                    </li>

                    <li class="{{ request()->routeIs('customer.gallery') ? 'active' : '' }}">
                        <a href="{{route('customer.gallery')}}">Gallery</a>
                    </li>
                    <li class="{{ request()->routeIs('announcements') ? 'active' : '' }}">
                        <a href="{{route('announcements')}}">Announcements</a>
                    </li>

                    <li class="{{ request()->routeIs('about') ? 'active' : '' }}">
                        <a href="{{route('about')}}">About</a>

                    </li>
                    <li class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                        <a href="{{route('contact')}}">Contact</a>

                    </li>
                </ul>
            </nav><!-- End .mobile-nav -->

            <div class="social-icons">
                <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->