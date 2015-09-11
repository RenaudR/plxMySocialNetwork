<?php
 /**
 * Plugin plxMySocialNetwork par nIQnutn
 *
 * D'après le plugin aplxSocialImg par aruhuno
 * 
 * Fork 06 september 2015
 * Update 06 september 2015
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
	public function __construct($default_lang) {

		# appel du constructeur de la classe plxPlugin (obligatoire)
		parent::__construct($default_lang);

		# déclaration des hooks
		$this->addHook('MySocialNetworkArticle', 'MySocialNetworkArticle');
		$this->addHook('MySocialNetworkStatic', 'MySocialNetworkStatic');
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
	


		/* Gestion du titre */
		ob_start();
		$plxShow->artTitle();
		$title = ob_get_clean();



		echo "<div class=\"social-network\"><span class=\"share\">Partager cet article: </span><ul>";
	
		// Twitter
		echo "<li><a  title=\"Partager sur Twitter\"  class=\"twitter\" href=\"https://twitter.com/share?url={$url}&text={$title}\" {$onclick} target=\"_blank\" rel=\"nofollow\" ><span>Partager sur Twitter</span></a></li>";								
		//Facebook
		echo "<li><a title=\"Partager sur Facebook\" class=\"facebook\" href=\"https://www.facebook.com/sharer/sharer.php?u={$url}&t={$title}\" {$onclick} target=\"_blank\" rel=\"nofollow\" ><span>Partager sur Facebook</span></a></li>";
		// Google+
		echo "<li><a title=\"Partager sur Google+\" class=\"google-plus\" href=\"https://plus.google.com/share?url={$url}\" {$onclick}  target=\"_blank\" rel=\"nofollow\"  ><span>Partager sur Google+</span></a></li>";
		// Linkedin
		echo "<li><a title=\"Partager sur LinkedIn\" class=\"linkedin\" href=\"https://www.linkedin.com/shareArticle?mini=true&url={$url}&title={$title}\" {$onclick}  target=\"_blank\" rel=\"nofollow\"  ><span>Partager sur LinkedIn</span></a></li>";
		// Diaspora
		echo "<li><a title=\"Partager sur Diaspora\" class=\"diaspora\" href=\"https://share.diasporafoundation.org/?title={$title}&url={$url}\" {$onclick}  target=\"_blank\" rel=\"nofollow\"  ><span>Partager sur Diaspora</span></a></li>";
		// Courriel
		echo "<li><a title=\"Partager par courriel\" class=\"courriel\" href=\"mailto:?subject={$title}&body={$title}: {$url}\"   target=\"_blank\" rel=\"nofollow\"  ><span>Partager par courriel</span></a></li>";


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



		echo "<div class=\"social-network\"><span class=\"share\">Partager cet article: </span><ul>";

		// Twitter
		echo "<li><a  title=\"Partager sur Twitter\"  class=\"twitter\" href=\"https://twitter.com/share?url={$url}&text={$title}\" {$onclick} target=\"_blank\" rel=\"nofollow\" ><span>Partager sur Twitter</span></a></li>";								
		//Facebook
		echo "<li><a title=\"Partager sur Facebook\" class=\"facebook\" href=\"https://www.facebook.com/sharer/sharer.php?u={$url}&t={$title}\" {$onclick} target=\"_blank\" rel=\"nofollow\" ><span>Partager sur Facebook</span></a></li>";
		// Google+
		echo "<li><a title=\"Partager sur Google+\" class=\"google-plus\" href=\"https://plus.google.com/share?url={$url}\" {$onclick}  target=\"_blank\" rel=\"nofollow\"  ><span>Partager sur Google+</span></a></li>";
		// Linkedin
		echo "<li><a title=\"Partager sur LinkedIn\" class=\"linkedin\" href=\"https://www.linkedin.com/shareArticle?mini=true&url={$url}&title={$title}\" {$onclick}  target=\"_blank\" rel=\"nofollow\"  ><span>Partager sur LinkedIn</span></a></li>";
		// Diaspora
		echo "<li><a title=\"Partager sur Diaspora\" class=\"diaspora\" href=\"https://share.diasporafoundation.org/?title={$title}&url={$url}\" {$onclick}  target=\"_blank\" rel=\"nofollow\"  ><span>Partager sur Diaspora</span></a></li>";
		// Courriel
		echo "<li><a title=\"Partager par courriel\" class=\"courriel\" href=\"mailto:?subject={$title}&body={$title}: {$url}\"   target=\"_blank\" rel=\"nofollow\"  ><span>Partager par courriel</span></a></li>";


		echo "</ul></div>";

	}
}
?>
