# Laravel

## Passaggi Preliminari

Creazione del progetto:

```bash
laravel new -n nome_progetto
```

Creazione del database:

```bash
mysql -uuser -ppassword
create database nome_database
```

Modifica del file di configurazione `.env`

Aggiungere:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=exam
DB_USERNAME=user
DB_PASSWORD=password
```

---

## Struttura del progetto

Creazione del model e del REST controller

```bash
php artisan make:model -a Project
```

> **Attenzione:** Il nome della tabella (model) deve essere sempre in inglese e al singolare.


## Struttura del progetto: Alternativa

```bash
php artisan make:model -cmr Project
```

> **Nota Bene:** Tramite questo comando creiamo il Model, il Controller e le Risorse, utilizzando questo non è necessario modificare le policy per lo store e l'update.

## Modifica dei campi della tabella tramite migrazioni

Modificare il file `database/migrations` denominato `create_projects_table` aggiungendo i campi relativi ad un progetto, come ad esempio:

- Titolo del progetto (stringa di 255 caratteri)
- Descrizione del progetto (testo)

Aggiungiamo quindi:

```php
public function up(): void
{
    Schema::create('projects', function (Blueprint $table) {
        $table->id();
        $table->string('title'); // Aggiunto a mano
        $table->text('description'); // Aggiunto a mano
        $table->timestamps();
    });
}
```

Aggiorniamo quindi le migrazioni. Verrà creata una tabella sul database passato nel file `.env` con i campi appena aggiunti:

```bash
php artisan migrate
```

---

## Modifica delle route

Modifichiamo il file `web.php` presente in `Progetti/routes`, aggiungendo le informazioni relative al controller REST appena creato:

```php
<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::resource('/projects', ProjectController::class);
```

---

## Sviluppo delle funzionalità CRUD

### Read

Modifichiamo il `ProjectController` presente in `app/Http/Controllers`, aggiornando il metodo `index`:

```php
public function index()
{
    $project = Project::all();
    return view('index', compact('project'));
}
```

Creiamo una view `index.blade.php` in `resources/views` che permetterà di visualizzare i progetti (`project`) che passiamo tramite il controller:

```html
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Progetti</title>
</head>
<body>
    <h1><center>Progetti in Laravel</center></h1>

    <table border="1px">
        <tr>
            <th>Titolo</th>
            <th>Descrizione</th>
            <th>Modifica</th>
            <th>Elimina</th>
        </tr>
        
        @foreach ($project as $proj)
        <tr>
            <td>{{$proj->title}}</td>
            <td>{{$proj->description}}</td>
            <td>
                Modifica....
            </td>
            <td>
                Elimina....
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
```

---

### Create

Modifichiamo il `ProjectController`, aggiornando il metodo `store`:

```php
public function store(StoreProjectRequest $request)
{
    $project = new Project();
    $project->title = request('title');
    $project->description = request('description');
    $project->save();
    return redirect('/projects');
}
```

Modifichiamo il file `StoreProjectRequest.php` presente in `app/Http/Requests/`, sostituendo `return false` con `return true`:

```php
public function authorize(): bool
{
    return true;
}
```

> **Nota Bene:** Passaggio fondamentale, altrimenti verrebbe restituito l'errore 403.

Aggiungiamo al file `index.blade.php`:

```html
<h3>Inserimento dei progetti</h3>

<form action="/projects" method="post">
    @csrf
    <span>Titolo: </span>
    <input type="text" name="title">
    <span>Descrizione: </span>
    <textarea name="description"></textarea>
    <input type="submit" value="Invia">
</form>
```

> **Nota Bene:** L'uso di `@csrf` è fondamentale, altrimenti verrebbe restituito l'errore 419.

---

### Delete

Modifichiamo il `ProjectController`, aggiornando il metodo `destroy`:

```php
public function destroy(Project $project)
{
    $project->delete();
    return redirect('/projects');
}
```

Aggiungiamo al file `index.blade.php`:

```html
<td>
    <form action="/projects/{{ $proj->id }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Elimina</button>
    </form>
</td>
```

---

### Update

Modifichiamo il `ProjectController`, aggiornando il metodo `edit`:

```php
public function edit(Project $project)
{
    return view('edit', compact('project'));
}
```

Modifichiamo il file `UpdateProjectRequest.php` presente in `app/Http/Requests/`, sostituendo `return false` con `return true`:

```php
public function authorize(): bool
{
    return true;
}
```

Creiamo una view `edit.blade.php` in `resources/views` che permetterà di editare il progetto (`project`) che passiamo tramite il controller:

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifica Progetto</title>
</head>
<body>
    <h1><center>Modifica Progetto</center></h1>

    <form action="/projects/{{ $project->id }}" method="post">
        @csrf
        @method('PATCH')
        <span>Titolo:</span>
        <input type="text" name="title" value="{{ $project->title }}"><br>
        <span>Descrizione:</span>
        <textarea name="description">{{ $project->description }}</textarea>
        <input type="submit" value="Modifica">
    </form>
</body>
</html>
```

Modifichiamo il `ProjectController`, aggiornando il metodo `update`:

```php
public function update(UpdateProjectRequest $request, Project $project)
{
    $project->title = request('title');
    $project->description = request('description');
    $project->save();
    return redirect('/projects');
}
```

Aggiungiamo al file `index.blade.php`:

```html
<td>
    <form action="/projects/{{ $proj->id }}/edit" method="get">
        <button type="submit">Modifica</button>
    </form>
</td>
```

---

## Test delle funzionalità

Testiamo la funzionalità creata con:

```bash
php artisan serve
```

## Relazioni tra più tabelle


Modificare il file presente in `database/migrations` aggiungendo delle informazioni relative alla chiave esterna che collega una tabella ad un'altra con relazione uno a molti.

```php
public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string("title", 128);
            $table->string("director", 64);
            $table->integer("year");
            $table->integer("duration_minutes")->nullable();

            $table->foreignId('genre_id')
                ->constrained('genres')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

```

Il codice crea una colonna `genre_id` come chiave esterna nella tabella corrente, collegata alla colonna id della tabella `genres`. Se si usa la notazione nell'esempio non è obbligatorio specificare la tabella di riferimento in `constrained` viene riconosciuta in automatico.

- `onUpdate('cascade')`: aggiorna automaticamente genre_id se l'id di genres cambia.
- `onDelete('cascade')`: elimina i record collegati se un genere viene eliminato.

**Alternativa:** Utilizzare un metodo `Schema::table()`

```php
public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string("title", 128);
            $table->string("director", 64);
            $table->integer("year");
            $table->integer("duration_minutes")->nullable();
            $table->timestamps();
        });

        Schema::table('movies', function (Blueprint $table) {
            $table->foreignId('genre_id')
                ->constrained('genres')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }
```