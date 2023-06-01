<?php 
if(isset($_POST['txtbusca_curso'])):
	include "conexion.php";
	
	


  $query ="SELECT * , (select concat_ws(' ', Nombre_Usuario, NomPatr_Usuario, NomMatr_Usuario) FROM usuario where usuario.ID_Usuario=curso.Instructor_Curso) FROM curso where Titulo_Curso LIKE '%".$_POST['txtbusca_curso']."%' OR (select concat_ws(' ', Nombre_Usuario, NomPatr_Usuario, NomMatr_Usuario) FROM usuario where usuario.ID_Usuario=curso.Instructor_Curso) LIKE '%".$_POST['txtbusca_curso']."%'";
    $resultado=$conn->query($query);
	?>
<div class="imagenes-filtro">


<?php 




    while($filas = $resultado->fetch_assoc()){

    ?>


    <div class="col-md-3 mt-5" >
 

      <div class="cards p-2">
        
      <img class="card-img-top" src= "data:image/jpeg;base64, <?php echo base64_encode($filas['Foto_Curso2']); ?> " alt=""/>
        
    
        
        <div class="card-body">
    <div class="d-flex justify-content-between">
    
      <h5  class="card-title"><?php echo $filas['Titulo_Curso']?></h5>
    
    <span class="text-success">$<?php echo $filas['Costo_Curso']?>MX</span>
    </div>
  
    <div class="d-flex justify-content-between">
    <a  class="bg-dark text-white text-center pl-2 pr-2" href="guardar_carrito.php?ID_Curso=<?php echo $filas['ID_Curso']?>">Agregar Carrito</a>
   
    <a  class="bg-dark text-white text-center pl-2 pr-2" href="curso-detalle.php?ID_Curso=<?php echo $filas['ID_Curso']?>">Ver Curso</a>
    <div class="bg-dark text-white text-center pl-2 pr-2">Lista de deseo</div>
    </div>
        </div>
      </div>
    </div>
    <?php

}


?>


</div>
<?php
else:
	echo "Error";
endif;
 ?>