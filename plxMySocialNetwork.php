<?php

 /**
 * Plugin plxMySocialNetwork by nIQnutn
 * Update: 25 september 2015
 * Version: 1.3
 * 
 * Forked from aplxSocialImg by aruhuno on 06 september 2015
 **/


class plxMySocialNetwork extends plxPlugin {

	/**
	 * Constructeur de la classe plxMySocialNetwork
	 *
	 * @author	 nIQnutn
	 **/
	 
	public function __construct($default_lang) {

		# appel du constructeur de la classe plxPlugin (obligatoire)
		parent::__construct($default_lang);
		
		# limite l'accès à l'écran d'administration du plugin
		$this-> setConfigProfil(PROFIL_ADMIN);		

		# déclaration des hooks
		$this->addHook('MySocialNetworkArticle', 'MySocialNetworkArticle');
		$this->addHook('MySocialNetworkStatic', 'MySocialNetworkStatic');
	}


	 /**
	 * Méthode utilisée à l'activation du plugin
	 * initialise les réseaux sociaux par défaut 
	 * 
	 * @author	 nIQnutn
	 **/
	public function OnActivate() {

			$this->setParam('maxItems', '10', 'string');
			$this->setParam('share-article', 'Partager l\'article: ', 'cdata');
			$this->setParam('share-page', 'Partager la page: ', 'cdata');
			$this->setParam('share-links', 'Retrouvez moi sur:', 'cdata');

			$this->setParam('mail-param1', 'Courriel', 'cdata');
			$this->setParam('mail-param2', '1', 'string');
			$this->setParam('mail-param3', 'mailto:?subject={$title}&amp;body={$title}:&nbsp;{$url}', 'cdata');
			$this->setParam('mail-param4', 'Partager par courriel', 'cdata');
			$this->setParam('mail-param5', 'courriel', 'cdata');
			$this->setParam('mail-param9', '{$title}', 'cdata');
			$this->setParam('mail-param0', '{$title}:&nbsp;{$url}', 'cdata');
			
			$this->setParam('1-param1', 'Twitter', 'cdata');
			$this->setParam('1-param2', '1', 'string');
			$this->setParam('1-param3', 'https://twitter.com/share?url={$url}&text={$title}', 'cdata');
			$this->setParam('1-param4', 'Partager sur Twitter', 'cdata');
			$this->setParam('1-param5', 'twitter', 'cdata');

			$this->setParam('2-param1', 'Facebook', 'cdata');
			$this->setParam('2-param2', '1', 'string');
			$this->setParam('2-param3', 'https://www.facebook.com/sharer/sharer.php?u={$url}&t={$title}', 'cdata');
			$this->setParam('2-param4', 'Partager sur Facebook', 'cdata');
			$this->setParam('2-param5', 'facebook', 'cdata');

			$this->setParam('3-param1', 'Google+', 'cdata');
			$this->setParam('3-param2', '1', 'string');
			$this->setParam('3-param3', 'https://plus.google.com/share?url={$url}', 'cdata');
			$this->setParam('3-param4', 'Partager sur Google+', 'cdata');
			$this->setParam('3-param5', 'google-plus', 'cdata');
			
			$this->setParam('4-param1', 'LinkedIn', 'cdata');
			$this->setParam('4-param2', '1', 'string');
			$this->setParam('4-param3', 'https://www.linkedin.com/shareArticle?mini=true&amp;url={$url}&amp;title={$title}', 'cdata');
			$this->setParam('4-param4', 'Partager sur LinkedIn', 'cdata');
			$this->setParam('4-param5', 'linkedin', 'cdata');

			$this->setParam('5-param1', 'Diaspora', 'cdata');
			$this->setParam('5-param2', '1', 'string');
			$this->setParam('5-param3', 'https://share.diasporafoundation.org/?title={$title}&amp;url={$url}', 'cdata');
			$this->setParam('5-param4', 'Partager sur Diaspora', 'cdata');
			$this->setParam('5-param5', 'diaspora', 'cdata');

			$this->setParam('6-param1', 'Reddit', 'cdata');
			$this->setParam('6-param2', '1', 'string');
			$this->setParam('6-param3', 'http://www.reddit.com/submit?url={$url}&title={$title}', 'cdata');
			$this->setParam('6-param4', 'Partager sur Reddit', 'cdata');
			$this->setParam('6-param5', 'reddit', 'cdata');
			
			$this->setParam('7-param1', 'StumbleUpon', 'cdata');
			$this->setParam('7-param2', '1', 'string');
			$this->setParam('7-param3', 'http://www.stumbleupon.com/submit?url={$url}&title={$title}', 'cdata');
			$this->setParam('7-param4', 'Partager sur StumbleUpon', 'cdata');
			$this->setParam('7-param5', 'stumbleupon', 'cdata');	

			$this->setParam('8-param1', 'Tumblr', 'cdata');
			$this->setParam('8-param2', '1', 'string');
			$this->setParam('8-param3', 'http://www.tumblr.com/share?v=3&u={$url}&t={$title}', 'cdata');
			$this->setParam('8-param4', 'Partager sur Tumblr', 'cdata');
			$this->setParam('8-param5', 'tumblr', 'cdata');	

			$this->setParam('9-param1', 'Pinterest', 'cdata');
			$this->setParam('9-param2', '1', 'string');
			$this->setParam('9-param3', 'http://pinterest.com/pin/create/button/?url={$url}', 'cdata');
			$this->setParam('9-param4', 'Partager sur Pinterest', 'cdata');
			$this->setParam('9-param5', 'pinterest', 'cdata');	
						
			$this->setParam('10-param1', 'Pocket', 'cdata');
			$this->setParam('10-param2', '1', 'string');
			$this->setParam('10-param3', 'https://getpocket.com/save?url={$url}&title={$title}', 'cdata');
			$this->setParam('10-param4', 'Partager sur Pocket', 'cdata');
			$this->setParam('10-param5', 'pocket', 'cdata');	
									
		$this->saveParams();		
		
	}

	
	
