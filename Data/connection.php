<?php
   $conn = mysqli_connect("localhost","root", "", "data_import"); 
   if(!$conn){
      echo "<script> alert('Error connected database!'); </script>";
      echo '<meta http-equiv="refresh" content="0;URL=?page=error"/>';
   }
