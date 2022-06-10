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
    <title>Decript</title>
</head>
<body>
<div class="container" style="padding-top: 5%;">
    <label for="fname">Encripted code:</label>
    <textarea rows="5" cols="60" name="text" placeholder="Encripted"></textarea><br><br>
    <label for="fname">Decripted text:</label>
    <input type="text" id="fname" name="fname"><br><br>
    <label for="lname">Decripted file:</label>
    <input type="file" id="lname" name="lname"><br><br>
    <input type="submit" value="Decript">
</div>
</body>
</html>

<?php

if(isset($_POST["submit"])){

    $filename = $_POST['csv_file'];
            $filext = pathinfo($filename, PATHINFO_EXTENSION);

    $decrypted = decrypt_file('encrypted/'.$filename, 'secret-password');
            header('Content-type:application/png');
            fpassthru($decrypted);

}

function decrypt_file($file,$passphrase){
    $iv = substr(md5("\x18\x3C\x58".$passphrase, true),0,8);
    $key = substr(md5("\x2D\xFC\xD8".$passphrase, true).md5("\x2D\xFC\xD8".$passphrase, true),0,24);
    $opts = array('iv'=>$iv, 'key'=>$key);
    $fp = fopen($file,'rb');
    stream_filter_append($fp, 'mdecrypt.tripledes',STREAM_FILTER_READ, $opts);
    return $fp;
}

?>