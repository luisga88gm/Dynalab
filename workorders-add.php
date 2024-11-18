<?php
    //Start the session.
    session_start();
    if(!isset($_SESSION['user'])) header('location: login.php');

    //Get all products.
    $show_table = 'products';
    $products = include('database/show.php');
    $products = json_encode($products);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Agregar Órden de Trabajo - ERP Dynalab SRL</title>
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
                            <h1 class="section_header"><i class="fa fa-plus"></i> Agregar Órden de Trabajo</h1>
                            <div id="userAddFormContainer">
                                <form action="database/add.php" method="POST" class="appForm" enctype="multipart/form-data">
                                    <div class="appFormInputContainer">
                                        <label for="client">Cliente</label>
                                        <select name="clients[]" id="clientsSelect">
                                            <option value="">Seleccione el Cliente...</option>
                                            <?php
                                                $show_table = 'clients';
                                                $clients = include('database/show.php');
                                                foreach($clients as $client){
                                                    echo "<option value='". $client['id'] . "'> ".$client['business_name'] ."</option>";
                                                }
                                            ?>
                                        </select>
                                        <br>
                                        <br>
                                        <label for="reference">Obra o Referencia</label>
                                        <input type="text" class="appFormInput" id="reference" placeholder="Ref.: ..." name="reference" />
                                        <br>
                                        <br>
                                        <label for="revision">Revisión</label>
                                        <input type="text" class="appFormInput" id="revision" placeholder="Rev.: ..." name="revision" />
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="pdf_file">Órden de Compra</label>
                                        <input type="text" class="appFormInput" id="co_number" placeholder="OC Nro.: ..." name="co_number" />
                                        <input type="file" name="pdf_file" accept=".pdf" requiered/>
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="transport">Transporte</label>
                                        <select name="transports[]" id="transportsSelect">
                                            <option value="">Seleccione el Transporte...</option>
                                            <?php
                                                $show_table = 'transports';
                                                $transports = include('database/show.php');
                                                foreach($transports as $transport){
                                                    echo "<option value='". $transport['id'] . "'> ".$transport['transport_name'] ."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="delivery_term">Plazo de Entrega</label>
                                        <select name="delivery_term">
                                            <option value="">Seleccione el plazo de entrega...</option>
                                            <option value="Inmediato">Inmediato</option>
                                            <option value="7 días">7 días</option>
                                            <option value="10 días">10 días</option>
                                            <option value="15 días">15 días</option>
                                            <option value="20 días">20 días</option>
                                            <option value="25 días">25 días</option>
                                            <option value="30 días">30 días</option>
                                            <option value="40 días">40 días</option>
                                            <option value="45 días">45 días</option>
                                            <option value="60 días">60 días</option>
                                            <option value="90 días">90 días</option>
                                            <option value="120 días">120 días</option>
                                            <option value="180 días">180 días</option>
                                        </select>
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="payment_term">Condición de Pago</label>
                                        <select name="payment_term">
                                            <option value="">Seleccione la condición de pago...</option>
                                            <option value="Contado c/entrega">Contado c/entrega</option>
                                            <option value="Contado anticipado">Contado anticipado</option>
                                            <option value="30 días f/factura">30 días f/factura</option>
                                            <option value="60 días f/factura">60 días f/factura</option>
                                            <option value="90 días f/factura">90 días f/factura</option>
                                            <option value="Anticipo 40%, saldo 15 días f/factura">Anticipo 40%, saldo 15 días f/factura</option>
                                            <option value="Anticipo 40%, saldo 30 días f/factura">Anticipo 40%, saldo 30 días f/factura</option>
                                            <option value="Anticipo 40%, saldo 45 días f/factura">Anticipo 40%, saldo 45 días f/factura</option>
                                        </select>
                                    </div>






                                    <div class="alignRight">
                                        <button type="button" class="orderBtn orderProductBtn" id="orderProductBtn">Agregar Productos</button>
                                    </div>
                                    <div id="orderProductLists">
                                        <p id="noData" style="color: #9f9f9f">Ningún producto seleccionado.</p>
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

<script>
    var products = <?= $products ?>;
    var counter = 0;

    function script() {
        var vm = this;

        let productOptions = '\
            <div>\
                <label for="commercial_code">PRODUCTO</label>\
                <select name="products[]" class="productNameSelect" id="commercial_code">\
                    <option value="">Seleccione el producto...</option>\
                    INSERTPRODUCTHERE\
                </select>\
                <button class="appbtn removeOrderBtn">Quitar</button>\
            </div>';

        this.initialize = function(){
            this.registerEvents();
            this.renderProductOptions();
        },

        this.renderProductOptions = function(){
            let optionHtml = '';
            products.forEach((product) => {
                optionHtml += '<option value="'+ product.id +'">'+ product.commercial_code +'</option>';
            })
            productOptions = productOptions.replace('INSERTPRODUCTHERE', optionHtml);
        },

        this.registerEvents = function(){

            document.addEventListener('click', function(e){
                targetElement = e.target; // Target element
                classList = targetElement.classList;

                //Add new product order event
                if(targetElement.id === 'orderProductBtn'){
                    document.getElementById('noData').style.display = 'none';
                    let orderProductListsContainer = document.getElementById('orderProductLists');

                    orderProductLists.innerHTML += '\
                        <div class="orderProductRow">\
                            '+ productOptions +'\
                            <div class="suppliersRows" id="supplierRows_'+ counter +'" data-counter="'+ counter +'"></div>\
                        </div>';

                    counter++;
                }

                //If remove button is clicked..
                if(targetElement.classList.contains('removeOrderBtn')){
                    
                    let orderRow = targetElement.closest('div.orderProductRow');

                    //Remove Element.
                    orderRow.remove();
                    console.log(orderRow);
                }
            });

            document.addEventListener('change', function(e){
                targetElement = e.target; // Target element
                classList = targetElement.classList;

                //Add suppliers row on product option change
                if(classList.contains('productNameSelect')){
                    let pid = targetElement.value;

                    let counterId = targetElement.closest('div.orderProductRow').querySelector('.suppliersRows').dataset.counter;
                    
                    $.get('database/get-product-info.php', {id: pid}, function(products){
                        vm.renderSupplierRows(products, counterId);
                    }, 'json');
                }
            });
        },
        this.renderSupplierRows = function(products, counterId){
            let supplierRows = '';

            products.forEach((product) => {
                supplierRows += '\
                    <div class="row">\
                        <div style="width: 50%">\
                            <p class="supplierName">'+ product.description +'</p>\
                        </div>\
                        <div style="width: 25%">\
                            <label for="quantity">Cantidad: </label>\
                            <input type="number" class="appFormInput orderProductQty" id="quantity" placeholder="Ingrese la cantidad..." name="quantity['+ counterId +']['+ product.id +']" />\
                        </div>\
                        <div style="width: 25%">\
                            <label for="price">Precio Unitario (U$D): </label>\
                            <input type="decimal" class="appFormInput orderProductQty" id="price" placeholder="Ingrese el precio unitario pactado..." name="price['+ counterId +']['+ product.id +']" />\
                        </div>\
                    </div>';
            });

            //Append to container
            let supplierRowContainer = document.getElementById('supplierRows_' + counterId);
            supplierRowContainer.innerHTML = supplierRows;
        }
    }

    (new script()).initialize();
</script>
</body>
</html>