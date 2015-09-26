<h2>Aide</h2>

Pour afficher les liens des r&eacute;seaux sociaux Facebook, Twitter, Google+1, LinkedIn, Diaspora, Courriel, ...

<h3 style="font-size:1.3em;font-weight:bold;padding:10px 0 10px 0">Insérer les liens dans le thème utilisé</h3>
<p>
Dans le fichier <strong>article.php,article-full-width.php et/ou static.php, static-full-width.php</strong> de votre thème, ajoutez la ligne suivante à l'endroit où vous souhaitez afficher les boutons.
</p>
<pre style="padding-left:40px"><code>
&lt;?php eval($plxShow->callHook('MySocialNetwork')) ?&gt;
</code></pre>


<h3 style="font-size:1.3em;font-weight:bold;padding:10px 0 10px 0">Modification affichage des boutons</h3>
<p>
L'affichage des boutons peut être modifié, en personnalisant la classe <strong>.social-network </strong> en allant sur l'écran d'administration:
<br /><br />
Paramètres > Plugins > menu "Plugins actifs" > plugin "MySocialNetwork" > menu "Code css" > champ "Contenu fichier css site"
</p>

<p>
Cliquez sur le bouton "Sauvegarder le fichier" pour enregistrer les modifications.
</p>



<h3 style="font-size:1.3em;font-weight:bold;padding:10px 0 10px 0">Modifier le nombre maximum de liens</h3>

<p>
dans le fichier <strong>config.php</strong> modifier la valeur de <em>$maxItems</em>:
<pre  style="padding-left:40px"><code>// nb de liens max
$maxItems= 10; 
</code></pre>
 </p>
