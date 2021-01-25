<?php
/* Smarty version 3.1.30, created on 2021-01-20 19:40:41
  from "/var/www/monsite.com/html/MesProjets/Framework/samane-api/src/view/user/liste.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_60088739e27a15_01243883',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6ab53ef61a165deb864ffad659b90c05faf07d8a' => 
    array (
      0 => '/var/www/monsite.com/html/MesProjets/Framework/samane-api/src/view/user/liste.html',
      1 => 1611171637,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60088739e27a15_01243883 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Liste</title>
		<!-- l'appel de <?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
 vous permet de recupérer le chemin de votre site web  -->
		<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/css/bootstrap.min.css"/>
		<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/css/samane.css"/>
		<style>
			h1{ 
				color: #40007d;
			}
		</style>
	</head>
	<body>
		<img src="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/image/logo.jpg" class="resize" />
		<div class="nav navbar navbar-default navbar-fixed-top">
			<ul class="nav navbar-nav">
				<!-- l'appel de <?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
 vous permet de recupérer le chemin de votre site web  -->
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
">Accueil</a></li>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
User/index">Menu User page </a></li>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
User/getId/1">Menu User get id page </a></li>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
User/liste">Menu User list page </a></li>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Upload/index">upload file </a></li>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
PdfGenerator/generate">Samane Generate pdf file </a></li>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
ExcelGenerator/generate">Samane Generate excel file </a></li>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
ExcelGenerator/read">Samane read excel file </a></li>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Email/sendMail">Samane Mailing </a></li>
			</ul>
		</div>
		<div class="col-md-8 col-xs-12 col-md-offset-2" style="margin-top:150px;">
			<div class="panel panel-info">
				<div class="panel-heading">BIENVENUE A VOTRE MODELE MVC</div>
				<div class="panel-body">
					<div class="alert alert-success" style="font-size:18px; text-align:justify;">
						Merci, l'équipe samanemvc vous remercie :) : 
						je vous ai préparé un CRUD qui marche. Lisez la documentation.
						<br/>Et surtout noubliez pas de configurer votre base de données : ou? Dans le dossier config
						puis éditez le fichier database.php. Mettez à on l'etat de la base! Bon code!!!!  :)
					</div>
					<?php if (isset($_smarty_tpl->tpl_vars['users']->value)) {?>
						<?php if ($_smarty_tpl->tpl_vars['users']->value != null) {?>
							<table class="table table-bordered table-stripped">
								<tr>
									<th>Identifiant</th>
									<th>Prenom </th>
									<th>Nom </th>
									<th>Email </th>
									<th>Action</th>
									<th>Action</th>
								</tr>
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
?>
									<tr>
										<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getId();?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getPrenom();?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getNom();?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getEmail();?>
</td>
										<td><a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
User/delete/<?php echo $_smarty_tpl->tpl_vars['user']->value->getId();?>
">Supprimer</a></td>
										<td><a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
User/edit/<?php echo $_smarty_tpl->tpl_vars['user']->value->getId();?>
">Editer</a></td>
									</tr>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

							</table>
						<?php } else { ?>
							Liste vide
						<?php }?>
					<?php }?>
				</div>
				<a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
User/add">Ajout d'un utilisateur</a>
			</div>
		</div>
		
	</body>
</html>
<?php }
}
