<?php
/* Smarty version 3.1.30, created on 2021-01-21 22:02:44
  from "/var/www/monsite.com/html/MesProjets/Framework/samane-api/src/view/user/edit.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6009fa04d24a70_99284362',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '77245364e88e577249db8fbebc44518e85390a1c' => 
    array (
      0 => '/var/www/monsite.com/html/MesProjets/Framework/samane-api/src/view/user/edit.html',
      1 => 1611171925,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6009fa04d24a70_99284362 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Edit</title>
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
Test/index">Menu test page </a></li>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Test/getId/1">Menu test get id page </a></li>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Test/liste">Menu test list page </a></li>
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
					<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Test/update">
						<div class="form-group">
							<label class="control-label">ID du test</label>
							<input class="form-control" type="text" name="id" id="id" value="<?php if (isset($_smarty_tpl->tpl_vars['user']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['user']->value->getId();?>
 <?php }?>"/>
						</div>
						<div class="form-group">
							<label class="control-label">Prenom</label>
							<input class="form-control" type="text" name="prenom" id="prenom" value="<?php if (isset($_smarty_tpl->tpl_vars['user']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['user']->value->getPrenom();?>
 <?php }?>"/>
						</div>
						<div class="form-group">
							<label class="control-label">Nom</label>
							<input class="form-control" type="text" name="nom" id="nom" value="<?php if (isset($_smarty_tpl->tpl_vars['user']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['user']->value->getNom();?>
 <?php }?>"/>
						</div>
						<div class="form-group">
							<label class="control-label">Email</label>
							<input class="form-control" type="text" name="email" id="email" value="<?php if (isset($_smarty_tpl->tpl_vars['user']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['user']->value->getEmail();?>
 <?php }?>"/>
						</div>
						<div class="form-group">
							<input class="btn btn-success" type="submit" name="modifier" value="Modifier"/>
							<a class="btn btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
User/liste">Retour</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html><?php }
}
