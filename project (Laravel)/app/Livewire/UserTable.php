<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
{
    use WithPagination;

    public $search = '';
    public $sortBy = 'name';
    public $sortDirection = 'asc';
    public $perPage = 10;
    public $filterBy = 'all';


    protected $paginationTheme = 'tailwind';

    protected $queryString = [
        'search' => ['except' => ''],
        'sortBy' => ['except' => 'name'],
        'sortDirection' => ['except' => 'asc'],
        'filterBy' => ['except' => 'all'],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilterBy()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->search = '';
        $this->sortBy = 'name';
        $this->sortDirection = 'asc';
        $this->filterBy = 'all';
        $this->resetPage();
    }

    public function render()
    {
        $query = User::withCount('order')
            ->withSum('order as total_revenue', 'total_price');

        // Search functionality
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            });
        }

        // Filter functionality
        switch ($this->filterBy) {
            case 'high_orders':
                $query->having('order_count', '>=', 5);
                break;
            case 'low_orders':
                $query->having('order_count', '<', 5);
                break;
            case 'high_revenue':
                $query->having('total_revenue', '>=', 300000);
                break;
            case 'low_revenue':
                $query->having('total_revenue', '<', 300000);
                break;
            case 'no_orders':
                $query->having('order_count', '=', 0);
                break;
        }

        // Sorting
        if ($this->sortBy === 'total_revenue') {
            $query->orderByRaw('COALESCE(total_revenue, 0) ' . $this->sortDirection);
        } elseif ($this->sortBy === 'order_count') {
            $query->orderBy('order_count', $this->sortDirection);
        } else {
            $query->orderBy($this->sortBy, $this->sortDirection);
        }

        $users = $query->paginate($this->perPage);

        return view('livewire.user-table', compact('users'));
    }
}
