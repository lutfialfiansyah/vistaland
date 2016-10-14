<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class promo extends Model
{
  protected $table = "promo";
  protected $fillable = ['nama','date-start','date_end','disccount','agent_bonus','team_bonus'];

  public function promo()
  {
    return $this->hasOne('App\bf','promo_id');
  }
}
