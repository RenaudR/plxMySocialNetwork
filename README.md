# Plugin plxMySocialNetwork pour PluXml
plxMySocialNetwork (fork de aplxSocialImg) : partager vos articles sur les réseaux sociaux

![demo](https://cloud.githubusercontent.com/assets/13441278/10242180/527d3188-68ef-11e5-9ae4-cd4ebb8be4d2.png)



## Fonctionnalités

* Affiche un lien pour partager un article sur les réseaux sociaux
* Réseaux sociaux: Facebook, Twitter, Google+, LinkedIn, Diaspora et Courriel
* Ajouter d'autres liens vers des réseaux sociaux
* Partager les articles et/ou les pages statiques
* Affichage des liens en texte ou boutons via font-awesome (à valider dans les paramètres)
* Pas de code tiers


## Insérer plxMySocialNetwork le thème utilisé

Dans le fichier article.php,article-full-width.php et/ou static.php, static-full-width.php de votre thème, ajoutez la ligne suivante à l'endroit où vous souhaitez afficher les boutons.


    <?php eval($plxShow->callHook('MySocialNetwork')) ?>


## Modifier le CSS

Paramètres > Plugins > menu "Plugins actifs" > plugin "MySocialNetwork" > menu "Code css" > champ "Contenu fichier css site"


avec font-awesome:

![font-awesome](https://cloud.githubusercontent.com/assets/13441278/10242181/527e8ae2-68ef-11e5-990c-4f2145616495.png)
  
## Modifier le nombre de liens maximum

dans le fichier **config.php** modifier la valeur de *$maxItems*:

    // nb de liens max
    $maxItems= 10; 
  
## Evolutions possible

* modifier l'ordre des liens
* définir le nb de liens directement depuis le panneau de configuration du plugin

![icon](https://cloud.githubusercontent.com/assets/13441278/9706299/84f5fdc4-54e1-11e5-96ef-d5ad697a1e32.png)
