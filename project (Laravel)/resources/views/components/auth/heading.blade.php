<div>
    <div class="text-center text-5xl flex justify-center gap-2 font-extrabold sour-gummy">
        <h2 class="">
            {{ $heading1 }}
        </h2>
        <p class="text-yellow-400">
            {{ $heading2 }}
        </p>
    </div>

    <div class="mt-4 flex justify-center text-sm font-medium">
        <p class="opacity-65">{{ $action1 }}</p>
        <a href="/{{ $href }}" class="hover:text-yellow-400">
            {{ $action2 }}
        </a>
    </div>
</div>