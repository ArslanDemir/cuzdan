<?php
if ($table == 'incomes') {
	$modalName = 'aciklama'.$table;
}elseif ($table == 'expenses') {
	$modalName = 'aciklama'.$table;
}
foreach ($html as $key => $value) {
	?>
	<div id="modal-aciklama">
		<div class="modal fade" id="<?=$modalName.$value['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"><span"><?=$value['title']?></span></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
			        		<div class="form-group">
			        			<label for="<?=$modalName.$value['id']?>">Açıklama</label>
			        			<textarea name="<?=$modalName.$value['id']?>" id="<?=$modalName.$value['id']?>" class="form-control"><?=$value['description']?></textarea>
			        		</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
?>
<table class="table table-border table-hover">
	<tr>
		<td><b>Tarih</b></td>
		<td><b>Açıklama</b></td>
		<td align="right"><b>Tutar</b></td>
	</tr>
	<tr>
		<td><b>Toplam</b></td>
		<td></td>
		<td align="right"><b><?php echo $total ?> TL</b></td>
	</tr>
	<?php
	foreach ($html as $key => $value) {
		?>
		<tr>
					<td><?=$value['date']?></td>
					<td>
					<div class="form-group">
					<button class="form-control" data-toggle="modal" data-target="#<?=$modalName.$value['id']?>"><?=$value['title']?></button>
				</div></td>
					<td align=right><?=$value['type']?></td>
					<td align=right><?=$value['amount']?> TL</td>
		</tr>
	<?php
	}
	?>
</table>