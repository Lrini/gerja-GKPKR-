<?php
 include "function.php";
 $id = $_GET ["id"];
if(hapusrenungan ($id) > 0){
				 echo " 
			           <script>
			                document.location.href = 'index.php?r=sukses';
			            </script>";
			}else{
				 echo " 
			           <script>
			                document.location.href = 'index.php?r=gagal';
			            </script>";
			}
 ?>