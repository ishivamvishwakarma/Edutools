<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ocasuid']==0)) {
  header('location:logout.php');
} else {
  if(isset($_POST['submit'])) {
    $ocasuid = $_SESSION['ocasuid'];
    $subject = $_POST['subject'];
    $notestitle = $_POST['notestitle'];
    $notesdesc = $_POST['notesdesc'];
    $file1 = $_FILES["file1"]["name"];
    
    $extension1 = substr($file1, strlen($file1) - 4, strlen($file1));
    $file2 = $_FILES["file2"]["name"];
    $extension2 = substr($file2, strlen($file2) - 4, strlen($file2));
    $file3 = $_FILES["file3"]["name"];
    $extension3 = substr($file3, strlen($file3) - 4, strlen($file3));
    $file4 = $_FILES["file4"]["name"];
    $extension4 = substr($file4, strlen($file4) - 4, strlen($file4));
    $allowed_extensions = array(".txt", ".jpeg",".jpg",".docx", ".pdf");

    if(!in_array($extension1, $allowed_extensions)) {
      // Store form data in session variables
      $_SESSION['subject'] = $subject;
      $_SESSION['notestitle'] = $notestitle;
      $_SESSION['notesdesc'] = $notesdesc;
      echo "<script>alert('File has Invalid format. Only txt / jpeg / docx / pdf format are allowed');</script>";
    } else {
      $file1 = md5($file).time().$extension1;
      if($file2 != ''):
        $file2 = md5($file).time().$extension2; 
      endif;
      if($file3 != ''):
        $file3 = md5($file).time().$extension3; 
      endif;
      if($file4 != ''):
        $file4 = md5($file).time().$extension4; 
      endif;
      move_uploaded_file($_FILES["file1"]["tmp_name"], "folder1/".$file1);
      move_uploaded_file($_FILES["file2"]["tmp_name"], "folder2/".$file2);
      move_uploaded_file($_FILES["file3"]["tmp_name"], "folder3/".$file3);
      move_uploaded_file($_FILES["file4"]["tmp_name"], "folder4/".$file4);

      $sql = "insert into tblnotes(UserID,Subject,NotesTitle,NotesDecription,File1,File2,File3,File4)values(:ocasuid,:subject,:notestitle,:notesdesc,:file1,:file2,:file3,:file4)";
      $query = $dbh->prepare($sql);
      $query->bindParam(':ocasuid', $ocasuid, PDO::PARAM_STR);
      $query->bindParam(':subject', $subject, PDO::PARAM_STR);
      $query->bindParam(':notestitle', $notestitle, PDO::PARAM_STR);
      $query->bindParam(':notesdesc', $notesdesc, PDO::PARAM_STR);
      $query->bindParam(':file1', $file1, PDO::PARAM_STR);
      $query->bindParam(':file2', $file2, PDO::PARAM_STR);
      $query->bindParam(':file3', $file3, PDO::PARAM_STR);
      $query->bindParam(':file4', $file4, PDO::PARAM_STR);

      $query->execute();

      $LastInsertId = $dbh->lastInsertId();
      if ($LastInsertId > 0) {
        // Clear session data after successful submission
        unset($_SESSION['subject']);
        unset($_SESSION['notestitle']);
        unset($_SESSION['notesdesc']);
        echo '<script>alert("Notes has been added.")</script>';
        echo "<script>window.location.href ='add-notes.php'</script>";
      } else {
        echo '<script>alert("Something Went Wrong. Please try again")</script>';
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edutools || Notes</title>
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        #loader {
            display: none;
            position: fixed;
            z-index: 999;
            height: 100%;
            width: 100%;
            overflow: show;
            margin: auto;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            background: rgba(255, 255, 255, 0.8);
            text-align: center;
        }
        #loader .spinner-border {
            margin-top: 20%;
        }
    </style>
    <script>
        function showLoader() {
            document.getElementById('loader').style.display = 'block';
        }
    </script>
</head>
<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
<?php include_once('includes/sidebar.php');?>
        <!-- Content Start -->
        <div class="content">
         <?php include_once('includes/header.php');?>
            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Add Notes</h6>
                            <h6 style="color: red;">Supported file formats: .pdf, .text, .docx, .jpeg, .jpg</h6>
                            <form method="post" enctype="multipart/form-data" onsubmit="showLoader()">
                                <div class="mb-3">
                                    <label for="exampleInputEmail2" class="form-label">Notes Title</label>
                                    <input type="text" class="form-control" name="notestitle" value="<?php echo isset($_SESSION['notestitle']) ? $_SESSION['notestitle'] : ''; ?>" required='true'>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail2" class="form-label">Subject</label>
                                    <input type="text" class="form-control" name="subject" value="<?php echo isset($_SESSION['subject']) ? $_SESSION['subject'] : ''; ?>" required='true'>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail2" class="form-label">Notes Description</label>
                                    <textarea class="form-control" name="notesdesc" required='true'><?php echo isset($_SESSION['notesdesc']) ? $_SESSION['notesdesc'] : ''; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail2" class="form-label">Upload File</label>
                                    <input type="file" class="form-control" name="file1" required='true'>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail2" class="form-label">More File</label>
                                    <input type="file" class="form-control" name="file2">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail2" class="form-label">More File</label>
                                    <input type="file" class="form-control" name="file3">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail2" class="form-label">More File</label>
                                    <input type="file" class="form-control" name="file4">
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Add</button>
                            </form>
                            <div id="loader">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <p>Uploading files, please wait...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form End -->
        </div>
        <!-- Content End -->
    </div>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>