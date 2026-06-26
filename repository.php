<?php

function saveWallet(array $newWallet, array &$wallets): void
{
    $wallets[] = $newWallet;
}

function findWalletByField(string $value, string $field, array $wallets): ?array
{
    foreach ($wallets as $wallet) {
        if ($wallet[$field] === $value) {
            return $wallet;
        }
    }
    return null;
}

function findWalletIndexByPhone(string $phone, array $wallets): int
{
    foreach ($wallets as $index => $wallet) {
        if ($wallet['telephone'] === $phone) {
            return $index;
        }
    }
    return -1;
}

function updateWalletBalance(int $index, float $newBalance, array &$wallets): void
{
    $wallets[$index]['solde'] = (string)$newBalance;
}

function saveTransaction(array $transaction, array &$transactions): void
{
    $transactions[] = $transaction;
}