<style>
#body{
    font-family:arial;
}

</style>
<body onload="window.print()">
<div id="body">

<center style="padding:20px;">
<h1><b> CV. Aresota Sopppeng </b> </h1>
<hr>
<h2><b> LAPORAN BAHAN BAKU </b> </h2>
</center>


                    <table id="table5" class="table table-striped table-bordered" cellspacing="0" width="100%"  cellpadding="10" border="1">
                        <thead style="background-color:grey; color:#fff;">
                            <tr>
                                <th width="5%">No.</th>
                                <th>Kategori </th>
                                <th>Nama Bahan</th>
                                <th>Qty</th>
                                <th>Tanggal Masuk</th>
                                <th>Keterangan</th>
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
                                <td><?= $value->ket ?> </td>
                                
                            </tr>
                            <?php 
                            $no++;
                            }
                            ?>
                        </tbody>
                    </table>

   
   </div>
 


</body>