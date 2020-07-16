<!DOCTYPE html>
<html>
<!-- 
<head>
	<title></title>
</head>
 -->
<body>
	<table style="border-collapse: collapse;" width="100%">
		<tr>
			<td style="border: 1px solid black;" align="center" colspan="3">
				<p>
					<b>BADAN SIBER DAN SANDI NEGARA</b><br>
					<b>JALAN HARSONO R.M. NO.70, RAGUNAN, JAKARTA 12550</b><br>
					<b>TELEPON (021) 7805814, FAKSIMILE(021)78844104</b><br>
					<b>JAKARTA SELATAN 12550</b><br>
				</p>
			</td>
		</tr>
		<tr>
			<td style="border: 1px solid black;" align="center" colspan="3">
				<h3>LEMBAR DISPOSISI</h3>
			</td>
		</tr>
		<tr>
			<td style="border: 1px solid black; width: 50%;">Nomor Agenda / Registrasi : <?= $model->id ?></td>
			<td style="border: 1px solid black; width: 50%;" colspan="2">Tingkat Keamanan : <?= $model->keamanan->keamanan ?></td>
		</tr>
		<tr>
			<td style="border: 1px solid black; width: 50%;">Tanggal Penerimaan : <?= $model->tgl_terima ?></td>
			<td style="border: 1px solid black; width: 50%;" colspan="2">Tingkat Kecepatan : <?= $model->kecepatan->kecepatan ?></td>
		</tr>
		<tr>
			<td style="border-left: 1px solid black; border-top: 1px solid black; border-bottom: 1px solid black;">Tanggal dan No Surat</td>
			<td style="border-top: 1px solid black; border-bottom: 1px solid black;"> : </td>
			<td style="border-top: 1px solid black; border-bottom: 1px solid black; border-right: 1px solid black;"><?= $surat->tgl_surat ?> / <?= $surat->no_surat ?></td>
		</tr>
		<tr>
			<td style="border-left: 1px solid black; border-top: 1px solid black; border-bottom: 1px solid black;">Dari</td>
			<td style="border-top: 1px solid black; border-bottom: 1px solid black;"> : </td>
			<td style="border-top: 1px solid black; border-bottom: 1px solid black; border-right: 1px solid black;"><?= $surat->asal_surat ?></td>
		</tr>
		<tr>
			<td style="border-left: 1px solid black; border-top: 1px solid black; border-bottom: 1px solid black;">Ringkasan Isi</td>
			<td style="border-top: 1px solid black; border-bottom: 1px solid black;"> : </td>
			<td style="border-top: 1px solid black; border-bottom: 1px solid black; border-right: 1px solid black;"><?= $surat->ringkas_surat ?></td>
		</tr>
		<tr>
			<td style="border-left: 1px solid black; border-top: 1px solid black; border-bottom: 1px solid black;">Lampiran</td>
			<td style="border-top: 1px solid black; border-bottom: 1px solid black;"> : </td>
			<td style="border-top: 1px solid black; border-bottom: 1px solid black; border-right: 1px solid black;">-</td>
		</tr>
		<tr>
			<td style="border-left: 1px solid black; border-top: 1px solid black; border-bottom: 1px solid black;">Keterangan</td>
			<td style="border-top: 1px solid black; border-bottom: 1px solid black;"> : </td>
			<td style="border-top: 1px solid black; border-bottom: 1px solid black; border-right: 1px solid black;"><?= $surat->keterangan ?></td>
		</tr>
		<tr>
			<td style="border: 1px solid black; width: 30%;" align="center">Kepada</td>
			<td style="border: 1px solid black; width: 70%;" align="center" colspan="2">Disposisi</td>
		</tr>
		<tr>
			<td style="border: 1px solid black; width: 30%;" align="center">1</td>
			<td style="border: 1px solid black; width: 70%;" align="center" colspan="2">2</td>
		</tr>
		<tr>
			<td style="border: 1px solid black; width: 30%; height: 300px" align="center">
				<?= $model->tujuan->nama_lengkap ?>
			</td>
			<td style="border: 1px solid black; width: 70%; height: 300px" align="center" colspan="2"><?= $model->ringkas_dispo ?></td>
		</tr>
		<tr>
			<td style="border: none solid black; width: 30%;" align="center"></td>
			<td style="border: 0px solid black; width: 70%;" align="center" colspan="2">Ditandatanggani pada <?= date('d-M-Y') ?>, <br>Secara Digital Oleh :</td>
		</tr>
		<tr>
			<td style="border: none solid black; width: 30%;" align="center"></td>
			<td style="border: 0px solid black; width: 70%;" align="center" colspan="2"><?= $model->dibuat->nama_lengkap ?></td>
		</tr>
		<tr>
			<td style="border: none solid black; width: 30%;" align="center"></td>
			<td style="border: 0px solid black; width: 70%;" align="center" colspan="2"><?= $model->dibuat->jabatan->nama_jabatan ?></td>
		</tr>
	</table>
</body>
</html>