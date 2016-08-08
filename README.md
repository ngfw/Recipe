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

###QRcode
Generating QR code
```
$QRcode = Recipe::getQRcode("ngfw Recipe");
echo $QRcode;  
//outputs: <img src="http://chart.apis.google.com/chart?chs=150x150&cht=qr&chl=ngfw+Recipe"  />
```

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