<?php
    //Start the session.
    session_start();
    if(isset($_SESSION['user'])) header('location: dashboard.php');

    if($_POST){
        include('database/connection.php');
        
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = 'SELECT * FROM users WHERE users.email="'. $username .'" AND users.password="'. $password .'"';
        $stmt = $conn->prepare($query);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $user = $stmt->fetchAll()[0];

            //Captures data of currently login users.
            $_SESSION['user'] = $user;

            header('Location: dashboard.php');
        } else $error_message = 'Por favor, asegúrese que el usuario y contraseña son correctos.';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login - ERP Dynalab SRL</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body id="loginBody">
    <?php if(!empty($error_message)) { ?>
        <div id="errorMessage">
            <strong>ERROR:</strong> </p><?= $error_message ?> </p>
        </div>
    <?php } ?>
    <div class="container">
        <div class="loginHeader">
            <h1>ERP Dynalab SRL</h1>
            <p>Sistema de Gestión Integral</p>
        </div>
        <div class="loginBody">
            <form action="login.php" method="POST">
                <div class="loginInputsContainer">
                    <label for="">Usuario</label>
                    <input placeholder="usuario@dynalab.com" name="username" type="text" />
                </div>
                <div class="loginInputsContainer">
                    <label for="">Contraseña</label>
                    <input placeholder="contraseña" name="password" type="password" />
                </div>
                <div class="loginButtonContainer">
                    <button>INGRESAR</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>