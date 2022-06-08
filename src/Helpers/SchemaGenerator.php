<?php

namespace Anam\DevelopmentKit\Helpers;

use Closure;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\Schema;

class SchemaGenerator extends Builder
{
    public static function instance(): self
    {
        return new static(Schema::getConnection());
    }

    public function getSql(string $table, Closure $callback): array
    {
        $bluePrint = $this->createBlueprint($table);
        $callback($bluePrint);
        return $bluePrint->toSql($this->connection, $this->connection->getSchemaGrammar());
    }

    public function plainSql(string $table, Closure $callback): string
    {
        $sql = "";
        foreach ($this->getSql($table, $callback) as $item) {
            $sql .= $item . "; ";
        }

        return $sql;
    }
}
