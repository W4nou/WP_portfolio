# Lancer le projet

## Prérequis
1. Assurez-vous d'avoir installé les outils suivants :
  - PHP (version compatible avec le projet)
  - Composer
  - Un serveur web local (ex. : XAMPP, WAMP, ou Laravel Valet)
  - MySQL ou un autre système de gestion de base de données compatible

## Étapes pour lancer le projet

1. **Cloner le dépôt**  
  Clonez le dépôt du projet sur votre machine locale :
  ```bash
  git clone <URL_DU_DEPOT>
  cd <NOM_DU_DOSSIER>
  ```

2. **Installer les dépendances**  
  Exécutez la commande suivante pour installer les dépendances PHP définies dans `composer.json` :
  ```bash
  composer install
  ```
  **Note :** Certains thèmes comme Astra ou Raft mentionnés dans `composer.json` ne seront pas inclus.

3. **Importer la base de données**  
  - Localisez le fichier d'export de la base de données (ex. : `database.sql`).
  - Importez-le dans votre système de gestion de base de données :
    ```bash
    mysql -u <UTILISATEUR> -p <NOM_DE_LA_BDD> database.sql
    ```

4. **Configurer le fichier `.env`**  
  Copiez le fichier `.env.example` en `.env` et configurez les paramètres suivants :
  - Connexion à la base de données (`DB_HOST`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`).
  - Autres paramètres spécifiques au projet.

5. **Lancer le serveur local**  
  Utilisez un serveur local pour exécuter le projet. Par exemple, avec PHP en tapan cette commande depuis la racine du projet:
  ```bash
  php -S localhost:8000 -t web
  ```

6. **Accéder au projet**  
  Ouvrez votre navigateur et accédez à l'URL suivante :
  ```
  http://localhost:8000
  ```

# Réalisation et difficultés$

J'ai rencontré plusieurs difficultés lors de la réalisation de ce projet. Initialement, j'avais choisi d'utiliser Raft car je trouvais son design attrayant. Cependant, j'ai rapidement découvert qu'il s'agissait d'un éditeur de site complet (FSE), ce qui a compliqué la réutilisation de composants via PHP. Face à ces obstacles, notamment des erreurs survenant avant même que je ne modifie quoi que ce soit ou ne crée un thème enfant, j'ai décidé de changer pour Astra à mi-parcours. Ce changement m'a fait perdre beaucoup de temps, mais Astra m'a permis de réaliser ce que je souhaitais.

Par manque de temps, je n'ai pu intégrer que le strict minimum pour les éléments du portfolio, en ajoutant une description pour les afficher. J'ai également eu des difficultés à afficher les trois articles mis en avant sur la page d'accueil, car celle-ci avait été réalisée avec Gutenberg. Finalement, j'ai résolu ce problème en créant un modèle spécifique et en l'appliquant à la page d'accueil pour faire apparaître les articles comme prévu.
