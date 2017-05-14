# Recipe :book:
#### Collection of PHP Functions

![](https://travis-ci.org/ngfw/Recipe.svg?branch=master) ![](https://img.shields.io/packagist/v/ngfw/recipe.svg?maxAge=259120) ![](https://img.shields.io/badge/code-awesome-brightgreen.svg?maxAge=2592100) ![](https://img.shields.io/badge/language-PHP-blue.svg?maxAge=2592000) [![StyleCI](https://styleci.io/repos/65232201/shield?branch=master)](https://styleci.io/repos/65232201)

---
Table of Contents
* [🚀 Quick Start](#quick-start)
* [Favicon](#favicon)
* [QRcode](#qrcode)
* [File extension](#file-extension)
* [Gravatar](#gravatar)
* [Creating Link Tags](#creating-link-tags)
* [Validate email address](#validate-email-address)
* [Validate URL](#validate-url)
* [RSS Reader](#rss-reader)
* [Object to Array](#object-to-array)
* [Array to Object](#array-to-object)
* [Array to String](#array-to-string)
* [HEX to RGB](#hex-to-rgb)
* [RGB to HEX](#rgb-to-hex)
* [Generate Random Password](#generate-random-password)
* [Simple Encode](#simple-encode)
* [Simple Decode](#simple-decode)
* [Generate Server Specific Hash](#generate-server-specific-hash)
* [Detect HTTPS](#detect-https)
* [Detect AJAX](#detect-ajax)
* [Check if number is odd](#check-if-number-is-odd)
* [Check if number is even](#check-if-number-is-even)
* [Get Current URL](#get-current-url)
* [Get Client IP](#get-client-ip)
* [Detect Mobile](#detect-mobile)
* [Get Browser](#get-browser)
* [Get Client Location](#get-client-location)
* [Number To Word conversion](#number-to-word-conversion)
* [Seconds To Text](#seconds-to-text)
* [Minutes To Text](#minutes-to-text)
* [Hours To Text](#hours-to-text)
* [Shorten String](#shorten-string)
* [CURL](#curl)
* [Shorten URL](#shorten-url)
* [Get Alexa Rank](#ge-alexa-rank)
* [Get Tiny URL](#get-tiny-url)
* [Get Keyword Suggestions From Google](#get-keyword-suggestions-from-google)
* [WIKI Search](#wiki-search)
* [Notification](#notification)
* [Auto Embed](#auto-embed)
* [Make Clickable Links](#make-clickable-links)
* [🔧 Debug](#debug)
* [Get Referer](#get-referer)
* [Compress Page](#compress-page)
* [Ordinal](#ordinal)
* [Number Of Days In Month](#number-of-days-in-month)
* [pr](#pr) 
* [Bytes To Human Readable Size](#bytes-to-human-readable-size) 🆕


---
### Quick Start
Run in your terminal:
```bash
composer require ngfw/recipe
```
Create new file and start using the Recipes
```php
<?php

require "vendor/autoload.php";

use ngfw\Recipe as Recipe;

$suggestion = Recipe::getKeywordSuggestionsFromGoogle("home");

print_r($suggestion);
//
//Array
//(
//    [0] => home depot
//    [1] => home goods
//    [2] => home depot near me
//    [3] => homes for sale
//    [4] => homeaway
//    [5] => homes for rent
//    [6] => home advisor
//    [7] => home depot credit card
//    [8] => home depot coupons
//    [9] => homeland
//)
```
### Favicon
Getting remote website Favicon:
```php
$favIcon = Recipe::getFavicon("http://youtube.com/");

echo $favIcon;
// outputs: <img src="https://www.google.com/s2/favicons?domain=youtube.com/"  />
```
<img src="https://www.google.com/s2/favicons?domain=youtube.com/"  />

Getting remote website Favicon with HTML attributes:
```php
$favIcon = Recipe::getFavicon(
          "http://youtube.com/",
          array(
            "class" => "favImg"
          )
);
echo $favIcon;
//outputs: <img src="https://www.google.com/s2/favicons?domain=youtube.com/" class="favImg" />

```
<img src="https://www.google.com/s2/favicons?domain=youtube.com/" class="favImg" />


### QRcode
Generating QR code
```php
$QRcode = Recipe::getQRcode("ngfw Recipe");
echo $QRcode;  
//outputs: <img src="http://chart.apis.google.com/chart?chs=150x150&cht=qr&chl=ngfw+Recipe"  />
```
<img src="http://chart.apis.google.com/chart?chs=150x150&cht=qr&chl=ngfw+Recipe"  />

Generating QR code and adding HTML attributes:
```php
$QRcode = Recipe::getQRcode(
    "ngfw Recipe",
    $width = 350,
    $height = 350,
    $attributes = array(
        "class" => "QRCode"
    )
);
echo $QRcode;  
// outputs: <img src="http://chart.apis.google.com/chart?chs=350x350&cht=qr&chl=ngfw+Recipe" class="QRCode" />
```
<img src="http://chart.apis.google.com/chart?chs=350x350&cht=qr&chl=ngfw+Recipe" class="QRCode" />


### File extension
```php
$ext = Recipe::getFileExtension(__FILE__); // replace '__FILE__' with your filename
echo $ext;
//outputs: php
```

### Gravatar
Getting Gravatar:
```php
$Gravatar = Recipe::getGravatar("gejadze@gmail.com");
echo $Gravatar;
// outputs: <img src="http://www.gravatar.com/avatar.php?gravatar_id=9d9d478c3b65d4046a84cf84b4c8bf46&default=mm&size=80&rating=g" width="80px" height="80px"  />
```

![https://www.gravatar.com/avatar.php?gravatar_id=9d9d478c3b65d4046a84cf84b4c8bf46&default=mm&size=80&rating=g](https://www.gravatar.com/avatar.php?gravatar_id=9d9d478c3b65d4046a84cf84b4c8bf46&default=mm&size=80&rating=g)

Getting Gravatar with HTML attributes:
```php
$Gravatar = Recipe::getGravatar(
    "gejadze@gmail.com",
    $size = 200,
    $default = 'monsterid',
    $rating = 'x',
    $attributes = array(
        "class" => "Gravatar"
    )
);
echo $Gravatar;
//Outputs: <img src="http://www.gravatar.com/avatar.php?gravatar_id=9d9d478c3b65d4046a84cf84b4c8bf46&default=monsterid&size=200&rating=x" width="200px" height="200px" class="Gravatar" />'
```
![NG Gravatar](http://www.gravatar.com/avatar.php?gravatar_id=9d9d478c3b65d4046a84cf84b4c8bf46&default=monsterid&size=200&rating=x)



### Creating Link Tags
Simple Link:
```php
$linkTags = Recipe::createLinkTag("google.com");
echo $linkTags;   
//outputs: <a href="google.com">google.com</a>
```

Link with title:
```php
$linkTags = Recipe::createLinkTag("google.com", "Visit Google");
echo $linkTags;   
//outputs: <a href="google.com" title="Visit Google" >Visit Google</a>
```

Link with title and HTML attributes:
```php
$linkTags = Recipe::createLinkTag("google.com", "Visit Google", array(
    "class" => "outgoingLink"
));
echo $linkTags;   
//outputs: <a href="google.com" title="Visit Google" class="outgoingLink">Visit Google</a>
```


###  Validate email address
```php
$isValid = Recipe::validateEmail("user@gmail.com");
var_dump($isValid);
// outputs: true (bool)
```

Check for temporary Email addresses:

```php
$isValid = Recipe::validateEmail('user@fakeinbox.com', $tempEmailAllowed = false);
var_dump($isValid);
// outputs: false (bool)
```

###  Validate URL
```php
$isValid = Recipe::validateURL("http://github.com/");
var_dump($isValid);
// outputs: true (bool)
```

###  RSS Reader
```php
$rssArray = Recipe::rssReader("https://github.com/ngfw/Recipe/commits/master.atom");
var_dump($rssArray);
// Outputs feed as an array
```

###  Object to Array
```php
$obj = new stdClass;
$obj->foo = 'bar';
$obj->baz = 'qux';
$array = Recipe::objectToArray($obj);
var_dump($array);

// outputs:
// array(2) {
//   ["foo"]=>
//   string(3) "bar"
//   ["baz"]=>
//   string(3) "qux"
// }

```

### Array to Object
```php
$array = array(
    "foo" => "bar",
    "baz" => "qux",
);
$obj = Recipe::arrayToObject($array);
// outputs:
// object(stdClass)#15 (2) {
//   ["foo"]=>
//   string(3) "bar"
//   ["baz"]=>
//   string(3) "qux"
// }
```
### Array to String
```php
$array = array(
    "foo" => "bar",
    "baz" => "qux",
);
$string = Recipe::arrayToString($array);
echo $string;
// outputs: foo="bar" baz="qux"
```
### HEX to RGB
```php
$rgb = Recipe::hex2rgb("#FFF");
echo $rgb;
// outputs: rgb(255, 255, 255)
```
### RGB to HEX
```php
$hex = Recipe::rgb2hex("rgb(123,123,123)");
// outputs: #7b7b7b
```
### Generate Random Password
```php
$randomPass = Recipe::generateRandomPassword(10);
echo $randomPass;
// outputs: 10 random character string
```
### Simple Encode
```php
$encodedString = Recipe::simpleEncode("php recipe");
echo $encodedString;
// outputs: qcnVhqjKxpuilw==
```
### Simple Decode
```php
$decodedString = Recipe::simpleDecode("qcnVhqjKxpuilw==");
echo $decodedString;
// outputs: php recipe
```
### Generate Server Specific Hash
```php
$serverHash = Recipe::generateServerSpecificHash();
echo $serverHash;
// outputs: d41d8cd98f00b204e9800998ecf8427e
```
### Detect HTTPS
This method checks for `$_SERVER['HTTPS']`
```php
$isHttps = Recipe::isHttps();
var_dump($isHttps);
// outputs: bool
```
### Detect AJAX
This method checks for `$_SERVER['HTTP_X_REQUESTED_WITH']`
```php
$isAjax = Recipe::isAjax();
var_dump($isAjax);
// outputs: bool
```

### Check if number is odd
```php
$isNumberOdd = Recipe::isNumberOdd(5);
// outputs: bool
```
### Check if number is even
```php
$isNumberEven = Recipe::isNumberEven(8);
var_dump($isNumberEven);
// outputs: bool
```
### Get Current URL
```php
$currentURL = Recipe::getCurrentURL();
var_dump($currentURL);
// outputs: current Request URL
```
### Get Client IP
```php
$ClientsIP = Recipe::getClientIP();
echo $ClientsIP;
//OR
// Return Proxy IP if user is behind it
//$ClientsIP = Recipe::getClientIP("HTTP_CLIENT_IP"); //'HTTP_CLIENT_IP', 'HTTP_X_FORWARDED', ...
// outputs: IP address
```
### Detect Mobile
```php
$isMobile = Recipe::isMobile();
var_dump($isMobile);
// outputs: true or false
```
### Get Browser
```php
$Browser = Recipe::getBrowser();
echo $Browser
// outputs: Browser Details
```
### Get Client Location
```php
$user_location = Recipe::getClientLocation();
echo $user_location;
// outputs: Users Location
```
### Number To Word conversion
```php
$number = "864210";
$number_in_words = Recipe::numberToWord($number);
echo $number_in_words;
// outputs: eight hundred and sixty-four thousand, two hundred and ten
```
### Seconds To Text
```php
$seconds = "864210";
$number_in_words = Recipe::secondsToText($seconds);
echo $number_in_words;
// outputs: 1 hour and 10 seconds
// Recipe::secondsToText($seconds, $returnAsWords = true);
// will return: one hour and ten seconds
```
### Minutes To Text
```php
$minutes  = 60 * 24 * 2;
$duration = Recipe::minutesToText($minutes);
echo $duration;
// outputs: 2 days
// Recipe::minutesToText($minutes, $returnAsWords = true);
// will return: two days
```
### Hours To Text
```php
$hours    = 4.2;
$duration = Recipe::hoursToText($hours);
echo $duration;
// outputs: 4 hours and 12 minutes
// Recipe::hoursToText($hours, $returnAsWords = true);
// will return: four hours and twelve minutes
```
### Shorten String
```php
$string        = "The quick brown fox jumps over the lazy dog";
$shortenString = Recipe::shortenString($string, 20);
// output: The quick brown f...
// Recipe::shortenString($string, 20, $addEllipsis = false);
// output: "The quick brown fox ", NOTE last space
// Recipe::shortenString($string, 20, $addEllipsis = false, $wordsafe = true);
// output: "The quick brown fox", NOTE, will not break in the middle of the word
```
### CURL

Simple GET example:
```php
$data = Recipe::curl("https://api.ipify.org");
var_dump($data);
// outputs: Curl'ed Data
```
POST Example:
```php
$CurlPOST = Recipe::curl("http://jsonplaceholder.typicode.com/posts", $method = "POST", $data = array(
    "title"  => 'foo',
    "body"   => 'bar',
    "userId" => 1,
));
```
Custom Headers:
```php
$curlWithHeaders = Recipe::curl("http://jsonplaceholder.typicode.com/posts", $method = "GET", $data = false, $header = array(
    "Accept" => "application/json",
), $returnInfo = true);
// NOTE $returnInfo argument
// Result will be returned as an array, $curlWithHeaders={
//  info => containing curl information, see curl_getinfo()
//  contents  => Data from URL
//}
```
Basic authentication with CURL:
```php
$curlBasicAuth = Recipe::curl(
    "http://jsonplaceholder.typicode.com/posts",
    $method = "GET",
    $data = false,
    $header = false,
    $returnInfo = false,
    $auth = array(
       'username' => 'your_login',
       'password' => 'your_password',
    )
);
```
### Expand Short URL
```php
$shortURL = "https://goo.gl/rvDnMX";
$expandedURL = Recipe::expandShortUrl($shortURL);
echo $expendedURL;
// outputs: https://github.com/ngfw/Recipe
```
### Get Alexa Rank
```php
$AlexaRank = Recipe::getAlexaRank("github.com");
echo $AlexaRank;
// outputs: Current alexa ranking as position number (example: 52)
```

### Shorten URL
```php
$TinyUrl = Recipe::getTinyUrl("https://github.com/ngfw/Recipe");
echo $TinyUrl;
// outputs: http://tinyurl.com/h2nchjh
```
### Get Keyword Suggestions From Google
```php
$suggestions = Recipe::getKeywordSuggestionsFromGoogle("Tbilisi, Georgia");
var_dump($suggestions);
// outputs:
//array(10) {
//  [0]=>
//  string(15) "tbilisi georgia"
//  [1]=>
//  string(22) "tbilisi georgia hotels"
//  [2]=>
//  string(19) "tbilisi georgia map"
//  [3]=>
//  string(20) "tbilisi georgia time"
//  [4]=>
//  string(23) "tbilisi georgia airport"
//  [5]=>
//  string(23) "tbilisi georgia weather"
//  [6]=>
//  string(24) "tbilisi georgia language"
//  [7]=>
//  string(24) "tbilisi georgia zip code"
//  [8]=>
//  string(20) "tbilisi georgia news"
//  [9]=>
//  string(28) "tbilisi georgia airport code"
//}
```
### WIKI Search
```php
$wiki = Recipe::wikiSearch("Tbilisi");
var_dump($wiki);
// outputs: data from wikipedia
```
### Notification
```php
$notification = Recipe::notification("Test Successful");
echo $notification;
// outputs: <div style="display: block;padding: 0.5em;border: solid 1px;border-radius: 0.125em;margin-bottom: 1em; border-color: #a6d9f2;color: #0a5276;background-color: #e7f6fd;"  role="alert">Test Successful</div>
// NOTE: possible notifications types: success, warning, error and info
// Type is passed as a second parameter
```
### Auto Embed
```php
$string = "Checkout Solomun, Boiler Room at https://www.youtube.com/watch?v=bk6Xst6euQk";
echo Recipe::autoEmbed($string);
// outputs:
// Checkout Solomun, Boiler Room at<iframe width="560" height="315" src="https://www.youtube.com/embed/bk6Xst6euQk?feature=oembed" frameborder="0" allowfullscreen></iframe>
// supported providers are: youtube.com, blip.tv, vimeo.com, dailymotion.com, flickr.com, smugmug.com, hulu.com, revision3.com, wordpress.tv, funnyordie.com, soundcloud.com, slideshare.net and instagram.com
```
### Make Clickable Links
```php
$string = "Check PHP Recipes on https://github.com/ngfw/Recipe";
$clickable = Recipe::makeClickableLinks($string);
echo $clickable;
// outputs:
// Check PHP Recipes on <a href="https://github.com/ngfw/Recipe" >https://github.com/ngfw/Recipe</a>
```
### Debug
`var_dump()` alternative
```php
$string = "Test me";
Recipe::debug($string);
```


### Get Referer
Get the referer page (last page visited)
```php
$referrer = Recipe::getReferer();
echo $referer ;
// outputs an url (http://mywebsite.com/page1)
```


### Ordinal
```php
for($i=1;$i<=10;$i++){ 
    echo Recipe::ordinal($i);
    echo ' '; 
} 
// outputs 1st 2nd 3rd 4th 5th 6th 7th 8th 9th 10th

```

### Number Of Days In Month
```php
$numDays = Recipe::numberOfDaysInMonth(2, 2012);
echo $numDays;
// outputs: 29
```

### Compress Page
The `compressPage()` method will register new function on PHP shutdown, remove white space from output and try to gZip it.

```php
<?php
require "vendor/autoload.php";
Recipe::compressPage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<title>HTML Page Title</title>

<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
    Hello Friend,
</body>
</html>
```

will output:
```html
<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><title>HTML Page Title</title><meta name="description" content=""><meta name="viewport" content="width=device-width, initial-scale=1.0"></head><body> Hello Friend,</body></html>
```

### PR 
```php
Recipe::pr( array("he","ll","oo") );
```
will output:
```html
<pre>Array
(    
    [0] => he
    [1] => ll
    [2] => oo
)
</pre>
```


### Bytes To Human Readable Size
```php
Recipe::test_bytesToHumanReadableSize( "17179869184" );
```
will output:
```html
16 GB
```