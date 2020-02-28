<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentsModel extends Model
{
    protected $table = "comments";
    protected $primaryKey = "id_com";
    protected $returnType = "array";
 /*    protected $useSoftDeletes = true; */
    /* evita eliminacion de informacion y solo pone en 1 */
    /* Datos a Insertar */
    protected $allowedFields=[
        "id_post","name","email","comment","role","created_at"
    ];
}
