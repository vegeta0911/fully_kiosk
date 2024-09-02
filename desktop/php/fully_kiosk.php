<?php
if (!isConnect('admin')) {
	throw new Exception('{{401 - Accès non autorisé}}');
}
$plugin = plugin::byId('fully_kiosk');
sendVarToJS('eqType', $plugin->getId());
$eqLogics = eqLogic::byType($plugin->getId());
?>

<div class="row row-overflow">
	<div class="col-lg-2 col-sm-9 col-sm-4">
		<div class="bs-sidebar">
			<ul id="ul_eqLogic" class="nav nav-list bs-sidenav">
				<a class="btn btn-default eqLogicAction" style="width : 100%;margin-top : 5px;margin-bottom: 5px;" data-action="add"><i class="fa fa-plus-circle"></i> {{Ajouter un fullykiosk}}</a>
				<li class="filter" style="margin-bottom: 5px;"><input class="filter form-control input-sm" placeholder="{{Rechercher}}" style="width: 100%"/></li>
				<?php
				foreach ($eqLogics as $eqLogic) {
					$opacity = ($eqLogic->getIsEnable()) ? '' : jeedom::getConfiguration('eqLogic:style:noactive');
					echo '<li class="cursor li_eqLogic" data-eqLogic_id="' . $eqLogic->getId() . '" style="' . $opacity .'"><a>' . $eqLogic->getHumanName(true) . '</a></li>';
				}
			?>
			</ul>
		</div>
	</div>
	<div class="col-lg-10 col-md-9 col-sm-8 eqLogicThumbnailDisplay" style="border-left: solid 1px #EEE; padding-left: 25px;">
		<legend><i class="fa fa-cog"></i>  {{Gestion}}</legend>
		<div class="eqLogicThumbnailContainer">
			<div class="cursor eqLogicAction" data-action="gotoPluginConf" style="background-color : #ffffff; height : 130px;margin-bottom : 10px;padding : 5px;border-radius: 2px;width : 140px;margin-left : 10px;">
				<center>
					<i class="fa fa-wrench" style="font-size : 5em;color:#94ca02;margin-top : 20px;"></i>
				</center>
				<span style="font-size : 1.1em;position:relative; top : 15px;word-break: break-all;white-space: pre-wrap;word-wrap: break-word;color:#94ca02"><center>{{Configuration}}</center></span>
			</div>
		</div>
		<legend><i class="fa fa-table"></i> {{Mes tablettes}}</legend>
		<div class="eqLogicThumbnailContainer">
			<div class="cursor eqLogicAction" data-action="add" style="text-align: center; background-color : #ffffff; height : 200px;margin-bottom : 10px;padding : 5px;border-radius: 2px;width : 140px;margin-left : 10px;" >
				<i class="fa fa-plus-circle" style="font-size : 7em;color:#94ca02;margin-top : 25px;"></i>
				<br>
				<span style="font-size : 1.1em;position:relative; top : 10px;word-break: break-all;white-space: pre-wrap;word-wrap: break-word;color:#94ca02">{{Ajouter}}</span>
			</div>
			<?php
			foreach ($eqLogics as $eqLogic) {
				$opacity = ($eqLogic->getIsEnable()) ? '' : jeedom::getConfiguration('eqLogic:style:noactive');
				echo '<div class="eqLogicDisplayCard cursor" data-eqLogic_id="' . $eqLogic->getId() . '" style="text-align: center; background-color : #ffffff; height : 200px;margin-bottom : 10px;padding : 5px;border-radius: 2px;width : 160px;margin-left : 10px;' . $opacity . '" >';
				echo '<img src="' . $plugin->getPathImgIcon() . '" height="105" width="95" />';
				echo "<br>";
				echo '<span style="font-size : 1.1em;position:relative; top : 15px;word-break: break-all;white-space: pre-wrap;word-wrap: break-word;">' . $eqLogic->getHumanName(true, true) . '</span>';
				echo '</div>';
			}
			?>
		</div>
	</div>
