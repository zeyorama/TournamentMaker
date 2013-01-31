<?php

  function getCreationQuery($username, $password, $dbName) {
  return "CREATE USER '$username'@'%' IDENTIFIED BY '$password';
          GRANT USAGE ON * . * TO '$username'@'%' IDENTIFIED BY '$password' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;
          CREATE DATABASE IF NOT EXISTS `$dbName` ;
          GRANT ALL PRIVILEGES ON `$dbName` . * TO '$username'@'%';";
  }

  function getCreationTableQuery() {
  return "
  CREATE TABLE `_user` (
    `_id` int(11) unsigned NOT NULL auto_increment,
    `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP,
    `updated_at` timestamp default NULL,
    `username` VARCHAR(64) NOT NULL,
    `pass` VARCHAR(64) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `role` INT(11) NOT NULL,
    `last_signin` timestamp default NULL,
    PRIMARY KEY (`_id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;
  CREATE TABLE `_tour` (
    `_id` int(11) unsigned NOT NULL auto_increment,
    `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP,
    `updated_at`timestamp default NULL,
    `name` VARCHAR(255) NOT NULL,
    `gridType` INT(11) NOT NULL,
    `_start` timestamp default NULL,
    `game_id` INT(11) unsigned NOT NULL,
    `maxPlayers`INT(11) NOT NULL,
    `owner` INT(11) unsigned NOT NULL,
    `status` INT(11) NOT NULL,
    PRIMARY KEY (`_id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;
  CREATE TABLE `_game` (
    `_id` int(11) unsigned NOT NULL auto_increment,
    `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
    `created_at` timestamp default NULL,
    `_name` VARCHAR(64) NOT NULL,
    `_description` TEXT NOT NULL,
    `_release` INT(5) default NULL,
    `_usk` INT(3) default NULL,
    PRIMARY KEY (`_id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;
  CREATE TABLE `_user_game` (
    `_id` int(11) unsigned NOT NULL auto_increment,
    `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP,
    `user_id` INT(11) unsigned NOT NULL,
    `game_id` INT(11) unsigned NOT NULL,
    `ingame_nick` VARCHAR(64) default NULL,
    PRIMARY KEY (`_id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;
  CREATE TABLE `_tour_user` (
    `_id` int(11) unsigned NOT NULL auto_increment,
    `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP,
    `user_id` INT(11) unsigned NOT NULL,
    `tour_id` INT(11) unsigned NOT NULL,
    PRIMARY KEY (`_id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;
  CREATE TABLE `_game_review` (
    `_id` int(11) unsigned NOT NULL auto_increment,
    `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP,
    `user_id` INT(11) unsigned NOT NULL,
    `game_id` INT(11) unsigned NOT NULL,
    `_rate` INT(2) NOT NULL,
    `_comment` TEXT default NULL,
    PRIMARY KEY (`_id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;
  ";
  }

?>