# youtrack-client
Клиент API youtrack


## Установка

```
composer require toy-php/youtrack-client
```

## Настройка подключения

```php
\youtrack\core\Api::setup('YOUTRACK HOST', 'TOKEN');
```

## Использование

```php
$projects = \youtrack\aggregate\Issue::find()
    ->fields('id,summary,project(name)')
    ->top(10)
    ->all();
    
foreach ($issues as $issue) {
    echo 'ID - ' . $issue->id . "\n";
    echo 'Summary - ' . $issue->summary . "\n";
    echo 'Project name - ' . $issue->project->name . "\n\n\n";
}    
```