<div class="col-lg-10 col-md-9 col-sm-8 eqLogic" style="border-left: solid 1px #EEE; padding-left: 25px;display: none;">
	<a class="btn btn-success eqLogicAction pull-right" data-action="save"><i class="fa fa-check-circle"></i> {{Sauvegarder}}</a>
	<a class="btn btn-danger eqLogicAction pull-right" data-action="remove"><i class="fa fa-minus-circle"></i> {{Supprimer}}</a>
	<a class="btn btn-default eqLogicAction pull-right" data-action="configure"><i class="fa fa-cogs"></i> {{Configuration avancée}}</a>
	<a class="btn btn-default pull-right" id="bt_wl_modal"><i class="fa fa-cogs"></i> {{Configuration de la tablette}}</a>
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation"><a href="#" class="eqLogicAction" aria-controls="home" role="tab" data-toggle="tab" data-action="returnToThumbnailDisplay"><i class="fa fa-arrow-circle-left"></i></a></li>
		<li role="presentation" class="active"><a href="#eqlogictab" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-tachometer"></i> {{Equipement}}</a></li>
		<li role="presentation"><a href="#commandtab" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-list-alt"></i> {{Commandes}}</a></li>
	</ul>
	<div class="tab-content" style="height:calc(100% - 50px);overflow:auto;overflow-x: hidden;">
		<div role="tabpanel" class="tab-pane active" id="eqlogictab">
			<br/>
			<form class="form-horizontal">
				<fieldset>
					<div class="form-group">
						<label class="col-sm-3 control-label">{{Nom de l'équipement}}</label>
						<div class="col-sm-3">
							<input type="text" class="eqLogicAttr form-control" data-l1key="id" style="display : none;" />
							<input type="text" class="eqLogicAttr form-control" data-l1key="name" placeholder="{{Nom de l'équipement}}"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label" >{{Objet parent}}</label>
						<div class="col-sm-3">
							<select id="sel_object" class="eqLogicAttr form-control" data-l1key="object_id">
								<option value="">{{Aucun}}</option>
								<?php
								foreach (jeeObject::all() as $object) {
									echo '<option value="' . $object->getId() . '">' . $object->getName() . '</option>';
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label"></label>
						<div class="col-sm-9">
							<label class="checkbox-inline"><input type="checkbox" class="eqLogicAttr" data-l1key="isEnable" checked/>{{Activer}}</label>
							<label class="checkbox-inline"><input type="checkbox" class="eqLogicAttr" data-l1key="isVisible" checked/>{{Visible}}</label>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">{{Adresse IP}}</label>
						<div class="col-sm-3">
							<input class="eqLogicAttr form-control" data-l1key="configuration" data-l2key="addressip" type="text" placeholder="{{saisir l'adresse IP}}">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">{{Port}}</label>
						<div class="col-sm-3">
							<input class="eqLogicAttr form-control" data-l1key="configuration" data-l2key="port" type="number" placeholder="{{saisir le port (par défaut 2323)}}">
						</div>
					</div>					
					<div class="form-group">
						<label class="col-sm-3 control-label">{{Mot de passe}}</label>
						<div class="col-sm-3">
							<input class="eqLogicAttr form-control" data-l1key="configuration" data-l2key="password" type="password" placeholder="{{saisir le mot de passe}}">
						</div>
					</div>
					<!--div class="form-group">
						<label class="col-sm-3 control-label">{{MQTT actif sur tablette}}</label>
						<div class="col-sm-3">
							<input class="eqLogicAttr form-control" data-l1key="configuration" data-l2key="mqttEnabled" type="checkbox" placeholder="{{}}">
						</div>
				       </div-->					
					<div class="form-group">

						<label class="col-sm-3 control-label">{{Délai de rafraîchissement en minutes}}</label>
						<div class="col-sm-3">
						<select id="sel_object" class="eqLogicAttr form-control" data-l1key="configuration" data-l2key="refreshDelay">

							<option value="0">{{0}}</option>
							<option value="1">{{1}}</option>
							<option value="5">{{5}}</option>
							<option value="15">{{15}}</option>						
							<option value="30">{{30}}</option>
							<option value="60">{{60}}</option>

						</select>
						</div>													
					</div>					

				</fieldset>
			</form>
		</div>
		<div role="tabpanel" class="tab-pane" id="commandtab">
			<a class="btn btn-success btn-sm cmdAction pull-right" data-action="add"> <i class="fa fa-plus-circle"></i> {{Commandes}}</a>
			<br/><br/>
			<table id="table_cmd" class="table table-bordered table-condensed">
				<thead>
					<tr>
						<th style="width: 230px;">{{Nom}}</th>
						<th style="width: 230px;">{{Valeur}}</th>
						<th style="width: 130px;">{{Type}}</th>
						
						<th style="width: 130px;">{{Unité}}</th>
						<th style="width: 130px;">{{Paramètres}}</th>
						<th style="width: 130px;">{{Action}}</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php include_file('desktop', 'fully_kiosk', 'js', 'fully_kiosk');?>
<?php include_file('core', 'plugin.template', 'js');?>
