<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelegramModel extends Model
{
  /**
  * @var string $table
  */
  protected $table = 'ms_telegramtokens';

  public $timestamps = false;

  /**
   * @var array $fillable
   */
  protected $fillable = [
    'Id',
    'Departments',
    'Tokens',
    'RequestUrls'
  ];

  use HasFactory;
}
