<?php

require("models/users.php");

$message = "";

function showMessage ($message){
    if( isset($message)){
        echo '<p role="alert">' .$message. '</p>';
        } 
} 

$modelUsers = new Users();

if (isset($_SESSION["user_id"])){
    $currentUser = $modelUsers->findUserById($_SESSION["user_id"]);
}

if (isset($_POST["send"])){
    if(!empty($_POST["email"]) && empty($_POST["password"])){
        $message = "To change the email the password is required";
    }
    else {
        if(empty($_POST["username"])){
            $_POST["username"] = $currentUser["username"];
        }
        if(empty($_POST["email"])){
            $_POST["email"] = $currentUser["email"];
        }
        if(empty($_POST["password"])){
            $_POST["password"] = $currentUser["password"];
        }
        else if(!empty($_POST["password"])){
            $_POST["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
        }
        $modelUsers->updateUserInfo($_POST, $_SESSION["user_id"]);
    }
}

require("views/useraccount.php");

// <?php
// // echo "<pre>";
// // print_r($_FILES);
// // echo "</pre>";

// $allowed_formats = [

//     "pdf" => "application/pdf",
//     "docx" => "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
//     "odt" => "application/vnd.oasis.opendocument.text",
//     "jpg" => "image/jpeg"
// ];

// if ( isset($_POST["send"])) {
//     if(
//         !empty($_POST["full_name"]) &&
//         mb_strlen($_POST["full_name"]) <= 120 &&
//         $_FILES["cv"]["error"] === 0 &&
//         $_FILES["cv"]["size"] > 0 &&
//         $_FILES["cv"]["size"] <= 2 * 1024 * 1024 && //menor ou igual a 2MB
//         in_array($_FILES["cv"]["type"], $allowed_formats)
//         // ... mais validações dos outros campos
//     ) {

//         $file_extension = array_search($_FILES["cv"]["type"], $allowed_formats);
//         $filename = date("YmHis") . "_" . mt_rand(100000, 999999) . "." . $file_extension;

//         move_uploaded_file($_FILES["cv"]["tmp_name"], "uploads/" . $filename);
//     }
// }

// ?>

// <!DOCTYPE html>
// <html lang="pt">
//     <head>
//         <meta charset="utf-8">
//         <title>Como lidar com uplaod de ficheiros</title>
//     </head>
//     <body>
//         <h1>Submeta o seu CV</h1>
//         <form method="POST" action="file11.php" enctype="multipart/form-data">
//             <div>
//                 <label>
//                     Nome
//                     <input type="text" name="full_name" required>
//                 </label>
//             </div>

//             <div>
//                 <label>
//                     Cargo
//                     <select name="job">
//                         <option >Professor</option>
//                         <option >Canalizador</option>
//                         <option >Programador</option>
//                     </select>
//                 </label>
//             </div>
//             <div>
//                 <label>
//                     Curriculum
//                     <input type="file" name="cv" required accept="<?= implode(",", $allowed_formats) ?>">
//                 </label>
//             </div>
//             <div>
//                 <button type="submit" name="send">Enviar</button>
//                 </label>
//             </div>

//         </form>
//     </body>
// </html>