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