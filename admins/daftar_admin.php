<?php 
      if(!defined('akses')){ 
        header("location: http://".$_SERVER['HTTP_HOST']."/403");
        die;
      }
      $query="SELECT nama, email, alamat, no_telepon, id_akun FROM akun where level='admeen'";
      $result=$admin->ambilData($query);
      if(isset($_GET['hapus'])){
        $admin->Hapus($_GET['hapus'], "admin");
      }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Daftar Admin</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo $working_dir;?>/new_assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo $working_dir;?>/new_assets/css/sb-admin-2.min.css" rel="stylesheet">
  
  <!-- Custom styles for this table-->
  <link href="<?php echo $working_dir;?>/new_assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include '_partials/sidebar.php';?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include '_partials/topbar.php';?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Daftar Admin</h1>

          <!-- Table Start -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user"></i> Data Admin</h6>
            </div>
            <div class="card-body">
              <p class="align-left">
                <a class="btn btn-sm btn-icon-split btn-primary" href="<?php echo $working_dir;?>/admin/tambah">
                  <span class="icon">
                    <i class="fas fa-plus"></i>
                  </span>
                  <span class="text">Tambah Admin</span>
                </a>
              </p>
              <div class="table-responsive">
                <table class="table " id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>E-Mail</th>
                      <th>Alamat</th>
                      <th>Telepon</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $no=1;
                    foreach ($result as $data) {
                      echo "
                      <tr>
                        <td>".$no++."</td>
                        <td>".$data['nama']."</td>
                        <td>".$data['email']."</td>
                        <td>".$data['alamat']."</td>
                        <td>".$data['no_telepon']."</td>
                        <td><a type='button' class='btn btn-sm btn-primary btn-icon-split' href='".$working_dir."/admin/edit?id=".$data['id_akun']."'>
                              <span class='icon text-white-50'><i class='fas fa-info'></i></span>
                              <span class='text'>Edit</span>
                            </a>
                            <a type='button' class='btn btn-sm btn-danger btn-icon-split' href='".$working_dir."/admin?hapus=".$data['id_akun']."'>
                              <span class='icon text-white-50'><i class='fas fa-trash'></i></span>
                              <span class='text'>Hapus</span>
                            </a>
                        </td>
                      </tr>";}
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include '_partials/footer.php'?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php include '_partials/modal.php';?>

  <?php include '_partials/script.php'?>
</body>

<script type="text/javascript">
  <?php if(isset($_GET['msg'])){ 
          if($_GET['msg']=="tambah"){?>
            $(document).ready(function(){
                alert('Tambah Sukses!!')
            })
    <?php }elseif($_GET['msg']=="hapus"){ ?>
              $(document).ready(function(){
                  alert('Hapus Sukses!!')
            })
    <?php }elseif($_GET['msg']=="edit"){ ?>
              $(document).ready(function(){
                  alert('Edit Sukses!!')
            })
  <?php }} ?>
</script>

</html>
