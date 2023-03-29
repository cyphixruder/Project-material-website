<?php
include 'config.php';
include('function.php');
print("fuck you");
print_r($_FILES['image']);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $myPath           =     $_FILES['image'];
    $myfileName       =     $_FILES['image']['name'];
    $fileSize         =     $_FILES['image']['size'];
    $myfileTempName   =     $_FILES['image']['tmp_name'];
    $fileType         =     $_FILES['image']['type'];
    $fileError        =     $_FILES['image']['error'];

    $fileExt          =     explode('.',$myfileName);
    $fileActualExt    =     strtolower(end($fileExt));
    echo $fileActualExt;
    $allowed    =   array('jpg','jpeg','png');
    if(isset($myPath)){
        if(in_array($fileActualExt,$allowed)){
            if($fileError === 0){
                if($fileSize < 10000000){
                    $myfileNewName   = $pro_title;
                    $myfileDestination = '../upload_file/images_staff/'.$myfileNewName.'.'.$fileActualExt;
                    move_uploaded_file($myfileTempName,$myfileDestination);

                    // Insert image link into student_dashboard table
                    $sql = "UPDATE staff_dashboard SET images = ? WHERE id = $user_id";
                    if ($stmt = $conn->prepare($sql)) {
                        $stmt->bind_param("si", $myfileDestination, $user_id);
                        if ($stmt->execute()) {
                            showNotif("Image uploaded and link saved to student_dashboard.", "success");
                        } else {
                            showNotif("Error updating student_dashboard: " . $stmt->error, "info");
                        }
                        $stmt->close();
                    } else {
                        showNotif("Error updating student_dashboard: " . $conn->error, "info");
                    }
                    
                } else {
                    showNotif("This file is too big, try with a smaller file size", "info");
                }
            } else {
                showNotif("An error has occurred, try again with another file", "info");
            }
        } else {
            showNotif("This type of file cannot be uploaded. Only jpg, jpeg, and png files are allowed.", "info");
        }
    }
    
    $conn->close();
}


?>