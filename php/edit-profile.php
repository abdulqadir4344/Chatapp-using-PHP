



<?php
    session_start();
    include_once "config.php";

$update_fname = mysqli_real_escape_string($conn, $_POST['update_fname']);
$update_lname = mysqli_real_escape_string($conn, $_POST['update_lname']);
$update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

if(!empty($update_fname) && !empty($update_lname) && !empty($update_email)){

$query = mysqli_query($conn, "UPDATE users SET fname = '$update_fname' ,lname = '$update_lname',email = '$update_email' WHERE unique_id = {$_SESSION['unique_id']}");
if($query){
    echo "successfully Updated the details";
    
}else{
    echo "Something went wrong. Please try again!";
}
}


                        if(isset($_FILES['image'])){
                            $img_name = $_FILES['image']['name'];
                            $img_type = $_FILES['image']['type'];
                            $tmp_name = $_FILES['image']['tmp_name'];
                            
                            $img_explode = explode('.',$img_name);
                            $img_ext = end($img_explode);
            
                            $extensions = ["jpeg", "png", "jpg"];
                            if(in_array($img_ext, $extensions) === true){
                                $types = ["image/jpeg", "image/jpg", "image/png"];
                                if(in_array($img_type, $types) === true){
                                    $time = time();
                                    $new_img_name = $time.$img_name;
                                    if(move_uploaded_file($tmp_name,"images/".$new_img_name)){
                                        $query2 = mysqli_query($conn, "UPDATE users SET img = '$new_img_name' WHERE unique_id = {$_SESSION['unique_id']}");
                                    
                                    
                                    }
                                }
                            }
                        }























?>


