<?php
// Include config file
include"config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>Hisab</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<script src="js/bootstrap.min.js"></script>
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ padding: 20px;  text-align: left;   margin: auto;
        width: 40%;}
        .result{ padding: 20px;  text-align: left;   margin: auto;
        width: 40%;}
        @media screen and (max-width: 600px) {
			.wrapper{ width: 100%;}
            .result{ width: 100%;}
		}
		table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        }

        tr:nth-child(even) {
        background-color: #dddddd;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="form-group">
          <label>Tanggal</label>
                <input type="text" name="tgl" placeholder="Tanggal Hijriyah" class="form-control <?php echo (!empty($tgl_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $tgl; ?>">
                <span class="invalid-feedback"><?php echo $tgl_err; ?></span>      
    </div>    
    <div class="form-group">
                <label>Bulan</label>
                <select id="bulan" name="bulan" class="form-control <?php echo (!empty($bulan_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $bulan; ?>">
                    <option value="">Bulan..</option>
                    <option value="1">Muharram</option>
                    <option value="2">Shafar</option>
                    <option value="3">Rabiul Awal</option>
                    <option value="4">Rabiul Akhir</option>
                    <option value="5">Jumadil Awal</option>
                    <option value="6">Jumadil Akhir</option>
                    <option value="7">Rojab</option>
                    <option value="8">Sya'ban</option>
                    <option value="9">Romadhon</option>
                    <option value="10">Syawal</option>
                    <option value="11">Zul-Qa'dah</option>
                    <option value="12">Zul-Hijjah</option>

                </select>    
                <span class="invalid-feedback"><?php echo $bulan_err; ?></span>
    </div>  
    <div class="form-group">
          <label>Tahun</label>
                <input type="text" name="tahun" placeholder="Tahun Hijriyah" class="form-control <?php echo (!empty($tgl_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $tahun; ?>">
                <span class="invalid-feedback"><?php echo $tahun_err; ?></span>      
    </div> 
    <div class="form-group">
                <input type="hidden"  name="status" value="0">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
    </div>
    </form>
</div>    
<div class="result">
<?php
// Define variables and initialize with empty values
$tgl = $bulan = $tahun = "";
$tgl_err = $bulan_err = $tahun_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["tgl"]))){
        $tgl_err = "Masukkan tanggal";     
    } else{
        $tgl = trim($_POST["tgl"]);
    }
    
    if(empty(trim($_POST["bulan"]))){
        $bulan_err = "Masukkan bulan";     
    } else{
        $bulan = trim($_POST["bulan"]);
    }
    if(empty(trim($_POST["tahun"]))){
        $tahun_err = "Masukkan tahun";     
    } else{
        $tahun = trim($_POST["tahun"]);
    }    
    
    if(empty($tgl_err) && empty($bulan_err) && empty($tahun_err) ){
        $namabulanqo = [Muharram,Shaffar,RabiulAwal,RabiulAkhir,JumadilAwal,JumadilAkhir,Rajab,Syaban,Romadhon,Syawal,Zulkhodah,Zulhijah];
        echo $tgl .'-'. $namabulanqo[$bulan-1] .'-'. $tahun;
        echo '<xmp></xmp>';
        echo '<b>Mencari jumlah total hari dari tgl 1-1-1H</b><br>';
        echo $tgl .'-'. $bulan .'-'. $tahun;
        $hari = $tgl;
        $jmlbulan = $bulan-1;
        $jmlsisatahun = $tahun;
        $jmltahun = $tahun-1;
        echo '<br>';
        echo $tgl .'-'. $bulan .'-'. $tahun.' = '.$tgl .' hari '. $jmlbulan .' bulan '. $jmltahun .' tahun ';
        $periode = floor($tahun/30);
        echo '<br><b>Mencari total periode yg telah dilalui</b> <br>';
        echo '1 Periode = 30 tahun ';
        echo '<br>';
        echo 'Jumlah Periode = '. $tahun .'/30 = '. $periode .' Periode'; 
        echo '<br>';
        $sisaperiode = $jmltahun%30;
        $sisaperiode1 = $tahun%30;
        echo 'Jumlah hasil sisa pembagian Periode = '. $sisaperiode1 .' tahun';
        echo '<xmp></xmp>';
        echo 'Lihat hasil pembagian di tabel berikut ';
        echo '<table><tr>
        <td>Basitoh 19 tahun</td>
        <td>1-3-4-6-8-9-11-12-14-16-17-19-20-22-23-25-27-28-30</td>
        </tr><tr>
        <td>Kabisat 11 tahun</td>
        <td>2-5-7-10-13-15-18-21-24-26-29</td>
        </tr></table>';
        echo '<xmp></xmp>';
        $basitoh = ["1", "3", "4", "6", "8","9", "11", "12", "14", "16", "17", "19", "20", "22", "23", "25", "27", "28", "30"];
        $kabisat = ["2", "5", "7", "10", "13","15", "18", "21", "24", "26", "29"];
           if(in_array($sisaperiode1, $basitoh) == true) {
           echo 'Dengan sisa periode = '.$sisaperiode1.' maka tahun '.$tahun.' merupakan tahun Basitoh';
           $basitoh = true;
           $kabisat = false;
           } else 
           if(in_array($sisaperiode1, $kabisat) == true) {
           echo 'Dengan sisa periode = '.$sisaperiode1.' maka tahun '.$tahun.' merupakan tahun Kabisah';
           $kabisat = true;
           $basitoh = false;
           };
        echo '<xmp></xmp>';
        echo $jmltahun.' tahun = '.$periode. ' Periode + '. $sisaperiode.' tahun'; 
        echo '<br>';
        
        // jika KABISAT
           if ($kabisat == true) {
           echo '<b>Tahun KABISAT</b><br>';
           $result5 = mysqli_query($link, "SELECT id,jmlhari FROM jmlhariqom WHERE id='" . $sisaperiode . "' ");
           $row5=mysqli_fetch_array($result5); 
              if ($result5) {
              $jmlharina = $row5[1];  
              }
           echo $jmltahun.' tahun = '.$periode. ' Periode x ((19 tahun basitoh x 354 hari) +(11 tahun kabisat x 355 hari)) + '. $sisaperiode.' tahun'; 
           echo '<br>';
           echo 'Jumlah hari sisa periode = '.$sisaperiode.' thn atau '.$jmlharina.' hari';
           $jmlhari = ($periode*10631)+($jmlharina);
           echo '<xmp></xmp>';
           echo $jmltahun.' tahun = ('.$periode.' x 10631) + '.$jmlharina.' (cat : 10631 adalah jumlah hari dalam 30 periode Kabisah)<br>';
           echo $jmltahun.' tahun = '.$jmlhari.' hari';
           echo '<xmp></xmp>';
           echo 'Total jumlah hari = '.$jmlhari.' + '.$jmlbulan.' bulan + '.$hari. ' hari'; 
           echo '<xmp></xmp>';
           echo 'Lihat Tabel bulan';
           echo '<xmp></xmp>';
           echo '<table><tr>
           <td>Basitoh 354 hari</td>
           <td>Muh 30 hari, shaf 29 hari, RA 30 hari, RK 29 hari, JA 30 hari, JK 29 hari, Rj 30, Sya 30 hari, Rom 29 hari, Syaw 29 hari, Dzulk 30 hari, Dz 29 hari </td>
           </tr><tr>
           <td>Kabisat 355 hari</td>
           <td>Muh 30 hari, shaf 29 hari, RA 30 hari, RK 29 hari, JA 30 hari, JK 29 hari, Rj 30, Sya 29 hari, Rom 30 hari, Syaw 29 hari, Dzulk 30 hari, Dz 30 hari </td>
           </tr></table>';
           echo '<xmp></xmp>';
           $bulankabisat = [30,29,30,29,30,29,30,29,30,29,30,30];
           $top = array_slice($bulankabisat, 0, $jmlbulan);
           
           $jmlblnkabisat = array_sum($top);
           echo '<xmp></xmp>';
           echo $jmlbulan.' bulan tahun Kabisah = '.$jmlblnkabisat.' hari';
           echo '<xmp></xmp>';
           echo 'Total jml hari = '.$jmlhari.' + '.$jmlblnkabisat.' + '.$hari ;
           $total = $jmlhari+$jmlblnkabisat+$hari;
           echo '<br>';
           echo 'Total hari = '.$total;
           echo '<br>';
           echo 'Mencari sisa hari dari total hari dibagi 7 hari perminggu';
           echo '<br>';
           $sisabagiminggu = $total%7;
           echo 'Sisa bagi '.$total.' /7 = ' .$sisabagiminggu ;
           $harijatuh = [Kamis,Jumat,Sabtu,Minggu,Senin, Selasa, Rabu,Kamis];
           echo '<br>';
           echo 'Kamis = 0, Jumat = 1, Sabtu = 2, Minggu = 3, Senin = 4, Selasa = 5, Rabu = 6, Kamis = 7';
           echo '<br> Sisa dibagi 7 = '.$sisabagiminggu.' hari, lihat uraian hari di atas<br>';
           echo '<b>'.$tgl.' - '.$namabulanqo[$bulan-1]. ' - '.$tahun.' jatuh pada hari : '.$harijatuh[$sisabagiminggu].'</b>';
           
           echo '<br>';
           echo '<br>';
           echo '<b>Konversi ke Masehi</b>';
           echo '<br>';
           $totalsyam = $total + 227016 + 13;
           echo '<br>';
           echo 'interval syamsiah dan qomariah = 227016 + 13 hari<br>';
           echo 'Total hari konversi = '.$total.' + 227016 + 13';
           echo '<br>';
           echo 'Total hari konversi = '.$totalsyam.' hari<br>';
           echo '<b>Mencari jumlah periode masehi</b><br>';
           echo '1 periode masehi adalah 4 tahun dengan jumlah total hari 1461<br>';
           echo 'Jumlah Periode = '.$totalsyam.' /1461';
           $totperiode = floor($totalsyam/1461);
           echo '<br>';
           echo 'Jumlah Periode '.$totperiode;
           echo '<br>';
           echo '<b>Mencari sisa pembagian periode masehi</b><br>';
           echo 'Sisa Periode = '.$totalsyam.' /1461<br>';
           $totsisaperiode = $totalsyam%1461;
           echo 'Sisa Periode '.$totsisaperiode;
           echo '<br>';
           echo '<b>Mencari tahun masehi dengan mengalikan jumlah periode dengan 4</b><br>';
           echo 'Tahun = '.$totperiode.' x 4';
           $tahun1 = $totperiode*4;
           echo '<br>';
           echo 'Tahun = '.$tahun1;
           echo '<br>';
           echo '<b>Mencari jumlah tahun dan sisa hari dari Sisa Periode '.$totsisaperiode.' hari </b> = ';
           if (($totsisaperiode>=365) && ($totsisaperiode<730)){
               $totsisahari1 = $totsisaperiode-365;
               $tahunhasil = 1;
           } else if (($totsisaperiode>=730) && ($totsisaperiode<1095)){
               $totsisahari1 = $totsisaperiode-730;
               $tahunhasil = 2;
           } else if (($totsisaperiode>=1095) && ($totsisaperiode<1461)){
               $totsisahari1 = $totsisaperiode-1095; 
               $tahunhasil = 3;
           } else if (($totsisaperiode<=365)){
               $totsisahari1 = $totsisaperiode; 
               $tahunhasil = 0;
           }
           
           
           echo $tahunhasil. ' tahun dan ';
           echo $totsisahari1. ' hari';echo '<br>';
           echo '<b>Menjumlahkan tahun masehi dengan jumlah tahun dari sisa periode</b><br>';
           echo 'Tahun = tahun '.$tahun1.' + tahun sisa '.$tahunhasil.' = ';
           echo $tahun1+$tahunhasil; 
           echo '<br>';

           echo '<b>Merecah sisa hari periode '.$totsisahari1.' hari</b><br>';
           
           $sql = "SELECT id,basitoh FROM databulansyam order by id ASC";
           if($stmt = mysqli_prepare($link, $sql)){
            
              if(mysqli_stmt_execute($stmt)){ 
                
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) >= 1){
                mysqli_stmt_bind_result($stmt, $id, $basitoh);
                $i=0;
                
                  while (mysqli_stmt_fetch($stmt))
                  {
                      if ($totsisahari1>$basitoh) {
                      echo $totsisahari1.' - '.$basitoh; echo '<br>';    
                      $totsisahari1=$totsisahari1-$basitoh;
                      
                      echo $totsisahari1; echo '<br>';
                      $i++;
                      echo 'bulan '.$i; echo'<br>';
                      }
                 
                  }
                }
              }
            } // table basitoh/kabisat
            echo '<br>';
            echo $tahun1+$tahunhasil.' tahun + '.$i.' bulan + '.$totsisahari1.' hari' ;
            
            $bulanna=$i+1;
            $tahunna= $tahun1+$tahunhasil+1;
            echo '<br>';
            echo '<br>';
            echo '<b>'.$tgl.' - '.$namabulanqo[$bulan-1]. ' - '.$tahun.' jatuh pada hari : '.$harijatuh[$sisabagiminggu].'</b>';
            echo '<br>';
            $namabulan = [Januari,Februari,Maret,April,Mei,Juni,Juli,Agustus,September,Oktober,November,Desember];
            echo '<b>Tanggal '.$totsisahari1.' - '.$namabulan[$bulanna-1].' - '.$tahunna.'</b>';
            
            echo '<br>';
           
           //jika BASITOH
           } else 
           if ($basitoh == true) {
           echo '<b>Tahun BASITOH</b><br>';
           $result5 = mysqli_query($link, "SELECT id,jmlhari FROM jmlhariqom WHERE id='" . $sisaperiode . "' ");
           $row5=mysqli_fetch_array($result5); 
              if ($result5) {
              $jmlharina = $row5[1];  
              }
           
           echo $jmltahun.' tahun = '.$periode. ' Periode x ((19 tahun basitoh x 354 hari) +(11 tahun kabisat x 355 hari)) + '. $sisaperiode.' tahun'; 
           echo '<br>';
           echo 'Jumlah hari sisa periode = '.$sisaperiode.' thn atau '.$jmlharina.' hari';
           $jmlhari = ($periode*10631)+($jmlharina);
           echo '<xmp></xmp>';
           echo $jmltahun.' tahun = ('.$periode.' x 10631) + '.$jmlharina.' (cat : 10631 adalah jumlah hari dalam 30 periode Basitoh)<br>';
           echo $jmltahun.' tahun = '.$jmlhari.' hari';
           echo '<xmp></xmp>';
           echo 'Total jumlah hari = '.$jmlhari.' + '.$jmlbulan.' bulan + '.$hari. ' hari'; 
           echo '<xmp></xmp>';
           echo 'Lihat Tabel bulan';
           echo '<xmp></xmp>';
           echo '<table><tr>
           <td>Basitoh 354 hari</td>
           <td>Muh 30 hari, shaf 29 hari, RA 30 hari, RK 29 hari, JA 30 hari, JK 29 hari, Rj 30, Sya 30 hari, Rom 29 hari, Syaw 29 hari, Dzulk 30 hari, Dz 29 hari </td>
           </tr><tr>
           <td>Kabisat 355 hari</td>
           <td>Muh 30 hari, shaf 29 hari, RA 30 hari, RK 29 hari, JA 30 hari, JK 29 hari, Rj 30, Sya 29 hari, Rom 30 hari, Syaw 29 hari, Dzulk 30 hari, Dz 30 hari </td>
           </tr></table>';
           echo '<xmp></xmp>';
           $bulanbasitoh = [30,29,30,29,30,29,30,30,29,29,30,29];
           $top = array_slice($bulanbasitoh, 0, $jmlbulan);
           $jmlblnbasitoh = array_sum($top);
           echo '<xmp></xmp>';
           echo $jmlbulan.' bulan tahun Basitoh = '.$jmlblnbasitoh.' hari';
           echo '<xmp></xmp>';
           echo 'Total jml hari = '.$jmlhari.' + '.$jmlblnbasitoh.' + '.$hari ;
           $total = $jmlhari+$jmlblnbasitoh+$hari;
           echo '<br>';
           echo 'Total hari = '.$total;
           echo '<br>';
           echo 'Mencari sisa hari dari total hari dibagi 7 hari perminggu';
           echo '<br>';
           $sisabagiminggu = $total%7;
           echo 'Sisa bagi '.$total.' /7 = ' .$sisabagiminggu ;
           $harijatuh = [Kamis,Jumat,Sabtu,Minggu,Senin, Selasa, Rabu,Kamis];
           echo '<br>';
           echo 'Kamis = 0, Jumat = 1, Sabtu = 2, Minggu = 3, Senin = 4, Selasa = 5, Rabu = 6, Kamis = 7';
           echo '<br> Sisa dibagi 7 = '.$sisabagiminggu.' hari, lihat uraian hari di atas<br>';
           echo '<b>'.$tgl.' - '.$namabulanqo[$bulan-1]. ' - '.$tahun.' jatuh pada hari : '.$harijatuh[$sisabagiminggu].'</b>';
           
           echo '<br>';
           echo '<br>';
           echo '<b>Konversi ke Masehi</b>';
           echo '<br>';
           $totalsyam = $total + 227016 + 13;
           echo '<br>';
           echo 'interval syamsiah dan qomariah = 227016 + 13 hari<br>';
           echo 'Total hari konversi = '.$total.' + 227016 + 13';
           echo '<br>';
           echo 'Total hari konversi = '.$totalsyam.' hari<br>';
           echo '<b>Mencari jumlah periode masehi</b><br>';
           echo '1 periode masehi adalah 4 tahun dengan jumlah total hari 1461<br>';
           echo 'Jumlah Periode = '.$totalsyam.' /1461';
           $totperiode = floor($totalsyam/1461);
           echo '<br>';
           echo 'Jumlah Periode '.$totperiode;
           echo '<br>';
           echo '<b>Mencari sisa pembagian periode masehi</b><br>';
           echo 'Sisa Periode = '.$totalsyam.' /1461<br>';
           $totsisaperiode = $totalsyam%1461;
           echo 'Sisa Periode '.$totsisaperiode;
           echo '<br>';
           echo '<b>Mencari tahun masehi dengan mengalikan jumlah periode dengan 4</b><br>';
           echo 'Tahun = '.$totperiode.' x 4';
           $tahun1 = $totperiode*4;
           echo '<br>';
           echo 'Tahun = '.$tahun1;
           echo '<br>';
           echo '<b>Mencari jumlah tahun dan sisa hari dari Sisa Periode '.$totsisaperiode.' hari </b> = ';
           if (($totsisaperiode>=365) && ($totsisaperiode<730)){
               $totsisahari1 = $totsisaperiode-365;
               $tahunhasil = 1;
           } else if (($totsisaperiode>=730) && ($totsisaperiode<1095)){
               $totsisahari1 = $totsisaperiode-730;
               $tahunhasil = 2;
           } else if (($totsisaperiode>=1095) && ($totsisaperiode<1461)){
               $totsisahari1 = $totsisaperiode-1095; 
               $tahunhasil = 3;
           } else if (($totsisaperiode<=365)){
               $totsisahari1 = $totsisaperiode; 
               $tahunhasil = 0;
           }
           
           
           echo $tahunhasil. ' tahun dan ';
           echo $totsisahari1. ' hari';echo '<br>';
           echo '<b>Menjumlahkan tahun masehi dengan jumlah tahun dari sisa periode</b><br>';
           echo 'Tahun = tahun '.$tahun1.' + tahun sisa '.$tahunhasil.' = ';
           echo $tahun1+$tahunhasil; 
           echo '<br>';

           echo '<b>Merecah sisa hari periode '.$totsisahari1.' hari</b><br>';
           
           $sql = "SELECT id,basitoh FROM databulansyam order by id ASC";
           if($stmt = mysqli_prepare($link, $sql)){
            
              if(mysqli_stmt_execute($stmt)){ 
                
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) >= 1){
                mysqli_stmt_bind_result($stmt, $id, $basitoh);
                $i=0;
                
                  while (mysqli_stmt_fetch($stmt))
                  {
                      if ($totsisahari1>$basitoh) {
                      echo $totsisahari1.' - '.$basitoh; echo '<br>';    
                      $totsisahari1=$totsisahari1-$basitoh;
                      
                      echo $totsisahari1; echo '<br>';
                      $i++;
                      echo 'bulan '.$i; echo'<br>';
                      }
                 
                  }
                }
              }
            } // table basitoh/kabisat
            
            echo $tahun1+$tahunhasil.' tahun + '.$i.' bulan + '.$totsisahari1.' hari' ;
            
            $bulanna=$i+1;
            $tahunna= $tahun1+$tahunhasil+1;
            echo '<br>';
            echo '<br>';
            echo '<b>'.$tgl.' - '.$namabulanqo[$bulan-1]. ' - '.$tahun.' jatuh pada hari : '.$harijatuh[$sisabagiminggu].'</b>';
            echo '<br>';
            $namabulan = [Januari,Februari,Maret,April,Mei,Juni,Juli,Agustus,September,Oktober,November,Desember];
            echo '<b>Tanggal '.$totsisahari1.' - '.$namabulan[$bulanna-1].' - '.$tahunna.'</b>';
            
            echo '<br>';
            
            
           
           } //basitoh   
    } //if no empty
    
} //post


?>
    
</div>
</body>
</html>
