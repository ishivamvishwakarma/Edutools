<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->
<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3" style="font-family: 'Heebo', sans-serif;">
    <nav class="navbar bg-light navbar-light">
        <a href="dashboard.php" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary">
                <img src="img/edu_logo1.png" alt="logo" style="width: 40px; height: 40px; border-radius: 50%;">
                Edutools.io
            </h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="img/about.png" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <?php
                $uid = $_SESSION['ocasuid'];
                $sql = "SELECT * from  tbluser where ID=:uid";
                $query = $dbh->prepare($sql);
                $query->bindParam(':uid', $uid, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                $cnt = 1;
                if ($query->rowCount() > 0) {
                    foreach ($results as $row) { ?>
                        <h6 class="mb-0"><?php echo $row->FullName; ?></h6>
                        <span><?php echo $row->Email; ?></span><?php $cnt = $cnt + 1;
                                                            }
                                                        } ?>
            </div>
        </div>
        <div class="navbar-nav w-100 text-start">

            <a href="dashboard.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <div class="nav-item dropdown">

                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-book me-2"></i>Notes</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="add-notes.php" class="dropdown-item">Add Notes</a>
                    <a href="manage-notes.php" class="dropdown-item">Manage Notes</a>
                </div>
                <a href="chatbot.php" class="nav-item nav-link "><i class="fa fa-robot me-2"></i>AI Chatbot</a>
                
                <a href="youtube.php" class="nav-item nav-link "><i class="fa fa-video me-2"></i>Note Maker</a>
                <a href="/123/notes.php" class="nav-item nav-link "><i class="fa fa-eye me-2"></i>Views Notes</a>
                <a href="/123/feedback_form.php" class="nav-item nav-link "><i class="fa fa-comment me-2"></i>Feedback</a>


            </div>

        

        </div>
    </nav>
</div>
<!-- Sidebar End -->