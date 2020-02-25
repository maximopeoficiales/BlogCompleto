<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriesModel extends Model
{
    protected $table = "categories";
    protected $primaryKey = "id_cat";
    protected $returnType = "array";
    /* protected $useSoftDeletes = true; */
    /* evita eliminacion de informacion y solo pone en 1 */
    /* Datos a Insertar */
    protected $allowedFields = [
        "name"
    ];
}
