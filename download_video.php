<?php

// Include the SaveTiko class
require_once 'SaveTiko.php';

// Check if video URL and format are provided in GET parameters
if (isset($_GET['videoURL']) && isset($_GET['format'])) {
    // Get video URL and format from GET parameters
    $videoURL = urldecode($_GET['videoURL']);
    $format = $_GET['format'];

    // Remove additional query parameters from the video URL
    $videoURL = strtok($videoURL, '?');

    // Create a new instance of SaveTiko
    $saveTiko = new SaveTiko($videoURL);

    // Get video statistics
    $videoStats = $saveTiko->getVideoStats();

    // Check if videoStats is not false (i.e., valid TikTok URL)
    if ($videoStats !== false) {
        // Determine download URL based on the provided format
        if ($format == 'video') {
            $downloadURL = $videoStats['download_urlVideo'];
            $fileExtension = '.mp4';
        } elseif ($format == 'audio') {
            $downloadURL = $videoStats['download_urlAudio'];
            $fileExtension = '.mp3';
        } else {
            // If format is invalid, exit
            die("Invalid format specified!");
        }

        // Download content
        $content = $saveTiko->download($videoStats, $format);

        // Check if content is not false (i.e., download successful)
        if ($content !== false) {
            // Generate a unique filename based on the video ID
            $filename = $videoStats['video_id'] . $fileExtension;

            // Set appropriate headers for force download
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $filename . '"');

            // Output the content
            echo $content;
            exit;
        } else {
            die("Failed to download content!");
        }
    } else {
        die("Invalid TikTok URL!");
    }
} else {
    die("Please provide both videoURL and format parameters!");
}
