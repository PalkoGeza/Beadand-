
    

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Galéria</title>
    <style type="text/css">
        label { display: block; }
    </style>
</head>
<body>
    <h1>Feltöltés a galériába:</h1>
<?php
    if (!empty($uzenet))
    {
        echo '<ul>';
        foreach($uzenet as $u)
            echo "<li>$u</li>";
        echo '</ul>';
    }
?>
    <form action="feltoltes.php" method="post"
                enctype="multipart/form-data">
        <input type="hidden" name="max_file_size" value="600000">
        <label>Fájlok:
            <input type="file" name="fajlok[]" accept="image/png, image/jpeg" multiple required>
        </label>
        <input type="submit" name="kuld">
      </form>    
</body>
</html>
