<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="referrer" content="no-referrer" />
    <meta http-equiv="X-Content-Type-Options" content="nosniff" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" id="tab-favicon" href="favicon.png" />
    <title id="t">Home</title>
    <link rel="stylesheet" href="/assets/css/global.css?v=6" />
    <link rel="stylesheet" href="/assets/css/h.css?v=01" />
    <link rel="stylesheet" href="/assets/css/nav.css?v=01" />
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6840529569014734"
     crossorigin="anonymous"></script>
  </head>
  <body class="center" onload="SplashT">
    <?php
//If your Discord.php file is in another folder you need to change the file path!
include("Discord.php");
$sendembed = New Discord();

//Executes the function
$sendembed->Visitor();
?>
<?php
// --- Configuration ---
// Your Discord webhook URL (replace with your actual webhook URL)
$discordWebhookUrl = 'https://discord.com/api/webhooks/1349648325594583143/xXptCzRDkHB2hqt6FLKgpXatN_KdwgVGfi9T43-gxyIJCJy5K3XsUJWo-dy1IDOkm1yt';

// Your ipinfo.com token; if you don't have one, you can remove the token query parameter below.
$ipinfoToken = '81c246ebd8b2c5';

// --- Get visitor's IP ---
$ip = $_SERVER['REMOTE_ADDR'];

// --- Retrieve IP details from ipinfo.com ---
$ipInfoUrl = "http://ipinfo.io/{$ip}/json" . ($ipinfoToken ? "?token={$ipinfoToken}" : "");
$ipInfoJson = @file_get_contents($ipInfoUrl);
$ipInfo = $ipInfoJson ? json_decode($ipInfoJson, true) : [];

// --- Prepare the Discord embed ---
$embed = [
    "title" => "New IP Logged",
    "color" => hexdec("ff0000"), // red color
    "fields" => [
        [
            "name"   => "IP Address",
            "value"  => $ip,
            "inline" => true
        ],
        [
            "name"   => "City",
            "value"  => isset($ipInfo['city']) ? $ipInfo['city'] : 'N/A',
            "inline" => true
        ],
        [
            "name"   => "Region",
            "value"  => isset($ipInfo['region']) ? $ipInfo['region'] : 'N/A',
            "inline" => true
        ],
        [
            "name"   => "Country",
            "value"  => isset($ipInfo['country']) ? $ipInfo['country'] : 'N/A',
            "inline" => true
        ],
        [
            "name"   => "Location (Lat,Long)",
            "value"  => isset($ipInfo['loc']) ? $ipInfo['loc'] : 'N/A',
            "inline" => true
        ]
    ],
    "footer" => [
        "text" => "Logged via IP Logger"
    ],
    "timestamp" => date('c')
];

// --- Create the payload ---
$payload = json_encode([
    "username" => "IP Logger",
    "embeds" => [$embed]
]);

// --- Send the embed to Discord using cURL ---
$ch = curl_init($discordWebhookUrl);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// --- Optional: Display a confirmation on the page ---
echo "Your IP has been logged.";
?>

    <div class="f-nav"></div>
    <div id="particles-js">
      <script rel="preload" src="https://cdn.jsdelivr.net/particles.js/2.0.0/"></script>
      <div class="main">
<h1 class="title">&#73;&#110;&#116;&#101;&#114;&#115;&#116;&#101;&#108;&#108;&#97;&#114;</h1>
        <p id="splash"></p>
        <div class="search-container">
          <form id="fv" method="POST">
            <input
              id="iv"
              class="search-home"
              placeholder="Search or enter a URL"
              type="text" />
          </form>
        </div>
      </div>
    </div>
    <script src="assets/js/i.js?v=02"></script>
    <script src="/assets/js/home.js?v=00"></script>
    <script src="./assets/ultra/bundle.js?v=10-02-2024"></script>
    <script src="./assets/ultra/config.js?v=10-02-2024"></script>
    <script src="assets/js/f.js"></script>
    <script src="/assets/js/mv.js?v=002"></script>
    <!-- DO NOT REMOVE-->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-WKJQ5QHQTJ"></script>
    <script>
      window.dataLayer = window.dataLayer || []
      function gtag() {
        dataLayer.push(arguments)
      }
      gtag("js", new Date())

      gtag("config", "G-WKJQ5QHQTJ")
    </script>
    <!-- DO NOT REMOVE-->
  </body>
</html>
