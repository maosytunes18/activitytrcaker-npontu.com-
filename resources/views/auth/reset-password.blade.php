<!DOCTYPE html>

<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>SupportTrack | Set New Password</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Geist:wght@100..900&amp;family=Hanken+Grotesk:ital,wght@0,100..900;1,100..900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>

<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "tertiary-fixed-dim": "#ffb59e",
                    "surface-container-lowest": "#0c0e12",
                    "on-primary-container": "#002661",
                    "secondary": "#a7ffb3",
                    "primary-fixed": "#d9e2ff",
                    "tertiary-fixed": "#ffdbd0",
                    "inverse-surface": "#e2e2e8",
                    "tertiary-container": "#ff571a",
                    "surface-variant": "#333539",
                    "on-background": "#e2e2e8",
                    "surface-container-highest": "#333539",
                    "on-secondary": "#003915",
                    "on-error": "#690005",
                    "surface-container-high": "#282a2e",
                    "on-secondary-fixed-variant": "#005322",
                    "on-tertiary-fixed": "#3a0b00",
                    "outline": "#8c90a1",
                    "surface-bright": "#37393e",
                    "on-secondary-container": "#00662c",
                    "surface-container": "#1e2024",
                    "on-surface-variant": "#c2c6d8",
                    "on-surface": "#e2e2e8",
                    "on-secondary-fixed": "#00210a",
                    "error-container": "#93000a",
                    "secondary-fixed-dim": "#00e46b",
                    "on-error-container": "#ffdad6",
                    "surface-dim": "#111317",
                    "on-tertiary": "#5e1700",
                    "inverse-on-surface": "#2f3035",
                    "on-primary-fixed-variant": "#00429c",
                    "secondary-fixed": "#66ff8f",
                    "secondary-container": "#00ee70",
                    "surface": "#111317",
                    "primary": "#b0c6ff",
                    "background": "#111317",
                    "on-primary": "#002d6f",
                    "on-primary-fixed": "#001945",
                    "primary-container": "#568dff",
                    "on-tertiary-fixed-variant": "#852400",
                    "primary-fixed-dim": "#b0c6ff",
                    "outline-variant": "#424655"
            },
            "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px"
            },
            "spacing": {
                    "xl": "64px",
                    "sm": "12px",
                    "container-max": "1440px",
                    "base": "8px",
                    "lg": "40px",
                    "xs": "4px",
                    "md": "24px",
                    "margin": "32px",
                    "gutter": "24px"
            },
            "fontFamily": {
                    "label-lg": ["Geist"],
                    "body-lg": ["Geist"],
                    "data-display": ["Hanken Grotesk"],
                    "display-lg": ["Hanken Grotesk"],
                    "label-md": ["Geist"],
                    "display-md": ["Hanken Grotesk"],
                    "headline-md": ["Hanken Grotesk"],
                    "body-md": ["Geist"],
                    "headline-lg": ["Hanken Grotesk"]
            }
          },
        },
      }
    </script>
