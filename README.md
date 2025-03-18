# Web Application Project

A feature-rich web application built with PHP and MySQL, offering user management, notes functionality, and feedback system.

## Features

- User Management System
- Notes Management
  - Share and view educational notes
  - Multi-file upload support (up to 4 files per note)
  - Search functionality
  - Pagination system
  - Subject categorization
- Feedback System
  - User feedback submission
  - Form-based interface
- YouTube Player Integration
  - Custom video player interface
  - YouTube API integration
  - Video playback controls
  - Custom styling
- AI Chatbot
  - Interactive chat interface
  - Emoji support using Emoji Mart
  - File attachment capabilities
  - Real-time messaging
- Asset Management

## Prerequisites

- XAMPP (Apache and MySQL)
- PHP 7.0 or higher
- Web Browser (Chrome, Firefox, Safari, etc.)
- YouTube Data API key (for video player)

## Installation

1. Clone this repository to your XAMPP's htdocs folder:
   ```
   git clone <repository-url> Edutools
   ```

2. Start XAMPP and ensure Apache and MySQL services are running

3. Import the database schema from the `db` directory

4. Configure your YouTube API key (see Configuration section)

5. Access the application through your web browser:
   ```
   http://localhost/Edutools
   ```

## Project Structure

```
├── AI Chatbot/          # Interactive AI chatbot implementation
│   ├── index.html       # Chatbot interface
│   ├── script.js        # Chatbot functionality
│   ├── style.css        # Chatbot styling
│   └── robotic.png      # Chatbot avatar
├── Youtubeplayer/       # YouTube player integration
│   ├── youtube_main.html # Main player interface
│   ├── app.js           # Player functionality
│   ├── youtube.css      # Player styling
│   └── YoutubeAPI.txt   # API configuration
├── assets/              # Static assets (images, fonts, etc.)
│   ├── css/            # Core CSS styles
│   ├── js/             # JavaScript libraries
│   └── img/            # Image assets
├── css/                 # Additional CSS stylesheets
├── db/                  # Database related files
├── includes/            # PHP include files
│   ├── header.php      # Common header
│   └── footer.php      # Common footer
├── user/               # User management related files
│   └── folder1-4/     # Note file storage directories
├── views/              # View templates
├── db.php              # Database connection
├── feedback_form.php   # Feedback functionality
├── index.php           # Main entry point
├── notes.php           # Notes management
└── styles.css          # Main stylesheet
```

## Technologies Used

- PHP 7.0+
- MySQL
- HTML5
- CSS3
- JavaScript
- Bootstrap
- YouTube Data API
- Emoji Mart (for emoji picker)
- Material Icons
- Font Awesome
- jQuery

## Configuration

### Database Setup
1. Create a new MySQL database
2. Import the database schema from the `db` directory
3. Update database credentials in `db.php`

### YouTube Player Setup
1. Obtain a YouTube Data API key from the [Google Cloud Console](https://console.cloud.google.com)
2. Add your API key to the `YoutubeAPI.txt` file in the Youtubeplayer directory

## Features Usage

### Notes System
- Upload up to 4 files per note
- Add title, subject, and description
- Search notes by title or description
- View notes with pagination
- Download attached files

### Feedback System
- Submit feedback through the feedback form
- Include comments and suggestions

## Security Considerations

1. Database Security
   - All database queries use prepared statements to prevent SQL injection
   - User passwords are hashed before storage
   - Input validation and sanitization implemented

2. File Upload Security
   - File type validation for note attachments
   - Maximum file size restrictions
   - Secure file storage in dedicated directories

3. User Authentication
   - Session-based authentication
   - Password protection for user accounts
   - Protected routes for authenticated users

## Database Schema

The application uses MySQL with the following main tables:

- `tbluser`: User account information
- `tblnotes`: Stores notes and file references
- `tblfeedback`: User feedback storage

## Maintenance

1. Regular Backups
   - Back up the MySQL database regularly
   - Keep backup copies of uploaded files

2. File Storage
   - Monitor disk space usage in note storage directories
   - Clean up temporary files periodically

3. Updates
   - Keep PHP and MySQL versions up to date
   - Update JavaScript dependencies when needed

## Contributing

Feel free to submit issues and enhancement requests.

## License

This project is licensed under the MIT License - see the LICENSE file for details.
