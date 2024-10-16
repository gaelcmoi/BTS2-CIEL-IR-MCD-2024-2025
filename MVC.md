# Le Modèle MVC (Modèle-Vue-Contrôleur)

## Introduction

Le modèle MVC est un patron de conception couramment utilisé dans le développement web. Il permet de séparer les préoccupations de l'application en trois composants principaux : le Modèle, la Vue et le Contrôleur. Cette séparation facilite la maintenance, la réutilisation du code et l'évolutivité de l'application.

## Les composants du MVC

### 1. Modèle

Le Modèle représente les données et la logique métier de l'application. Il est indépendant de l'interface utilisateur.

**Exemple avec League of Branly :**

```php
class Champion extends Model
{
    protected $fillable = ['name', 'title', 'lore', 'difficulty', 'release_year'];

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    // Autres relations...
}
```

Dans cet exemple, le modèle `Champion` définit la structure des données d'un champion et ses relations avec d'autres entités.

### 2. Vue

La Vue est responsable de l'affichage des données à l'utilisateur. Elle ne contient généralement pas de logique complexe.

**Exemple avec League of Branly :**

```html
<div id="gridView" class="row">
    @foreach($champions as $champion)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('img/champions/' . $champion->image) }}" class="card-img-top" alt="{{ $champion->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $champion->name }}</h5>
                    <p class="card-text">{{ $champion->title }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
```

Cette vue Blade affiche une grille de champions avec leurs images et informations de base.

### 3. Contrôleur

Le Contrôleur agit comme un intermédiaire entre le Modèle et la Vue. Il gère les requêtes de l'utilisateur, interagit avec le Modèle et prépare les données pour la Vue.

**Exemple avec League of Branly :**

```php
class ChampionController extends Controller
{
    public function index()
    {
        $champions = Champion::with('gender', 'positions')->get();
        return view('champions.index', compact('champions'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'title' => 'required|max:100',
            // Autres validations...
        ]);

        Champion::create($validatedData);

        return redirect()->route('champions.index')->with('success', 'Champion créé avec succès.');
    }

    // Autres méthodes...
}
```

Ce contrôleur gère les opérations liées aux champions, comme l'affichage de la liste des champions et la création d'un nouveau champion.

## Flux de données dans le MVC

1. L'utilisateur interagit avec la Vue (par exemple, en cliquant sur un bouton pour créer un champion).
2. La Vue envoie cette action au Contrôleur.
3. Le Contrôleur traite la demande, interagit avec le Modèle si nécessaire (par exemple, pour créer un nouveau champion dans la base de données).
4. Le Modèle met à jour son état interne et renvoie les données au Contrôleur.
5. Le Contrôleur prépare les données et les passe à la Vue appropriée.
6. La Vue affiche les données mises à jour à l'utilisateur.

## Avantages du MVC

1. **Séparation des préoccupations** : Chaque composant a une responsabilité claire, ce qui facilite la maintenance et les tests.
2. **Réutilisabilité** : Les composants peuvent être réutilisés dans différentes parties de l'application.
3. **Flexibilité** : Il est plus facile de modifier ou de remplacer un composant sans affecter les autres.
4. **Développement parallèle** : Différentes équipes peuvent travailler simultanément sur le Modèle, la Vue et le Contrôleur.
