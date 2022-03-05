<?php
 include "function.php";
 $id = $_GET ["id"];
if(hapusminggu ($id) > 0){
				 echo " 
			           <script>
			                document.location.href = 'minggu.php?r=sukses';
			            </script>";
			}else{
				 echo " 
			           <script>
			                document.location.href = 'minggu.php?r=gagal';
			            </script>";
			}
 ?>