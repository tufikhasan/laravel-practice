<div id="sideNavRef" class="side-nav-open">
    <a href="{{ route('dashboard') }}" class="side-bar-item @if (request()->routeIs('dashboard')) active @endif">
        <i class="bi bi-graph-up"></i>
        <span class="side-bar-item-caption">Dashboard</span>
    </a>
    <a href="{{ route('product') }}" class="side-bar-item @if (request()->routeIs('product')) active @endif">
        <i class="bi bi-people"></i>
        <span class="side-bar-item-caption">Products</span>
    </a>
    <a href="javascript:void(0)" class="side-bar-item">
        <i class="bi bi-people"></i>
        <span class="side-bar-item-caption">Menu Item</span>
    </a>
</div>
