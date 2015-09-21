<?php if(!defined('PLX_ROOT')) exit; ?>

<?php
# Control du token du formulaire
plxToken::validateFormToken($_POST);

if(!empty($_POST)) {
$plxPlugin->setParam('a-param1', $_POST['a-param1'], 'cdata');
$plxPlugin->setParam('a-param2', $_POST['a-param2'], 'string');
$plxPlugin->setParam('a-param3', $_POST['a-param3'], 'cdata');
$plxPlugin->setParam('a-param4', $_POST['a-param4'], 'cdata');
$plxPlugin->setParam('a-param5', $_POST['a-param5'], 'cdata');
$plxPlugin->setParam('a-param6', $_POST['a-param6'], 'numeric');

$plxPlugin->setParam('b-param1', $_POST['b-param1'], 'cdata');
$plxPlugin->setParam('b-param2', $_POST['b-param2'], 'string');
$plxPlugin->setParam('b-param3', $_POST['b-param3'], 'cdata');
$plxPlugin->setParam('b-param4', $_POST['b-param4'], 'cdata');
$plxPlugin->setParam('b-param5', $_POST['b-param5'], 'cdata');
$plxPlugin->setParam('b-param6', $_POST['b-param6'], 'numeric');

$plxPlugin->setParam('c-param1', $_POST['c-param1'], 'cdata');
$plxPlugin->setParam('c-param2', $_POST['c-param2'], 'string');
$plxPlugin->setParam('c-param3', $_POST['c-param3'], 'cdata');
$plxPlugin->setParam('c-param4', $_POST['c-param4'], 'cdata');
$plxPlugin->setParam('c-param5', $_POST['c-param5'], 'cdata');
$plxPlugin->setParam('c-param6', $_POST['c-param6'], 'numeric');

$plxPlugin->setParam('d-param1', $_POST['d-param1'], 'cdata');
$plxPlugin->setParam('d-param2', $_POST['d-param2'], 'string');
$plxPlugin->setParam('d-param3', $_POST['d-param3'], 'cdata');
$plxPlugin->setParam('d-param4', $_POST['d-param4'], 'cdata');
$plxPlugin->setParam('d-param5', $_POST['d-param5'], 'cdata');
$plxPlugin->setParam('d-param6', $_POST['d-param6'], 'numeric');

$plxPlugin->setParam('e-param1', $_POST['e-param1'], 'cdata');
$plxPlugin->setParam('e-param2', $_POST['e-param2'], 'string');
$plxPlugin->setParam('e-param3', $_POST['e-param3'], 'cdata');
$plxPlugin->setParam('e-param4', $_POST['e-param4'], 'cdata');
$plxPlugin->setParam('e-param5', $_POST['e-param5'], 'cdata');
$plxPlugin->setParam('e-param6', $_POST['e-param6'], 'numeric');

$plxPlugin->setParam('f-param1', $_POST['f-param1'], 'cdata');
$plxPlugin->setParam('f-param2', $_POST['f-param2'], 'string');
$plxPlugin->setParam('f-param3', $_POST['f-param3'], 'cdata');
$plxPlugin->setParam('f-param4', $_POST['f-param4'], 'cdata');
$plxPlugin->setParam('f-param5', $_POST['f-param5'], 'cdata');
$plxPlugin->setParam('f-param6', $_POST['f-param6'], 'numeric');

$plxPlugin->setParam('g-param1', $_POST['g-param1'], 'cdata');
$plxPlugin->setParam('g-param2', $_POST['g-param2'], 'string');
$plxPlugin->setParam('g-param3', $_POST['g-param3'], 'cdata');
$plxPlugin->setParam('g-param4', $_POST['g-param4'], 'cdata');
$plxPlugin->setParam('g-param5', $_POST['g-param5'], 'cdata');
$plxPlugin->setParam('g-param6', $_POST['g-param6'], 'numeric');

$plxPlugin->setParam('h-param1', $_POST['h-param1'], 'cdata');
$plxPlugin->setParam('h-param2', $_POST['h-param2'], 'string');
$plxPlugin->setParam('h-param3', $_POST['h-param3'], 'cdata');
$plxPlugin->setParam('h-param4', $_POST['h-param4'], 'cdata');
$plxPlugin->setParam('h-param5', $_POST['h-param5'], 'cdata');
$plxPlugin->setParam('h-param6', $_POST['h-param6'], 'numeric');

$plxPlugin->setParam('i-param1', $_POST['i-param1'], 'cdata');
$plxPlugin->setParam('i-param2', $_POST['i-param2'], 'string');
$plxPlugin->setParam('i-param3', $_POST['i-param3'], 'cdata');
$plxPlugin->setParam('i-param4', $_POST['i-param4'], 'cdata');
$plxPlugin->setParam('i-param5', $_POST['i-param5'], 'cdata');
$plxPlugin->setParam('i-param6', $_POST['i-param6'], 'numeric');

$plxPlugin->setParam('j-param1', $_POST['j-param1'], 'cdata');
$plxPlugin->setParam('j-param2', $_POST['j-param2'], 'string');
$plxPlugin->setParam('j-param3', $_POST['j-param3'], 'cdata');
$plxPlugin->setParam('j-param4', $_POST['j-param4'], 'cdata');
$plxPlugin->setParam('j-param5', $_POST['j-param5'], 'cdata');
$plxPlugin->setParam('j-param6', $_POST['j-param6'], 'numeric');

$plxPlugin->saveParams();
header('Location: parametres_plugin.php?p=plxMySocialNetwork');
exit;
}
?>

