<?php if(empty($data)): ?>
	<tr>
		<td colspan="100%" style="text-align: center; font-style: italic;">
			(Tidak ada data)
		</td>
	</tr>
<?php else: ?>
	<?php foreach ($data as $key => $l): ?>
		<?php if($l->hasilbil == null): ?>
			<tr style="background: #CC3338; color: white;">
		<?php elseif($l->BelumLengkap): ?>
			<tr style="background-color: #FFFE66;">
		<?php elseif(empty($l->PrintCount)): ?>
			<tr style="background-color: #4C9DFF; color: white;">
		<?php else: ?>
			<tr>
		<?php endif ?>
			<td><?= @$l->Notran ?></td>
			<td><?= @$l->Nolab ?></td>
			<td><?= @$l->Regno ?></td>
			<td><?= @$l->MedRec ?></td>
			<td><?= $l->Tglhasil == null ? '' : date("d/m/Y", strtotime($l->Tglhasil)) ?></td>
			<td><?= @$l->Firstname ?> <i>(<?= @$l->Umurthn ?> Thn)</i></td>
			<td><?= @$l->NmKategori ?></td>
			<td><?= @$l->Catatan ?></td>
			<td><?= @$l->NMPoli ?></td>
			<td><?= @$l->NmBangsal ?></td>
			<td><?= @$l->NMKelas ?></td>
			<td><?= empty($l->MedRec) ? @$l->CatatanRegistrasi : $l->Address ?></td>
			<td>
				<a href="<?= base_url('hasilpemeriksaan/show_pemeriksaan/'.$l->Notran) ?>" title="Isi Pemeriksaan Laboratorium">
					<i class="fa fa-folder-open green"></i>
				</a>
				<a href="<?= base_url('hasilpemeriksaan/print_hasil_pemeriksaan?notransaksi='.$l->Notran) ?>" title="Print Hasil Pemeriksaan" target="_blank">
					<i class="fa fa-print blue"></i>
				</a>
				<a href="<?= base_url('billingpemeriksaan/print_label_billing?notransaksi='.$l->Notran) ?>" target="_blank" title="Print Label">
					<i class="fa fa-print orange"></i>
				</a>
				<a href="<?= base_url('billingpemeriksaan/print_rincian_biaya_billing_pemeriksaan?notransaksi='.$l->Notran.'') ?>" target="_blank" title="Print Rincian Biaya Billing Pemeriksaan">
					<i class="fa fa-print yellow"></i>
				</a>
				<a href="<?= base_url('hasilpemeriksaan/print_bukti_pengambilan?notransaksi='.$l->Notran) ?>" target="_blank" title="Print Bukti Pengambilan Hasil Laboratorium">
					<i class="fa fa-print purple"></i>
				</a>
			</td>
		</tr>
	<?php endforeach?>
<?php endif; ?>