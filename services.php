<?php

function createWallet(array $newWallet, array &$wallets): bool
{
    saveWallet($newWallet, $wallets);
    return true;
}

function executeDeposit(string $phone, float $amount, array &$wallets, array &$transactions): bool
{
    $index = findWalletIndexByPhone($phone, $wallets);
    
    $currentBalance = (float)$wallets[$index]['solde'];
    $newBalance = $currentBalance + $amount;
    
    updateWalletBalance($index, $newBalance, $wallets);
    
    $newTransaction = [
        'idClient' => $index,
        'montant' => $amount,
        'type' => 'Depot',
        'frais' => 0
    ];
    
    saveTransaction($newTransaction, $transactions);
    return true;
}

function calculateWithdrawFees(float $amount): float
{
    if ($amount <= 10000) {
        return 200.0;
    } elseif ($amount <= 100000) {
        return 500.0;
    } else {
        $fees = $amount * 0.01;
        if ($fees > 5000) {
            return 5000.0;
        }
        return $fees;
    }
}

function executeWithdraw(string $phone, float $amount, array &$wallets, array &$transactions): bool
{
    $index = findWalletIndexByPhone($phone, $wallets);
    $currentBalance = (float)$wallets[$index]['solde'];
    
    $fees = calculateWithdrawFees($amount);
    $totalRequired = $amount + $fees;

    if (!hasSufficientFunds($currentBalance, $totalRequired)) {
        return false;
    }

    $newBalance = $currentBalance - $totalRequired;
    updateWalletBalance($index, $newBalance, $wallets);

    $newTransaction = [
        'idClient' => $index,
        'montant' => -$amount,
        'type' => 'Retrait',
        'frais' => $fees
    ];

    saveTransaction($newTransaction, $transactions);
    return true;
}