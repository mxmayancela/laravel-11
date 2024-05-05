<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    use HasFactory;

    protected $schema = 'public';

    protected $table = 'credit';

    public function setSchema($schema)
    {
        $this->schema = $schema;
    }

    public function getTable()
    {
        return $this->schema . '.' . $this->table;
    }

    public function wizardprocess()
    {
        return $this->belongsTo(Wizardprocess::class);
    }
}
