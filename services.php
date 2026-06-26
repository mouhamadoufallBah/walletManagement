<?php

function createWallet(array $newWallet, array &$wallets): bool
{
    saveWallet($newWallet, $wallets);
    return true;
}