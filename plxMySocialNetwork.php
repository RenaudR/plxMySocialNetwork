<?php

 /**
 * Plugin plxMySocialNetwork by nIQnutn
 * Update: 22 september 2015
 * Version:	1.2
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
		
			$this->setParam('mail-param1', 'Courriel', 'cdata');
			$this->setParam('mail-param2', '1', 'string');
			$this->setParam('mail-param3', 'mailto:?subject={$title}&amp;body={$title}:&nbsp;{$url}', 'cdata');
			$this->setParam('mail-param4', 'Partager par courriel', 'cdata');
			$this->setParam('mail-param5', 'courriel', 'cdata');
			$this->setParam('mail-param9', '{$title}', 'cdata');
			$this->setParam('mail-param0', '{$title}:&nbsp;{$url}', 'cdata');
			
			$this->setParam('a-param1', 'Twitter', 'cdata');
			$this->setParam('a-param2', '1', 'string');
			$this->setParam('a-param3', 'https://twitter.com/share?url={$url}&text={$title}', 'cdata');
			$this->setParam('a-param4', 'Partager sur Twitter', 'cdata');
			$this->setParam('a-param5', 'twitter', 'cdata');

			$this->setParam('b-param1', 'Facebook', 'cdata');
			$this->setParam('b-param2', '1', 'string');
			$this->setParam('b-param3', 'https://www.facebook.com/sharer/sharer.php?u={$url}&t={$title}', 'cdata');
			$this->setParam('b-param4', 'Partager sur Facebook', 'cdata');
			$this->setParam('b-param5', 'facebook', 'cdata');

			$this->setParam('c-param1', 'Google+', 'cdata');
			$this->setParam('c-param2', '1', 'string');
			$this->setParam('c-param3', 'https://plus.google.com/share?url={$url}', 'cdata');
			$this->setParam('c-param4', 'Partager sur Google+', 'cdata');
			$this->setParam('c-param5', 'google-plus', 'cdata');
			
			$this->setParam('d-param1', 'LinkedIn', 'cdata');
			$this->setParam('d-param2', '1', 'string');
			$this->setParam('d-param3', 'https://www.linkedin.com/shareArticle?mini=true&amp;url={$url}&amp;title={$title}', 'cdata');
			$this->setParam('d-param4', 'Partager sur LinkedIn', 'cdata');
			$this->setParam('d-param5', 'linkedin', 'cdata');

			$this->setParam('e-param1', 'Diaspora', 'cdata');
			$this->setParam('e-param2', '1', 'string');
			$this->setParam('e-param3', 'https://share.diasporafoundation.org/?title={$title}&amp;url={$url}', 'cdata');
			$this->setParam('e-param4', 'Partager sur Diaspora', 'cdata');
			$this->setParam('e-param5', 'diaspora', 'cdata');

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


		echo "<div class=\"social-network\"><span class=\"share\">". $this->getLang('L_SHARE_ARTICLE')."</span><ul>";
		
			if ($this->getParam('a-param2')=="1"){
			echo "<li><a  title=\"".$this->getParam('a-param4')."\"  class=\"".$this->getParam('a-param5')."\" href=\"".str_replace($pattern, $urlTitle,  $this->getParam("a-param3"))."\" {$onclick} target=\"_blank\" rel=\"nofollow\" ><span>".$this->getParam('a-param4')."</span></a></li>";								
			}
			
			if ($this->getParam('b-param2')=="1"){
			echo "<li><a  title=\"".$this->getParam('b-param4')."\"  class=\"".$this->getParam('b-param5')."\" href=\"".str_replace($pattern, $urlTitle,  $this->getParam("b-param3"))."\" {$onclick} target=\"_blank\" rel=\"nofollow\" ><span>".$this->getParam('b-param4')."</span></a></li>";								
			}
			
			if ($this->getParam('c-param2')=="1"){
			echo "<li><a  title=\"".$this->getParam('c-param4')."\"  class=\"".$this->getParam('c-param5')."\" href=\"".str_replace($pattern, $urlTitle,  $this->getParam("c-param3"))."\" {$onclick} target=\"_blank\" rel=\"nofollow\" ><span>".$this->getParam('c-param4')."</span></a></li>";								
			}	
				
			if ($this->getParam('d-param2')=="1"){
			echo "<li><a  title=\"".$this->getParam('d-param4')."\"  class=\"".$this->getParam('d-param5')."\" href=\"".str_replace($pattern, $urlTitle,  $this->getParam("d-param3"))."\" {$onclick} target=\"_blank\" rel=\"nofollow\" ><span>".$this->getParam('d-param4')."</span></a></li>";								
			}	
				
			if ($this->getParam('e-param2')=="1"){
			echo "<li><a  title=\"".$this->getParam('e-param4')."\"  class=\"".$this->getParam('e-param5')."\" href=\"".str_replace($pattern, $urlTitle,  $this->getParam("e-param3"))."\" {$onclick} target=\"_blank\" rel=\"nofollow\" ><span>".$this->getParam('e-param4')."</span></a></li>";								
			}	
				
			if ($this->getParam('f-param2')=="1"){
			echo "<li><a  title=\"".$this->getParam('f-param4')."\"  class=\"".$this->getParam('f-param5')."\" href=\"".str_replace($pattern, $urlTitle,  $this->getParam("f-param3"))."\" {$onclick} target=\"_blank\" rel=\"nofollow\" ><span>".$this->getParam('f-param4')."</span></a></li>";								
			}	
				
			if ($this->getParam('g-param2')=="1"){
			echo "<li><a  title=\"".$this->getParam('g-param4')."\"  class=\"".$this->getParam('g-param5')."\" href=\"".str_replace($pattern, $urlTitle,  $this->getParam("g-param3"))."\" {$onclick} target=\"_blank\" rel=\"nofollow\" ><span>".$this->getParam('g-param4')."</span></a></li>";								
			}	
				
			if ($this->getParam('h-param2')=="1"){
			echo "<li><a  title=\"".$this->getParam('h-param4')."\"  class=\"".$this->getParam('h-param5')."\" href=\"".str_replace($pattern, $urlTitle,  $this->getParam("h-param3"))."\" {$onclick} target=\"_blank\" rel=\"nofollow\" ><span>".$this->getParam('h-param4')."</span></a></li>";								
			}	
				
			if ($this->getParam('i-param2')=="1"){
			echo "<li><a  title=\"".$this->getParam('i-param4')."\"  class=\"".$this->getParam('i-param5')."\" href=\"".str_replace($pattern, $urlTitle,  $this->getParam("i-param3"))."\" {$onclick} target=\"_blank\" rel=\"nofollow\" ><span>".$this->getParam('i-param4')."</span></a></li>";								
			}	
				
			if ($this->getParam('j-param2')=="1"){
			echo "<li><a  title=\"".$this->getParam('j-param4')."\"  class=\"".$this->getParam('j-param5')."\" href=\"".str_replace($pattern, $urlTitle,  $this->getParam("j-param3"))."\" {$onclick} target=\"_blank\" rel=\"nofollow\" ><span>".$this->getParam('j-param4')."</span></a></li>";								
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


		echo "<div class=\"social-network\"><span class=\"share\">". $this->getLang('L_SHARE_STATIC')."</span><ul>";

			if ($this->getParam('a-param2')=="1"){
			echo "<li><a  title=\"".$this->getParam('a-param4')."\"  class=\"".$this->getParam('a-param5')."\" href=\"".str_replace($pattern, $urlTitle,  $this->getParam("a-param3"))."\" {$onclick} target=\"_blank\" rel=\"nofollow\" ><span>".$this->getParam('a-param4')."</span></a></li>";								
			}
			
			if ($this->getParam('b-param2')=="1"){
			echo "<li><a  title=\"".$this->getParam('b-param4')."\"  class=\"".$this->getParam('b-param5')."\" href=\"".str_replace($pattern, $urlTitle,  $this->getParam("b-param3"))."\" {$onclick} target=\"_blank\" rel=\"nofollow\" ><span>".$this->getParam('b-param4')."</span></a></li>";								
			}
			
			if ($this->getParam('c-param2')=="1"){
			echo "<li><a  title=\"".$this->getParam('c-param4')."\"  class=\"".$this->getParam('c-param5')."\" href=\"".str_replace($pattern, $urlTitle,  $this->getParam("c-param3"))."\" {$onclick} target=\"_blank\" rel=\"nofollow\" ><span>".$this->getParam('c-param4')."</span></a></li>";								
			}	
				
			if ($this->getParam('d-param2')=="1"){
			echo "<li><a  title=\"".$this->getParam('d-param4')."\"  class=\"".$this->getParam('d-param5')."\" href=\"".str_replace($pattern, $urlTitle,  $this->getParam("d-param3"))."\" {$onclick} target=\"_blank\" rel=\"nofollow\" ><span>".$this->getParam('d-param4')."</span></a></li>";								
			}	
				
			if ($this->getParam('e-param2')=="1"){
			echo "<li><a  title=\"".$this->getParam('e-param4')."\"  class=\"".$this->getParam('e-param5')."\" href=\"".str_replace($pattern, $urlTitle,  $this->getParam("e-param3"))."\" {$onclick} target=\"_blank\" rel=\"nofollow\" ><span>".$this->getParam('e-param4')."</span></a></li>";								
			}	
				
			if ($this->getParam('f-param2')=="1"){
			echo "<li><a  title=\"".$this->getParam('f-param4')."\"  class=\"".$this->getParam('f-param5')."\" href=\"".str_replace($pattern, $urlTitle,  $this->getParam("f-param3"))."\" {$onclick} target=\"_blank\" rel=\"nofollow\" ><span>".$this->getParam('f-param4')."</span></a></li>";								
			}	
				
			if ($this->getParam('g-param2')=="1"){
			echo "<li><a  title=\"".$this->getParam('g-param4')."\"  class=\"".$this->getParam('g-param5')."\" href=\"".str_replace($pattern, $urlTitle,  $this->getParam("g-param3"))."\" {$onclick} target=\"_blank\" rel=\"nofollow\" ><span>".$this->getParam('g-param4')."</span></a></li>";								
			}	
				
			if ($this->getParam('h-param2')=="1"){
			echo "<li><a  title=\"".$this->getParam('h-param4')."\"  class=\"".$this->getParam('h-param5')."\" href=\"".str_replace($pattern, $urlTitle,  $this->getParam("h-param3"))."\" {$onclick} target=\"_blank\" rel=\"nofollow\" ><span>".$this->getParam('h-param4')."</span></a></li>";								
			}	
				
			if ($this->getParam('i-param2')=="1"){
			echo "<li><a  title=\"".$this->getParam('i-param4')."\"  class=\"".$this->getParam('i-param5')."\" href=\"".str_replace($pattern, $urlTitle,  $this->getParam("i-param3"))."\" {$onclick} target=\"_blank\" rel=\"nofollow\" ><span>".$this->getParam('i-param4')."</span></a></li>";								
			}	
				
			if ($this->getParam('j-param2')=="1"){
			echo "<li><a  title=\"".$this->getParam('j-param4')."\"  class=\"".$this->getParam('j-param5')."\" href=\"".str_replace($pattern, $urlTitle,  $this->getParam("j-param3"))."\" {$onclick} target=\"_blank\" rel=\"nofollow\" ><span>".$this->getParam('j-param4')."</span></a></li>";								
			}


			if ($this->getParam('mail-param2')=="1"){
			echo "<li><a  title=\"".$this->getParam('mail-param4')."\"  class=\"".$this->getParam('mail-param5')."\" href=\"".str_replace($pattern, $urlTitle,  $this->getParam("mail-param3"))."\"  target=\"_blank\" rel=\"nofollow\" ><span>".$this->getParam('mail-param4')."</span></a></li>";								
			}			
	
			
		echo "</ul></div>";	
	}
}
?>

