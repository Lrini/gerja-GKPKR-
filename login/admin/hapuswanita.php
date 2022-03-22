<?php
 include "function.php";
 $id = $_GET ["id"];
if(hapuswanita ($id) > 0){
				 echo " 
			           <script>
			                document.location.href = 'wanita.php?r=sukses';
			            </script>";
			}else{
				 echo " 
			           <script>
			                document.location.href = 'wanita.php?r=gagal';
			            </script>";
			}
 ?>