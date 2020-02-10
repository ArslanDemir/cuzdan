<table class="table table-border table-hover">
	<tr>
		<td><b>Başlık<b></td>
	</tr>
	<?php
	foreach ($data['html'] as $key => $value) {
		?>
		<tr>
			<td><?=$value['title']?></td>
		</tr>
	<?php
	}
	?>
</table>
