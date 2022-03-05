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
            <h1 class="m-0">Renungan</h1>
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
                $data = mysqli_query($koneksi,"select * from renungan where id='$id'");
                while($d = mysqli_fetch_array($data)){
            ?>
        <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group">
                    <label>No renungan</label>
                    <input type="text" class="form-control" id="id" name="id" value="<?php echo $d ['id'] ?>" readonly placeholder="No renungan">
                  </div>  
                  <div class="form-group">
                    <label>Judul renungan</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $d ['judul'] ?>" placeholder="Judul renungan">
                  </div>
                  <div class="form-group">
                    <label>Ayat renungan</label>
                    <input type="text" class="form-control" id="ayat" name="ayat" value="<?php echo $d ['ayat'] ?>" placeholder="Ayat renungan">
                  </div>
                  <div class="form-group">
                    <label>Renungan</label>
                      <textarea class="form-control" rows="3" name="renungan" id="renungan"><?php echo $d['renungan']?></textarea>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
            <div class="card-footer">
                  <button type="submit" name="simpan" value="simpan" class="btn btn-primary">Submit</button>
            </div>
            <?php 
                 if(isset($_POST['simpan'])){
                    if(editrenungan ($_POST) > 0){
                        echo " 
                             <script>
                                document.location.href = 'index.php?r=update';
                            </script>";
                            }else{
                                echo " 
                                    <script>
                                        document.location.href = 'index.php?r=gagal';
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
