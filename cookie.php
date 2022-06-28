<?php
      //whether ip is from share internet
if (!empty($_SERVER['HTTP_CLIENT_IP']))   
  {
    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
  }
//whether ip is from proxy
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
  {
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
//whether ip is from remote address
else
  {
    $ip_address = $_SERVER['REMOTE_ADDR'];
  }
  
$ip =  $ip_address;
$ip_info = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));  

if($ip_info && $ip_info->geoplugin_countryName != null){
//  echo 'Country = '.$ip_info->geoplugin_countryName.'<br/>';
//  echo 'Country Code = '.$ip_info->geoplugin_countryCode.'<br/>';
//  echo 'City = '.$ip_info->geoplugin_city.'<br/>';
//  echo 'Region = '.$ip_info->geoplugin_region.';<br/>';
//  echo 'Latitude = '.$ip_info->geoplugin_latitude.'<br/>';
//  echo 'Longitude = '.$ip_info->geoplugin_longitude.'<br/>';
//  echo 'Timezone = '.$ip_info->geoplugin_timezone.'<br/>';
//  echo 'Continent Code = '.$ip_info->geoplugin_continentCode.'<br/>';
//  echo 'Continent Name = '.$ip_info->geoplugin_continentName.'<br/>';
//  echo 'Timezone = '.$ip_info->geoplugin_timezone.'<br/>';
//  echo 'Currency Code = '.$ip_info->geoplugin_currencyCode.'<br/>';
    
 

}




$city=$ip_info->geoplugin_city;
  $name = $_Post['username'];
  $value = $ip_address;
  setcookie($name, $value, time() + (86400 * 80), '/','finkosuppliesagencies.com', 1);
  // 86400 = 1 day
  
  
  //Gets the IP Address from the visitor
$PublicIP = $_SERVER['REMOTE_ADDR'];
//Uses ipinfo.io to get the location of the IP Address, you can use another site but it will probably have a different implementation
$json     = file_get_contents("http://ipinfo.io/$PublicIP/geo");
//Breaks down the JSON object into an array
$json     = json_decode($json, true);
//This variable is the visitor's county
$country  = $json['country'];
//This variable is the visitor's region
$region   = $json['region'];

  
  
  
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" media="screen" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
       <style>
    .body {
  background: #BCBCCC;
}

.card {
  width: 350px;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: border-box;
  border: 1px solid #d2d2dc;
  border-radius: 6px;
  -webkit-box-shadow: 0px 0px 5px 0px rgb(249, 249, 250);
  -moz-box-shadow: 0px 0px 5px 0px rgba(212, 182, 212, 1);
  box-shadow: 0px 0px 5px 0px rgb(161, 163, 164);
}

.cookies a {
  text-decoration: none;
  color: #000;
  margin-top: 8px;
}

.cookies a:hover {
  text-decoration: none;
  color: blue;
  margin-top: 8px;
}
</style> 
        
    </head>
    
  <body>

     
    <?php
      if (!isset($_COOKIE[$name ])) {    
        echo "
       
                <div class='d-flex justify-content-center mt-5 h-100'>
        <div class='d-flex align-items-center align-self-center card p-3 text-center cookies'><img src='https://i.imgur.com/Tl8ZBUe.png' width='50'><span class='mt-2'>We use cookies to personalize content, ads and analyze our site traffic in order to improve your experience.</span><a class='d-flex align-items-center' href='https://www.techtarget.com/searchsoftwarequality/definition/cookie'>Learn more<i class='fa fa-angle-right ml-2'></i></a>
            
            <button
                class='btn btn-dark mt-3 px-4' type='button' onClick='window.location.href=window.location.href'>I, Understand</button>
           
        </div>
    </div>
        
        ";
      } 
    ?>
  </body></html>
