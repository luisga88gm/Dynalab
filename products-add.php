<?php
    //Start the session.
    session_start();
    if(!isset($_SESSION['user'])) header('location: login.php');
    $_SESSION['table'] = 'products';
    $_SESSION['redirect_to'] = 'products-add.php';
    $show_table = 'products';
    $user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Agregar Producto - ERP Dynalab SRL</title>
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
                            <h1 class="section_header"><i class="fa fa-plus"></i> Agregar Producto</h1>
                            <div id="userAddFormContainer">
                                <form action="database/add.php" method="POST" class="appForm" enctype="multipart/form-data">
                                    <div class="appFormInputContainer">
                                        <label for="commercial_code">Código Comercial</label>
                                        <input type="text" class="appFormInput" id="commercial_code" placeholder="Indique el código comercial..." name="commercial_code" />
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
                                        <label for="family">Familia de Productos</label>
                                        <select name="family">
                                            <option value="">Seleccione la familia de productos...</option>
                                            <option value="Conectores Cable-Cable">Conectores Cable-Cable</option>
                                            <option value="Conectores Caño-Cable">Conectores Caño-Cable</option>
                                            <option value="Conectores Caño-Caño">Conectores Caño-Caño</option>
                                            <option value="Terminales Cable-Zapata">Terminales Cable-Zapata</option>
                                            <option value="Terminales Caño-Zapata">Terminales Caño-Zapata</option>
                                            <option value="Conectores Soporte sobre Aislador">Conectores Soporte sobre Aislador</option>
                                            <option value="Morsetos Bifilares y de Puesta a Tierra">Morsetos Bifilares y de Puesta a Tierra</option>
                                            <option value="Uniones Flexibles y de Dilatación">Uniones Flexibles y de Dilatación</option>
                                            <option value="Conectores de 220V y 500V">Conectores de 220V y 500V</option>
                                        </select>
                                    </div>                                    
                                    <div class="appFormInputContainer">
                                        <label for="img">Imágen</label>
                                        <input type="file" name="img" />
                                        <br>
                                        <label for="pdf_file">Plano Comercial</label>
                                        <input type="file" name="pdf_file" accept=".pdf" requiered/>
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






<!-- <div class="appFormInputContainer">
    <label for="description">Suppliers</label>
    <select name="suppliers[]" id="suppliersSelect" multiple="">
        <option value="">Select Supplier</option>
        //<?php
            $show_table = 'suppliers';
            $suppliers = include('database/show.php');
            foreach($suppliers as $supplier){
                echo "<option value='". $supplier['id'] . "'> ".$supplier['supplier_name'] ."</option>";
            }
        ?>//
    </select>
</div> -->