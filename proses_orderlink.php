<?php

$sql1 ='SELECT
          MAX(l.lastnumber)as lastnumber,
          IFNULL(concat("'.$_POST['nama_dpn'].'",MAX(l.lastnumber)+1),"'.$_POST['nama_dpn'].'") as newusername
        FROM (
          SELECT cast(substring(username,'.strlen($_POST['nama_dpn']).')as unsigned)lastnumber
          FROM orderlink
          WHERE username LIKE "'.$_POST['nama_dpn'].'%"
          )l ';
          $exe1 = mysqli_query($conn,$sql1);
          $res= mysqli_fetch_assoc($exe1);


$sql2 = 'INSERT INTO orderlink SET
username="'.mysqli_real_escape_string($res['newusername']).'",
nama_dpn="'.mysqli_real_escape_string($_POST['nama_dpn']).'",
nama_blk="'.mysqli_real_escape_string($_POST['nama_blk']).'",
nomor   ="'.mysqli_real_escape_string($_POST['nomor']).'"

';
$exe2 = mysqli_query($conn,$sql2);
var_dump($_POST);
?>
