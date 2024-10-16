@extends('layouts.app')

@section('content')

    @include('components.welcome-block', [
        'blockClass' => 'welcome-block',
        'backgroundImage' => 'img/ffe8f50201af51a0956875d2aeeb9e662eb0b228-3840x2160.webp',
        'title' => ['LEAGUE of', 'BRANLY'],
        'subtitle' => [
            'A training website for the students of BTS CIEL.',
            'HTML, CSS, JS, PHP, DCM & SQL'
        ]
    ])

    @include('components.content-block', [
        'blockClass' => 'welcome-block bg-gold-1',
        'title' => '1. Create a Database Conceptual Model',
        'content' => [
            'Using the official League of Legends website and the Merise method, create a Conceptual Data Model (CDM) that represents the champions of Runeterra.',
            'Define all the Data Entities (also known as Entity) that represent the information in our system, for example we need the Entity "Champion".',
            'Then, define the Relationships between the Entities. Example: a Champion belongs to only one Region.',
            'These Relationships and Entities will form your Database Conceptual Model.',
            'You can use <a href="https://www.diagrams.net/" target="_blank" rel="noopener noreferrer" class="dcm-link link-underline-opacity-100-hover">Diagrams.net</a> to represent your DCM.'
        ],
        'image' => 'img/league_of_legends_diagram_v2.png'
    ])

    @include('components.code-block', [
        'blockClass' => 'welcome-block bg-hextech-black text-gold-1',
        'title' => '2. Integrate your DCM entities in the website',
        'content' => [
            'To make your entities, use the next command and replace <code class="inline-code">Champion</code> by the appropriate name:',
            '<pre><code class="language-bash">php artisan make:model Champion -m</code></pre>',
            'Then edit the <code class="inline-code">up</code> function in files of <code class="inline-code">database/migrations</code> with the correct names. Each line corresponds to an attribute of your entity and will generate a column in your database.',
            '<pre><code class="language-php">Schema::create(\'champions\', function (Blueprint $table) 
{
    $table->id(\'champion_id\');
    $table->string(\'name\');
    $table->string(\'title\')->nullable();
    $table->text(\'lore\')->nullable();
    $table->string(\'resource_type\');
    $table->date(\'release_date\')->nullable();
    $table->timestamps();
});</code></pre>',
            'Then run the migrations!',
            '<pre><code class="language-bash">php artisan migrate</code></pre>'
        ]
    ])

    @include('components.code-block', [
        'blockClass' => 'welcome-block bg-gold-1 text-blue-7 gold-theme-code',
        'title' => '3. Integrate your DCM relationships in the website',
        'content' => [
            'In each Model that you can find in <code class="inline-code">app/Models</code>, add the appropriate relationships:',
            '<pre><code class="language-php">class Champion extends Model
{
    public function abilities()
    {
        return $this->hasMany(Ability::class, \'champion_id\');
    }

    public function skins()
    {
        return $this->hasMany(Skin::class, \'champion_id\');
    }
}</code></pre>',
            'You can find the complete list of Eloquent relationships in the <a href="https://laravel.com/docs/11.x/eloquent-relationships" target="_blank" rel="noopener noreferrer" class="dcm-link link-underline-opacity-100-hover">Laravel documentation</a>.',
            'php artisan migrate'
        ]
    ])

    @include('components.code-block', [
        'blockClass' => 'welcome-block bg-hextech-black text-gold-1',
        'title' => 'Tips & tricks',
        'content' => [
            'To drop and redeploy your migrations:',
            '<pre><code class="language-bash">php artisan migrate:fresh</code></pre>'
        ]
    ])
@endsection