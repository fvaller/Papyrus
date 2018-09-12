<?php include('topo.php'); ?>

<?php
    if(isset($_GET['q'])){

      $q = $_GET['q'];

      //pesquisa no titulo
      $res = mysql_query("SELECT * FROM notas WHERE titulo LIKE '%$q%' ORDER BY id_nota DESC");

      if(mysql_num_rows($res) == 0 ){
        //pesquisa na nota
        $res = mysql_query("SELECT * FROM notas WHERE nota LIKE '%$q%' ORDER BY id_nota DESC");
      }
    }else{
      $res = mysql_query("SELECT * FROM notas ORDER BY id_nota DESC LIMIT 20");
    }
?>

  <div class="topo">

    <form method="get" action="">
      <h1 style="text-align: center;"><i>Papyrus</i></h1>
      <p><input type="text" name="q" value="<?php if(isset($q))echo $q; ?>"/></p>
    </form>

  </div><!-- /topo -->


  <div class="corpo">

  <?php
    $res_t = mysql_num_rows($res);

    if($res_t > 0){
      while($row = mysql_fetch_assoc($res)){
  ?>

    <div class="box">
      <div class="titulo"><a href="add.php?id=<?php echo $row['id_nota']; ?>"><?php echo $row['titulo']; ?></a></div>
      <div class="data">Em <?php echo data_hora($row['data']); ?></div>
      <div class="texto"><?php echo texto_limite(20, $row['nota']); ?></div>
    </div>

  <?php } }else{ ?>
   <div class="box">
      <div class="texto">Não encontrei o que você procura, deseja adicionar <a href="add.php">Adicionar</a></div>
    </div>
  <?php } ?>

  </div><!-- /corpo -->

<?php include('rodape.php'); ?>