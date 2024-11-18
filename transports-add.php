<?php
    //Start the session.
    session_start();
    if(!isset($_SESSION['user'])) header('location: login.php');
    $_SESSION['table'] = 'transports';
    $_SESSION['redirect_to'] = 'transports-add.php';
    $show_table = 'transports';
    $user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Agregar Transporte - ERP Dynalab SRL</title>
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
                            <h1 class="section_header"><i class="fa fa-plus"></i> Agregar Transporte</h1>
                            <div id="userAddFormContainer">
                                <form action="database/add.php" method="POST" class="appForm" enctype="multipart/form-data">
                                    <div class="appFormInputContainer">
                                        <label for="transport_name">Nombre / Razón Social</label>
                                        <input type="text" class="appFormInput" id="transport_name" placeholder="Empresa S.A. / Empresa SRL..." name="transport_name" />
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="address">Dirección</label>
                                        <input type="text" class="appFormInput" id="address" placeholder="calle / Av. Nombre nº 1234..." name="address" />
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="location">Localidad</label>
                                        <input type="text" class="appFormInput" id="location" placeholder="barrio / localidad (provincia para el interior)..." name="location" />
                                    </div>
                                    <button type="submit" class="appBtn">FINALIZAR</button>
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