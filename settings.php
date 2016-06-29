<?php
echo "<!DOCTYPE html>\n";
echo "<html lang=\"en\">\n";
echo "\n";
echo "<head>\n";
echo "    <meta charset=\"utf-8\">\n";
echo "    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\n";
echo "    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\n";
echo "    <meta name=\"description\" content=\"OpenFLIXR Setup\">\n";
echo "    <meta name=\"author\" content=\"OpenFLIXR\">\n";
echo "    <title>OpenFLIXR Setup</title>\n";
echo "    <link href=\"css/bootstrap.min.css\" rel=\"stylesheet\">\n";
echo "    <link href=\"css/stylish-portfolio.css\" rel=\"stylesheet\">\n";
echo "    <link href=\"css/gsdk-base.css\" rel=\"stylesheet\" />\n";
echo "    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css\">\n";
echo "<script type=\"text/javascript\">\n";
echo "    window.onbeforeunload = function() {\n";
echo "        return \"Do not refresh this page! It will leave OpenFLIXR in an unusable state!\";\n";
echo "    }\n";
echo "</script>\n";
echo "<script type=\"text/javascript\">\n";
echo "	$(function() {\n";
echo "    		$(\"#testdiv\").delay(2000).fadeOut(0);\n";
echo "	});\n";
echo "</script>\n";
echo "    <style>\n";
echo "        #completed {\n";
echo "  display: block;\n";
echo "  border-top: 1px solid #cecece;\n";
echo "  padding-top: 3px;\n";
echo "  font-size: 12px;\n";
echo "  font-weight: normal;\n";
echo "  text-transform: uppercase;\n";
echo "  text-align: left;\n";
echo "        }\n";
echo "    </style>\n";
echo "\n";
echo "    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->\n";
echo "    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->\n";
echo "    <!--[if lt IE 9]>\n";
echo "        <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>\n";
echo "        <script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>\n";
echo "    <![endif]-->\n";
echo "\n";
echo "</head>\n";
echo "\n";
echo "<body>\n";
echo "    <div class=\"image-container set-full-height\" style=\"background-image: url(img/wizard.jpg);\">\n";
echo "        <div class=\"container\">\n";
echo "            <div class=\"row\">\n";
echo "                <div class=\"col-sm-10 col-sm-offset-1\">\n";
echo "                    <div class=\"wizard-container\">\n";
echo "                        <div class=\"card wizard-card ct-wizard-azzure\" id=\"wizard\">\n";
echo "                            <form action=\"settings.php\" method=\"POST\" id=\"registration-form\">\n";
echo "                                <div class=\"wizard-header\">\n";
echo "                                    <h3>Configuring <b>System</b><br><br></h3>\n";
echo "                                </div>\n";
echo "                        <br><br><br><center><div class=\"countdown-styled\"></div></center>\n";
echo "<div id=\"completed\"><a href=\"/htpc/\">Continue to your OpenFLIXR</a></div>\n";
echo "                        </div>\n";
echo "                    </div>\n";
echo "                </div>\n";
echo "            </div>\n";
echo "        </div>\n";
echo "    </div>\n";
echo "</body>\n";
echo "<script src=\"js/jquery-1.10.2.js\" type=\"text/javascript\"></script>\n";
echo "<script src=\"js/bootstrap.min.js\" type=\"text/javascript\"></script>\n";
echo "<script src=\"js/jquery.bootstrap.wizard.js\" type=\"text/javascript\"></script>\n";
echo "<script src=\"js/jquery.validate.min.js\"></script>\n";
echo "<script src=\"js/wizard.js\"></script>\n";
echo "<script src=\"js/custom.js\"></script>\n";
echo "    <script src=\"js/jquery.countdown.js\"></script>\n";
echo "<script type=\"text/javascript\">    $(function() {\n";
echo "      $('.countdown-styled').countdown({\n";
echo "        date: +(new Date) + 900000,\n";
echo "        render: function(data) {\n";
echo "          var el = $(this.el);\n";
echo "          el.empty()\n";
echo "            .append(\"<div>\" + this.leadingZeros(data.min, 2) + \" <span>min</span></div>\")\n";
echo "            .append(\"<div>\" + this.leadingZeros(data.sec, 2) + \" <span>sec</span></div>\");\n";
echo "        }\n";
echo "      });\n";
echo "\n";
echo "      $('.stop').on('click', function(e) {\n";
echo "        e.preventDefault();\n";
echo "        $('.countdown-styled').data('countdown').stop();\n";
echo "      });\n";
echo "\n";
echo "      $('.start').on('click', function(e) {\n";
echo "        e.preventDefault();\n";
echo "        $('.countdown-styled').data('countdown').start();\n";
echo "      });\n";
echo "\n";
echo "      $('.countdown-callback').countdown({\n";
echo "        date: +(new Date) + 10000,\n";
echo "        render: function(data) {\n";
echo "          $(this.el).text(this.leadingZeros(data.sec, 2) + \" sec\");\n";
echo "        },\n";
echo "        onEnd: function() {\n";
echo "          $(this.el).addClass('ended');\n";
echo "        }\n";
echo "      }).on(\"click\", function() {\n";
echo "        $(this).removeClass('ended').data('countdown').update(+(new Date) + 10000).start();\n";
echo "      });\n";
echo "\n";
echo "    });</script>\n";
echo "\n";
while (!file_exists(htpc)) sleep(1);
print '<a href="'.$filename.'">download PDF</a>';
echo "</html>\n";
echo "<script>\n";
echo "    function showdiv() {\n";
echo "        setTimeout(function () {\n";
echo "            document.getElementById(\"completed\").style.visibility = \"visible\";\n";
echo "        }, 5000);\n";
echo "    }\n";
echo "</script>\n";

