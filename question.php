
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }

    var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', function () {
  myInput.focus()
})


</script>
<script>
         setTimeout(function(){
            window.location.href = '/quiz/result.php';
         }, 30000);
      </script>


    

<?php
session_start();
include 'connection.php';

?>

<html>
<title>
question        
</title>
<head>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<link href='https://fonts.googleapis.com/css?family=Roboto Slab' rel='stylesheet'>
</head>

<style>
.scroll{

max-height:70vh;
overflow-y:auto;
}
</style>
</style>
<body style="background:linear-gradient(90deg, rgba(62,17,146,1) 0%, rgba(74,29,137,1) 33%, rgba(74,40,163,1) 100%);">
<div class="container pt-5 mt-5">

<div class="row">
<form action="question.php" method="post">
<div class="card scroll">
  <div class="card-header">
   Time left = 30 seconds
  </div>
  
  
  <div class="card-body pt-3">
  <?php
if(isset($_SESSION['level']))
{
    
    $level=$_SESSION['level'];
    $query="SELECT * FROM questions WHERE question_type='".$level."'";
    $run=mysqli_query($db,$query);

    $array=array();
    $question_array=array();
  
    global $question_array;
        global $array;

   while($row=mysqli_fetch_array($run))
   {
       $question=$row['question'];
       $option1=$row['option_1'];
       $option2=$row['option_2'];
       $option3=$row['option_3'];
       $option4=$row['option_4'];
       $sno=$row['sno'];

       $GLOBALS['id']=$sno;
       $GLOBALS['question']=$question;
       $GLOBALS['option1']=$option1;
       $GLOBALS['option2']=$option2;
       $GLOBALS['option3']=$option3;
       $GLOBALS['option4']=$option4;


       array_push($array,$GLOBALS['id']);
  
   array_push($question_array,$GLOBALS['question']);

 
 
?>
  <div class="card">


  <h5 class="card-header" style="background-color:#ff5881;"><?php echo "Q: ".$GLOBALS['id']; ?></h5>
  <div class="card-body">
    <h5 class="card-title"><?php echo $GLOBALS['question']; ?></h5>
    
    <input type="radio" name="<?php echo $GLOBALS['id']; ?>" value="<?php echo $GLOBALS['option1']; ?>" > <?php echo $GLOBALS['option1']; ?> <br>
    <input type="radio" name="<?php echo $GLOBALS['id']; ?>" value="<?php echo $GLOBALS['option2']; ?>" > <?php echo $GLOBALS['option2']; ?> <br>
    <input type="radio" name="<?php echo $GLOBALS['id']; ?>" value="<?php echo $GLOBALS['option3']; ?>" > <?php echo $GLOBALS['option3']; ?> <br>
    <input type="radio" name="<?php echo $GLOBALS['id']; ?>" value="<?php echo $GLOBALS['option4']; ?>" > <?php echo $GLOBALS['option4']; ?> 
 
</div>
</div>
   <?php }}?>
   <button type="submit" name="submit_test" class="btn btn-primary mt-3">Submit</button>
   </form>
</div>
    </div>    
    </div>

</div>

<?php
if(isset($_POST['submit_test']))
{
    for($i=0;$i<count($array);$i++)
    {
     
  
      $qid=$array[$i];
    
      $question=$question_array[$i];
      $answer=$_POST[$qid];
      
      $query="INSERT INTO response(question,qid,answer) VALUES ('$question','$qid','$answer')";
      $output=mysqli_query($db,$query);
  
  header('Location: ../quiz/result.php');
    }
  
}
?>

</body>
</head>
</html>
  