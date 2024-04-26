<?php

function genererCSV()
{
    // Récupérer les données des apprenants
    $apprenants = listeApprenant();

    // Ouvrir un fichier CSV en écriture
    $file = fopen('apprenants.csv', 'w');
    // Ajouter les données des apprenants dans le fichier CSV
    foreach ($apprenants as $apprenant) {
        fputcsv($file, $apprenant);
    }

    // Fermer le fichier
    fclose($file);

    return 'Fichier CSV généré avec succès.';
}

// Fonction pour charger les données des apprenants à partir d'un fichier CSV
function chargerCSV($file_path)
{
    // Vérifier si le fichier existe
    if (file_exists($file_path)) {
        // Ouvrir le fichier CSV en lecture
        $file = fopen($file_path, 'r');

        // Initialiser un tableau pour stocker les données des apprenants
        $apprenants = [];

        // Lire le fichier ligne par ligne et ajouter les données dans le tableau
        while (($data = fgetcsv($file)) !== false) {
            $apprenants[] = [
                'Nom' => $data[0],
                'Prenom' => $data[1],
                'Referentiel' => $data[2],
                'Email' => $data[3],
                'Genre' => $data[4],
                'Telephone' => $data[5],
                'idPromo' => $data[6]
            ];
        }

        // Fermer le fichier
        fclose($file);

        return $apprenants;
    } else {
        return 'Le fichier CSV n\'existe pas.';
    }
}


function chargerApprenantsFiltres($file_path, $idPromo)
{
    // Vérifier si le fichier existe
    if (file_exists($file_path)) {
        // Ouvrir le fichier CSV en lecture
        $file = fopen($file_path, 'r');

        // Initialiser un tableau pour stocker les données des apprenants filtrés
        $apprenants_filtres = [];

        // Lire le fichier ligne par ligne et ajouter les données des apprenants filtrés dans le tableau
        while (($data = fgetcsv($file)) !== false) {
            if ($data[6] == $idPromo) {
                $apprenants_filtres[] = [
                    'Nom' => $data[0],
                    'Prenom' => $data[1],
                    'Referentiel' => $data[2],
                    'Email' => $data[3],
                    'Genre' => $data[4],
                    'Telephone' => $data[5],
                    'idPromo' => $data[6],
                    'id' => $data[7]
                ];
            }
        }

        // Fermer le fichier
        fclose($file);

        return $apprenants_filtres;
    } else {
        return 'Le fichier CSV n\'existe pas.';
    }
}




