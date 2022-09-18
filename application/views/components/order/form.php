<section class="content">
    <div class="box">
        <div class="box-header">

        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <form class="form-horizontal" method="post" action="<?php echo site_url('Order/add')?>">
                        <div class="form-group">
                            <label for="Travel Package" class="control-label">Travel Package</label>
                            <div class="col-sm-7">
                                <select class="form-control select2" style="width: 100%;" name="idTravel">
                                    <?php 
                   if(isset($listTravel)){
                     foreach($listTravel as $travelRow){ ?>
                                    <option value="<?=$travelRow["id"]?>">
                                        <?=$travelRow["attributes"]["Name"]." - ".$travelRow["attributes"]["Price"];?>
                                    <option>
                                        <?php
                     }
                   }
                ?>
                                </select>
                            </div>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label class="control-label">Customer</label>
                            <div class="col-sm-7">
                                <select class="form-control select2" style="width: 100%;" name="idCustomer">
                                    <?php 
                   if(isset($listCustomer)){
                     foreach($listCustomer as $customerRow){ ?>
                                    <option value="<?=$customerRow["id"]?>"><?=$customerRow["attributes"]["Name"]?>
                                    <option>
                                        <?php
                     }
                   }
                ?>
                                </select>
                            </div>

                        </div><!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-label">Jumlah</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control pull-right" id="amountOrder" name="amountOrder">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-7">
                                <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info">Tambah</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
</section>
<!-- Select2 -->