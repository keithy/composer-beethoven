#!/usr/bin/env php
<?php
DEFINE('MASTER', "composer.json");
DEFINE('JSON5', "composer.json5");
DEFINE('NL', PHP_EOL);

$action = $argv[1];

require_once __DIR__ . "/vendor/autoload.php";

function done($ret)
{
    exit($ret);
}

if (!file_exists(MASTER)) {
    echo MASTER . " - not found", NL;
    done(1);
}

copy(MASTER, "." . MASTER . "~");

if (!file_exists(JSON5)) {
    copy(MASTER, JSON5);
    echo JSON5 . " - created for humans", NL;
    done(0);
}

$json = json5_decode(file_get_contents("composer.json5"));
$master = json_decode(file_get_contents("composer.json"));

if (json_encode($json) != json_encode($master)) {
    if (filemtime(MASTER) > filemtime(JSON5)) {
        echo MASTER . " is more recent than " . JSON5, NL;
        echo "Automatic updating of ". MASTER. " is suspended until they match", NL;
        echo "To manually update run> ${BASH_SOURCE[0]} update", NL;
        done(1);
    } else {
        echo JSON5 . " is more recent than " . MASTER, NL;

        $action = "update";
        
        // if ($action != "update") {
        //    echo "Update needed: run", NL;
        //    echo "run> beethoven update", NL;
        //    done(1);
        // }
    }
}

if ($action == "update") {
    echo "Updating...", NL;

    file_put_contents(MASTER, json_encode($json, JSON_PRETTY_PRINT));
}

done(0)
?>