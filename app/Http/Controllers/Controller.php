<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Job;
use App\Applicant;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function test() {

		$displayRows = Job::applicantRows();
   		$totalApplicants =  Applicant::count();
   		$uniqueSkills =  \DB::table('skills')->distinct('name')->count('name');	


        return view('test')->with(['displayRows' => $displayRows, 'totalApplicants' => $totalApplicants, 'uniqueSkills' => $uniqueSkills ]);

    }
}
