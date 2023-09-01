<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }
?>
<h1 class="text-primary"><i class="fas fa-users"></i>  Todos los Usuario<small class="text-warning"> Lista de Usuarios</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Panel de Control </a></li>
     <li class="breadcrumb-item active" aria-current="page">Todos los Usuarios</li>
  </ol>
</nav>

<table class="table  table-striped table-hover table-bordered" id="data">
  <thead class="thead-dark">
    <tr>
      <th scope="col">SL</th>
      <th scope="col">Nombre</th>
      <th scope="col">Correo</th>
      <th scope="col">Usuario</th>
      <th scope="col">Fotografía</th>
      <th scope="col">Estado</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $query=mysqli_query($db,'SELECT * FROM `users`');
      $i=1;
      while ($result = mysqli_fetch_array($query)) { ?>
      <tr>
        <?php 
        echo '<td>'.$i.'</td>
          <td>'.ucwords($result['name']).'</td>
          <td>'.$result['email'].'</td>
          <td>'.ucwords($result['username']).'</td>
          <td><img src="images/'.$result['photo'].'" height="50px"></td>
          <td>'.$result['status'].'</td>
          
          <a class="btn btn-xs btn-warning" href="index.php?page=editstudent&id='.base64_encode($result['id']).'&photo='.base64_encode($result['photo']).'">
          <i class="fa fa-edit"></i></a>

          <a class="btn btn-xs btn-danger" onclick="javascript:confirmationDelete($(this));return false;" href="index.php?page=delete&id='.base64_encode($result['id']).'&photo='.base64_encode($result['photo']).'">
         <i class="fas fa-trash-alt"></i></a>';?>
         </tr>  
        <?php $i++;} ?>
    
  </tbody>
</table>
<script type="text/javascript">
  function confirmationDelete(anchor)
{
   var conf = confirm('¿Estas seguro que quieres desaprobar esta matricula?');
   if(conf)
      window.location=anchor.attr("href");
}
</script>