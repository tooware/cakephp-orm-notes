<?php 
date_default_timezone_set('UTC');
require '../vendor/autoload.php';

use Cake\Datasource\ConnectionManager;

/* SQLITE3 */
ConnectionManager::config('default', [
    'className' => 'Cake\Database\Connection',
    'driver' => 'Cake\Database\Driver\Sqlite',
    'database' => 'notes.db',
    /*'driver' => 'Cake\Database\Driver\Mysql',
    'database' => 'notes',
    'username' => 'stargate',
    'password' => 'stargate'
    */
]);

use Cake\ORM\TableRegistry;

$categories = TableRegistry::get('Categories');
$notes = TableRegistry::get('Notes');
?>
<html>
<body>

<h1>Categories</h1>
<table>
<tr>
    <th></th>
    <th></th>
</tr>
<?php
$query = $categories->find('list');
$data = $query->toArray();
foreach ($data as $key=>$category) {
   echo "<tr>
    <td>".$category."</td>
    <td>
        <a href=category.php?action=edit&id=".$key.">edit</a> | 
        <a href=category.php?action=delete&id=".$key.">delete</a>
    </td>
</tr>";
}
?>
</table> 

<h1>Notes</h1>
<table>
<tr>
    <th>id</th>
    <th>title</th>
    <th>modified</th>
    <th>action</th>
</tr>
<?php
$data = $note->find('all', [
    'order' => ['Notes.modified' => 'DESC']        
]);
foreach ($data as $note) {
   echo "<tr>
    <td>".$note->id."</td>
    <td>".$note->title."</td>
    <td>".$note->modified->format('Y-m-d H:i:s')."</td>
    <td>
        <a href=category.php?action=edit&id=".$note->id.">edit</a> | 
        <a href=category.php?action=delete&id=".$note->id.">delete</a>
    </td>
</tr>";
}
?>
</table> 

</body>
</html>
