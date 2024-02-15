<?php
if (isset($_COOKIE["user"])==FALSE){
  header("Location: http://www.e12300.com/clubWebsite/frontStage/login.php");
}
include "../include/password.php";
$clubID=$_COOKIE["user"];
// Create connection
$conn = new mysqli($servername, $un, $pw, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM clubs WHERE id = '".$clubID."'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
  $username = $row["username"];
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Q&A</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">Rockridge</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li><a href="tables.php"><i class="fa fa-table"></i> Tables</a></li>
            <li><a href="forms.php"><i class="fa fa-edit"></i> Forms</a></li>
            <li class="active"><a href="qna.html"><i class="fa fa-file"></i> Q&A</a></li>

          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
              <?php 
              echo $username;
              ?> 
              </a>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Q&A <small>Answer some questions</small></h1>
            <ol class="breadcrumb">
              <li class="active"><i class="icon-file-alt"></i> Q&A</li>
            </ol>
          </div>
        </div><!-- /.row -->
        <div style="width:70%">
        <table class="table table-hover tablesorter">
                <thead>
                  <tr>
                    <th>Unanswered Question <i class="fa fa-sort"></i></th>
                    <th>Delete <i class="fa fa-trash-o "></i></th>
                    <th>Answer <i class="fa fa-pencil"></i></th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $delete=$_GET['deleteId'];
                  $answer=$_GET['answerId'];
                  $sql2 = "SELECT * FROM qna WHERE clubID = '".$clubID."'";
                  $sql3 = "DELETE FROM qna WHERE id = '".$delete."'";
                  $conn->query($sql3);
                  $result2 = $conn->query($sql2);
                  if ($result2->num_rows > 0) {
                    // output data of each row
                    while($row = $result2->fetch_assoc()) {
                      if($row["answer"]==""){
                      echo "<tr>";
                      echo "<td>" . $row["title"]. "</td>";
                      echo "<td><a href='qna.php?deleteId=".$row["id"]."'>Delete</a></td>";
                      echo "<td><a href='qna.php?answerId=".$row["id"]."'>Answer</a></td>";
                      echo "<tr>";
                      }
                    }
                  }
                ?>
                </tbody>
        </table>
        <div style="width:40%;display:inline;">
        <?php
        if($answer!=""){
          $sql4 = "SELECT * FROM qna WHERE id = '".$answer."'";
          $result4 = $conn->query($sql4);
          while($row4 = $result4->fetch_assoc()) {
            $question = $row4["question"];
          }
          echo "
          <div style='margin-top:30px;margin-bottom:50px;'>
          <label>Question Description</label>
          <div>
          ".$question."
          </div>
          </div>
          <form action='qna.php?answerId=".$answer."' name='form' method='POST' enctype='multipart/form-data'>
          <div class='form-group'>
                  <label>Answer</label>
                  <textarea name='content' class='form-control' rows='3'></textarea>
          </div>
  
          <button name='submit' type='submit' method='post' class='btn btn-default' value='Submit'>Submit</button>
          </form>";
        }

        if(isset($_POST['submit'])){
          $content=$_POST["content"];
          date_default_timezone_set("America/Vancouver");
          $date=date("Y-m-d");
          $editSql2="UPDATE qna SET 
          answer = '$content', time='$date'
          WHERE id = $answer;";
          if ($conn->query($editSql2) === TRUE) {
            echo "<script type = 'text/javascript'>
                  alert ('Uploaded successfully');
                  </script>";
            echo "<script>location.href='qna.php';</script>";
          } else {
            echo "<script type = 'text/javascript'>
                  alert ('connection to database failed, please retry'); 
                  </script>";
          }
        }
        ?>
        </div>
        </div>
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

  </body>
</html>