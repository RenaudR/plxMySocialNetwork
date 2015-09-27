<?php if(!defined('PLX_ROOT')) exit; ?>


<?php

// nb de liens max
$maxItems= 12; 


# Control du token du formulaire
plxToken::validateFormToken($_POST);


if(!empty($_POST)) {
	
  for  ($i = 1; $i <= $maxItems; $i++) 
		{     
			$plxPlugin->setParam($i.'-param1', $_POST[$i.'-param1'], 'cdata');
			$plxPlugin->setParam($i.'-param2', $_POST[$i.'-param2'], 'string');
			$plxPlugin->setParam($i.'-param3', $_POST[$i.'-param3'], 'cdata');
			$plxPlugin->setParam($i.'-param4', $_POST[$i.'-param4'], 'cdata');
			$plxPlugin->setParam($i.'-param5', $_POST[$i.'-param5'], 'cdata');     
		}


	$plxPlugin->setParam('mail-param1', $_POST['mail-param1'], 'cdata');
	$plxPlugin->setParam('mail-param2', $_POST['mail-param2'], 'string');
	$plxPlugin->setParam('mail-param3', $_POST['mail-param3'], 'cdata');
	$plxPlugin->setParam('mail-param4', $_POST['mail-param4'], 'cdata');
	$plxPlugin->setParam('mail-param5', $_POST['mail-param5'], 'cdata');
	$plxPlugin->setParam('mail-param8', $_POST['mail-param8'], 'cdata');
	$plxPlugin->setParam('mail-param9', $_POST['mail-param9'], 'cdata');
	$plxPlugin->setParam('mail-param0', $_POST['mail-param0'], 'cdata');	

	$plxPlugin->setParam('maxItems', $_POST['maxItems'], 'numeric');
	$plxPlugin->setParam('share-article', $_POST['share-article'], 'cdata');
	$plxPlugin->setParam('share-page', $_POST['share-page'], 'cdata');

$plxPlugin->saveParams();
header('Location: parametres_plugin.php?p=plxMySocialNetwork');
exit;
}
?>


