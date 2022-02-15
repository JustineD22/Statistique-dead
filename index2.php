<link rel="stylesheet" href="css/style.css">

<?php

spl_autoload_register(function ($className) {
    include './classes/' .$className .'.php';
});

$fichier = file('./files/valeurs_mensuelles.csv');
$filename = "./files/valeurs_mensuelles.csv";
$handle = fopen($filename, "r");

$test = new File("./files/valeurs_mensuelles.csv", "r");



$html = "<table>";
$html .= "<tr>";
$html .= "<th>Dates</th>";
$html .= "<th>Nombre de décés</th>";
$html .= "<th>Lettre</th>";
$html .= "</tr>";

for ($i = 4; $i < count($fichier); $i++){
    $html .= "<tr>";
    $html .= "<td>" . 
        $fichier[$i][1].$fichier[$i][2].$fichier[$i][3].$fichier[$i][4].$fichier[$i][5].$fichier[$i][6].$fichier[$i][7]
        ."</td>";
    $html .= "<td>" . 
    $fichier[$i][11].$fichier[$i][12].$fichier[$i][13].$fichier[$i][14].$fichier[$i][15]
    ."</td>";
    $html .= "<td>" . $fichier[$i][19]. "</td>";
    $html .= "</tr>";
}
$html .= "</table>";

echo ($html);