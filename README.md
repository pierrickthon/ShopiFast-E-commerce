# ShopiFast-E-commerce
ShopiFast est un site e-commerce codé en PHP qui permet d'acheter des articles à coût réduit. C'est un site rapide qui traite les demandes d'achat et les livraisons en 24H, d'ou le coté Fast.

Comment j'ai codé ShopiFast ? 

# Etapes de création de ShopiFast 

- Créer une base de donnée via PHP My Admin et une table <<produits>> qui recense tous les produits à acheter sur le site.
- Entrer les informations de l'admin qui a le droit de modifier, de supprimer ou d'ajouter des articles. La création de l'admin s'est fait sans injection SQL.
- Créer les différents fichiers comme login.php qui est la page de connexion, index.php qui est le site principale que l'utilisateur verra en premier et bien d'autres fichiers. Tous les fichiers crées sont présents dans le repositery.
- Créer les diiférentes sessions de démmarrage dans chaque fichier, etc.
- Le dossier "Config" contient le fichier "commandes.php" pour ajouter, modifer ou supprimer un produit et le fichier "connexion.php" pour se connecter à la base de donnée.
- Le dossier "Admin" contient tous les fichiers concernant l'administrateur. 
