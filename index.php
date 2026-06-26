<?php
require_once 'repository.php';
require_once 'validators.php';
require_once 'services.php';
require_once 'controller.php';

$wallets = [
    [
        'client' => 'Idy',
        'telephone' => '771234567',
        'code' => '1334',
        'solde' => '0'
    ],
    [
        'client' => 'Issa',
        'telephone' => '771234537',
        'code' => '1364',
        'solde' => '0'
    ]
];
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
            handleCreateWallet($wallets);
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
            echo "Choix invalide, veuillez réessayer.\n\n";
            break;
    }
} while ($choix !== '0');
