<?php
// Démarrez la session PHP
session_start();
require_once 'model/utilisateur.model.php';
$users = listerTab('users.csv');
// dd($users);  
if (!empty($_POST['login'])) {
    extract($_POST);
    $validator = validerDonneesLogin($email, $password);

    if (!empty($validator['email']) && !empty($validator['password'])) {
        extract($validator);
      //  dd($validator);
        $login = login($users, $email, $password);
        if (isset($login['userConnect'])) {
            $_SESSION['user'] = $login['userConnect'];  
            if($login['userconnect']['etat'] == 'admin'){
            header('Location: /promo');
            }else{
                header('Location: /presence');
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Connexion</title>
    <link rel="stylesheet" type="text/css" href="../public/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/d2ba3c872c.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="logo">
        <img src="../assets/images/Logo-Sonatel-Academy-480_1-1-removebg-preview.png" alt="">
    </div>
    <div class="container">
        <form method="post" action="">
            <div class="user-details">
                <div class="input-box">
                    <?php if (isset($email)) : ?>
                        <div class="first"><?php echo htmlspecialchars($email); ?></div>
                    <?php endif; ?>
                    <span class="details">Email address</span>
                    <input type="text" name="email"  placeholder="Enter email address*">
                    <span style="color:red"><?= isset($validator['emailError']) ? $validator['emailError'] : '' ?></span>
                </div>

                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="checkbox" id="show_hide_pwd" placeholder="Enter your password*">
                    <label class="show_hide_label" for="show_hide_pwd"></label>
                    <input type="password" name="password" placeholder="Enter password*">
                    <span style="color:red"><?= $validator['passwordError'] ?? '' ?></span>
                </div>

            </div>
            <div class="foo">
                <div class="input-checkbox">
                    <input type="checkbox">Remember me
                </div>
                <div class="passwordForget">
                    <a href="#">Mot de passe oublié ?</a>
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Login" name="login">
            </div>
        </form>
        
    </div>