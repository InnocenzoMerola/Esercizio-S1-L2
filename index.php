<?php

echo '<pre>' . print_r($_POST, true) . '</pre>';

$name = $_POST['username'] ?? "";
$email = $_POST['email'] ?? "";
$age = $_POST['age'] ?? "";
$password = $_POST['password'] ?? "";

if($_SERVER['REQUEST_METHOD'] === 'POST'){


    $errors = [];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = 'Email non valida';
    }

    if(strlen($name) < 5 || strlen($name) > 15){
        $errors['username'] = "Il nome utente deve contenere dalle 5 alle 15 lettere";
    }
    
    
    if(strlen($password) < 10 || strlen($password) > 17){
        $errors['password'] = "La password deve contenere dalle 10 alle 17 lettere";
    }

    if($age === ""){
        $errors['age'] = "Aggiungere l'età";
    }



    if($errors === []){
        header('Location: /IFOA-BackEnd/Esercizio%20S1-L2/success.php');
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background-color: #ddd594;">
    
<div class="container" style="margin-block: 10rem">
  <div class="row justify-content-center">
    <div class="col-5">

  
<form action="" method="post" novalidate>
    <div class="row row-gap-2">
  <div class="col-12">
    <label for="username" class="form-label">Username</label>
    <input type="text" value="<?php echo $name;?>" name="username" class="form-control <?= isset($errors['username']) ? 'is-invalid' : ''?>" id="username" >
    <?= $errors['username'] ?? "" ?>
  </div>
  
  <div class="col-12">
    <label for="email" class="form-label">Email</label>
    
      <input type="text" name="email" value="<?php echo $email;?>" class="form-control <?= isset($errors['email']) ? 'is-invalid' : "" ?>" id="email" >
      <?= $errors['email'] ?? ""?>
      
  </div>
  
  <div class="col-12">
    <label for="age" class="form-label">Age</label>
    <input type="number" name="age" value="<?php echo $age;?>" class="form-control <?= isset($errors['age']) ? 'is-invalid' : ''  ?>" id="age" aria-describedby="validationServer03Feedback" >
    <?= $errors['age'] ?? '' ?>
  </div>
  <div class="col-12">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password"  class="form-control <?= isset($errors['password']) ? 'is-invalid' : "" ?>" id="password" aria-describedby="validationServer03Feedback" >
    <?= $errors['password'] ?? "" ?>
  </div>
  
  
  <div class="col-12 mt-3">
    <button class="btn btn-primary" type="submit">Submit form</button>

    </div>
</div>
</form>
</div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>