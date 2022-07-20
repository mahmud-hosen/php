<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
    
   
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <h2> 
                <?php
                $fname = '';
                $lname = '';


                ?>
                <?php  if(isset($_GET['fname'])) { ?>
                    <?php $fname = htmlspecialchars($_GET['fname']);  ?>
                 <?php } ?> 

                 <?php  if(isset($_GET['lname']) && !empty($_GET['lname']) ) { ?>
                    <?php $lname = $_GET['lname'];  ?>
                 <?php } ?>
            </h2>

            <p> <?php echo $fname;  ?> </p>
 
        </div>

        <div class="row">

            <form action="" method="GET" >
                <label for="fname">First Name</label>
                <input type="text" name="fname" value="<?php echo $fname;  ?>">

                <label for="lname">Last Name</label>
                <input type="text" name="lname">

                <input class="button-primary" type="submit" value="Send">
            </form>
        </div>
    </div>
</body>
</html>