<section class="content">
    <div class="box">
        <div class="box-header">
            <a href="#modalAddCustomer" class="btn btn-success" data-toggle="modal">
                <i class="fa fa-align-left"></i> Tambah Data
            </a>

        </div><!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Phone</th>
                        <th>Email</th>
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
                        <td><?= $row["attributes"]["Phone"]; ?></td>
                        <td><?= $row["attributes"]["Email"]; ?></td>
                        <td>
                            <a href="#modalEditCustomer<?=$row["id"]?>" class="btn btn-primary" data-toggle="modal">
                                <i class="fa fa-pencil"></i> Edit
                            </a>
                            <a class="btn btn-danger" href="<?php echo site_url('Customer/delete/'.$row["id"]);?>"
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
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
                </tfoot>
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->

</section><!-- /.content -->

<div id="modalAddCustomer" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Data</h4>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('Customer/add')?>">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label">Nama</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control pull-right" id="nameCustomer" name="nameCustomer">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Address</label>
                        <div class="col-sm-7">
                            <textarea name="addressCustomer" id="addressCustomer" cols="30" rows="10"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Phone</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control pull-right" id="phoneCustomer" name="phoneCustomer">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="emailCustomerLabel" class="control-label">Email</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control pull-right" id="emailCustomer" name="emailCustomer">
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
<div id="modalEditCustomer<?=$row["id"];?>" class="modal fade" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Edit Data</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('Customer/edit')?>">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label">ID Customer</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control pull-right" id="idCustomerE" name="idCustomerE"
                                value="<?=$row["id"]?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Nama</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control pull-right" id="nameCustomerE" name="nameCustomerE"
                                value="<?=$row["attributes"]["Name"]?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Address</label>
                        <div class="col-sm-7">
                            <textarea name="addressCustomerE" id="addressCustomerE" cols="30"
                                rows="10"><?=$row["attributes"]["Address"]?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Phone</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control pull-right" id="phoneCustomerE" name="phoneCustomerE"
                                value="<?=$row["attributes"]["Phone"]?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="emailCustomerLabel" class="control-label">Email</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control pull-right" id="emailCustomerE" name="emailCustomerE"
                                value="<?=$row["attributes"]["Email"]?>">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Edit</button>
                </div>

            </form>
        </div>
    </div>

</div>


<?php }
}?>