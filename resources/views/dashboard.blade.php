<!doctype html>
<html lang="en" class="h-full bg-slate-900">

@include('dev-login::partials.head',['title' => 'Dashboard'])

<body class="bg-slate-900 min-h-full">
<div>

    @include('dev-login::partials.navigation')

    <div class="bg-slate-900 px-6 lg:px-8 pb-10">
        <div class="pt-7">

            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-2xl font-bold tracking-tight text-white sm:text-xl">DevUI</h2>
                <p class="text-sm leading-8 text-gray-300">Debug any errors, unexpected behavior or performance issues.</p>
            </div>

            <div class="mx-auto mt-1 pt-4 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-8 sm:mt-3 sm:pt-3 lg:mx-0 lg:max-w-none lg:grid-cols-3">

                    @includeWhen(Route::has('vapor-ui'), 'dev-login::components.default-card',
                        [
                            'url' => route('telescope'),
                            'title' => 'Telescope',
                            'desc' => "Debug your application using telescope debugging and insight UI."
                        ])

                    @includeWhen(Route::has('vapor-ui'), 'dev-login::components.default-card',
                        [
                            'url' => route('vapor-ui'),
                            'title' => 'Vapor UI',
                            'desc' => "A beautiful dashboard accessible via your Vapor application that allows you to view/search your application's logs and failed queue jobs."
                        ])

                    @includeWhen(Route::has('horizon.index'), 'dev-login::components.default-card',
                        [
                            'url' => route('horizon.index'),
                            'title' => 'Horizon',
                            'desc' => "Beautiful UI for monitoring your Redis driven Laravel queues."
                        ])
            </div>
        </div>
    </div>
</div>
</body>
</html>
