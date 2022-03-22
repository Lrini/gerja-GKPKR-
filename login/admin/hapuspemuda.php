<?php
 include "function.php";
 $id = $_GET ["id"];
if(hapuspemuda ($id) > 0){
				 echo " 
			           <script>
			                document.location.href = 'pemuda.php?r=sukses';
			            </script>";
			}else{
				 echo " 
			           <script>
			                document.location.href = 'pemuda.php?r=gagal';
			            </script>";
			}
 ?>