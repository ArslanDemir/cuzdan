<!DOCTYPE html>
<html>
<head>
	<title>Panel</title>
</head>
<body>
<div class="container">
	<div class="row" style="margin-top: 10px;">		
		<div class="col">			
			<div class="form-group">
				<button class="form-control btn btn-danger" data-toggle="modal" data-target="#giderModal">Gider Ekle</button>
			</div>
		</div>
		<div class="col">			
			<div class="form-group">
				<button class="form-control btn btn-success" data-toggle="modal" data-target="#gelirModal">Gelir Ekle</button>
			</div>
		</div>
	</div>
	<div class="row">
		<div id="islemler" class="col-md-12">
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a class="nav-link active" id="giderler-tab" data-toggle="tab" href="#giderler" role="tab" aria-controls="giderler" aria-selected="true">
					Giderler
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="gelirler-tab" data-toggle="tab" href="#gelirler" role="tab" aria-controls="gelirler" aria-selected="false">
					Gelirler
					</a>
				</li>
			</ul>
			<div class="tab-content" id="tabContent">
				<div class="tab-pane fade show active" id="giderler" aria-labelledby="giderler-tab">
				</div>
				<div class="tab-pane fade" id="gelirler" aria-labelledby="gelirler-tab">
				</div>
			</div>
		</div>
	</div>
	<div id="modal-giderler">
		<form action="" method="POST">
		<div class="modal fade" id="giderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"><span id="giderTarih"><?php echo date('d-m-Y');?></span>/  Gider Ekle</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
							<div class="form-group">
			        			<label for="giderBaslik	">Gider Başlığı</label>
			        			<input type="text" id="giderBaslik" name="giderBaslik" class="form-control">
			        		</div>
			        		<div class="form-group">
			        			<label for="giderTur">Gider Türü</label>
			        			<select name="giderTur" id="giderTur" class="form-control">
			        				<option value="1">Alışveriş</option>
			        				<option value="2">Otogaz</option>
			        				<option value="3">Fatura</option>
			        			</select>
			        		</div>
			        		<div class="form-group">
			        			<label for="giderMiktar">Miktar</label>
			        			<input type="number" id="giderMiktar" name="giderMiktar" class="form-control">
			        		</div>
			        		<div class="form-group">
			        			<label for="giderAciklama">Açıklama</label>
			        			<textarea name="giderAciklama" id="giderAciklama" class="form-control"></textarea>
			        		</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
						<button type="button" class="btn btn-success" onclick="addExpenses()">Gideri Ekle</button>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
	<div id="modal-gelirler">
		<form action="" method="POST">
		<div class="modal fade" id="gelirModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"><span id="gelirTarih"><?php echo date('d-m-Y');?></span>/  Gelir Ekle</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
			        		<div class="form-group">
			        			<label for="giderBaslik	">Gelir Başlığı</label>
			        			<input type="text" id="gelirBaslik" name="gelirBaslik" class="form-control">
			        		</div>
			        		<div class="form-group">
			        			<label for="gelirTur">Gelir Türü</label>
			        			<select name="gelirTur" id="gelirTur" class="form-control">
			        				<option value="4">Maaş</option>
			        			</select>
			        		</div>
			        		<div class="form-group">
			        			<label for="gelirMiktar">Miktar</label>
			        			<input type="number" id="gelirMiktar" name="gelirMiktar" class="form-control">
			        		</div>
			        		<div class="form-group">
			        			<label for="gelirAciklama">Açıklama</label>
			        			<textarea name="gelirAciklama" id="gelirAciklama" class="form-control"></textarea>
			        		</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
						<button type="button" class="btn btn-success" onclick="addIncomes()">Geliri Ekle</button>
					</div>
				</div>
			</div>
		</form>
		</div>
	</div>
</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		ajaxGelirler();
		ajaxGiderler();
	});
</script>