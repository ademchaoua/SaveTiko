<?php

// Include the SaveTiko class
require_once 'SaveTiko.php';

// Check if video URL is provided in GET parameters
if (isset($_GET['videoURL'])) {
    // Get video URL from GET parameters
    $videoURL = urldecode($_GET['videoURL']);

    // Remove additional query parameters from the video URL
    $videoURL = strtok($videoURL, '?');

    // Create a new instance of SaveTiko
    $saveTiko = new SaveTiko($videoURL);

    // Get video statistics
    $videoStats = $saveTiko->getVideoStats();

    // Check if videoStats is not false (i.e., valid TikTok URL)
    if ($videoStats !== false) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaveYiko - Video Info</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            font-size: 28px;
            margin-bottom: 10px;
            color: #333;
        }
        p {
            font-size: 16px;
            color: #666;
            margin-bottom: 20px;
        }
        .video-info {
            text-align: left;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
        .video-info h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }
        .video-info p {
            font-size: 16px;
            line-height: 1.5;
            color: #666;
        }
        .download-link {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .download-link:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>SaveYiko - Video Info</h1>
        <p>Here is the information about the TikTok video:</p>
        <div class="video-info">
            <h2>Video Information</h2>
            <p><strong>Likes:</strong> <?php echo $videoStats['likes']; ?></p>
            <p><strong>Shares:</strong> <?php echo $videoStats['shares']; ?></p>
            <p><strong>Comments:</strong> <?php echo $videoStats['comments']; ?></p>
            <p><strong>Plays:</strong> <?php echo $videoStats['plays']; ?></p>
            <p><strong>Collects:</strong> <?php echo $videoStats['collects']; ?></p>
            <p><strong>Download URL (Video):</strong> <a href="download_video.php?videoURL=<?php echo urlencode($videoURL); ?>&format=video" class="download-link">Download Video</a></p>
            <p><strong>Download URL (Audio):</strong> <a href="download_video.php?videoURL=<?php echo urlencode($videoURL); ?>&format=audio" class="download-link">Download Audio</a></p>
        </div>
    </div>
</body>
</html>
<?php
    } else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaveYiko - Invalid TikTok URL</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            text-align: center;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 28px;
            margin-bottom: 10px;
            color: #333;
        }
        p {
            font-size: 16px;
            color: #666;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Invalid TikTok URL!</h1>
        <p>Please provide a valid TikTok video URL.</p>
    </div>
</body>
</html>
<?php
    }
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaveYiko - No Video URL Provided</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            text-align: center;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 28px;
            margin-bottom: 10px;
            color: #333;
        }
        p {
            font-size: 16px;
            color: #666;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>No Video URL Provided!</h1>
        <p>Please provide a TikTok video URL to get its information.</p>
    </div>
</body>
</html>
<?php
}
?>
