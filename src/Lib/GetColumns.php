<?php

namespace It\Lib;

use Exception;
use PDO;

class GetColumns
{
    public static function run(PDO $conn, string $table): array
    {
        $driver = $conn->getAttribute(PDO::ATTR_DRIVER_NAME);
        $columns = [];

        switch ($driver) {
            case 'sqlite':
                $stmt = $conn->query("PRAGMA table_info($table)");
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $row) {
                    if ($row['name'] !== 'id') {
                        $columns[] = $row['name'];
                    }
                }
                break;

            case 'mysql':
                $stmt = $conn->query("SHOW COLUMNS FROM `$table`");
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $row) {
                    if ($row['Field'] !== 'id') {
                        $columns[] = $row['Field'];
                    }
                }
                break;

            case 'pgsql':
                $stmt = $conn->prepare("
                    SELECT column_name 
                    FROM information_schema.columns 
                    WHERE table_name = :table 
                      AND table_schema = 'public'
                ");
                $stmt->execute(['table' => $table]);
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $row) {
                    if ($row['column_name'] !== 'id') {
                        $columns[] = $row['column_name'];
                    }
                }
                break;

            default:
                throw new Exception("Unsupported database driver: $driver");
        }

        if (empty($columns)) {
            throw new Exception("No columns found or table '{$table}' does not exist.");
        }

        return $columns;
    }
}
