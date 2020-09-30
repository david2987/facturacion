@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Conceptos</h4>
				</div>

				<div class="panel-body">
					<ul class="list-inline">
						<li>
							<a href="/" class="link_ruta">
								Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="/conceptos" class="link_ruta">
								Conceptos &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="/conceptos/nuevo" class="link_ruta">
								Nuevo
							</a>
						</li>
					</ul>
				
					<div class="row">
						<div class="container">
							<div class="col-md-4">
								<legend>Datos del concepto</legend>
								<form method="post" action="/conceptos/guardar">
									{{ csrf_field() }}
									<div class="form-group">
										<label>Tipo de concepto</label>
										<select class="form-control form-persona-required" name="tipoconcepto" oninvalid="this.setCustomValidity('Debe ingresar un Tipo de Concepto pare el concepto')" required="true" oninput="setCustomValidity('')">
											<option value="" disabled selected hidden>Tipo de Concepto</option>
											<option value="i">Ingreso</option>
											<option value="e">Egreso</option>
										</select>
									</div>
									
									
									<div class="form-group form-persona">
										<label class="sr-only">Cuenta Asociada</label>
										<input class="form-control form-persona-required" type="text" name="ctacontable" placeholder="Cuenta Contable" required="true" oninvalid="this.setCustomValidity('Debe ingresar una Cuenta Contable de Concepto')" oninput="setCustomValidity('')">
									</div>

									<div class="form-group form-persona">
										<label class="sr-only">Detalle</label>
										<textarea class="form-control form-persona-required" type="text" name="detalle" placeholder="Detalle" row='10' col='30'></textarea>						
									</div>

									
									<div class="form-group form-persona form-empresa" >
										<button type="submit" class="btn btn-block btn-primary">Guardar</button>
									</div>
								</form>
							</div>
							<div class="col-md-6 col-md-offset-1">
                				<legend>Últimos conceptos registrados</legend>
                				<div class="table-responsive">
	                				<table width="97%" class="table table-striped table-bordered">
	                					<thead>
	                						<tr>
	                							<th>ID</th>
												<th>Detalle</th>
												<th>Cuenta Asociada</th>
												
	                						</tr>	                						
	                					</thead>
	                					<tbody>
	                						@foreach($conceptos->sortByDesc('created_at')->take(8) as $c)
	                							<tr>
	                								<td>
	                									{{ $c->id }} 
													</td>
													<td>
														{{ $c->detalle }} 
													</td>	
													<td>
														{{ $c->ctacontable }} 
													</td>	
	                									
	                								
	                							</tr>
	                						@endforeach
	                					</tbody>
	                				</table>
	                			</div>
                			</div>
							<div class="col-md-5 col-md-offset-2">                				
                			</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
	<script type="text/javascript">

		$(document).ready(function(){
			$("#select_tipo_concepto").on('change', function(){
				if($("#select_tipo_concepto").val() == "persona"){
					$(".form-empresa-required").prop('required',false);
					$(".form-empresa").hide();
					
					$(".form-persona-required").prop('required',true);
					$(".form-persona").show();

				}else if($("#select_tipo_concepto").val() == "empresa"){

					$(".form-persona-required").prop('required',false);
					$(".form-persona").hide();
					
					$(".form-empresa-required").prop('required',true);
					$(".form-empresa").show();
				}
			});
		});
	</script>
@endsection