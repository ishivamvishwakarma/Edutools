<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ocasuid'] == 0)) {
    header('location:logout.php');
} else {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edutools || Dashboard</title>

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0&family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />

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
    <link href="../AI Chatbot/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">

        <?php include_once('includes/sidebar.php'); ?>
        <!-- Content Start -->
        <div class="content">
            <?php include_once('includes/header.php'); ?>

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <marquee behavior="scroll" direction="left" scrollamount="8" style="color: red; font-size: 15px;">This is temporary chatbot... will not save any data in database. Thank you!</marquee>
                    <!-- Chatbot Popup -->
                    <div class="chatbot-popup">
                        

                        <!-- Chatbot Body -->
                        <div class="chat-body">
                            <div class="message bot-message">
                                <img class="bot-avatar" src="./img/robotic.png" alt="Chatbot Logo" width="50" height="50">
                                </img>
                                <!-- prettier-ignore -->
                                <div class=""> Hey there  <br /> How can I help you today? </div>
                            </div>
                        </div>

                        <!-- Chatbot Footer -->
                        <div class="chat-footer">
                            <form action="#" class="chat-form">
                                <textarea placeholder="Message..." class="message-input" required></textarea>
                                <div class="chat-controls">
                                    <button type="button" id="emoji-picker" class="material-symbols-outlined">sentiment_satisfied</button>
                                    <div class="file-upload-wrapper">
                                        <input type="file" accept="image/*" id="file-input" hidden />
                                        <img src="#" />
                                        <button type="button" id="file-upload" class="material-symbols-rounded">attach_file</button>
                                        <button type="button" id="file-cancel" class="material-symbols-rounded">close</button>
                                    </div>
                                    <button type="submit" id="send-message" class="material-symbols-rounded">arrow_upward</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Linking Emoji Mart script for emoji picker -->
                    <script src="https://cdn.jsdelivr.net/npm/emoji-mart@latest/dist/browser.js"></script>

                    <!-- Linking custom script -->
                    <script src="../AI Chatbot/script.js"></script>
                
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script> <!-- Add this line -->

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <!-- Add this script tag in your HTML file to set the currentUserId -->
    <script src="../AI Chatbot/script.js"></script>
</body>

</html>
<?php } ?>