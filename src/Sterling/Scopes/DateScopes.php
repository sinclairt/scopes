<?php

namespace Sterling\Scopes;

trait DateScopes
{

    /**
     * @param $query
     *
     * @param $from
     * @param $to
     * @param $ts
     *
     * @return mixed
     */
    public function scopeRanged($query, $from, $to = null, $ts = 'created_at')
    {
        return $to == null ? $query->dateAfter($from, $ts) : $query->dateBetween($from, $to, $ts);
    }

    /*
     * Created At Shortcut Scopes
     */

    public function scopeCreatedOn($query, $date)
    {
        return $this->dateOn('created_at', $query, $date);
    }

    public function scopeCreatedBetween($query, $from, $to)
    {
        return $this->dateBetween('created_at', $query, $from, $to);
    }

    public function scopeCreatedAfter($query, $from, $inclusive = false)
    {
        return $this->dateAfter('created_at', $query, $from, $inclusive);
    }

    public function scopeCreatedBefore($query, $from, $inclusive = false)
    {
        $this->dateBefore('created_at', $query, $from, $inclusive);
    }

    /*
     * Updated At Shortcut Scopes
     */

    public function scopeUpdatedOn($query, $date)
    {
        return $this->dateOn('updated_at', $query, $date);
    }

    public function scopeUpdatedBetween($query, $from, $to)
    {
        return $this->dateBetween('updated_at', $query, $from, $to);
    }

    public function scopeUpdatedAfter($query, $from, $inclusive = false)
    {
        return $this->dateAfter('updated_at', $query, $from, $inclusive);
    }

    public function scopeUpdatedBefore($query, $from, $inclusive = false)
    {
        $this->dateBefore('updated_at', $query, $from, $inclusive);
    }

    /*
     * Deleted At Shortcut Scopes
     */

    public function scopeDeletedOn($query, $date)
    {
        return $this->dateOn('deleted_at', $query, $date);
    }

    public function scopeDeletedBetween($query, $from, $to)
    {
        return $this->dateBetween('deleted_at', $query, $from, $to);
    }

    public function scopeDeletedAfter($query, $from, $inclusive = false)
    {
        return $this->dateAfter('deleted_at', $query, $from, $inclusive);
    }

    public function scopeDeletedBefore($query, $from, $inclusive = false)
    {
        $this->dateBefore('deleted_at', $query, $from, $inclusive);
    }


    /*
     * Generic Dates
     */

    public function scopeDateOn($query, $ts, $date)
    {
        return $this->dateOn($ts, $query, $date);
    }

    public function scopeDateBetween($query, $from, $to, $ts)
    {
        return $this->dateBetween($ts, $query, $from, $to);
    }

    public function scopeDateAfter($query, $from, $ts, $inclusive = false)
    {
        return $this->dateAfter($ts, $query, $from, $inclusive);
    }

    public function scopeDateBefore($query, $from, $ts, $inclusive = false)
    {
        return $this->dateBefore($ts, $query, $from, $inclusive);
    }

    /*
     * Base Methods
     */


    protected function dateOn($ts, $query, $date)
    {
        return $query->where($ts, $date);
    }

    protected function dateBetween($ts, $query, $from, $to)
    {
        return $query->whereBetween($ts, [
            $from,
            $to
        ]);
    }

    protected function dateAfter($ts, $query, $from, $inclusive = false)
    {
        return $query->where($ts, $inclusive ? '>=' : '>', $from);
    }

    protected function dateBefore($ts, $query, $from, $inclusive = false)
    {
        return $query->where($ts, $inclusive ? '<=' : '<', $from);
    }

    /*
     * Helper Methods
     */

    /**
     * @param $ts
     *
     * @return mixed
     */
    private function getTimeStamp($ts)
    {
        return strtolower(str_replace('_at', '', $ts));
    }
}