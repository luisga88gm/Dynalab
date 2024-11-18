<?php
    //Start the session.
    session_start();
    if(!isset($_SESSION['user'])) header('location: login.php');
    $_SESSION['table'] = 'suppliers';
    $user = $_SESSION['user'];
    $show_table = 'suppliers';
    $suppliers = include('database/show.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Proveedores - ERP Dynalab SRL</title>
    <?php include('partials/app-header-scripts.php'); ?>
</head>
<body>
    <div id="dashboardMainContainer">
        <?php include('partials/app-sidebar.php') ?>
        <div class="dashboard_content_container" id="dashboard_content_container">
            <?php include('partials/app-topnav.php') ?>
            <div class="dashboard_content">
                <div class="dashboard_content_main">
                    <div class="row">
                        <div class="column column-12">
                            <h1 class="section_header"><i class="fa fa-list"></i> Lista de Proveedores</h1>
                            <a href="./suppliers-add.php"><button class="appBtn"><i class="fa fa-plus"></i> Agregar Proveedor</button></a>
                            <br>
                            <br>
                            <br>
                            <div class="section_content">
                                <div class="users">
                                    <br>
                                    <table class="client-table">
                                        <thead>
                                            <tr>
                                                <th>Razón Social</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($suppliers as $index => $supplier){ ?>
                                                <!-- Fila principal -->
                                                <tr class="client-row">
                                                    <td><?= $supplier['supplier_name'] ?></td>
                                                    <td class="action-buttons">
                                                        <a href="#" class="updateUser" data-supplierid="<?= $supplier['id'] ?>"><i class="fa fa-pencil"></i> Editar</a>
                                                        <a href="#" class="deleteUser" data-supplierid="<?= $supplier['id'] ?>" data-fname="<?= $supplier['supplier_name'] ?>"><i class="fa fa-trash"></i> Eliminar</a>
                                                        <a href="javascript:void(0);" class="toggle-details" data-toggle-id="<?= $index ?>">
                                                            <i class="fa fa-angle-down"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <!-- Fila oculta para detalles -->
                                                <tr id="details-<?= $index ?>" class="client-details hidden">
                                                    <td colspan="2">
                                                        <table class="details-table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Contacto</th>
                                                                    <th>Email</th>
                                                                    <th>Teléfono</th>
                                                                    <th>Dirección</th>
                                                                    <th>Localidad</th>
                                                                    <th>Sitio Web</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><?= $supplier['contact'] ?></td>
                                                                    <td><?= $supplier['email'] ?></td>
                                                                    <td><?= $supplier['telephone'] ?></td>
                                                                    <td><?= $supplier['address'] ?></td>
                                                                    <td><?= $supplier['location'] ?></td>
                                                                    <td><?= $supplier['website'] ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('partials/app-scripts.php'); ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Manejador de eventos para el despliegue de detalles
        document.querySelectorAll('.toggle-details').forEach(button => {
            button.addEventListener('click', function() {
                const toggleId = this.dataset.toggleId;
                const detailsRow = document.getElementById(`details-${toggleId}`);
                detailsRow.classList.toggle('hidden');
                this.classList.toggle('active');
            });
        });
    });
</script>
</body>
</html>
