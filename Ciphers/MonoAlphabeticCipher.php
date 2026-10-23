<?php

/**
 * Mono alphabetic cipher.
 *
 * PHP version 8.2
 *
 * @category Ciphers
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

// A mono-alphabetic cipher is a simple substitution cipher
// https://www.101computing.net/mono-alphabetic-substitution-cipher/

/**
 * Mono alphabetic cipher.
 *
 * @param string $key      The key.
 * @param mixed  $alphabet The alphabet.
 * @param mixed  $text     The text.
 *
 * @return false|string
 */
function monoAlphabeticCipher(string $key, $alphabet, $text): false|string
{
    $cipherText = ''; // the cipher text (can be decrypted and encrypted)

    // check if the text length matches
    if (strlen($key) !== strlen((string) $alphabet)) {
        return false;
    }

    $text = preg_replace('/\d+/', '', (string) $text); // remove all the numbers

    for ($i = 0; $i < strlen((string) $text); $i++) {
        $index = strripos((string) $alphabet, $text[$i]);
        if ($text[$i] === " ") {
            $cipherText .= " ";
        } else {
            $cipherText .= (
                ctype_upper($text[$i]) ? strtoupper($key[$index]) : $key[$index]
            );
        }
    }

    return $cipherText;
}

/**
 * Ma encrypt.
 *
 * @param mixed $key      The key.
 * @param mixed $alphabet The alphabet.
 * @param mixed $text     The text.
 *
 * @return string|false
 */
function maEncrypt($key, $alphabet, $text): string|false
{
    return monoAlphabeticCipher($key, $alphabet, $text);
}

/**
 * Ma decrypt.
 *
 * @param mixed $key      The key.
 * @param mixed $alphabet The alphabet.
 * @param mixed $text     The text.
 *
 * @return string|false
 */
function maDecrypt($key, $alphabet, $text): string|false
{
    return monoAlphabeticCipher($alphabet, $key, $text);
}
