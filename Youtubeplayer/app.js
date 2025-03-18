document.addEventListener('DOMContentLoaded', () => {
    const video = document.getElementById('video');
    const playButton = document.getElementById('play-button');
    const pauseButton = document.getElementById('pause-button');
    const searchForm = document.getElementById('search-form');
    const noteInput = document.getElementById('note-input');
    const addNoteButton = document.getElementById('add-note-button');
    const notesList = document.getElementById('notes-list');
    const searchResults = document.getElementById('search-results');
    const exportButton = document.getElementById('export-button');
    let notes = [];

    playButton.addEventListener('click', () => {
        video.play();
    });

    pauseButton.addEventListener('click', () => {
        video.pause();
    });

    <iframe id="video" width="800" height="400" src="https://www.youtube.com/embed/YOUR_VIDEO_ID_HERE" allow="autoplay; encrypted-media; picture-in-picture"></iframe>

    addNoteButton.addEventListener('click', () => {
        const note = noteInput.value;
        if (note) {
            const timestamp = video.currentTime;
            notes.push({ timestamp, note });
            renderNotes();
            noteInput.value = '';
        }
    });

    exportButton.addEventListener('click', () => {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        let y = 10;
        notes.forEach((note, index) => {
            const timestamp = new Date(note.timestamp * 1000).toISOString().substr(11, 8);
            const link = `https://www.example.com/videos/${video.src.split('/').pop()}?t=${Math.floor(note.timestamp)}`;
            doc.textWithLink(`${index + 1}. [${timestamp}] ${note.note}`, 10, y, { url: link });
            y += 10;
        });
        doc.save('notes.pdf');
    });

    function renderNotes() {
        notesList.innerHTML = '';
        notes.forEach((note, index) => {
            const noteItem = document.createElement('li');
            noteItem.className = 'note-item';
            noteItem.innerHTML = `
                <div>
                    <span class="text-gray-500">${new Date(note.timestamp * 1000).toISOString().substr(11, 8)}</span>
                    <span>${note.note}</span>
                </div>
                <button onclick="seekToTimestamp(${note.timestamp})">Play from here</button>
            `;
            notesList.appendChild(noteItem);
        });
    }

    window.seekToTimestamp = (timestamp) => {
        video.currentTime = timestamp;
        video.play();
    };

    window.playSearchedVideo = (query) => {
        video.pause(); // Pause the video before changing the source
        video.src = `https://www.example.com/videos/${query}.mp4`;
        video.load(); // Ensure the video is properly loaded
        video.play(); // Optionally, start playing the new video automatically
    };
});