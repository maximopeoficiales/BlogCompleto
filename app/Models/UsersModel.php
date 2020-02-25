<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = "users";
    protected $primaryKey = "id_user";
    protected $returnType = "array";
 /*    protected $useSoftDeletes = true; */
    /* evita eliminacion de informacion y solo pone en 1 */
    /* Datos a Insertar */
    protected $allowedFields=[
        "name","username","password","role","last_login"
    ];
}
