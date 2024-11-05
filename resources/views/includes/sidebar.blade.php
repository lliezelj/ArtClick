<div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                    <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <a href="{{ route('admin.dashboard') }}">
                                <img src="{{ asset('manager/img/icons/dashboard.svg') }}" alt="img">
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{ asset('manager/img/icons/product.svg') }}" alt="img"><span>
                                    Items</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{route('admin.category')}}" class="{{ request()->routeIs('admin.category') ? 'active' : '' }}">Items List</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{ asset('manager/img/icons/quotation1.svg') }}" alt="img"><span>
                                    Inventory</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{route('admin.inventory')}}" class="{{ request()->routeIs('admin.inventory') ? 'active' : '' }}">Inventory list</a></li>
                                <li><a href="{{route('admin.restock')}}" class="{{ request()->routeIs('admin.restock') ? 'active' : '' }}">Restocking History</a></li>
                                
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{ asset('manager/img/icons/sales1.svg') }}" alt="img"><span>
                                    Orders</span> <span class="menu-arrow"></span></a>

                            <ul>
                                <li><a href="{{route('admin.orderDateIndex')}}"  class="{{ request()->routeIs('admin.orderDateIndex') ? 'active' : '' }}">Orders Dates</a></li>
                                <li><a href="{{route('admin.orders')}}"  class="{{ request()->routeIs('admin.orders') ? 'active' : '' }}">Orders List</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{ asset('manager/img/icons/expense1.svg') }}" alt="img"><span>
                                    Expense</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{route('admin.expenses')}}" class="{{ request()->routeIs('admin.expenses') ? 'active' : '' }}">Expense List</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{ asset('manager/img/icons/time.svg') }}" alt="img"><span>
                                    Sales</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{route('admin.dailySales')}}" class="{{ request()->routeIs('admin.dailySales') ? 'active' : '' }}">Daily Sales</a></li>
                                <li><a href="{{route('monthly.sales')}}" class="{{ request()->routeIs('monthly.sales') ? 'active' : '' }}">Monthly Sales </a></li>
                                <li><a href="{{route('annual.sales')}}" class="{{ request()->routeIs('annual.sales') ? 'active' : '' }}">Annually Sales</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i data-feather="award"></i><span> Artist </span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{route('admin.artist')}}" class="{{ request()->routeIs('admin.artist') ? 'active' : '' }}" >Artist List </a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{ asset('manager/img/icons/purchase1.svg') }}" alt="img"><span>
                                    Announcements</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{route('admin.announcement')}}" class="{{ request()->routeIs('admin.announcement') ? 'active' : '' }}" >Announcement List</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{ asset('manager/img/icons/users1.svg') }}" alt="img"><span>
                                    Users</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{route('view.users')}}" class="{{ request()->routeIs('view.users') ? 'active' : '' }}">Users List</a></li>
                            </ul>
                        </li>
                </div>
            </div>
        </div>