<?php

// Données initiales pour simulation (vides ou démo pour le moment)
$wallets = [];
$transactions = [];

do {
    echo "** Menu Distributeur **\n";
    echo "1 - Créer Wallet\n";
    echo "2 - Faire Dépôt\n";
    echo "3 - Faire Retrait\n";
    echo "4 - Lister les Transactions\n";
    echo "0 - Quitter\n";

    $choix = trim(readline("Votre choix : "));

    switch ($choix) {
        case '1':
            echo "Option 'Créer Wallet' sélectionnée (Fonctionnalité en cours de développement...)\n\n";
            break;
        case '2':
            echo "Option 'Faire Dépôt' sélectionnée (Fonctionnalité en cours de développement...)\n\n";
            break;
        case '3':
            echo "Option 'Faire Retrait' sélectionnée (Fonctionnalité en cours de développement...)\n\n";
            break;
        case '4':
            echo "Option 'Lister les Transactions' sélectionnée (Fonctionnalité en cours de développement...)\n\n";
            break;
        case '0':
            echo "Au revoir !\n";
            break;
        default:
            // RG 0.2 : Gestion des erreurs de saisie
            echo "Choix invalide, veuillez réessayer.\n\n";
            break;
    }

} while ($choix !== '0');