<div id="socialNetworklist">
	<h2>Gestion des reseaux sociaux</h2>
<form class="inline-form" action="parametres_plugin.php?p=plxMySocialNetwork" method="post" id="form_test">
	
		<table class="table">
	<thead>
		<tr>
			<th class="checkbox"><input type="checkbox" /></th>
			<th><?php echo "Nom" ?></th>
			<th><?php echo "Active" ?></th>
			<th><?php echo "URL" ?></th>
			<th><?php echo "Titre" ?></th>
			<th><?php echo "class" ?></th>
			<th><?php echo "Tri" ?></th>
		</tr>
	</thead>
	<tbody>	

		<tr>
			<td class="checkbox"><input type="checkbox" /></td>
			<td><?php plxUtils::printInput('a-param1',$plxPlugin->getParam('a-param1'),'text','20-50') ?></td>
			<td><?php plxUtils::printSelect('a-param2',array('0'=>'Masquer','1'=>'Afficher'), $plxPlugin->getParam('a-param2')) ?></td>
			<td><?php plxUtils::printInput('a-param3',$plxPlugin->getParam('a-param3'),'text','50-255') ?></td>
			<td><?php plxUtils::printInput('a-param4',$plxPlugin->getParam('a-param4'),'text','35-100') ?></td>
			<td><?php plxUtils::printInput('a-param5',$plxPlugin->getParam('a-param5'),'text','10-20') ?></td>
			<td><?php plxUtils::printInput('a-param6',$plxPlugin->getParam('a-param6'),'text','2-2') ?></td>
		</tr>
		<tr>
			<td class="checkbox"><input type="checkbox" /></td>
			<td><?php plxUtils::printInput('b-param1',$plxPlugin->getParam('b-param1'),'text','20-50') ?></td>
			<td><?php plxUtils::printSelect('b-param2',array('0'=>'Masquer','1'=>'Afficher'), $plxPlugin->getParam('b-param2')) ?></td>
			<td><?php plxUtils::printInput('b-param3',$plxPlugin->getParam('b-param3'),'text','50-255') ?></td>
			<td><?php plxUtils::printInput('b-param4',$plxPlugin->getParam('b-param4'),'text','35-100') ?></td>
			<td><?php plxUtils::printInput('b-param5',$plxPlugin->getParam('b-param5'),'text','10-20') ?></td>
			<td><?php plxUtils::printInput('b-param6',$plxPlugin->getParam('b-param6'),'text','2-2') ?></td>
		</tr>
		<tr>
			<td class="checkbox"><input type="checkbox" /></td>
			<td><?php plxUtils::printInput('c-param1',$plxPlugin->getParam('c-param1'),'text','20-50') ?></td>
			<td><?php plxUtils::printSelect('c-param2',array('0'=>'Masquer','1'=>'Afficher'), $plxPlugin->getParam('c-param2')) ?></td>
			<td><?php plxUtils::printInput('c-param3',$plxPlugin->getParam('c-param3'),'text','50-255') ?></td>
			<td><?php plxUtils::printInput('c-param4',$plxPlugin->getParam('c-param4'),'text','35-100') ?></td>
			<td><?php plxUtils::printInput('c-param5',$plxPlugin->getParam('c-param5'),'text','10-20') ?></td>
			<td><?php plxUtils::printInput('c-param6',$plxPlugin->getParam('c-param6'),'text','2-2') ?></td>
		</tr>
		<tr>
			<td class="checkbox"><input type="checkbox" /></td>
			<td><?php plxUtils::printInput('d-param1',$plxPlugin->getParam('d-param1'),'text','20-50') ?></td>
			<td><?php plxUtils::printSelect('d-param2',array('0'=>'Masquer','1'=>'Afficher'), $plxPlugin->getParam('d-param2')) ?></td>
			<td><?php plxUtils::printInput('d-param3',$plxPlugin->getParam('d-param3'),'text','50-255') ?></td>
			<td><?php plxUtils::printInput('d-param4',$plxPlugin->getParam('d-param4'),'text','35-100') ?></td>
			<td><?php plxUtils::printInput('d-param5',$plxPlugin->getParam('d-param5'),'text','10-20') ?></td>
			<td><?php plxUtils::printInput('d-param6',$plxPlugin->getParam('d-param6'),'text','2-2') ?></td>
		</tr>
		<tr>
			<td class="checkbox"><input type="checkbox" /></td>
			<td><?php plxUtils::printInput('e-param1',$plxPlugin->getParam('e-param1'),'text','20-50') ?></td>
			<td><?php plxUtils::printSelect('e-param2',array('0'=>'Masquer','1'=>'Afficher'), $plxPlugin->getParam('e-param2')) ?></td>
			<td><?php plxUtils::printInput('e-param3',$plxPlugin->getParam('e-param3'),'text','50-255') ?></td>
			<td><?php plxUtils::printInput('e-param4',$plxPlugin->getParam('e-param4'),'text','35-100') ?></td>
			<td><?php plxUtils::printInput('e-param5',$plxPlugin->getParam('e-param5'),'text','10-20') ?></td>
			<td><?php plxUtils::printInput('e-param6',$plxPlugin->getParam('e-param6'),'text','2-2') ?></td>
		</tr>
		<tr>
			<td class="checkbox"><input type="checkbox" /></td>
			<td><?php plxUtils::printInput('f-param1',$plxPlugin->getParam('f-param1'),'text','20-50') ?></td>
			<td><?php plxUtils::printSelect('f-param2',array('0'=>'Masquer','1'=>'Afficher'), $plxPlugin->getParam('f-param2')) ?></td>
			<td><?php plxUtils::printInput('f-param3',$plxPlugin->getParam('f-param3'),'text','50-255') ?></td>
			<td><?php plxUtils::printInput('f-param4',$plxPlugin->getParam('f-param4'),'text','35-100') ?></td>
			<td><?php plxUtils::printInput('f-param5',$plxPlugin->getParam('f-param5'),'text','10-20') ?></td>
			<td><?php plxUtils::printInput('f-param6',$plxPlugin->getParam('f-param6'),'text','2-2') ?></td>
		</tr>
		<tr>
			<td class="checkbox"><input type="checkbox" /></td>
			<td><?php plxUtils::printInput('g-param1',$plxPlugin->getParam('g-param1'),'text','20-50') ?></td>
			<td><?php plxUtils::printSelect('g-param2',array('0'=>'Masquer','1'=>'Afficher'), $plxPlugin->getParam('g-param2')) ?></td>
			<td><?php plxUtils::printInput('g-param3',$plxPlugin->getParam('g-param3'),'text','50-255') ?></td>
			<td><?php plxUtils::printInput('g-param4',$plxPlugin->getParam('g-param4'),'text','35-100') ?></td>
			<td><?php plxUtils::printInput('g-param5',$plxPlugin->getParam('g-param5'),'text','10-20') ?></td>
			<td><?php plxUtils::printInput('g-param6',$plxPlugin->getParam('g-param6'),'text','2-2') ?></td>
		</tr>
		<tr>
			<td class="checkbox"><input type="checkbox" /></td>
			<td><?php plxUtils::printInput('h-param1',$plxPlugin->getParam('h-param1'),'text','20-50') ?></td>
			<td><?php plxUtils::printSelect('h-param2',array('0'=>'Masquer','1'=>'Afficher'), $plxPlugin->getParam('h-param2')) ?></td>
			<td><?php plxUtils::printInput('h-param3',$plxPlugin->getParam('h-param3'),'text','50-255') ?></td>
			<td><?php plxUtils::printInput('h-param4',$plxPlugin->getParam('h-param4'),'text','35-100') ?></td>
			<td><?php plxUtils::printInput('h-param5',$plxPlugin->getParam('h-param5'),'text','10-20') ?></td>
			<td><?php plxUtils::printInput('h-param6',$plxPlugin->getParam('h-param6'),'text','2-2') ?></td>
		</tr>
		<tr>
			<td class="checkbox"><input type="checkbox" /></td>
			<td><?php plxUtils::printInput('i-param1',$plxPlugin->getParam('i-param1'),'text','20-50') ?></td>
			<td><?php plxUtils::printSelect('i-param2',array('0'=>'Masquer','1'=>'Afficher'), $plxPlugin->getParam('i-param2')) ?></td>
			<td><?php plxUtils::printInput('i-param3',$plxPlugin->getParam('i-param3'),'text','50-255') ?></td>
			<td><?php plxUtils::printInput('i-param4',$plxPlugin->getParam('i-param4'),'text','35-100') ?></td>
			<td><?php plxUtils::printInput('i-param5',$plxPlugin->getParam('i-param5'),'text','10-20') ?></td>
			<td><?php plxUtils::printInput('i-param6',$plxPlugin->getParam('i-param6'),'text','2-2') ?></td>
		</tr>
		<tr>
			<td class="checkbox"><input type="checkbox" /></td>
			<td><?php plxUtils::printInput('j-param1',$plxPlugin->getParam('j-param1'),'text','20-50') ?></td>
			<td><?php plxUtils::printSelect('j-param2',array('0'=>'Masquer','1'=>'Afficher'), $plxPlugin->getParam('j-param2')) ?></td>
			<td><?php plxUtils::printInput('j-param3',$plxPlugin->getParam('j-param3'),'text','50-255') ?></td>
			<td><?php plxUtils::printInput('j-param4',$plxPlugin->getParam('j-param4'),'text','35-100') ?></td>
			<td><?php plxUtils::printInput('j-param5',$plxPlugin->getParam('j-param5'),'text','10-20') ?></td>
			<td><?php plxUtils::printInput('j-param6',$plxPlugin->getParam('j-param6'),'text','2-2') ?></td>
		</tr>
	</tbody>
	</table>
	

	<p class="in-action-bar">
	<?php echo plxToken::getTokenPostMethod() ?>
	<input type="submit" name="submit" value="Enregistrer" />
	</p>
</div>


<div id="Aide">
	<h2>Aide</h2>
	<ul>
	<li>Nom: nom du r&eacute;seau social</li>
	<li>Active: activer/d&eacute;sactiver le widget</li>
	<li>URL: url compl&egrave;te pour partager le l'article / page statique</li>
	<li>Titre: description qui sera afficher (balise span  et infobulle)</li>
	<li>class: nom de la classe utilis&eacute;e pour le CSS</li>
	</ul>
	<br />
<p>Remplacer l'<em>url</em> de la page par <strong>{$url}</strong> et son <em>titre</em> par <strong>{$title}</strong><br />
		URL &agrave; indiqu&eacute;e dans le formulaire: <code>https://twitter.com/share?url={$url}&amp;text={$title}</code><br />
	URL qui sera affich&eacute;e: <code>https://twitter.com/share?url=https://blog.niqnutn.com/index.php?article12&text=ArticleAPartager</code>
</p>	

</div>
