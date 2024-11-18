<?php
    //Start the session.
    session_start();
    if(!isset($_SESSION['user'])) header('location: login.php');

    //Get all products.
    $show_table = 'stock';
    $stock = include('database/show.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Stock - ERP Dynalab SRL</title>
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
                            <h1 class="section_header"><i class="fa fa-archive"></i> Stock de Productos</h1>
                            <a href="./stock-add.php"><button class="appBtn"><i class="fa fa-plus"></i> Cargar Productos al Stock</button></a>
                            <br>
                            <br>
                            <br>
                            <br>
                            <div class="section_content">
                                <div class="users">
                                    <?php
                                        $stmt = $conn->prepare("SELECT stock.id, stock.internal_code, stock.description, stock.family, stock.setting, stock.material, stock.quantity, stock.weight, stock.cost, stock.img
                                        FROM stock
                                        ORDER BY stock.family
                                        ASC");
                                        
                                        $stmt->execute();
                                        $stock = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                        
                                        $data = [];
                                        foreach($stock as $stock){
                                            $data[$stock['family']][] = $stock;
                                        }
                                    ?>
                                    <?php
                                        foreach($data as $family_id => $family_pos){
                                    ?>
                                    <div class="poList" id="container-<?= $family_id ?>">
                                        <p><?= $family_id ?></p>
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Código</th>
                                                    <th>Imágen</th>                                                    
                                                    <th width="20%">Descripción</th>
                                                    <th>Disposición</th>
                                                    <th>Stock</th>
                                                    <th>Precio</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    foreach ($family_pos as $index => $family_prod) {
                                                ?>
                                                <tr>
                                                    <td class="lastName"><?= $family_prod['internal_code'] ?></td>
                                                    <td class="firstName">
                                                        <img class="productImages" src="uploads/products/<?= $family_prod['img'] ?>" alt="" />
                                                    </td>                                                    
                                                    <td class="email"><?= $family_prod['description'] ?></td>
                                                    <td class="email"><?= $family_prod['setting'] ?></td>
                                                    <td class="lastName"><?= number_format($family_prod['quantity']) ?></td>
                                                    <td class="lastName">U$D <?= $family_prod['cost'] ?></td>
                                                    <td>
                                                        <a href="" 
                                                            class="updateProduct" 
                                                            data-pid="<?= $stock['id'] ?>"> 
                                                        <i class="fa fa-pencil"></i> Editar</a> |
                                                        <a href="" 
                                                            class="deleteProduct" 
                                                            data-name="<?= $stock['internal_code'] ?>" 
                                                            data-pid="<?= $stock['id'] ?>"> <i class="fa fa-trash"></i> Borrar</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <p class="userCount"><?= count($stock = $family_pos) ?> Productos </p>
                                    </div>
                                    <?php } ?>
                                </div>
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