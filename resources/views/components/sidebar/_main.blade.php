@push('css')
    <!-- Our Custom CSS -->
    <link href="{{ asset('css/sidebar.css') }} " rel="stylesheet">
    <!-- Scrollbar Custom CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css" rel="stylesheet">
@endpush


        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <a href="/home">
                <img src="{{ url('img/logo.png') }}">
            </a>
            </div>

            <ul class="list-unstyled components">
                <li class="{{ request()->is('home') ? 'active' : ''}}">
                    <a href="/home">
                        <img src="{{ url('img/sidebar/dashboard.png') }}" class="inactive-icon">
                        <img src="{{ url('img/sidebar/dashboard-clr.png') }}" class="active-icon">
                        <span>{{ __('Dashboard') }}</span>
                    </a>
                </li>
                @if(auth()->user()->mode)
                <li class="{{ request()->is('stores*') ? 'active' : ''}}">
                    <a href="/stores">
                        <img src="{{ url('img/sidebar/stores.png') }}" class="inactive-icon">
                        <img src="{{ url('img/sidebar/stores-clr.png') }}" class="active-icon">
                        <span>{{ __('Stores') }}</span>
                    </a>
                </li>
                @endif
                <li class="{{ request()->is('products*') ? 'active' : ''}}">
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
                </li>
                <li class="{{ request()->is('visitors*') ? 'active' : ''}}">
                    <a href="/visitors">
                        <img src="{{ url('img/sidebar/employee.png') }}" class="inactive-icon">
                        <img src="{{ url('img/sidebar/employee-clr.png') }}" class="active-icon">
                        <span>{{ __('Visitors') }}</span>
                    </a>
                </li>
                <li class="{{ request()->is('customers*') ? 'active' : ''}}">
                    <a href="/customers">
                        <img src="{{ url('img/sidebar/employee.png') }}" class="inactive-icon">
                        <img src="{{ url('img/sidebar/employee-clr.png') }}" class="active-icon">
                        <span>{{ __('Customers') }}</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ url('img/sidebar/reports.png') }}" class="inactive-icon">
                        <img src="{{ url('img/sidebar/reports-clr.png') }}" class="active-icon">
                        <span>{{ __('Reports') }}</span>
                    </a>
                </li>
                <li class="{{ request()->is('settings*') ? 'active' : ''}}">
                    <a href="/settings">
                        <img src="{{ url('img/sidebar/settings.png') }}" class="inactive-icon">
                        <img src="{{ url('img/sidebar/settings-clr.png') }}" class="active-icon">
                        <span>{{ __('Settings') }}</span>
                    </a>
                </li>

                <!-- <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Home 1</a>
                        </li>
                        <li>
                            <a href="#">Home 2</a>
                        </li>
                        <li>
                            <a href="#">Home 3</a>
                        </li>
                    </ul>
                </li> -->

                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        <img src="{{ url('img/sidebar/logout.png') }}" class="inactive-icon">
                        <img src="{{ url('img/sidebar/logout-clr.png') }}" class="active-icon">
                        <span>{{ __('Logout') }}</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
            <ul class="social-links">
                <li>
                    <a href="javascript:;">
                        <img src="{{ url('img/sidebar/facebook.png') }}" class="inactive-icon">
                        <img src="{{ url('img/sidebar/facebook-clr.png') }}" class="active-icon">
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <img src="{{ url('img/sidebar/instagram.png') }}" class="inactive-icon">
                        <img src="{{ url('img/sidebar/instagram-clr.png') }}" class="active-icon">
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <img src="{{ url('img/sidebar/twitter.png') }}" class="inactive-icon">
                        <img src="{{ url('img/sidebar/twitter-clr.png') }}" class="active-icon">
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <img src="{{ url('img/sidebar/linkedin.png') }}" class="inactive-icon">
                        <img src="{{ url('img/sidebar/linkedin-clr.png') }}" class="active-icon">
                    </a>
                </li>
            </ul>
        </nav>
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
@endpush