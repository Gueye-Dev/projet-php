<?php
$etudiants = [
    ['matricule' => 'ETU001', 'email' => 'etu001@example.com', 'nom' => 'Dupont', 'prenom' => 'Jean', 'statut' => 'etudiant', 'etat' => '1'],
    ['matricule' => 'ETU002', 'email' => 'etu002@example.com', 'nom' => 'Durand', 'prenom' => 'Pierre', 'statut' => 'etudiant', 'etat' => '1'],
    ['matricule' => 'ETU003', 'email' => 'etu003@example.com', 'nom' => 'Martin', 'prenom' => 'Paul', 'statut' => 'etudiant', 'etat' => '0']
];

$admins = [
    ['matricule' => 'ADM001', 'email' => 'admin1@example.com', 'nom' => 'Admin', 'prenom' => 'John', 'statut' => 'admin', 'etat' => 'actif'],
    ['matricule' => 'ADM002', 'email' => 'admin2@example.com', 'nom' => 'Admin', 'prenom' => 'Jane', 'statut' => 'admin', 'etat' => 'actif']
];


function genererFileUtilisateurs($etudiants, $admins) {
    

    $cles = ['matricule','email', 'nom', 'prenom', 'statut', 'etat', 'mot_de_passe'];
  
    
    // Générer le fichier CSV des utilisateurs
    $chemin = 'users.csv';
    fputcsv(fopen($chemin, 'a+'), $cles);

    // Ajouter les admins au fichier CSV
    foreach ($admins as $admin) {
        $motDePasse = password_hash('sonatel@academyAD', PASSWORD_DEFAULT);
        $utilisateur = [
            'matricule' => '-',
            'email' => $admin['email'],
            'nom' => $admin['nom'],
            'prenom' => $admin['prenom'],
            'statut' => 'admin',
            'etat' => '1',
            'mot_de_passe' => $motDePasse
        ];

        fputcsv(fopen($chemin, 'w'), $utilisateur);
    }

    // Ajouter les étudiants au fichier CSV
    foreach ($etudiants as $etudiant) {
        $motDePasse = password_hash('sonatel@academyET', PASSWORD_DEFAULT); // Le mot de passe de l'étudiant est son adresse e-mail cryptée
        $utilisateur = [
            'matricule' => $etudiant['matricule'],
            'email' => $etudiant['email'],
            'nom' => $etudiant['nom'],
            'prenom' => $etudiant['prenom'],
            'statut' => 'etudiant',
            'etat' => '1',
            'mot_de_passe' => $motDePasse
        ];
        fputcsv(fopen($chemin, 'a+'), $utilisateur);
    }
}
// genererFileUtilisateurs($etudiants, $admins);

function listerTab($chemin) {
    $donnees = []; // Initialize an empty array to store the data

    // Open the CSV file in read mode
    if (($handle = fopen($chemin, "r")) !== FALSE) {
        // Read the first row to get the keys
        $keys = fgetcsv($handle, 1000, ",");
        
        // Read each subsequent row and create an associative array
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $row = [];
            foreach ($keys as $index => $key) {
                // Assign each value to its corresponding key
                $row[$key] = $data[$index];
            }
            // Add the associative array to the main array
            $donnees[] = $row;
        }
        fclose($handle); // Close the file
    } else {
        // In case of an error opening the file
        echo "Unable to open the CSV file.";
    }

    return $donnees; // Return the array containing the data
}



// Appel de la fonction avec le chemin vers le fichier CSV
//$donnees_chargees = listerTab('users.csv');

// Affichage des données chargées
?>
