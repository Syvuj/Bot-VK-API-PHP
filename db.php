<?php

require "libs/rb.php";
R::setup( 'mysql:host=***;dbname=***',
        '***', '***' ); //for both mysql or mariaDB
if ( !R::testConnection() )
{
    exit ('no connection with DB');
}








?>
