<table class="table table-bordered">
                                                <tr>
                                                    <th width="5%">No.</th>
                                                    <th width="20%">Jenis Lahan</th>
                                                    <th width="10%" >< 5 Ha (KK)</th>
                                                    <th width="10%" >5 - 10 Ha (KK)</th>
                                                    <th width="10%" >10 - 50 Ha (KK)</th>
                                                    <th width="10%" >50 - 100 Ha (KK)</th>
                                                    <th width="10%" >100 - 500 Ha (KK)</th>
                                                    <th width="10%" >500 - 1000 Ha (KK)</th>
                                                    <th width="10%" > > 1000 Ha (KK)</th>
                                                    <th width="10%" >Keluarga Yang Memiliki Lahan (KK)</th>
                                                    <th width="10%" >Keluarga Yang Tidak Memiliki Lahan (KK)</th>
                                                    <th width="10%" >Total Keluarga Petani (KK)</th>
                                                </tr>
                                                <?php 
                                                $jml = $kk['jml_kk'];
                                                $no = 1;
                                                foreach ($milik_lahan as $value) {
                                                $nama = $value->nama_data_kategori_master;
                                               
                                                $get1 = $this->M_potensi_pertanian->get_nilai_5($nama);
                                                foreach ($get1 as $data1) {

                                                $get2 = $this->M_potensi_pertanian->get_nilai($nama,5,10);
                                                foreach ($get2 as $data2) {
                                                
                                                $get3 = $this->M_potensi_pertanian->get_nilai($nama,11,50);
                                                foreach ($get3 as $data3) {
                                    
                                                $get4 = $this->M_potensi_pertanian->get_nilai($nama,51,100);
                                                foreach ($get4 as $data4) {

                                                $get5 = $this->M_potensi_pertanian->get_nilai($nama,101,500);
                                                foreach ($get5 as $data5) {

                                                $get6 = $this->M_potensi_pertanian->get_nilai($nama,501,1000);
                                                foreach ($get6 as $data6) {
                                                
                                                $get7 = $this->M_potensi_pertanian->get_nilai_1000($nama);
                                                foreach ($get7 as $data7) {
                                                

                                                $kk1 = $data1->jumlah_kk + $data2->jumlah_kk + $data3->jumlah_kk + $data4->jumlah_kk 
                                                       + $data5->jumlah_kk + $data6->jumlah_kk + $data7->jumlah_kk;
                                                
                                                $tidak_memiliki_lahan = $jml - $kk1;
                                                $total_kk = $kk1 + $tidak_memiliki_lahan;

                                                ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $nama ?></td>
                                                    <td><?= $data1->jumlah_kk ?></td>
                                                    <td><?= $data2->jumlah_kk ?></td>
                                                    <td><?= $data3->jumlah_kk ?></td>
                                                    <td><?= $data4->jumlah_kk ?></td>
                                                    <td><?= $data5->jumlah_kk ?></td>
                                                    <td><?= $data6->jumlah_kk ?></td>
                                                    <td><?= $data7->jumlah_kk ?></td>
                                                    <td><?= $kk1 ?></td>
                                                    <td><?= $tidak_memiliki_lahan ?></td>
                                                    <td><?= $total_kk ?></td>
                                                </tr>
                                                <?php 
                                                 $no++;
                                                    }
                                                    }
                                                    }
                                                    }
                                                    }
                                                    }
                                                    }
                                                    }
                                                ?>
                                            </table>