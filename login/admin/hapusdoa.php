<?php
 include "function.php";
 $id = $_GET ["id"];
if(hapusdoa ($id) > 0){
				 echo " 
			           <script>
			                document.location.href = 'doa.php?r=sukses';
			            </script>";
			}else{
				 echo " 
			           <script>
			                document.location.href = 'doa.php?r=gagal';
			            </script>";
			}
 ?>