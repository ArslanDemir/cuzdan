<!DOCTYPE html>
<html>
<head>
	<title>Panel</title>
</head>
<body>
<div class="container-fluid" style="margin-top: 50px;">
	<div class="row">
		<div class="col-md-2">
			<div class="list-group">
			  <span class="list-group-item list-group-item-action">İşlemler</span>
			  <span class="list-group-item list-group-item-action" data-toggle="modal" data-target="#giderModal">Gider Ekle</span>
			  <span class="list-group-item list-group-item-action" data-toggle="modal" data-target="#gelirModal">Gelir Ekle</span>
			  <span class="list-group-item list-group-item-action" data-toggle="modal" data-target="#giderTuruModal" >Gider Türü Ekle</span>
			  <span class="list-group-item list-group-item-action" data-toggle="modal" data-target="#gelirTuruModal">Gelir Türü Ekle</span>
			</div>
		</div>
		<div class="col-md-10">
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
			<div id="modal-gelir-turu">
				<div class="modal fade" id="gelirTuruModal" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel"><span id="gelirTuruTarih"><?=$_SESSION['name']?></span>/  Gelir Türü Ekle</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
				        		<div class="form-group">
				        			<label for="gelirTuruBaslik	">Gelir Türü Başlığı</label>
				        			<input type="text" id="gelirTuruBaslik" name="gelirTuruBaslik" class="form-control">
				        			<input type="hidden" id="gelirTuru" name="gelirTuru" value="0">
				        			<input type="hidden" id="gelirTuruSahibi" name="gelirTuruSahibi" value="<?=$_SESSION['id']?>">
				        		</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
								<button type="button" class="btn btn-success" onclick="addIncomesType()">Gelir Türünü Ekle</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="modal-gider-turu">
				<div class="modal fade" id="giderTuruModal" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel"><span ><?=$_SESSION['name']?></span>/  Gider Türü Ekle</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
				        		<div class="form-group">
				        			<label for="giderBaslik	">Gider Türü Başlığı</label>
				        			<input type="text" id="giderTuruBaslik" name="giderTuruBaslik" class="form-control">
				        			<input type="hidden" id="giderTuru" name="giderTuru" value="1">
				        			<input type="hidden" id="giderTuruSahibi" name="giderTuruSahibi" value="<?=$_SESSION['id']?>">
				        		</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
								<button type="button" class="btn btn-success" onclick="addExpensesType()">Gider Türünü Ekle</button>
							</div>
						</div>
					</div>
				</div>
			</div>
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