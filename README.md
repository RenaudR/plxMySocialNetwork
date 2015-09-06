# Plugin plxMySocialNetwork pour PluXml
plxMySocialNetwork (fork de aplxSocialImg) : partager vos articles sur les réseaux sociaux

## Fonctionnalités

* Affiche un lien pour partager un article sur les réseaux sociaux
* Réseaux sociaux: Facebook, Twitter, Google+, LinkedIn, Diaspora et Courriel
* Partager les articles et/ou les pages statiques
* Affichage des liens en texte ou boutons via font-awesome (à valider dans les paramètres)
* Pas de code tiers


## Ajouter plxMySocialNetwork

Pour ajouter les boutons dans votre page, éditer les fichiers depuis *Options d'affichage* > *Choix du thème* > *  Éditer les fichiers du thème «defaut»*

Sur une page statique (static.php ou static-full-width.php) ajouter la ligne suivante à l'endroit où vous souhaitez afficher les boutons.

    <?php eval($plxShow->callHook('MySocialNetworkStatic')) ?>
    
Sur une page article (article.php ou article-full-width.php) ajouter la ligne suivante à l'endroit où vous souhaitez afficher les boutons.

    <?php eval($plxShow->callHook('MySocialNetworkArticle')) ?>


## Modifier le CSS

Paramètres > Plugins > menu "Plugins actifs" > plugin "MySocialNetwork" > menu "Code css" > champ "Contenu fichier css site"
  



