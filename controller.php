<?php

function handleCreateWallet(array &$wallets): void
{
    echo "\n--- CRÉATION D'UN NOUVEAU WALLET ---\n";

    do {
        $phone = trim(readline("Veuillez saisir votre numéro de téléphone (ex: 77XXXXXXX) : "));

        if (isRequiredFieldEmpty($phone)) {
            echo "Erreur : Le numéro de téléphone est obligatoire.\n";
            continue;
        }
        if (!isValidPhoneNumber($phone)) {
            echo "Erreur : Format de téléphone invalide.\n";
            continue;
        }
        if (!isWalletValueUnique($phone, 'telephone', $wallets)) {
            echo "Erreur : Ce numéro de téléphone est déjà associé à un wallet.\n";
            continue;
        }
        break;
    } while (true);

    do {
        $client = trim(readline("Veuillez saisir votre Nom complet : "));

        if (isRequiredFieldEmpty($client)) {
            echo "Erreur : Le nom du client est obligatoire.\n";
            continue;
        }
        break;
    } while (true);

    do {
        $code = readline("Veuillez saisir votre Code secret (4 caractères) : ");

        if (isRequiredFieldEmpty($code)) {
            echo "Erreur : Le code secret est obligatoire.\n";
            continue;
        }
        if (!isValidCodeLength($code)) {
            echo "Erreur : Le code doit comporter exactement 4 caractères.\n";
            continue;
        }
        if (!isNumericCode($code)) {
            echo "Erreur : Le code ne doit contenir que des chiffres.\n";
            continue;
        }
        if (!isWalletValueUnique($code, 'code', $wallets)) {
            echo "Erreur : Ce code secret est déjà utilisé. Veuillez en choisir un autre.\n";
            continue;
        }
        break;
    } while (true);

    do {
        $balance = readline("Veuillez saisir le solde initial (par défaut 0) : ");
        if ($balance === "") {
            $balance = 0;
        }

        if (!is_numeric($balance) || !isBalanceValid((float)$balance)) {
            echo "Erreur : Le solde initial doit être un nombre positif ou nul.\n";
            continue;
        }
        break;
    } while (true);

    $newWallet = [
        'client' => $client,
        'telephone' => $phone,
        'code' => $code,
        'solde' => (string)$balance
    ];

    createWallet($newWallet, $wallets);
    echo "=== Wallet créé avec succès ! ===\n\n";
}

function handleDeposit(array &$wallets, array &$transactions): void
{
    echo "\n============== OPÉRATION DE DÉPÔT ==============\n";

    do {
        $phone = trim(readline("Veuillez saisir le numéro de téléphone du bénéficiaire : "));

        if (isRequiredFieldEmpty($phone)) {
            echo "Erreur : Le numéro de téléphone est obligatoire.\n";
            continue;
        }
        if (isWalletValueUnique($phone, 'telephone', $wallets)) {
            echo "Erreur : Aucun wallet n'est associé à ce numéro de téléphone.\n";
            continue;
        }
        break;
    } while (true);

    do {
        $amount = trim(readline("Veuillez saisir le montant à déposer : "));

        if ($amount === "" || !is_numeric($amount) || !isAmountStrictlyPositive((float)$amount)) {
            echo "Erreur : Le montant doit être un nombre strictement positif.\n";
            continue;
        }
        break;
    } while (true);

    executeDeposit($phone, (float)$amount, $wallets, $transactions);
    echo "=== Dépôt effectué avec succès ! ===\n\n";
}

function handleWithdraw(array &$wallets, array &$transactions): void
{
    echo "\n============== OPÉRATION DE RETRAIT ==============\n";

    do {
        $phone = trim(readline("Veuillez saisir le numéro de téléphone du client : "));

        if (isRequiredFieldEmpty($phone)) {
            echo "Erreur : Le numéro de téléphone est obligatoire.\n";
            continue;
        }
        if (isWalletValueUnique($phone, 'telephone', $wallets)) {
            echo "Erreur : Aucun wallet n'est associé à ce numéro de téléphone.\n";
            continue;
        }
        break;
    } while (true);

    do {
        $amount = trim(readline("Veuillez saisir le montant à retirer : "));

        if ($amount === "" || !is_numeric($amount) || !isAmountStrictlyPositive((float)$amount)) {
            echo "Erreur : Le montant doit être un nombre strictement positif.\n";
            continue;
        }
        break;
    } while (true);

    $success = executeWithdraw($phone, (float)$amount, $wallets, $transactions);

    if ($success) {
        echo "=== Retrait effectué avec succès ! ===\n\n";
    } else {
        echo "Erreur : Solde insuffisant pour couvrir le retrait et les frais.\n\n";
    }
}
