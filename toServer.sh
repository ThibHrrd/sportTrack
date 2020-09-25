#! /bin/bash

sftp m3104_13 <<EOF
put  /home/leo/Documents/Cours/M3104/sportTrack/php_app/index.php /public_html
put  -r /home/leo/Documents/Cours/M3104/sportTrack/php_app/controllers /public_html/controllers
put  -r /home/leo/Documents/Cours/M3104/sportTrack/php_app/views /public_html/views
put  -r /home/leo/Documents/Cours/M3104/sportTrack/php_app/model /public_html/model
EOF
