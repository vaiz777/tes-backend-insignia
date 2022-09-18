<section class="content">
    <div class="box">
        <div class="box-header">
            <a href="#" class="btn btn-success" data-toggle="modal">
                <i class="fa fa-align-left"></i> Tambah Data
            </a>

        </div><!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Invoice Id</th>
                        <th>Customer ID / Name</th>
                        <th>Total Price</th>
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
                        <td><?= $row["attributes"]["InvoiceNumber"];  ?></td>
                        <td><?= $row["attributes"]["CustomerId"]; ?></td>
                        <td><?= $row["attributes"]["TotalPrice"]; ?></td>
                        <td>
                            <a href="#" class="btn btn-primary" data-toggle="modal">
                                <i class="fa fa-pencil"></i> Edit
                            </a>
                            <a class="btn btn-danger" href="<?php echo site_url('Order/delete/'.$row["id"]);?>"
                                onclick="return confirm('Anda yakin?')"> <i class="fa fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                    <?php }
    }
    ?>

                </tbody>
                <tr>
                    <th>ID</th>
                    <th>Invoice Id</th>
                    <th>Customer ID / Name</th>
                    <th>Total Price</th>
                    <th>Aksi</th>
                </tr>
                </tfoot>
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->

</section><!-- /.content -->