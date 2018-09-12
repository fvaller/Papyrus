<?php include('functions.php'); ?>
<?php include('conexao.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>Papyrus</title>
  <link rel="stylesheet" href="estilo.css" type="text/css" />
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <script language="JavaScript" src="jquery-1.8.1.min.js" type="text/javascript"></script>
  <script language="JavaScript" src="scripts.js" type="text/javascript"></script>
  <script language="JavaScript" type="text/javascript">
  /*<![CDATA[*/
    $(function() {
      $(".aviso").click(function(){
        $(".aviso").css('display','none');
       //alert('oi');
      });

      $('.aviso').delay(5000).fadeOut(400);
    });

    $(function(){ $('#nota').autosize(); });
  /*]]>*/
  </script>
</head>

<body>

  <div class="navbar">
    <ul>
      <li><a href="index.php">Pesquisar</a></li>
      <li><a href="add.php">Adicionar</a></li>
    </ul>
  </div>