<?php
 /**
 * Plugin plxMySocialNetwork par nIQnutn
 *
 * D'après le plugin aplxSocialImg par aruhuno
 * 
 * Fork 06 september 2015
 * Update 21 september 2015
 *
 **/
class plxMySocialNetwork extends plxPlugin {


	/**
	 * Constructeur de la classe
	 *
	 * @param	default_lang	langue par défaut
	 * @return	stdio
	 * @author	nIQnutn
	 **/
	 
	 
	private $socialNetworkFile = "data/configuration/plugins/plxMySocialNetwork-data.xml";


	public function __construct($default_lang) {

		# appel du constructeur de la classe plxPlugin (obligatoire)
		parent::__construct($default_lang);
		
		# limite l'accès à l'écran d'administration du plugin
		$this-> setConfigProfil(PROFIL_ADMIN, PROFIL_MANAGER);		

		# déclaration des hooks
		$this->addHook('MySocialNetworkArticle', 'MySocialNetworkArticle');
		$this->addHook('MySocialNetworkStatic', 'MySocialNetworkStatic');
	}


	 /**
	 * Méthode qui initialise les réseaux sociaux par défaut 
	 *
	 * @author	 nIQnutn
	 **/
	public function OnActivate() {
		
      			$this->setParam('a-param1', 'Twitter', 'cdata');
      			$this->setParam('a-param2', '1', 'string');
      			$this->setParam('a-param3', 'https://twitter.com/share?url={$url}&text={$title}', 'cdata');
      			$this->setParam('a-param4', 'Partager sur Twitter', 'cdata');
      			$this->setParam('a-param5', 'twitter', 'cdata');
      			$this->setParam('a-param6', '1', 'numeric');

      			$this->setParam('b-param1', 'Facebook', 'cdata');
      			$this->setParam('b-param2', '1', 'string');
      			$this->setParam('b-param3', 'https://www.facebook.com/sharer/sharer.php?u={$url}&t={$title}', 'cdata');
      			$this->setParam('b-param4', 'Partager sur Facebook', 'cdata');
      			$this->setParam('b-param5', 'facebook', 'cdata');
      			$this->setParam('b-param6', '2', 'numeric');

      			$this->setParam('c-param1', 'Google+', 'cdata');
      			$this->setParam('c-param2', '1', 'string');
      			$this->setParam('c-param3', 'https://plus.google.com/share?url={$url}', 'cdata');
      			$this->setParam('c-param4', 'Partager sur Google+', 'cdata');
      			$this->setParam('c-param5', 'google-plus', 'cdata');
      			$this->setParam('c-param6', '3', 'numeric');
      			
      			$this->setParam('d-param1', 'LinkedIn', 'cdata');
      			$this->setParam('d-param2', '1', 'string');
      			$this->setParam('d-param3', 'https://www.linkedin.com/shareArticle?mini=true&amp;url={$url}&amp;title={$title}', 'cdata');
      			$this->setParam('d-param4', 'Partager sur LinkedIn', 'cdata');
      			$this->setParam('d-param5', 'linkedin', 'cdata');
      			$this->setParam('d-param6', '4', 'numeric');

      			$this->setParam('e-param1', 'Diaspora', 'cdata');
      			$this->setParam('e-param2', '1', 'string');
      			$this->setParam('e-param3', 'https://share.diasporafoundation.org/?title={$title}&amp;url={$url}', 'cdata');
      			$this->setParam('e-param4', 'Partager sur Diaspora', 'cdata');
      			$this->setParam('e-param5', 'diaspora', 'cdata');
      			$this->setParam('e-param6', '5', 'numeric');

			$this->saveParams();		
		
		}

	
	
	/**
	 * Méthode qui affiche les boutons sociaux 
	 *
	 * @return	stdio
	 * @author	Stephane F, aruhuno, nIQnutn
	 **/
	public function MySocialNetworkArticle() {
		
		
		
		$plxShow = plxShow::getInstance(); // permet l'utilisation de plxShow
		$onclick = "onclick=\"javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes');return false;\"";
				

		/* Récupération de l'URL */
		$url = "?article".$plxShow->artId();
		$url = $plxShow->plxMotor->urlRewrite($url);
		//$test_url = str_replace("{\$url}", $url, $this->getParam("a-param3"));


		/* Gestion du titre */
		ob_start();
		$plxShow->artTitle();
		$title = rawurlencode(ob_get_clean());
		//$test_title = str_replace("{\$title}", $title, $this->getParam("a-param3"));

		
		/* Remplace le motif {$url} et {$title} par l'url et le titre */	
		$pattern = array("{\$url}","{\$title}");
		$urlTitle   = array($url, $title);


		
		
		
		// Affiche les liens
		echo "<div class=\"social-network\"><span class=\"share\">Partager cet article: </span><ul>";

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
			
		echo "</ul></div>";			
	}




	/**
	 * Méthode qui affiche les boutons sociaux sur une page statique
	 *
	 * @return	stdio
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

		/* Remplace le motif {$url} et {$title} par l'url et le titre */	
		$pattern = array("{\$url}","{\$title}");
		$urlTitle   = array($url, $title);


		// Affiche les liens
		echo "<div class=\"social-network\"><span class=\"share\">Partager cette page: </span><ul>";

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
		
			
		echo "</ul></div>";	
	}
}
?>

