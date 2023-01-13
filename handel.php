<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<?php

extract($_POST);

echo '<pre>';
print_r($_POST);
echo '</pre>';
echo "-------------------------";

$image=[];
$image = $_FILES['image'];

echo '<pre>';
print_r($image);
echo '</pre>';
echo "-------------------------";

$image_name = $image['name'];
$tmp_name = $image['tmp_name'];
$size = $image['size'];

$ext = pathinfo($image_name , PATHINFO_EXTENSION);
$random = uniqid();
$new_name = "$random.$ext";
move_uploaded_file($tmp_name,$new_name);


$errors = [];

if(isset($submit)){

    //name
    if(empty($fname)){
        $errors[]= 'first name is required';
        }elseif(strlen($fname)< 5 || strlen($fname) > 50 ){
            $errors[]= 'first name must be between 5 and 50 character';
            
        }
        if(empty($lname)){
            $errors[]= 'last name is required';
            }elseif(strlen($lname) < 6 || strlen($lname) > 50 ){
                $errors[]= 'last name must be between 6 and 50 character';
           
    //email            
    }if(empty($email)){
        $errors[]= 'email is required';
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format";
                
            }

    //password        
    if(empty($password)){
        $errors[]= 'password is required';
            }elseif(strlen($password) < 8 || strlen($password) > 15 ){
            $errors[]= 'password must be between 8 and 15 character';
                    
                }

    //gender            
    $genders=['male','female'];
        if(empty($gender)){
            $errors[]="must choose gender";
        }elseif(!in_array($genders,$gender)){
            $errors[] = 'enter valid gender';
        }


        // print errors
        if(count($errors) >= 1 ){
            foreach($errors as $error){ ?>

                <div class="alert alert-danger" role="alert">
                    <?= $error?>
                </div>
<?php }
        }

    }else{
        echo "bye";
    }
?>