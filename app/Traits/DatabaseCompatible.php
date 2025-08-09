<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait DatabaseCompatible
{
    /**
     * Obtenir la fonction de formatage de date compatible avec la base de données
     *
     * @param string $column
     * @param string $format
     * @return string
     */
    protected function getDateFormat($column = 'created_at', $format = '%Y-%m')
    {
        $driver = config('database.default');
        $connection = config("database.connections.{$driver}.driver");
        
        switch ($connection) {
            case 'sqlite':
                return "strftime('{$format}', {$column})";
            case 'mysql':
            case 'mariadb':
                return "DATE_FORMAT({$column}, '{$format}')";
            case 'pgsql':
                // PostgreSQL utilise to_char
                $pgFormat = str_replace(['%Y', '%m', '%d'], ['YYYY', 'MM', 'DD'], $format);
                return "to_char({$column}, '{$pgFormat}')";
            default:
                // Fallback pour SQLite
                return "strftime('{$format}', {$column})";
        }
    }

    /**
     * Obtenir une requête compatible pour filtrer par mois
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $column
     * @param int $month
     * @param int|null $year
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function whereMonth($query, $column = 'created_at', $month = null, $year = null)
    {
        $month = $month ?? now()->month;
        $year = $year ?? now()->year;
        
        $driver = config('database.default');
        $connection = config("database.connections.{$driver}.driver");
        
        switch ($connection) {
            case 'sqlite':
                return $query->whereRaw("strftime('%m', {$column}) = ?", [sprintf('%02d', $month)])
                            ->whereRaw("strftime('%Y', {$column}) = ?", [$year]);
            case 'mysql':
            case 'mariadb':
                return $query->whereMonth($column, $month)
                            ->whereYear($column, $year);
            case 'pgsql':
                return $query->whereRaw("EXTRACT(MONTH FROM {$column}) = ?", [$month])
                            ->whereRaw("EXTRACT(YEAR FROM {$column}) = ?", [$year]);
            default:
                // Fallback avec whereBetween
                $startOfMonth = now()->setYear($year)->setMonth($month)->startOfMonth();
                $endOfMonth = now()->setYear($year)->setMonth($month)->endOfMonth();
                return $query->whereBetween($column, [$startOfMonth, $endOfMonth]);
        }
    }

    /**
     * Obtenir une requête compatible pour filtrer par année
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $column
     * @param int|null $year
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function whereYear($query, $column = 'created_at', $year = null)
    {
        $year = $year ?? now()->year;
        
        $driver = config('database.default');
        $connection = config("database.connections.{$driver}.driver");
        
        switch ($connection) {
            case 'sqlite':
                return $query->whereRaw("strftime('%Y', {$column}) = ?", [$year]);
            case 'mysql':
            case 'mariadb':
                return $query->whereYear($column, $year);
            case 'pgsql':
                return $query->whereRaw("EXTRACT(YEAR FROM {$column}) = ?", [$year]);
            default:
                // Fallback avec whereBetween
                $startOfYear = now()->setYear($year)->startOfYear();
                $endOfYear = now()->setYear($year)->endOfYear();
                return $query->whereBetween($column, [$startOfYear, $endOfYear]);
        }
    }

    /**
     * Obtenir les statistiques mensuelles de manière compatible
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $valueColumn
     * @param string $dateColumn
     * @param int $months
     * @return \Illuminate\Support\Collection
     */
    protected function getMonthlySalesStats($query, $valueColumn = 'total', $dateColumn = 'created_at', $months = 6)
    {
        $driver = config('database.default');
        $connection = config("database.connections.{$driver}.driver");
        
        if (in_array($connection, ['mysql', 'mariadb'])) {
            // Utiliser les fonctions MySQL natives pour de meilleures performances
            return $query->where($dateColumn, '>=', now()->subMonths($months))
                ->select(
                    DB::raw("DATE_FORMAT({$dateColumn}, '%Y-%m') as month"),
                    DB::raw("SUM({$valueColumn}) as revenue"),
                    DB::raw('COUNT(*) as orders')
                )
                ->groupBy('month')
                ->orderBy('month')
                ->get();
        } else {
            // Approche compatible pour SQLite et autres
            $records = $query->where($dateColumn, '>=', now()->subMonths($months))
                ->get([$dateColumn, $valueColumn]);
                
            $groupedRecords = $records->groupBy(function ($record) use ($dateColumn) {
                return $record->{$dateColumn}->format('Y-m');
            });
            
            $monthlySales = collect();
            foreach ($groupedRecords as $month => $monthRecords) {
                $monthlySales->push((object) [
                    'month' => $month,
                    'revenue' => $monthRecords->sum($valueColumn),
                    'orders' => $monthRecords->count()
                ]);
            }
            
            return $monthlySales->sortBy('month');
        }
    }

    /**
     * Obtenir le driver de base de données actuel
     *
     * @return string
     */
    protected function getDatabaseDriver()
    {
        $driver = config('database.default');
        return config("database.connections.{$driver}.driver");
    }

    /**
     * Vérifier si la base de données est SQLite
     *
     * @return bool
     */
    protected function isSQLite()
    {
        return $this->getDatabaseDriver() === 'sqlite';
    }

    /**
     * Vérifier si la base de données est MySQL/MariaDB
     *
     * @return bool
     */
    protected function isMySQL()
    {
        return in_array($this->getDatabaseDriver(), ['mysql', 'mariadb']);
    }

    /**
     * Vérifier si la base de données est PostgreSQL
     *
     * @return bool
     */
    protected function isPostgreSQL()
    {
        return $this->getDatabaseDriver() === 'pgsql';
    }
}
