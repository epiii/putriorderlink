<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- style -->
      <!-- <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script> -->
      <script type="text/javascript" src="assets/js/jquery.js"></script>
    	<script src="assets/js/bootstrap.min.js"></script>
    	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <!-- style -->
    <title>Registrasi</title>
  </head>

  <body>
    <br>
    <div class="container">
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      <strong>Holy guacamole!</strong> You should check in on some of those fields below.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <!-- form-->
    <!-- <form action="proses_orderlink.php" method="post" enctype="multipart/form-data"> -->
      <form onsubmit="uploadImg();return false;" enctype="multipart/form-data">

        <div class="form-group">
          <label>Nama Depan</label>
          <input required name="nama_dpn" type="text" class="form-control" placeholder="nama depan">
        </div>

        <div class="form-group">
          <label>Nama Belakang</label>
          <input required name="nama_blk" type="text" class="form-control" placeholder="nama belakang">
        </div>

        <div class="form-group">
          <label>No. WA</label>
          <input required name="nomor" id="nomor" type="text" class="form-control" placeholder="WA">
        </div>

        <div class="form-group">
          <label>Foto</label>
          <input xonchange="previewImg();" required name="gambar" id="gambar" type="file" class="form-control">
        </div>

        <div class="form-group">
          <img id="previewImg" src="" width="50"  alt="">
        </div>

    		<!-- <p id="generatedUrl"> -->
    			<!-- link here -->
    		<!-- </p> -->

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </form>

    </div>
  </body>

  <script>
    $(document).ready(function(){
      //file type validation

    });

    // function previewImg() {
    //   $('file').change(function() {
    //     var file = this.files[0];
    //     var imagefile = file.type;
    //     var match= ["image/jpeg","image/png","image/jpg"];
    //     if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
    //       alert('Please select a valid image file (JPEG/JPG/PNG).');
    //       $('file').val('');
    //       return false;
    //     } else {
    //       if (input.files && input.files[0]) {
    //         var reader = new FileReader();
    //         reader.onload = function(e) {
    //           $('img').attr('src', e.target.result);
    //         }reader.readAsDataURL(input.files[0]);
    //       }
    //     }
    //   });
    // }

    function saveData(dataImg){
      $.ajax({
        url:'proses_orderlink.php',
        cache:false,
        type:'post',
        dataType:'json',
        data:$('form').serialize()+'&gambar='+dataImg,
        success:function(dt){
          setTimeout(function(){
            console.log(dt.isSuccess);
            if(dt.status==false){
              alert('gagal menyimpan data');
            }else{
              alert('berhasil menyimpan data');
              resetForm();
            }
          },700);
        }
      });
    }

    function resetForm() {
      alert('reseted form');
    }

    function Old_uploadImg() {
      var fd = new FormData();
      var files = $('file')[0].files[0];
      fd.append('file',files);

      $.ajax({
        url: 'proses_orderlink.php',
        type: 'post',
        data: fd,
        dataType:'json',
        contentType: false,
        processData: false,
        beforeSend: function(){
            $('form').attr("disabled",true);
            $('form').css("opacity",".5");
        },
        success: function(res){
          alert(res.isSuccess);
          saveForm(res.data);
          $('form').css("opacity","");
          $('form').removeAttr("disabled");
        }, error : function (xhr, status, errorThrown) {
          alert('error : ['+xhr.status+'] '+errorThrown);
        }

      });
    }

    function uploadImg(filesAdd) {
      $.ajax({
          url: dir+'?upload=images',
          type: 'POST',
          data: filesAdd,
          cache: false,
          dataType: 'json',
          processData: false,// Don't process the files
          contentType: false,//Set content type to false as jq 'll tell the server its a query string request
          success: function(res, textStatus, jqXHR){
              if(res.isSuccess == true){ //gak error
                  saveData(res.gambar);
              }else{ //error
                  alert('upload failed');
              }
          },error: function(jqXHR, textStatus, errorThrown){
              alert('error'+textStatus);
          }
      });
    }

    function saveForm () {
      var files =new Array(), isExist=false;
      $("input:file").each(function() {
          files.push($(this).get(0).files[0]);
      });
      var filesAdd = new FormData();
      $.each(files, function(key, value){
          filesAdd.append (key, value);
      });
      uploadImg(filesAdd);
    }

	function waGenerator(){
		var number = $('#number').val();
		var message = $('#message').val();
		$.ajax({
			url:'process.php',
			data:{
				'mode':'phoneConvert',
				'number':number
			},type:'post',
			dataType:'json',
			success:function(ret){
				var generatedText='';
				if(ret.number=='unknown'){ // valid number (right digit & prefix)
					generatedText ='<span style="color:red;">please check again, your number is invalid</span>';
				} else { // invalid number
					var urlx = 'https://wa.me/'+ret.number+'/?text='+encodeURI(message);
					generatedText = '<a target="_blank" href="'+urlx+'">'+urlx+'</a>';
				}
				$('#generatedUrl').html(generatedText);
	        }, error : function (xhr, status, errorThrown) {
	            console.log('['+xhr.status+'] '+errorThrown);
	        }
      });
    }

    function saveform(){
        // var urlx ='&mode=phonesave';
        // $.ajax({
        //     url:'process.php',
        //     cache:false,
        //     type:'post',
        //     dataType:'json',
        //     data:$('form').serialize()+urlx,
        //     success:function(dt){
        //     	// console.log(dt.status);
        //       if(dt.status==false){
        //       	alert('Gagal menyimpan data');
        //       }else{
        //         resetform();
        //       	alert('Berhasil menyimpan data');
        //       }
        //     }
        // });
    }

	    function resetform() {
      //   $('#number').focus();
      //   $('#country').val('');
	    	// $('#number').val('');
	    	// $('#number_new').val('');
	    }
  </script>
</html>
