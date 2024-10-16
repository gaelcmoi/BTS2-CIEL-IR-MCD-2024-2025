# TP MVC - Modèle, Vue, Controller

Pour terminer le projet, nous devons nous assurer que tous les modèles et controllers sont fonctionnels.

Vous trouverez les notions nécessaires dans la synthèse de cours [sur les MVC](MVC.md)

## Modèles & relations

Les modèles se trouvent dans le dossier `app/Models`.

**Tâche :** Vérifier et le cas échéant créer les Modèles pour chacunes des entités.

Chaque classe modèle doit avoir :
- Les attributs suivants :
  - `$table` qui contient une chaîne de caractères correspondant au nom de la table
  - `$primaryKey` qui contient une chaîne de caractères correspondant au nom du champ défini comme clé primaire
  - `$fillable` qui contient un tableau de chaînes de caractères correspondant aux noms des champs non clé primaire
- Les méthodes pour les relations :
  - Dans le cas d'une relation `many-to-many`
    - Le nom de la méthode doit être au pluriel
    - Le corps de la méthode utiliser `belongsToMany`.
  - Dans le cas d'une relation `one-to-many`
    - Le nom de la méthode est au singulier si on est du côté `one`. Alors on utilise la méthode `belongsTo`
    - Le nom de la fonction est au pluriel si on est du côté `many`. Alors on utilise la méthode `hasMany`

## Contrôleurs

Les contrôleurs se trouvent dans le dossier `app/Http/Controllers`.

Les contrôleurs sont basés sur de l'héritage. Il est donc nécessaire d'avoir un fichier `Controller.php`.

Pour chacun de nos modèles, on doit avoir un fichier `ModelController.php`, par exemple `ChampionController.php`.

Les différentes méthodes dans un contôleur permettent d'effectuer les étapes du [CRUD](CRUD.md), les 4 opérations fondamentales en base de données.

**Tâche :** Vérifier et le cas échéant créer les Controller pour chacunes des entités. Vous veillerez à ce que toutes les opérations du CRUD soient présente dans chaque contrôleur.

## Vues

Les vues se trouvent dans `resources/views`. Chaque dossier comporte les vues pour un modèle. Vous noterez les présence d'un dossier supplémentaire `components`, le fonctionnement des composants est détaillé [ici](composants.md) et d'un dossier `layout` où figure la disposition globale commune à toutes les pages.

**Tâche :** Vérifier et le cas échéant créer les vues pour chacunes des entités. Pour chaque entités, vous devez avoir les vues suivantes :
- create : la vue permettantde créer une nouvelle instance de l'entité. Exemple : créer un nouveau champion
- index : la vue permettant de voir toutes les instances d'un type d'entité. Exemple : tous les champions
- show : la vue permettant de voir une instance en particulier. Exemple : le champion Zoé
- edit : la vue permettant de modifie une instance d'une entité. Exemple : la page d'édition du champion Zoé
