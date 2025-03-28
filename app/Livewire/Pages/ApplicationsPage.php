<?php

namespace App\Livewire\Pages;

use App\Livewire\Tables\AbstractPaginationTable;
use App\Models\Internship;
use App\Models\Member;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

class ApplicationsPage  extends AbstractPaginationTable
{

    use WithFileUploads;


    protected function fetchData(): LengthAwarePaginator
    {
        $user = Auth::user();

        switch ($user->type) {
            case 'Student':
                return Member::where('student_id', $user->id)->with('company')->with('internship')->paginate(
                    $this->perPage,
                    ['*'],
                    'page',
                    $this->currentPage
                );
                break;
            case 'Company':
                return Member::where('company_id', $user->company_id)->with('student')->with('internship')->paginate(
                    $this->perPage,
                    ['*'],
                    'page',
                    $this->currentPage
                );

                break;


            default:
                return Member::where('department_id', $user->department_id)->where('status' , 'accepted')->with('student')->with('internship')->with('company')->paginate(
                    $this->perPage,
                    ['*'],
                    'page',
                    $this->currentPage
                );
                break;
        }
    }

    public function render()
    {
        $user = Auth::user();

        switch ($user->type) {
            case 'Student':
                return view('livewire.student.applications-page', [
                    'data' => $this->fetchData(),
                ]);
                break;
            case 'Company':
                return view('livewire.company.applications-page', [
                    'data' => $this->fetchData(),
                ]);

                break;

            default:
                return view('livewire.department.applications-page', [
                    'data' => $this->fetchData(),
                ]);
                break;
        }
    }



    //for Company
    public function acceptApplication($application_id)
    {
        $application = Member::find($application_id);

        $application->update(['status' => 'accepted']);

        $internship = Internship::find($application->internship_id);
        $internship->update(['places_available' => $internship->places_available - 1]);

        $this->render();
    }

    public function refuseApplication($application_id)
    {
        Member::find($application_id)->update(['status' => 'refused']);
        $this->render();
    }

    #[Validate(['certificate_file' => 'pdf|mime:pdf|max:5120'])]
    public $certificate_file;

    public function uploadCertificateFile(){
        
    }
}
