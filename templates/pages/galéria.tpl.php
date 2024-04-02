<?php
    // Alkalmazás logika:
    include('./includes/config1.inc.php');
    
    // adatok összegyűjtése:    
    $kepek = array();   //itt tároljuk a megjelenítendő képeket, indexek a képfájlok nevei, értékek az utolsó módosítás időpontja (timestamp)
    $olvaso = opendir($MAPPA);
    while (($fajl = readdir($olvaso)) !== false) {
        // echo $fajl."<br>";
        if (is_file($MAPPA.$fajl)) {
            // echo $fajl."<br>";
            $vege = strtolower(substr($fajl, strlen($fajl)-4));
            if (in_array($vege, $TIPUSOK)) {
                $kepek[$fajl] = filemtime($MAPPA.$fajl);
            }
        }
    }
    closedir($olvaso);
    
    /*
    echo "<pre>";
    print_r($kepek);
    echo "</pre>";
    */
    
    // Megjelenítés logika:
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Galéria</title>
    <style type="text/css">
        div#galeria {margin: 0 auto}
        div.kep { display: inline-block;  
                    margin: 0 63px 0 63px }   
        div.kep img { width: 200px; }
    </style>
</head>
<body>
    <div id="galeria">
    <h1>Galéria</h1>
    <?php
    arsort($kepek);
    /*
    echo "<pre>";
    print_r($kepek);
    echo "</pre>";
    */
    
    foreach($kepek as $fajl => $datum)
    {
    ?>
        <div class="kep">
            <a href="<?= $MAPPA.$fajl ?>">
                <img src="<?= $MAPPA.$fajl ?>">
            </a>            
            <p>Név:  <?= $fajl; ?></p>
            <p>Dátum:  <?= date($DATUMFORMA, $datum); ?></p>
        </div>
    <?php
    }
    ?>
    </div>
</body>
</html>

