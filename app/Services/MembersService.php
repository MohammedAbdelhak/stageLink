<?php

namespace App\Services;

use App\Models\Member;

class MembersService
{

    public function __construct() {}

    public function addStudentToInternship($student, $internship)
    {
        $student_id = $student->id;
        
        $internship_id = $internship->id;
        
        $department_id = $student->department_id;

        $company_id = $internship->company->id;
        
        $status = "pending";

        $internshipApplication = Member::create(
            [
                "student_id" => $student_id,
                "internship_id" => $internship_id,
                "company_id" => $company_id,
                "department_id" => $department_id,
                "status" => $status,
            ]
        );
    }
}
