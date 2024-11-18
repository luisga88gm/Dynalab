<?php
    //Start the session.
    session_start();
    if(!isset($_SESSION['user'])) header('location: login.php');

    //Get all products.
    $show_table = 'products';
    $products = include('database/show.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Productos - ERP Dynalab SRL</title>
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
                            <h1 class="section_header"><i class="fa fa-list"></i> Lista de Productos</h1>
                            <a href="./products-add.php"><button class="appBtn"><i class="fa fa-plus"></i> Agregar Producto</button></a>
                            <br>
                            <br>
                            <br>
                            <br>
                            <div class="section_content">
                                <div class="users">
                                    <?php
                                        $stmt = $conn->prepare("SELECT products.id, products.commercial_code, products.img, products.drawing, products.family, products.description, products.stock, products.price
                                        FROM products
                                        ORDER BY products.family
                                        ASC");
                                        
                                        $stmt->execute();
                                        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                        
                                        $data = [];
                                        foreach($products as $product){
                                            $data[$product['family']][] = $product;
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
                                                    <th>Plano</th>
                                                    <th>Stock</th>
                                                    <th width="20%">Descripción</th>
                                                    <th>Precio</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    foreach ($family_pos as $index => $family_prod) {
                                                ?>
                                                <tr>
                                                    <td class="lastName"><?= $family_prod['commercial_code'] ?></td>
                                                    <td class="firstName">
                                                        <img class="productImages" src="uploads/products/<?= $family_prod['img'] ?>" alt="" />
                                                    </td>
                                                    <td><a href="uploads/products/pdf/<?= $family_prod['drawing'] ?>"> 
                                                        <i class="fa fa-file-pdf-o"></i></a>
                                                    </td>
                                                    <td class="lastName"><?= number_format($family_prod['stock']) ?></td> 
                                                    <td class="email"><?= $family_prod['description'] ?></td>
                                                    <td class="lastName">U$D <?= $family_prod['price'] ?></td>
                                                    <td>
                                                        <a href="" 
                                                            class="updateProduct" 
                                                            data-pid="<?= $product['id'] ?>"> 
                                                        <i class="fa fa-pencil"></i> Editar</a> |
                                                        <a href="" 
                                                            class="deleteProduct" 
                                                            data-name="<?= $product['commercial_code'] ?>" 
                                                            data-pid="<?= $product['id'] ?>"> <i class="fa fa-trash"></i> Borrar</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <p class="userCount"><?= count($products = $family_pos) ?> Productos </p>
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