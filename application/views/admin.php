       
            <form action="<?php echo base_url('index.php/home/tambah_admin')?>" role="form" method="post">
              <div class="box-body">

               
                   <div class="form-group">
                  <label >Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                 <div class="form-group">
                  <label >Username</label>
                  <input type="text" class="form-control" id="username" name="username" required>
                </div>


                 <div class="form-group">
                  <label >Password</label>
                  <input type="text" class="form-control" id="password"  name="password" required>
                </div>
                
              
                </div >
          
            <center>  <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button> 
                &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
              <a href="<?php echo base_url('index.php/home/logout'); ?>" class="btn btn-primary">Back</a>
              </div></center>
             
            </form>

             