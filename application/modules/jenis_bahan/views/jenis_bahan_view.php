
<section class="content-header">
  <h1> Jenis Bahan Baku </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Daftar Jenis Bahan  </li>
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
                            <h3 class="box-title">Data Jenis Bahan </h3>
                        </div>
                        <div class="col-md-6">
                            <div class="pull-right">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#add_sarana"><i class="glyphicon glyphicon-plus"></i> Tambah</button>
                            </div>
                        </div>
                    </div>
                    <table id="table5" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="5%">No.</th>
                                <th>Jenis Bahan </th>
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

                                <td>
                                    <a href="" title="Edit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_pengurus-<?= $value->id_jenis_bahan ?>"><i class="fa fa-edit"></i>  </a>
                                    <a href="" title="Hapus" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_pengurus-<?= $value->id_jenis_bahan ?>"><i class="fa fa-trash"></i>  </a>
                                </td>
                                    <!-- Bootstrap modal  add pengurus -->
                                    <div class="modal fade" id="edit_pengurus-<?= $value->id_jenis_bahan ?>" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h3 class="modal-title">Edit Jenis Bahan</h3>
                                                </div>
                                                <div class="modal-body form">
                                                    <form action="<?= base_url()?>jenis_bahan/update" id="form" method="POST" enctype="multipart/form-data">
                                                    <input type="hidden" name="id" value="<?= $value->id_jenis_bahan ?>">
                                                    <div class="form-group">
                                                        <label class="control-label">Nama Jenis Bahan Baku 
                                                              : </label>
                                                        <input name="nm_jenis_bahan" class="form-control" value="<?= $value->nm_jenis_bahan ?>" type="text" autocomplete="off">
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
                                    <div class="modal fade" id="hapus_pengurus-<?= $value->id_jenis_bahan ?>" role="dialog">
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
                                                    <a href="<?= base_url()?>jenis_bahan/delete/<?= $value->id_jenis_bahan ?>/" class="btn btn-danger">Hapus</a>
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
                <h3 class="modal-title">Tambah Jenis Bahan Baku  </h3>
            </div>
            <div class="modal-body form">
                <form action="<?= base_url()?>jenis_bahan/add" id="form" method="POST" enctype="multipart/form-data">
     
                    <div class="form-group">
                        <label class="control-label">Nama  Jenis Bahan Baku  : </label>
                        <input name="nm_jenis_bahan" class="form-control" type="text" autocomplete="off">
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
