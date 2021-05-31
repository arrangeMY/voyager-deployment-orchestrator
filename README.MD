### Introduction

This package is a fork of the original Deployment Orchestrator made by [DrudgeRajen](https://github.com/DrudgeRajen/voyager-deployment-orchestrator). All credit to creating this packages goes to them, i have simply fixed a few issues that prevented the package operating on recent versions of Laravel.

<a href = "https://github.com/the-control-group/voyager">Voyager </a> is an awesome admin tool for laravel. With the ability to create fully relational BREAD interfaces, to manage your data.

Voyager has a limitation in the deployment, that would require you to perform all the BREAD setup that you have performed in your local development environment, on the production server.

Voyager Deployment Orchestrator is the package which will listen `BREAD  Events` (Add, Update Delete) and will generate files, so that and BREAD changes made on a local development server can be easily seeded to production.

### Installation

```composer require arrangeMY/voyager-deployment-orchestrator:dev-master```

Then publish the default config and seeder file.

```
php artisan vendor:publish --provider="arrangeMY\VoyagerDeploymentOrchestrator\VoyagerDeploymentOrchestratorServiceProvider"
```

Next, open the `config/voyager-deployment-orchestrator.php` and add the table names which you require BREAD seeders to be generated for.

```
return [
    'tables' => [
        'users',
        'posts'
    ],
];
```

After Publishing the `VoyagerDeploymentOrchestratorSeeder` class file,
autoload composer so that laravel knows about new seeders.

``composer dump-autoload``

### Usage
Voyager Fires Events on Insert, Update, and Delete of BREAD.
This package listens for those events and creates respective seeder files.

### To run the seeder file:

```php artisan db:seed --class=VoyagerDeploymentOrchestratorSeeder```

### Generating seeder files for tables
VDO also provides an artisan command to generate the seed file for table.
In order to generate the seeder file for tables,

```php artisan vdo:generate table-name1```

It also supports the generation for multiple tables.

``` php artisan vdo:generate table-name1,table-name2,table-name3```

VDO seed generator command will keep the generated seed files inside `/database/seeders` with prefix `TableSeeder`

***Note:*** VDO seed generator will not add the seeder file in `VoyagerDeploymentOrchestratorSeeder.php` class automatically, because
this class in only used for BREAD seeders not the tables seeder. If you want to run all the vdo generated seeder at once,
please add those in `DatabaseSeeder.php` class.

### Contributing

Run phpcs linter to check for any error that may happen during PR.

```composer lint```

Fix errors reported by CI during Pull request.

```composer fix```
