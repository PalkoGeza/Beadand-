<?php
    
    include('./includes/config1.inc.php');
    
      
    $kepek = array();   
    $olvaso = opendir($MAPPA);
    while (($fajl = readdir($olvaso)) !== false) {
        
        if (is_file($MAPPA.$fajl)) {
        
            $vege = strtolower(substr($fajl, strlen($fajl)-4));
            if (in_array($vege, $TIPUSOK)) {
                $kepek[$fajl] = filemtime($MAPPA.$fajl);
            }
        }
    }
    closedir($olvaso);
    
   
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

