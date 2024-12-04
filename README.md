# Création d'une API Symfony

Ce projet est une API RESTful développée avec Symfony, permettant de gérer une application de gestion de produits et de catégories. L'objectif principal est de fournir une interface permettant aux utilisateurs d'interagir avec des produits, en offrant des fonctionnalités complètes de création, lecture, mise à jour et suppression (CRUD). Les produits sont classés par catégorie, et l'application permet également de gérer ces catégories de manière similaire.

L'API expose des endpoints pour gérer les produits (id, nom, description, prix, date de création...) et les catégories (id, nom). Elle inclut également des mécanismes de validation des données pour garantir l'intégrité des informations.


- [Prérequis](#prérequis)
- [Installation](#installation)
- [Configuration](#configuration)
- [Utilisation](#utilisation)
- [Choix techniques](#choix-techniques)
- [Problèmes rencontrés](#problèmes-rencontrés)
- [Contribuer](#contribuer)
- [Licence](#licence)

 ## Prérequis

Avant d'installer ce projet, vous devez vous assurer que vous avez les éléments suivants :

- PHP 8.1 ou une version supérieure
- Composer pour gérer les dépendances PHP
- Symfony CLI 
- Une base de données compatible (MySQL, PostgreSQL, etc.)
- Git pour cloner le dépôt

 ## Installation

Voici les étapes pour installer et démarrer ce projet localement.

1. **Cloner le projet depuis GitHub** :
   ```bash
   git clone https://github.com/MelodieRougemont/API-Symfony-et-React.js.git
   
2. **Accéder au répertoire du projet** :
   ```bash
   cd API-Symfony-et-React.js

3. **Installer les dépendances avec Composer** :
    ```bash
    composer install

4. **Configurer votre base de données** :
Ouvrez le fichier .env et modifiez la ligne suivante pour correspondre à vos informations de connexion à la base de données :
    ```bash
    DATABASE_URL="mysql://root:password@127.0.0.1:3306/nom_de_votre_base_de_donnees"

Assurez-vous que la base de données existe avant de passer à l’étape suivante.

5. **Exécuter les migrations pour créer les tables dans la base de données** :
    ```bash
    php bin/console doctrine:migrations:migrate

6. **Lancer le serveur de développement Symfony** :
    ```bash
    symfony server:start

Cela démarrera un serveur local sur http://127.0.0.1:8000.

 ## Configuration
  
Vous devez configurer le fichier .env du projet selon la version de votre environnement de développement. Par exemple :
     
    DATABASE_URL="mysql://root:password@127.0.0.1:3306/nom_de_votre_base_de_donnees"

 ## Utilisation

Une fois le projet installé et le serveur lancé, vous pouvez accéder à l'application via un navigateur web à l'adresse suivante :

    http://127.0.0.1:8000

Vous pouvez accéder aux différentes routes de l'API (de même pour les catégories):
  - GET /api/produits : Récupérer tous les produits
  - POST /api/produits : Créer un nouveau produit
  - PUT /api/produits/{id} : Mettre à jour un produit existant
  - DELETE /api/produits/{id} : Supprimer un produit

 ## Choix technique
* J'ai choisi Symfony comme framework pour développer cet API car Symfony est un framework PHP robuste et flexible, idéal pour la création d'applications web évolutives, il est donc bien adapté pour la création d'API RESTful. C'est un framework connu pour sa modularité.
 
* J'ai travaillé sur l'environnement XAMPP pour exécuter mon projet localement.
* Utilisation de Git pour le contrôle de version et GitHub pour héberger le projet et le partager.

* Mysql est le système de gestion de base de donnée utilisé avec Doctrine qui est une bibliothèque PHP qui facilite l'interaction avec la base de donnée.
* PhpMyAdmin comme interface graphique pour effectuer/vérifier des opérations comme la création, la modification ou la suppression de tables, ainsi que l’exécution de requêtes SQL.

* J'ai choisi d'utiliser les contraintes de validation de Symfony, comme NotBlank, Length, Positive et une approche RESTful pour structurer les endpoints de l'API.
* Migrations Doctrine pour gérer les modifications de schéma de base de données.

 ## Problèmes rencontrés

1. **Erreur "Not Found" pour les routes comme /produits**
    
<ins>Description</ins> : Les routes définies ne fonctionnaient pas comme prévu.
</ins>Cause</ins> : Le serveur ne redirigeait pas correctement les requêtes vers index.php.
**Solution** :
Modifier les configurations du serveur pour s'assurer que toutes les requêtes passent par index.php (accéder aux routes en utilisant http://localhost/index.php/produits comme solution temporaire).
Puis configurer le .htaccess pour supprimer index.php de l'URL.

2. **Les données insérées via le formulaire n'étaient pas visibles dans phpMyAdmin**

</ins>Description</ins> : Les données insérées dans le formulaire ne s'affichaient pas dans phpMyAdmin.
</ins>Cause</ins> : Mauvaise configuration de la base de données.
**Solution** :
Vérifier et corriger le fichier .env.
Déboguer le formulaire.

3. **Les migrations échouaient avec "Table already exists"**
   
</ins>Description</ins> : Lors des migrations, une erreur indiquait que la table existait déjà.
</ins>Cause</ins> : La table avait été créée par une migration précédente.
**Solution** :
Utiliser la commande doctrine:migrations:sync-metadata-storage pour synchroniser l'état des migrations.
Recréer les migrations.

4. **Les entités Produits et Categories ne gérent pas la relation correctement(non résolu)**
   
</ins>Description</ins> : Une erreur indiquant que App\Entity\Categorie ne peut pas être trouvée apparait lors de requêtes.
</ins>Causes possibles </ins> : Nom incorrect de l'entité (Categorie au lieu de Categories) et erreurs dans la déclaration des relations dans les entités.


 ## Contribuer

Si vous souhaitez contribuer à ce projet, voici les étapes à suivre :

1. **Forkez ce projet sur GitHub**.
  
2. **Créez une branche**
    ```bash
    git checkout -b feature/xx

3. **Commitez vos modifications**
    ```bash
    git commit -am 'xx'

4. **Poussez votre branche sur votre fork**
    ```bash
    git push origin feature/xx

5. **Créez une pull request pour proposer vos modifications**

 ## Licence

Ce projet est sous licence MIT (Voir fichier LICENSE.md).
