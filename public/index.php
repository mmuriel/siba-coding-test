
<!DOCTYPE HTML>

<html>
<head>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<div class="content">
<form action="index.php" method="get">
    <h3>Insert Initial Date:</h3> <input type="date" name="initialDate"><br>
    <h3>Insert End Date:</h3> <input type="date" name="endDate"><br>
    <input type="submit" value="Send Query">
</form>
<div class="programContainer">
<?php
require_once("db-connect.php");
$conn = makeConn();
$Idate = $_GET["initialDate"];
$Edate = $_GET["endDate"];
$query = "
        SELECT tittle, programdate, sinopsis FROM `programs` WHERE `programdate` BETWEEN '$Idate' AND '$Edate';
    ";

echo "
<h1>Programs from: $Idate to $Edate</h1>
";

$result = $conn->query($query);

if (mysqli_num_rows($result) > 0) {


    $dom = new DOMDocument("1.0", "utf-8");
    $dom->formatOutput = true;

    $xml_file_name = "programacion.xml";

    $root = $dom->createElement("programacion");
    $root = $dom->appendChild($root);

    $root->setAttributeNode(new DOMAttr("inicio", $Idate));
    $root->setAttributeNode(new DOMAttr("final", $Edate));


    while($row = mysqli_fetch_assoc($result)) {
        $tittle = $row["tittle"];
        $date = $row["programdate"];
        $sinopsis = $row["sinopsis"];
        echo "
        <div class='program'>
            <div class='tittle'>
                $tittle
            </div>
            <div class='date'>
                $date
            </div>
            <div class='sinopsis'>
                $sinopsis
            </div>
        </div>
        ";

        $evento = $dom->createElement("evento");
        $evento = $root->appendChild($evento);


        $fecha = $dom->createElement("fecha-hora", $row["programdate"]);
        $titulo = $dom->createElement("titulo", $row["tittle"]);
        $sinopsis = $dom->createElement("sinopsis", $row["sinopsis"]);

        $evento->appendChild($fecha);
        $evento->appendChild($titulo);
        $evento->appendChild($sinopsis);

    }
    $dom->appendChild($root);

    $dom->save("./$xml_file_name");

    echo "<a href= $xml_file_name> $xml_file_name </a> has been successfully created";
} else {
    echo "There is no programs between these dates";
}

$conn->close();
?>
</div>
</div>
</body>
</html>

