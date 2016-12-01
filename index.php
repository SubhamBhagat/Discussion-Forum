<?php
require './dbconnect.php';

if (isset($_POST['submit'])) {
    date_default_timezone_set('Asia/Kolkata'); 
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $comment = mysqli_real_escape_string($conn, $_POST['content']);
    $date = date("Y-m-d H:i:s");

    $query = "insert into user_comments (Serial_no,Name,Comment,Time) values ('','$name','$comment','$date'); ";
    $res = mysqli_query($conn, $query);
    header("location: index.php");
}

$select = mysqli_query($conn, "select * from user_comments order by Serial_no  ");
?>



<!DOCTYPE html>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">

        <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="styles.css" rel="stylesheet" type="text/css">

        <script src="bootstrap-3.3.7-dist/js/jquery.min.js"></script>
        <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <script src="bootstrap-3.3.7-dist/fonts/glyphicons-halflings-regular.eot"></script>

        <title>Discussion Board</title>
    </head>
    <header>

        <a href="index.php" style=" text-decoration: none "><center><h1 class="jumbotron"  >Discussion Board</h1>  </center> </a>
    </header>

    <body > 

        <div class="scrollbar" id="barstyle" style="background-color: #e3e4e4" >
            <br><br><br><br><br><br>
            <div class="force-overflow">
                
                <?php
                while ($row = mysqli_fetch_assoc($select)) {
                    
                    echo '<div class="media media-bottom " ><b>&nbsp' .$row['Name'].'</b>&nbsp<br><p>
                          '.$row['Comment'].'<br><div class="help-block pull-right" style="font-size: 13px">
                              '.$row['Time'].'</div>
                    
                </div>';
                }
                ?>

            </div>
            
        </div>
        <div class="container">
            
        </div>
        <div class="container-fluid">
        <form action="index.php" method="post">
            <div class="form-group-lg ">
                <br>
                
                <div class="col-lg-11" style="background-color: #404444;border-radius: 12px;">
                    <br>
                    <label >Post a comment</label>
                    <input class="form-control" type="text" name="name" placeholder="Enter your Name" required> <br><br>
                    
                    <textarea class="panel" rows="5" cols="60" name="content" style="resize: none" placeholder="Your comments here.." required></textarea>
                    <button style="background-color:#05ece1" type="submit" name="submit" class="btn  btn-lg btn-info pull-right">..<i class="glyphicon glyphicon-send"></i></button>
                </div>
            </div>
        </form>
        </div>
           



    </body>
    <br><br>
    <footer class="navbar" >
        <p>
            This site is completly bulit upon Bootstrap. <br>
            Dated: Dec 1, 2016<br>
            Author: Subham Kumar<br>
            Mail-ID: <a href="mailto:subhambhagat2@gmail.com" style="color: white">subhambhagat2@gmail.com</a><br>
        </p>
    </footer>
</html>