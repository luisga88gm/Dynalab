<?php
    //Start the session.
    session_start();
    if(!isset($_SESSION['user'])) header('location: login.php');
    $user = $_SESSION['user'];
    $show_table = 'exchanges';
    $exchanges = include('database/show.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Costos - ERP Dynalab SRL</title>
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
                            <h1 class="section_header"><i class="fa fa-money"></i> Costos</h1>
                            <br>
                            <p>pruebo espacio</p>










                            <div id="appFormInputContainer">
                                <form action="database/add.php" method="POST" class="appForm" enctype="multipart/form-data">
                                    <div class="appFormInputContainer">
                                        <label for="family">Selector 1</label>
                                        <select name="family">
                                            <option value="">Seleccione opcion 1...</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        &nbsp;
                                        &nbsp;
                                        <label for="setting">Selector 2</label>
                                        <select name="setting">
                                            <option value="">Seleccione opcion 2...</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
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
                            <br>
                            <br>
                            <div class="section_content">
                            <?php foreach($exchanges as $index => $exchange){ ?>
                                <div class="users">
                                <p style="font-weight: bold; text-transform: uppercase; color: #d55f7d; font-size: 16px">Tablas de Costos Básicos</p>
                                <div class="cost_content_main">
                                    <?php
                                        $stmt = $conn->prepare("SELECT basiccosts.id, basiccosts.specie, basiccosts.value, basiccosts.currency_value, basiccosts.created_at, basiccosts.updated_at
                                        FROM basiccosts
                                        WHERE id=1
                                        ");
                                        
                                        $stmt->execute();
                                        $basiccosts = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                    <table style="width: 32%; border: 2px solid">
                                        <?php foreach($basiccosts as $index => $basiccost){ ?>
                                        <thead style="border: 2px solid">
                                            <tr style="height:40px">
                                                <th colspan="3"> <?= $basiccost['specie'] ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Coeficiente</td>
                                                <td><?= $basiccost['value'] ?></td>
                                                <td rowspan="3">
                                                    <a href="" class="updateValue" 
                                                    data-basiccostid="<?= $basiccost['id'] ?>"> <i class="fa fa-pencil"></i> Editar</a></td>
                                            </tr>
                                            <tr>
                                                <td>Fecha</td>
                                                <td><?= date('d/M/Y', strtotime($basiccost['updated_at'])) ?></td>
                                            </tr>
                                        </tbody>
                                        <?php } ?>
                                    </table>
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    <?php
                                        $stmt = $conn->prepare("SELECT basiccosts.id, basiccosts.specie, basiccosts.value, basiccosts.currency_value, basiccosts.created_at, basiccosts.updated_at
                                        FROM basiccosts
                                        WHERE id=2
                                        ");
                                        
                                        $stmt->execute();
                                        $basiccosts = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                    <table style="width: 32%; border: 2px solid">
                                        <?php foreach($basiccosts as $index => $basiccost){ ?>
                                        <thead style="border: 2px solid">
                                            <tr style="height:40px">
                                                <th colspan="3"> <?= $basiccost['specie'] ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Valor Hora</td>
                                                <td>$ <?= $basiccost['value'] ?></td>
                                                <td rowspan="3">
                                                    <a href="" class="updateValue" 
                                                    data-basiccostid="<?= $basiccost['id'] ?>"> <i class="fa fa-pencil"></i> Editar</a></td>
                                            </tr>
                                            <tr>
                                                <td>Valor Minuto</td>
                                                <td>$ <?= round($basiccost['value']/60, 2) ?></td>
                                            </tr>
                                            <tr>
                                                <td>Fecha</td>
                                                <td><?= date('d/M/Y', strtotime($basiccost['updated_at'])) ?></td>
                                            </tr>
                                        </tbody>
                                        <?php } ?>
                                    </table>
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    <?php
                                        $stmt = $conn->prepare("SELECT basiccosts.id, basiccosts.specie, basiccosts.value, basiccosts.currency_value, basiccosts.created_at, basiccosts.updated_at
                                        FROM basiccosts
                                        WHERE id=3
                                        ");
                                        
                                        $stmt->execute();
                                        $basiccosts = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                    <table style="width: 32%; border: 2px solid">
                                        <?php foreach($basiccosts as $index => $basiccost){ ?>
                                        <thead style="border: 2px solid">
                                            <tr style="height:40px">
                                                <th colspan="3"> <?= $basiccost['specie'] ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Valor Proveedor</td>
                                                <td>$ <?= round($basiccost['value']*1.1/$basiccost['currency_value']*$exchange['currency_value'], 2) ?> (U$D <?= round($basiccost['value']*1.1/$basiccost['currency_value'], 2) ?>)</td>
                                                <td rowspan="3">
                                                    <a href="" class="updateValue" 
                                                    data-basiccostid="<?= $basiccost['id'] ?>"> <i class="fa fa-pencil"></i> Editar</a></td>
                                            </tr>
                                            <tr>
                                                <td>Tipo de Cambio</td>
                                                <td>$ <?= $basiccost['currency_value'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Fecha</td>
                                                <td><?= date('d/M/Y', strtotime($basiccost['updated_at'])) ?></td>
                                            </tr>
                                        </tbody>
                                        <?php } ?>
                                    </table>
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    <?php
                                        $stmt = $conn->prepare("SELECT basiccosts.id, basiccosts.specie, basiccosts.value, basiccosts.currency_value, basiccosts.created_at, basiccosts.updated_at
                                        FROM basiccosts
                                        WHERE id=4
                                        ");
                                        
                                        $stmt->execute();
                                        $basiccosts = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                    <table style="width: 32%; border: 2px solid">
                                        <?php foreach($basiccosts as $index => $basiccost){ ?>
                                        <thead style="border: 2px solid">
                                            <tr style="height:40px">
                                                <th colspan="3"> <?= $basiccost['specie'] ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Valor Proveedor</td>
                                                <td>$ <?= round($basiccost['value']*1.1/$basiccost['currency_value']*$exchange['currency_value'], 2) ?> (U$D <?= round($basiccost['value']*1.1/$basiccost['currency_value'], 2) ?>)</td>
                                                <td rowspan="3">
                                                    <a href="" class="updateValue" 
                                                    data-basiccostid="<?= $basiccost['id'] ?>"> <i class="fa fa-pencil"></i> Editar</a></td>
                                            </tr>
                                            <tr>
                                                <td>Tipo de Cambio</td>
                                                <td>$ <?= $basiccost['currency_value'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Fecha</td>
                                                <td><?= date('d/M/Y', strtotime($basiccost['updated_at'])) ?></td>
                                            </tr>
                                        </tbody>
                                        <?php } ?>
                                    </table>
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    <?php
                                        $stmt = $conn->prepare("SELECT basiccosts.id, basiccosts.specie, basiccosts.value, basiccosts.currency_value, basiccosts.created_at, basiccosts.updated_at
                                        FROM basiccosts
                                        WHERE id=5
                                        ");
                                        
                                        $stmt->execute();
                                        $basiccosts = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                    <table style="width: 32%; border: 2px solid">
                                        <?php foreach($basiccosts as $index => $basiccost){ ?>
                                        <thead style="border: 2px solid">
                                            <tr style="height:40px">
                                                <th colspan="3"> <?= $basiccost['specie'] ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Valor Proveedor</td>
                                                <td>$ <?= round($basiccost['value']/$basiccost['currency_value']*$exchange['currency_value'], 2) ?> (U$D <?= round($basiccost['value']/$basiccost['currency_value'], 2) ?>)</td>
                                                <td rowspan="3">
                                                    <a href="" class="updateValue" 
                                                    data-basiccostid="<?= $basiccost['id'] ?>"> <i class="fa fa-pencil"></i> Editar</a></td>
                                            </tr>
                                            <tr>
                                                <td>Tipo de Cambio</td>
                                                <td>$ <?= $basiccost['currency_value'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Fecha</td>
                                                <td><?= date('d/M/Y', strtotime($basiccost['updated_at'])) ?></td>
                                            </tr>
                                        </tbody>
                                        <?php } ?>
                                    </table>
                                </div>
                                <br>
                                <div class="cost_content_main">
                                    <?php
                                        $stmt = $conn->prepare("SELECT basiccosts.id, basiccosts.specie, basiccosts.value, basiccosts.currency_value, basiccosts.created_at, basiccosts.updated_at
                                        FROM basiccosts
                                        WHERE id=6
                                        ");
                                        
                                        $stmt->execute();
                                        $basiccosts = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                    <table style="width: 32%; border: 2px solid">
                                        <?php foreach($basiccosts as $index => $basiccost){ ?>
                                        <thead style="border: 2px solid">
                                            <tr style="height:40px">
                                                <th colspan="3"> <?= $basiccost['specie'] ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Valor Proveedor</td>
                                                <td>$ <?= round($basiccost['value']/$basiccost['currency_value']*$exchange['currency_value']*3.45, 2) ?> (U$D <?= round($basiccost['value']/$basiccost['currency_value']*3.45, 2) ?>)</td>
                                                <td rowspan="3">
                                                    <a href="" class="updateValue" 
                                                    data-basiccostid="<?= $basiccost['id'] ?>"> <i class="fa fa-pencil"></i> Editar</a></td>
                                            </tr>
                                            <tr>
                                                <td>Tipo de Cambio</td>
                                                <td>$ <?= $basiccost['currency_value'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Fecha</td>
                                                <td><?= date('d/M/Y', strtotime($basiccost['updated_at'])) ?></td>
                                            </tr>
                                        </tbody>
                                        <?php } ?>
                                    </table>
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    <?php
                                        $stmt = $conn->prepare("SELECT basiccosts.id, basiccosts.specie, basiccosts.value, basiccosts.currency_value, basiccosts.created_at, basiccosts.updated_at
                                        FROM basiccosts
                                        WHERE id=7
                                        ");
                                        
                                        $stmt->execute();
                                        $basiccosts = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                    <table style="width: 32%; border: 2px solid">
                                        <?php foreach($basiccosts as $index => $basiccost){ ?>
                                        <thead style="border: 2px solid">
                                            <tr style="height:40px">
                                                <th colspan="3"> <?= $basiccost['specie'] ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Valor Unitario</td>
                                                <td>$ <?= $basiccost['value'] ?></td>
                                                <td rowspan="3">
                                                    <a href="" class="updateValue" 
                                                    data-basiccostid="<?= $basiccost['id'] ?>"> <i class="fa fa-pencil"></i> Editar</a></td>
                                            </tr>
                                            <tr>
                                                <td>Fecha</td>
                                                <td><?= date('d/M/Y', strtotime($basiccost['updated_at'])) ?></td>
                                            </tr>
                                        </tbody>
                                        <?php } ?>
                                    </table>
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    <?php
                                        $stmt = $conn->prepare("SELECT basiccosts.id, basiccosts.specie, basiccosts.value, basiccosts.currency_value, basiccosts.created_at, basiccosts.updated_at
                                        FROM basiccosts
                                        WHERE id=8
                                        ");
                                        
                                        $stmt->execute();
                                        $basiccosts = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                    <table style="width: 32%; border: 2px solid">
                                        <?php foreach($basiccosts as $index => $basiccost){ ?>
                                        <thead style="border: 2px solid">
                                            <tr style="height:40px">
                                                <th colspan="3"> <?= $basiccost['specie'] ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Valor Unitario</td>
                                                <td>$ <?= round($basiccost['value']*3.85, 2) ?></td>
                                                <td rowspan="3">
                                                    <a href="" class="updateValue" 
                                                    data-basiccostid="<?= $basiccost['id'] ?>"> <i class="fa fa-pencil"></i> Editar</a></td>
                                            </tr>
                                            <tr>
                                                <td>Fecha</td>
                                                <td><?= date('d/M/Y', strtotime($basiccost['updated_at'])) ?></td>
                                            </tr>
                                        </tbody>
                                        <?php } ?>
                                    </table>
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    <?php
                                        $stmt = $conn->prepare("SELECT basiccosts.id, basiccosts.specie, basiccosts.value, basiccosts.currency_value, basiccosts.created_at, basiccosts.updated_at
                                        FROM basiccosts
                                        WHERE id=9
                                        ");
                                        
                                        $stmt->execute();
                                        $basiccosts = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                    <table style="width: 32%; border: 2px solid">
                                        <?php foreach($basiccosts as $index => $basiccost){ ?>
                                        <thead style="border: 2px solid">
                                            <tr style="height:40px">
                                                <th colspan="3"> <?= $basiccost['specie'] ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Valor Unitario</td>
                                                <td>$ <?= $basiccost['value'] ?></td>
                                                <td rowspan="3">
                                                    <a href="" class="updateValue" 
                                                    data-basiccostid="<?= $basiccost['id'] ?>"> <i class="fa fa-pencil"></i> Editar</a></td>
                                            </tr>
                                            <tr>
                                                <td>Fecha</td>
                                                <td><?= date('d/M/Y', strtotime($basiccost['updated_at'])) ?></td>
                                            </tr>
                                        </tbody>
                                        <?php } ?>
                                    </table>
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    <?php
                                        $stmt = $conn->prepare("SELECT basiccosts.id, basiccosts.specie, basiccosts.value, basiccosts.currency_value, basiccosts.created_at, basiccosts.updated_at
                                        FROM basiccosts
                                        WHERE id=10
                                        ");
                                        
                                        $stmt->execute();
                                        $basiccosts = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                    <table style="width: 32%; border: 2px solid">
                                        <?php foreach($basiccosts as $index => $basiccost){ ?>
                                        <thead style="border: 2px solid">
                                            <tr style="height:40px">
                                                <th colspan="3"> <?= $basiccost['specie'] ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Valor Unitario</td>
                                                <td>$ <?= $basiccost['value'] ?></td>
                                                <td rowspan="3">
                                                    <a href="" class="updateValue" 
                                                    data-basiccostid="<?= $basiccost['id'] ?>"> <i class="fa fa-pencil"></i> Editar</a></td>
                                            </tr>
                                            <tr>
                                                <td>Fecha</td>
                                                <td><?= date('d/M/Y', strtotime($basiccost['updated_at'])) ?></td>
                                            </tr>
                                        </tbody>
                                        <?php } ?>
                                    </table>
                                </div>
                                    <br>
                                    <br>

                                    <?php
                                        $stmt = $conn->prepare("SELECT costs.id, costs.family, costs.model, costs.al_weight, costs.br_weight, costs.time, costs.bul_quantity, costs.cab_quantity
                                        FROM costs
                                        ORDER BY costs.id
                                        ASC");
                                        
                                        $stmt->execute();
                                        $costs = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                        $data = [];
                                        foreach($costs as $cost){
                                            $data[$cost['family']][] = $cost;
                                        }
                                    ?>
                                    <?php
                                        foreach($data as $family_id => $family_pos){
                                    ?>
                                    
                                    <div class="poList" id="container-<?= $family_id ?>">
                                        <p><?= $family_id ?></p>
                                        <table style="border: 2px solid">
                                            <thead style="border: 2px solid">
                                                <tr>
                                                    <th style="border: 2px solid" rowspan="2">Modelo</th>
                                                    <th style="border: 2px solid" colspan="7">Costos</th>
                                                    <th style="border: 2px solid" colspan="6">Costos Totales</th>
                                                    <th style="border: 2px solid" colspan="6">Precios</th>
                                                </tr>
                                                <tr>
                                                    <th>Aluminio ($/kg)</th>
                                                    <th>Bronce ($/kg)</th>
                                                    <th>Bulonería</th>
                                                    <th>Bulonería Inox</th>
                                                    <th>Caballetes</th>
                                                    <th>Caballetes Inox</th>
                                                    <th style="border-right: 2px solid">Mano de Obra</th>
                                                    <th>Aluminio</th>
                                                    <th>Bronce</th>
                                                    <th>Aluminio Inox</th>
                                                    <th>Bronce Inox</th>
                                                    <th>Aluminio Cobreado</th>
                                                    <th style="border-right: 2px solid">Bronce Estañado</th>
                                                    <th>Aluminio</th>
                                                    <th>Bronce</th>
                                                    <th>Aluminio Inox</th>
                                                    <th>Bronce Inox</th>
                                                    <th>Aluminio Cobreado</th>
                                                    <th>Bronce Estañado</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    foreach ($family_pos as $index => $family_prod) {
                                                ?>
                                                <tr>
                                                    <td><?= $family_prod['model'] ?></td>
                                                    <td>$
                                                        <?php
                                                            $stmt = $conn->prepare("SELECT basiccosts.id, basiccosts.specie, basiccosts.value, basiccosts.currency_value, basiccosts.created_at, basiccosts.updated_at
                                                            FROM basiccosts
                                                            WHERE id=3
                                                            ");

                                                            $stmt->execute();
                                                            $basiccosts = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                        if($basiccosts){

                                                            foreach($basiccosts as $index => $basiccost){
                                                            $costoAl = round($family_prod['al_weight']*$basiccost['value']*1.1/$basiccost['currency_value']*$exchange['currency_value'], 2);}
                                                        }
                                                        if($costoAl>"0"){
                                                            echo $costoAl;
                                                        } else {
                                                            echo '<i>NULL<i>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>$
                                                        <?php
                                                            $stmt = $conn->prepare("SELECT basiccosts.id, basiccosts.specie, basiccosts.value, basiccosts.currency_value, basiccosts.created_at, basiccosts.updated_at
                                                            FROM basiccosts
                                                            WHERE id=4
                                                            ");
                                                            
                                                            $stmt->execute();
                                                            $basiccosts = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                        if($basiccosts){

                                                            foreach($basiccosts as $index => $basiccost){
                                                            $costoBr = round($family_prod['br_weight']*$basiccost['value']*1.1/$basiccost['currency_value']*$exchange['currency_value'], 2);}
                                                        }
                                                        if($costoBr>"0"){
                                                            echo $costoBr;
                                                        } else {
                                                            echo '<i>NULL<i>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>$
                                                        <?php
                                                            $stmt = $conn->prepare("SELECT basiccosts.id, basiccosts.specie, basiccosts.value, basiccosts.currency_value, basiccosts.created_at, basiccosts.updated_at
                                                            FROM basiccosts
                                                            WHERE id=7
                                                            ");
                                                            
                                                            $stmt->execute();
                                                            $basiccosts = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                        if($basiccosts){
                                                            foreach($basiccosts as $index => $basiccost){
                                                            $costoBul = round($family_prod['bul_quantity']*$basiccost['value'], 2);}
                                                        }
                                                        if($costoBul>"0"){
                                                            echo $costoBul;
                                                        } else {
                                                            echo '<i>NULL<i>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>$
                                                        <?php
                                                            $stmt = $conn->prepare("SELECT basiccosts.id, basiccosts.specie, basiccosts.value, basiccosts.currency_value, basiccosts.created_at, basiccosts.updated_at
                                                            FROM basiccosts
                                                            WHERE id=7
                                                            ");
                                                            
                                                            $stmt->execute();
                                                            $basiccosts = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                        if($basiccosts){
                                                            foreach($basiccosts as $index => $basiccost){
                                                            $costoBulInox = round($family_prod['bul_quantity']*$basiccost['value']*3.85, 2);}
                                                        }
                                                        if($costoBulInox>"0"){
                                                            echo $costoBulInox;
                                                        } else {
                                                            echo '<i>NULL<i>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>$
                                                        <?php
                                                            $stmt = $conn->prepare("SELECT basiccosts.id, basiccosts.specie, basiccosts.value, basiccosts.currency_value, basiccosts.created_at, basiccosts.updated_at
                                                            FROM basiccosts
                                                            WHERE id=5
                                                            ");
                                                            
                                                            $stmt->execute();
                                                            $basiccosts = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                        if($basiccosts){
                                                            foreach($basiccosts as $index => $basiccost){
                                                            $costoCab = round($family_prod['cab_quantity']*$basiccost['value']/$basiccost['currency_value']*$exchange['currency_value'], 2);}
                                                        }
                                                        if($costoCab>"0"){
                                                            echo $costoCab;
                                                        } else {
                                                            echo '<i>NULL<i>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>$
                                                        <?php
                                                            $stmt = $conn->prepare("SELECT basiccosts.id, basiccosts.specie, basiccosts.value, basiccosts.currency_value, basiccosts.created_at, basiccosts.updated_at
                                                            FROM basiccosts
                                                            WHERE id=5
                                                            ");
                                                            
                                                            $stmt->execute();
                                                            $basiccosts = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                        if($basiccosts){
                                                            foreach($basiccosts as $index => $basiccost){
                                                            $costoCabInox = round($family_prod['cab_quantity']*$basiccost['value']/$basiccost['currency_value']*$exchange['currency_value']*3.45, 2);}
                                                        }
                                                        if($costoCabInox>"0"){
                                                            echo $costoCabInox;
                                                        } else {
                                                            echo '<i>NULL<i>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>$
                                                        <?php
                                                            $stmt = $conn->prepare("SELECT basiccosts.id, basiccosts.specie, basiccosts.value, basiccosts.currency_value, basiccosts.created_at, basiccosts.updated_at
                                                            FROM basiccosts
                                                            WHERE id=2
                                                            ");
                                                            
                                                            $stmt->execute();
                                                            $basiccosts = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                        if($basiccosts){
                                                            foreach($basiccosts as $index => $basiccost){
                                                            $costoMo = round($family_prod['time']*$basiccost['value']/60, 2);}
                                                        }
                                                            echo $costoMo;
                                                        ?>
                                                    </td>
                                                    <td>$ <?=($costoAl+$costoBul+$costoCab+$costoMo)?></td>
                                                    <td>$ <?=($costoBr+$costoBul+$costoCab+$costoMo)?></td>
                                                    <td>$ <?=($costoAl+$costoBulInox+$costoCabInox+$costoMo)?></td>
                                                    <td>$ <?=($costoBr+$costoBulInox+$costoCabInox+$costoMo)?></td>
                                                    <td>$
                                                        <?php
                                                            $stmt = $conn->prepare("SELECT basiccosts.id, basiccosts.specie, basiccosts.value, basiccosts.currency_value, basiccosts.created_at, basiccosts.updated_at
                                                            FROM basiccosts
                                                            WHERE id=10
                                                            ");

                                                            $stmt->execute();
                                                            $basiccosts = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                        if($basiccosts){

                                                            foreach($basiccosts as $index => $basiccost){
                                                            $costoCoppered = round($family_prod['al_weight']*$basiccost['value'], 2);}
                                                        }
                                                        if($costoCoppered>"0"){
                                                            echo $costoCoppered;
                                                        } else {
                                                            echo '<i>NULL<i>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>$
                                                        <?php
                                                            $stmt = $conn->prepare("SELECT basiccosts.id, basiccosts.specie, basiccosts.value, basiccosts.currency_value, basiccosts.created_at, basiccosts.updated_at
                                                            FROM basiccosts
                                                            WHERE id=9
                                                            ");

                                                            $stmt->execute();
                                                            $basiccosts = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                        if($basiccosts){

                                                            foreach($basiccosts as $index => $basiccost){
                                                            $costoTinned = round($family_prod['br_weight']*$basiccost['value'], 2);}
                                                        }
                                                        if($costoTinned>"0"){
                                                            echo $costoTinned;
                                                        } else {
                                                            echo '<i>NULL<i>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>$ 
                                                        <?php
                                                            $stmt = $conn->prepare("SELECT basiccosts.id, basiccosts.specie, basiccosts.value, basiccosts.currency_value, basiccosts.created_at, basiccosts.updated_at
                                                            FROM basiccosts
                                                            WHERE id=1
                                                            ");
                                                            
                                                            $stmt->execute();
                                                            $basiccosts = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                        ?>

                                                        <?php foreach($basiccosts as $index => $basiccost){ ?>
                                                            <?=round(($costoAl+$costoBul+$costoCab+$costoMo)*$basiccost['value'], 2)?>
                                                        <?php } ?>
                                                    </td>
                                                    <td>$ 
                                                        <?php
                                                            $stmt = $conn->prepare("SELECT basiccosts.id, basiccosts.specie, basiccosts.value, basiccosts.currency_value, basiccosts.created_at, basiccosts.updated_at
                                                            FROM basiccosts
                                                            WHERE id=1
                                                            ");
                                                            
                                                            $stmt->execute();
                                                            $basiccosts = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                        ?>

                                                        <?php foreach($basiccosts as $index => $basiccost){ ?>
                                                            <?=round(($costoBr+$costoBul+$costoCab+$costoMo)*$basiccost['value'], 2)?>
                                                        <?php } ?>
                                                    </td>
                                                    <td>$ 
                                                        <?php
                                                            $stmt = $conn->prepare("SELECT basiccosts.id, basiccosts.specie, basiccosts.value, basiccosts.currency_value, basiccosts.created_at, basiccosts.updated_at
                                                            FROM basiccosts
                                                            WHERE id=1
                                                            ");
                                                            
                                                            $stmt->execute();
                                                            $basiccosts = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                        ?>

                                                        <?php foreach($basiccosts as $index => $basiccost){ ?>
                                                            <?=round(($costoAl+$costoBulInox+$costoCabInox+$costoMo)*$basiccost['value'], 2)?>
                                                        <?php } ?>
                                                    </td>
                                                    <td>$ 
                                                        <?php
                                                            $stmt = $conn->prepare("SELECT basiccosts.id, basiccosts.specie, basiccosts.value, basiccosts.currency_value, basiccosts.created_at, basiccosts.updated_at
                                                            FROM basiccosts
                                                            WHERE id=1
                                                            ");
                                                            
                                                            $stmt->execute();
                                                            $basiccosts = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                        ?>

                                                        <?php foreach($basiccosts as $index => $basiccost){ ?>
                                                            <?=round(($costoBr+$costoBulInox+$costoCabInox+$costoMo)*$basiccost['value'], 2)?>
                                                        <?php } ?>
                                                    </td>
                                                    <td>$ 
                                                        <?php
                                                            $stmt = $conn->prepare("SELECT basiccosts.id, basiccosts.specie, basiccosts.value, basiccosts.currency_value, basiccosts.created_at, basiccosts.updated_at
                                                            FROM basiccosts
                                                            WHERE id=1
                                                            ");
                                                            
                                                            $stmt->execute();
                                                            $basiccosts = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                        ?>

                                                        <?php foreach($basiccosts as $index => $basiccost){ ?>
                                                            <?=round(($costoAl+$costoBul+$costoCab+$costoMo)*$basiccost['value']+$costoCoppered, 2)?>
                                                        <?php } ?>
                                                    </td>
                                                    <td>$ 
                                                        <?php
                                                            $stmt = $conn->prepare("SELECT basiccosts.id, basiccosts.specie, basiccosts.value, basiccosts.currency_value, basiccosts.created_at, basiccosts.updated_at
                                                            FROM basiccosts
                                                            WHERE id=1
                                                            ");
                                                            
                                                            $stmt->execute();
                                                            $basiccosts = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                        ?>

                                                        <?php foreach($basiccosts as $index => $basiccost){ ?>
                                                            <?=round(($costoBr+$costoBul+$costoCab+$costoMo)*$basiccost['value']+$costoTinned, 2)?>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php } ?>
                                
                                
                                
                                
                                    <br>
                                    <br>
                                
                                
                                
                                
                                
                                    <table style="border: 2px solid">
                                        <p>tabla 2</p>
                                        <thead style="border: 2px solid">
                                            <tr>
                                                <th style="border: 2px solid" rowspan="2">Modelo</th>
                                                <th style="border: 2px solid" colspan="7">Costos</th>
                                                <th style="border: 2px solid" colspan="4">Costos Totales</th>
                                                <th style="border: 2px solid" colspan="4">Precios</th>
                                            </tr>
                                            <tr>
                                                <th>Aluminio</th>
                                                <th>Bronce</th>
                                                <th>Bulonería</th>
                                                <th>Bulonería Inox</th>
                                                <th>Caballetes</th>
                                                <th>Caballetes Inox</th>
                                                <th style="border-right: 2px solid">Mano de Obra</th>
                                                <th>Aluminio</th>
                                                <th>Bronce</th>
                                                <th>Aluminio Inox</th>
                                                <th style="border-right: 2px solid">Bronce Inox</th>
                                                <th>Aluminio</th>
                                                <th>Bronce</th>
                                                <th>Aluminio Inox</th>
                                                <th>Bronce Inox</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>a-D63</td>
                                                <td>10,25</td>
                                                <td>10,25</td>
                                                <td>20,50</td>
                                                <td>234,56</td>
                                                <td>7676,00</td>
                                                <td>2342,86</td>
                                                <td>4578,99</td>
                                                <td>1000,00</td>
                                                <td>456,64</td>
                                                <td>2346,90</td>
                                                <td>3242,56</td>
                                                <td>2000,00</td>
                                                <td>343,00</td>
                                                <td>23,87</td>
                                                <td>343,98</td>
                                            </tr>
                                            <tr>
                                                <td>a-D63</td>
                                                <td>10,25</td>
                                                <td>10,25</td>
                                                <td>20,50</td>
                                                <td>234,56</td>
                                                <td>7676,00</td>
                                                <td>2342,86</td>
                                                <td>4578,99</td>
                                                <td>1000,00</td>
                                                <td>456,64</td>
                                                <td>2346,90</td>
                                                <td>3242,56</td>
                                                <td>2000,00</td>
                                                <td>343,00</td>
                                                <td>23,87</td>
                                                <td>343,98</td>
                                            </tr>
                                            <tr>
                                                <td>a-D63</td>
                                                <td>10,25</td>
                                                <td>10,25</td>
                                                <td>20,50</td>
                                                <td>234,56</td>
                                                <td>7676,00</td>
                                                <td>2342,86</td>
                                                <td>4578,99</td>
                                                <td>1000,00</td>
                                                <td>456,64</td>
                                                <td>2346,90</td>
                                                <td>3242,56</td>
                                                <td>2000,00</td>
                                                <td>343,00</td>
                                                <td>23,87</td>
                                                <td>343,98</td>
                                            </tr>
                                            <tr>
                                                <td>a-D63</td>
                                                <td>10,25</td>
                                                <td>10,25</td>
                                                <td>20,50</td>
                                                <td>234,56</td>
                                                <td>7676,00</td>
                                                <td>2342,86</td>
                                                <td>4578,99</td>
                                                <td>1000,00</td>
                                                <td>456,64</td>
                                                <td>2346,90</td>
                                                <td>3242,56</td>
                                                <td>2000,00</td>
                                                <td>343,00</td>
                                                <td>23,87</td>
                                                <td>343,98</td>
                                            </tr>
                                            <tr>
                                                <td>a-D63</td>
                                                <td>10,25</td>
                                                <td>10,25</td>
                                                <td>20,50</td>
                                                <td>234,56</td>
                                                <td>7676,00</td>
                                                <td>2342,86</td>
                                                <td>4578,99</td>
                                                <td>1000,00</td>
                                                <td>456,64</td>
                                                <td>2346,90</td>
                                                <td>3242,56</td>
                                                <td>2000,00</td>
                                                <td>343,00</td>
                                                <td>23,87</td>
                                                <td>343,98</td>
                                            </tr>
                                            <tr>
                                                <td>a-D63</td>
                                                <td>10,25</td>
                                                <td>10,25</td>
                                                <td>20,50</td>
                                                <td>234,56</td>
                                                <td>7676,00</td>
                                                <td>2342,86</td>
                                                <td>4578,99</td>
                                                <td>1000,00</td>
                                                <td>456,64</td>
                                                <td>2346,90</td>
                                                <td>3242,56</td>
                                                <td>2000,00</td>
                                                <td>343,00</td>
                                                <td>23,87</td>
                                                <td>343,98</td>
                                            </tr>
                                            <tr>
                                                <td>a-D63</td>
                                                <td>10,25</td>
                                                <td>10,25</td>
                                                <td>20,50</td>
                                                <td>234,56</td>
                                                <td>7676,00</td>
                                                <td>2342,86</td>
                                                <td>4578,99</td>
                                                <td>1000,00</td>
                                                <td>456,64</td>
                                                <td>2346,90</td>
                                                <td>3242,56</td>
                                                <td>2000,00</td>
                                                <td>343,00</td>
                                                <td>23,87</td>
                                                <td>343,98</td>
                                            </tr>
                                            <tr>
                                                <td>a-D63</td>
                                                <td>10,25</td>
                                                <td>10,25</td>
                                                <td>20,50</td>
                                                <td>234,56</td>
                                                <td>7676,00</td>
                                                <td>2342,86</td>
                                                <td>4578,99</td>
                                                <td>1000,00</td>
                                                <td>456,64</td>
                                                <td>2346,90</td>
                                                <td>3242,56</td>
                                                <td>2000,00</td>
                                                <td>343,00</td>
                                                <td>23,87</td>
                                                <td>343,98</td>
                                            </tr>
                                        </tbody>
                                    </table>





                                </div>
                            <?php } ?>
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