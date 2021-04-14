<?php
/**
 * Só conta os bytes dos textos num arquivo json
 * */
$filename = $argv[1];

if (!file_exists($filename)) {
    print "\nArquivo inválido\n";
    die;
}

$content = file_get_contents($filename);
$json = json_decode($content, true);

if ($json == null) {
    print "\nPor enquanto só aceita .json\n";
    die;
}

$tamanhoStrings = 0;
foreach ($json as $key => $value) {
    if (is_array($value)) {
        foreach ($value as $newKey => $newValue) {
            if (is_array($newValue)) {
                print "\nPow véi você precisa aperfeiçoar o script\n";
                die;
            }

            if ($newValue == "") {
                continue;
            }

            $tamanhoStrings += strlen(str_replace(" ", "", trim($newValue)));
        }

        continue;
    }
    
    if ($value == "") {
        continue;
    }
    
    $tamanhoStrings += strlen(str_replace(" ", "", trim($value)));
}

print $tamanhoStrings;
print "\n";
