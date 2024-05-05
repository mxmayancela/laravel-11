<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsContractWizardprocess extends Model
{
    use HasFactory;

    protected $schema = 'public';

    protected $table = 'as_contract_wizardprocess';
    protected $primaryKey = 'id_as_contract_wizardprocess';

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
        return $this->hasOne(Wizardprocess::class);
    }
}
