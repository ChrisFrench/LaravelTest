<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    

	public function applicants() {

		return $this->hasMany('App\Applicant');
	}


	public static function applicantRows() {

		return \DB::select('SELECT
	skills.`name` AS skill,
	jobs.`name` AS job,
	applicants.`name` AS name,
	applicants.email,
	applicants.website,
	applicants.cover_letter,
	(
	SELECT
		count( * ) 
	FROM
		skills
		JOIN applicants ON skills.applicant_id = applicants.id
		JOIN jobs j ON applicants.job_id = j.id 
	WHERE
		j.id = jobs.id 
	) AS total_skills,
	(
	SELECT
		count( * ) 
	FROM
		skills s
		JOIN applicants a ON s.applicant_id = a.id
		JOIN jobs j ON a.job_id = j.id 
	WHERE
		j.id = jobs.id 
		AND s.applicant_id = applicants.id 
	) AS applicant_skills 
FROM
	jobs
	JOIN applicants ON jobs.id = applicants.job_id
	JOIN skills ON applicants.id = skills.applicant_id');
	}



}
