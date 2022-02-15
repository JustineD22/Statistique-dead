<link rel="stylesheet" href="css/style.css">

<?php

spl_autoload_register(function ($className) {
    include './classes/' .$className .'.php';
});

$fichier = file('./files/valeurs_mensuelles.csv');
$filename = "./files/valeurs_mensuelles.csv";
$handle = fopen($filename, "rb");

    $html = "<table>";

while(!feof($handle)) {
    $ligne = fgets($handle);
    echo "<br>";
    //var_dump($ligne);


    
    $fichier = explode(";", $ligne);
    //var_dump($fichier);
    for ($i = 0; $i < 1; $i++){ 
        $html .= "<tr>";
        $html .= "<td>" . $fichier [0] ."</td>";
        $html .= "<td>" . $fichier [1] ."</td>";
        $html .= "<td>" . $fichier [2] ."</td>";
        $html .= "</tr>";
    }
   

    
} 
$html .= "</table>";
echo $html;
fclose($handle);