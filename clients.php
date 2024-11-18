<?php
    //Start the session.
    session_start();
    if(!isset($_SESSION['user'])) header('location: login.php');
    $_SESSION['table'] = 'clients';
    $user = $_SESSION['user'];
    $show_table = 'clients';
    $clients = include('database/show.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Clientes - ERP Dynalab SRL</title>
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
                            <h1 class="section_header"><i class="fa fa-list"></i> Lista de Clientes</h1>
                            <a href="./clients-add.php"><button class="appBtn"><i class="fa fa-plus"></i> Agregar Cliente</button></a>
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
                                            <?php foreach ($clients as $index => $client) { ?>
                                                <!-- Fila principal -->
                                                <tr class="client-row">
                                                    <td><?= $client['business_name'] ?></td>
                                                    <td class="action-buttons">
                                                        <a href="#" class="updateUser" data-clientid="<?= $client['id'] ?>"><i class="fa fa-pencil"></i> Editar</a>
                                                        <a href="#" class="deleteUser" data-clientid="<?= $client['id'] ?>"><i class="fa fa-trash"></i> Eliminar</a>
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
                                                                    <td><?= $client['contact'] ?></td>
                                                                    <td><?= $client['email'] ?></td>
                                                                    <td><?= $client['telephone'] ?></td>
                                                                    <td><?= $client['address'] ?></td>
                                                                    <td><?= $client['location'] ?></td>
                                                                    <td><?= $client['website'] ?></td>
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
    function script(){
        
        this.initialize = function(){
            this.registerEvents();
        },

        this.registerEvents = function(){
            document.addEventListener('click', function(e){
                targetElement = e.target;
                classList = targetElement.classList;

                if(classList.contains('deleteUser')){
                    e.preventDefault();
                    userId = targetElement.dataset.userid;
                    fname = targetElement.dataset.fname;
                    lname = targetElement.dataset.lname;
                    fullName = fname + ' ' + lname;

                    BootstrapDialog.confirm({
                        title: 'Eliminar Proveedor',
                        type: BootstrapDialog.TYPE_DANGER,
                        message: 'Está seguro de eliminar <strong>'+ fullName +'</strong> ?',
                        callback: function(isDelete){
                            if(isDelete){
                                $.ajax({
                                    method: 'POST',
                                    data: {
                                        id: userId,
                                        table:'users'
                                    },
                                    url: 'database/delete.php',
                                    dataType: 'json',
                                    success: function(data){
                                        message = data.success ?
                                            fullName + ' successfully deleted!' : 'Error processing your request!';

                                        BootstrapDialog.alert({
                                            type: data.success ? BootstrapDialog.TYPE_SUCCESS : BootstrapDialog.TYPE_DANGER,
                                            message: message,
                                            callback: function(){
                                                if(data.success) location.reload();
                                            }
                                        });
                                    }
                                });
                            }
                        }
                    });
                }

                if(classList.contains('updateUser')){
                    e.preventDefault(); //Prevent loading.

                    //Get Data.
                    firstName = targetElement.closest('tr').querySelector('td.firstName').innerHTML;
                    lastName = targetElement.closest('tr').querySelector('td.lastName').innerHTML;
                    email = targetElement.closest('tr').querySelector('td.email').innerHTML;
                    userId = targetElement.dataset.userid;

                    BootstrapDialog.confirm({
                        title: 'Actualizar ' + firstName + ' ' + lastName,
                        message: '<form>\
                            <div class="form-group">\
                                <label for="firstName">Nombre:</label>\
                                <input type="text" class="form-control" id="firstName" value="'+ firstName +'">\
                            </div>\
                            <div class="form-group">\
                                <label for="lastName">Apellido:</label>\
                                <input type="text" class="form-control" id="lastName" value="'+ lastName +'">\
                            </div>\
                            <div class="form-group">\
                                <label for="email">Email:</label>\
                                <input type="email" class="form-control" id="emailUpdate" value="'+ email +'">\
                            </div>\
                        </form>',
                        callback: function(isUpdate){
                            if(isUpdate){
                                $.ajax({
                                    method: 'POST',
                                    data: {
                                        userId: userId,
                                        f_name: document.getElementById('firstName').value,
                                        l_name: document.getElementById('lastName').value,
                                        email: document.getElementById('emailUpdate').value,
                                    },
                                    url: 'database/update-user.php',
                                    dataType: 'json',
                                    success: function(data){
                                        if(data.success){
                                            BootstrapDialog.alert({
                                                type: BootstrapDialog.TYPE_SUCCESS,
                                                message: data.message,
                                                callback: function(){
                                                    location.reload();
                                                }
                                            });
                                        } else
                                            BootstrapDialog.alert({
                                                type: BootstrapDialog.TYPE_DANGER,
                                                message: data.message,
                                            });
                                    }
                                });
                            }
                        }
                    });
                }
            });
        }
    }

    //CODIGO PARA EL DESPLIEGUE DE DATA EN FORMULARIOS

    document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.toggle-details').forEach(button => {
        button.addEventListener('click', function() {
            const toggleId = this.dataset.toggleId;
            const detailsRow = document.getElementById(`details-${toggleId}`);
            detailsRow.classList.toggle('hidden');
            this.classList.toggle('active');
        });
    });
});

    var script = new script;
    script.initialize();
</script>
</body>
</html>