<section class="content">
  <div class="box">
    <div class="box-header">
      <a href="#modalAddBarang" class="btn btn-success" data-toggle="modal">
        <i class="fa fa-align-left"></i> Tambah Data
      </a>
      
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama</th>
              <th>Harga</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php
    
    if(isset($content)){
    $result = json_decode($content, true);
    $extract = $result["data"];
    foreach($extract as $row){

    ?>
      
    <tr>
       
        <td><?= $row["id"]; ?></td>
        <td><?= $row["attributes"]["Name"]; ?></td>
        <td><?= $row["attributes"]["Price"]; ?></td>
        <td>
          <a href="#modalEditBarang<?=$row["id"]?>" class="btn btn-primary" data-toggle="modal">
        <i class="fa fa-pencil"></i> Edit
      </a>
            <a class="btn btn-danger" href="<?php echo site_url('Travel/delete/'.$row["id"]);?>"
               onclick="return confirm('Anda yakin?')"> <i class="fa fa-trash"></i> Hapus</a>
         
        </td>
    </tr>
    <?php }
    }
    ?>

          </tbody>
          <tr>
          <th>ID</th>
              <th>Nama</th>
              <th>Harga</th>
              <th>Aksi</th>
          </tr>
          </tfoot>
        </table>
      </div><!-- /.box-body -->
  </div><!-- /.box -->

</section><!-- /.content -->
  

<div id="modalAddBarang" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Data</h4>
              </div>
              <form class="form-horizontal" method="post" action="<?php echo site_url('Travel/add')?>" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <label class="control-label">ID Travel</label>
                  <div class="col-sm-7">
                    <input type="text" name="idTravel" class="form-control" placeholder="ID Travel">
                  </div>

                </div>

               <div class="form-group">
                  <label class="control-label">Nama</label>
                  <div class="col-sm-7">
                   <input type="text" class="form-control pull-right" id="nameTravel" name="nameTravel">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label">Deskripsi</label>
                  <div class="col-sm-7">
                   <textarea name="descriptionTravel" id="descriptionTravel" cols="30" rows="10"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label">Harga</label>
                  <div class="col-sm-7">   
                   <input type="text" class="form-control pull-right" id="priceTravel" name="priceTravel">
                  </div>
                </div>

                <div class="form-group">
                  <label for="imageTravel" class="control-label">Image</label>
                  <div class="col-sm-7">
                    <input type="file" name="imageTravel" id="imageTravel">
                  </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info">Tambah</button>
              </div>
              
              </form>
            </div>
          </div>
</div>

<?php
if (isset($content)){
    $result = json_decode($content, true);
    $extract = $result["data"];
    foreach($extract as $row){
        ?>
        <div id="modalEditBarang<?=$row["id"];?>" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog">
           <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Edit Data</h3>
            </div>
              <form class="form-horizontal" method="post" action="<?php echo site_url('Travel/edit')?>" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">ID</label>
                        <div class="col-sm-7">
                          <input class="form-control" name="idTravelE" type="text" value="<?=$row["id"];?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                  <label class="control-label">Nama</label>
                  <div class="col-sm-7">
                   <input type="text" class="form-control pull-right" id="nameTravelE" name="nameTravelE" value="<?= $row["attributes"]["Name"]; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label">Deskripsi</label>
                  <div class="col-sm-7">
                   <textarea name="descriptionTravelE" id="descriptionTravelE" cols="30" rows="10"><?= $row["attributes"]["Description"]; ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label">Harga</label>
                  <div class="col-sm-7">   
                   <input type="text" class="form-control pull-right" id="priceTravelE" name="priceTravelE" value="<?= $row["attributes"]["Price"]; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="imageTravel" class="control-label">Image</label>
                  <div class="col-sm-7">
                    <input type="file" name="imageTravelE" id="imageTravelE">
                  </div>
                </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Update</button>
                </div>
               </form>
            </div>
        </div>
        </div>
    <?php }
}?>