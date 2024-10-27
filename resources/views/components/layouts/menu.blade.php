<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Finanzas</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}">
                <a href="home" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Escritorio</div>
                </a>
            </li>

            <li class="menu-item {{ request()->routeIs('categorias') ? 'active' : '' }}">
                <a href="categorias" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Categorias</div>
                </a>
            </li>

            <li class="menu-item {{ request()->routeIs('ingresos') ? 'active' : '' }}">
                <a href="ingresos" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Ingresos</div>
                </a>
            </li>

            <li class="menu-item {{ request()->routeIs('egresos') ? 'active' : '' }}">
                <a href="egresos" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Egresos</div>
                </a>
            </li>


            <li class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}">
                <a href="home" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Reporte de Ingresos</div>
                </a>
            </li>

            <li class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}">
                <a href="home" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Reporte de egresos</div>
                </a>
            </li>

            <li class="menu-item">
                <form method="POST" action="{{ route('logout') }}" class="menu-link">
                    @csrf
                    <button type="submit" class="menu-link" style="background: none; border: none; padding: 0;">
                        <i class="menu-icon tf-icons bx bx-log-out"></i>
                        <div data-i18n="Logout">Cerrar Sesión</div>
                    </button>
                </form>
            </li>

    </ul>
</aside>
<!-- / Menu -->
