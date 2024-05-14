<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tujuan extends Model
{
  /**
   * @var string $table
   */
  protected $table = 'ms_formtujuan';

  /**
   * @var array $fillable
   */
  protected $fillable = [
    'Id',
    'All',
    'AddresseesName',
    'AddresseesPhone',
    'DepartmentDestination',
    'ArrivalDestination',
    'NumberOfPersons'
  ];

  use HasFactory;
}