// Fonction pour obtenir une liste d'apprenants 
function listeApprenant()
{
    return [
        [
            "Nom" => "Balde",
            "Prenom" => "Sidy",
            "Referentiel" => "Dev Web",
            "Email" => "elign@gmail.com",
            "Genre" => "M",
            "Telephone" => "789308563",
            'idPromo' => 1,
            'id' => 1
        ],
        [
            "Nom" => "Gueye",
            "Prenom" => "Ada",
            "Referentiel" => "Dev Web",
            "Email" => "ada@gmail.com",
            "Genre" => "M",
            "Telephone" => "789308563",
            'idPromo' => 1,
            'id' => 2
        ],
        [
            "Nom" => "Diop",
            "Prenom" => "Aziz",
            "Referentiel" => "Dev Data",
            "Email" => "elign@gmail.com",
            "Genre" => "M",
            "Telephone" => "789308563",
            'idPromo' => 6,
            'id' => 3
        ],
        [
            "Nom" => "Seck",
            "Prenom" => "Rama",
            "Referentiel" => "Hackeuse",
            "Email" => "elign@gmail.com",
            "Genre" => "M",
            "Telephone" => "789308563",
            'idPromo' => 6,
            'id' => 4
        ],
        [
            "Nom" => "Diop",
            "Prenom" => "Fama",
            "Referentiel" => "Dev Web",
            "Email" => "elign@gmail.com",
            "Genre" => "M",
            "Telephone" => "789308563",
            'idPromo' => 4,
            'id' => 5
        ],
        [
            "Nom" => "Lo",
            "Prenom" => "Mansour",
            "Referentiel" => "Referent Digital",
            "Email" => "elign@gmail.com",
            "Genre" => "M",
            "Telephone" => "789308563",
            'idPromo' => 3,
            'id' => 6
        ],
        [
            "Nom" => "Ngom",
            "Prenom" => "Amina",
            "Referentiel" => "Referent Digital",
            "Email" => "elign@gmail.com",
            "Genre" => "M",
            "Telephone" => "789308563",
            'idPromo' => 4,
            'id' => 7
        ],
        [
            "Nom" => "Ba",
            "Prenom" => "Fatima",
            "Referentiel" => "Referent Digital",
            "Email" => "elign@gmail.com",
            "Genre" => "M",
            "Telephone" => "789308563",
            'idPromo' => 4,
            'id' => 8
        ],
        [
            "Nom" => "Sy",
            "Prenom" => "Anta",
            "Referentiel" => "Dev Web",
            "Email" => "elign@gmail.com",
            "Genre" => "M",
            "Telephone" => "789308563",
            'idPromo' => 2,
            'id' => 9
        ],
        [
            "Nom" => "Mbengue",
            "Prenom" => "Alphonse",
            "Referentiel" => "Dev Web",
            "Email" => "elign@gmail.com",
            "Genre" => "M",
            "Telephone" => "789308563",
            'idPromo' => 2,
            'id' => 10
        ],
        [
            "Nom" => "Preira",
            "Prenom" => "Augustin",
            "Referentiel" => "Referent Digital",
            "Email" => "elign@gmail.com",
            "Genre" => "M",
            "Telephone" => "789308563",
            'idPromo' => 3,
            'id' => 11
        ],
        [
            "Nom" => "Souare",
            "Prenom" => "Fatou",
            "Referentiel" => "Referent Digital",
            "Email" => "elign@gmail.com",
            "Genre" => "M",
            "Telephone" => "789308563",
            'idPromo' => 3,
            'id' => 12
        ],
        [
            "Nom" => "Beye",
            "Prenom" => "Modou",
            "Referentiel" => "Dev Data",
            "Email" => "elign@gmail.com",
            "Genre" => "M",
            "Telephone" => "789308563",
            'idPromo' => 5,
            'id' => 13
        ],
        [
            "Nom" => "Goudiaby",
            "Prenom" => "Alexis",
            "Referentiel" => "AWS",
            "Email" => "elign@gmail.com",
            "Genre" => "M",
            "Telephone" => "789308563",
            'idPromo' => 6,
            'id' => 14
        ],
        [
            "Nom" => "Deme",
            "Prenom" => "Khadim",
            "Referentiel" => "Dev Data",
            "Email" => "elign@gmail.com",
            "Genre" => "M",
            "Telephone" => "789308563",
            'idPromo' => 6,
            'id' => 15
        ],
        [
            "Nom" => "Mbaye",
            "Prenom" => "Moustapha",
            "Referentiel" => "Dev Data",
            "Email" => "elign@gmail.com",
            "Genre" => "M",
            "Telephone" => "789308563",
            'idPromo' => 5,
            'id' => 16
        ],

        [
            "Nom" => "Ndione",
            "Prenom" => "Pauline",
            "Referentiel" => "Referent Digital",
            "Email" => "elign@gmail.com",
            "Genre" => "M",
            "Telephone" => "789308563",
            'idPromo' => 4,
            'id' => 17
        ],

        [
            "Nom" => "Mbodj",
            "Prenom" => "Mouhamadou",
            "Referentiel" => "Dev Web",
            "Email" => "elign@gmail.com",
            "Genre" => "M",
            "Telephone" => "789308563",
            'idPromo' => 4,
            'id' => 18
        ],
        [
            "Nom" => "Traore",
            "Prenom" => "Mouhamed",
            "Referentiel" => "Dev Data",
            "Email" => "elign@gmail.com",
            "Genre" => "M",
            "Telephone" => "789308563",
            'idPromo' => 4,
            'id' => 19
        ],

        [
            "Nom" => "Mbacke",
            "Prenom" => "Bousso",
            "Referentiel" => "Dev Data",
            "Email" => "elign@gmail.com",
            "Genre" => "M",
            "Telephone" => "789308563",
            'idPromo' => 4,
            'id' => 20
        ],

        [
            "Nom" => "Diene",
            "Prenom" => "Marlene",
            "Referentiel" => "Dev Data",
            "Email" => "elign@gmail.com",
            "Genre" => "M",
            "Telephone" => "789308563",
            'idPromo' => 4,
            'id' => 21
        ],
        [
            "Nom" => "Anne",
            "Prenom" => "Moussa",
            "Referentiel" => "Referent Digital",
            "Email" => "elign@gmail.com",
            "Genre" => "M",
            "Telephone" => "789308563",
            'idPromo' => 4,
            'id' => 22

        ],

        [
            "Nom" => "Monteiro",
            "Prenom" => "Christine",
            "Referentiel" => "Referent Digital",
            "Email" => "elign@gmail.com",
            "Genre" => "M",
            "Telephone" => "789308563",
            'idPromo' => 4,
            'id' => 23
        ],
        [
            "Nom" => "Faye",
            "Prenom" => "Youssou",
            "Referentiel" => "AWS",
            "Email" => "elign@gmail.com",
            "Genre" => "M",
            "Telephone" => "789308563",
            'idPromo' => 5,
            'id' => 24
        ],

        [
            "Nom" => "Faye",
            "Prenom" => "Youssou",
            "Referentiel" => "AWS",
            "Email" => "elign@gmail.com",
            "Genre" => "M",
            "Telephone" => "789308563",
            'idPromo' => 5,
            'id' => 25
        ],

        [
            "Nom" => "Aw",
            "Prenom" => "Absa",
            "Referentiel" => "Hackeuse",
            "Email" => "elign@gmail.com",
            "Genre" => "M",
            "Telephone" => "789308563",
            'idPromo' => 5,
            'id' => 26
        ],

        [
            "Nom" => "Saleh",
            "Prenom" => "Amina",
            "Referentiel" => "Hackeuse",
            "Email" => "elign@gmail.com",
            "Genre" => "M",
            "Telephone" => "789308563",
            'idPromo' => 5,
            'id' => 27
        ],
        [
            "Nom" => "Bah",
            "Prenom" => "Boubabacar",
            "Referentiel" => "Dev Web",
            "Email" => "elign@gmail.com",
            "Genre" => "M",
            "Telephone" => "789308563",
            'idPromo' => 5,
            'id' => 28
        ],

        [
            "Nom" => "Niang",
            "Prenom" => "Nafi",
            "Referentiel" => "Dev Data",
            "Email" => "elign@gmail.com",
            "Genre" => "M",
            "Telephone" => "789308563",
            'idPromo' => 5,
            'id' => 29
        ],

        [
            "Nom" => "Yattassaye",
            "Prenom" => "Issa",
            "Referentiel" => "AWS",
            "Email" => "elign@gmail.com",
            "Genre" => "M",
            "Telephone" => "789308563",
            'idPromo' => 4,
            'id' => 30
        ],
    ];
}
