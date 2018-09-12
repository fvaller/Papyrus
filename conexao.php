<?php

  define('DB_HOST','localhost');
  define('DB_NOME','papyrus');
  define('DB_USER','root');
  define('DB_SENHA','root2017');

  $HOST = DB_HOST; $BD = DB_NOME; $USER = DB_USER; $SENHA = DB_SENHA;

  $conexao = mysql_connect($HOST, $USER, $SENHA) or print (mysql_error());
  mysql_select_db($BD, $conexao) or print(mysql_error());

?>