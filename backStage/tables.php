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

    <title>Tables</title>

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
          <a class="navbar-brand">
            Rockridge
          </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li class="active"><a href="tables.php"><i class="fa fa-table"></i> Tables</a></li>
            <li><a href="forms.php"><i class="fa fa-edit"></i> Post</a></li>
            <li><a href="qna.php"><i class="fa fa-file"></i> Q&A</a></li>
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
            <h1>Tables <small>Sort Your Data</small></h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-table"></i> Tables</li>
            </ol>
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-6">
            <h2>Events</h2>
            <div class="table-responsive">
              <table class="table table-hover tablesorter">
                <thead>
                  <tr>
                    <th>Events <i class="fa fa-sort"></i></th>
                    <th>Visits <i class="fa fa-sort"></i></th>
                    <th>Delete <i class="fa fa-trash-o "></i></th>
                    <th>Edit <i class="fa fa-pencil"></i></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $delete=$_GET['eventId'];
                  $sql2 = "SELECT id, title, clicked FROM events WHERE publisherID = '".$clubID."'";
                  $sql3 = "DELETE FROM events WHERE id = '".$delete."'";
                  $conn->query($sql3);
                  $result2 = $conn->query($sql2);
                  if ($result2->num_rows > 0) {
                    // output data of each row
                    while($row = $result2->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td>" . $row["title"]. "</td>";
                      echo "<td>" . $row["clicked"]. "</td>";
                      echo "<td><a href='tables.php?eventId=".$row["id"]."'>Delete</a></td>";
                      echo "<td><a href='forms.php?eventId=".$row["id"]."'>Edit</a></td>";
                      echo "<tr>";
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="col-lg-6">
            <h2>Q&A</h2>
            <div class="table-responsive">
              <table class="table table-hover table-striped tablesorter">
                <thead>
                  <tr>
                    <th>Answered Questions <i class="fa fa-sort"></i></th>
                    <th>Delete <i class="fa fa-sort"></i></th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $qnaDelete=$_GET['qnaId'];
                  $sql2 = "SELECT * FROM qna";
                  $sql3 = "DELETE FROM qna WHERE id = '".$qnaDelete."'";
                  $conn->query($sql3);
                  $result2 = $conn->query($sql2);
                  if ($result2->num_rows > 0) {
                    // output data of each row
                    while($row = $result2->fetch_assoc()) {
                      if($row["answer"]!=""){
                      echo "<tr>";
                      echo "<td>" . $row["title"]. "</td>";
                      echo "<td><a href='qna.php?qnaId=".$row["id"]."'>Delete</a></td>";
                      echo "<tr>";
                      }
                    }
                  }
                  ?>

                </tbody>
              </table>
            </div>
          </div>
        </div><!-- /.row -->

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>

  </body>
</html>