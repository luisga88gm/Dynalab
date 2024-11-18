<?php
    //Start the session.
    session_start();
    if(!isset($_SESSION['user'])) header('location: login.php');
    $_SESSION['table'] = 'prodorders';
    $_SESSION['redirect_to'] = 'production-orders-add.php';
    $show_table = 'prodorders';
    $user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Agregar Órdenes de Producción - ERP Dynalab SRL</title>
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
                            <h1 class="section_header"><i class="fa fa-plus"></i> Agregar Órden de Producción</h1>
                            <a href="./production-orders.php"><button class="appBtn"><i class="fa fa-list"></i> Lista de Órdenes de Producción</button></a>
                            <br>
                            <br>
                            <div id="userAddFormContainer">
                                <form action="database/add.php" method="POST" class="appForm" enctype="multipart/form-data">
                                    <div class="appFormInputContainer">
                                        <label for="business_name">Razón Social</label>
                                        <input type="text" class="appFormInput" id="business_name" placeholder="Empresa S.A. / Empresa SRL..." name="business_name" />
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="contact">Contacto</label>
                                        <input type="text" class="appFormInput" id="contact" placeholder="Juan Pérez (cargo)..." name="contact" />
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="email">Email</label>
                                        <input type="text" class="appFormInput" id="email" placeholder="juanperez@mail.com / area@empresa.com.ar..." name="email" />
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="telephone">Teléfono</label>
                                        <input type="text" class="appFormInput" id="telephone" placeholder="(011) 15-1234-5678 / (area) 123-4567..." name="telephone" />
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="address">Dirección</label>
                                        <input type="text" class="appFormInput" id="address" placeholder="calle / Av. Nombre nº 1234..." name="address" />
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="location">Localidad</label>
                                        <input type="text" class="appFormInput" id="location" placeholder="barrio / localidad (provincia para el interior)..." name="location" />
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="website">Sitio Web</label>
                                        <input type="text" class="appFormInput" id="website" placeholder="www.mipagina.com.ar..." name="website" />
                                    </div>
                                    <button type="submit" class="appBtn"><i class="fa fa-plus"></i> AGREGAR</button>
                                </form>
                                <?php
                                    if(isset($_SESSION['response'])){
                                        $response_message = $_SESSION['response']['message'];
                                        $is_success = $_SESSION['response']['success'];
                                ?>
                                    <div class="responseMessage">
                                        <p class="responseMessage <?= $is_success ? 'responseMessage__success' : 'responseMessage__error' ?>">
                                            <?= $response_message ?>
                                        </p>
                                    </div>
                                <?php unset($_SESSION['response']); }  ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('partials/app-scripts.php'); ?>
</body>
</html>