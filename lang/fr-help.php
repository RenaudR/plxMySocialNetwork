<h2>Informations</h2>
<p>Ce plugin est un fork de celui réalisé par Websyys que je tiens à remercier pour son idée et pour les icônes des différents RS.</p>
<p>En éditant ce plugin vous pourrez voir qu’il se compose en deux méthodes. La première permet l’ajout du css à PluXML et la deuxième permet d’afficher les liens des RS.</p>
<br />
<h2>Aide</h2>
<p>L’affichage par défaut se présente comme ceci :</p>
<p style="padding-left:40px"><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/plugins/aplxSocialImg/demo.png" alt="demo" /></p>
<p>Pour obtenir ce rendu sur votre PluXML, ajoutez ce qui suit à votre fichier article.php ou dans la boucle d’affichage des articles de votre home.php :</p>
<pre style="font-size:12px; padding-left:40px">&lt;?php eval($plxShow->callHook('SocialImg')) ?&gt;</pre>
<br />
<p>Ci-dessous, l’image par défaut permettant l’affichage des liens :
<p style="padding-left:40px"><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/plugins/aplxSocialImg/img.png" alt="image RS" /></p>
<p>Vous pouvez bien évidemment la télécharger, la modifier puis la stocker dans votre thème pour ensuite surcharger le css de ce plugin avec le vôtre en faisant comme ceci :</p>
<pre style="font-size:12px; padding-left:40px">
	.social li a {
		background: url('<b>URL_IMG_ICI</b>') 0 0 no-repeat !important;
	}
</pre>
<br />
<p>Pour ceux qui voudraient aller plus loin, je donne ci-dessous le contenu du css du plugin, pensez à le surcharger avec le vôtre, soit en ajoutant !important à la fin de vos lignes :</p>
<pre style="font-size:12px; padding-left:40px">
	.social ul {
		float: left;
	}

	.social li {
		margin: 0px;
		display: inline-block;
	}

	.social li a {
		margin: 0px;
		display: block;
		background: url('<b>URL_IMG_ICI</b>') 0 0 no-repeat;
		width: 29px;
		height: 32px;
	}

	.social li a.comment		{	background-position: 0px 0px;		}
	.social li a.comment:hover	{	background-position: 0px -32px;		}
	.social li a.gplus		{	background-position: -32px 0px;		}
	.social li a.gplus:hover	{	background-position: -32px -32px;	}
	.social li a.facebook		{	background-position: -64px 0px;		}
	.social li a.facebook:hover	{	background-position: -64px -32px;	}
	.social li a.twitter		{	background-position: -96px 0px;		}
	.social li a.twitter:hover	{	background-position: -96px -32px;	}
	.social li a.linkedin		{	background-position: -128px 0px;	}
	.social li a.linkedin:hover	{	background-position: -128px -32px;	}
</pre>