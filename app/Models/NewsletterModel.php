<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsletterModel extends Model
{
    protected $table = "newsletter";
    protected $primaryKey = "id";
    protected $returnType = "array";
    protected $useSoftDeletes = false;
    /* evita eliminacion de informacion y solo pone en 1 */
    /* Datos a Insertar */
    protected $allowedFields = [
        "email", "added_at"
    ];
}
