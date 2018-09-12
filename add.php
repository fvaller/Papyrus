<?php include('topo.php'); ?>

<?php

  $action = 'novo';

  //pega o id
  $id = $_REQUEST['id'];

  //Novo registro
  if($_POST['action'] == 'novo'){

    $titulo = addslashes($_POST['titulo']);
    $nota = addslashes($_POST['nota']);

    if($titulo){
      mysql_query("INSERT INTO notas (titulo, nota, data) VALUES ('$titulo', '$nota', NOW())");
      $id = mysql_insert_id();
      $action = 'atualizar';

      $msg = '<p class="aviso">A nota foi salva!</p>';
    }
  }

  //Atualizar registro
  if($_POST['action'] == 'atualizar'){

    $titulo = addslashes($_POST['titulo']);
    $nota = addslashes($_POST['nota']);

    if($titulo){
      mysql_query("UPDATE notas SET titulo = '$titulo', nota = '$nota' WHERE id_nota = '$id'");
      $action = 'atualizar';

      $msg = '<p class="aviso">A nota foi salva!</p>';
    }
  }

  //visualiza
  if($id){
    $res = mysql_query("SELECT * FROM notas WHERE id_nota = '$id'");
    $row = mysql_fetch_assoc($res);

    $titulo2 = str_replace('"', "&quot;", $row['titulo']);
    $nota2 = stripslashes($row['nota']);
    $action = 'atualizar';
  }

?>


  <div class="corpo">

    <?php if(isset($msg)) echo $msg; ?>

    <div class="box-geral">

      <form method="post" action="" class="frmgeral">
        <p><input type="submit" value="Salvar" class="button" /> <a href="index.php" class="button">Voltar</a></p>
        <input type="hidden" name="action" value="<?php echo $action; ?>" />
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <p><input type="text" name="titulo" class="campos" value="<?php echo $titulo2; ?>" /></p>
        <p><textarea class="campos" id="nota" style="font-size: 13px; min-height: 300px;" name="nota" ><?php echo $nota2;; ?></textarea></p>
        <p><input type="submit" value="Salvar" class="button" /></p>
      </form>

    </div>

  </div><!-- /corpo -->

<?php include('rodape.php'); ?>