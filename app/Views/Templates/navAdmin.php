<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?= media()?>/images/uploads/avatar.png" alt="User Image">
        <div>
            <p class="app-sidebar__user-name">Edwin Acuña</p>
            <p class="app-sidebar__user-designation">Administrador</p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item" href="<?=baseUrl();?>/dashboard">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>

        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-user" aria-hidden="true"></i>
                <span class="app-menu__label">Usuarios</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>

            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="<?=baseUrl();?>/users"><i class="icon fa fa-circle-o"></i> Crear Usuario</a>
                </li>
                <li>
                    <a class="treeview-item" href="<?=baseUrl();?>/users" target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i> Usuarios</a>
                </li>
                <li>
                    <a class="treeview-item" href="<?=baseUrl();?>/roles"><i class="icon fa fa-circle-o"></i> Roles</a>
                </li>
                <li><a class="treeview-item" href="<?=baseUrl();?>/permissions"><i class="icon fa fa-circle-o"></i> Permisos</a></li>
            </ul>
        </li>

        <li>
            <a class="app-menu__item" href="<?= baseUrl();?>/customers">
                <i class=" app-menu__icon fa fa-users" aria-hidden="true"></i>
                <span class="app-menu__label">Clientes</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item" href="<?= baseUrl();?>/products">
                <i class="app-menu__icon fa fa-shopping-basket" aria-hidden="true"></i>
                <span class="app-menu__label">Productos</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item" href="<?= baseUrl();?>/orders">
                <i class="app-menu__icon fa fa-cart-arrow-down" aria-hidden="true"></i>
                <span class="app-menu__label">Pedidos</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item" href="<?= baseUrl();?>/logout">
                <i class="app-menu__icon fa fa-sign-out" aria-hidden="true"></i>
                <span class="app-menu__label">Cerrar sesión</span>
            </a>
        </li>
    </ul>
</aside>