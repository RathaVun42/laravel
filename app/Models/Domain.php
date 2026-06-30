<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $table = 'domains';
    protected $primaryKey = 'domain_id';
    protected $fillable = ["domain_name","expiry_date", "registrar", "auto_renew", "contact_email"];
}
