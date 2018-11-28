
<section class="content-header">
  <h1> Data Permintaan Bahan Baku </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Daftar Bahan Baku   </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
		<div class="col-md-12">
          <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="row" style="margin-bottom:20px;">
                        <div class="col-md-6">
                            <h3 class="box-title">Data Bahan Baku  </h3>
                        </div>
                        <div class="col-md-6">
                            <div class="pull-right">
                                <?php 
                                    if ($this->session->userdata('level') == "produksi"  ) {
                                ?>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#add_sarana"><i class="glyphicon glyphicon-plus"></i> Tambah</button>
                                <?php 
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <table id="table5" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="5%">No.</th>
                                <th>Kategori </th>
                                <th>Nama Bahan</th>
                                <th>Qty</th>
                                <th>Tanggal Masuk</th>
                                <th style="width:125px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1; 
                            foreach ($get as $key => $value) {

                            ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $value->nm_jenis_bahan ?></td>
                                <td><?= $value->nm_bahan ?></td>
                                <td><?= $value->qty ?> <?= $value->satuan ?> </td>
                                <td><?= tgl_indo($value->tgl_masuk) ?></td>
                                <td>
                                <?php 
                                    if ($this->session->level == "produksi" ) {
                                ?>
                                    <a href="" title="Edit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_pengurus-<?= $value->id_bahan_baku ?>"><i class="fa fa-edit"></i>  </a>
                                    <a href="" title="Hapus" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_pengurus-<?= $value->id_bahan_baku ?>"><i class="fa fa-trash"></i>  </a>
                                <?php
                                    } else {
                               ?>
                                    <a href="<?= base_url()?>bahan_baku/proses_permintaan/<?= $value->id_bahan_baku ?>" title="Edit" class="btn btn-primary btn-sm" ><i class="fa fa-refresh"></i> Proses  </a>

                               <?php
                                    }
                                    
                                ?>

                                </td>
                                    <!-- Bootstrap modal  add pengurus -->
                                    <div class="modal fade" id="edit_pengurus-<?= $value->id_bahan_baku ?>" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h3 class="modal-title">Edit bahan_baku</h3>
                                                </div>
                                                <div class="modal-body form">
                                                    <form action="<?= base_url()?>bahan_baku/update" id="form" method="POST" enctype="multipart/form-data">
                                                    <input type="hidden" name="id" value="<?= $value->id_bahan_baku ?>">

                                                    <div class="form-group">
                                                        <label class="control-label">Kategori Bahan Baku : </label>
                                                        <select name="jenis_bahan" class="form-control" id="">
                                                            <option value="">Pilih</option>
                                                            <?php 
                                                                foreach ($jenis_bahan as $key => $value_jenis) {
                                                                    if ($value->jenis_bahan == $value_jenis->id_jenis_bahan) {
                                                                        $select = "selected";
                                                                    } else {
                                                                        $select = "";
                                                                    }
                                                                    
                                                            ?>
                                                                <option value="<?= $value_jenis->id_jenis_bahan ?>" <?= $select ?> ><?= $value_jenis->nm_jenis_bahan ?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>

                                                     <div class="form-group">
                                                        <label class="control-label">Bahan Baku : </label>
                                                        <select name="bahan" class="form-control" id="">
                                                            <option value="">Pilih</option>
                                                            <?php 
                                                                foreach ($bahan as $key => $value1) {
                                                                    if ($value->bahan == $value1->id_bahan ) {
                                                                        $select = "selected";
                                                                    } else {
                                                                        $select = "";
                                                                    }
                                                                    
                                                            ?>
                                                                <option value="<?= $value1->id_bahan ?>" <?= $select ?> ><?= $value1->nm_bahan ?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>


                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                                <label class="control-label">Kuantitas : </label>
                                                                <input name="qty" class="form-control" value="<?= $value->qty ?>" type="number" autocomplete="off">  
                                                            </div>
                                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                                <label class="control-label">Satuan : </label>
                                                                <input name="satuan" class="form-control"  value="<?= $value->satuan ?>"  type="text" autocomplete="off">  
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Tanggal Masuk : </label>
                                                        <input name="tgl_masuk" class="form-control"  value="<?= $value->tgl_masuk ?>"  type="date" autocomplete="off">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Keterangan : </label>
                                                        <textarea name="ket" class="form-control"><?= $value->ket ?></textarea>
                                                    </div>


             
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                </div>
                                                </form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    <!-- End Bootstrap modal -->
                                    <!-- Bootstrap modal  add pengurus -->
                                    <div class="modal fade" id="hapus_pengurus-<?= $value->id_bahan_baku ?>" role="dialog">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header  bg-red">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h3 class="modal-title">Hapus Data ? </h3>
                                                </div>
                                                <div class="modal-body form">

                                                   <p><i class="fa fa-info"></i> Yakin Ingin Menghapus Data ? </p>

                                                </div>
                                                <div class="modal-footer">
                                                    <a href="<?= base_url()?>bahan_baku/delete/<?= $value->id_bahan_baku ?>/" class="btn btn-danger">Hapus</a>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                </div>
                                                </form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                        <!-- End Bootstrap modal -->

                            </tr>
                            <?php 
                            $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


   
 




<!-- Bootstrap modal  add sarana -->
<div class="modal fade" id="add_sarana" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Tambah Bahan Baku </h3>
            </div>
            <div class="modal-body form">
                <form action="<?= base_url()?>bahan_baku/add" id="form" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="jenis" value="permintaan" id="">

                    <div class="form-group">
                        <label class="control-label">Kategori Bahan Baku : </label>
                        <select name="jenis_bahan" class="form-control" id="">
                            <option value="">Pilih</option>
                            <?php 
                                foreach ($jenis_bahan as $key => $value) {
                            ?>
                                <option value="<?= $value->id_jenis_bahan ?>"><?= $value->nm_jenis_bahan ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>

                    <!-- <div class="form-group">
                        <label class="control-label">Nama Bahan Baku  : </label>
                        <input name="nm_bahan_baku" class="form-control" type="text" autocomplete="off">
                    </div> -->
                    <div class="form-group">
                        <label class="control-label">Bahan Baku : </label>
                        <select name="bahan" class="form-control" id="">
                            <option value="">Pilih</option>
                            <?php 
                                foreach ($bahan as $key => $value) {
                            ?>
                                <option value="<?= $value->id_bahan ?>"><?= $value->nm_bahan ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <label class="control-label">Kuantitas : </label>
                                <input name="qty" class="form-control" type="number" autocomplete="off">  
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <label class="control-label">Satuan : </label>
                                <input name="satuan" class="form-control" type="text" autocomplete="off">  
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tanggal Masuk : </label>
                        <input name="tgl_masuk" class="form-control" type="date" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Keterangan : </label>
                        <textarea name="ket" class="form-control"></textarea>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="submit" name="save_sarana" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
