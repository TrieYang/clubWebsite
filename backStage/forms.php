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
$edit=str_replace("'","''",$_GET['eventId']);
if ($edit!=""){
$editRequest=true;
$editSql = "SELECT * FROM events WHERE id = '".$edit."'";
$editResult = $conn->query($editSql);
while($editRow = $editResult->fetch_assoc()) {
  $title = $editRow["title"];
  $content = $editRow["content"];
  $picture = $editRow['picture'];
  $cover = $editRow['cover'];
}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Forms</title>

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
            <li class="active"><a href="forms.php"><i class="fa fa-edit"></i> Post</a></li>
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
            <h1>Post <small>Edit Your Posts</small></h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-edit"></i> Forms</li>
            </ol>
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-6">

            <form action="forms.php<?php if($edit!=""){echo "?eventId=".$edit;} ?>" name="form" method="POST" enctype="multipart/form-data">

              <div class="form-group">
                <label>Title</label>
                <input name="title" class="form-control" value="<?php echo $title; ?>">
              </div>

              <div class="form-group">
                <label>Cover Image</label>
                <input name="cover" type="file">
                <?php 
                if($cover!=""){
                echo $cover; 
                }
                ?>
              </div>

              <div class="form-group">
                <label>Image</label>
                <input id="file" name="file" type="file">
                <?php 
                if($picture!=""){
                echo $picture; 
                }
                ?>
              </div>

              <div class="form-group">
                <label>Text area</label>
                <textarea name="content" class="form-control" rows="3"><?php echo $content; ?></textarea>
              </div>

              <button name="submit" type="submit" method="post" class="btn btn-default" value="Submit">Submit</button>
              <button type="reset" class="btn btn-default">Reset</button>  

            </form>
            

          </div>


      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

  </body>
</html>
<?php
if(isset($_POST['submit'])){
  $allowedExts = array("gif", "jpeg", "jpg", "png");
  $temp = explode(".", $_FILES["file"]["name"]);
  $extension = end($temp);     // 获取文件后缀名
  $tempCover = explode(".", $_FILES["cover"]["name"]);
  $extensionCover = end($tempCover);   
  if($edit!=""){
    if($_FILES["file"]["name"]!=""&&$_FILES["cover"]["name"]!=""){
    //两个都更改
      if (((($_FILES["file"]["type"] == "image/gif")
      || ($_FILES["file"]["type"] == "image/jpeg")
      || ($_FILES["file"]["type"] == "image/jpg")
      || ($_FILES["file"]["type"] == "image/pjpeg")
      || ($_FILES["file"]["type"] == "image/x-png")
      || ($_FILES["file"]["type"] == "image/png"))
      && in_array($extension, $allowedExts))
      &&
      ((($_FILES["cover"]["type"] == "image/gif")
      || ($_FILES["cover"]["type"] == "image/jpeg")
      || ($_FILES["cover"]["type"] == "image/jpg")
      || ($_FILES["cover"]["type"] == "image/pjpeg")
      || ($_FILES["cover"]["type"] == "image/x-png")
      || ($_FILES["cover"]["type"] == "image/png"))
      && in_array($extensionCover, $allowedExts)
      ))
      {
        if ($_FILES["file"]["error"] > 0||$_FILES["cover"]["error"] > 0)
        {
          echo "<script type = 'text/javascript'>
          alert ('file upload error, please retry');
          </script>";
        }else{
        	//echo $_FILES["file"]["tmp_name"];
        	//echo $_FILES["cover"]["tmp_name"];
        	//exit();
          $sFileType = explode("/",$_FILES["cover"]["type"])[1];
          $sPicType = explode("/",$_FILES["file"]["type"])[1];
          $newCoverName=time().rand(10000, 99999).".".$sFileType;
          $newPicName=time().rand(10000, 99999).".".$sPicType;
          move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
          move_uploaded_file($_FILES["cover"]["tmp_name"], "upload/" . $_FILES["cover"]["name"]);
          //info uploaded in database
          $title=str_replace("'","''",$_POST["title"]);
          $content=nl2br(str_replace("'","''",$_POST["content"]));
          $coverDirect="upload/" . $newCoverName;
          $imgDirect="upload/" . $newPicName;
          $editSql2="UPDATE events SET 
          title = '$title', 
          content = '$content',
          cover = '$coverDirect', 
          picture = '$imgDirect' 
          WHERE id = $edit;";
          if ($conn->query($editSql2) === TRUE) {
            echo "<script type = 'text/javascript'>
                  alert ('Updated successfully');
                  </script>";
            echo "<script>location.href='tables.php';</script>";
          } else {
            echo "<script type = 'text/javascript'>
                  alert ('connection to database failed, please retry'); 
                  </script>";
          }
        }
        }else{
          echo "<script type = 'text/javascript'>
                alert ('Illegal image, please upload image of type gif, jpeg, jpg, pjeg, x-png, png and smaller than 200kb'); 
                </script>";
        }
    }else if($_FILES["file"]["name"]!=""){
    //更改file
      if ((($_FILES["file"]["type"] == "image/gif")
      || ($_FILES["file"]["type"] == "image/jpeg")
      || ($_FILES["file"]["type"] == "image/jpg")
      || ($_FILES["file"]["type"] == "image/pjpeg")
      || ($_FILES["file"]["type"] == "image/x-png")
      || ($_FILES["file"]["type"] == "image/png"))
      && in_array($extension, $allowedExts))
      {
        if ($_FILES["file"]["error"] > 0)
        {
          echo "<script type = 'text/javascript'>
                alert ('file upload error, please retry');
                </script>";
        }else{
        	//echo $_FILES["file"]["tmp_name"];
        	//echo "\n";
        	//echo "upload/" . $_FILES["file"]["name"];
        	//exit();
        	$sPicType = explode("/",$_FILES["file"]["type"])[1];
        	$newName=time().rand(10000, 99999).".".$sPicType;
          move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $newName);
          
          
          //info uploaded in database
          $title=str_replace("'","''",$_POST["title"]);
          $content=nl2br(str_replace("'","''",$_POST["content"]));
          $imgDirect="upload/" . $newName;
          $editSql2="UPDATE events SET 
          title = '$title', 
          content = '$content',
          picture = '$imgDirect' 
          WHERE id = $edit;";
          if ($conn->query($editSql2) === TRUE) {
            echo "<script type = 'text/javascript'>
                  alert ('Updated successfully');
                  </script>";
            echo "<script>location.href='tables.php';</script>";
          }else{
            echo "<script type = 'text/javascript'>
                  alert ('connection to database failed, please retry'); 
                  </script>";
          } 
        }
      }else{
              echo "<script type = 'text/javascript'>
                    alert ('Illegal image, please upload image of type gif, jpeg, jpg, pjeg, x-png, png and smaller than 200kb'); 
                    </script>";
      }
    }else if($_FILES["cover"]["name"]!=""){
      //更改cover
      if ((
      ((($_FILES["cover"]["type"] == "image/gif")
      || ($_FILES["cover"]["type"] == "image/jpeg")
      || ($_FILES["cover"]["type"] == "image/jpg")
      || ($_FILES["cover"]["type"] == "image/pjpeg")
      || ($_FILES["cover"]["type"] == "image/x-png")
      || ($_FILES["cover"]["type"] == "image/png"))
      && in_array($extensionCover, $allowedExts)
      )))
      {
        if ($_FILES["cover"]["error"] > 0)
        {
          echo "<script type = 'text/javascript'>
                alert ('file upload error, please retry');
                </script>";
        }else{
          $sFileType = explode("/",$_FILES["cover"]["type"])[1];
          $newName=time().rand(10000, 99999).".".$sFileType;
          move_uploaded_file($_FILES["cover"]["tmp_name"], "upload/" . $newName);
          //info uploaded in database
          $title=str_replace("'","''",$_POST["title"]);
          $content=nl2br(str_replace("'","''",$_POST["content"]));
          $coverDirect="upload/" . $newName;
          $editSql2="UPDATE events SET 
          title = '$title', 
          content = '$content',
          cover = '$coverDirect'
          WHERE id = $edit;";
          if ($conn->query($editSql2) === TRUE) {
            echo "<script type = 'text/javascript'>
                  alert ('Updated successfully');
                  </script>";
            echo "<script>location.href='tables.php';</script>";
          } else {
            echo "<script type = 'text/javascript'>
                  alert ('connection to database failed, please retry'); 
                  </script>";
          }
        }
      }else{
        echo "<script type = 'text/javascript'>
              alert ('Illegal image, please upload image of type gif, jpeg, jpg, pjeg, x-png, png and smaller than 200kb'); 
              </script>";
      }
    }else{
      //都不更改
      $title=str_replace("'","''",$_POST["title"]);
      $content=nl2br(str_replace("'","''",$_POST["content"]));
      $editSql2="UPDATE events SET 
                title = '$title', 
                content = '$content'
                WHERE id = $edit;";
      if ($conn->query($editSql2) === TRUE) {
        echo "<script type = 'text/javascript'>
              alert ('Updated successfully');
              </script>";
        echo "<script>location.href='tables.php';</script>";
      }else{
        echo "<script type = 'text/javascript'>
              alert ('connection to database failed, please retry'); 
              </script>";
        echo  $conn->error;
      }
    }
  }else{
    if (((($_FILES["file"]["type"] == "image/gif")
    || ($_FILES["file"]["type"] == "image/jpeg")
    || ($_FILES["file"]["type"] == "image/jpg")
    || ($_FILES["file"]["type"] == "image/pjpeg")
    || ($_FILES["file"]["type"] == "image/x-png")
    || ($_FILES["file"]["type"] == "image/png"))
    && in_array($extension, $allowedExts))
    &&
    ((($_FILES["cover"]["type"] == "image/gif")
    || ($_FILES["cover"]["type"] == "image/jpeg")
    || ($_FILES["cover"]["type"] == "image/jpg")
    || ($_FILES["cover"]["type"] == "image/pjpeg")
    || ($_FILES["cover"]["type"] == "image/x-png")
    || ($_FILES["cover"]["type"] == "image/png"))
    && in_array($extensionCover, $allowedExts)
    ))
    {
      if ($_FILES["file"]["error"] > 0||$_FILES["cover"]["error"] > 0)
      {
        echo "<script type = 'text/javascript'>
              alert ('file upload error, please retry');
              </script>";
      }else{
        // echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
        // echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
        // echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
        // echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";
        $sFileType = explode("/",$_FILES["cover"]["type"])[1];
        $sPicType = explode("/",$_FILES["file"]["type"])[1];
        $newCoverName=time().rand(10000, 99999).".".$sFileType;
        $newPicName=time().rand(10000, 99999).".".$sPicType;
        move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $newCoverName);
        move_uploaded_file($_FILES["cover"]["tmp_name"], "upload/" . $newPicName);
        //info uploaded in database
        date_default_timezone_set("America/Vancouver");
        $date=date("Y-m-d h:i:s");
        $title=str_replace("'","''",$_POST["title"]);
        $content=nl2br(str_replace("'","''",$_POST["content"]));
        $coverDirect="upload/" . $newCoverName;
        $imgDirect="upload/" . $newPicName;
        if($title!=""){
          $sql2 = "INSERT INTO events(title, content, cover, picture, publisherID, time) VALUES ('$title', '$content', '$coverDirect', '$imgDirect', '$clubID','$date');";
          if ($conn->query($sql2) === TRUE) {
            echo "<script type = 'text/javascript'>
                  alert ('Upload successfully');
                  </script>";
          } else {
            echo "<script type = 'text/javascript'>
            alert ('connection to database failed, please retry'); 
            </script>";
          }
        }
      }
    }else{
      echo "<script type = 'text/javascript'>
            alert ('Illegal image, please upload image of type gif, jpeg, jpg, pjeg, x-png, png and smaller than 200kb'); 
            </script>";
    }
  }
}
  $conn->close();

?>