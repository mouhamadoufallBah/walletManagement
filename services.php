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