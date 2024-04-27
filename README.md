# SaveTiko - TikTok Video Downloader

SaveTiko is a simple PHP-based tool that allows you to download TikTok videos without the watermark. It provides an easy-to-use interface for fetching video information and downloading videos or audio tracks directly from TikTok.

## Features

- Download TikTok videos without watermark.
- Download videos or audio tracks.
- Get video statistics such as likes, shares, comments, plays, and collects.

## How to Use

1. Clone the repository to your local machine:

   ```bash
   git clone https://github.com/yourusername/SaveTiko.git
   ```
2. Upload the files to your web server or local development environment.

3. Access the index.php file in your browser.

4. Paste the TikTok video URL into the input field and click the "Download" button.

5. Once the video information is fetched, you can download the video or audio track by clicking on the respective links.
   
## Requirements

PHP >= 7.0
cURL extension enabled

## Usage Example

   ```bash

   require_once 'SaveTiko.php';

$saveTiko = new SaveTiko('https://www.tiktok.com/@username/video/1234567890');
$videoStats = $saveTiko->getVideoStats();

echo 'Likes: ' . $videoStats['likes'] . PHP_EOL;
echo 'Shares: ' . $videoStats['shares'] . PHP_EOL;
echo 'Comments: ' . $videoStats['comments'] . PHP_EOL;
echo 'Plays: ' . $videoStats['plays'] . PHP_EOL;
echo 'Collects: ' . $videoStats['collects'] . PHP_EOL;

file_put_contents('downloaded_video.mp4', $saveTiko->download($videoStats, 'video'));
file_put_contents('downloaded_audio.mp3', $saveTiko->download($videoStats, 'audio'));


   ```

## License

This project is licensed under the [MIT License](https://opensource.org/licenses/MIT).

## Acknowledgements

SaveTiko - A simple PHP class for downloading [TikTok videos](https://github.com/ademchaoua/SaveTiko).


