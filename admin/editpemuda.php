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
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Jadwal Pelayan Pemuda</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <section class="content">
      <div class="container-fluid">
      <?php if(isset($_GET['r'])): ?>
                    <?php
                        $r = $_GET['r'];
                        if($r=='sukses'){
                            $class='success';
                        }else if($r=='updated'){
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
        <?php
                $koneksi = new mysqli("localhost", "root", "", "gereja");
                $id = $_GET['id'];
                $data = mysqli_query($koneksi,"select * from pemuda where id='$id'");
                while($d = mysqli_fetch_array($data)){
            ?>
        <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group">
                    <label>ID</label>
                    <input type="text" class="form-control" id="id" name="id" value="<?php echo $d ['id'] ?>" readonly placeholder="No Liturgis">
                  </div>  
                  <div class="form-group">
                    <label>Liturgis</label>
                    <input type="text" class="form-control" id="liturgis" name="liturgis" value="<?php echo $d ['liturgis'] ?>" placeholder="Liturgis">
                  </div>
                  <div class="form-group">
                    <label>Pemusik</label>
                    <input type="text" class="form-control" id="pemusik" name="pemusik" value="<?php echo $d ['pemusik'] ?>" placeholder="Pemusik">
                  </div>
                  <div class="form-group">
                    <label>Operator</label>
                    <input type="text" class="form-control" id="operator" name="operator" value="<?php echo $d ['operator'] ?>" placeholder="Operator">
                  </div>
                  <div class="form-group">
                    <label>Persembahan</label>
                    <input type="text" class="form-control" id="persembahan" name="persembahan" value="<?php echo $d ['persembahan'] ?>" placeholder="Persembahan">
                  </div>
                  <div class="form-group">
                    <label>Khotbah</label>
                    <input type="text" class="form-control" id="khotbah" name="khotbah" value="<?php echo $d ['khotbah'] ?>" placeholder="Khotbah">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
            <div class="card-footer">
                  <button type="submit" name="simpan" value="simpan" class="btn btn-primary">Submit</button>
            </div>
            <?php 
                 if(isset($_POST['simpan'])){
                    if(editpemuda ($_POST) > 0){
                        echo " 
                             <script>
                                document.location.href = 'pemuda.php?r=update';
                            </script>";
                            }else{
                                echo " 
                                    <script>
                                        document.location.href = 'pemuda.php?r=gagal';
                                     </script>";
                                    
                                }
                    }
                }
	        ?>
        </div>
              </form>
        </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<?php
include "footer.php";
}
?>
