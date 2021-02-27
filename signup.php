<?php
    require 'database.php';
    $message;
    if(!empty($_POST["email"]) && !empty($_POST["password"])){
        
                $sql ="INSERT INTO users (email,password) VALUES(:email, :password)";
                $stmt = $conn->prepare($sql);   
                $stmt -> bindParam(':email',$_POST['email']);
                $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
                $stmt -> bindParam(':password',$password);
                if ($stmt->execute()){
                    $message="Succesfully created a new user";
                }else{
                    $message="Something went wrong user might already exist";
                }
            
        
       
    };
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/bonsai.css">
    <link rel="icon" href="dev/img/logobons.svg">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">    
</head>
<body>
   
    <div class="container-fluid containertop mb-5">
        <div class="row">
                <nav class="navbar navbar-expand-lg navbar-dark col-12 ">
                    <a class="navbar-brand col-2 logo-cont text-dark" href="#"> <img src="dev/img/icon.png" class ="img-fluid p-2 w-75"alt="">Bonsai Co.&reg; </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="navbar-nav w-75 mx-auto nav-justified">
                            <li class="nav-item">
                                <a class="nav-link text-dark nav-fill" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark nav-fill" href="#">Our mission</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark nav-fill" href="#">Catalogue </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark nav-fill"  href="#">Contact</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link text-dark nav-fill" href="#">LogIn/SignUp</a>
                            </li>
                        </ul>
                    </div>
                </nav>
        </div>
        <div class="row">
            <div class="col-md-6 mx-auto mt-3 text-center message">  
                <?php if(!empty($message)): ?>
                    <div class="alert alert-success" role="alert">
                        <?= $message ?> 
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-4 mx-auto mb-5 mt-5">
                <div class="card border border-success shadow-sm">
                    <div class="card-header bg-success text-white text-center">
                        <h4>SIGN UP</h4>
                        <p>or <a href="login.php">Log in</a></p>
                    </div>
                    <div class="card-body">
                        <?php include("formsignup.php");?>         
                    </div>
                </div>
                       
            </div>
        </div>
    </div>

    <div class="container-fluid container-bottom">
        
        <!--footer-->
        <?php
            include("footer.php")
        ?>