<style>
        body {
            background-color: #0F1115;
            color: #e2e2e8;
        }
        .performance-glow {
            box-shadow: 0 0 40px rgba(176, 198, 255, 0.08);
        }
        .glass-panel {
            background: rgba(26, 29, 35, 0.8);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        .primary-gradient-btn {
            background: linear-gradient(135deg, #568dff 0%, #b0c6ff 100%);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .primary-gradient-btn:hover {
            box-shadow: 0 0 20px rgba(86, 141, 255, 0.4);
            transform: translateY(-1px);
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col font-body-md text-body-md mesh-bg overflow-x-hidden">
<header class="w-full flex justify-center py-xl">
    <div class="flex items-center gap-xs">
        <span class="material-symbols-outlined text-primary text-display-md" style="font-variation-settings: 'FILL' 1;">monitoring</span>
        <span class="font-display-md text-display-md font-extrabold text-primary tracking-tight">SupportTrack</span>
    </div>
</header>

<main class="flex-grow flex items-center justify-center px-margin pb-xl">
    <section class="w-full max-w-[480px] glass-panel rounded-xl p-lg performance-glow animate-in fade-in slide-in-from-bottom-4 duration-700">
        <div class="text-center mb-lg">
            <h1 class="font-headline-lg text-headline-lg text-on-surface mb-xs">Set New Password</h1>
            <p class="font-body-md text-on-surface-variant max-w-[320px] mx-auto">Choose a strong, unique password to secure your account.</p>
        </div>

        <form action="{{ route('password.store') }}" method="POST" id="passwordResetForm" class="space-y-md">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <input type="hidden" name="email" value="{{ $request->email }}">

            <div class="space-y-xs">
                <label class="block font-label-md text-label-md text-on-surface-variant" for="new_password">New Password</label>
                <div class="relative group">
                    <input class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-md py-sm focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all text-on-surface font-body-md" id="new_password" name="password" placeholder="••••••••" type="password" required autocomplete="new-password"/>
                    <button class="absolute right-md top-1/2 -translate-y-1/2 text-outline hover:text-primary transition-colors visibility-toggle" data-target="new_password" type="button" aria-label="Toggle password visibility">
                        <span class="material-symbols-outlined text-[20px]">visibility</span>
                    </button>
                </div>
                @error('password')
                    <p class="mt-2 text-sm text-rose-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-xs">
                <label class="block font-label-md text-label-md text-on-surface-variant" for="confirm_password">Confirm New Password</label>
                <div class="relative group">
                    <input class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-md py-sm focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all text-on-surface font-body-md" id="confirm_password" name="password_confirmation" placeholder="••••••••" type="password" required autocomplete="new-password"/>
                    <button class="absolute right-md top-1/2 -translate-y-1/2 text-outline hover:text-primary transition-colors visibility-toggle" data-target="confirm_password" type="button" aria-label="Toggle password visibility">
                        <span class="material-symbols-outlined text-[20px]">visibility</span>
                    </button>
                </div>
                @error('password_confirmation')
                    <p class="mt-2 text-sm text-rose-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="bg-surface-container-low rounded-lg p-md border border-white/5">
                <h3 class="font-label-lg text-label-lg text-on-surface mb-sm flex items-center gap-xs">
                    <span class="material-symbols-outlined text-[18px] text-primary">security</span>
                    Password Requirements
                </h3>
                <ul class="space-y-sm">
                    <li class="flex items-center gap-sm text-on-surface-variant" id="req-length">
                        <span class="material-symbols-outlined text-[16px] requirement-icon">circle</span>
                        <span class="font-label-md text-label-md">At least 8 characters long</span>
                    </li>
                    <li class="flex items-center gap-sm text-on-surface-variant" id="req-case">
                        <span class="material-symbols-outlined text-[16px] requirement-icon">circle</span>
                        <span class="font-label-md text-label-md">Must include an uppercase letter</span>
                    </li>
                    <li class="flex items-center gap-sm text-on-surface-variant" id="req-special">
                        <span class="material-symbols-outlined text-[16px] requirement-icon">circle</span>
                        <span class="font-label-md text-label-md">One special character (@, $, !, %)</span>
                    </li>
                    <li class="flex items-center gap-sm text-on-surface-variant" id="req-match">
                        <span class="material-symbols-outlined text-[16px] requirement-icon">circle</span>
                        <span class="font-label-md text-label-md">Passwords must match</span>
                    </li>
                </ul>
            </div>

            <button class="w-full primary-gradient-btn text-on-primary py-md px-md rounded-lg font-label-lg text-label-lg flex justify-center items-center gap-sm active:scale-95 transition-transform group" type="submit">
                <span>Reset Password</span>
                <span class="material-symbols-outlined text-[20px] group-hover:translate-x-1 transition-transform">lock_reset</span>
            </button>

            <div class="text-center mt-md">
                <a class="font-label-md text-label-md text-outline hover:text-on-surface transition-colors inline-flex items-center gap-xs" href="{{ route('login') }}">
                    <span class="material-symbols-outlined text-[16px]">arrow_back</span>
                    Back to Sign In
                </a>
            </div>
        </form>
    </section>
</main>

<footer class="w-full py-lg px-margin flex flex-col md:flex-row justify-between items-center gap-md border-t border-white/5 mt-auto">
    <div class="font-label-lg text-label-lg text-on-surface">SupportTrack</div>
    <p class="font-label-md text-label-md text-on-surface-variant">© 2024 SupportTrack Internal Systems. All rights reserved.</p>
    <div class="flex gap-md">
        <a class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-colors" href="#">Security Policy</a>
        <a class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-colors" href="#">Privacy Guard</a>
        <a class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-colors" href="#">System Status</a>
    </div>
</footer>

<script>
    document.querySelectorAll('.visibility-toggle').forEach(btn => {
        btn.addEventListener('click', () => {
            const targetId = btn.getAttribute('data-target');
            const input = document.getElementById(targetId);
            const icon = btn.querySelector('.material-symbols-outlined');

            if (!input || !icon) return;

            if (input.type === 'password') {
                input.type = 'text';
                icon.innerText = 'visibility_off';
            } else {
                input.type = 'password';
                icon.innerText = 'visibility';
            }
        });
    });

    const passInput = document.getElementById('new_password');
    const confirmInput = document.getElementById('confirm_password');

    const validators = {
        length: (val) => val.length >= 8,
        case: (val) => /[A-Z]/.test(val),
        special: (val) => /[@$!%*?&]/.test(val),
        match: () => confirmInput.value !== '' && passInput.value === confirmInput.value
    };

    const updateUI = (id, isValid) => {
        const el = document.getElementById(`req-${id}`);
        if (!el) return;
        const icon = el.querySelector('.requirement-icon');
        if (!icon) return;

        if (isValid) {
            el.classList.remove('text-on-surface-variant');
            el.classList.add('text-secondary');
            icon.innerText = 'check_circle';
            icon.style.fontVariationSettings = "'FILL' 1";
        } else {
            el.classList.add('text-on-surface-variant');
            el.classList.remove('text-secondary');
            icon.innerText = 'circle';
            icon.style.fontVariationSettings = "'FILL' 0";
        }
    };

    const validateAll = () => {
        const val = passInput.value;
        updateUI('length', validators.length(val));
        updateUI('case', validators.case(val));
        updateUI('special', validators.special(val));
        updateUI('match', validators.match());
    };

    passInput.addEventListener('input', validateAll);
    confirmInput.addEventListener('input', validateAll);

    document.getElementById('passwordResetForm')?.addEventListener('submit', (e) => {
        const btn = e.target.querySelector('button[type="submit"]');
        if (!btn) return;
        btn.disabled = true;
        btn.innerHTML = `
            <span class="inline-flex items-center gap-3">
                <span class="material-symbols-outlined">progress_activity</span>
                Processing...
            </span>
        `;
    });
</script>
</body></html>

