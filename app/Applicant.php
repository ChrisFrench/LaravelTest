<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    public function skills() {

		return $this->hasMany('App\Skill');
	}
}
