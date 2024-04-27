<?php

/*
[----------------- SaveTikTok -----------------------]
|         You can use this code for downlaod         |
|     tik tok video or audios without watermark      |
|               this code is 100% free               |
|         you can do it api see exmple.php file      |
|               for more information                 |
[---------------------enjoy--------------------------]
*/

class SaveTiko
{
    // URL of the TikTok video
    public $URL;
    
    // User agent string for cURL requests
    public $userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36';

    // Constructor to set the initial URL
    public function __construct($URL = null)
    {
        $this->URL = $URL;
    }

    // Function to make a cURL request to the provided URL
    private function cURLTiko($URL)
    {
        $ch = curl_init();

        // cURL options
        $option = [
            CURLOPT_URL            => $URL,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_USERAGENT      => $this->userAgent,
            CURLOPT_ENCODING       => "utf-8",
            CURLOPT_CONNECTTIMEOUT => 30,
            CURLOPT_REFERER        => 'https://www.tiktok.com/',
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_COOKIEJAR      => 'cookie.txt',
            CURLOPT_COOKIEFILE     => 'cookie.txt',
            CURLOPT_MAXREDIRS      => 10,
        ];

        // Set cURL options
        curl_setopt_array($ch, $option);

        // Execute cURL request
        $responce = curl_exec($ch);

        // Close cURL session
        curl_close($ch);

        // Return the response
        return $responce;
    }

    // Function to extract a substring between two strings
    private function stringCut($string1, $string2, $source)
    {
        // Explode source string using string1 as delimiter, take the second part
        $r = explode($string1, $source)[1];
        // Explode the result using string2 as delimiter, take the first part
        $r = explode($string2, $r)[0];
        
        // Return the extracted string
        return $r;
    }

    // Function to get video statistics like likes, shares, comments, etc.
    public function getVideoStats()
    {

        // Check if URL is provided and if it is a TikTok URL
        if ($this->URL == null or strpos($this->URL, 'tiktok') === false) {
            // Return false if URL is invalid
            return false;
        } else {
            // Extract video data JSON from TikTok webpage
            $videoDataJson = $this->stringCut('__UNIVERSAL_DATA_FOR_REHYDRATION__" type="application/json">', '</', $this->cURLTiko($this->URL));

            // Save video data JSON to a file
            file_put_contents('data.json', json_encode(json_decode($videoDataJson), JSON_PRETTY_PRINT));

            // Parse video data JSON
            $videoData = json_decode($videoDataJson);

            // Extract video statistics
            $stats = $videoData->__DEFAULT_SCOPE__->{'webapp.video-detail'}->itemInfo->itemStruct->statsV2;

            // Get various statistics
            $likes = $stats->diggCount ?? 0;
            $shares = $stats->shareCount ?? 0;
            $comments = $stats->commentCount ?? 0;
            $plays = $stats->playCount ?? 0;
            $collects = $stats->collectCount ?? 0;
            $download_urlVideo = $videoData->__DEFAULT_SCOPE__->{'webapp.video-detail'}->itemInfo->itemStruct->video->playAddr;
            $download_urlAudio = $videoData->__DEFAULT_SCOPE__->{'webapp.video-detail'}->itemInfo->itemStruct->music->playUrl;
            $video_id = $videoData->__DEFAULT_SCOPE__->{'webapp.video-detail'}->itemInfo->itemStruct->id;

            // Return video statistics
            return [
                'likes' => $likes,
                'shares' => $shares,
                'comments' => $comments,
                'plays' => $plays,
                'collects' => $collects,
                'download_urlVideo' => $download_urlVideo,
                'download_urlAudio' => $download_urlAudio,
                'video_id' => $video_id,
            ];
        }
    }

    // Function to download video or audio from the provided URL
    public function download($array, $format)
    {
        // Determine download URL based on the format
        if ($format == 'video') {
            $URL = $array['download_urlVideo']; 
        } elseif ($format == 'audio') {
            $URL = $array['download_urlAudio']; 
        }

        // Initialize cURL session
        $ch = curl_init();
        $headers = [
            'Range: bytes=0-', // Set range for partial content download
        ];

        // cURL options
        $option = [
            CURLOPT_URL            => $URL,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_AUTOREFERER    => true,
            CURLOPT_USERAGENT      => 'okhttp',
            CURLOPT_ENCODING       => "utf-8",
            CURLOPT_CONNECTTIMEOUT => 30,
            CURLINFO_HEADER_OUT    => true,
            CURLOPT_HTTPHEADER     => $headers,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_REFERER        => 'https://www.tiktok.com/',
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_COOKIEJAR      => 'cookie.txt',
            CURLOPT_COOKIEFILE     => 'cookie.txt',
            CURLOPT_MAXREDIRS      => 10,
        ];

        // Set cURL options
        curl_setopt_array($ch, $option);

        // Execute cURL request
        $response = curl_exec($ch);
        // Close cURL session
        curl_close($ch);
        
        // Return the response
        return $response;
    }
}
