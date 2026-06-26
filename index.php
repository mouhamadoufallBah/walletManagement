<?php
require_once 'repository.php';
require_once 'validators.php';
require_once 'services.php';
require_once 'controller.php';

use function App\Controller\handleCreateWallet;
use function App\Controller\handleDeposit;
use function App\Controller\handleWithdraw;
use function App\Controller\handleListTransactions;

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
            handleDeposit($wallets, $transactions);
            break;
        case '3':
            handleWithdraw($wallets, $transactions);
            break;
        case '4':
            handleListTransactions($transactions, $wallets);
            break;
        case '0':
            echo "Au revoir !\n";
            break;
        default:
            echo "Choix invalide, veuillez réessayer.\n\n";
            break;
    }
} while ($choix !== '0');
