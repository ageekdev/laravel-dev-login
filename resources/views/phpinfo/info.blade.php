<!doctype html>
<html lang="en" class="h-full bg-slate-900">

@include('dev-login::partials.head',['title' => 'PHP INFO'])

<body class="bg-slate-900 min-h-full">
<div>
    @include('dev-login::partials.navigation')

    <div class="container mx-auto">
        <div class="bg-[#0A101F]/8">
            <div class="bg-[#0A101F]/80 relative rounded-lg w-5/6 md:w-5/6  lg:w-4/6 xl:w-3/6 mx-auto shadow shadow-cyan-500/50">
                <div class="mt-8 p-2">
                    <div class="bg-gray-900">
                        <div class="mx-auto">
                            <div class="grid grid-cols-1 gap-px bg-white/5 sm:grid-cols-1 lg:grid-cols-2">
                                @include('dev-login::phpinfo.partials.version-card', ['title' => 'PHP', 'version' => $phpinfo->phpVersion()])
                                @include('dev-login::phpinfo.partials.version-card', ['title' => 'Laravel', 'version' => $phpinfo->laravelVersion()])
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-900">
                        <div class="mx-auto my-2">
                            <div class="grid grid-cols-1 gap-px bg-white/5 sm:grid-cols-1 lg:grid-cols-3">
                                @include('dev-login::phpinfo.partials.size-card', ['title' => 'Post Max Size', 'value' => $phpinfo->postMaxSize()['value'], 'metric' => $phpinfo->postMaxSize()['metric']])
                                @include('dev-login::phpinfo.partials.size-card', ['title' => 'Upload Max File Size', 'value' => $phpinfo->uploadMaxFilesize()['value'], 'metric' => $phpinfo->uploadMaxFilesize()['metric']])
                                @include('dev-login::phpinfo.partials.size-card', ['title' => 'Memory Limit', 'value' => $phpinfo->memoryLimit()['value'], 'metric' => $phpinfo->memoryLimit()['metric']])
                            </div>
                        </div>
                    </div>

                    <div class="w-full mt-6">
                        <h3 class="font-medium text-white text-left px-6">Loaded Extensions</h3>
                        <div class="mt-3 w-full flex flex-col items-center overflow-hidden text-sm">
                            @each('dev-login::phpinfo.partials.extension-item',$phpinfo->loadedExtensions(), 'extension')
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>