$password = $_POST['password'];
$networkconfig = $_POST['networkconfig'];
$ip = $_POST['ip'];
$subnet = $_POST['subnet'];
$gateway = $_POST['gateway'];
$dns = $_POST['dns'];
$letsencrypt = $_POST['letsencrypt'];
$domainname = $_POST['domainname'];
$email = $_POST['email'];
$usenetdescription = $_POST['usenetdescription'];
$usenetservername = $_POST['usenetservername'];
$usenetusername = $_POST['usenetusername'];
$usenetpassword = $_POST['usenetpassword'];
$usenetport = $_POST['usenetport'];
$usenetthreads = $_POST['usenetthreads'];
$usenetssl = $_POST['usenetssl'];
$newznabprovider = $_POST['newznabprovider'];
$newznaburl = $_POST['newznaburl'];
$newznabapi = $_POST['newznabapi'];
$tvshowdl = $_POST['tvshowdl'];
$nzbdl = $_POST['nzbdl'];
$mopidy = $_POST['mopidy'];
$syncthing = $_POST['syncthing'];
$hass = $_POST['hass'];
$ntopng = $_POST['ntopng'];
$headphonesuser = $_POST['headphonesuser'];
$headphonespass = $_POST['headphonespass'];
$anidbuser = $_POST['anidbuser'];
$anidbpass = $_POST['anidbpass'];
$spotuser = $_POST['spotuser'];
$spotpass = $_POST['spotpass'];
$imdb = $_POST['imdb'];
$comicvine = $_POST['comicvine'];

