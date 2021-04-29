
<?php

if(!isset($_SESSION)){
    session_start();
}

$locale = @$_SESSION['locale'];

$file_monsters = "./.cache/monsters.json";
$file_raid_bosses = "./.cache/raid-bosses.json";
$file_util = "./.cache/util.json";
global $file_localePkmnData;
$file_localePkmnData = "./.cache/localePkmnData_".$locale.".json";

global $repo_poracle;
$repo_poracle="https://raw.githubusercontent.com/KartulUdus/PoracleJS/develop";
$repo_poracle_cache="24";

global $repo_pogoinfo;
$repo_pogoinfo = "https://raw.githubusercontent.com/ccev/pogoinfo/info";
$repo_pogoinfo_cache="2";

// Cache Monsters.json

global $monsters_json;
if (file_exists($file_monsters) && (filemtime($file_monsters) > (time() - 60 * 60 * $repo_poracle_cache ))) { 
    $monsters_json = file_get_contents($file_monsters);

} else { 
    $monsters_json = file_get_contents($repo_poracle."/src/util/monsters.json");
    file_put_contents($file_monsters, $monsters_json);
}

// Cache Util.json

global $grunts_json;
if (file_exists($file_util) && (filemtime($file_util) > (time() - 60 * 60 * $repo_poracle_cache ))) { 
    $grunts_json = file_get_contents($file_util);

} else { 
    $grunts_json = file_get_contents($repo_poracle."/src/util/util.json");
    file_put_contents($file_util, $grunts_json);
}

// Cache raid-bosses.json

global $bosses_json;
if (file_exists($file_raid_bosses) && (filemtime($file_raid_bosses) > (time() - 60 * 60 * $repo_poracle_cache ))) {
    $bosses_json = file_get_contents($file_raid_bosses);

} else {
    $bosses_json = file_get_contents($repo_pogoinfo."/raid-bosses.json");
    file_put_contents($file_raid_bosses, $bosses_json);
}

// Cache pokemonNames locale file

global $localePkmnData_json;
if (file_exists($file_localePkmnData) && (filemtime($file_localePkmnData) > (time() - 60 * 60 * $repo_poracle_cache ))) {
    $localePkmnData_json = file_get_contents($file_localePkmnData);

} else {
    $localePkmnData_json = file_get_contents($repo_poracle."/src/util/locale/pokemonNames_".$locale.".json");
    file_put_contents($file_localePkmnData, $localePkmnData_json);
}


?>