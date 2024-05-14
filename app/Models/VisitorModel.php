<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorModel extends Model
{
  /**
  * @var string $table
  */
  protected $table        = 'trans_visitor';
  protected $primaryKey   = 'Id';
  public $timestamps      = false;

  /**
   * @var array $fillable
   */
  protected $fillable = [
    'Id',
    'Tickets',
    'VisitorName',
    'VisitorEmail',
    'VisitorPhone',
    'VisitorGender',
    'VisitorAddress',
    'VisitorCompany',
    'AddresseesName',
    'AddresseesPhone',
    'DepartmentDestination',
    'ArrivalDestination',
    'NumberOfPersons',
    'TermsAndConditions',
    'SaveInfo',
    'CheckinDate',
    'CheckoutDate',
    'CheckoutBy',
    'CheckoutDateLimit',
    'Status',
    'Devices'
  ];

  use HasFactory;
}
