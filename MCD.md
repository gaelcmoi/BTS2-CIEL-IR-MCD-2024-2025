# Comment construire un Modèle Conceptuel de Données (MCD)

## Partie 1 - MCD simplifié

### Introduction

Le Modèle Conceptuel de Données (MCD) est un outil fondamental dans la conception de bases de données. Il permet de représenter de manière graphique et structurée les données d'un système d'information et leurs relations.

### 1. Comprendre les concepts de base

#### 1.1 Entités

Une entité représente un objet ou un concept du monde réel. Par exemple : Champion, Compétence,...
On représente une entité par un rectangle avec dans la partie supérieur son nom.

![image](https://github.com/user-attachments/assets/81145d06-ed21-4e26-9283-d3fba26d2855)

#### 1.2 Attributs

Les attributs sont les caractéristiques qui décrivent une entité. Par exemple, pour l'entité Champion : Nom, Description,...
Dans notre modèle, on représente les attributs en dessous du nom dans une partie séparée.

![image](https://github.com/user-attachments/assets/82f3b32a-0be4-4554-9d11-67d4007a4174)

#### 1.3 Relations

Les relations décrivent les liens entre les entités. Par exemple : un Champion "possède" une ou plusieurs Compétences.

![image](https://github.com/user-attachments/assets/e74ea6a9-b130-4ace-9150-cf68145e983f)

#### 1.4 Cardinalités

Les cardinalités indiquent le nombre minimum et maximum d'occurrences d'une entité dans une relation. Voici la liste des cardinalités possibles et leur signification :

- (0,1) : Zéro ou un.
  - L'entité peut ne pas participer à la relation, ou y participer une seule fois.
  - Exemple : Un employé peut avoir zéro ou un bureau attitré.
  - Représentation :
    
    ![image](https://github.com/user-attachments/assets/13f7d01f-423e-4ae7-b788-60b82f6862c6)

- (1,1) : Exactement un.
  - L'entité doit participer à la relation exactement une fois.
  - Exemple : Une personne a exactement une date de naissance.
  - Représentation :

    ![image](https://github.com/user-attachments/assets/ad18f312-6d0b-42e7-a05d-cb961b914a77)

- (0,n) : Zéro ou plusieurs.
  - L'entité peut ne pas participer à la relation, ou y participer plusieurs fois.
  - Exemple : Un client peut n'avoir passé aucune commande, ou en avoir passé plusieurs.
  - Représentation :

    ![image](https://github.com/user-attachments/assets/085b73dc-b582-444d-8ec7-b3a26f60a3a1)
    
- (1,n) : Un ou plusieurs
  - L'entité doit participer à la relation au moins une fois, et peut y participer plusieurs fois.
  - Exemple : Un livre doit avoir au moins un auteur, et peut en avoir plusieurs.
  - Représentation :

    ![image](https://github.com/user-attachments/assets/eda30424-199b-4153-a4b9-4bb3f2e79814)
 
- (i,j) : Entre i et j (où i < j)
  - L'entité doit participer à la relation au minimum i fois et au maximum j fois.
  - Exemple : Une équipe de football doit avoir entre 11 et 23 joueurs (11,23).
  - Il n'y a pas de représentation symbolique pour ce cas.
 
#### 1.5 Liste des symboles de cardinalité

![crow-s-foot-notation](https://github.com/user-attachments/assets/0676bdf9-1165-47e5-b113-09feda617b90)

### 2. Étapes pour construire un MCD

#### 2.1 Identifier les entités

- Listez tous les objets ou concepts importants du système.
- Chaque entité doit avoir un nom unique et être au singulier.

#### 2.2 Définir les attributs

- Pour chaque entité, identifiez ses caractéristiques.
- Choisissez un identifiant unique pour chaque entité appelé clé primaire ou primary key (PK) en anglais. Elle sera en gras souligné dans l'entity.

#### 2.3 Établir les relations

- Identifiez les liens entre les entités.
- Nommez ces relations avec des verbes à l'infinitif.

#### 2.4 Déterminer les cardinalités

- Pour chaque relation, définissez les cardinalités minimales et maximales.
- Utilisez la notation (0,1), (1,1), (0,n), ou (1,n).

#### 2.5 Affiner le modèle

- Vérifiez la cohérence globale du modèle.
- Éliminez les redondances éventuelles.
- Assurez-vous que chaque entité a un identifiant unique.

### 3. Exemple pratique

Construisons un MCD simple pour un système de gestion de champions et de leurs compétences :

Entités :
- Champion (ID_Champion, Nom)
- Compétence (ID_Compétence, Nom)

Relation :
- Un Champion "possède" une ou plusieurs Abilités
- Une Compétence "appartient à" un seul Champion

Cardinalités :
- Champion vers Compétence : (1,n) - Un champion possède au moins une compétence et peut en avoir plusieurs.
- Compétence vers Champion : (1,1) - Une compétence appartient à un et un seul champion.

Représentation simplifiée :

![image](https://github.com/user-attachments/assets/27b4c2bb-5fd2-4bb7-bb6f-04a89bae20e2)

Dans ce modèle :
- Chaque champion doit avoir au moins une compétence (cardinalité minimale 1) et peut en avoir plusieurs (cardinalité maximale n).
- Chaque compétence appartient exactement à un champion (cardinalité 1,1).

### 4. L'outil draw.io / diagram.net

1. Rendez-vous sur https://app.diagrams.net/#
2. Sélectionnez GutHub
[image](https://github.com/user-attachments/assets/1604ed49-42a1-4a69-b3e4-db4fbbbbe82b)
3. Cliquez sur `Créer un nouveau diagramme`
![image](https://github.com/user-attachments/assets/1ee0e269-f494-444b-bc9e-051faa71a65b)
4. Selectionnez `Diagramme entité-relation` dans la liste puis le bouton `Créer`.
![image](https://github.com/user-attachments/assets/71def5ad-d918-4861-a6a8-2642bfcbeef6)
5. Cliquez sur `Autoriser`.
![image](https://github.com/user-attachments/assets/09674776-baac-40c7-a023-cd9d14957320)
6. Si ce n'est pas fait, logger vous sur Github puis cliquez sur le bouton `Installer`.
7. Sélectionnez le dossier `<votre_compte>/BTS2-CIEL-IR-MCD-2024-2025` puis `OK`.

### 5. Exercice

Utiliser diagram.net pour refaire l'exemple de la partie 3.

## Partie 2 - MCD étendu / Modèle Physique de Données

Le Modèle Conceptuel de Données (MCD) Étendu est une version plus détaillée du MCD classique, on l'appelle également Modèle Physique de Données. Il inclut non seulement les entités, les relations et les cardinalités, mais aussi les types de données pour chaque attribut. Cette approche permet une modélisation plus précise et facilite la transition vers le modèle logique et physique de la base de données.

### 1. Concepts du MCD Étendu / Modèle Physique de Données

#### 1.1 Entités avec Types

Dans un MCD étendu, chaque entité est représentée par un rectangle divisé en trois parties, se sera une table de notre base de données :
1. Le nom de la table
2. La clé primaire, qui doit être soulignée
3. Les noms et les types de données correspondants

#### 1.2 Types de Données Courants

Voici une liste des types de données fréquemment utilisés dans un MCD étendu :

- INT : Nombre entier
- FLOAT : Nombre à virgule flottante
- DECIMAL(p,s) : Nombre décimal avec p chiffres au total et s chiffres après la virgule
- VARCHAR(n) : Chaîne de caractères de longueur variable (max n)
- CHAR(n) : Chaîne de caractères de longueur fixe (n)
- TEXT : Texte de longueur variable (pour les longs textes)
- DATE : Date (AAAA-MM-JJ)
- TIME : Heure (HH:MM:SS)
- DATETIME : Date et heure
- BOOLEAN : Valeur booléenne (vrai/faux)
- BASE64 : Fichier comme les images, il s'agit d'un type avancé

### 1.3 Relations et Cardinalités

Lorsqu'il s'agit d'une relation `one-to-many`, on va venir mettre une clé étrangère dans la table principale. On relira cette clé étrangère à la table dont elle est issue. Pour les relations `many-to-many`, il faut faire apparaitre une table intermédiare dite **pivot** qui contiendra les clés étrangères des deux tables concernées.

## 2. Étapes pour Construire un MCD Étendu

### 2.1 Identifier les tables et leurs champs

- Transformer les entités en table.
- Chaque attribut devient un champs de la table.

### 2.2 Définir les Types de Données

- Pour chaque champs, déterminez le type de données approprié.
- Choisissez des types qui reflètent précisément la nature et la taille des données.

### 2.3 Établir les Relations et Cardinalités

- Identifiez les liens entre les entités (`one-to-many` ou `many-to-many`).
- Définissez les cardinalités pour chaque relation et ajoutez des tables ou flèches en fonctions des situations.

### 2.4 Affiner le Modèle

- Vérifiez la cohérence des types de données.
- Assurez-vous que les clés primaires sont correctement typées (généralement INT pour les ID auto-incrémentés).

## 4. Avantages du MCD Étendu

1. Précision accrue : Les types de données fournissent plus d'informations sur la structure de la base de données.
2. Facilite la transition : Le passage du modèle conceptuel au modèle logique est simplifié.
3. Détection précoce des problèmes : Les incohérences de types peuvent être identifiées plus tôt dans le processus de conception.
4. Communication améliorée : Les développeurs et les administrateurs de bases de données ont une vision plus claire des exigences en matière de données.

En utilisant un MCD étendu, vous créez une base solide pour la conception de votre base de données, en combinant la clarté conceptuelle du MCD classique avec la précision technique nécessaire pour l'implémentation.

Une fois votre diagramme fini, vous pouvez passer à [la suite](TP_MCD.md).
