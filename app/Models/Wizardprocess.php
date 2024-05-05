<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wizardprocess extends Model
{
    use HasFactory;

    protected $schema = 'public';

    protected $table = 'wizardprocess';

    protected $primaryKey = 'id_wizardprocess';

    public function setSchema($schema)
    {
        $this->schema = $schema;
    }

    public function getTable()
    {
        return $this->schema . '.' . $this->table;
    }

    public function credit()
    {
        return $this->hasOne(Credit::class);
    }

    public function asContractWizardprocess()
    {
        return $this->belongsTo(AsContractWizardprocess::class);
    }
}
