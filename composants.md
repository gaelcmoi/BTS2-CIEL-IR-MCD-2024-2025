# Les Composants dans Laravel

## Introduction

Les composants Laravel sont une fonctionnalité puissante qui permet de créer des éléments d'interface utilisateur réutilisables. Ils combinent la logique et la présentation dans des unités autonomes, favorisant ainsi la réutilisation du code et une meilleure organisation de l'application.

## Structure d'un Composant

Un composant Laravel se compose généralement de deux parties :

1. Une classe PHP qui définit la logique du composant
2. Un fichier de vue Blade qui définit le rendu HTML du composant

## Exemple : Le Composant PageHeader

### La Classe du Composant

Examinons la classe `PageHeader` :

```php
<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageHeader extends Component
{
    public $title;
    public $createRoute;
    public $style;

    public function __construct($title, $style, $createRoute = NULL)
    {
        $this->title = $title;
        $this->style = $style;
        $this->createRoute = $createRoute;
    }

    public function render()
    {
        return view('components.page-header');
    }
}
```

#### Points clés :

1. La classe hérite de `Illuminate\View\Component`.
2. Les propriétés publiques (`$title`, `$createRoute`, `$style`) seront accessibles dans la vue du composant.
3. Le constructeur initialise ces propriétés avec les valeurs passées lors de l'utilisation du composant.
4. La méthode `render()` spécifie quelle vue Blade doit être utilisée pour le rendu du composant.

### La Vue du Composant

Voici un extrait de la vue `page-header.blade.php` :

```html
<div class="d-flex align-items-center mb-3 justify-content-between">
    <div class="d-flex align-items-center">
        <h1 class="my-5 heading {{ $style }} ">{{ $title }}</h1>
    </div>
    <div class="d-flex align-items-center my-5">
        <button id="createBtn" class="btn border rounded btn-theme m-1 {{ $createRoute == null ? 'd-none' : '' }}" onclick="window.location.href='{{ $createRoute }}'">
            <!-- SVG content -->
        </button>
        <!-- Other buttons -->
    </div>
</div>
```

#### Points clés :

1. Les propriétés publiques de la classe (`$title`, `$style`, `$createRoute`) sont directement accessibles dans la vue.
2. La vue utilise ces propriétés pour personnaliser le rendu HTML.
3. Des conditions sont utilisées pour ajuster le rendu en fonction des valeurs des propriétés (par exemple, masquer le bouton de création si `$createRoute` est null).

## Utilisation des Composants

Pour utiliser ce composant dans une vue Blade, vous pouvez l'appeler comme ceci :

```html
<x-page-header title="Liste des Champions" style="text-golden" create-route="{{ route('champions.create') }}" />
```

## Avantages des Composants

1. **Réutilisabilité** : Les composants peuvent être utilisés dans plusieurs vues, réduisant la duplication de code.
2. **Encapsulation** : La logique et la présentation sont regroupées, facilitant la maintenance.
3. **Flexibilité** : Les composants peuvent accepter des paramètres, permettant une personnalisation facile.
4. **Lisibilité** : Ils rendent le code des vues plus propre et plus facile à comprendre.

## Conclusion

Les composants Laravel offrent une manière élégante et efficace de créer des éléments d'interface utilisateur réutilisables. En séparant la logique et la présentation tout en permettant une communication facile entre les deux, ils favorisent un code plus propre, plus maintenable et plus modulaire.

L'exemple du `PageHeader` illustre comment un composant peut encapsuler une structure complexe (avec des conditions et des styles dynamiques) dans un élément facilement réutilisable à travers votre application.