<div id="form">
<h2><?php  $plxPlugin->lang('L_MANAGE_PLUGIN') ?></h2>
<form class="inline-form" action="parametres_plugin.php?p=plxMySocialNetwork" method="post" id="form_test">
	
	<div class="scrollable-table">
	<table class="table full-width">
	<caption><?php  $plxPlugin->lang('L_SOCIAL_NETWORK') ?></caption>
		<thead>
			<tr>
				<th><?php  $plxPlugin->lang('L_NAME') ?></th>
				<th><?php  $plxPlugin->lang('L_ACTIVE') ?> <a class="help" title="<?php  $plxPlugin->lang('L_ACTIVE_HELP') ?>">&nbsp;</a></th>
				<th><?php  $plxPlugin->lang('L_URL') ?> <a class="help" title="<?php  $plxPlugin->lang('L_URL_HELP') ?>">&nbsp;</a></th>
				<th><?php  $plxPlugin->lang('L_DESCRIPTION') ?> <a class="help" title="<?php  $plxPlugin->lang('L_DESCRIPTION_HELP') ?>">&nbsp;</a></th>
				<th><?php  $plxPlugin->lang('L_CLASS') ?> <a class="help" title="<?php  $plxPlugin->lang('L_CLASS_HELP') ?>">&nbsp;</a></th>
			</tr>
		</thead>
		<tbody>
				<?php 	
				$newItem=1;
				for  ($i = 1; $i <= $maxItems; $i++) 
				{    
				  if (($plxPlugin->getParam($i.'-param3')) != "" ){ echo "	<tr>";
																					echo "<td>"; plxUtils::printInput($i.'-param1',$plxPlugin->getParam($i.'-param1'),'text','20-50') ; echo "</td>";
																					echo "<td>"; plxUtils::printSelect($i.'-param2',array('0'=>'Masquer','1'=>'Afficher'), $plxPlugin->getParam($i.'-param2')); echo "</td>";
																					echo "<td>"; plxUtils::printInput($i.'-param3',$plxPlugin->getParam($i.'-param3'),'text','50-255') ; echo "</td>";
																					echo "<td>"; plxUtils::printInput($i.'-param4',$plxPlugin->getParam($i.'-param4'),'text','35-100') ; echo "</td>";
																					echo "<td>"; plxUtils::printInput($i.'-param5',$plxPlugin->getParam($i.'-param5'),'text','10-20') ; echo "</td>";
																	echo "</tr>" ;} 
																	
				  elseif ($newItem==1){  $newItem=0;  			echo "	<tr>";
																					echo "<td>"; plxUtils::printInput($i.'-param1',$plxPlugin->getParam($i.'-param1'),'text','20-50') ; echo "</td>";
																					echo "<td>"; plxUtils::printSelect($i.'-param2',array('0'=>'Masquer','1'=>'Afficher'), $plxPlugin->getParam($i.'-param2')); echo "</td>";
																					echo "<td>"; plxUtils::printInput($i.'-param3',$plxPlugin->getParam($i.'-param3'),'text','50-255') ; echo "</td>";
																					echo "<td>"; plxUtils::printInput($i.'-param4',$plxPlugin->getParam($i.'-param4'),'text','35-100') ; echo "</td>";
																					echo "<td>"; plxUtils::printInput($i.'-param5','share-alt','text','10-20') ; echo "</td>";
																	echo "</tr>" ;} 
				} 
				?>

			<tr><td colspan="5"><div id="help">

			<p><?php  $plxPlugin->lang('L_PATTERN_URL') ?><br />
			   <?php  $plxPlugin->lang('L_FORM_URL') ?>: <code>https://twitter.com/share?url={$url}&amp;text={$title}</code><br />
			   <?php  $plxPlugin->lang('L_EXEMPLE_URL') ?>: <code>https://twitter.com/share?url=https://blog.niqnutn.com/index.php?article12&text=ArticleAPartager</code>
			</p>
		
			</div></td></tr>
		

		</tbody>
		
	</table>
	</div>
	
	<div class="scrollable-table">
	<table class="table full-width">
	<caption><?php  $plxPlugin->lang('L_EMAIL') ?></caption>
		<thead>
			<tr>
				<th><?php  $plxPlugin->lang('L_NAME') ?></th>
				<th><?php  $plxPlugin->lang('L_ACTIVE') ?> <a class="help" title="<?php  $plxPlugin->lang('L_ACTIVE_HELP') ?>">&nbsp;</a></th>
				<th><?php  $plxPlugin->lang('L_URL') ?> <a class="help" title="<?php  $plxPlugin->lang('L_URL_HELP') ?>">&nbsp;</a></th>
				<th><?php  $plxPlugin->lang('L_DESCRIPTION') ?> <a class="help" title="<?php  $plxPlugin->lang('L_DESCRIPTION_HELP') ?>">&nbsp;</a></th>
				<th><?php  $plxPlugin->lang('L_CLASS') ?> <a class="help" title="<?php  $plxPlugin->lang('L_CLASS_HELP') ?>">&nbsp;</a></th>
			</tr>
		</thead>	
		<tbody>	
			<tr>
				<td><?php plxUtils::printInput('mail-param1',$plxPlugin->getParam('mail-param1'),'text','20-50') ?></td>
				<td><?php plxUtils::printSelect('mail-param2',array('0'=>'Masquer','1'=>'Afficher'), $plxPlugin->getParam('mail-param2')) ?></td>
				<td><?php plxUtils::printInput('mail-param3','mailto:'.$plxPlugin->getParam('mail-param8').'?subject='.$plxPlugin->getParam('mail-param9').'&amp;body='.$plxPlugin->getParam('mail-param0'),'text','50-255', true)  ?></td>
				<td><?php plxUtils::printInput('mail-param4',$plxPlugin->getParam('mail-param4'),'text','35-100') ?></td>
				<td><?php plxUtils::printInput('mail-param5',$plxPlugin->getParam('mail-param5'),'text','10-20') ?></td>
			</tr>
			<tr>
				<td ><?php  $plxPlugin->lang('L_EMAIL_SUBJECT') ?></td>
				<td colspan="4"><?php plxUtils::printInput('mail-param9',$plxPlugin->getParam('mail-param9'),'text','80-255') ?></td>
			</tr>
			<tr>
				<td ><?php  $plxPlugin->lang('L_EMAIL_BODY') ?></td>
				<td colspan="4"><?php plxUtils::printInput('mail-param0',$plxPlugin->getParam('mail-param0'),'text','80-255') ?></td>
			</tr>
			<tr>
				<td ><?php  $plxPlugin->lang('L_EMAIL_RECIPIENT') ?></td>
				<td colspan="4"><?php plxUtils::printInput('mail-param8',$plxPlugin->getParam('mail-param8'),'text','80-255') ?></td>
			</tr>
		</tbody>
	</table>
	</div>
	
	<div class="scrollable-table">	
	<table class="table full-width">
	<caption>Autres param&egrave;tres</caption>
		<thead>
			<tr>
				<th><?php  $plxPlugin->lang('L_DESCRIPTION') ?></th>
				<th><?php  $plxPlugin->lang('L_VALUE') ?></th>

			</tr>
		</thead>	
		<tbody>	
			<tr>
				<td><?php $plxPlugin->lang('L_NB_ITEMS') ?></td>
				<td><?php plxUtils::printInput('maxItems',$maxItems,'numeric','2-2', true) ?></td>
			</tr>
			<tr>
				<td><?php $plxPlugin->lang('L_LABEL_SHARE_ARTICLE') ?></td>
				<td><?php plxUtils::printInput('share-article',$plxPlugin->getParam('share-article'),'text','35-100') ?></td>
			</tr>
			<tr>
				<td><?php $plxPlugin->lang('L_LABEL_SHARE_STATIC') ?></td>
				<td><?php plxUtils::printInput('share-page',$plxPlugin->getParam('share-page'),'text','35-100') ?></td>
			</tr>
		</tbody>
	</table>
	</div>
		
<p class="in-action-bar"><?php echo plxToken::getTokenPostMethod() ?><input type="submit" name="submit" value="<?php  $plxPlugin->lang('L_SAVE_CONFIG') ?>" /></p>

</div>





