<?php

namespace App\Livewire\Settings;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CompanyAssignView extends Component
{


    public $currentUser;

    public $selectedCompany;
    public $companies = [];

    public $name;
    public $description;
    public $field;
    public $wilaya;

    public $wilayas = [];

    public function mount()
    {
        $this->currentUser = Auth::user();
        $this->selectedCompany =  $this->currentUser->company_id;
        $this->companies = Company::orderBy('name')->pluck('name', 'id')->toArray();
        $this->wilayas = $this->getAlgerianWilayas();
    }

    public function assignCompany()
    {
        if (!$this->selectedCompany) {
            session()->flash('error', 'Please select a company.');
            return;
        }

        $this->currentUser->company_id = $this->selectedCompany;
        $this->currentUser->status = 'pending';
        $this->currentUser->save();

        session()->flash('message', 'Company assigned successfully.');
    }

    public function createCompany()
    {
        if (!$this->name || !$this->description || !$this->field || !$this->wilaya) {
            session()->flash('error', 'All fields are required.');
            return;
        }

        $company = Company::create([
            'name' => $this->name,
            'description' => $this->description,
            'field_of_bussines' => $this->field,
            'location' => $this->wilaya . ', Algeria',
            'status' => 'accepted' //default pending, this one should be controlled by the admin
        ]);

        $this->currentUser->company_id = $company->id;
        $this->currentUser->status = 'pending';
        $this->currentUser->save();

        $this->reset(['name', 'description', 'field', 'wilaya', 'selectedCompany']);
       
        $this->companies = Company::orderBy('name')->pluck('name', 'id')->toArray();

        session()->flash('message', 'Company created and assigned successfully.');
    }


    public function render()
    {
        return view('livewire.settings.company-assign-view');
    }


    private function getAlgerianWilayas()
    {
        return [
            'Adrar', 'Chlef', 'Laghouat', 'Oum El Bouaghi', 'Batna', 'Béjaïa', 'Biskra', 'Béchar', 'Blida',
            'Bouira', 'Tamanrasset', 'Tébessa', 'Tlemcen', 'Tiaret', 'Tizi Ouzou', 'Algiers', 'Djelfa', 'Jijel',
            'Sétif', 'Saïda', 'Skikda', 'Sidi Bel Abbès', 'Annaba', 'Guelma', 'Constantine', 'Médéa', 'Mostaganem',
            'MSila', 'Mascara', 'Ouargla', 'Oran', 'El Bayadh', 'Illizi', 'Bordj Bou Arréridj', 'Boumerdès',
            'El Tarf', 'Tindouf', 'Tissemsilt', 'El Oued', 'Khenchela', 'Souk Ahras', 'Tipaza', 'Mila',
            'Aïn Defla', 'Naâma', 'Aïn Témouchent', 'Ghardaïa', 'Relizane'
        ];
    }
}
