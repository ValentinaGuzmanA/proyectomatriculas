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

<h1 class="text-primary"><i class="fas fa-users"></i>  Todas las aprobaciones  de Matricula<small class="text-warning"> Lista de Estudiantes</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Panel de Control </a></li>
     <li class="breadcrumb-item active" aria-current="page">Listado de solicitudes</li>
  </ol>
</nav>
<?php if(isset($_GET['delete']) || isset($_GET['edit'])) {?>
  <div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="2000">
    <div class="toast-header">
      <strong class="mr-auto">Aprobacion de matricula s</strong>
      <small><?php echo date('d-M-Y'); ?></small>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body">
      <?php 
        if (isset($_GET['delete'])) {
          if ($_GET['delete']=='success') {
            echo "<p style='color: green; font-weight: bold;'>Solicitud elimminado exitósamente</p>";
          }  
        }
        if (isset($_GET['delete'])) {
          if ($_GET['delete']=='error') {
            echo "<p style='color: red'; font-weight: bold;>Solicitud no eliminado</p>";
          }  
        }
        if (isset($_GET['edit'])) {
          if ($_GET['edit']=='success') {
            echo "<p style='color: green; font-weight: bold; '>EstudianSolicitud te eliminado exitósamente</p>";
          }  
        }
        if (isset($_GET['edit'])) {
          if ($_GET['edit']=='error') {
            echo "<p style='color: red; font-weight: bold;'>Solicitud no editado</p>";
          }  
        }
      ?>
    </div>
  </div>
    <?php } ?>
<table class="table  table-striped table-hover table-bordered" id="data">
  <thead class="thead-dark">
    <tr> 
   

    <th scope="col">SL</th>
      <th scope="col">Nombre de estudiante</th>
      <th scope="col">Nombre de acudiente</th>
      <th scope="col">Registro civil de estudiante</th>
      <th scope="col">Curso selecionado 	</th>
    </tr>
  </thead>
  <tbody>
  <?php 
      $query=mysqli_query($db,'SELECT * FROM `aprobaciónmatrícula`');
      $i=1;
      while ($result = mysqli_fetch_array($query)) { ?>
      <tr>
        <?php 
           echo '<td>'.$i.'</td>
           <td>'.ucwords($result['NombreEstudiante']).'</td>
           <td>'.$result['NombreAcudiente'].'</td>
           <td>'.ucwords($result['NumRegristroCivilEstudiante']).'</td>
           <td>'.$result['CursoSeleccionado'].'</td>

          
           <a class="btn btn-xs btn-warning" href="index.php?page=editstudent&id='.base64_encode($result['id']).'&CursoSeleccionado='.base64_encode($result['CursoSeleccionado']).'">
           <i class="fa fa-edit"></i></a>

          &nbsp; <a class="btn btn-xs btn-danger" onclick="javascript:confirmationDelete($(this));return false;" href="index.php?page=delete&id='.base64_encode($result['id']).'&CursoSeleccionado='.base64_encode($result['CursoSeleccionado']).'">
          <i class="fas fa-trash-alt"></i></a></td>';?>
      </tr>  
      
      <?php $i++;} ?>
    
  </tbody>
</table>
<script type="text/javascript">
  function confirmationDelete(anchor)
{
   var conf = confirm('Estás seguro que deseas eliminar este registro, esta opción es irreversible');
   if(conf)
      window.location=anchor.attr("href");
}
</script>


