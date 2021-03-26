
<?php
session_start();
include 'connection.php';
if(isset($_SESSION['level']))

{
    $level=$_SESSION['level'];
    $query="SELECT correct_answer FROM questions WHERE question_type='".$level."'";
    $run=mysqli_query($db,$query);

    while($row=mysqli_fetch_array($run)){
        $answer=$row['correct_answer'];
       $_SESSION['answer']=$answer;

       
    }

    $query2="SELECT answer FROM response";
    $run2=mysqli_query($db,$query2);

    while($row2=mysqli_fetch_array($run2))
    {
        $answer_sub=$row2['answer'];
       $_SESSION['answer_sub']=$answer_sub;


    }
$counter=0;
if($_SESSION['answer']==$_SESSION['answer_sub'])
{
    $counter=$counter+5;
    
    $_SESSION['counter']=$counter;

}
}
?>
<html>
<title>
result
</title>
<head>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<link href='https://fonts.googleapis.com/css?family=Roboto Slab' rel='stylesheet'>
</head>
<body>
<body style="background:linear-gradient(90deg, rgba(62,17,146,1) 0%, rgba(74,29,137,1) 33%, rgba(74,40,163,1) 100%);">
<div class="container pt-5 mt-5">
<div class="row">
<div class="card">
  <div class="card-header">
  Result
  </div>
  

  <div class="card-body">
    <h3 class="card-title">Here's your result</h3>
    <p class="card-text">Each question carries 1 marks</p>
<h5>You scored &nbsp;<?php echo $_SESSION['counter']; ?> marks</h5>
</div>
</div>
</div>
</div>
</div>
</body>
</html>