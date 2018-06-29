<?php
namespace Nagy\LaraObserve;

class Formatter
{
    private $query;

    public function setQuery($query)
    {
        $this->query = $query;

        return $this;
    }

    public function getFullRawSql()
    {
        $sql = str_replace('?', '%s' , $this->query->sql);
        return vsprintf($sql, $this->query->bindings);
    }

    public function format()
    {
        return '('.$this->query->time.') '.$this->getFullRawSql();
    }
}

