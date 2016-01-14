<?php namespace Sterling\Scopes;

trait CommonScopes{

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Common scopes
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function scopeName($query, $name)
    {
        return $query->where('name',$name);
    }

    public function scopeNameLike($query, $name)
    {
        return $query->where('name', 'LIKE', $name);
    }

    public function scopeNameStartsWith($query, $name)
    {
        return $query->where('name', 'LIKE', $name.'%');
    }

    public function scopeNameEndsWith($query, $name)
    {
        return $query->where('name', 'LIKE', '%'.$name);
    }

}