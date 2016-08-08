# Recipe
####Collection of PHP Functions


---

###Favicon
Getting remote website Favicon:
```
$favIcon = Recipe::getFavicon("http://youtube.com/");

echo $favIcon; 
// outputs: <img src="http://www.google.com/s2/favicons?domain=youtube.com/"  />
```
<img src="http://www.google.com/s2/favicons?domain=youtube.com/"  />

Getting remote website Favicon with HTML attributes:
```
$favIcon = Recipe::getFavicon(
          "http://youtube.com/", 
          array(
            "class" => "favImg"
          )
);
echo $favIcon; 
//outputs: <img src="http://www.google.com/s2/favicons?domain=youtube.com/" class="favImg" />
            
```
<img src="http://www.google.com/s2/favicons?domain=youtube.com/" class="favImg" />


###QRcode
Generating QR code
```
$QRcode = Recipe::getQRcode("ngfw Recipe");
echo $QRcode;  
//outputs: <img src="http://chart.apis.google.com/chart?chs=150x150&cht=qr&chl=ngfw+Recipe"  />
```
<img src="http://chart.apis.google.com/chart?chs=150x150&cht=qr&chl=ngfw+Recipe"  />

Generating QR code and adding HTML attributes:
```
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


###File extension
```
$ext = Recipe::getFileExtension(__FILE__); // replace '__FILE__' with your filename
echo $ext; 
//outputs: php
```

###Gravatar
Getting Gravatar:
```
$Gravatar = Recipe::getGravatar("gejadze@gmail.com");
echo $Gravatar;
// outputs: <img src="http://www.gravatar.com/avatar.php?gravatar_id=9d9d478c3b65d4046a84cf84b4c8bf46&default=mm&size=80&rating=g" width="80px" height="80px"  />
```

![https://www.gravatar.com/avatar.php?gravatar_id=9d9d478c3b65d4046a84cf84b4c8bf46&default=mm&size=80&rating=g](https://www.gravatar.com/avatar.php?gravatar_id=9d9d478c3b65d4046a84cf84b4c8bf46&default=mm&size=80&rating=g)

Getting Gravatar with HTML attributes:
```
$Gravatar = Recipe::getGravatar(
    "gejadze@gmail.com",
    $size = 200,
    $default = 'monsterid',
    $rating = 'x',
    $attributes = array(
        "class" => "Gravatar"
    )
);
ehco $Gravatar;
//Outputs: <img src="http://www.gravatar.com/avatar.php?gravatar_id=9d9d478c3b65d4046a84cf84b4c8bf46&default=monsterid&size=200&rating=x" width="200px" height="200px" class="Gravatar" />'
```
![NG Gravatar](http://www.gravatar.com/avatar.php?gravatar_id=9d9d478c3b65d4046a84cf84b4c8bf46&default=monsterid&size=200&rating=x)






