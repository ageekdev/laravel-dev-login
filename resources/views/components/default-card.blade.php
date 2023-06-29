<a href="{{ route($defaultApp['route_name']) }}" target="_blank">
    <article class="flex max-w-xl flex-col items-start justify-between">
        <div class="relative rounded-2xl bg-[#0A101F]/80 ring-1 ring-white/10 shadow shadow-cyan-500/50 hover:ring-cyan-300">
            <div class="pl-4 pt-4">
                <div class="flex space-x-2 text-xs">
                    <div class="flex h-6 rounded-full shadow shadow-cyan-500/50 p-px font-medium text-sky-300">
                        <div class="flex items-center rounded-full px-2.5 bg-slate-800">{{ $defaultApp['title'] }}
                            <div class="pl-2">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 mb-4 flex items-start px-1 text-sm w-full">
                    <div class="pr-1 font-mono text-slate-500">
                        @for($i = 1; $i <= 6; $i++)
                            <div>{{ str_pad(0, 2, $i) }}</div>
                        @endfor
                    </div>
                    <p class="px-4 text-white">{{ $defaultApp['desc'] }}</p>
                </div>
            </div>
        </div>
    </article>
</a>
