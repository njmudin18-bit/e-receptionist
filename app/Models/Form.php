<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
  /**
   * @var string $table
   */
  protected $table = 'ms_formdatadiri';

  /**
   * @var array $fillable
   */
  protected $fillable = [
    'Id',
    'VisitorName',
    'Email',
    'Phone',
    'Gender',
    'Company'
  ];

  use HasFactory;
}
