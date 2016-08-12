<meta charset="utf-8">
<?php

$json = '{"Alp \u0130\u00e7er":100,"Ahmet Ekti":95,"Bur\u00e7ak S\u00f6zen":85}';

$decoded = json_decode($json, true);


die(var_dump($decoded));