	/**
	* Méthode qui affiche les boutons des réseaux sociaux sur un article
	*
	* @author	Stephane F, aruhuno, nIQnutn
	**/
	public function MySocialNetworkArticle() {
		
		$plxShow = plxShow::getInstance(); // permet l'utilisation de plxShow
		$onclick = "onclick=\"javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes');return false;\"";
				
		/* Récupération de l'URL */
		$url = "?article".$plxShow->artId();
		$url = $plxShow->plxMotor->urlRewrite($url);

		/* Gestion du titre */
		ob_start();
		$plxShow->artTitle();
		$title = rawurlencode(ob_get_clean());

		/* Remplacement du motif {$url} et {$title} par l'URL et le titre de l'article */
		$pattern = array("{\$url}","{\$title}");
		$urlTitle   = array($url, $title);


		echo "<div class=\"social-network\"><span class=\"share\">". $this->getParam('share-article')."</span><ul>";
		
		for  ($i = 1; $i <= $this->getParam('maxItems') ; $i++) 
			{	
				if ($this->getParam($i.'-param2')=="1")
					{
							if (($this->getParam($i.'-param3')) != "" )
								{ 
									echo "<li><a  title=\"".$this->getParam($i.'-param4')."\"  class=\"".$this->getParam($i.'-param5')."\" href=\"".str_replace($pattern, $urlTitle,  $this->getParam($i."-param3"))."\" {$onclick} target=\"_blank\" rel=\"nofollow\" ><span>".$this->getParam($i.'-param4')."</span></a></li>";								
								}    
					}
			}
			
		if ($this->getParam('mail-param2')=="1"){
		echo "<li><a  title=\"".$this->getParam('mail-param4')."\"  class=\"".$this->getParam('mail-param5')."\" href=\"".str_replace($pattern, $urlTitle,  $this->getParam("mail-param3"))."\"  target=\"_blank\" rel=\"nofollow\" ><span>".$this->getParam('mail-param4')."</span></a></li>";								
		}		
						
		echo "</ul></div>";			
	}



	/**
	* Méthode qui affiche les boutons sociaux sur une page statique
	*
	* @author	Stephane F, aruhuno, nIQnutn
	**/
	public function MySocialNetworkStatic() {
				
		$plxShow = plxShow::getInstance(); // permet l'utilisation de plxShow
		$onclick = "onclick=\"javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes');return false;\"";
		
		/* Récupération de l'URL */
		$url = "?static".$plxShow->staticId();
		$url = $plxShow->plxMotor->urlRewrite($url);

		/* Gestion du titre */
		ob_start();
		$plxShow->staticTitle();
		$title = ob_get_clean();

		/* Remplacement du motif {$url} et {$title} par l'URL et le titre de la page statique */
		$pattern = array("{\$url}","{\$title}");
		$urlTitle   = array($url, $title);


		echo "<div class=\"social-network\"><span class=\"share\">". $this->getParam('share-page') ."</span><ul>";

		for  ($i = 1; $i <= $this->getParam('maxItems') ; $i++) 
			{	
				if ($this->getParam($i.'-param2')=="1")
					{
							if (($this->getParam($i.'-param3')) != "" )
								{ 
									echo "<li><a  title=\"".$this->getParam($i.'-param4')."\"  class=\"".$this->getParam($i.'-param5')."\" href=\"".str_replace($pattern, $urlTitle,  $this->getParam($i."-param3"))."\" {$onclick} target=\"_blank\" rel=\"nofollow\" ><span>".$this->getParam($i.'-param4')."</span></a></li>";								
								}    
					}
			}
			
		if ($this->getParam('mail-param2')=="1"){
		echo "<li><a  title=\"".$this->getParam('mail-param4')."\"  class=\"".$this->getParam('mail-param5')."\" href=\"".str_replace($pattern, $urlTitle,  $this->getParam("mail-param3"))."\"  target=\"_blank\" rel=\"nofollow\" ><span>".$this->getParam('mail-param4')."</span></a></li>";								
		}			
			
		echo "</ul></div>";	
	}
}
?>

