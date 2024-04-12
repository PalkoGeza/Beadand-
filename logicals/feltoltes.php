  <?php 
    include('./includes/config1.inc.php');
    $uzenet = array();   

    if (isset($_POST['kuld'])) {
        
       
        
        $fajlok = $_FILES["fajlok"];
        for($i = 0; $i < count($fajlok["name"]); $i++) {
            if ($fajlok['error'][$i] == 4)    
                $uzenet[] = "Nem töltött fel fájlt";
            elseif ($fajlok['error'][$i] == 1   
                        or $fajlok['error'][$i] == 2   
                        or $fajlok['size'][$i] > $MAXMERET) 
                $uzenet[] = " Túl nagy állomány: " . $fajlok['name'][$i];
            elseif (!in_array($fajlok['type'][$i], $MEDIATIPUSOK))
                $uzenet[] = " Nem megfelelő típus: " . $fajlok['name'][$i];
            else {
                $vegsohely = $MAPPA.strtolower($fajlok['name'][$i]);
                if (file_exists($vegsohely))
                    $uzenet[] = " Már létezik: " . $fajlok['name'][$i];
                else {
                    move_uploaded_file($fajlok['tmp_name'][$i], $vegsohely);
                    $uzenet[] = ' Ok: ' . $fajlok['name'][$i];
                }
            }
        }        
    }
    ?>