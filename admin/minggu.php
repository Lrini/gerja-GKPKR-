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
            <h1 class="m-0">Jadwal pelayan Minggu</h1>
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
                    <label>Liturgis</label>
                    <input type="text" class="form-control" id="liturgis" name="liturgis" placeholder="Liturgis">
                  </div>
                  <div class="form-group">
                    <label>Pujian</label>
                    <input type="text" class="form-control" id="pujian" name="pujian" placeholder="Pujian">
                  </div>
                  <div class="form-group">
                    <label>Pemusik</label>
                    <input type="text" class="form-control" id="pemusik" name="pemusik" placeholder="Pemusik">
                  </div>
                  <div class="form-group">
                    <label>Operator</label>
                    <input type="text" class="form-control" id="operator" name="operator" placeholder="Operator">
                  </div>
                  <div class="form-group">
                    <label>Persembahan</label>
                    <input type="text" class="form-control" id="persembahan" name="persembahan" placeholder="Persembahan">
                  </div>
                  <div class="form-group">
                    <label>Khotbah</label>
                    <input type="text" class="form-control" id="khotbah" name="khotbah" placeholder="Khotbah">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
            <div class="card-footer">
                  <button type="submit" name="simpan" value="simpan" class="btn btn-primary">Submit</button>
            </div>
            <?php 
                 if(isset($_POST['simpan'])){
                    if(minggu ($_POST) > 0){
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
                                      <th>Liturgis</th>
                                      <th>Pujian</th>
                                      <th>Pemusik</th>
                                      <th>Operator</th>
                                      <th>Persembahan</th>
                                      <th>Khotbah</th>
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
                            $res = $conn->query("select * from minggu");
                            while($row = $res->fetch_assoc()){
                              echo '
                              <tr>
                                <td>'.$no.'</td>
                                <td>'.$row['liturgis'].'</td>
                                <td>'.$row['pujian'].'</td>
                                <td>'.$row['pemusik'].'</td>
                                <td>'.$row['operator'].'</td>
                                <td>'.$row['persembahan'].'</td>
                                <td>'.$row['khotbah'].'</td>
                                <td>
                                 <a href ="editminggu.php?id='.$row['id'].'"><i class="btn btn-primary ">edit</i></a>
                                 <a href ="hapusminggu.php?id='.$row['id'].'"><i class="btn btn-danger ">hapus</i></a>
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
