<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $fillable = ['EmployeeId','first_name', 'last_name', 'title','ManagerId'];
}
