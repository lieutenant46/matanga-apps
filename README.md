# matanga-apps
Application de vente de chaussures
#Instruction pour faire fonctionner le projet

# **PREREQUIS :**
a. **PHP 7.4 OU +**

b. **MYSQL 5.7**

**c. Un editeur de code VSCODE, PHPSTORM** 

1. Acceder à l'application grace a votre terminal.
2. chercher et ouvrir le fichier [.env](matanga-apps/.env) avec notepad
3. chercher la ligne commencant par : **DATABASE_URL**
4. modifier les paramatres de connexion a votre serveur de base de base de données, dans notre cas ici c'est "root:root" modifer avec les votres pour permettre à l'ORM doctrine de se connecter à votree serveur de BD
5. Une fois dans le dossier sur votre terminal, executer la commande suivante: `php bin/console doctrine:database:create` pour creer votre dans de données automatiquement grace a Doctrine
6. une fois créer nous allons la charger avec des données pre-enregistrer pour cela importer le ficher "[db.sql](db.sql)" pour ajouter des données dans votre base
7. une fois ajouter, vous pouvez maintenant tester l'application toujours grace à votre terminal taper: `symfony server:start` pour lancer le serveur de symfony

COMME UTILISATEURS VOUS AVEZ:
**admin@mail.test** / **123456**
