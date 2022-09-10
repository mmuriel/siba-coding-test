<?php
require_once("db-connect.php");
class DataLoader{

    private $dataFile, $dataRead;

    function __construct(){
        $this->dataFile = fopen("../docs/TV-GLOBO.txt","r") or die("Unable to open file!");
        $this->dataRead = fread($this->dataFile, filesize("../docs/TV-GLOBO.txt"));
    }

    function insertData(): void
    {
        $conn = makeConn();
        $query = "
            CREATE TABLE IF NOT EXISTS programs (
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                tittle VARCHAR(100) NOT NULL,
                sinopsis VARCHAR(1000) NOT NULL,
                programdate DATETIME NOT NULL
            );
        ";
        if($conn->query($query)===TRUE){
            echo "INSERTED CORRECTLY\n";
        }
        else{
            echo "ERROR" . $conn->error;
            echo "\n";
        }

        $split = explode("\n",$this->dataRead);
        $currDate = "";
        for ($i = 0; $i < sizeof($split); $i++){
            $line = preg_split('/-{3}/', $split[$i]);

            if(sizeof($line) == 1){
                $currDate = $line[0];
            }
            else{
                $query = "INSERT INTO programs (tittle, sinopsis, programdate)
                VALUES ('$line[1]','$line[2]',STR_TO_DATE('$line[0] $currDate', '%k:%i %Y-%c-%d'));";

                if($conn->query($query)===TRUE){
                    echo "INSERTED CORRECTLY\n";
                }
                else{
                    echo "ERROR" . $conn->error;
                    echo "\n";

                }
            }
        }
        fclose($this->dataFile);
        $conn->close();
    }

}

$parse = new DataLoader();
$parse->insertData();

?>
