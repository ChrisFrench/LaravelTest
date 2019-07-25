<!DOCTYPE html>
<html>
  <head>
    <title>Job Applicants Report</title>
    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.9.1/build/cssreset/cssreset-min.css">
    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.9.1/build/cssbase/cssbase-min.css">
    <style type="text/css">
      #page {
        width: 1200px;
        margin: 30px auto;
      }
      .job-applicants {
        width: 100%;
      }
      .job-name {
        text-align: center;
      }
      .applicant-name {
        width: 150px;
      }
    </style>
  </head>
  <body>
    <div id="page">
      <table class="job-applicants">
        <thead>
          <tr>
            <th>Job</th>
            <th>Applicant Name</th>
            <th>Email Address</th>
            <th>Website</th>
            <th>Skills</th>
            <th>Cover Letter Paragraph</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($displayRows as $key =>  $row) 
          <tr>
            @if(empty($key) || $row->job != $displayRows[$key-1]->job) 
            <td rowspan="{{$row->total_skills}}" class="job-name">{{$row->job}} </td>
            @endif
            @if(empty($key) || $row->name != $displayRows[$key-1]->name) 
            <td rowspan="{{$row->applicant_skills}}" class="applicant-name">{{$row->name}}</td>
            @endif
             @if(empty($key) || $row->email != $displayRows[$key-1]->email) 
            <td rowspan="{{$row->applicant_skills}}"><a href="mailto:{{$row->email}}">{{$row->email}}</a></td>
            @endif
            @if(empty($key) || $row->website != $displayRows[$key-1]->website) 
            <td rowspan="{{$row->applicant_skills}}"><a href="{{$row->website}}">{{parse_url($row->website, PHP_URL_HOST)}}</td>
            @endif    
            <td>{{$row->skill}}</td>
            @if(empty($key) || $row->cover_letter != $displayRows[$key-1]->cover_letter) 
            <td rowspan="{{$row->applicant_skills}}">{{$row->cover_letter}}</td>
            @endif
          </tr>
        @endforeach
        </tbody>
        <tfooter>
          <tr>
            <td colspan="6">{{$totalApplicants}} Applicants, {{$uniqueSkills }} Unique Skills</td>
          </tr>
        </tfooter>
      </table>
    </div>
  </body>
</html>

