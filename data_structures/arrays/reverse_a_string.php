<?php
function reverse(string $str): string {
    $strArray = str_split($str);
    $reversedArray = [];
    $strLength = count($strArray);

    for ($i = $strLength - 1; $i >= 0; $i--) {
        $reversedArray[] = $strArray[$i];
    }

    return implode('', $reversedArray);
}

echo reverse('Hello World') . "\n"; //dlroW olleH
echo reverse('Hi My name is Douglas') . "\n"; //salguoD si eman yM iH