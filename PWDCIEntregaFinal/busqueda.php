<?php 

     $card = $_POST['card_busqueda'];
     $busqueda = $_POST['busqueda'];
     $checker = $_POST['checker_busqueda'];

     if($busqueda > -1 ){
          $card.style.display = 'block';
          echo $checker++;
      }else{
          $card.style.display ='none';
          echo $checker;
      }
?>