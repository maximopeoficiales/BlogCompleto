<?php

namespace App\Models;

use CodeIgniter\Model;

class PostsModel extends Model
{
    protected $table = "posts";
    protected $primaryKey = "id_post";
    protected $returnType = "array";
  /*   protected $useSoftDeletes = true; */
    /* evita eliminacion de informacion y solo pone en 1 */
    /* Datos a Insertar */
    protected $allowedFields = [
        "banner", "title","slug", "intro", "content", "category",
        "tags", "created_at", "created_by"
    ];
}
