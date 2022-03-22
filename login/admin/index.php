<?php
session_start ();
if(!isset($_SESSION['user'])){
  ?>
  <script type="text/javascript">
    alert('login dulu');window.location='../login.php';
  </script>
  <?php
}else{
include "header.php";
include "function.php";
?>
<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Renungan</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
     <!-- Main content -->
     <section class="content">
      <div class="container-fluid">
      <?php if(isset($_GET['r'])): ?>
                    <?php
                        $r = $_GET['r'];
                        if($r=='sukses'){
                            $class='success';
                        }else if($r=='update'){
                            $class='info';   
                        }else if($r=='gagal'){
                            $class='danger';   
                        }else if($r=='added an account'){
                            $class='success';   
                        }else{
                            $class='hide';
                        }
                    ?>
                   <div role="alert" class="alert alert-<?php  echo $class?> ">
                        
                        <strong> <?php echo $r; ?>!</strong>    
                    </div>
                <?php endif; ?>
           <div class="card">
            <div class="card-body">
             <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label>Judul Renungan</label>
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul renungan">
                  </div>
                  <div class="form-group">
                    <label>Ayat renunagn</label>
                    <input type="text" class="form-control" id="ayat" name="ayat" placeholder="Ayat Renungan">
                  </div>
                  <div class="form-group">
                    <label>Renungan</label>
                      <textarea class="form-control" rows="3" name="renungan" id="renungan"></textarea>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
            <div class="card-footer">
                  <button type="submit" name="simpan" value="simpan" class="btn btn-primary">Submit</button>
            </div>
            <?php 
                 if(isset($_POST['simpan'])){
                    if(renungan ($_POST) > 0){
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
                    }
	        ?>
        </div>
              </form>
        </div>
        <div class="card-body">
                      <table id="dataTables" class="table table-bordered table-striped" >
                              <thead>
                                  <tr>
                                      <th>NO.</th>
                                      <th>Judul renungan</th>
                                      <th>Ayat renungan</th>
                                      <th>Pilihan</th>
                                  </tr>
                              </thead>
                          
                          <tbody>
                            <?php
                            $conn = new mysqli("localhost", "root", "", "gereja");
                            if ($conn->connect_errno) {
                              echo "Failed to connect to MySQL: " . $conn->connect_error;
                            }
                            
                            $no = 1;
                            $res = $conn->query("select * from renungan");
                            while($row = $res->fetch_assoc()){
                              echo '
                              <tr>
                                <td>'.$no.'</td>
                                <td>'.$row['judul'].'</td>
                                <td>'.$row['ayat'].'</td>
                                <td>
                                 <a href ="editrenungan.php?id='.$row['id'].'"><i class="btn btn-primary ">edit</i></a>
                                 <a href ="hapusrenungan.php?id='.$row['id'].'"><i class="btn btn-danger ">hapus</i></a>
                                </td>
                              </tr>
                              ';
                              $no++;
                            }
                            ?>
                          </tbody>
                        </table>
                </div>
        <!-- /.card-body -->
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<?php
include "footer.php";
}
?>
