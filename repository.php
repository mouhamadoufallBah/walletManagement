<?php
namespace App\Repository;

function saveWallet(array $newWallet, array &$wallets): void
{
    $wallets[] = $newWallet;
}

function findWalletByField(string $value, string $field, array $wallets): ?array
{
    $result = array_filter($wallets, function ($wallet) use ($value, $field) {
        return $wallet[$field] === $value;
    });

    return $result ? array_shift($result) : null;
}

function findWalletIndexByPhone(string $phone, array $wallets): int
{
    $index = array_search($phone, array_column($wallets, 'telephone'));
    return $index !== false ? $index : -1;
}

function updateWalletBalance(int $index, float $newBalance, array &$wallets): void
{
    $wallets[$index]['solde'] = (string)$newBalance;
}

function saveTransaction(array $transaction, array &$transactions): void
{
    $transactions[] = $transaction;
}

function getAllTransactions(array $transactions): array
{
    return $transactions;
}