#write setup.sh
$file = fopen("setup.sh","w");
fwrite($file,"#!/bin/bash
exec 1> >(tee -a /var/log/openflixrsetup.log) 2>&1
TODAY=$(date)
echo \"-----------------------------------------------------\"
echo \"Date:          \$TODAY\"
echo \"-----------------------------------------------------\"

THISUSER=$(whoami)
    if [ \$THISUSER != 'root' ]
        then
            echo 'You must use sudo to run this script, sorry!'
           exit 1
    fi

## report hypervisor
hypervisor=$(sudo dmidecode -s system-product-name)
version=$(cat /opt/openflixr/version)

if [ \"\$hypervisor\" == 'VirtualBox' ]
  then
      curl -s \"http://www.openflixr.com/stats.php?vm=VirtualBox&version=\$version\"
    elif [ \"\$hypervisor\" == 'Virtual Machine' ]
  then
      curl -s \"http://www.openflixr.com/stats.php?vm=HyperV&version=\$version\"
    elif [ \"\$hypervisor\" == 'Parallels Virtual Platform' ]
  then
      curl -s \"http://www.openflixr.com/stats.php?vm=Parallels&version=\$version\"
    elif [ \"\$hypervisor\" == 'VMware Virtual Platform' ]
  then
      curl -s \"http://www.openflixr.com/stats.php?vm=VMware&version=\$version\"
    else
      curl -s \"http://www.openflixr.com/stats.php?vm=Other&version=\$version\"
fi

## variables
networkconfig=$networkconfig
ip='$ip'
subnet='$subnet'
gateway='$gateway'
dns='$dns'
password='$password'
letsencrypt=$letsencrypt
domainname=$domainname
email=$email
usenetdescription='$usenetdescription'
usenetservername=$usenetservername
usenetusername='$usenetusername'
usenetpassword='$usenetpassword'
usenetport=$usenetport
usenetthreads=$usenetthreads
usenetssl=$usenetssl
newznabprovider='$newznabprovider'
newznaburl=$newznaburl
newznabapi='$newznabapi'
tvshowsdl=$tvshowdl
nzbdl=$nzbdl
mopidy=$mopidy
syncthing=$syncthing
hass=$hass
ntopng=$ntopng
headphonesuser='$headphonesuser'
headphonespass='$headphonespass'
anidbuser='$anidbuser'
anidbpass='$anidbpass'
spotuser='$spotuser'
spotpass='$spotpass'
imdb=$imdb
comicvine='$comicvine'

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
jackapi=$(uuidgen | tr -d - | tr -d '' | tr '[:upper:]' '[:lower:]')
sonapi=$(uuidgen | tr -d - | tr -d '' | tr '[:upper:]' '[:lower:]')
echo \"Couchpotato \$couchapi\" >/opt/openflixr/api.keys
echo \"Sickrage \$sickapi\" >>/opt/openflixr/api.keys
echo \"Headphones \$headapi\" >>/opt/openflixr/api.keys
echo \"Mylar \$mylapi\" >>/opt/openflixr/api.keys
echo \"SABnzbd \$sabapi\" >>/opt/openflixr/api.keys
echo \"Jackett \$jackapi\" >>/opt/openflixr/api.keys
echo \"Sonarr \$sonapi\" >>/opt/openflixr/api.keys

## htpcmanager
cd /opt/HTPCManager/userdata
sqlite3 database.db \"UPDATE setting SET val='\$couchapi' where key='couchpotato_apikey';\"
sqlite3 database.db \"UPDATE setting SET val='\$headapi' where key='headphones_apikey';\"
sqlite3 database.db \"UPDATE setting SET val='\$sabapi' where key='sabnzbd_apikey';\"
sqlite3 database.db \"UPDATE setting SET val='\$sickapi' where key='sickrage_apikey';\"
sqlite3 database.db \"UPDATE setting SET val='\$mylapi' where key='mylar_apikey';\"
sqlite3 database.db \"UPDATE setting SET val='\$sonapi' where key='sonarr_apikey';\"

## couchpotato
crudini --set /opt/CouchPotato/settings.conf core api_key \$couchapi
crudini --set /opt/CouchPotato/settings.conf sabnzbd api_key \$sabapi

## sickrage
crudini --set /opt/sickrage/config.ini SABnzbd sab_apikey \$sabapi
crudini --set /opt/sickrage/config.ini General api_key \$sickapi

## headphones
crudini --set /opt/headphones/config.ini General api_key \$headapi
crudini --set /opt/headphones/config.ini SABnzbd sab_apikey \$sabapi

## mylar
crudini --set /opt/Mylar/config.ini General api_key \$mylapi
crudini --set /opt/Mylar/config.ini SABnzbd sab_apikey \$sabapi

## sabnzbd
sed -i 's/^api_key.*/api_key = '\$sabapi'/' /home/openflixr/.sabnzbd/sabnzbd.ini

## jackett
# changing /root/.config/Jackett/ServerConfig.json results in resetting to default values...
#sed -i 's/^  \"APIKey\":.*/  \"APIKey\": = '\$jackapi'/' /root/.config/Jackett/ServerConfig.json

## sonarr
sed -i 's/^  <ApiKey>.*/  <ApiKey>'\$sonapi'<\/ApiKey>/' /root/.config/NzbDrone/config.xml

## plexrequests
plexreqapi=$(curl -s -X GET --header 'Accept: application/json' 'http://localhost:3579/request/api/apikey?username=openflixr&password=openflixr' | cut -c10-41)

curl -s -X POST --header 'Content-Type: application/json' --header 'Accept: application/json' -d '{
  \"ApiKey\": \"$couchapi\",
  \"Enabled\": true,
  \"Ip\": \"localhost\",
  \"Port\": 5050,
  \"SubDir\": \"couchpotato\"
}' 'http://localhost:3579/request/api/settings/couchpotato?apikey='\$plexreqapi''
curl -s -X POST --header 'Content-Type: application/json' --header 'Accept: application/json' -d '{
  \"ApiKey\": \"$headapi\",
  \"Enabled\": true,
  \"Ip\": \"localhost\",
  \"Port\": 8181,
  \"SubDir\": \"headphones\"
}' 'http://localhost:3579/request/api/settings/headphones?apikey='\$plexreqapi''
curl -s -X POST --header 'Content-Type: application/json' --header 'Accept: application/json' -d '{
  \"ApiKey\": \"$sickapi\",
  \"qualityProfile\": \"default\",
  \"Enabled\": true,
  \"Ip\": \"localhost\",
  \"Port\": 8081,
  \"SubDir\": \"sickrage\"
}' 'http://localhost:3579/request/api/settings/sickrage?apikey='\$plexreqapi''

## usenet
    if [ \"\$usenetpassword\" != '' ]
        then
          service sabnzbdplus start
          sleep 10
          curl -s 'http://localhost:8080/api?mode=set_config&section=servers&keyword=OpenFLIXR_Usenet_Server&output=xml&enable=1&apikey=\$sabapi'
          curl -s 'http://localhost:8080/api?mode=set_config&section=servers&keyword=OpenFLIXR_Usenet_Server&output=xml&ssl=$usenetssl&apikey=\$sabapi'
          curl -s 'http://localhost:8080/api?mode=set_config&section=servers&keyword=OpenFLIXR_Usenet_Server&output=xml&displayname=$usenetdescription&apikey=\$sabapi'
          curl -s 'http://localhost:8080/api?mode=set_config&section=servers&keyword=OpenFLIXR_Usenet_Server&output=xml&username=$usenetusername&apikey=\$sabapi'
          curl -s 'http://localhost:8080/api?mode=set_config&section=servers&keyword=OpenFLIXR_Usenet_Server&output=xml&password=$usenetpassword&apikey=\$sabapi'
          curl -s 'http://localhost:8080/api?mode=set_config&section=servers&keyword=OpenFLIXR_Usenet_Server&output=xml&host=$usenetservername&apikey=\$sabapi'
          curl -s 'http://localhost:8080/api?mode=set_config&section=servers&keyword=OpenFLIXR_Usenet_Server&output=xml&port=$usenetport&apikey=\$sabapi'
          curl -s 'http://localhost:8080/api?mode=set_config&section=servers&keyword=OpenFLIXR_Usenet_Server&output=xml&connections=$usenetthreads&apikey=\$sabapi'
    else
          curl -s 'http://localhost:8080/api?mode=set_config&section=servers&keyword=OpenFLIXR_Usenet_Server&output=xml&enable=0&apikey=\$sabapi'
    fi

## newznab
#    if [ \"\$newznabapi\" != '' ]
#        then
#         newznab config
#        else
#         reverse
#    fi

## tv shows downloader
    if [ \"\$tvshowdl\" == 'sickrage' ]
        then
          systemctl disable sonarr.service
          update-rc.d sickrage enable
        else
          systemctl enable sonarr.service
          update-rc.d sickrage disable
    fi

## nzb downloader
    if [ \"\$nzbdl\" == 'sabnzbd' ]
        then
          systemctl disable nzbget.service
          update-rc.d sabnzbdplus enable
    else
          systemctl enable nzbget.service
          update-rc.d sabnzbdplus disable
    fi

## mopidy
    if [ \"\$mopidy\" == 'enabled' ]
        then
          update-rc.d mopidy enable
    else
          update-rc.d mopidy disable
    fi

## syncthing
    if [ \"\$syncthing\" == 'enabled' ]
        then
          systemctl enable syncthing.service
    else
          systemctl disable syncthing.service
    fi

## home assistant
    if [ \"\$hass\" == 'enabled' ]
        then
          systemctl enable home-assistant.service
    else
          systemctl disable home-assistant.service
    fi

## ntopng
    if [ \"\$ntopng\" == 'enabled' ]
        then
          update-rc.d ntopng enable
    else
          update-rc.d ntopng disable
    fi

## headphones vip
    if [ \"\$headphonespass\" != '' ]
        then
          crudini --set /opt/headphones/config.ini General hpuser $headphonesuser
          crudini --set /opt/headphones/config.ini General hppass $headphonespass
          crudini --set /opt/headphones/config.ini General headphones_indexer 1
          crudini --set /opt/headphones/config.ini General mirror headphones
    else
          crudini --set /opt/headphones/config.ini General hpuser
          crudini --set /opt/headphones/config.ini General hppass
          crudini --set /opt/headphones/config.ini General headphones_indexer 0
          crudini --set /opt/headphones/config.ini General mirror musicbrainz.org
    fi

## anidb
    if [ \"\$anidbpass\" != '' ]
        then
          crudini --set /opt/sickrage/config.ini ANIDB use_anidb 1
          crudini --set /opt/sickrage/config.ini ANIDB anidb_password $anidbuser
          crudini --set /opt/sickrage/config.ini ANIDB anidb_username $anidbpass
    else
          crudini --set /opt/sickrage/config.ini ANIDB use_anidb 0
          crudini --set /opt/sickrage/config.ini ANIDB anidb_password
          crudini --set /opt/sickrage/config.ini ANIDB anidb_username
    fi

## spotify mopidy
    if [ \"\$spotpass\" != '' ]
        then
          crudini --set /etc/mopidy/mopidy.conf spotify username $spotuser
          crudini --set /etc/mopidy/mopidy.conf spotify password $spotpass
    else
          crudini --set /etc/mopidy/mopidy.conf spotify username
          crudini --set /etc/mopidy/mopidy.conf spotify password
    fi

## imdb url
    if [ \"\$imdb\" != '' ]
        then
          crudini --set /opt/CouchPotato/settings.conf imdb automation_urls $imdb
          crudini --set /opt/CouchPotato/settings.conf imdb automation_urls_use 1
    else
          crudini --set /opt/CouchPotato/settings.conf imdb automation_urls
          crudini --set /opt/CouchPotato/settings.conf imdb automation_urls_use 0
    fi

## comicvine
    if [ \"\$comicvine\" != '' ]
        then
          crudini --set /opt/Mylar/config.ini General comicvine_api $comicvine
    else
          crudini --set /opt/Mylar/config.ini General comicvine_api
    fi

## spotweb
#users / apikey + passwordhash
#usersettings / id3 / otherprefs | sabnzbd api + password

## syncthing
#/opt/syncthing/config.xml
#        <password></password>
#        <apikey></apikey>

## passwords
printf \"$password\\n$password\\n\" | sudo smbpasswd -a -s openflixr
echo openflixr:'$password' | sudo chpasswd
htpasswd -b /etc/nginx/.htpasswd openflixr '$password'

## first need to check all places where mysql root password is set
# mysqld_safe --skip-grant-tables >res 2>&1 &
# sleep 5
# mysql mysql -e \"UPDATE user SET Password=PASSWORD('$password') WHERE User='root';FLUSH PRIVILEGES;\"

## network
nwadapter=$(ifconfig -a | sed -n 's/^\([^ ]\+\).*/\\1/p' | grep -Fvx -e lo -e dummy0)
    if [ \"\$networkconfig\" != 'dhcp' ]
        then
cat > /etc/network/interfaces<<EOF
# This file describes the network interfaces available on your system
# and how to activate them. For more information, see interfaces(5).

source /etc/network/interfaces.d/*

# The loopback network interface
auto lo \$nwadapter
iface lo inet loopback

# The primary network interface
iface \$nwadapter inet static
address $ip
netmask $subnet
gateway $gateway
dns-nameservers $dns
EOF
    else
cat > /etc/network/interfaces<<EOF
# This file describes the network interfaces available on your system
# and how to activate them. For more information, see interfaces(5).

source /etc/network/interfaces.d/*

# The loopback network interface
auto lo \$nwadapter
iface lo inet loopback

# The primary network interface
iface \$nwadapter inet dhcp
dns-nameservers 8.8.8.8 8.8.4.4
EOF
    fi

## letsencrypt
    if [ \"\$letsencrypt\" == 'on' ]
        then
          sleep 15
          rm -rf /etc/letsencrypt/
          rm -rf /var/log/letsencrypt/
          bash /opt/openflixr/letsencrypt.sh
          failed=$(cat /var/log/letsencrypt/letsencrypt.log | grep \"Failed authorization procedure\")
            if [ \"\$failed\" == '' ]
              then
                sed -i 's/^email.*/email = $email/' /opt/letsencrypt/cli.ini
                sed -i 's/^domains.*/domains = $domainname, www.$domainname/' /opt/letsencrypt/cli.ini
                sed -i 's/^server_name.*/server_name openflixr $domainname www.$domainname;  #donotremove_domainname/' /etc/nginx/sites-enabled/reverse
                sed -i 's/^.*#donotremove_certificatepath/ssl_certificate \/etc\/letsencrypt\/live\/$domainname\/fullchain.pem; #donotremove_certificatepath/' /etc/nginx/sites-enabled/reverse
                sed -i 's/^.*#donotremove_certificatekeypath/ssl_certificate_key \/etc\/letsencrypt\/live\/$domainname\/privkey.pem; #donotremove_certificatekeypath/' /etc/nginx/sites-enabled/reverse
                sed -i 's/^.*#donotremove_trustedcertificatepath/ssl_trusted_certificate \/etc\/letsencrypt\/live\/$domainname\/fullchain.pem; #donotremove_trustedcertificatepath/' /etc/nginx/sites-enabled/reverse
            else
                echo \"Failed authorization procedure\"
            fi
    else
          sed -i 's/^server_name.*/server_name openflixr;  #donotremove_domainname/' /etc/nginx/sites-enabled/reverse
          sed -i 's/^.*#donotremove_certificatepath/#ssl_certificate \/etc\/letsencrypt\/live\/example\/fullchain.pem; #donotremove_certificatepath/' /etc/nginx/sites-enabled/reverse
          sed -i 's/^.*#donotremove_certificatekeypath/#ssl_certificate_key \/etc\/letsencrypt\/live\/example\/privkey.pem; #donotremove_certificatekeypath/' /etc/nginx/sites-enabled/reverse
          sed -i 's/^.*#donotremove_trustedcertificatepath/#ssl_trusted_certificate \/etc\/letsencrypt\/live\/example\/fullchain.pem; #donotremove_trustedcertificatepath/' /etc/nginx/sites-enabled/reverse
    fi

systemctl --system daemon-reload
bash /opt/openflixr/updatewkly.sh
reboot now");
fclose($file);

# exec('sudo bash /usr/share/nginx/html/setup/setup.sh');

?>
