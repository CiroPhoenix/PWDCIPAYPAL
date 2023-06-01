<?php 
if(isset($_POST['txtbusca'])):
	include "conexion.php";
	
	
    $sql ="SELECT * from usuario where Nombre_usuario_Usuario  LIKE '%".$_POST['txtbusca']."%'";
    $result=mysqli_query($conn,$sql);
	?>
	<tbody>
	<?php
	
while($filas=mysqli_fetch_assoc($result)){
	?>
	<tr>
	
	<td><?php echo  $filas['Nombre_usuario_Usuario']; ?></td>
	
	<td><img height="100px" width="100px" src= "data:image/jpeg;base64, <?php echo base64_encode($filas['Foto_Usuario']); ?> "/></td>
	<td><?php echo  $filas['Rol_Usuario']; ?></td>
	
<td><a href="indexAdministrador_Detalles.php?ID_Usuario=<?php echo $filas['ID_Usuario']?>">Ver Perfil</a></td>
	
	</tr>
	   
	<?php
	}
	
	


?>
</tbody>
<?php
else:
	echo "Error";
endif;
 ?>