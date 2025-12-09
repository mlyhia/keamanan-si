<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Mlyhia Anime') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        
        <!-- Google Fonts untuk tema anime -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Orbitron:wght@400;500;700&display=swap" rel="stylesheet">

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */
                @layer theme {
                    :root, :host {
                        --font-sans: 'Poppins', 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
                        --font-anime: 'Orbitron', sans-serif;
                        --color-purple-50: oklch(.977 .014 308.299);
                        --color-purple-100: oklch(.946 .033 307.174);
                        --color-purple-200: oklch(.902 .063 306.703);
                        --color-purple-300: oklch(.827 .119 306.383);
                        --color-purple-400: oklch(.714 .203 305.504);
                        --color-purple-500: oklch(.627 .265 303.9);
                        --color-purple-600: oklch(.558 .288 302.321);
                        --color-purple-700: oklch(.496 .265 301.924);
                        --color-purple-800: oklch(.438 .218 303.724);
                        --color-purple-900: oklch(.381 .176 304.987);
                        --color-purple-950: oklch(.291 .149 302.717);
                        --color-indigo-50: oklch(.962 .018 272.314);
                        --color-indigo-100: oklch(.93 .034 272.788);
                        --color-indigo-200: oklch(.87 .065 274.039);
                        --color-indigo-300: oklch(.785 .115 274.713);
                        --color-indigo-400: oklch(.673 .182 276.935);
                        --color-indigo-500: oklch(.585 .233 277.117);
                        --color-indigo-600: oklch(.511 .262 276.966);
                        --color-indigo-700: oklch(.457 .24 277.023);
                        --color-indigo-800: oklch(.398 .195 277.366);
                        --color-indigo-900: oklch(.359 .144 278.697);
                        --color-indigo-950: oklch(.257 .09 281.288);
                        --color-violet-50: oklch(.969 .016 293.756);
                        --color-violet-100: oklch(.943 .029 294.588);
                        --color-violet-200: oklch(.894 .057 293.283);
                        --color-violet-300: oklch(.811 .111 293.571);
                        --color-violet-400: oklch(.702 .183 293.541);
                        --color-violet-500: oklch(.606 .25 292.717);
                        --color-violet-600: oklch(.541 .281 293.009);
                        --color-violet-700: oklch(.491 .27 292.581);
                        --color-violet-800: oklch(.432 .232 292.759);
                        --color-violet-900: oklch(.38 .189 293.745);
                        --color-violet-950: oklch(.283 .141 291.089);
                        --color-black: #000;
                        --color-white: #fff;
                        --color-dark-900: #0a0a0f;
                        --color-dark-800: #12121a;
                        --color-dark-700: #1a1a24;
                        --color-dark-600: #22222e;
                        --spacing: .25rem;
                        --breakpoint-sm: 40rem;
                        --breakpoint-md: 48rem;
                        --breakpoint-lg: 64rem;
                        --breakpoint-xl: 80rem;
                        --breakpoint-2xl: 96rem;
                        --container-3xs: 16rem;
                        --container-2xs: 18rem;
                        --container-xs: 20rem;
                        --container-sm: 24rem;
                        --container-md: 28rem;
                        --container-lg: 32rem;
                        --container-xl: 36rem;
                        --container-2xl: 42rem;
                        --container-3xl: 48rem;
                        --container-4xl: 56rem;
                        --container-5xl: 64rem;
                        --container-6xl: 72rem;
                        --container-7xl: 80rem;
                        --text-xs: .75rem;
                        --text-xs--line-height: calc(1 / .75);
                        --text-sm: .875rem;
                        --text-sm--line-height: calc(1.25 / .875);
                        --text-base: 1rem;
                        --text-base--line-height: 1.5;
                        --text-lg: 1.125rem;
                        --text-lg--line-height: calc(1.75 / 1.125);
                        --text-xl: 1.25rem;
                        --text-xl--line-height: calc(1.75 / 1.25);
                        --text-2xl: 1.5rem;
                        --text-2xl--line-height: calc(2 / 1.5);
                        --text-3xl: 1.875rem;
                        --text-3xl--line-height: 1.2;
                        --text-4xl: 2.25rem;
                        --text-4xl--line-height: calc(2.5 / 2.25);
                        --text-5xl: 3rem;
                        --text-5xl--line-height: 1;
                        --text-6xl: 3.75rem;
                        --text-6xl--line-height: 1;
                        --text-7xl: 4.5rem;
                        --text-7xl--line-height: 1;
                        --text-8xl: 6rem;
                        --text-8xl--line-height: 1;
                        --text-9xl: 8rem;
                        --text-9xl--line-height: 1;
                        --font-weight-thin: 100;
                        --font-weight-extralight: 200;
                        --font-weight-light: 300;
                        --font-weight-normal: 400;
                        --font-weight-medium: 500;
                        --font-weight-semibold: 600;
                        --font-weight-bold: 700;
                        --font-weight-extrabold: 800;
                        --font-weight-black: 900;
                        --tracking-tighter: -.05em;
                        --tracking-tight: -.025em;
                        --tracking-normal: 0em;
                        --tracking-wide: .025em;
                        --tracking-wider: .05em;
                        --tracking-widest: .1em;
                        --leading-tight: 1.25;
                        --leading-snug: 1.375;
                        --leading-normal: 1.5;
                        --leading-relaxed: 1.625;
                        --leading-loose: 2;
                        --radius-xs: .125rem;
                        --radius-sm: .25rem;
                        --radius-md: .375rem;
                        --radius-lg: .5rem;
                        --radius-xl: .75rem;
                        --radius-2xl: 1rem;
                        --radius-3xl: 1.5rem;
                        --radius-4xl: 2rem;
                        --shadow-2xs: 0 1px #0000000d;
                        --shadow-xs: 0 1px 2px 0 #0000000d;
                        --shadow-sm: 0 1px 3px 0 #0000001a, 0 1px 2px -1px #0000001a;
                        --shadow-md: 0 4px 6px -1px #0000001a, 0 2px 4px -2px #0000001a;
                        --shadow-lg: 0 10px 15px -3px #0000001a, 0 4px 6px -4px #0000001a;
                        --shadow-xl: 0 20px 25px -5px #0000001a, 0 8px 10px -6px #0000001a;
                        --shadow-2xl: 0 25px 50px -12px #00000040;
                        --inset-shadow-2xs: inset 0 1px #0000000d;
                        --inset-shadow-xs: inset 0 1px 1px #0000000d;
                        --inset-shadow-sm: inset 0 2px 4px #0000000d;
                        --drop-shadow-xs: 0 1px 1px #0000000d;
                        --drop-shadow-sm: 0 1px 2px #00000026;
                        --drop-shadow-md: 0 3px 3px #0000001f;
                        --drop-shadow-lg: 0 4px 4px #00000026;
                        --drop-shadow-xl: 0 9px 7px #0000001a;
                        --drop-shadow-2xl: 0 25px 25px #00000026;
                        --ease-in: cubic-bezier(.4, 0, 1, 1);
                        --ease-out: cubic-bezier(0, 0, .2, 1);
                        --ease-in-out: cubic-bezier(.4, 0, .2, 1);
                        --animate-spin: spin 1s linear infinite;
                        --animate-ping: ping 1s cubic-bezier(0, 0, .2, 1) infinite;
                        --animate-pulse: pulse 2s cubic-bezier(.4, 0, .6, 1) infinite;
                        --animate-bounce: bounce 1s infinite;
                        --blur-xs: 4px;
                        --blur-sm: 8px;
                        --blur-md: 12px;
                        --blur-lg: 16px;
                        --blur-xl: 24px;
                        --blur-2xl: 40px;
                        --blur-3xl: 64px;
                        --perspective-dramatic: 100px;
                        --perspective-near: 300px;
                        --perspective-normal: 500px;
                        --perspective-midrange: 800px;
                        --perspective-distant: 1200px;
                        --aspect-video: 16 / 9;
                        --default-transition-duration: .15s;
                        --default-transition-timing-function: cubic-bezier(.4, 0, .2, 1);
                        --default-font-family: var(--font-sans);
                        --default-font-feature-settings: var(--font-sans--font-feature-settings);
                        --default-font-variation-settings: var(--font-sans--font-variation-settings);
                        --default-mono-font-family: var(--font-mono);
                        --default-mono-font-feature-settings: var(--font-mono--font-feature-settings);
                        --default-mono-font-variation-settings: var(--font-mono--font-variation-settings)
                    }
                }

                @layer base {
                    *,
                    :after,
                    :before,
                    ::backdrop {
                        box-sizing: border-box;
                        border: 0 solid;
                        margin: 0;
                        padding: 0
                    }

                    ::file-selector-button {
                        box-sizing: border-box;
                        border: 0 solid;
                        margin: 0;
                        padding: 0
                    }

                    html,
                    :host {
                        -webkit-text-size-adjust: 100%;
                        -moz-tab-size: 4;
                        tab-size: 4;
                        line-height: 1.5;
                        font-family: var(--default-font-family, 'Poppins', sans-serif);
                        font-feature-settings: var(--default-font-feature-settings, normal);
                        font-variation-settings: var(--default-font-variation-settings, normal);
                        -webkit-tap-highlight-color: transparent
                    }

                    body {
                        line-height: inherit;
                        background: linear-gradient(135deg, #0a0a0f 0%, #1a1a24 100%);
                        color: #fff;
                        min-height: 100vh;
                        overflow-x: hidden;
                    }

                    /* Custom Scrollbar */
                    ::-webkit-scrollbar {
                        width: 8px;
                    }

                    ::-webkit-scrollbar-track {
                        background: rgba(0, 0, 0, 0.2);
                    }

                    ::-webkit-scrollbar-thumb {
                        background: linear-gradient(to bottom, #8b5cf6, #6d28d9);
                        border-radius: 4px;
                    }

                    ::-webkit-scrollbar-thumb:hover {
                        background: linear-gradient(to bottom, #a78bfa, #8b5cf6);
                    }

                    h1, h2, h3, h4, h5, h6 {
                        font-family: var(--font-anime, 'Orbitron', sans-serif);
                        font-weight: 700;
                        letter-spacing: 0.5px;
                    }

                    /* ... (rest of the base styles remain similar) ... */
                }

                /* Custom Anime Theme Classes */
                .anime-gradient-bg {
                    background: linear-gradient(135deg, #0a0a0f 0%, #1a1a24 30%, #2d1b69 70%, #8b5cf6 100%);
                }

                .anime-card-gradient {
                    background: linear-gradient(145deg, rgba(26, 26, 36, 0.9) 0%, rgba(45, 27, 105, 0.8) 100%);
                    backdrop-filter: blur(10px);
                    border: 1px solid rgba(139, 92, 246, 0.3);
                }

                .anime-text-gradient {
                    background: linear-gradient(135deg, #a78bfa 0%, #8b5cf6 50%, #6d28d9 100%);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;
                    background-clip: text;
                }

                .anime-glow {
                    animation: anime-glow 2s ease-in-out infinite alternate;
                }

                @keyframes anime-glow {
                    from {
                        box-shadow: 0 0 10px rgba(139, 92, 246, 0.5),
                                    0 0 20px rgba(139, 92, 246, 0.3),
                                    0 0 30px rgba(139, 92, 246, 0.1);
                    }
                    to {
                        box-shadow: 0 0 15px rgba(139, 92, 246, 0.8),
                                    0 0 25px rgba(139, 92, 246, 0.5),
                                    0 0 35px rgba(139, 92, 246, 0.3);
                    }
                }

                @keyframes float-anime {
                    0%, 100% { transform: translateY(0px) rotate(0deg); }
                    50% { transform: translateY(-20px) rotate(5deg); }
                }

                @keyframes sparkle {
                    0%, 100% { opacity: 0.3; }
                    50% { opacity: 1; }
                }

                .float-anime {
                    animation: float-anime 6s ease-in-out infinite;
                }

                .sparkle {
                    animation: sparkle 2s ease-in-out infinite;
                }

                /* Responsive Adjustments */
                @media (max-width: 768px) {
                    .mobile-stack {
                        flex-direction: column !important;
                    }
                    
                    .mobile-full {
                        width: 100% !important;
                        max-width: 100% !important;
                    }
                    
                    .mobile-text-center {
                        text-align: center !important;
                    }
                    
                    .mobile-p-4 {
                        padding: 1rem !important;
                    }
                    
                    .mobile-mb-4 {
                        margin-bottom: 1rem !important;
                    }
                }

                /* Mobile-first responsive utilities */
                .container-mobile {
                    width: 100%;
                    padding-left: 1rem;
                    padding-right: 1rem;
                    margin-left: auto;
                    margin-right: auto;
                }

                @media (min-width: 640px) {
                    .container-mobile {
                        max-width: 640px;
                    }
                }

                @media (min-width: 768px) {
                    .container-mobile {
                        max-width: 768px;
                    }
                }

                @media (min-width: 1024px) {
                    .container-mobile {
                        max-width: 1024px;
                    }
                }

                @media (min-width: 1280px) {
                    .container-mobile {
                        max-width: 1280px;
                    }
                }

                /* Existing utility classes... */
                .absolute { position: absolute }
                .relative { position: relative }
                .fixed { position: fixed }
                .inset-0 { inset: 0 }
                .top-0 { top: 0 }
                .bottom-0 { bottom: 0 }
                .left-0 { left: 0 }
                .right-0 { right: 0 }
                .z-10 { z-index: 10 }
                .z-20 { z-index: 20 }
                .z-30 { z-index: 30 }
                .flex { display: flex }
                .hidden { display: none }
                .grid { display: grid }
                .block { display: block }
                .inline-block { display: inline-block }
                .inline-flex { display: inline-flex }
                .flex-col { flex-direction: column }
                .flex-row { flex-direction: row }
                .flex-wrap { flex-wrap: wrap }
                .items-center { align-items: center }
                .items-start { align-items: flex-start }
                .items-end { align-items: flex-end }
                .justify-center { justify-content: center }
                .justify-between { justify-content: space-between }
                .justify-end { justify-content: flex-end }
                .justify-start { justify-content: flex-start }
                .w-full { width: 100% }
                .w-screen { width: 100vw }
                .h-full { height: 100% }
                .h-screen { height: 100vh }
                .min-h-screen { min-height: 100vh }
                .max-w-full { max-width: 100% }
                .p-0 { padding: 0 }
                .p-2 { padding: 0.5rem }
                .p-4 { padding: 1rem }
                .p-6 { padding: 1.5rem }
                .p-8 { padding: 2rem }
                .px-2 { padding-left: 0.5rem; padding-right: 0.5rem }
                .px-4 { padding-left: 1rem; padding-right: 1rem }
                .px-6 { padding-left: 1.5rem; padding-right: 1.5rem }
                .py-2 { padding-top: 0.5rem; padding-bottom: 0.5rem }
                .py-4 { padding-top: 1rem; padding-bottom: 1rem }
                .py-6 { padding-top: 1.5rem; padding-bottom: 1.5rem }
                .m-0 { margin: 0 }
                .m-4 { margin: 1rem }
                .mt-2 { margin-top: 0.5rem }
                .mt-4 { margin-top: 1rem }
                .mt-6 { margin-top: 1.5rem }
                .mt-8 { margin-top: 2rem }
                .mb-2 { margin-bottom: 0.5rem }
                .mb-4 { margin-bottom: 1rem }
                .mb-6 { margin-bottom: 1.5rem }
                .mb-8 { margin-bottom: 2rem }
                .ml-2 { margin-left: 0.5rem }
                .ml-4 { margin-left: 1rem }
                .mr-2 { margin-right: 0.5rem }
                .mr-4 { margin-right: 1rem }
                .gap-2 { gap: 0.5rem }
                .gap-4 { gap: 1rem }
                .gap-6 { gap: 1.5rem }
                .gap-8 { gap: 2rem }
                .rounded { border-radius: 0.25rem }
                .rounded-lg { border-radius: 0.5rem }
                .rounded-xl { border-radius: 0.75rem }
                .rounded-2xl { border-radius: 1rem }
                .rounded-full { border-radius: 9999px }
                .border { border-width: 1px }
                .border-2 { border-width: 2px }
                .border-purple-500 { border-color: #8b5cf6 }
                .border-purple-600 { border-color: #7c3aed }
                .border-purple-300 { border-color: #c4b5fd }
                .border-transparent { border-color: transparent }
                .bg-black { background-color: #000 }
                .bg-purple-900 { background-color: #4c1d95 }
                .bg-purple-800 { background-color: #5b21b6 }
                .bg-purple-700 { background-color: #6d28d9 }
                .bg-purple-600 { background-color: #7c3aed }
                .bg-purple-500 { background-color: #8b5cf6 }
                .bg-purple-400 { background-color: #a78bfa }
                .bg-purple-300 { background-color: #c4b5fd }
                .bg-opacity-50 { background-color: rgba(0,0,0,0.5) }
                .bg-opacity-80 { background-color: rgba(0,0,0,0.8) }
                .text-white { color: white }
                .text-purple-300 { color: #c4b5fd }
                .text-purple-400 { color: #a78bfa }
                .text-purple-500 { color: #8b5cf6 }
                .text-purple-600 { color: #7c3aed }
                .text-gray-300 { color: #d1d5db }
                .text-gray-400 { color: #9ca3af }
                .text-gray-500 { color: #6b7280 }
                .text-sm { font-size: 0.875rem }
                .text-base { font-size: 1rem }
                .text-lg { font-size: 1.125rem }
                .text-xl { font-size: 1.25rem }
                .text-2xl { font-size: 1.5rem }
                .text-3xl { font-size: 1.875rem }
                .text-4xl { font-size: 2.25rem }
                .font-light { font-weight: 300 }
                .font-normal { font-weight: 400 }
                .font-medium { font-weight: 500 }
                .font-semibold { font-weight: 600 }
                .font-bold { font-weight: 700 }
                .font-extrabold { font-weight: 800 }
                .text-center { text-align: center }
                .text-left { text-align: left }
                .text-right { text-align: right }
                .leading-tight { line-height: 1.25 }
                .leading-normal { line-height: 1.5 }
                .leading-relaxed { line-height: 1.625 }
                .shadow-sm { box-shadow: 0 1px 2px 0 rgba(0,0,0,0.05) }
                .shadow-md { box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06) }
                .shadow-lg { box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -2px rgba(0,0,0,0.05) }
                .shadow-xl { box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04) }
                .shadow-2xl { box-shadow: 0 25px 50px -12px rgba(0,0,0,0.25) }
                .backdrop-blur-sm { backdrop-filter: blur(4px) }
                .backdrop-blur-md { backdrop-filter: blur(12px) }
                .backdrop-blur-lg { backdrop-filter: blur(16px) }
                .overflow-hidden { overflow: hidden }
                .overflow-y-auto { overflow-y: auto }
                .transition-all { transition: all 0.3s ease }
                .transition-transform { transition: transform 0.3s ease }
                .duration-300 { transition-duration: 0.3s }
                .duration-500 { transition-duration: 0.5s }
                .cursor-pointer { cursor: pointer }
                .hover\:scale-105:hover { transform: scale(1.05) }
                .hover\:scale-110:hover { transform: scale(1.1) }
                .hover\:bg-purple-700:hover { background-color: #6d28d9 }
                .hover\:bg-purple-600:hover { background-color: #7c3aed }
                .hover\:shadow-2xl:hover { box-shadow: 0 25px 50px -12px rgba(139, 92, 246, 0.25) }
                .hover\:text-purple-300:hover { color: #c4b5fd }
                .hover\:border-purple-400:hover { border-color: #a78bfa }
                .focus\:outline-none:focus { outline: none }
                .focus\:ring-2:focus { ring-width: 2px }
                .focus\:ring-purple-500:focus { ring-color: #8b5cf6 }
                .focus\:ring-offset-2:focus { ring-offset-width: 2px }
                .focus\:ring-offset-black:focus { ring-offset-color: #000 }
                .grid-cols-1 { grid-template-columns: repeat(1, minmax(0, 1fr)) }
                .grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)) }
                .grid-cols-3 { grid-template-columns: repeat(3, minmax(0, 1fr)) }
                .grid-cols-4 { grid-template-columns: repeat(4, minmax(0, 1fr)) }
                .col-span-1 { grid-column: span 1 / span 1 }
                .col-span-2 { grid-column: span 2 / span 2 }
                .aspect-square { aspect-ratio: 1 / 1 }
                .aspect-video { aspect-ratio: 16 / 9 }

                /* Mobile responsive classes */
                @media (max-width: 768px) {
                    .mobile\:hidden { display: none }
                    .mobile\:block { display: block }
                    .mobile\:flex { display: flex }
                    .mobile\:flex-col { flex-direction: column }
                    .mobile\:text-sm { font-size: 0.875rem }
                    .mobile\:text-base { font-size: 1rem }
                    .mobile\:text-lg { font-size: 1.125rem }
                    .mobile\:text-xl { font-size: 1.25rem }
                    .mobile\:p-2 { padding: 0.5rem }
                    .mobile\:p-4 { padding: 1rem }
                    .mobile\:px-2 { padding-left: 0.5rem; padding-right: 0.5rem }
                    .mobile\:px-4 { padding-left: 1rem; padding-right: 1rem }
                    .mobile\:py-2 { padding-top: 0.5rem; padding-bottom: 0.5rem }
                    .mobile\:py-4 { padding-top: 1rem; padding-bottom: 1rem }
                    .mobile\:mt-2 { margin-top: 0.5rem }
                    .mobile\:mt-4 { margin-top: 1rem }
                    .mobile\:mb-2 { margin-bottom: 0.5rem }
                    .mobile\:mb-4 { margin-bottom: 1rem }
                    .mobile\:w-full { width: 100% }
                    .mobile\:text-center { text-align: center }
                    .mobile\:grid-cols-1 { grid-template-columns: repeat(1, minmax(0, 1fr)) }
                    .mobile\:grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)) }
                    .mobile\:gap-2 { gap: 0.5rem }
                    .mobile\:gap-4 { gap: 1rem }
                }

                @media (min-width: 768px) {
                    .tablet\:flex { display: flex }
                    .tablet\:hidden { display: none }
                    .tablet\:grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)) }
                    .tablet\:grid-cols-3 { grid-template-columns: repeat(3, minmax(0, 1fr)) }
                }

                @media (min-width: 1024px) {
                    .desktop\:flex { display: flex }
                    .desktop\:hidden { display: none }
                    .desktop\:grid-cols-4 { grid-template-columns: repeat(4, minmax(0, 1fr)) }
                }
            </style>
        @endif
    </head>
    <body class="anime-gradient-bg min-h-screen overflow-x-hidden">
        <!-- Anime Background Elements -->
        <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
            <!-- Floating Sakura Petals -->
            <div class="absolute top-10 left-5 w-6 h-6 bg-pink-500 rounded-full opacity-30 float-anime" style="animation-delay: 0s"></div>
            <div class="absolute top-20 right-10 w-4 h-4 bg-purple-400 rounded-full opacity-40 float-anime" style="animation-delay: 1s"></div>
            <div class="absolute bottom-32 left-20 w-5 h-5 bg-purple-300 rounded-full opacity-30 float-anime" style="animation-delay: 2s"></div>
            <div class="absolute top-40 left-1/4 w-3 h-3 bg-purple-500 rounded-full opacity-50 float-anime" style="animation-delay: 3s"></div>
            <div class="absolute bottom-20 right-1/3 w-4 h-4 bg-pink-400 rounded-full opacity-40 float-anime" style="animation-delay: 4s"></div>
            
            <!-- Glowing Orbs -->
            <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-purple-900 rounded-full mix-blend-screen filter blur-3xl opacity-20 animate-pulse"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-indigo-900 rounded-full mix-blend-screen filter blur-3xl opacity-15 animate-pulse" style="animation-delay: 1s"></div>
            
            <!-- Circuit Pattern (Anime Tech Theme) -->
            <div class="absolute inset-0 opacity-5">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-purple-500 to-transparent"></div>
                <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-purple-500 to-transparent"></div>
                <div class="absolute top-1/2 left-0 w-full h-1 bg-gradient-to-r from-transparent via-purple-400 to-transparent"></div>
            </div>
        </div>

        <!-- Main Container -->
        <div class="relative z-10 container-mobile py-6 px-4">
            <!-- Header Navigation -->
            <header class="w-full mb-8 md:mb-12">
                <div class="flex items-center justify-between">
                    <!-- Logo -->
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-purple-600 to-purple-800 flex items-center justify-center anime-glow">
                            <i class="fas fa-ghost text-white text-xl"></i>
                        </div>
                        <div>
                            <h1 class="text-xl md:text-2xl font-bold anime-text-gradient">Mlyhia</h1>
                            <p class="text-xs text-purple-400">by Michiko</p>
                        </div>
                    </div>

                    <!-- Navigation -->
                    @if (Route::has('login'))
                        <nav class="flex items-center gap-2 md:gap-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" 
                                   class="inline-flex items-center gap-2 px-4 md:px-5 py-2 text-sm text-white bg-purple-800 hover:bg-purple-700 border border-purple-600 rounded-lg transition-all duration-300 hover:shadow-lg hover:scale-105">
                                    <i class="fas fa-tachometer-alt"></i>
                                    <span class="hidden md:inline">Dashboard</span>
                                </a>
                            @else
                                <a href="{{ route('login') }}" 
                                   class="inline-flex items-center gap-2 px-4 md:px-5 py-2 text-sm text-purple-300 hover:text-white border border-purple-600 hover:border-purple-400 rounded-lg transition-all duration-300 hover:shadow-lg hover:scale-105">
                                    <i class="fas fa-sign-in-alt"></i>
                                    <span class="hidden md:inline">Log in</span>
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" 
                                       class="inline-flex items-center gap-2 px-4 md:px-5 py-2 text-sm text-white bg-gradient-to-r from-purple-600 to-purple-800 hover:from-purple-700 hover:to-purple-900 rounded-lg border border-purple-500 transition-all duration-300 hover:shadow-xl hover:scale-105">
                                        <i class="fas fa-user-plus"></i>
                                        <span class="hidden md:inline">Register</span>
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex flex-col lg:flex-row gap-8 items-center justify-center">
                <!-- Left Content Card -->
                <div class="anime-card-gradient w-full lg:w-2/3 rounded-2xl p-6 md:p-8 shadow-2xl border border-purple-500/30 backdrop-blur-lg">
                    <div class="relative">
                        <!-- Decorative Corner -->
                        <div class="absolute -top-3 -left-3 w-6 h-6 border-t-2 border-l-2 border-purple-500 rounded-tl-lg"></div>
                        <div class="absolute -top-3 -right-3 w-6 h-6 border-t-2 border-r-2 border-purple-500 rounded-tr-lg"></div>
                        <div class="absolute -bottom-3 -left-3 w-6 h-6 border-b-2 border-l-2 border-purple-500 rounded-bl-lg"></div>
                        <div class="absolute -bottom-3 -right-3 w-6 h-6 border-b-2 border-r-2 border-purple-500 rounded-br-lg"></div>

                        <!-- Content -->
                        <div class="relative z-10">
                            <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold mb-4 anime-text-gradient">
                                Welcome to <span class="text-white">Mlyhia Anime</span>
                            </h1>
                            <p class="text-gray-300 mb-6 md:mb-8 text-base md:text-lg leading-relaxed">
                                Dive into the ultimate anime experience created by <span class="text-purple-400 font-semibold">Michiko</span>. 
                                Explore exclusive anime content, connect with fellow otaku, and discover your next favorite series.
                            </p>

                            <!-- Feature Cards -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 mb-8">
                                <!-- Feature 1 -->
                                <div class="bg-black/40 p-4 md:p-6 rounded-xl border border-purple-500/30 hover:border-purple-400 transition-all duration-300 hover:shadow-xl hover:scale-105 group">
                                    <div class="flex items-start gap-4">
                                        <div class="flex-shrink-0 w-12 h-12 rounded-lg bg-gradient-to-br from-purple-600 to-purple-800 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                            <i class="fas fa-play-circle text-xl text-white"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-lg md:text-xl font-bold text-white mb-2">Stream Anime</h3>
                                            <p class="text-sm text-gray-400 mb-3">
                                                Unlimited streaming of your favorite anime series in HD quality
                                            </p>
                                            <a href="#" class="inline-flex items-center gap-2 text-sm font-medium text-purple-400 hover:text-purple-300 transition-colors">
                                                Start Watching
                                                <i class="fas fa-arrow-right text-xs"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Feature 2 -->
                                <div class="bg-black/40 p-4 md:p-6 rounded-xl border border-purple-500/30 hover:border-purple-400 transition-all duration-300 hover:shadow-xl hover:scale-105 group">
                                    <div class="flex items-start gap-4">
                                        <div class="flex-shrink-0 w-12 h-12 rounded-lg bg-gradient-to-br from-purple-600 to-purple-800 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                            <i class="fas fa-users text-xl text-white"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-lg md:text-xl font-bold text-white mb-2">Anime Community</h3>
                                            <p class="text-sm text-gray-400 mb-3">
                                                Connect with fellow anime fans and discuss your favorite series
                                            </p>
                                            <a href="#" class="inline-flex items-center gap-2 text-sm font-medium text-purple-400 hover:text-purple-300 transition-colors">
                                                Join Community
                                                <i class="fas fa-arrow-right text-xs"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Feature 3 -->
                                <div class="bg-black/40 p-4 md:p-6 rounded-xl border border-purple-500/30 hover:border-purple-400 transition-all duration-300 hover:shadow-xl hover:scale-105 group">
                                    <div class="flex items-start gap-4">
                                        <div class="flex-shrink-0 w-12 h-12 rounded-lg bg-gradient-to-br from-purple-600 to-purple-800 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                            <i class="fas fa-shopping-bag text-xl text-white"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-lg md:text-xl font-bold text-white mb-2">Anime Merch</h3>
                                            <p class="text-sm text-gray-400 mb-3">
                                                Exclusive anime merchandise and collectibles from Michiko
                                            </p>
                                            <a href="#" class="inline-flex items-center gap-2 text-sm font-medium text-purple-400 hover:text-purple-300 transition-colors">
                                                Shop Now
                                                <i class="fas fa-arrow-right text-xs"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Feature 4 -->
                                <div class="bg-black/40 p-4 md:p-6 rounded-xl border border-purple-500/30 hover:border-purple-400 transition-all duration-300 hover:shadow-xl hover:scale-105 group">
                                    <div class="flex items-start gap-4">
                                        <div class="flex-shrink-0 w-12 h-12 rounded-lg bg-gradient-to-br from-purple-600 to-purple-800 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                            <i class="fas fa-calendar-alt text-xl text-white"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-lg md:text-xl font-bold text-white mb-2">Events & News</h3>
                                            <p class="text-sm text-gray-400 mb-3">
                                                Stay updated with latest anime events and exclusive news
                                            </p>
                                            <a href="#" class="inline-flex items-center gap-2 text-sm font-medium text-purple-400 hover:text-purple-300 transition-colors">
                                                Explore Events
                                                <i class="fas fa-arrow-right text-xs"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Stats -->
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                                <div class="text-center p-4 bg-black/30 rounded-xl border border-purple-500/20">
                                    <div class="text-2xl md:text-3xl font-bold text-purple-400 mb-1">10K+</div>
                                    <div class="text-xs md:text-sm text-gray-400">Anime Series</div>
                                </div>
                                <div class="text-center p-4 bg-black/30 rounded-xl border border-purple-500/20">
                                    <div class="text-2xl md:text-3xl font-bold text-purple-400 mb-1">50K+</div>
                                    <div class="text-xs md:text-sm text-gray-400">Active Users</div>
                                </div>
                                <div class="text-center p-4 bg-black/30 rounded-xl border border-purple-500/20">
                                    <div class="text-2xl md:text-3xl font-bold text-purple-400 mb-1">500+</div>
                                    <div class="text-xs md:text-sm text-gray-400">Exclusive Merch</div>
                                </div>
                                <div class="text-center p-4 bg-black/30 rounded-xl border border-purple-500/20">
                                    <div class="text-2xl md:text-3xl font-bold text-purple-400 mb-1">24/7</div>
                                    <div class="text-xs md:text-sm text-gray-400">Streaming</div>
                                </div>
                            </div>

                            <!-- CTA Buttons -->
                            <div class="flex flex-col sm:flex-row gap-4 mb-8">
                                <a href="#" 
                                   class="flex-1 inline-flex items-center justify-center gap-3 px-6 py-4 bg-gradient-to-r from-purple-600 to-purple-800 hover:from-purple-700 hover:to-purple-900 rounded-xl border-2 border-purple-500 text-white text-lg font-bold transition-all duration-300 hover:shadow-2xl hover:scale-105">
                                    <i class="fas fa-rocket"></i>
                                    <span>Start Free Trial</span>
                                </a>
                                <a href="#" 
                                   class="flex-1 inline-flex items-center justify-center gap-3 px-6 py-4 bg-black/50 hover:bg-black/70 border-2 border-purple-500/50 hover:border-purple-400 rounded-xl text-white text-lg font-bold transition-all duration-300 hover:shadow-2xl hover:scale-105">
                                    <i class="fab fa-discord"></i>
                                    <span>Join Discord</span>
                                </a>
                            </div>

                            <!-- Quick Links -->
                            <div class="pt-6 border-t border-purple-500/30">
                                <p class="text-sm text-gray-400 mb-4">Explore More:</p>
                                <div class="flex flex-wrap gap-2">
                                    <a href="#" class="text-xs md:text-sm px-3 py-2 bg-black/40 border border-purple-500/30 hover:border-purple-400 rounded-full text-purple-300 hover:text-white transition-all">
                                        Anime Calendar
                                    </a>
                                    <a href="#" class="text-xs md:text-sm px-3 py-2 bg-black/40 border border-purple-500/30 hover:border-purple-400 rounded-full text-purple-300 hover:text-white transition-all">
                                        Character Database
                                    </a>
                                    <a href="#" class="text-xs md:text-sm px-3 py-2 bg-black/40 border border-purple-500/30 hover:border-purple-400 rounded-full text-purple-300 hover:text-white transition-all">
                                        Voice Actor Info
                                    </a>
                                    <a href="#" class="text-xs md:text-sm px-3 py-2 bg-black/40 border border-purple-500/30 hover:border-purple-400 rounded-full text-purple-300 hover:text-white transition-all">
                                        Fan Art Gallery
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Image/Logo Card -->
                <div class="w-full lg:w-1/3">
                    <div class="relative anime-card-gradient rounded-2xl p-6 md:p-8 shadow-2xl border border-purple-500/30 backdrop-blur-lg overflow-hidden">
                        <!-- Decorative Elements -->
                        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-purple-500 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-purple-500 to-transparent"></div>
                        
                        <!-- Michiko Signature -->
                        <div class="absolute top-4 right-4 text-xs text-purple-400 font-bold">
                            Created by Michiko
                        </div>

                        <!-- Anime Character Illustration Placeholder -->
                        <div class="relative h-48 md:h-64 mb-6 rounded-xl overflow-hidden border-2 border-purple-500/50">
                            <div class="absolute inset-0 bg-gradient-to-br from-purple-900/50 to-black/50 flex items-center justify-center">
                                <div class="text-center">
                                    <i class="fas fa-user-ninja text-6xl text-purple-400 mb-4"></i>
                                    <p class="text-sm text-purple-300">Anime Character Art</p>
                                </div>
                            </div>
                            <!-- Sparkle Effects -->
                            <div class="absolute top-4 left-4 w-2 h-2 bg-white rounded-full sparkle"></div>
                            <div class="absolute top-8 right-8 w-3 h-3 bg-purple-300 rounded-full sparkle" style="animation-delay: 0.5s"></div>
                            <div class="absolute bottom-8 left-8 w-2 h-2 bg-pink-400 rounded-full sparkle" style="animation-delay: 1s"></div>
                        </div>

                        <!-- Platform Logo -->
                        <div class="text-center mb-6">
                            <div class="inline-block p-4 rounded-2xl bg-black/50 border border-purple-500/30 mb-4">
                                <div class="text-4xl md:text-5xl font-bold anime-text-gradient">MLYHIA</div>
                            </div>
                            <p class="text-sm text-gray-400">The Ultimate Anime Platform</p>
                        </div>

                        <!-- Platform Features -->
                        <div class="space-y-4 mb-6">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-purple-600 flex items-center justify-center">
                                    <i class="fas fa-check text-white text-sm"></i>
                                </div>
                                <span class="text-sm text-gray-300">Ad-free Streaming</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-purple-600 flex items-center justify-center">
                                    <i class="fas fa-check text-white text-sm"></i>
                                </div>
                                <span class="text-sm text-gray-300">Multi-language Subtitles</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-purple-600 flex items-center justify-center">
                                    <i class="fas fa-check text-white text-sm"></i>
                                </div>
                                <span class="text-sm text-gray-300">Offline Viewing</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-purple-600 flex items-center justify-center">
                                    <i class="fas fa-check text-white text-sm"></i>
                                </div>
                                <span class="text-sm text-gray-300">Exclusive Content</span>
                            </div>
                        </div>

                        <!-- Download Apps -->
                        <div class="border-t border-purple-500/30 pt-6">
                            <p class="text-sm text-gray-400 mb-4">Available on:</p>
                            <div class="flex gap-3">
                                <a href="#" class="flex-1 text-center py-2 bg-black/40 border border-purple-500/30 hover:border-purple-400 rounded-lg transition-colors">
                                    <i class="fab fa-apple text-lg"></i>
                                    <p class="text-xs mt-1">iOS</p>
                                </a>
                                <a href="#" class="flex-1 text-center py-2 bg-black/40 border border-purple-500/30 hover:border-purple-400 rounded-lg transition-colors">
                                    <i class="fab fa-android text-lg"></i>
                                    <p class="text-xs mt-1">Android</p>
                                </a>
                                <a href="#" class="flex-1 text-center py-2 bg-black/40 border border-purple-500/30 hover:border-purple-400 rounded-lg transition-colors">
                                    <i class="fas fa-desktop text-lg"></i>
                                    <p class="text-xs mt-1">Web</p>
                                </a>
                            </div>
                        </div>

                        <!-- Social Links -->
                        <div class="mt-6 pt-6 border-t border-purple-500/30">
                            <p class="text-sm text-gray-400 mb-4">Follow Michiko:</p>
                            <div class="flex justify-center gap-4">
                                <a href="#" class="w-10 h-10 rounded-full bg-purple-600 hover:bg-purple-700 flex items-center justify-center transition-colors">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="w-10 h-10 rounded-full bg-purple-600 hover:bg-purple-700 flex items-center justify-center transition-colors">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" class="w-10 h-10 rounded-full bg-purple-600 hover:bg-purple-700 flex items-center justify-center transition-colors">
                                    <i class="fab fa-youtube"></i>
                                </a>
                                <a href="#" class="w-10 h-10 rounded-full bg-purple-600 hover:bg-purple-700 flex items-center justify-center transition-colors">
                                    <i class="fab fa-discord"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <!-- Footer -->
            <footer class="mt-8 md:mt-12 pt-8 border-t border-purple-500/30 text-center">
                <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-purple-600 to-purple-800 flex items-center justify-center">
                            <i class="fas fa-ghost text-white"></i>
                        </div>
                        <span class="text-sm text-gray-400">© {{ date('Y') }} Mlyhia Anime. All rights reserved.</span>
                    </div>
                    
                    <div class="text-sm text-gray-400">
                        Crafted with <i class="fas fa-heart text-purple-500 mx-1"></i> by Michiko
                    </div>
                    
                    <div class="flex gap-4">
                        <a href="#" class="text-sm text-gray-400 hover:text-purple-300 transition-colors">Privacy Policy</a>
                        <a href="#" class="text-sm text-gray-400 hover:text-purple-300 transition-colors">Terms of Service</a>
                        <a href="#" class="text-sm text-gray-400 hover:text-purple-300 transition-colors">Contact</a>
                    </div>
                </div>
                
                <!-- Mobile App Badges -->
                <div class="mt-6 md:hidden flex justify-center gap-4">
                    <a href="#" class="px-4 py-2 bg-black/40 border border-purple-500/30 rounded-lg flex items-center gap-2">
                        <i class="fab fa-apple"></i>
                        <span class="text-xs">App Store</span>
                    </a>
                    <a href="#" class="px-4 py-2 bg-black/40 border border-purple-500/30 rounded-lg flex items-center gap-2">
                        <i class="fab fa-google-play"></i>
                        <span class="text-xs">Play Store</span>
                    </a>
                </div>
            </footer>
        </div>

        <!-- Mobile Bottom Navigation -->
        <div class="fixed bottom-0 left-0 right-0 bg-black/90 backdrop-blur-lg border-t border-purple-500/30 py-3 px-6 z-50 md:hidden">
            <div class="flex justify-around">
                <a href="#" class="flex flex-col items-center text-purple-400">
                    <i class="fas fa-home text-lg"></i>
                    <span class="text-xs mt-1">Home</span>
                </a>
                <a href="#" class="flex flex-col items-center text-gray-400 hover:text-purple-400">
                    <i class="fas fa-play-circle text-lg"></i>
                    <span class="text-xs mt-1">Watch</span>
                </a>
                <a href="#" class="flex flex-col items-center text-gray-400 hover:text-purple-400">
                    <i class="fas fa-search text-lg"></i>
                    <span class="text-xs mt-1">Search</span>
                </a>
                <a href="#" class="flex flex-col items-center text-gray-400 hover:text-purple-400">
                    <i class="fas fa-user text-lg"></i>
                    <span class="text-xs mt-1">Profile</span>
                </a>
            </div>
        </div>

        <!-- Mobile Menu Toggle (Hidden on desktop) -->
        <button id="mobileMenuToggle" class="fixed top-4 left-4 z-50 w-12 h-12 rounded-full bg-purple-600 flex items-center justify-center md:hidden">
            <i class="fas fa-bars text-white"></i>
        </button>

        <script>
            // Simple mobile menu toggle
            document.getElementById('mobileMenuToggle')?.addEventListener('click', function() {
                const nav = document.querySelector('nav');
                if (nav) {
                    nav.classList.toggle('hidden');
                    nav.classList.toggle('flex');
                    nav.classList.toggle('flex-col');
                    nav.classList.toggle('absolute');
                    nav.classList.toggle('top-16');
                    nav.classList.toggle('left-4');
                    nav.classList.toggle('right-4');
                    nav.classList.toggle('bg-black/90');
                    nav.classList.toggle('backdrop-blur-lg');
                    nav.classList.toggle('p-4');
                    nav.classList.toggle('rounded-xl');
                    nav.classList.toggle('border');
                    nav.classList.toggle('border-purple-500/30');
                }
            });

            // Add hover effect for desktop
            if (window.innerWidth > 768) {
                document.querySelectorAll('.anime-card-gradient').forEach(card => {
                    card.addEventListener('mouseenter', () => {
                        card.style.transform = 'translateY(-5px)';
                    });
                    card.addEventListener('mouseleave', () => {
                        card.style.transform = 'translateY(0)';
                    });
                });
            }
        </script>
    </body>
</html>