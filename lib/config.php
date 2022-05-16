<?php 


  $config = parse_ini_file('private/db.ini');
  $conn = mysqli_connect($config['host'], $config['username'], $config['password'], $config['db']);
  if(!$conn){
    die('Failed to connect to MySQL: '.mysqli_connect_error());
  }

