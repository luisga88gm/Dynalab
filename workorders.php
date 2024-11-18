<?php
    //Start the session.
    session_start();
    if(!isset($_SESSION['user'])) header('location: login.php');
    $_SESSION['table'] = 'workorders';
    $user = $_SESSION['user'];
    $show_table = 'workorders';
    $workorders = include_once 'database/show.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Órdenes de Trabajo - ERP Dynalab SRL</title>
    <?php include_once 'partials/app-header-scripts.php'; ?>
</head>
<body>
    <div id="dashboardMainContainer">
        <?php include_once 'partials/app-sidebar.php' ?>
        <div class="dashboard_content_container" id="dashboard_content_container">
            <?php include_once 'partials/app-topnav.php' ?>
            <div class="dashboard_content">
                <div class="dashboard_content_main">
                    <div class="row">
                        <div class="column column-12">
                            <h1 class="section_header"><i class="fa fa-list"></i> Lista de Órdenes de Trabajo</h1>
                            <a href="./workorders-add.php"><button class="appBtn"><i class="fa fa-plus"></i> Agregar Órden de Trabajo</button></a>
                            <br>
                            <br>
                            <br>
                            <div class="section_content">
                                <div class="users">
                                    <br>
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Nro</th>
                                                    <th>Cliente</th>
                                                    <th>Obra</th>
                                                    <th>Fecha de Creación</th>
                                                    <th>Detalles</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($workorders as $index => $workorder){ ?>
                                                    <tr>
                                                        <td class="firstName"><?= $workorder['id'] ?>/<?= date('y', strtotime($workorder['created_at'])) ?></td>
                                                        <td class="lastName"><?= $workorder['client_name'] ?></td>
                                                        <td class="email"><?= $workorder['work'] ?></td>
                                                        <td><?= date('d M Y', strtotime($user['created_at'])) ?></td>
                                                        <td><i class="fa fa-eye"></td>
                                                        <td>
                                                            <a href="" class="updateUser" data-userid="<?= $user['id'] ?>"> <i class="fa fa-pencil"></i> Editar</a>
                                                            <a href="" class="deleteUser" data-userid="<?= $user['id'] ?>" data-fname="<?= $user['first_name'] ?>" data-lname="<?= $user['last_name'] ?>"> <i class="fa fa-trash"></i> Eliminar</a>
                                                            <a href="javascript:void(0);" class="showHideSubMenu">
                                                                <span class="menuText showHideSubMenu"></span>
                                                                <i class="fa fa-angle-left mainMenuIconArrow showHideSubMenu"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <ul class="subMenus" style="background:#fff">
                                            <table>
                                                <th>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>2</td>
                                                            <td>3</td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>5</td>
                                                            <td>6</td>
                                                        </tr>
                                                    </tbody>
                                                </th>
                                            </table>
                                        </ul>
                                    <p class="userCount"><?= count($workorders) ?> Órdenes de Trabajo </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include_once 'partials/app-scripts.php'; ?>

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
                        title: 'Eliminar Usuario',
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

    var script = new script;
    script.initialize();
</script>
</body>
</html>
