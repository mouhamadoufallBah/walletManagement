<?php

function isRequiredFieldEmpty(string $value): bool
{
    return $value === '';
}

function isBalanceValid(float $balance): bool
{
    return $balance >= 0;
}

function isValidPhoneNumber(string $phone): bool
{
    return preg_match('/^(77|78|76|70|75)[0-9]{7}$/', $phone);
}

function isValidCodeLength(string $code): bool
{
    return strlen($code) === 4;
}

function isNumericCode(string $code): bool
{
    return preg_match('/^[0-9]+$/', $code);
}

function isWalletValueUnique(string $value, string $field, array $wallets): bool
{
    return findWalletByField($value, $field, $wallets) === null;
}

function isAmountStrictlyPositive(float $amount): bool
{
    return $amount > 0;
}