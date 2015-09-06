<h2>Aide</h2>

Pour afficher les boutons des r&eacute;seaux sociaux Facebook, Twitter, Google+1, LinkedIn, Diaspora, Courriel

<h3 style="font-size:1.3em;font-weight:bold;padding:10px 0 10px 0">Dans les articles</h3>
<p>
Dans le fichier <strong>article.php</strong> de votre thème, ajoutez la ligne suivante à l'endroit où vous souhaitez afficher les boutons.
</p>
<pre style="font-size:12px; padding-left:40px"><code>
&lt;?php eval($plxShow->callHook('MySocialNetworkArticle')) ?&gt;
</code></pre>

<h3 style="font-size:1.3em;font-weight:bold;padding:10px 0 10px 0">Dans les pages statiques</h3>
<p>
Dans le fichier <strong>static.php</strong> de votre thème, ajoutez la ligne suivante à l'endroit où vous souhaitez afficher les boutons.
</p>
<pre style="font-size:12px; padding-left:40px"><code>
&lt;?php eval($plxShow->callHook('MySocialNetworkStatic')) ?&gt;
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


