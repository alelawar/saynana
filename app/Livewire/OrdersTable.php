<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class OrdersTable extends Component
{
    use WithPagination;

    public $status = 'pending';
    public $search = '';
    public $paginationTheme = 'tailwind';
    public $statusCounts = [];

    protected $queryString = ['status', 'search' => ['except' => '']];

    public function mount()
    {
        $this->loadStatusCounts();
    }

    public function setStatus($status)
    {
        $this->status = $status;
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
        // Reload counts when search changes to reflect filtered results
        $this->loadStatusCounts();
    }

    public function clearSearch()
    {
        $this->search = '';
        $this->resetPage();
        $this->loadStatusCounts();
    }

    private function loadStatusCounts()
    {
        $baseQuery = Order::with('dataOrder');

        // Apply search filter if exists
        if (!empty($this->search)) {
            $baseQuery = $baseQuery->where(function ($q) {
                $q->where('code', 'like', '%' . $this->search . '%')
                    ->orWhere('id', 'like', '%' . $this->search . '%')
                    ->orWhereHas('dataOrder', function ($dataOrderQuery) {
                        $dataOrderQuery->where('name', 'like', '%' . $this->search . '%');
                    });
            });
        }

        $statuses = ['pending', 'confirmed', 'packing', 'shipping', 'success', 'canceled'];

        foreach ($statuses as $status) {
            $this->statusCounts[$status] = (clone $baseQuery)->where('status', $status)->count();
        }
    }

    public function render()
    {
        $query = Order::with('dataOrder')
            ->where('status', $this->status);

        // Add search functionality
        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('code', 'like', '%' . $this->search . '%')
                    ->orWhere('id', 'like', '%' . $this->search . '%')
                    ->orWhereHas('dataOrder', function ($dataOrderQuery) {
                        $dataOrderQuery->where('name', 'like', '%' . $this->search . '%');
                    });
            });
        }

        $orders = $query->latest()->paginate(10);

        return view('livewire.orders-table', [
            'orders' => $orders
        ]);
    }
}
