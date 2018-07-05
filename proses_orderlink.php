<?php
require_once 'koneksi.php';

$out=[];
if (!isset($_POST['submit'])) {
  $out['isSuccess']=false;
  $out['message']='invalid request';
}else{
  $fileName = time().'_'.$_FILES['file']['name'];
  $valid_extensions = array("jpeg", "jpg", "png");
  $temporary = explode(".", $_FILES["file"]["name"]);
  $file_extension = end($temporary);

  // $uploadedFile = '';
  if((($_FILES["gambar"]["type"] == "image/png") || ($_FILES["gambar"]["type"] == "image/jpg") || ($_FILES["gambar"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)){
      $sourcePath = $_FILES['file']['tmp_name'];
      $targetPath = "uploads/".$fileName;

      // upload image
      if(move_uploaded_file($sourcePath,$targetPath)){
          $uploadedFile = $fileName;
          
          $out['isSuccess']=true;
          $out['message']='upload success';
          $out['data']=$uploadedFile;

          // // get new username
          //   $sql1 ='SELECT
          //           MAX(l.lastnumber)as lastnumber,
          //           IFNULL(concat("'.$_POST['nama_dpn'].'",MAX(l.lastnumber)+1),"'.$_POST['nama_dpn'].'") as newusername
          //         FROM (
          //           SELECT cast(substring(username,'.strlen($_POST['nama_dpn']).')as unsigned)lastnumber
          //           FROM orderlink
          //           WHERE username LIKE "'.$_POST['nama_dpn'].'%"
          //         )l ';
          //   $exe1 = mysqli_query($conn,$sql1);
          //   $res= mysqli_fetch_assoc($exe1);
          //
          // // save new user
          //   $sql2 = 'INSERT INTO orderlink SET
          //           username="'.mysqli_real_escape_string($res['newusername']).'",
          //           nama_dpn="'.mysqli_real_escape_string($_POST['nama_dpn']).'",
          //           nama_blk="'.mysqli_real_escape_string($_POST['nama_blk']).'",
          //           gambar="'.mysqli_real_escape_string($uploadedFile).'",
          //           nomor   ="'.mysqli_real_escape_string($_POST['nomor']).'"';
          //   $exe2 = mysqli_query($conn,$sql2);
          //   $out['isSuccess']=($exe1 && $exe2)?'data has been saved ':'error '.mysqli_error($conn);
          //
      } else {
        $out['isSuccess']=false;
        $out['message']='upload image was failed';
      }
  } else {
    $out['isSuccess']=false;
    $out['message']='invalid image format';
  }
}
echo json_encode($out);
?>
