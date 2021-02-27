<?php
session_start();
require 'database.php';
if(isset($_SESSION['user_id'])){
    $records = $conn->prepare('SELECT id,email,password FROM users WHERE id=:id');
    $records->bindParam(':id',$_SESSION['user_id']);
    $records->execute();
    $results = $records ->fetch(PDO::FETCH_ASSOC);
    $user = null;
    
    if(count($results)>0){
        $user = $results;   
    }
} 
require 'head.php';
?>
<body>
   
    <div class="container-fluid containertop">
        <?php require 'navbar.php'?>
        <?php if(!empty($user)):?>
        <br>Welcome <?=$user['email'] ?><br>
        <br>You are succesfully logged in<br>
        <a href="logout.php">Log out</a>
        <?php else: ?>
            <h1 class="text-center">Please log in or sign up</h1>
        <?php endif;?>    
        <?php require 'contentconttop.php';?>  
    </div>
    <div class="container-fluid container-bottom ">
        <!-- slider-->
        <?php  include 'slider.php'?>
    
        <!-- Pie de pagina after slider-->
   
        <div class="row">
            <div class="col-12 mx-auto ">
                <div class="jumbotron text-center jumb" >
                        <h1>OMAIGAD</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa fugit debitis reiciendis atque voluptatem ex fugiat corporis laboriosam! Laudantium voluptatibus sunt, necessitatibus minima iure id eaque totam voluptates iste alias.</p>
                </div>
            </div>             
        </div>
        <!--footer-->
        <?php include "footer.php";?>
