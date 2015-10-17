<?php

require_once('fungsi_pengunjung.php');
require_once('koneksi.php');
$tgl=date('d-m-Y');
 $waktu = date('Y-m-d H:I:s');
$ip=$_SERVER[REMOTE_ADDR];
$os = getOS($_SERVER['HTTP_USER_AGENT']);
$ua=getBrowser();
$browser= "Your browser: " . $ua['name'] . " " . $ua['version'] ;


echo "<pre>  ";
echo '<pre>';
//print_r($_SERVER);

 
echo '</pre><br/>'.$browser.'</br>';

    echo"_________________________________________________________________________________________________</br>";


// now try it

print_r($browser);

echo"<br/>------------------------------------------------------------------------------------<br/>";

echo "os anda adalah = $os";
//**********************************************************************************GRUP
echo"<br/>grup -----------------------------------------------------------------------------------
ip = $ip<br/>
os = $os<br/>
browser = $browser<br/>
waktu= $waktu<br/>

";
	$sql="INSERT INTO 	tpengunjung(id,
																									ip,
																									browser,
																									os,	
																										halaman,
																												waktu
																 )
													 VALUES('',
																'$ip',
																'$browser',
																'$os',
																'index',
																'$waktu'
																)";
								mysql_query($sql) 
								
									or die ("masukan data pengujung gagal".mysql_error());



$phariini = today();
$pkemarin = yesterday($tgl);
$mingguini = weekly();
$bulanan = monthly();
echo 
'pengunjung hari ini = '.$phariini.'<br/>
pengunjung Kemarin = '.$pkemarin.'<br/>
pengunjung Minggu ini = '.$mingguini.'<br/>
pengunjung Bulan ini = '.$bulanan.'<br/>';
?>
<?php
echo"<img src='graph.php' border=0> ";

$sqlTotal = "SELECT SUM(ip) as ip, DAYOFWEEK(waktu) AS Number  FROM tpengunjung"; 
$total = mysql_query($sqlTotal);
while($resultTotal = mysql_fetch_array($total))
{
    $totalValue
     = $resultTotal['Number'];
}
$data = array($totalValue);
print_r($data);

	 $tgla = date('d');
	 
	 
$namahari1 = date ('l', strtotime($tgl-3));

echo"nama hari = $namahari1,$tgl,$tgla<br/>";	

?> 