<?php


function cek_session_admin(){
    $ci = & get_instance();
    $session = $ci->session->userdata('isLoggedIn');
    if ($session == ''){
        redirect(base_url());
    }
}


  

    function preloader()
    {
     $load = '
<style type="text/css">

      .preloader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 2;
    }
    .preloader .loading {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%,-50%);
      font: 14px arial;
    }

</style>

<script type="text/javascript">

  $(document).ready(function(){
      $(".preloader").fadeOut();
    })

</script>

    <div class="preloader">
      <div class="loading">
        <img src="https://cubicleninjas.com/wp-content/uploads/2018/01/best_webdesign2018.gif" width="300">
        <h4><center>Loading...</center></h4>
      </div>
</div>
';

return $load;
    }


        function hitung_umur($tanggal_lahir) {
            list($year,$month,$day) = explode("-",$tanggal_lahir);
            $year_diff  = date("Y") - $year;
            $month_diff = date("m") - $month;
            $day_diff   = date("d") - $day;
            if ($month_diff < 0) $year_diff--;
                elseif (($month_diff==0) && ($day_diff < 0)) $year_diff--;
            return $year_diff;
        }

        function status_miskin($id)
        {
            if ($id == "TM") {
                $status = "Tidak Miskin";
            } else if ($id == "HM") {
                $status = "Hampir Miskin";
            } else if ($id == "M") {
                $status = "Miskin";
            } else if ($id == "SM"){
                $status = "Sangat Miskin";
            }

            return $status;
        }

        function warna_miskin($id)
        {
            if ($id == "TM") {
                $status = "success";
            } else if ($id == "HM") {
                $status = "primary";
            } else if ($id == "M") {
                $status = "warning";
            } else if ($id == "SM"){
                $status = "danger";
            }

            return $status;
        }



        function jkel($i){
            if ($i == "L") {
                $jk = "Laki - Laki";
            } else {
                $jk = "Perempuan";
            }
            return $jk;
        }

        function agama($i){
            $ci = & get_instance();
            $kk = $ci->db->query("SELECT * FROM tbl_agama WHERE id_agama = '$i' ")->row();
            return $kk->nm_agama;
        }

        function status_kawin($i){
            $ci = & get_instance();
            $kk = $ci->db->query("SELECT * FROM tbl_status_kawin WHERE id_status = '$i' ")->row();
            return $kk->status;
        }

        function tgl($tgl){
            $bulan = substr($tgl,0,2);
            $tahun = substr($tgl,6,10);
            $tglx = substr($tgl,3,2);
            $tgl_baru = $tahun."-".$bulan."-".$tglx;
            return $tgl_baru;
        }

        function show_date($tgl){
            $tahun = substr($tgl,0,4);
            $tanggal = substr($tgl,5,2);
            $bulan = substr($tgl,8,3);
            $rename_tgl = $tanggal."/".$bulan."/".$tahun;
            return $rename_tgl;
        }

        function get_url(){
            $currentURL = uri_string(); //http://myhost/main

            $params   = $_SERVER['QUERY_STRING']; //my_id=1,3

            $fullURL = $currentURL . '?' . $params;

            return $fullURL;   //http://myhost/main?my_id=1,3
        }

        function dropdown($name,$table,$field,$pk,$class,$idx,$title,$kondisi=null,$selected=null,$data=null,$tags=null)
        {
            $CI =& get_instance();
        echo"<select name='".$name."' class='$class' id='".$idx."' $tags>";
                echo "<option value=''>Pilih $title </option>";
                if($data!='')
                {
                    foreach ($data as $data_value => $id)
                    {
                        echo "<option value='$id'>$data_value</option>";
                    }
                }
                if(empty($kondisi))
                {
                    $CI->db->order_by($field,'ASC');
                    $record=$CI->db->get($table)->result();
                }
                else
                {
                    $CI->db->order_by($field,'ASC');
                    $record=$CI->db->get_where($table,$kondisi)->result();
                }
                foreach ($record as $r)
                {
                    echo " <option value='".$r->$pk."' ";
                    echo $r->$pk==$selected?'selected':'';
                    echo ">".strtoupper($r->$field)."</option>";
                }
                    echo"</select>";
        }

        function remove_dot($nominal){
          $nilai = str_replace(".","",$nominal);
          return $nilai;
        }

        function notifikasi($notifikasi){
          if (isset($notifikasi)) {
            if ($notifikasi == "success") {
              $color = "success";
              $val   = "Input Data Berhasil";
            }elseif ($notifikasi == "updated") {
              $color = "info";
              $val   = "Update Data Berhasil";
            }elseif($notifikasi == "double_nik"){
              $color = "warning";
              $val   = "Maaf, NIK yang anda masukan telah terdaftar, Silahkan masukan dengan NIK yang berbeda";
            }elseif($notifikasi == "double_kk"){
                $color = "warning";
                $val   = "Maaf, Nomor KK yang anda masukan telah terdaftar, Silahkan masukan dengan Nomor KK yang berbeda";
            }else{
              $color = "danger";
              $val   = "Hapus Data Berhasil";
            }
            return "
            <div class='alert alert-$color alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <i class='fa fa-check'></i> $val </div>";
          }
        }

        function penyebut($nilai) {
    		$nilai = abs($nilai);
    		$huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
    		$temp = "";
    		if ($nilai < 12) {
    			$temp = " ". $huruf[$nilai];
    		} else if ($nilai <20) {
    			$temp = penyebut($nilai - 10). " belas";
    		} else if ($nilai < 100) {
    			$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
    		} else if ($nilai < 200) {
    			$temp = " seratus" . penyebut($nilai - 100);
    		} else if ($nilai < 1000) {
    			$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
    		} else if ($nilai < 2000) {
    			$temp = " seribu" . penyebut($nilai - 1000);
    		} else if ($nilai < 1000000) {
    			$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
    		} else if ($nilai < 1000000000) {
    			$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
    		} else if ($nilai < 1000000000000) {
    			$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
    		} else if ($nilai < 1000000000000000) {
    			$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
    		}
    		return $temp;
    	}

    	function terbilang($nilai) {
    		if($nilai<0) {
    			$hasil = "minus ". trim(penyebut($nilai));
    		} else {
    			$hasil = trim(penyebut($nilai));
    		}
    		return $hasil;
    	}

        function cetak($str){
            return strip_tags(htmlentities($str, ENT_QUOTES, 'UTF-8'));
        }

        function cetak_meta($str,$mulai,$selesai){
            return strip_tags(html_entity_decode(substr($str,$mulai,$selesai), ENT_COMPAT, 'UTF-8'));
        }

        function sensor($teks){
            $ci = & get_instance();
            $query = $ci->db->query("SELECT * FROM katajelek");
            foreach ($query->result_array() as $r) {
                $teks = str_replace($r['kata'], $r['ganti'], $teks);
            }
            return $teks;
        }

        function getSearchTermToBold($text, $words){
            preg_match_all('~[A-Za-z0-9_äöüÄÖÜ]+~', $words, $m);
            if (!$m)
                return $text;
            $re = '~(' . implode('|', $m[0]) . ')~i';
            return preg_replace($re, '<b style="color:red">$0</b>', $text);
        }

        function tgl_indo($tgl){
                $tanggal = substr($tgl,8,2);
                $bulan = getBulan(substr($tgl,5,2));
                $tahun = substr($tgl,0,4);
                return $tanggal.' '.$bulan.' '.$tahun;
        }

        function tgl_indoo($tgl){
                $tanggal = substr($tgl,8,2);
                $bulan = getBulann(substr($tgl,5,2));
                $tahun = substr($tgl,0,4);
                return $tanggal.' '.$bulan.' '.$tahun;
        }

        function tgl_simpan($tgl){
                $tanggal = substr($tgl,0,2);
                $bulan = substr($tgl,3,2);
                $tahun = substr($tgl,6,4);
                return $tahun.'-'.$bulan.'-'.$tanggal;
        }

        function tgl_view($tgl){
                $tanggal = substr($tgl,8,2);
                $bulan = substr($tgl,5,2);
                $tahun = substr($tgl,0,4);
                return $tanggal.'-'.$bulan.'-'.$tahun;
        }

        function tgl_grafik($tgl){
                $tanggal = substr($tgl,8,2);
                $bulan = getBulan(substr($tgl,5,2));
                $tahun = substr($tgl,0,4);
                return $tanggal.'_'.$bulan;
        }

        function generateRandomString($length = 10) {
            return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
        }

        function hari_ini(){
            date_default_timezone_set('Asia/Jakarta'); // PHP 6 mengharuskan penyebutan timezone.
            $seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
            $hari = date("w");
            return $seminggu[$hari];
        }

        function seo_title($s) {
            $c = array (' ');
            $d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+','–');
            $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
            $s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
            return $s;
        }

        function getBulan($bln){
                    switch ($bln){
                        case 1:
                            return "Januari";
                            break;
                        case 2:
                            return "Februari";
                            break;
                        case 3:
                            return "Maret";
                            break;
                        case 4:
                            return "April";
                            break;
                        case 5:
                            return "Mei";
                            break;
                        case 6:
                            return "Juni";
                            break;
                        case 7:
                            return "Juli";
                            break;
                        case 8:
                            return "Agustus";
                            break;
                        case 9:
                            return "September";
                            break;
                        case 10:
                            return "Oktober";
                            break;
                        case 11:
                            return "November";
                            break;
                        case 12:
                            return "Desember";
                            break;
                    }
                }

        function getBulann($bln){
                    switch ($bln){
                        case 1:
                            return "Januari";
                            break;
                        case 2:
                            return "Februari";
                            break;
                        case 3:
                            return "Maret";
                            break;
                        case 4:
                            return "April";
                            break;
                        case 5:
                            return "Mei";
                            break;
                        case 6:
                            return "Juni";
                            break;
                        case 7:
                            return "Juli";
                            break;
                        case 8:
                            return "Agustus";
                            break;
                        case 9:
                            return "September";
                            break;
                        case 10:
                            return "Oktober";
                            break;
                        case 11:
                            return "November";
                            break;
                        case 12:
                            return "Desember";
                            break;
                    }
                }

                function BulanRomawi($bln){
                    switch ($bln){
                        case 1:
                            return "I";
                            break;
                        case 2:
                            return "II";
                            break;
                        case 3:
                            return "III";
                            break;
                        case 4:
                            return "IV";
                            break;
                        case 5:
                            return "V";
                            break;
                        case 6:
                            return "VI";
                            break;
                        case 7:
                            return "VII";
                            break;
                        case 8:
                            return "VIII";
                            break;
                        case 9:
                            return "IX";
                            break;
                        case 10:
                            return "X";
                            break;
                        case 11:
                            return "XI";
                            break;
                        case 12:
                            return "XII";
                            break;
                    }
                }



    function cek_terakhir($datetime, $full = false) {
    	 $today = time();
         $createdday= strtotime($datetime);
         $datediff = abs($today - $createdday);
         $difftext="";
         $years = floor($datediff / (365*60*60*24));
         $months = floor(($datediff - $years * 365*60*60*24) / (30*60*60*24));
         $days = floor(($datediff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
         $hours= floor($datediff/3600);
         $minutes= floor($datediff/60);
         $seconds= floor($datediff);
         //year checker
         if($difftext=="")
         {
           if($years>1)
            $difftext=$years." Tahun";
           elseif($years==1)
            $difftext=$years." Tahun";
         }
         //month checker
         if($difftext=="")
         {
            if($months>1)
            $difftext=$months." Bulan";
            elseif($months==1)
            $difftext=$months." Bulan";
         }
         //month checker
         if($difftext=="")
         {
            if($days>1)
            $difftext=$days." Hari";
            elseif($days==1)
            $difftext=$days." Hari";
         }
         //hour checker
         if($difftext=="")
         {
            if($hours>1)
            $difftext=$hours." Jam";
            elseif($hours==1)
            $difftext=$hours." Jam";
         }
         //minutes checker
         if($difftext=="")
         {
            if($minutes>1)
            $difftext=$minutes." Menit";
            elseif($minutes==1)
            $difftext=$minutes." Menit";
         }
         //seconds checker
         if($difftext=="")
         {
            if($seconds>1)
            $difftext=$seconds." Detik";
            elseif($seconds==1)
            $difftext=$seconds." Detik";
         }
         return $difftext;
        }

        function format_rupiah($angka){
            $rupiah=number_format($angka,0,',','.');
            return $rupiah;
          }

          function get_token($panjang){
            $token = array(
             range(1,9),
             range('a','z'),
             range('A','Z')
            );

            $karakter = array();
            foreach($token as $key=>$val){
             foreach($val as $k=>$v){
              $karakter[] = $v;
             }
            }

            $token = null;
            for($i=1; $i<=$panjang; $i++){
             // mengambil array secara acak
             $token .= $karakter[rand($i, count($karakter) - 1)];
            }

            return $token;
           }
