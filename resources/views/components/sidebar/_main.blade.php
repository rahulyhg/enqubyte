@push('css')
    <!-- Our Custom CSS -->
    <link href="{{ asset('css/sidebar.css') }} " rel="stylesheet">
    <!-- Scrollbar Custom CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css" rel="stylesheet">
@endpush


        <!-- Sidebar  -->
        <nav id="sidebar" style="background-color: #343536;">
            <div class="sidebar-header" style="background-color: #343536;">
                <a href="/home">
                    <img src="{{ url('img/enque bite colours white.png') }}">
                </a>
            </div>

            <ul class="list-unstyled components">
                <li class="{{ request()->is('home') ? 'active' : ''}}">
                    <a href="/home">
                        <img src="{{ url('img/sidebar/icon/dashboard.png') }}" class="inactive-icon">
                        <img src="{{ url('img/sidebar/icon/dashboard-clr.png') }}" class="active-icon">
                        <span>{{ __('Dashboard') }}</span>
                    </a>
                </li>
               <!--  <li class="{{ request()->is('enquiries*') ? 'active' : ''}}">
                    <a href="/enquiries">
                        <img src="{{ url('img/sidebar/dashboard.png') }}" class="inactive-icon">
                        <img src="{{ url('img/sidebar/dashboard-clr.png') }}" class="active-icon">
                        <span>{{ __('Enquiries') }}</span>
                    </a>
                </li> -->
                <li>
                    <a href="#salesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle ">
                        <img src="{{ url('img/sidebar/icon/sale-black.png') }}" class="inactive-icon">
                        <img src="{{ url('img/sidebar/icon/sale.png') }}" class="active-icon">
                        <span>{{ __('Sales') }}</span>
                    </a>
                    <ul class="collapse list-unstyled {{ request()->is('enquiries*') || request()->is('sales*') || request()->is('purchases*') ? 'show' : ''}}" id="salesSubmenu">
                        <li class="{{ request()->is('enquiries*') ? 'active' : ''}}">
                            <a href="/enquiries">{{ __('Enquiries') }}</a>
                        </li>
                        <li class="{{ request()->is('sales*') ? 'active' : ''}}">
                            <a href="/sales/invoices">{{ __('Invoices') }}</a>
                        </li>
                        <li class="{{ request()->is('purchases*') ? 'active' : ''}}">
                            <a href="/purchases">{{ __('Purchase Bills') }}</a>
                        </li>
                    </ul>
                </li>

                @if(auth()->user()->mode)
                <li class="{{ request()->is('stores*') ? 'active' : ''}}">
                    <a href="/stores">
                        <img src="{{ url('img/sidebar/icon/sale.png') }}" class="inactive-icon">
                        <img src="{{ url('img/sidebar/icon/sales.png') }}" class="active-icon">
                        <span>{{ __('Stores') }}</span>
                    </a>
                </li>
                @endif
                <li>
                    <a href="#entitiesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <img src="{{ url('img/sidebar/icon/dashboard.png') }}" class="inactive-icon">
                        <img src="{{ url('img/sidebar/icon/dashboard-clr.png') }}" class="active-icon">
                        <span>{{ __('Entities') }}</span>
                    </a>
                    <ul class="collapse list-unstyled {{ request()->is('products*') || request()->is('employees*') || request()->is('vendors*') || request()->is('customers*') ? 'show' : ''}}" id="entitiesSubmenu">
                        <li class="{{ request()->is('products*') ? 'active' : ''}}">
                            <a href="/products">{{ __('Products') }}</a>
                        </li>
                        <li class="{{ request()->is('employees*') ? 'active' : ''}}">
                            <a href="/employees">{{ __('Employees') }}</a>
                        </li>
                        <li class="{{ request()->is('vendors*') ? 'active' : ''}}">
                            <a href="/vendors">{{ __('Vendors') }}</a>
                        </li>
                        <li class="{{ request()->is('customers*') ? 'active' : ''}}">
                            <a href="/customers">{{ __('Customers') }}</a>
                        </li>
                    </ul>
                </li>
                <!-- <li class="{{ request()->is('statements*') ? 'active' : ''}}">
                    <a href="#statementsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <img src="{{ url('img/sidebar/statement.png') }}" class="inactive-icon">
                        <img src="{{ url('img/sidebar/statement-clr.png') }}" class="active-icon">
                        <span>{{ __('Statements') }}</span>
                    </a>
                    <ul class="collapse list-unstyled" id="statementsSubmenu">
                        <li>
                            <a href="/statements/customer">{{ __('Customer') }}</a>
                        </li>
                        <li>
                            <a href="/statements/vendor">{{ __('Vendor') }}</a>
                        </li>
                        <li>
                            <a href="/statements/salesman">{{ __('Salesman Incentives') }}</a>
                        </li>
                    </ul>
                </li> -->
              <!--   <li class="{{ request()->is('products*') ? 'active' : ''}}">
                    <a href="/products">
                        <img src="{{ url('img/sidebar/products.png') }}" class="inactive-icon">
                        <img src="{{ url('img/sidebar/products-clr.png') }}" class="active-icon">
                        <span>{{ __('Products') }}</span>
                    </a>
                </li>
                <li class="{{ request()->is('employees*') ? 'active' : ''}}">
                    <a href="/employees">
                        <img src="{{ url('img/sidebar/employee.png') }}" class="inactive-icon">
                        <img src="{{ url('img/sidebar/employee-clr.png') }}" class="active-icon">
                        <span>{{ __('Employees') }}</span>
                    </a>
                </li> -->
                <li class="{{ request()->is('visitors*') ? 'active' : ''}}">
                    <a href="/visitors">
                        <img src="{{ url('img/sidebar/icon/visitor.png') }}" class="inactive-icon">
                        <img src="{{ url('img/sidebar/icon/vistors.png') }}" class="active-icon">
                        <span>{{ __('Visitors') }}</span>
                    </a>
                </li>
               <!--  <li class="{{ request()->is('customers*') ? 'active' : ''}}">
                    <a href="/customers">
                        <img src="{{ url('img/sidebar/employee.png') }}" class="inactive-icon">
                        <img src="{{ url('img/sidebar/employee-clr.png') }}" class="active-icon">
                        <span>{{ __('Customers') }}</span>
                    </a>
                </li> -->
                <li class="{{ request()->is('reports*') || request()->is('statements*') ? 'active' : ''}}">
                    <a href="/reports">
                        <img src="{{ url('img/sidebar/icon/progress-report.png') }}" class="inactive-icon">
                        <img src="{{ url('img/sidebar/icon/report.png') }}" class="active-icon">
                        <span>{{ __('Reports') }}</span>
                    </a>
                </li>
                <!-- <li class="{{ request()->is('settings*') ? 'active' : ''}}">
                    <a href="/settings">
                        <img src="{{ url('img/sidebar/settings.png') }}" class="inactive-icon">
                        <img src="{{ url('img/sidebar/settings-clr.png') }}" class="active-icon">
                        <span>{{ __('Settings') }}</span>
                    </a>
                </li> -->
                <li>
                    <a href="#settingsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <img src="{{ url('img/sidebar/icon/settings-gears.png') }}" class="inactive-icon">
                        <img src="{{ url('img/sidebar/icon/settings-gears1.png') }}" class="active-icon">
                        <span>{{ __('Settings') }}</span>
                    </a>
                    <ul class="collapse list-unstyled {{ request()->is('settings*') || request()->is('taxes*') || request()->is('incentives*') ? 'show' : ''}}" id="settingsSubmenu">
                        <li class="{{ request()->is('settings*') ? 'active' : ''}}">
                            <a href="/settings">{{ __('App') }}</a>
                        </li>
                        <li class="{{ request()->is('taxes*') ? 'active' : ''}}">
                            <a href="/taxes">{{ __('Taxes') }}</a>
                        </li>
                        <li class="{{ request()->is('incentives*') ? 'active' : ''}}">
                            <a href="/incentives">{{ __('Incentives') }}</a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        <img src="{{ url('img/sidebar/icon/logout1.png') }}" class="inactive-icon">
                        <img src="{{ url('img/sidebar/icon/logout.png') }}" class="active-icon">
                        <span>{{ __('Logout') }}</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
            <!-- <ul class="social-links">
                <li>
                    <a href="javascript:;">
                        <img src="{{ url('img/sidebar/icon/facebook.png') }}" class="inactive-icon">
                        <img src="{{ url('img/sidebar/icon/facebook-white.png') }}" class="active-icon">
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <img src="{{ url('img/sidebar/icon/instagram.png') }}" class="inactive-icon">
                        <img src="{{ url('img/sidebar/icon/instagram-white.png') }}" class="active-icon">
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <img src="{{ url('img/sidebar/icon/twitter.png') }}" class="inactive-icon">
                        <img src="{{ url('img/sidebar/icon/twitter-white.png') }}" class="active-icon">
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <img src="{{ url('img/sidebar/icon/linked.png') }}" class="inactive-icon">
                        <img src="{{ url('img/sidebar/icon/linked-white.png') }}" class="active-icon">
                    </a>
                </li>
            </ul> -->
        </nav>
        <nav id="sidebars">
            <div class="sidebar-header">
                <a href="/home">
                <img src="{{ url('/img/enque bite colours white.png') }}">
            </a>
            <div id="dismiss">
                <svg class="svg-inline--fa fa-arrow-left fa-w-14" aria-hidden="true" data-prefix="fas" data-icon="arrow-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z"></path></svg><!-- <i class="fas fa-arrow-left"></i> -->
            </div>
            </div>

            <ul class="list-unstyled components">
                <li class="{{ request()->is('home') ? 'active' : ''}}">
                    <a href="/home">
                        <img src="{{ url('/img/sidebar/icon/dashboard.png') }}" class="inactive-icon">
                        <img src="{{ url('/img/sidebar/icon/dashboard-clr.png') }}" class="active-icon">
                        <span>{{ __('Dashboard') }}</span>
                    </a>
                </li>
                <li>
                    <a href="#mobileSalesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle ">
                        <img src="{{ url('img/sidebar/icon/sale-black.png') }}" class="inactive-icon">
                        <img src="{{ url('img/sidebar/icon/sale.png') }}" class="active-icon">
                        <span>{{ __('Sales') }}</span>
                    </a>
                    <ul class="collapse list-unstyled  {{ request()->is('enquiries*') || request()->is('sales*') || request()->is('purchases*') ? 'show' : ''}}" id="mobileSalesSubmenu">
                        <li class="{{ request()->is('enquiries*') ? 'active' : ''}}">
                            <a href="/enquiries">{{ __('Enquiries') }}</a>
                        </li>
                        <li class="{{ request()->is('sales*') ? 'active' : ''}}">
                            <a href="/sales/invoices">{{ __('Invoices') }}</a>
                        </li>
                        <li class="{{ request()->is('purchases*') ? 'active' : ''}}">
                            <a href="/purchases">{{ __('Purchase Orders') }}</a>
                        </li>

                    </ul>
                </li>

                @if(auth()->user()->mode)
                <li class="{{ request()->is('stores*') ? 'active' : ''}}">
                    <a href="/stores">
                        <img src="{{ url('img/sidebar/icon/sale.png') }}" class="inactive-icon">
                        <img src="{{ url('img/sidebar/icon/sales.png') }}" class="active-icon">
                        <span>{{ __('Stores') }}</span>
                    </a>
                </li>
                @endif
                <li>
                    <a href="#mobileEntitiesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <img src="{{ url('img/sidebar/icon/dashboard.png') }}" class="inactive-icon">
                        <img src="{{ url('img/sidebar/icon/dashboard-clr.png') }}" class="active-icon">
                        <span>{{ __('Entities') }}</span>
                    </a>
                    <ul class="collapse list-unstyled {{ request()->is('products*') || request()->is('employees*') || request()->is('vendors*') || request()->is('customers*') ? 'show' : ''}}" id="mobileEntitiesSubmenu">
                        <li class="{{ request()->is('products*') ? 'active' : ''}}">
                            <a href="/products">{{ __('Products') }}</a>
                        </li>
                        <li class="{{ request()->is('employees*') ? 'active' : ''}}">
                            <a href="/employees">{{ __('Employees') }}</a>
                        </li>
                        <li class="{{ request()->is('vendors*') ? 'active' : ''}}">
                            <a href="/vendors">{{ __('Vendors') }}</a>
                        </li>
                        <li class="{{ request()->is('customers*') ? 'active' : ''}}">
                            <a href="/customers">{{ __('Customers') }}</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ request()->is('visitors*') ? 'active' : ''}}">
                    <a href="/visitors">
                        <img src="{{ url('img/sidebar/icon/visitor.png') }}" class="inactive-icon">
                        <img src="{{ url('img/sidebar/icon/vistors.png') }}" class="active-icon">
                        <span>{{ __('Visitors') }}</span>
                    </a>
                </li>
                <li class="{{ request()->is('reports*') ? 'active' : ''}}">
                    <a href="/reports">
                        <img src="{{ url('img/sidebar/icon/progress-report.png') }}" class="inactive-icon">
                        <img src="{{ url('img/sidebar/icon/report.png') }}" class="active-icon">
                        <span>{{ __('Reports') }}</span>
                    </a>
                </li>
                <li>
                    <a href="#mobileSettingsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <img src="{{ url('img/sidebar/icon/settings-gears.png') }}" class="inactive-icon">
                        <img src="{{ url('img/sidebar/icon/settings-gears1.png') }}" class="active-icon">
                        <span>{{ __('Settings') }}</span>
                    </a>
                    <ul class="collapse list-unstyled  {{ request()->is('settings*') || request()->is('taxes*') || request()->is('incentives*') ? 'show' : ''}}" id="mobileSettingsSubmenu">
                        <li class="{{ request()->is('settings*') ? 'active' : ''}}">
                            <a href="/settings">{{ __('General') }}</a>
                        </li>
                        <li class="{{ request()->is('taxes*') ? 'active' : ''}}">
                            <a href="/taxes">{{ __('Taxes') }}</a>
                        </li>
                        <li class="{{ request()->is('incentives*') ? 'active' : ''}}">
                            <a href="/incentives">{{ __('Payout & Incentives') }}</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        <img src="{{ url('/img/sidebar/icon/logout1.png') }}" class="inactive-icon">
                        <img src="{{ url('/img/sidebar/icon/logout.png') }}" class="active-icon">
                        <span>{{ __('Logout') }}</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
         <div class="overlay"></div>
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
@endpush