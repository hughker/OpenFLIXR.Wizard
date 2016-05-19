<?php

foreach ($_POST as $param_name => $param_val) {
    echo "Param: $param_name; Value: $param_val<br />\n";
}


#password
$password = $_POST['password'];

#network
$networkconfig = $_POST['networkconfig'];
$ip = $_POST['ip'];
$subnet = $_POST['subnet'];
$gateway = $_POST['gateway'];
$dns = $_POST['dns'];

#access
$letsencrypt = $_POST['letsencrypt'];
$domainname = $_POST['domainname'];
$email = $_POST['email'];

#usenet
$usenetdescription = $_POST['usenetdescription'];
$usenetservername = $_POST['usenetservername'];
$usenetusername = $_POST['usenetusername'];
$usenetpassword = $_POST['usenetpassword'];
$usenetport = $_POST['usenetport'];
$usenetthreads = $_POST['usenetthreads'];
$usenetssl = $_POST['usenetssl'];

#newznab
$newznabprovider = $_POST['newznabprovider'];
$newznaburl = $_POST['newznaburl'];
$newznabapi = $_POST['newznabapi'];

#modules
$tvshowdl = $_POST['tvshowdl'];
$nzbdl = $_POST['nzbdl'];
$mopidy = $_POST['mopidy'];
$syncthing = $_POST['syncthing'];
$hass = $_POST['hass'];
$ntopng = $_POST['ntopng'];

#extras
$headphonesuser = $_POST['headphonesuser'];
$headphonespass = $_POST['headphonespass'];
$anidbuser = $_POST['anidbuser'];
$anidbpass = $_POST['anidbpass'];
$spotuser = $_POST['spotuser'];
$spotpass = $_POST['spotpass'];
$imdb = $_POST['imdb'];
$comicvine = $_POST['comicvine'];

#write config.ini
$file = fopen("config.ini","w");
fwrite($file,"[network]
networkconfig = $networkconfig
ip = $ip
subnet = $subnet
gateway = $gateway
dns = $dns

[password]
password = $password

[access]
letsencrypt = $letsencrypt
domainname = $domainname
email = $email

[usenet]
usenetdescription = $usenetdescription
usenetservername = $usenetservername
usenetusername = $usenetusername
usenetpassword = $usenetpassword
usenetport = $usenetport
usenetthreads = $usenetthreads
usenetssl = $usenetssl

[newznab]
newznabprovider = $newznabprovider
newznaburl = $newznaburl
newznabapi = $newznabapi

[modules]
tvshowsdl = $tvshowdl
nzbdl = $nzbdl
mopidy = $mopidy
syncthing = $syncthing
hass = $hass
ntopng = $ntopng

[extras]
headphonesuser = $headphonesuser
headphonespass = $headphonespass
anidbuser = $anidbuser
anidbpass = $anidbpass
spotuser = $spotuser
spotpass = $spotpass
imdb = $imdb
comicvine = $comicvine
");
fclose($file);
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>OpenFLIXR setup finished</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/stylish-portfolio.css" rel="stylesheet">
    <link href="css/gsdk-base.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div class="image-container set-full-height" style="background-color: #8C8C8C)">

      <!-- needs realtime output of console -->

    </div>
</body>
</html>
