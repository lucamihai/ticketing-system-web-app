<?php 
    $sql = "CREATE TABLE `users` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `username` varchar(25) NOT NULL,
            `first_name` varchar(25) NOT NULL,
            `last_name` varchar(25) NOT NULL,
            `email` varchar(25) NOT NULL,
            `password` varchar(100) NOT NULL,
            `user_type` char(1) COLLATE 'utf8_general_ci' NOT NULL DEFAULT '0',
            PRIMARY KEY (`id`)
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8;";
            
    mysqli_query($SQLConnection, $sql);
?>