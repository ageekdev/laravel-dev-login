<!doctype html>
<html lang="en" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        *, :after, :before {
            box-sizing: border-box;
            border: 0 solid #e5e7eb
        }

        :after, :before {
            --tw-content: ""
        }

        html {
            line-height: 1.5;
            -webkit-text-size-adjust: 100%;
            -moz-tab-size: 4;
            -o-tab-size: 4;
            tab-size: 4;
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji
        }

        body {
            margin: 0;
            line-height: inherit
        }

        hr {
            height: 0;
            color: inherit;
            border-top-width: 1px
        }

        abbr:where([title]) {
            -webkit-text-decoration: underline dotted;
            text-decoration: underline dotted
        }

        h1, h2, h3, h4, h5, h6 {
            font-size: inherit;
            font-weight: inherit
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        b, strong {
            font-weight: bolder
        }

        code, kbd, pre, samp {
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, Liberation Mono, Courier New, monospace;
            font-size: 1em
        }

        small {
            font-size: 80%
        }

        sub, sup {
            font-size: 75%;
            line-height: 0;
            position: relative;
            vertical-align: initial
        }

        sub {
            bottom: -.25em
        }

        sup {
            top: -.5em
        }

        table {
            text-indent: 0;
            border-color: inherit;
            border-collapse: collapse
        }

        button, input, optgroup, select, textarea {
            font-family: inherit;
            font-size: 100%;
            line-height: inherit;
            color: inherit;
            margin: 0;
            padding: 0
        }

        button, select {
            text-transform: none
        }

        [type=button], [type=reset], [type=submit], button {
            -webkit-appearance: button;
            background-color: initial;
            background-image: none
        }

        :-moz-focusring {
            outline: auto
        }

        :-moz-ui-invalid {
            box-shadow: none
        }

        progress {
            vertical-align: initial
        }

        ::-webkit-inner-spin-button, ::-webkit-outer-spin-button {
            height: auto
        }

        [type=search] {
            -webkit-appearance: textfield;
            outline-offset: -2px
        }

        ::-webkit-search-decoration {
            -webkit-appearance: none
        }

        ::-webkit-file-upload-button {
            -webkit-appearance: button;
            font: inherit
        }

        summary {
            display: list-item
        }

        blockquote, dd, dl, figure, h1, h2, h3, h4, h5, h6, hr, p, pre {
            margin: 0
        }

        fieldset {
            margin: 0
        }

        fieldset, legend {
            padding: 0
        }

        menu, ol, ul {
            list-style: none;
            margin: 0;
            padding: 0
        }

        textarea {
            resize: vertical
        }

        input::-moz-placeholder, textarea::-moz-placeholder {
            opacity: 1;
            color: #9ca3af
        }

        input:-ms-input-placeholder, textarea:-ms-input-placeholder {
            opacity: 1;
            color: #9ca3af
        }

        input::placeholder, textarea::placeholder {
            opacity: 1;
            color: #9ca3af
        }

        [role=button], button {
            cursor: pointer
        }

        :disabled {
            cursor: default
        }

        audio, canvas, embed, iframe, img, object, svg, video {
            display: block;
            vertical-align: middle
        }

        img, video {
            max-width: 100%;
            height: auto
        }

        [hidden] {
            display: none
        }

        *, :after, :before {
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x: ;
            --tw-pan-y: ;
            --tw-pinch-zoom: ;
            --tw-scroll-snap-strictness: proximity;
            --tw-ordinal: ;
            --tw-slashed-zero: ;
            --tw-numeric-figure: ;
            --tw-numeric-spacing: ;
            --tw-numeric-fraction: ;
            --tw-ring-inset: ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: #3b82f680;
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur: ;
            --tw-brightness: ;
            --tw-contrast: ;
            --tw-grayscale: ;
            --tw-hue-rotate: ;
            --tw-invert: ;
            --tw-saturate: ;
            --tw-sepia: ;
            --tw-drop-shadow: ;
            --tw-backdrop-blur: ;
            --tw-backdrop-brightness: ;
            --tw-backdrop-contrast: ;
            --tw-backdrop-grayscale: ;
            --tw-backdrop-hue-rotate: ;
            --tw-backdrop-invert: ;
            --tw-backdrop-opacity: ;
            --tw-backdrop-saturate: ;
            --tw-backdrop-sepia:
        }

        .relative {
            position: relative
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .mt-8 {
            margin-top: 2rem
        }

        .mt-1 {
            margin-top: .25rem
        }

        .mt-3 {
            margin-top: .75rem
        }

        .mt-10 {
            margin-top: 2.5rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mt-6 {
            margin-top: 1.5rem
        }

        .block {
            display: block
        }

        .flex {
            display: flex
        }

        .h-full {
            height: 100%
        }

        .min-h-full {
            min-height: 100%
        }

        .w-auto {
            width: auto
        }

        .w-full {
            width: 100%
        }

        .transform {
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
        }

        .appearance-none {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none
        }

        .flex-col {
            flex-direction: column
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .space-y-6 > :not([hidden]) ~ :not([hidden]) {
            --tw-space-y-reverse: 0;
            margin-top: calc(1.5rem * (1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(1.5rem * var(--tw-space-y-reverse))
        }

        .rounded-md {
            border-radius: .375rem
        }

        .rounded {
            border-radius: .25rem
        }

        .border {
            border-width: 1px
        }

        .border-gray-300 {
            --tw-border-opacity: 1;
            border-color: rgb(209 213 219/var(--tw-border-opacity))
        }

        .border-red-500 {
            --tw-border-opacity: 1;
            border-color: rgb(239 68 68/var(--tw-border-opacity))
        }

        .border-transparent {
            border-color: #0000
        }

        .bg-gray-50 {
            --tw-bg-opacity: 1;
            background-color: rgb(249 250 251/var(--tw-bg-opacity))
        }

        .bg-white {
            --tw-bg-opacity: 1;
            background-color: rgb(255 255 255/var(--tw-bg-opacity))
        }

        .bg-indigo-600 {
            --tw-bg-opacity: 1;
            background-color: rgb(79 70 229/var(--tw-bg-opacity))
        }

        .bg-gray-200 {
            --tw-bg-opacity: 1;
            background-color: rgb(229 231 235/var(--tw-bg-opacity))
        }

        .bg-indigo-700 {
            --tw-bg-opacity: 1;
            background-color: rgb(67 56 202/var(--tw-bg-opacity))
        }

        .bg-gradient-to-tl {
            background-image: linear-gradient(to top left, var(--tw-gradient-stops))
        }

        .from-indigo-800 {
            --tw-gradient-from: #3730a3;
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, #3730a300)
        }

        .to-violet-600 {
            --tw-gradient-to: #7c3aed
        }

        .p-10 {
            padding: 2.5rem
        }

        .py-12 {
            padding-top: 3rem;
            padding-bottom: 3rem
        }

        .py-8 {
            padding-top: 2rem;
            padding-bottom: 2rem
        }

        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem
        }

        .px-3 {
            padding-left: .75rem;
            padding-right: .75rem
        }

        .py-2 {
            padding-top: .5rem;
            padding-bottom: .5rem
        }

        .py-16 {
            padding-top: 4rem;
            padding-bottom: 4rem
        }

        .py-3 {
            padding-top: .75rem;
            padding-bottom: .75rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .pb-2 {
            padding-bottom: .5rem
        }

        .pt-3 {
            padding-top: .75rem
        }

        .pb-5 {
            padding-bottom: 1.25rem
        }

        .pl-3 {
            padding-left: .75rem
        }

        .text-2xl {
            font-size: 1.5rem;
            line-height: 2rem
        }

        .text-sm {
            font-size: .875rem;
            line-height: 1.25rem
        }

        .text-xs {
            font-size: .75rem;
            line-height: 1rem
        }

        .font-extrabold {
            font-weight: 800
        }

        .font-medium {
            font-weight: 500
        }

        .font-semibold {
            font-weight: 600
        }

        .leading-6 {
            line-height: 1.5rem
        }

        .leading-none {
            line-height: 1
        }

        .tracking-wide {
            letter-spacing: .025em
        }

        .text-gray-800 {
            --tw-text-opacity: 1;
            color: rgb(31 41 55/var(--tw-text-opacity))
        }

        .text-gray-700 {
            --tw-text-opacity: 1;
            color: rgb(55 65 81/var(--tw-text-opacity))
        }

        .text-red-500 {
            --tw-text-opacity: 1;
            color: rgb(239 68 68/var(--tw-text-opacity))
        }

        .text-white {
            --tw-text-opacity: 1;
            color: rgb(255 255 255/var(--tw-text-opacity))
        }

        .placeholder-gray-400::-moz-placeholder {
            --tw-placeholder-opacity: 1;
            color: rgb(156 163 175/var(--tw-placeholder-opacity))
        }

        .placeholder-gray-400:-ms-input-placeholder {
            --tw-placeholder-opacity: 1;
            color: rgb(156 163 175/var(--tw-placeholder-opacity))
        }

        .placeholder-gray-400::placeholder {
            --tw-placeholder-opacity: 1;
            color: rgb(156 163 175/var(--tw-placeholder-opacity))
        }

        .shadow {
            --tw-shadow: 0 1px 3px 0 #0000001a, 0 1px 2px -1px #0000001a;
            --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color)
        }

        .shadow, .shadow-sm {
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
        }

        .shadow-sm {
            --tw-shadow: 0 1px 2px 0 #0000000d;
            --tw-shadow-colored: 0 1px 2px 0 var(--tw-shadow-color)
        }

        .hover\:bg-indigo-700:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(67 56 202/var(--tw-bg-opacity))
        }

        .hover\:bg-indigo-600:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(79 70 229/var(--tw-bg-opacity))
        }

        .focus\:border-indigo-500:focus {
            --tw-border-opacity: 1;
            border-color: rgb(99 102 241/var(--tw-border-opacity))
        }

        .focus\:outline-none:focus {
            outline: 2px solid #0000;
            outline-offset: 2px
        }

        .focus\:ring-2:focus {
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)
        }

        .focus\:ring-indigo-500:focus {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(99 102 241/var(--tw-ring-opacity))
        }

        .focus\:ring-indigo-700:focus {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(67 56 202/var(--tw-ring-opacity))
        }

        .focus\:ring-offset-2:focus {
            --tw-ring-offset-width: 2px
        }

        @media (min-width: 640px) {
            .sm\:mx-auto {
                margin-left: auto;
                margin-right: auto
            }

            .sm\:w-full {
                width: 100%
            }

            .sm\:max-w-md {
                max-width: 28rem
            }

            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:px-10 {
                padding-left: 2.5rem;
                padding-right: 2.5rem
            }

            .sm\:text-sm {
                font-size: .875rem;
                line-height: 1.25rem
            }
        }

        @media (min-width: 768px) {
            .md\:w-1\/2 {
                width: 50%
            }
        }

        @media (min-width: 1024px) {
            .lg\:w-1\/3 {
                width: 33.333333%
            }

            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }
    </style>
    <title>Login</title>
</head>
<body class="h-full">
<div
    class="min-h-full flex flex-col justify-center py-12 sm:px-6 lg:px-8 bg-gradient-to-tl from-indigo-800 to-violet-600">
    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
            <form class="space-y-6" method="POST" action="{{ route('login') }}">
                @csrf
                <svg class="mx-auto w-auto" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" width="94px" height="36px" viewBox="0 0 94 36">
                    <defs>
                        <polygon id="path-1"
                                 points="0.122776591 0.281012608 11.6750106 0.281012608 11.6750106 13.3700449 0.122776591 13.3700449 0.122776591 0.281012608"/>
                    </defs>
                    <g id="Loan/Financing" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Financing_Version1" transform="translate(-60.000000, -14.000000)">
                            <g id="menu/nav-light">
                                <g id="logo/main" transform="translate(60.000000, 14.000000)">
                                    <g id="Logo_headergenie">
                                        <g id="Group-3" transform="translate(62.000000, 0.000000)">
                                            <path
                                                d="M7.22913031,10.0574312 L16.8678025,15.4497354 C17.2813751,14.4068227 17.5372161,13.3372011 17.5564593,12.2720311 L9.42854192,7.72486772 L7.22913031,10.0574312 Z"
                                                id="Fill-1" fill="#25439B"/>
                                            <g id="Group-5">
                                                <mask id="mask-2" fill="white">
                                                    <use xlink:href="#path-1"/>
                                                </mask>
                                                <g id="Clip-4"/>
                                                <path
                                                    d="M8.54220135,0.280955083 C6.74757673,1.53731442 0.122776591,6.50896533 0.122776591,11.4190638 C0.122776591,12.0699661 0.234800199,12.7231694 0.433168651,13.3700449 L11.6750106,2.769513 C10.3682825,1.59829157 9.1645904,0.716423956 8.54220135,0.280955083"
                                                    id="Fill-3" fill="#25439B" mask="url(#mask-2)"/>
                                            </g>
                                            <path
                                                d="M9.81096257,6.15501025 L16.5237264,9.65608466 C16.0126207,7.36468947 14.3283019,5.14097262 12.6176562,3.37962963 L9.81096257,6.15501025 Z"
                                                id="Fill-6" fill="#25439B"/>
                                        </g>
                                        <path
                                            d="M14.2090917,8 C17.4024879,8 20.1649686,8.90089617 22.174737,10.0643497 L22.174737,16.0698142 C19.98564,14.4932459 17.1511937,13.3674317 14.3164549,13.3674317 C9.07789267,13.3674317 5.70516783,17.2332678 5.70516783,22.0752787 C5.70516783,26.8040656 8.93454675,30.7828197 14.2804721,30.7828197 C15.4643925,30.7828197 16.6132077,30.5575956 17.4741608,30.1824262 L17.4741608,26.0910601 L12.9529133,26.0910601 L12.9529133,21.1367432 L23,21.1367432 L23,33.7480656 C20.667557,35.0991038 17.4024879,36 14.173109,36 C5.84851376,36 0,30.1071475 0,22.112612 C0,14.0804372 5.92047926,8 14.2090917,8"
                                            id="Fill-8" fill="#25439B"/>
                                        <path
                                            d="M32.0122048,27.9785547 C32.6676589,30.4920373 34.8256929,31.6381733 37.5235496,31.6381733 C39.6432493,31.6381733 41.9558775,30.935664 43.9593173,29.6421547 L43.9593173,34.3367014 C42.1098432,35.4454667 39.2580208,36 36.7527783,36 C30.5093107,36 26,32.266544 26,26.5738373 C26,20.7705253 30.701925,17 35.9433585,17 C40.6069491,17 45,19.9571093 45,26.0563733 C45,26.684744 44.9616657,27.4978586 44.8846828,27.9785547 L32.0122048,27.9785547 Z M31.9735563,24.4298426 L39.6046008,24.4298426 C39.2580208,22.4708933 37.7544982,21.2879893 35.8663756,21.2879893 C34.0546074,21.2879893 32.4750447,22.3599867 31.9735563,24.4298426 Z"
                                            id="Fill-10" fill="#25439B"/>
                                        <path
                                            d="M81.0121054,27.9785547 C81.6672345,30.4920373 83.825547,31.6381733 86.5233591,31.6381733 C88.6430237,31.6381733 90.9556136,30.935664 92.9593345,29.6421547 L92.9593345,34.3367014 C91.1092626,35.4454667 88.2578015,36 85.7526005,36 C79.5092361,36 75,32.266544 75,26.5738373 C75,20.7705253 79.7018472,17 84.9435082,17 C89.6070218,17 94,19.9571093 94,26.0563733 C94,26.684744 93.9613521,27.4978586 93.8843705,27.9785547 L81.0121054,27.9785547 Z M80.9737717,24.4298426 L88.6043758,24.4298426 C88.2578015,22.4708933 86.7546181,21.2879893 84.8665267,21.2879893 C83.0547884,21.2879893 81.4749376,22.3599867 80.9737717,24.4298426 Z"
                                            id="Fill-12" fill="#25439B"/>
                                        <path
                                            d="M70.8017593,21.9599152 C69.7786956,21.9599152 68.8216048,21.6975969 68,21.2420234 L68,36 L74,36 L74,21 C73.0966531,21.6036955 71.9934563,21.9599152 70.8017593,21.9599152"
                                            id="Fill-14" fill="#25439B"/>
                                        <path
                                            d="M63.1104412,19.7006966 C62.6557961,18.8893968 62.0139764,18.2724516 61.3228282,17.8396967 C60.8807893,17.5683394 60.396547,17.3585842 59.879419,17.2165914 L59.879419,17.2088911 C59.7399287,17.1719298 59.6020828,17.1414368 59.4675253,17.118644 C58.3400932,16.9279854 57.3927103,16.9350697 56.0422033,17.3792209 C54.9632776,17.8415448 53.9909564,18.5567453 53.2839134,19.1613701 C53.1594958,19.2685578 52.8816114,19.5565477 52.695533,19.7521344 C52.3820225,20.1300633 51.7234859,20.8310954 50.9980817,21.0439307 C49.2880241,21.6534836 48,20.8652846 48,20.8652846 L48,21.2752466 L48,36 L53.109071,36 L53.109071,23.4950788 C54.0167169,22.7019516 55.2603453,21.9464017 56.5713894,21.9464017 C57.2770622,21.9464017 57.8821595,22.1730975 58.3192656,22.7395289 C58.7226637,23.2686911 58.890655,23.9484704 58.890655,25.3462224 L58.890655,36 L64,36 L64,24.401862 C64,22.277513 63.7254042,20.8172349 63.1104412,19.7006966 M50.0649493,20.8521549 C49.9619074,20.853079 49.8654426,20.8509229 49.7736366,20.8459947 L50.2263634,20.8459947 C50.17265,20.8490748 50.1186626,20.8515389 50.0649493,20.8521549"
                                            id="Fill-16" fill="#25439B"/>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
                <p tabindex="0" class="focus:outline-none text-2xl font-extrabold leading-6 text-gray-800 pb-2 pt-3">
                    Login to your account</p>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700"> Email Address </label>
                    <div class="mt-1">
                        <input id="email" value="genie-dev@geniefintech.com" name="email" type="email" autocomplete="email"
                               required
                               class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" style="color: red">
        <strong>{{ $errors->first('email') }}</strong>
    </span>
                    @endif
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700"> Password </label>
                    <div class="mt-1">
                        <input id="password" value="6R0XMNEU" name="password" type="password"
                               autocomplete="current-password" required
                               class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" style="color: red">
        <strong>{{ $errors->first('password') }}</strong>
    </span>
                @endif

                <div>
                    <button type="submit"
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Sign in
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
