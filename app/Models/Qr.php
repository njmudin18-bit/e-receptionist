<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qr extends Model
{
  /**
   * @var string $table
   */
  protected $table = 'ms_qr';

  public $timestamps = false;

  /**
   * @var array $fillable
   */
  protected $fillable = [
    'Id',
    'Name',
    'LinkUrl'
  ];

  use HasFactory;
}
