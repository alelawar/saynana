<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Province;
use App\Models\City;

class LocationSelector extends Component
{
    public $provinceId;
    public $cityId;
    public $provinces = [];
    public $cities = [];

    public $basePrice;      // harga barang sebelum ongkir
    public $discountAmount;  // ini variable baru gw udah buat
    public $shippingCost = 0;
    public $totalPrice = 0;

    public $isFreeShipping = false;


    public function mount($basePrice)
    {
        $this->basePrice = $basePrice;
        $this->totalPrice = $basePrice;
        $this->provinces = Province::all();
    }

    public function updatedProvinceId($provinceId)
    {
        $this->cities = City::where('province_id', $provinceId)->get();
        $this->cityId = null;
        $this->shippingCost = 0;
        $this->totalPrice = $this->basePrice;
    }

    public function updatedCityId($cityId)
    {

        if ($cityId) {
            $city = City::find($cityId);
            if ($city) {
                $this->shippingCost = $city->shipping_cost;
                $this->isFreeShipping = $this->shippingCost == 0;
            } else {
                $this->shippingCost = 0;
                $this->isFreeShipping = false;
            }
        } else {
            $this->shippingCost = 0;
            $this->isFreeShipping = false;
        }

        $this->totalPrice = $this->basePrice + $this->shippingCost;
    }

    public function render()
    {
        return view('livewire.location-selector');
    }
}
