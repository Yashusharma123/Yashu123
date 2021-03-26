
<?php
include 'connection.php';
session_start();
if(isset($_POST['start_quiz']))
{
    $level=$_POST['level'];
   $_SESSION['level']=$level;
   header('Location: ../quiz/question.php');

}
?>

<html>
<title>
Homepage
</title>
<head>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<link href='https://fonts.googleapis.com/css?family=Roboto Slab' rel='stylesheet'>
</head>
<body style="background:linear-gradient(90deg, rgba(62,17,146,1) 0%, rgba(74,29,137,1) 33%, rgba(74,40,163,1) 100%);">
<div class="container pt-5 mt-5">
<div class="row">
<div class="card">
  <div class="card-header">
    Brief Information
  </div>
  

  <div class="card-body">
    <h3 class="card-title">Instructions for the quiz</h3>
    <p class="card-text">Read the following Instructions carefully before giving the quiz. No mode of cheating will be accepted.</p>
    <p class="card-text pt-3">1. There are 3 levels of the game : Easy, Medium and Hard.</p>
    <p class="card-text">2. As per the user's selection, the system will prompt 5 questions which are of MCQ type. Each question has 4 options.</p>
    <p class="card-text">3. There is also a time of 30 seconds, after the timer is over you will be re-directed to the results page.</p>
    <div class="row">
    <div class="col-md-4">
   <form action="index.php" method="post">
    <h5 class="pt-5">Select question paper level</h5>
    <br>
    <select class="form-select" name="level" aria-label="Default select example">
   
  
  <option value="easy">easy</option>
  <option value="medium">medium</option>
  <option value="difficult">difficult</option>
</select>

    </div>
    </div>
    <br>
    <button class="btn btn-primary" type="submit" name="start_quiz">Start quiz</button>
  </div>
  </form>
</div>
</div>
</div>
</body>
</html>