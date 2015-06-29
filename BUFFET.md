# install cakephp-orm
```
$ composer require cakephp/orm
```

# connect to sqlite3 db 
```
use Cake\Datasource\ConnectionManager;

/* SQLITE3 */
ConnectionManager::config('default', [
    'className' => 'Cake\Database\Connection',
    'driver' => 'Cake\Database\Driver\Sqlite',
    'database' => 'notes.db',
]);
```

## connect to mysql db
[todo]

## connect to postgresql db
[todo]

# get 
[todo]

## find list
```
use Cake\ORM\TableRegistry;
$categories = TableRegistry::get('Categories');
$query = $categories->find('list');
$data = $query->toArray();
```
## find all
```
use Cake\ORM\TableRegistry;;
$notes = TableRegistry::get('Notes');
foreach ($notes->find('all') as $note){
    echo $note->title;
}
```

## find with filter
[todo]

## find ordered
[todo]

# complex find examples 
[todo]

# save/update

# delete

