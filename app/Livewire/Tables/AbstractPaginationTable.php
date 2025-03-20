<?php
namespace App\Livewire\Tables;

use Livewire\Component;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class AbstractPaginationTable extends Component
{
    public int $perPage = 6;
    public int $currentPage = 1;
    
    abstract protected function fetchData(): LengthAwarePaginator;

    public function nextPage()
    {
        if ($this->currentPage < $this->fetchData()->lastPage()) {
            $this->currentPage++;
        }
    }

    public function previousPage()
    {
        if ($this->currentPage > 1) {
            $this->currentPage--;
        }
    }

    public function firstPage()
    {
        $this->currentPage = 1;
    }

    public function lastPage()
    {
        $this->currentPage = $this->fetchData()->lastPage();
    }

  
}
