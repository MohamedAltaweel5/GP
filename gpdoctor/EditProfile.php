<?php 

$target_dir = "dist/img/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


if(isset($_POST['edit'])){
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  // $username = $_POST['username'];


 $connect = new mysqli("localhost","root","","pgs");
 // $qu = $connect->prepare("select doctor_id from doctor where doctor_username='$username'");
 // $qu->execute();
 // $res = $qu->get_result();
 // $rr=$res->fetch_assoc();
 

 // if($res){
 if(!empty($email) && !empty($phone)){

  $q =$connect->prepare("update doctor set doctor_email='$email',doctor_phone='$phone' where doctor_id=3");
  $q->execute();

}

if(!empty($password)){

 $q1 = $connect->prepare("update doctor set doctor_password='$password' where doctor_id=3");
 $q1->execute();
}
echo 'Data Saved Successfully';


$check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}



// }else{
//   echo 'no res';
// }


 
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["file"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


?>



































     <?php
     // mysql_connect('localhost','root','');
     // mysql_select_db('pgs');
      // if(isset($_POST['edit'])){
       // $email = $_POST['email'];
        //$phone = $_POST['phone'];
        //$password = $_POST['password'];

       // $qu = mysql_query("select doctor_id from doctor where doctor_password='$password'")

        //if(!empty($email) && !empty($phone)){

         // $q = mysql_query("update doctor set doctor_email='$email',doctor_phone='$phone' where doctor_id='$doc_id'");
         // echo 'data saved successfully';
       // }else{
        
       //  echo "error";
        //}

       // if(!empty($password)){

         // $q = mysql_query("update doctor set doctor_password='$password' where doctor_id='$doc_id'");
       // }
        
      // }
      ?>