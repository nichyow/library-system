<?php

namespace App\Models;

use CodeIgniter\Model;

class BorrowerModel extends Model
{
    protected $table            = 'borrowers';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['name', 'email', 'phone_number', 'book_title', 'borrow_date', 'return_date'];
    protected $returnType       = 'array';
}
