<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaveYiko</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            font-size: 36px;
            margin-bottom: 10px;
            color: #333;
        }
        h5 {
            font-size: 18px;
            margin-bottom: 20px;
            color: #666;
        }
        .download-form {
            margin-bottom: 20px;
        }
        .url {
            margin-bottom: 10px;
        }
        .url input[type="url"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .submit-btn {
            background-color: #4CAF50;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .submit-btn:hover {
            background-color: #45a049;
        }
        .how-to-use {
            margin-top: 30px;
            text-align: left;
        }
        .how-to-use h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }
        .how-to-use p {
            font-size: 16px;
            line-height: 1.5;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>SaveYiko <span class="material-icons">get_app</span></h1>
        <h5>TikTok Video Downloader - Download TikTok Videos Without Watermark</h5>
        <form class="download-form" action="video_info.php" method="get">
            <div class="url">
                <input type="url" name="videoURL" id="videoURL" placeholder="Paste TikTok video URL here" required>
            </div>
            <button type="submit" class="submit-btn">DOWNLOAD</button>
        </form>
    </div>
    <div class="how-to-use">
        <h2>How to Use SaveYiko - TikTok Video Downloader</h2>
        <p>1. **Find a TikTok Video**: Go to the TikTok app or website and find the video you want to download. Copy the URL of the video.</p>
        <p>2. **Open SaveYiko**: Open the SaveYiko TikTok video downloader by visiting the website or app.</p>
        <p>3. **Paste the Video URL**: In the SaveYiko downloader, you'll see a text field labeled "Paste TikTok video URL here." Paste the URL of the TikTok video you copied earlier into this field.</p>
        <p>4. **Download the Video**: Click the "DOWNLOAD" button. SaveYiko will process the URL and provide you with download options.</p>
        <p>5. **Choose Download Format**: SaveYiko will present you with options to download the video in different formats, such as video or audio. Choose the desired format.</p>
        <p>6. **Start Download**: After selecting the format, click the download link provided. The video will start downloading to your device.</p>
        <p>7. **Enjoy the Video**: Once the download is complete, you can enjoy the TikTok video offline without any watermarks.</p>
        <p>Remember to respect copyright laws and usage rights when downloading and sharing TikTok videos.</p>
        <p>By following these steps, you can easily download TikTok videos using SaveYiko. Enjoy downloading your favorite TikTok content hassle-free!</p>
    </div>
</body>
</html>
