<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Syaratketentuan extends Model
{
  /**
   * @var string $table
   */
  protected $table = 'ms_formsyaratdanketentuan';

  /**
   * @var array $fillable
   */
  protected $fillable = [
    'Id',
    'Activated',
    'TermsAndConditions'
  ];

  use HasFactory;
}
