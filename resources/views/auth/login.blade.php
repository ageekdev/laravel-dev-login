<!doctype html>
<html lang="en" class="h-full bg-slate-900">

@include('dev-login::partials.head',['title' => 'Login'])

<body class="h-full">
<div class="h-full bg-slate-900 w-full py-16 px-4">
    <div class="flex flex-col items-center justify-center">
        <div class="absolute inset-y-0 left-0 flex items-start">
            <div class="rounded-full shadow-[-150px_0_300px_200px_rgba(6,182,212,.5)]"></div>
        </div>
        <div class="absolute inset-y-0 right-0 flex items-center">
            <div class="rounded-full shadow-[150px_0_200px_200px_rgba(6,182,212,.5)]"></div>
        </div>

        <div class="relative lg:w-1/3 md:w-1/2 w-full">
            <div class="absolute inset-2 top-12 bg-gradient-to-r from-slate-800 to-slate-900 shadow-lg transform skew-y-0 -rotate-6 rounded-3xl ring-2 ring-white/10"></div>
            <div class="relative rounded-2xl bg-[#0A101F] ring-1 ring-white/10 backdrop-blur p-5 mt-16">
                <div class="absolute -top-px left-20 right-11 h-px bg-gradient-to-r from-sky-300/0 via-sky-300/70 to-sky-300/0"></div>
                <div class="md:px-6 px-2 py-6 pt-4 shadow-amber-600 border-red-500">
                    <p class="text-white bg-clip-text font-display text-2xl tracking-tight">Dev Login</p>
                    <h1 class="animate-text bg-gradient-to-r from-teal-500 via-purple-500 to-orange-500 bg-clip-text text-transparent text-2xl font-black">Welcome to Dev</h1>
                    <form method="POST" action="{{ route('dev-login.login') }}">
                        @csrf
                        <div class="mt-6 w-full">
                            <label for="email" class="text-sm font-medium leading-none text-white">
                                Email
                            </label>
                            <input id="email" name="email" type="email" placeholder="Enter your email" class="py-3 w-full pl-3 mt-2 text-white rounded-lg text-sm bg-slate-800/75 ring-inset ring-white/5 md:hover:bg-slate-700/40 md:hover:ring-slate-500"/>
                            @if ($errors->has('email'))
                                <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="mt-6 w-full">
                            <label for="password" class="text-sm font-medium leading-none text-white">
                                Password
                            </label>
                            <div class="flex items-center justify-center">
                                <input id="password" name="password" type="password" placeholder="Enter your password" class="py-3 w-full pl-3 mt-2 text-white rounded-lg text-sm bg-slate-800/75 ring-inset ring-white/5 md:hover:bg-slate-700/40 md:hover:ring-slate-500"/>
                            </div>
                            @if ($errors->has('password'))
                                <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="mt-8">
                            <button type="submit" class="rounded-lg text-md font-medium py-2 w-full bg-cyan-400/10 text-cyan-400 ring-1 ring-inset ring-emerald-400/20 hover:bg-cyan-400/10 hover:text-cyan-300 hover:ring-cyan-300">Sign In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
