<?php 
    session_start();
    require 'database.php';
    
    if(!empty($_POST["email"]) && !empty($_POST["password"])){       
        $records = $conn->prepare("SELECT id,email,password FROM users WHERE email=:email");   
        $records -> bindParam(':email',$_POST['email']);
        $records -> execute();
        $results-> $records->fetch(PDO::FETCH_ASSOC); 
        $message="";     
        
        if (count($results) > 0 && password_verify($_POST['password'],$results['password'])){
            $_SESSION['user_id'] = $results['id'];
            header('Location: index.php');
        }else{
            $message = "Sorry credentials doesn't match";
        }
    };
?>
<?php require 'head.php'?>
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
                                <a class="nav-link text-dark nav-fill" href="signup.php">LogIn/SignUp</a>
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
            <div class="col-md-3 mx-auto mb-5 mt-5">
                <div class="card border border-success">
                    <div class="card-header bg-success text-white text-center">
                        <h4>Log In</h4>
                        <p>or <a href="signup.php">Sign Up</a></p>
                    </div>
                    <div class="card-body">
                        <?php include("formlogin.php")?>       
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
