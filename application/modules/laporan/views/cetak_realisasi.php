<style>
    table{
        font-family:arial;
        font-size:14px;
        margin:40px 50px;
    }
    thead{
        background-color:#2196f3;
        color:#fff;
    }

    .header{
        font-family:arial;
        margin-top:50px;
    }

</style>

<div class="header">
<div style="float:left; width:25%;">
<center>
<img src="<?= base_url()?>assets/front/x.png" alt="" style="width:60px;">
</center>
</div>

<div style="float:right; width:50%; margin-right:20%;">
    <center>
     <b style="font-size:20px;">DESA KABUBU</b> 
     <br>
     <div style="font-size:12px;">
     KECAMATAN TOPOYO, KABUPATEN MAMUJU TENGAH <br> PROVINSI SULAWESI BARAT
     </div>
    </center>

</div>
</div>



<div style="clear:both;"></div>

<hr>
<center>
<b>LAPORAN REALISASI KEGIATAN</b>
</center>

<table  class="table table-striped table-bordered" cellspacing="0" style="width:auto" border="1">
                      <thead>
                          <tr>
                              <th width="5%">No.</th>
                              <th>Nama Kegiatan</th>
                              <th>Lokasi</th>
                              <th  width="13%">Prakiraan Biaya</th>
                              <th  width="13%">Dana Digunakan</th>
                              <th>Tanggal </th>
                              <th>Persentase</th>
                              <!-- <th width="17%">Status</th> -->
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                          $no = 1;
                          if (isset($_GET['tanggal_dari'])) {

                            $dari = $this->input->get('tanggal_dari');
                            $sampai = $this->input->get('tanggal_sampai');
                            $getx = $this->db->query("SELECT a.* , b.* FROM tbl_realisasi a INNER JOIN tbl_kegiatan b ON a.id_kegiatan = b.id_kegiatan WHERE a.tanggal  BETWEEN  '$dari' AND '$sampai'  ORDER BY a.id_realisasi DESC")->result();
                            $get_ = $getx;

                          } else {

                            $get_ = $get;

                          }

                          foreach ($get_ as $key => $value) {
                          
                          
                            if ($value->status == "n" ) {
                              $color  = "danger";
                              $title  = "Belum Dilaksanakan";
                            } else {
                              $color  = "success";
                              $title  = "Proses Pelaksanaan";
                            }


                          ?>
                          <tr>
                              <td><?= $no ?></td>
                              <td><?= $value->nama_kegiatan ?></td>
                              <td><?= $value->lokasi ?></td>
                              <td>Rp. <?= format_rupiah($value->biaya) ?></td>
                              <td>Rp. <?= format_rupiah($value->dana_digunakan) ?></td>
                              <td><?= tgl_indo($value->tanggal) ?></td>
                              <td><?= $value->persentase ?> % </td>


                              

                          </tr>

                          <?php
                          $no++;
                          }
                          ?>
                      </tbody>
                  </table>

<script type="text/javascript">
      window.onload = function() { window.print(); }
 </script>