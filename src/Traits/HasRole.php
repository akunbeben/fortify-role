<?php

namespace Akunbeben\FortifyRole\Traits;

trait HasRole {

    public function __construct(array $attributes = [])
    {
        $this->fillable[] = 'role_id';

        parent::__construct($attributes);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}