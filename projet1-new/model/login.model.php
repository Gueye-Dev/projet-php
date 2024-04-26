<?php

function validerDonneesLogin($email, $password)
{
    $erreur = [];

    if (empty($email)) {
        $erreur['emailError'] = "Veuillez renseigner votre email";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreur['emailError'] = "Le format de l'email n'est pas valide";
    }

    if (empty($password)) {
        $erreur['passwordError'] = "Veuillez renseigner votre mot de passe";
    }

    if (!empty($erreur)) {
        return $erreur;
    } else {
        return ['email' => $email, 'password' => $password];
    }
}

function login($users, $email, $password)
{
    $userConnect = false;

    foreach ($users as $user) {
        if ($user['email'] == $email && password_verify($password, $user['mot_de_passe'])) {
            if ($user["etat"] == "1") {
                $userConnect = $user;
                break; // Utilisateur trouvé et connecté, pas besoin de continuer la boucle
            } elseif ($user['etat'] == "0") {
                return "Compte suspendu, veuillez contacter l'administrateur.";
            }
        }
    }

    if ($userConnect === false) {
        return "Identifiant ou mot de passe incorrect.";
    }

    return ['userConnect' => $userConnect];
}
?>