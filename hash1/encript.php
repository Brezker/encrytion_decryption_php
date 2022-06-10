<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>Encript</title>
</head>

<body>
    <div class="container" style="padding-top: 5%;">
        <form method="POST">
            <label for="lname">File:</label>
            <input type="file" id="lname" name="csv_file"><br><br>
            <input type="submit" name="submit" value="Encript">
        </form>
    </div>
</body>

</html>

<?php

if (isset($_POST["submit"])) {
    /*
        $filename = $_POST['csv_file'];

        $filext = pathinfo($filename, PATHINFO_EXTENSION);

        $filedir = realpath($_POST["csv_file"]["tmp_name"]);
        
        echo '<script type="text/javascript">alert("'.$filedir.'");</script>';
        */
    $filename = $_POST['csv_file'];
    $filext = pathinfo($filename, PATHINFO_EXTENSION);

    encrypt_file($filename, 'encrypted/' . $filename, 'secret-password');
}

function encrypt_file($file, $destination, $passphrase)
{
    $handle = fopen($file, "rb") or die("could not open the file");
    $contents = fread($handle, filesize($file));
    fclose($handle);

    $iv = substr(md5("\x18\x3C\x58" . $passphrase, true), 0, 8);
    $key = substr(md5("\x2D\xFC\xD8" . $passphrase, true) . md5("\x2D\xFC\xD8" . $passphrase, true), 0, 24);
    $opts = array('iv' => $iv, 'key' => $key);
    $fp = fopen($destination, 'wb') or die("Could not open file for writing");
    stream_filter_append($fp, 'mcrypt.tripledes', STREAM_FILTER_WRITE, $opts);
    fwrite($fp, $contents) or die('Could not write to file');
    fclose($fp);
}
?>