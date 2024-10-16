# Le système de routes dans Laravel

## Introduction

Le système de routes dans Laravel est une partie fondamentale du framework. Il permet de définir comment l'application répond aux requêtes HTTP entrantes. Dans ce cours, nous allons explorer les concepts de base du routage Laravel, en nous concentrant particulièrement sur l'utilisation de `Route::resource` pour gérer efficacement les routes CRUD.

## Concepts de base du routage

### Définition simple d'une route

Dans Laravel, les routes sont généralement définies dans le fichier `routes/web.php`. Voici un exemple simple :

```php
Route::get('/hello', function () {
    return 'Hello, World!';
});
```

Cette route répond aux requêtes GET sur l'URL `/hello` et renvoie le texte "Hello, World!".

### Routes avec paramètres

Les routes peuvent inclure des paramètres :

```php
Route::get('/user/{id}', function ($id) {
    return 'User '.$id;
});
```

### Routes vers des contrôleurs

Il est courant de diriger les routes vers des méthodes de contrôleur :

```php
Route::get('/users', [UserController::class, 'index']);
```

## Route::resource

`Route::resource` est une fonctionnalité puissante de Laravel qui permet de définir rapidement toutes les routes CRUD typiques pour un modèle donné.

### Syntaxe de base

```php
Route::resource('champions', ChampionController::class);
```

Cette seule ligne crée les routes suivantes :

| Verbe HTTP | URI                    | Action  | Nom de la route    |
|------------|------------------------|---------|---------------------|
| GET        | /champions             | index   | champions.index     |
| GET        | /champions/create      | create  | champions.create    |
| POST       | /champions             | store   | champions.store     |
| GET        | /champions/{champion}  | show    | champions.show      |
| GET        | /champions/{champion}/edit | edit | champions.edit     |
| PUT/PATCH  | /champions/{champion}  | update  | champions.update    |
| DELETE     | /champions/{champion}  | destroy | champions.destroy   |

### Personnalisation des routes resource

Vous pouvez personnaliser les routes générées par `Route::resource` :

```php
Route::resource('champions', ChampionController::class)->only(['index', 'show']);
```

Cela ne générera que les routes 'index' et 'show'.

Ou bien :

```php
Route::resource('champions', ChampionController::class)->except(['destroy']);
```

Cela générera toutes les routes sauf 'destroy'.

### Routes imbriquées

Vous pouvez également créer des routes ressources imbriquées :

```php
Route::resource('champions.abilities', ChampionAbilityController::class);
```

Cela créera des routes comme `/champions/{champion}/abilities`.

## Nommage des routes

Laravel nomme automatiquement les routes créées par `Route::resource`. Vous pouvez utiliser ces noms dans vos vues ou contrôleurs :

```php
return redirect()->route('champions.index');
```

```html
<a href="{{ route('champions.show', $champion) }}">Voir le champion</a>
```

## Groupes de routes

Laravel permet de grouper des routes pour appliquer des attributs communs :

```php
Route::middleware(['auth'])->group(function () {
    Route::resource('champions', ChampionController::class);
    Route::resource('items', ItemController::class);
});
```

Cela applique le middleware 'auth' à toutes les routes des ressources 'champions' et 'items'.

## API Resource Routes

Pour les API, Laravel fournit une méthode `apiResource` qui exclut les routes 'create' et 'edit' :

```php
Route::apiResource('champions', ChampionController::class);
