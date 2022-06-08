<?php

namespace Anam\DevelopmentKit\Helpers;

class MigrationGenerator
{
    protected $db;
    protected $migrator;

    public function __construct()
    {
        $this->migrator = app('migrator');
        $this->db = $this->migrator->resolveConnection(null);
    }

    public function generateMigrationFromFile($file): array
    {
        $migration_name = $this->migrator->getMigrationName($file);
        $this->migrator->requireFiles([$migration_name => $file]);
        return $this->generateMigrationFromName($migration_name);
    }

    public function generateMigrationFromPath($path): array
    {
        $migrations = $this->migrator->getMigrationFiles($path);
        $this->migrator->requireFiles($migrations);

        $queries = [];

        foreach ($migrations as $migration_name => $migration) {
            $queries[] = $this->generateMigrationFromName($migration_name);
        }

        return $queries;
    }

    protected function generateMigrationFromName($migration_name): array
    {
        $migration = $this->migrator->resolve($this->migrator->getMigrationName($migration_name));
        return [
            $migration_name => array_column($this->db->pretend(function () use ($migration) {
                if (method_exists($migration, 'up')) {
                    $migration->up();
                }
            }), 'query'),
        ];
    }
}
