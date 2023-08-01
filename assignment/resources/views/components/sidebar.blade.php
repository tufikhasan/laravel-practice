@php
    $route = Route::current()->getName();
@endphp
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="{{ 'dashboard' == $route ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}"><img src="{{ asset('assets/img/icons/dashboard.svg') }}"
                            alt="img"><span>
                            Dashboard</span> </a>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/users1.svg') }}"
                            class="{{ in_array($route, ['customer.page']) ? 'active' : '' }}" alt="img"><span>
                            Customers</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class="{{ 'customer.page' == $route ? 'active' : '' }}"
                                href="{{ route('customer.page') }}">Customer List</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/mail.svg') }}"
                            class="{{ in_array($route, ['promotion.page']) ? 'active' : '' }}" alt="img"><span>
                            Promotions</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class="{{ 'promotion.page' == $route ? 'active' : '' }}"
                                href="{{ route('promotion.page') }}">Promotional Mail</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
