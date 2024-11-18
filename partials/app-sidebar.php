<?php
    $user = $_SESSION['user'];
?>

<div class="dashboard_sidebar" id="dashboard_sidebar">
    <h3 class="dashboard_logo" id="dashboard_logo">IMS</h3>
    <div class="dashboard_sidebar_user">
        <img src="images/user/userProfileImage.jpeg" alt="user image" id="userImage" />
        <span><?= $user['first_name'] . ' ' . $user['last_name'] ?></span>
    </div>
    <div class="dashboard_sidebar_menus">
        <ul class="dashboard_menu_lists">
            <!-- class="menuActive" -->
            <li class="liMainMenu">
                <a href="./dashboard.php"><i class="fa fa-dashboard"></i> <span class="menuText">Panel Inicio</span></a>
            </li>

            <li class="liMainMenu">
                <a href="javascript:void(0);" class="showHideSubMenu">
                        <i class="fa fa-sitemap showHideSubMenu"></i>
                        <span class="menuText showHideSubMenu">Gestión de Administración</span>
                        <i class="fa fa-angle-left mainMenuIconArrow showHideSubMenu"></i>
                </a>
                <ul class="subMenus">
                    <li><a class="subMenuLink" href="./buyorders.php"><i class="fa fa-circle-o"></i> Órdenes de Compra</a></li>
                    <li><a class="subMenuLink" href="./suppliers.php"><i class="fa fa-circle-o"></i> Proveedores</a></li>
                    <li><a class="subMenuLink" href="./delivery-notes.php"><i class="fa fa-circle-o"></i> Remitos</a></li>
                    <li><a class="subMenuLink" href="./invoices.php"><i class="fa fa-circle-o"></i> Facturas</a></li>
                </ul>
            </li>

            <li class="liMainMenu">
                <a href="javascript:void(0);" class="showHideSubMenu">
                        <i class="fa fa-briefcase showHideSubMenu"></i>
                        <span class="menuText showHideSubMenu">Gestión Comercial</span>
                        <i class="fa fa-angle-left mainMenuIconArrow showHideSubMenu"></i>
                </a>
                <ul class="subMenus">
                    <li><a class="subMenuLink" href="./quotes.php"><i class="fa fa-circle-o"></i> Cotizaciones</a></li>
                    <li><a class="subMenuLink" href="./workorders.php"><i class="fa fa-circle-o"></i> Órdenes de Trabajo</a></li>
                    <li><a class="subMenuLink" href="./clients.php"><i class="fa fa-circle-o"></i> Clientes</a></li>
                    <li><a class="subMenuLink" href="./products.php"><i class="fa fa-circle-o"></i> Productos</a></li>
                    <li><a class="subMenuLink" href="./costs.php"><i class="fa fa-circle-o"></i> Costos</a></li>
                </ul>
            </li>

            <li class="liMainMenu">
                <a href="javascript:void(0);" class="showHideSubMenu">
                        <i class="fa fa-cogs showHideSubMenu"></i>
                        <span class="menuText showHideSubMenu">Gestión de Ingeniería</span>
                        <i class="fa fa-angle-left mainMenuIconArrow showHideSubMenu"></i>
                </a>
                <ul class="subMenus">
                    <li><a class="subMenuLink" href=""><i class="fa fa-circle-o"></i> Ensayos</a></li>
                    <li><a class="subMenuLink" href=""><i class="fa fa-circle-o"></i> Documentación Técnica</a></li>
                </ul>
            </li>

            <li class="liMainMenu">
                <a href="javascript:void(0);" class="showHideSubMenu">
                        <i class="fa fa-industry showHideSubMenu"></i>
                        <span class="menuText showHideSubMenu">Gestión de Producción</span>
                        <i class="fa fa-angle-left mainMenuIconArrow showHideSubMenu"></i>
                </a>
                <ul class="subMenus">
                    <li><a class="subMenuLink" href="./production-orders.php"><i class="fa fa-circle-o"></i> Órdenes de Producción</a></li>
                    <li><a class="subMenuLink" href="./packing-lists.php"><i class="fa fa-circle-o"></i> Packing Lists</a></li>
                    <li><a class="subMenuLink" href="./transports.php"><i class="fa fa-circle-o"></i> Transportes</a></li>
                    <li><a class="subMenuLink" href="./stock.php"><i class="fa fa-circle-o"></i> Stock</a></li>
                </ul>
            </li>

            <li class="liMainMenu showHideSubMenu">
                <a href="javascript:void(0);" class="showHideSubMenu">
                    <i class="fa fa-users showHideSubMenu"></i>
                    <span class="menuText showHideSubMenu">Usuarios</span>
                    <i class="fa fa-angle-left mainMenuIconArrow showHideSubMenu"></i>
                </a>
                <ul class="subMenus">
                    <li><a class="subMenuLink" href="./users-view.php"><i class="fa fa-circle-o"></i> Lista de Usuarios</a></li>
                    <li><a class="subMenuLink" href="./users-add.php"><i class="fa fa-circle-o"></i> Añadir Usuario</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>











            <!-- <li class="liMainMenu">
                <a href="./report.php"><i class="fa fa-file"></i> <span class="menuText">Reports</span></a>
            </li> -->


            <!-- <li class="liMainMenu">
            <a href="javascript:void(0);" class="showHideSubMenu">
                    <i class="fa fa-tag showHideSubMenu"></i>
                    <span class="menuText showHideSubMenu">Product Management</span>
                    <i class="fa fa-angle-left mainMenuIconArrow showHideSubMenu"></i>
                </a>
                <ul class="subMenus">
                    <li><a class="subMenuLink" href="./product-view.php"><i class="fa fa-circle-o"></i> View Products</a></li>
                    <li><a class="subMenuLink" href="./product-add.php"><i class="fa fa-circle-o"></i> Add Product</a></li>
                </ul>
            </li> -->



            <!-- <li class="liMainMenu">
                <a href="javascript:void(0);" class="showHideSubMenu">
                    <i class="fa fa-truck showHideSubMenu"></i>
                    <span class="menuText showHideSubMenu">Supplier Management</span>
                    <i class="fa fa-angle-left mainMenuIconArrow showHideSubMenu"></i>
                </a>
                <ul class="subMenus">
                    <li><a class="subMenuLink" href="./suppliers-view.php"><i class="fa fa-circle-o"></i> View Suppliers</a></li>
                    <li><a class="subMenuLink" href="./suppliers-add.php"><i class="fa fa-circle-o"></i> Add Supplier</a></li>
                </ul>
            </li> -->

            <!-- <li class="liMainMenu">
                <a href="javascript:void(0);" class="showHideSubMenu">
                    <i class="fa fa-shopping-cart showHideSubMenu"></i>
                    <span class="menuText showHideSubMenu">Purchase Order</span>
                    <i class="fa fa-angle-left mainMenuIconArrow showHideSubMenu"></i>
                </a>
                <ul class="subMenus">
                    <li><a class="subMenuLink" href="./product-order.php"> <i class="fa fa-circle-o"></i> Create Order</a></li>
                    <li><a class="subMenuLink" href="./view-order.php"> <i class="fa fa-circle-o"></i> View Orders</a></li>
                </ul>
            </li> -->