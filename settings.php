<?php
/*
foreach ($_POST as $param_name => $param_val) {
    echo "Param: $param_name; Value: $param_val<br />\n";
}
*/

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

#write setup.sh
$file = fopen("setup.sh","w");
fwrite($file,"\"#!/bin/bash
exec 1> >(tee -a /var/log/openflixrsetup.log) 2>&1
TODAY=$(date)
echo \"-----------------------------------------------------\"
echo \"Date:          $TODAY\"
echo \"-----------------------------------------------------\"

THISUSER=$(whoami)
    if [ $THISUSER != 'root' ]
        then
            echo 'You must use sudo to run this script, sorry!'
           exit 1
    fi

## report hypervisor
hypervisor=$(sudo dmidecode -s system-product-name)
version=$(cat /opt/openflixr/version)

if [ \"$hypervisor\" == 'VirtualBox' ]
then
    curl \"http://www.openflixr.com/stats.php?vm=VirtualBox&version=$version\"
elif [ \"$hypervisor\" == 'Virtual Machine' ]
then
    curl \"http://www.openflixr.com/stats.php?vm=HyperV&version=$version\"
elif [ \"$hypervisor\" == 'Parallels Virtual Platform' ]
then
    curl \"http://www.openflixr.com/stats.php?vm=Parallels&version=$version\"
elif [ \"$hypervisor\" == 'VMware Virtual Platform' ]
then
    curl \"http://www.openflixr.com/stats.php?vm=VMware&version=$version\"
else
    curl \"http://www.openflixr.com/stats.php?vm=Other&version=$version\"
fi

## stop services
service couchpotato stop
service headphones stop
service htpcmanager stop
service mylar stop
service sabnzbdplus stop
service sickrage stop
service jackett stop
service sonarr stop
service mopidy stop

## generate api keys
couchapi=$(uuidgen | tr -d - | tr -d '' | tr '[:upper:]' '[:lower:]')
sickapi=$(uuidgen | tr -d - | tr -d '' | tr '[:upper:]' '[:lower:]')
headapi=$(uuidgen | tr -d - | tr -d '' | tr '[:upper:]' '[:lower:]')
mylapi=$(uuidgen | tr -d - | tr -d '' | tr '[:upper:]' '[:lower:]')
sabapi=$(uuidgen | tr -d - | tr -d '' | tr '[:upper:]' '[:lower:]')
plexpyapi=$(uuidgen | tr -d - | tr -d '' | tr '[:upper:]' '[:lower:]')
jackapi=$(uuidgen | tr -d - | tr -d '' | tr '[:upper:]' '[:lower:]')
sonapi=$(uuidgen | tr -d - | tr -d '' | tr '[:upper:]' '[:lower:]')
echo \"Couchpotato $couchapi\" >/opt/openflixr/api.keys
echo \"Sickrage $sickapi\" >>/opt/openflixr/api.keys
echo \"Headphones $headapi\" >>/opt/openflixr/api.keys
echo \"Mylar $mylapi\" >>/opt/openflixr/api.keys
echo \"SABnzbd $sabapi\" >>/opt/openflixr/api.keys
echo \"Plexpy $plexpyapi\" >>/opt/openflixr/api.keys
echo \"Jackett $jackapi\" >>/opt/openflixr/api.keys
echo \"Sonarr $sonapi\" >>/opt/openflixr/api.keys

## htpcmanager
cd /opt/HTPCManager/userdata
sqlite3 database.db \"UPDATE setting SET val='$couchapi' where key='couchpotato_apikey';\"
sqlite3 database.db \"UPDATE setting SET val='$headapi' where key='headphones_apikey';\"
sqlite3 database.db \"UPDATE setting SET val='$sabapi' where key='sabnzbd_apikey';\"
sqlite3 database.db \"UPDATE setting SET val='$sickapi' where key='sickrage_apikey';\"
sqlite3 database.db \"UPDATE setting SET val='$mylapi' where key='mylar_apikey';\"
sqlite3 database.db \"UPDATE setting SET val='$sonapi' where key='sonarr_apikey';\"

## couchpotato
crudini --set /opt/CouchPotato/settings.conf core api_key $couchapi
crudini --set /opt/CouchPotato/settings.conf sabnzbd api_key $sabapi

## sickrage
crudini --set /opt/sickrage/config.ini SABnzbd sab_apikey $sabapi
crudini --set /opt/sickrage/config.ini General api_key $sickapi

## headphones
crudini --set /opt/headphones/config.ini General api_key $headapi
crudini --set /opt/headphones/config.ini SABnzbd sab_apikey $sabapi

## mylar
crudini --set /opt/Mylar/config.ini General api_key $mylapi
crudini --set /opt/Mylar/config.ini SABnzbd sab_apikey $sabapi

## sabnzbd
sed -i 's/^api_key.*/api_key = '$sabapi'/' /home/openflixr/.sabnzbd/sabnzbd.ini

## jackett
# changing /root/.config/Jackett/ServerConfig.json results in resetting to default values...
#sed -i 's/^  \"APIKey\":.*/  \"APIKey\": = '$jackapi'/' /root/.config/Jackett/ServerConfig.json

## sonarr
sed -i 's/^  <ApiKey>.*/  <ApiKey>'$sonapi'<\/ApiKey>/' /root/.config/NzbDrone/config.xml

## plexrequests
plexreqapi=$(curl -X GET --header 'Accept: application/json' 'http://openflixr:3579/request/api/apikey?username=openflixr&password=openflixr' | cut -c10-41)

curl -X POST --header 'Content-Type: application/json' --header 'Accept: application/json' -d '{
  \"ApiKey\": \"$couchapi\",
  \"Enabled\": true,
  \"Ip\": \"localhost\",
  \"Port\": 5050,
  \"SubDir\": \"couchpotato\"
}' 'http://openflixr:3579/request/api/settings/couchpotato?apikey=a421d7f486d0426cba8ea9ebfdcb9e6b'
curl -X POST --header 'Content-Type: application/json' --header 'Accept: application/json' -d '{
  \"ApiKey\": \"$headapi\",
  \"Enabled\": true,
  \"Ip\": \"localhost\",
  \"Port\": 8181,
  \"SubDir\": \"headphones\"
}' 'http://openflixr:3579/request/api/settings/headphones?apikey=a421d7f486d0426cba8ea9ebfdcb9e6b'
curl -X POST --header 'Content-Type: application/json' --header 'Accept: application/json' -d '{
  \"ApiKey\": \"$sickapi\",
  \"qualityProfile\": \"default\",
  \"Enabled\": true,
  \"Ip\": \"localhost\",
  \"Port\": 8081,
  \"SubDir\": \"sickrage\"
}' 'http://openflixr:3579/request/api/settings/sickrage?apikey=a421d7f486d0426cba8ea9ebfdcb9e6b'

## letsencrypt
# if $letsencrypt = enabled
rm -rf /etc/letsencrypt/
sed -i 's/^email.*/email = '$email'/' /opt/letsencrypt/cli.ini
sed -i 's/^domains.*/domains = '$domainname', www.'$domainname'/' /opt/letsencrypt/cli.ini
sed -i 's/^server_name.*/server_name openflixr '$domainname' www.'$domainname';  #donotremove_domainname/' /etc/nginx/sites-enabled/reverse
sed -i 's/^.*#donotremove_certificatepath/ssl_certificate \/etc\/letsencrypt\/live\/'$domainname'\/fullchain.pem; #donotremove_certificatepath/' /etc/nginx/sites-enabled/reverse
sed -i 's/^.*#donotremove_certificatekeypath/ssl_certificate_key \/etc\/letsencrypt\/live\/'$domainname'\/privkey.pem; #donotremove_certificatekeypath/' /etc/nginx/sites-enabled/reverse
sed -i 's/^.*#donotremove_trustedcertificatepath/ssl_trusted_certificate \/etc\/letsencrypt\/live\/'$domainname'\/fullchain.pem; #donotremove_trustedcertificatepath/' /etc/nginx/sites-enabled/reverse
bash /opt/openflixr/letsencrypt.sh

## passwords
printf "$password\n$password\n" | sudo smbpasswd -a -s openflixr
echo openflixr:'$password' | sudo chpasswd
htpasswd -b /etc/nginx/.htpasswd openflixr '$password'

## first need to check all places where mysql root password is set
# mysqld_safe --skip-grant-tables >res 2>&1 &
# sleep 5
# mysql mysql -e "UPDATE user SET Password=PASSWORD('$password') WHERE User='root';FLUSH PRIVILEGES;"

## spotweb
#users / apikey + passwordhash
#usersettings / id3 / otherprefs | sabnzbd api + password

## syncthing
#/opt/syncthing/config.xml
#        <password>$2a$10$mVingX24TAyv8SCBq7pZjegJdI7P1iZDf9Fmjbf75rQuxlp0.tvPq</password>
#        <apikey>RhTQmsDI9O5i8dSp85DFPppXSfSjciaT</apikey>

## mopidy spotify
crudini --set /etc/mopidy/mopidy.conf spotify username $spotuser
crudini --set /etc/mopidy/mopidy.conf spotify username $spotpass

bash /opt/openflixr/updatewkly.sh
reboot now
");
fclose($file);

/*
$startsetup = shell_exec('sudo bash /usr/share/nginx/html/setup/setup.sh');
echo "<pre>$startsetup</pre>";
*/

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

<body style="background-color: #8C8C8C";>
    <div>

      <!-- needs realtime output of console -->

    </div>
</body>
</html>
