<?php
session_start();
include('includes/dbconnection.php');

if (strlen($_SESSION['ocasuid']) == 0) {
    header('location:logout.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edutools || Notes Maker</title>

    <!-- Google Web Fonts -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edutools || Notes Maker</title>

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />

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
    <link href="../Youtubeplayer/youtube.css" rel="stylesheet">

    <!-- YouTube IFrame API -->
    <script src="https://www.youtube.com/iframe_api"></script>
    <!-- jsPDF Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
</head>


<body>
<div class="container-fluid position-relative bg-white d-flex p-0">

<?php include_once('includes/sidebar.php'); ?>
<!-- Content Start -->
<div class="content">
    <?php include_once('includes/header.php'); ?>

            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4 main-content">
                <!-- Your main content here -->
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            padding: 20px;
                            background-color: #f9f9f9;
                            color: black;
                            text-align: center;
                        }

                        /* Apply centering styles to a specific container */
                        .main-content {
                            display: flex;
                            flex-direction: column;
                            align-items: center;
                            justify-content: center;
                        }

                        /* Search Section */
                        .search-container {
                            display: flex;
                            flex-direction: column;
                            align-items: center;
                            width: 100%;
                            max-width: 600px;
                            margin-bottom: 20px;
                        }

                        .search-container input,
                        .note-input {
                            padding: 10px;
                            border: 1px solid #ccc;
                            border-radius: 5px;
                            background: #fff;
                            color: black;
                            width: 100%;
                            margin-top: 10px;
                            text-align: center;
                        }

                        .search-container button,
                        .export-button {
                            padding: 10px;
                            background-color: #ff0000;
                            color: white;
                            border: none;
                            border-radius: 5px;
                            cursor: pointer;
                            transition: background 0.3s, transform 0.3s;
                            margin-top: 10px;
                        }

                        .search-container button:hover,
                        .export-button:hover {
                            background-color: #cc0000;
                            transform: scale(1.05);
                        }

                        .search-container button:active,
                        .export-button:active {
                            transform: scale(0.95);
                        }

                        /* Video Section */
                        .video-player {
                            display: flex;
                            flex-direction: column;
                            align-items: center;
                            justify-content: center;
                            width: 100%;
                            max-width: 800px;
                        }

                        iframe {
                            width: 100%;
                            height: 400px;
                        }

                        /* Notes Section */
                        .note-item {
                            background: #f1f1f1;
                            padding: 20px;
                            margin-top: 20px;
                            border-radius: 5px;
                            display: flex;
                            justify-content: space-between;
                            align-items: center;
                            width: 100%;
                            max-width: 800px;
                        }

                        .timestamp-button {
                            background: #ff0000;
                            border: none;
                            padding: 5px 10px;
                            color: white;
                            border-radius: 5px;
                            cursor: pointer;
                            transition: background 0.3s, transform 0.3s;
                        }

                        .timestamp-button:hover {
                            background: #cc0000;
                            transform: scale(1.05);
                        }

                        .timestamp-button:active {
                            transform: scale(0.95);
                        }

                        /* Responsive Styles */
                        @media (max-width: 768px) {
                            .note-item {
                                flex-direction: column;
                                align-items: flex-start;
                            }

                            .timestamp-button {
                                width: 100%;
                                margin-bottom: 5px;
                            }
                        }

                        /* Add this CSS for grid layout */
                        .video-list {
                            display: grid;
                            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                            gap: 10px;
                            margin-top: 20px;
                        }

                        .video-item {
                            background: #fff;
                            border: 1px solid #ccc;
                            border-radius: 5px;
                            padding: 10px;
                            text-align: center;
                            cursor: pointer;
                            transition: transform 0.3s;
                        }

                        .video-item:hover {
                            transform: scale(1.05);
                        }

                        .video-item img {
                            max-width: 100%;
                            border-radius: 5px;
                        }

                        .video-item p {
                            margin-top: 10px;
                            font-size: 14px;
                            color: #333;
                        }
                        .header {
                            position:sticky;
                            z-index: 1;
                        }
                    </style>
                    <h3>Youtube Notes Marker</h3>

                    <!-- Search Section -->
                    <div class="search-container">
                        <input type="text" id="search" placeholder="Search YouTube Videos...">
                        <button onclick="searchVideos()">Search</button>
                    </div>

                    <!-- Video List -->
                    <div id="video-list" class="video-list"></div>

                    <!-- Video Player Section -->
                    <div id="video-player" class="video-player">
                        <div id="player"></div> <!-- Add this div for the YouTube player -->
                        <input class="note-input" id="notes" placeholder="Take a short note...">
                        <button onclick="saveNote()">Save Note</button>
                        <button class="export-button" onclick="exportNotes()">Export Notes</button>
                        <div id="note-list"></div>
                    </div>

                    <!-- User Manual Section -->
                    <div class="user-manual">
                        <h3>User Manual: How to Use the YouTube Note Feature</h3>
                        <ol>
                            <li><strong>Search for a Video:</strong> Use the search bar to find YouTube videos by entering keywords and clicking the "Search" button.</li>
                            <li><strong>Select a Video:</strong> Click on a video from the search results to load it into the player.</li>
                            <li><strong>Play the Video:</strong> Use the controls on the YouTube player to play, pause, and navigate through the video.</li>
                            <li><strong>Take Notes:</strong> While watching the video, you can take notes.</li>
                            <li><strong>Jump to Timestamp:</strong> Click the "Jump to" button next to each note to jump to the specific timestamp in the video.</li>
                            <li><strong>Export Notes:</strong> Click the "Export Notes" button to save your notes as a PDF file. </li>
                        </ol>
                    </div>

                    <style>
                        .user-manual {
                            background: #f1f1f1;
                            padding: 20px;
                            margin-top: 20px;
                            border-radius: 5px;
                            max-width: 800px;
                            text-align: left;
                        }

                        .user-manual h3 {
                            margin-bottom: 15px;
                        }

                        .user-manual ol {
                            padding-left: 20px;
                        }

                        .user-manual li {
                            margin-bottom: 10px;
                        }
                    </style>

                    <script>
                        let videoId = "";
                        let videoTitle = "";
                        let player;

                        function onYouTubeIframeAPIReady() {
                            player = new YT.Player('player', {
                                height: '400',
                                width: '100%',
                                videoId: '',
                                playerVars: {
                                    'autoplay': 0,
                                    'controls': 1
                                },
                            });
                        }

                        function searchVideos() {
                            const query = document.getElementById('search').value;
                            const API_KEY = 'AIzaSyBk7lUa_XS1QuYVuVm5i6UTHXo389OLNQU';
                            fetch(`https://www.googleapis.com/youtube/v3/search?part=snippet&q=${query}&type=video&maxResults=5&key=${API_KEY}`)
                                .then(response => response.json())
                                .then(data => {
                                    const videoList = document.getElementById('video-list');
                                    videoList.innerHTML = ''; // Clear previous search results
                                    data.items.forEach(video => {
                                        const videoItem = document.createElement('div');
                                        videoItem.classList.add('video-item');
                                        videoItem.innerHTML = `<img src="${video.snippet.thumbnails.default.url}" alt="thumbnail"> <p>${video.snippet.title}</p>`;
                                        videoItem.onclick = () => playVideo(video.id.videoId, video.snippet.title);
                                        videoList.appendChild(videoItem);
                                    });
                                    document.getElementById('video-list').style.display = 'grid';
                                    document.getElementById('video-player').style.display = 'none';
                                });
                        }

                        function playVideo(id, title) {
                            videoId = id;
                            videoTitle = title;
                            document.getElementById('video-list').style.display = 'none';
                            document.getElementById('video-player').style.display = 'block';

                            // Clear previous notes
                            document.getElementById('note-list').innerHTML = '';

                            // Check if the player instance already exists
                            if (player && player.loadVideoById) {
                                player.loadVideoById(videoId);
                            } else {
                                // Create a new player instance if it doesn't exist
                                player = new YT.Player('player', {
                                    height: '400',
                                    width: '100%',
                                    videoId: videoId,
                                    playerVars: {
                                        'autoplay': 0,
                                        'controls': 1
                                    },
                                });
                            }
                        }

                        function saveNote() {
                            const noteText = document.getElementById('notes').value;
                            const timestamp = Math.floor(player.getCurrentTime());
                            if (noteText.trim()) {
                                const noteItem = document.createElement('div');
                                noteItem.classList.add('note-item');
                                noteItem.innerHTML = `<button class='timestamp-button' onclick='jumpToTime(${timestamp})'>Jump to ${formatTime(timestamp)}</button> ${noteText}`;
                                document.getElementById('note-list').appendChild(noteItem);
                                document.getElementById('notes').value = '';
                            }
                        }

                        function jumpToTime(seconds) {
                            player.seekTo(seconds, true);
                            player.playVideo();
                        }

                        function formatTime(seconds) {
                            const minutes = Math.floor(seconds / 60);
                            const secs = seconds % 60;
                            return `${minutes}:${secs < 10 ? '0' : ''}${secs}`;
                        }

                        function exportNotes() {
                            let pdfName = prompt("Enter the name for the PDF file:", "video_notes.pdf");

                            if (!pdfName) {
                                pdfName = `${videoTitle}.pdf`;
                            }

                            const { jsPDF } = window.jspdf;
                            const doc = new jsPDF();
                            let notesText = `YouTube Video Title: ${videoTitle}\n\n\n Marked Notes are Given below:\n\n`;
                            document.querySelectorAll('.note-item').forEach((note, index) => {
                                const timestamp = note.querySelector('button').innerText.replace('Jump to ', '');
                                const noteText = note.innerText.replace(/Jump to \d+:\d+/g, '');
                                const link = `https://www.youtube.com/watch?v=${videoId}&t=${parseInt(timestamp.split(':')[0]) * 60 + parseInt(timestamp.split(':')[1])}s`;
                                notesText += `${index + 1}. ${noteText.trim()}\n  Link: ${link}\n\n`;
                            });
                            doc.text(notesText, 10, 10, { maxWidth: 180 });
                            doc.save(pdfName);
                        }
                    </script>

                </html>

            
            </div><!-- Form End -->

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

    <!-- YouTube IFrame API -->
    <script src="https://www.youtube.com/iframe_api"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="../Youtubeplayer/app.js"></script>
</body>

</html>