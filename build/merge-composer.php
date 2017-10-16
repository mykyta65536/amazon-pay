<?php

const PATH_REQUIRE = 'require';
if (count($argv)<4) {
    echo 'Not enough arguments!'.PHP_EOL;
    die(1);
}
$fromComposer = json_decode(file_get_contents($argv[1]), true);
$demoshopComposer = json_decode(file_get_contents($argv[2]), true);

foreach ($fromComposer[PATH_REQUIRE] as $module => &$version) {
    if (isset($demoshopComposer[PATH_REQUIRE][$module]) && $demoshopComposer[PATH_REQUIRE][$module] > $version) {
        print sprintf("Changing %s '%s' to '%s'", $module, $version, $demoshopComposer[PATH_REQUIRE][$module]) . PHP_EOL;
        $version = $demoshopComposer[PATH_REQUIRE][$module];
    }
}

file_put_contents($argv[3], json_encode($fromComposer).PHP_EOL);