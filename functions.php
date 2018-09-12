<?php

function anti_injection($sql){
  $sql = preg_replace(sql_regcase("/(http|www|wget|from|select|insert|delete|where|.dat|.txt|.gif|drop table|show tables| or |#|\*|--|\\\\)/"),"",$sql);
  $sql = trim($sql);
  $sql = strip_tags($sql);
  $sql = addslashes($sql);
  return $sql;
}

function data_mysql($data_dma){
  //trasforma data para inclusao no MySQL
  $data_array = split("/",$data_dma);
  $data = $data_array[2] ."-".$data_array[1]."-".$data_array[0];
  return $data;
}

function data_hora($valor){
  if($valor != '0000-00-00 00:00:00'){
    $data = date("d/m/Y", strtotime($valor));
    $hora = date("G:i:s", strtotime($valor));
    return $data . ' ' .$hora;
  }else{
    return '-';
  }
}

function data($valor){
  if($valor){
    $data = date("d/m/Y", strtotime($valor));
    return $data;
  }
}

function dataextenso(){
  setlocale(LC_ALL, 'portuguese', 'pt_BR', 'pt_br', 'ptb_BRA');
  $data = strftime("%d de %B de %Y");
  return $data;
}

function data_agenda($data){
  setlocale(LC_ALL, 'portuguese', 'pt_BR', 'pt_br', 'ptb_BRA');
  $data_now = date("Y-m-d");

  if($data != '0000-00-00 00:00:00'){

    $aux = explode(" ", $data);
    $data = date("Y-m-d", strtotime($aux[0]));
    $hora = date("G:i", strtotime($aux[1]));

    if($data_now == $data){
      return $hora;
    }else{
      return date("j M", strtotime($data)) ;
    }

  }else{
    return '-';
  }
}

function texto_limite($palavras, $texto) {
  $texto = explode(" ", $texto);
  $texto = preg_replace("/<(\/)?p>/i", "", $texto);
  for ($i=0;$i<$palavras;$i++) {
    $texto_ok = $texto_ok." ".$texto[$i];
  }
  $texto_ok = trim($texto_ok);
  $texto_ok = $texto_ok."";
  $texto_ok = trim($texto_ok);
  $texto_ok = strip_tags($texto_ok);
  return "$texto_ok";
}

?>