<?php
	/*
	*	Plugin aplxSocialImg par aruhuno
	*	D'après l'idée de Websyys (plxSocialButtons)
	*	
	*	Fork 29 octobre 2013
	*	Update 15 février 2014
	*/

	class aplxSocialImg extends plxPlugin {

		/**
		* Constructeur de la classe
		*
		* @param	default_lang	langue par défaut
		* @return	stdio
		* @author	aruhuno
		**/
		public function __construct($default_lang) {

			# appel du constructeur de la classe plxPlugin
			parent::__construct($default_lang);

			# hook
			$this->addHook('ThemeEndHead', 'ThemeEndHead');
			$this->addHook('SocialImg', 'SocialImg');
		}
		
		/**
		* Méthode qui ajoute le code css dans la partie <head>
		*
		* @return	stdio
		* @author	aruhuno
		**/
		public function ThemeEndHead() {
			echo '<link rel="stylesheet" href="plugins/aplxSocialImg/aplxSocialImg.css" media="screen"/>';
		}

		/**
		* Méthode qui affiche les boutons sociaux
		*
		* @return	stdio
		* @author	aruhuno
		**/
		public function SocialImg() {
			$plxShow = plxShow::getInstance(); // permet l'utilisation de plxShow
			$onclick = "onclick=\"javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;\"";
			
			/* Gestion du titre */
			ob_start();
			$plxShow->artTitle();
			$title = ob_get_clean();
			$title = urldecode($title); // décodage du titre
			$title = str_replace(' ', '+',$title); // mise en forme
			
			/* Récupération de l'URL */
			$url = "?article".$plxShow->artId();
			$url = $plxShow->plxMotor->urlRewrite($url);
			
			/* Affichage */
			echo "<div class='social'>";
				echo "<ul>";
					// Commentaires (si actifs)
					if($plxShow->plxMotor->plxRecord_arts->f('allow_com') AND $plxShow->plxMotor->aConf['allow_com']) {
						/* Gestion du nombre de commentaires */
						ob_start();
						$plxShow->artNbCom();
						$nbcom = ob_get_clean();
						$nbcom = strip_tags($nbcom);
						
						echo "<li><a class='comment' href='{$url}#comments'><span>{$nbcom}</span></a></li>";
					}
					// Google+
					echo "<li><a class='gplus' href='https://plus.google.com/share?url={$url}' {$onclick}><span>Partager sur Google+</span></a></li>";
					// Facebook
					echo "<li><a class='facebook' href='https://www.facebook.com/sharer/sharer.php?u={$url}' {$onclick}><span>Partager sur Facebook</span></a></li>";
					// Twitter
					echo "<li><a class='twitter' href='https://twitter.com/share?url={$url}&amp;text={$title}' {$onclick}><span>Partager sur Twitter</span></a></li>";
					// Linkedin
					echo "<li><a class='linkedin' href='https://www.linkedin.com/shareArticle?mini=true&amp;url={$url}&amp;title={$title}' {$onclick}><span>Partager sur LinkedIn</span></a></li>";
				echo "</ul>";
			echo "</div>";
			
			return;
		}
	}
?>
