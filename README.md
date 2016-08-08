# Recipe
####Collection of PHP Functions


---


Getting remote website Favicon:
```
$favIcon = Recipe::getFavicon("http://youtube.com/");

echo $favIcon; 
// outputs: <img src="http://www.google.com/s2/favicons?domain=youtube.com/"  />
```

Getting remote website Favicon and adding some HTML attributes:
```
$favIcon = Recipe::getFavicon(
          "http://youtube.com/", 
          array(
            "class" => "favImg",
          )
);
echo $favIcon; 
//outputs: <img src="http://www.google.com/s2/favicons?domain=youtube.com/" class="favImg" />
            
```


