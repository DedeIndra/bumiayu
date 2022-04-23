<?php 
	require 'config.php';
	require('fpdf/fpdf.php');
	include $view;
	$lihat = new view($config);
	$toko = $lihat -> toko();
	$hsl = $lihat -> penjualan();
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',16);
	$pdf->SetFillColor(139,69,19);
?>
<html>
	<head>
		<title>HALAMAN PRINT</title>
		<link rel="stylesheet" href="assets/css/bootstrap.css">
	</head>
	<body>
		<script>window.print();</script>
		<div class="container"> 
			<p style="text-align: right;"> Dicetak pada : <?php echo  date('d-m-Y H:i:s')?></p>
			<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
						<p><?php echo $toko['nama_toko'];?></p>
						<p><?php echo $toko['alamat_toko'];?></p>
					<table class="table table-success table-striped" style="width:100%" border="3px">
						<tr >
							<th>No.</th>
							<th>Barang</th>
							<th>Jumlah</th>
							<th>Total</th>
						</tr>
						<?php $no=1; foreach($hsl as $isi){?>
						<tr>
							<td><?php echo $no;?></td>
							<td><?php echo $isi['nama_barang'];?></td>
							<td><?php echo $isi['jumlah'];?></td>
							<td><?php echo $isi['total'];?></td>
						</tr>
						<?php $no++; }?>
					</table>
					<div class="pull-right">
						<table >
							<tr>
								<th><?php $hasil = $lihat -> jumlah(); ?></th>
							</tr>
							<tr>
								<th>Total : Rp.<?php echo number_format($hasil['bayar']);?>,-</th>
							</tr>
						</table>
					</div>
					<div class="clearfix"></div>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<table>
						<tr>
						<td><p>Sumbawa, <?php  echo date("j F Y");?></p></td>
						</tr>
						<tr> <td> <br> </td> </tr>
						<tr> <td> <br> </td> </tr>
						<tr> <td> <br> </td> </tr>
						<tr> <td> <br> </td> </tr>
						<tr>
							<td><h4><?php  echo $_GET['nm_member'];?></h4></td>
						</tr>
					</table>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<center>
						<p>Terima Kasih Telah Berbelanja di toko kami !</p>
					</center>
				</div>
				<div class="col-sm-4"></div>
			</div>
		</div>
	</body>
</html>
