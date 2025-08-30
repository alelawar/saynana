<div class="">
    <div class="text-center text-5xl flex justify-center gap-2 font-extrabold sour-gummy">
        <h2 class="">
            {{ $heading1 }}
        </h2>
        <p class="text-yellow-400">
            {{ $heading2 }}
        </p>
    </div>

    <div class="mt-4 flex text-sm font-medium justify-between">
        <p class="opacity-65">{{ $action1 }}</p>
        <a href="/{{ $href }}" class="hover:text-yellow-400">
            {{ $action2 }}
        </a>
    </div>
</div>