<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Admin
      </h1>
       <ol class="breadcrumb">
        <li><a href="<?php echo base_url('index.php/home/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>
       
      </ol>
     
    </section>



    <!-- Main content -->
    <section class="content">
 

      <!-- Default box -->
       
   

      <!-- /.box -->
    <section class="content">
        <div class="box box-primary">
      
           <div class="box-header with-border">
              <h3 class="box-title">List Data Admin</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th colspan="2" style="text-align: center; ">Aksi</th>
                  
                </tr>
                </thead>
                <tbody>

                  <?php
                  $no = 1;
                    foreach ($adminlist as $a) {
                      echo '
              <tr role="row">
                  <td>'.$no++.'</td>
                  <td>'.$a->nama.'</td>
                  <td>'.$a->username.'</td>
                  <td>'.$a->password.'</td>
             

                    <td>
                    <a href="#" data-target="#modal_edit" data-toggle="modal" class="btn btn-block btn-block btn-primary" onclick="prepare_update_admin('.$a->id_admin.')">Update</a></td>

                    
                    
                  
                </tr>
                      ';
                    }
                  ?>

                
               
                </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.row -->
    </section>
    </section>
    
    <!-- /.content -->
  </div>

  <script type="text/javascript">
          function prepare_update_admin(id)
          {
            $('#id_admin1').val();
            $('#nama1').val();
            $('#username1').val();
            $('#password1').val();
          

            $.getJSON("<?php echo base_url('index.php/home/get_admin_id/');?>" + id, function(data){
              $('#id_admin1').val(data.id_admin);
              $('#nama1').val(data.nama);
              $('#username1').val(data.username);
              $('#password1').val(data.password);
            
            });
          }
  </script>


  <div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="modal_edit" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                    <form action="<?php echo base_url('index.php/home/ubah_admin') ?>" method="post">

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="modal_edit1">Update Admin</h4>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id_admin" id="id_admin1">
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" class="form-control" name="nama"  id="nama1" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" name="username"  id="username1" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="text" class="form-control" name="password"  id="password1" required>
                                            </div>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-primary" value="SAVE">
                                        </div>
                                        </form>

                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>