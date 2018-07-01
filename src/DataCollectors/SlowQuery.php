<?php
namespace Nagy\LaraObserve\DataCollectors;

use Illuminate\Database\Events\QueryExecuted;

class SlowQuery extends AbstractDataCollector
{
    private $query;

    public function __construct(QueryExecuted $query)
    {
        $this->query = $query;
    }

    public function collect()
    {
        $details = [
            'rawQuery' => $this->getRawQuery(),
            'time' => $this->query->time,
            'trace' => $this->getFilteredDebugTrace()
        ];

        if ($this->isHttpRequest()) {
            $details = array_merge($details, $this->collectRequestData());
        } else {
            $details = array_merge($details, $this->collectCommandData());
        }

        return $details;
    }

    private function getRawQuery()
    {
        $sql = str_replace('?', '%s' , $this->query->sql);

        return vsprintf($sql, $this->query->bindings);
    }
}