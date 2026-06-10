<x-guest-layout>
    <div class="min-h-screen flex flex-col relative overflow-x-hidden bg-surface-container-lowest">
        <!-- Atmospheric Animated Background -->
        <div class="fixed inset-0 z-0 pointer-events-none">
            <div class="absolute inset-0 bg-gradient-to-b from-surface-container-lowest/50 via-transparent to-surface-container-lowest"></div>
        </div>

        <!-- Header -->
        <header class="relative z-10 w-full flex justify-between items-center px-margin py-base max-w-container-max mx-auto bg-transparent">
            <div class="flex items-center gap-xs">
                <span class="material-symbols-outlined text-primary text-[32px]">hub</span>
                <span class="font-display-md text-display-md font-extrabold text-primary">SupportTrack</span>
            </div>
            <div class="flex gap-md">
                <span class="material-symbols-outlined text-on-surface-variant cursor-pointer hover:text-primary transition-colors">help_outline</span>
            </div>
        </header>

        <main class="relative z-10 flex-grow flex items-center justify-center px-margin py-xl">
            <div class="w-full max-w-[560px] glass-panel rounded-xl p-lg performance-glow animate-in fade-in slide-in-from-bottom-4 duration-700">
                <!-- Branding Header -->
                <div class="text-center mb-lg">
                    <h1 class="font-headline-lg text-headline-lg text-on-surface mb-xs">Create Specialist Account</h1>
                    <p class="font-label-lg text-label-lg text-on-surface-variant tracking-wider uppercase">Precision Support Admin Portal</p>
                </div>

                <form class="space-y-md" id="registrationForm" method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Row 1: Full Name & Specialist ID -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-md max-w-[280px] mx-auto">
                        <div class="space-y-xs">
                            <label class="font-label-md text-label-md text-on-surface-variant ml-1" for="name">Full Name</label>
                            <div class="relative group">
                                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary transition-colors">person</span>
                                <input
                                    id="name"
                                    name="name"
                                    value="{{ old('name') }}"
                                    class="w-full bg-surface-container-high border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary rounded-lg pl-10 pr-4 py-3 text-body-md transition-all outline-none"
                                    placeholder="Alex Rivera"
                                    type="text"
                                    required
                                    autofocus
                                    autocomplete="name"
                                >
                            </div>
                            @error('name')
                                <div class="text-error mt-1 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="space-y-xs">
                            <label class="font-label-md text-label-md text-on-surface-variant ml-1" for="employee_id">Specialist ID</label>
                            <div class="relative group">
                                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary transition-colors">badge</span>
                                <input
                                    id="employee_id"
                                    name="employee_id"
                                    value="{{ old('employee_id') }}"
                                    class="w-full bg-surface-container-high border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary rounded-lg pl-10 pr-4 py-3 text-body-md transition-all outline-none"
                                    placeholder="ST-2044"
                                    type="text"
                                    required
                                    autocomplete="organization"
                                >
                            </div>
                            @error('employee_id')
                                <div class="text-error mt-1 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Specialist Email -->
                    <div class="space-y-xs">
                        <label class="font-label-md text-label-md text-on-surface-variant ml-1" for="email">Specialist Email Address</label>
                        <div class="relative group">
                            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary transition-colors">mail</span>
                            <input
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="w-full bg-surface-container-high border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary rounded-lg pl-10 pr-4 py-3 text-body-md transition-all outline-none"
                                placeholder="a.rivera@internal.supporttrack.com"
                                type="email"
                                required
                                autocomplete="username"
                            >
                        </div>
                        @error('email')
                            <div class="text-error mt-1 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Department Selection -->
                    <div class="space-y-xs">
                        <label class="font-label-md text-label-md text-on-surface-variant ml-1" for="department">Department</label>
                        <div class="relative group">
                            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary transition-colors">corporate_fare</span>
                            <select
                                id="department"
                                name="department"
                                class="w-full bg-surface-container-high border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary rounded-lg pl-10 pr-10 py-3 text-body-md transition-all outline-none appearance-none"
                                required
                            >
                                <option disabled {{ old('department') ? '' : 'selected' }} value="">Select Department...</option>
                                <option value="Infrastructure" {{ old('department') === 'Infrastructure' ? 'selected' : '' }}>Infrastructure</option>
                                <option value="Security" {{ old('department') === 'Security' ? 'selected' : '' }}>Security</option>
                                <option value="L3 Support" {{ old('department') === 'L3 Support' ? 'selected' : '' }}>L3 Support</option>
                                <option value="DevOps" {{ old('department') === 'DevOps' ? 'selected' : '' }}>DevOps</option>
                            </select>
                            <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-outline pointer-events-none">expand_more</span>
                        </div>
                        @error('department')
                            <div class="text-error mt-1 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password Block -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-md max-w-[280px] mx-auto">
                        <div class="space-y-xs">
                            <label class="font-label-md text-label-md text-on-surface-variant ml-1" for="password">Password</label>
                            <div class="relative group">
                                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary transition-colors">lock</span>
                                <input
                                    id="password"
                                    name="password"
                                    class="w-full bg-surface-container-high border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary rounded-lg pl-10 pr-10 py-3 text-body-md transition-all outline-none"
                                    type="password"
                                    required
                                    autocomplete="new-password"
                                >
                                <button class="absolute right-3 top-1/2 -translate-y-1/2 text-outline hover:text-on-surface" onclick="togglePass('password', this)" type="button">
                                    <span class="material-symbols-outlined">visibility</span>
                                </button>
                            </div>
                            @error('password')
                                <div class="text-error mt-1 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="space-y-xs">
                            <label class="font-label-md text-label-md text-on-surface-variant ml-1" for="password_confirmation">Confirm Password</label>
                            <div class="relative group">
                                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary transition-colors">shield_lock</span>
                                <input
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    class="w-full bg-surface-container-high border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary rounded-lg pl-10 pr-10 py-3 text-body-md transition-all outline-none"
                                    type="password"
                                    required
                                    autocomplete="new-password"
                                >
                                <button class="absolute right-3 top-1/2 -translate-y-1/2 text-outline hover:text-on-surface" onclick="togglePass('password_confirmation', this)" type="button">
                                    <span class="material-symbols-outlined">visibility</span>
                                </button>
                            </div>
                            @error('password_confirmation')
                                <div class="text-error mt-1 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Password Requirements Checklist -->
                    <div class="bg-surface-container-low/50 rounded-lg p-md grid grid-cols-1 sm:grid-cols-2 gap-y-2">
                        <div class="flex items-center gap-xs password-check font-label-md text-label-md text-outline" id="check-length">
                            <span class="material-symbols-outlined text-[18px]">check_circle</span>
                            Min. 12 characters
                        </div>
                        <div class="flex items-center gap-xs password-check font-label-md text-label-md text-outline" id="check-upper">
                            <span class="material-symbols-outlined text-[18px]">check_circle</span>
                            One uppercase letter
                        </div>
                        <div class="flex items-center gap-xs password-check font-label-md text-label-md text-outline" id="check-number">
                            <span class="material-symbols-outlined text-[18px]">check_circle</span>
                            One numeric value
                        </div>
                        <div class="flex items-center gap-xs password-check font-label-md text-label-md text-outline" id="check-special">
                            <span class="material-symbols-outlined text-[18px]">check_circle</span>
                            One special character
                        </div>
                    </div>

                    <!-- Primary CTA -->
                    <button class="w-full py-4 rounded-lg btn-gradient text-on-primary-container font-headline-md text-headline-md shadow-lg active:scale-[0.98] transition-transform flex items-center justify-center gap-xs" type="submit">
                        Create Account
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </button>

                    <!-- Divider -->
                    <div class="flex items-center gap-md py-sm">
                        <div class="flex-grow h-px bg-outline-variant"></div>
                        <span class="font-label-md text-label-md text-outline shrink-0">OR CONTINUE WITH</span>
                        <div class="flex-grow h-px bg-outline-variant"></div>
                    </div>

                    <!-- SSO Buttons (visual only) -->
                    <div class="grid grid-cols-1 gap-md max-w-[280px] mx-auto">
                        <button class="flex items-center justify-center gap-sm bg-surface-container-high border border-outline-variant hover:bg-surface-container-highest transition-colors rounded-lg py-3 font-label-lg text-label-lg" type="button">
                            <svg class="w-5 h-5" viewBox="0 0 24 24">
                                <path d="M12 5.04c1.64 0 3.12.56 4.28 1.67l3.21-3.21C17.53 1.64 14.95 1 12 1 7.42 1 3.51 3.63 1.6 7.42l3.86 3C6.39 7.42 8.97 5.04 12 5.04z" fill="#EA4335"></path>
                                <path d="M23.49 12.27c0-.79-.07-1.54-.19-2.27H12v4.3h6.44c-.28 1.48-1.12 2.73-2.38 3.58l3.7 2.87c2.16-1.99 3.42-4.93 3.42-8.48z" fill="#4285F4"></path>
                                <path d="M5.46 14.58c-.23-.68-.36-1.41-.36-2.17s.13-1.49.36-2.17l-3.86-3C.61 8.82 0 10.34 0 12c0 1.66.61 3.18 1.6 4.59l3.86-3.01z" fill="#FBBC05"></path>
                                <path d="M12 23c3.13 0 5.76-1.04 7.68-2.81l-3.7-2.87c-1.07.71-2.43 1.14-3.98 1.14-3.03 0-5.61-2.38-6.53-5.39l-3.86 3.01C3.51 20.37 7.42 23 12 23z" fill="#34A853"></path>
                            </svg>
                            Google
                        </button>
                    </div>

                    <div class="text-center pt-md">
                        <p class="font-body-md text-body-md text-on-surface-variant">
                            Already have an account?
                            <a class="text-primary font-bold hover:underline ml-1" href="{{ route('login') }}">Sign In</a>
                        </p>
                    </div>
                </form>
            </div>
        </main>

        <footer class="relative z-10 w-full py-lg px-margin flex flex-col md:flex-row justify-between items-center gap-md bg-surface border-t border-white/5">
            <div class="flex items-center gap-sm">
                <span class="font-label-lg text-label-lg text-on-surface">SupportTrack</span>
                <span class="font-label-md text-label-md text-on-surface-variant">© 2024 SupportTrack Internal Systems. All rights reserved.</span>
            </div>
            <div class="flex gap-md">
                <a class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-colors" href="#">Security Policy</a>
                <a class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-colors" href="#">Privacy Guard</a>
                <a class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-colors" href="#">System Status</a>
            </div>
        </footer>

        <script>
            function togglePass(id, btn) {
                const input = document.getElementById(id);
                const icon = btn.querySelector('.material-symbols-outlined');
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.innerText = 'visibility_off';
                } else {
                    input.type = 'password';
                    icon.innerText = 'visibility';
                }
            }

            const passInput = document.getElementById('password');
            const checks = {
                length: document.getElementById('check-length'),
                upper: document.getElementById('check-upper'),
                number: document.getElementById('check-number'),
                special: document.getElementById('check-special')
            };

            if (passInput && checks.length) {
                passInput.addEventListener('input', (e) => {
                    const val = e.target.value;
                    if (val.length >= 12) checks.length.classList.add('valid');
                    else checks.length.classList.remove('valid');

                    if (/[A-Z]/.test(val)) checks.upper.classList.add('valid');
                    else checks.upper.classList.remove('valid');

                    if (/[0-9]/.test(val)) checks.number.classList.add('valid');
                    else checks.number.classList.remove('valid');

                    if (/[^A-Za-z0-9]/.test(val)) checks.special.classList.add('valid');
                    else checks.special.classList.remove('valid');
                });
            }
        </script>
    </div>
</x-guest-layout>

