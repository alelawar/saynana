<div class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Province -->
        <div>
            <label for="province" class="block text-sm font-semibold mb-2">Provinsi</label>
            <select wire:model.live="provinceId" id="province" class="w-full border rounded px-3 py-2">
                <option value="">Pilih Provinsi</option>
                @foreach($provinces as $province)
                    <option value="{{ $province->id }}">{{ $province->province }}</option>
                @endforeach
            </select>
        </div>

        <!-- City -->
        <div>
            <label for="city" class="block text-sm font-semibold mb-2">Kota</label>
            <select wire:model.live="cityId" id="city" class="w-full border rounded px-3 py-2" {{ empty($cities) ? 'disabled' : '' }} name="cityId">
                <option value="">Pilih Kota</option>
                @foreach($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Total Bayar -->
    <div class="mt-4 space-y-1 text-sm">

        @if($discountAmount > 0)
            <div class="text-green-600">Discount: -Rp {{ number_format($discountAmount, 0, ',', '.') }}</div>
        @endif

        <div>
            Ongkir:
            @if($isFreeShipping)
                <span class="text-green-600">Gratis Ongkir 🎉</span>
            @else
                Rp {{ number_format($shippingCost, 0, ',', '.') }}
            @endif
        </div>

        <div class="font-bold text-lg">
            Total Bayar: Rp {{ number_format($totalPrice, 0, ',', '.') }}
        </div>
        <input type="hidden" value="{{ $totalPrice }}" name="final_price">
    </div>

</div>