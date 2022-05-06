<?php
/* Automatizar a instalaçao de wordpress */
// recup des infos du lando, true to decode all the layers of the json
$lando_info = json_decode(getenv('LANDO_INFO'), true);

// recupère le réportoire
$lando_webroot = getenv('LANDO_WEBROOT');

// url par défault définit par lando (array do json)
$url = $lando_info['appserver']['urls'][0];

// recup les credentials de base
$bd_server = $lando_info['database']['internal_connection']['host'];
$bd_name = $lando_info['database']['creds']['database'];
$bd_user = $lando_info['database']['creds']['user'];
$bd_password = $lando_info['database']['creds']['password'];

// tableau commande pour télécharger wordpress
$cmd = [
    "cd $lando_webroot;", // posicionamento no reportorio
    "wp core download"
];

$install_script = implode( ' ', $cmd);
shell_exec($install_script);// executa no terminal os comandos definidos em $cmd

// donfig de wordpress -> define o DB server, name, user e pass
$cmd = [
    "cd $lando_webroot;",
    "wp core config",
    "--dbprefix=wp_",
    "--dbhost=$bd_server",
    "--dbname=$bd_name",
    "--dbuser=$bd_user",
    "--dbpass=$bd_password",
];

$install_script = implode( ' ', $cmd);
shell_exec($install_script);

// fin de l'installation
$cmd = [
    "cd $lando_webroot;",
    "wp core install",
    "--url='$url'",
    "--title='Wordpress auto configure'",
    "--admin_user='admin'",
    "--admin_password='adminadminadmin'",
    "--admin_email='rita.carrilho.lameira@lidem.education'"
];

$install_script = implode( ' ', $cmd);
shell_exec($install_script);