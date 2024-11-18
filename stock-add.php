<?php
    //Start the session.
    session_start();
    if(!isset($_SESSION['user'])) header('location: login.php');
    $_SESSION['table'] = 'stock';
    $_SESSION['redirect_to'] = 'stock-add.php';
    $show_table = 'stock';
    $user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cargar Productos al Stock - ERP Dynalab SRL</title>
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
                            <h1 class="section_header"><i class="fa fa-plus"></i> Cargar Productos al Stock</h1>
                            <div id="appFormInputContainer">
                                <form action="database/add.php" method="POST" class="appForm" enctype="multipart/form-data">
                                    <div class="appFormInputContainer">
                                        <label for="family">Familia de Productos</label>
                                        <select name="family">
                                            <option value="">Seleccione la familia de productos...</option>
                                            <option value="Módulo cable 13mm">Módulo cable 13mm</option>
                                            <option value="Módulo cable 19mm">Módulo cable 19mm</option>
                                            <option value="Módulo cable 25mm">Módulo cable 25mm</option>
                                            <option value="Módulo cable 28.8mm">Módulo cable 28.8mm</option>
                                            <option value="Módulo caño">Módulo caño</option>
                                            <option value="Módulo Zapata">Módulo Zapata</option>
                                            <option value="Plato">Plato</option>
                                        </select>
                                        &nbsp;
                                        &nbsp;
                                        <label for="setting">Subcategoría de Productos</label>
                                        <select name="setting">
                                            <option value="">Seleccione la familia de productos...</option>
                                            <option value="Recto">Recto</option>
                                            <option value="45º">45º</option>
                                            <option value="90º">90º</option>
                                            <option value="T">T</option>
                                        </select>
                                        <br>
                                        <br>
                                        <label for="material">Material</label>
                                        <input type="radio" name="material"
                                        <?php if (isset($material) && $material=="aluminio") echo "checked";?>
                                        value="aluminio">Aluminio
                                        &nbsp;
                                        <input type="radio" name="material"
                                        <?php if (isset($material) && $mterial=="bronce") echo "checked";?>
                                        value="bronce">Bronce
                                    </div>                                    
                                    <div class="appFormInputContainer">
                                        <label for="internal_code">Código de Fundición</label>
                                        <input type="text" class="appFormInput" id="internal_code" placeholder="Indique el código de fundición..." name="internal_code" />
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="description">Descripción</label>
                                        <textarea class="appFormInput productTextAreaInput" id="description" placeholder="Ingrese la descripción..." name="description"></textarea>
                                    </div>
                                    <div class="appFormInputContainer">
                                        <div class="row" style="padding-left: 15px">
                                        <div style="width: 25%">
                                            <label for="quantity">Cantidad: </label>
                                            <input type="number" min="0" class="appFormInput orderProductQty" id="quantity" placeholder="Ingrese la cantidad..." name="quantity" />
                                        </div>
                                        &nbsp;
                                        &nbsp;
                                        <div style="width: 25%">
                                            <label for="weight">Peso Unitario (Kg): </label>
                                            <input type="decimal" class="appFormInput orderProductQty" id="weight" placeholder="Ingrese el peso unitario..." name="weight" />
                                        </div>
                                        </div>
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="img">Imágen</label>
                                        <input type="file" name="img" />
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