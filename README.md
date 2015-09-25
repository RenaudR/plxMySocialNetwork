# Plugin plxMySocialNetwork pour PluXml
plxMySocialNetwork (fork de aplxSocialImg) : partager vos articles sur les réseaux sociaux

![demo](https://cloud.githubusercontent.com/assets/13441278/9706319/b5f568d8-54e1-11e5-96f4-160addcb4c44.png)


## Fonctionnalités

* Affiche un lien pour partager un article sur les réseaux sociaux
* Réseaux sociaux: Facebook, Twitter, Google+, LinkedIn, Diaspora et Courriel
* Ajouter d'autres liens vers des réseaux sociaux
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
  
## Modifier le nombre de liens maximum

dans le fichier **config.php** modifier la valeur de *$maxItems*:

    // nb de liens max
    $maxItems= 10; 
  
## Evolutions possible

* modifier l'ordre des liens
* définir le nb de liens directement depuis le panneau de configuration du plugin

![icon](https://cloud.githubusercontent.com/assets/13441278/9706299/84f5fdc4-54e1-11e5-96ef-d5ad697a1e32.png)
