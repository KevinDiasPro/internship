<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php require('menu.php'); ?>
    <?php
    require('config.php');
    session_start();
    if (isset($_POST['login']) && isset($_POST['password'])) {
        $login = stripslashes($_REQUEST['login']);
        $login = mysqli_real_escape_string($conn, $login);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        $query = "SELECT * FROM user WHERE login='$login' and password='" . hash('sha256', $password) . "'";
        $result = mysqli_query($conn, $query);
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['login'] = $login;
            $_SESSION['authentificated'] = true;
            header("Location: index.php");
        } else {
            $message = "Le login ou le mot de passe est incorrect.";
        }
    }
    ?>

    <form class="box" action="" method="post" name="login">
        <h2 class="box-title">Connexion</h2>
        <div class="form-group">
            <label for="login"><b>Login</b></label>
            <input type="text" class="box-input" name="login" id="login" aria-describedby="loginHelp" placeholder="Enter login">
        </div>
        <div class="form-group">
            <label for="password"><b>Password</b></label>
            <input type="password" class="box-input" name="password" id="password" placeholder="Password">
        </div>
        <button type="submit" value="Connexion " name="submit" class="btn btn-primary">Log in</button>
    </form>

    <?php if (!empty($message)) { ?>
        <p class="errorMessage"><?php echo $message; ?></p>
    <?php } ?>
    </form>
</body>

</html>