<h2><center><?= $judul; ?></center></h2>
<hr/>
<table border="1" width="100%" style="text-align:center;">
	<tr>
		<th>ID</th>
		<th>Nama</th>
		<th>Lapangan</th>
		<th>Alamat</th>
		<th>Jumlah</th>
		<th>Metode</th>
		<th>Status</th>
		<th>Lama Main</th>
		<th>Jam Main</th>
	</tr>
		<tr>
			<td>#00<?= $cetak1['id_pembayaran']; ?></td>
			<td><?= $cetak1['nama_user']; ?></td>
			<td><?= $cetak['nama_lapangan']; ?></td>
			<td><?= $cetak['alamat_lapangan']; ?></td>
			<td>Rp <?= $cetak1['jumlah_pembayaran']; ?></td>
			<td><?= $cetak1['metode_pembayaran']; ?></td>
			<td><?= $cetak1['status_pembayaran']; ?></td>
			<td><?= $cetak['lama_sewa']; ?> Jam</td>
			<td><?= $cetak['jam_sewa']; ?></td>
		</tr>
</table>
<br>
<hr>
<p>*Catatan: Cetak atau screenshoot bukti ini dan tunjukkan kepada penyedia lapangan untuk sebagai bukti bahwa anda telah membayar sewa lapangan!</p>
