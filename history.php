<?php

$file_name = $_FILES["file"]["name"];
echo $file_name."<br>";
$docroot = $_POST["domain"];
echo $docroot."<br>";

$updir = $docroot;
$sizelim = "no";
$size = "250000000000000000000000000"; 
$upcert = "no"; 
$type = "application/x-zip-compressed";

if ($file_name == "") {
die("Dosya seçilmemiþ");
}

move_uploaded_file($_FILES["file"]["tmp_name"],
      "$docroot/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "$docroot/" . $_FILES["file"]["name"];

?>