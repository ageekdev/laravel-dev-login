<!doctype html>
<html lang="en" class="h-full bg-slate-900">

@include('dev-login::partials.head',['title' => 'PHP INFO'])

<body class="bg-slate-900 min-h-full">
<div>
    @include('dev-login::partials.navigation')

    <div class="container mx-auto">
        <div class="bg-[#0A101F]/8">
            @php
                $phpinfo = new \AgeekDev\DevLogin\PHPInfo();
            @endphp

            <div class="bg-[#0A101F]/80 relative rounded-lg w-5/6 md:w-5/6  lg:w-4/6 xl:w-3/6 mx-auto shadow shadow-cyan-500/50">
                <div class="mt-8 p-2">
                    <div class="bg-gray-900">
                        <div class="mx-auto">
                            <div class="grid grid-cols-1 gap-px bg-white/5 sm:grid-cols-1 lg:grid-cols-2">
                                <div class="bg-gray-900 px-4 py-6 sm:px-6 lg:px-8">
                                    <span class="text-2xl font-medium tracking-tight text-white">PHP</span>
                                    <span class="text-center text-sm text-gray-400 font-medium pl-1">v{{ $phpinfo->PhpVersion() }}</span>
                                </div>
                                <div class="bg-gray-900 px-4 py-6 sm:px-6 lg:px-8">
                                    <span class="text-2xl font-medium tracking-tight text-white">Laravel </span>
                                    <span class="text-center text-sm text-gray-400 font-medium pl-1">v{{ $phpinfo->laravelVersion() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-900">
                        <div class="mx-auto my-2">
                            <div class="grid grid-cols-1 gap-px bg-white/5 sm:grid-cols-1 lg:grid-cols-3">
                                <div class="bg-gray-900 px-4 py-6 sm:px-6 lg:px-8">
                                    <p class="text-sm font-medium leading-6 text-gray-400">Post Max Size</p>
                                    <p class="mt-2 flex items-baseline gap-x-2">
                                        <span class="text-2xl font-medium font-mono tracking-tight text-white">{{ $phpinfo->postMaxSize()['value'] }}</span>
                                        <span class="text-sm font-mono text-gray-400">{{ Str::upper($phpinfo->postMaxSize()['metric'])  }}</span>
                                    </p>
                                </div>
                                <div class="bg-gray-900 px-4 py-6 sm:px-6 lg:px-8">
                                    <p class="text-sm font-medium leading-6 text-gray-400">Upload Max File Size</p>
                                    <p class="mt-2 flex items-baseline gap-x-2">
                                        <span class="text-2xl font-medium font-mono tracking-tight text-white">{{ $phpinfo->uploadMaxFilesize()['value'] }}</span>
                                        <span class="text-sm text-gray-400 font-mono">{{ Str::upper($phpinfo->postMaxSize()['metric'])  }}</span>
                                    </p>
                                </div>
                                <div class="bg-gray-900 px-4 py-6 sm:px-6 lg:px-8">
                                    <p class="text-sm font-medium leading-6 text-gray-400">Memory Limit</p>
                                    <p class="mt-2 flex items-baseline gap-x-2">
                                        <span class="text-2xl font-medium font-mono tracking-tight text-white">{{ $phpinfo->memoryLimit()['value'] }}</span>
                                        <span class="text-sm font-mono text-gray-400">{{ Str::upper($phpinfo->postMaxSize()['metric'])  }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full mt-6">
                        <h3 class="font-medium text-white text-left px-6">Loaded Extensions</h3>
                        <div class="mt-3 w-full flex flex-col items-center overflow-hidden text-sm">
                            @foreach($phpinfo->loadedExtensions() as $extension)
                                <span class="w-full border-t border-white/5 text-gray-300 py-4 pl-6 pr-3 block">
                                    <svg class="h-6 w-6 p-1 inline-block mr-2 fill-sky-300" viewBox="0 0 24 24">
                                        <path d="M6.17071 18C6.58254 16.8348 7.69378 16 9 16C10.3062 16 11.4175 16.8348 11.8293 18H22V20H11.8293C11.4175 21.1652 10.3062 22 9 22C7.69378 22 6.58254 21.1652 6.17071 20H2V18H6.17071ZM12.1707 11C12.5825 9.83481 13.6938 9 15 9C16.3062 9 17.4175 9.83481 17.8293 11H22V13H17.8293C17.4175 14.1652 16.3062 15 15 15C13.6938 15 12.5825 14.1652 12.1707 13H2V11H12.1707ZM6.17071 4C6.58254 2.83481 7.69378 2 9 2C10.3062 2 11.4175 2.83481 11.8293 4H22V6H11.8293C11.4175 7.16519 10.3062 8 9 8C7.69378 8 6.58254 7.16519 6.17071 6H2V4H6.17071ZM9 6C9.55228 6 10 5.55228 10 5C10 4.44772 9.55228 4 9 4C8.44772 4 8 4.44772 8 5C8 5.55228 8.44772 6 9 6ZM15 13C15.5523 13 16 12.5523 16 12C16 11.4477 15.5523 11 15 11C14.4477 11 14 11.4477 14 12C14 12.5523 14.4477 13 15 13ZM9 20C9.55228 20 10 19.5523 10 19C10 18.4477 9.55228 18 9 18C8.44772 18 8 18.4477 8 19C8 19.5523 8.44772 20 9 20Z"></path>
                                    </svg>
                                    {{ Str::title($extension)  }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>
