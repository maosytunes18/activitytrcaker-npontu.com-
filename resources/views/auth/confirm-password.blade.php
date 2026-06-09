<!DOCTYPE html>

<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>SupportTrack | Confirm Password</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Geist:wght@100..900&amp;family=Hanken+Grotesk:wght@0,100..900;1,100..900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>

<style>
  body{background-color:#0F1115;color:#e2e2e8;}
  .glass-panel{background:rgba(26,29,35,.8);backdrop-filter:blur(12px);border:1px solid rgba(255,255,255,.08);}
  .primary-gradient-btn{background:linear-gradient(135deg,#568dff 0%,#b0c6ff 100%);}
</style>
</head>
<body class="min-h-screen flex flex-col font-body-md text-body-md mesh-bg overflow-x-hidden">
<header class="w-full flex justify-center py-xl">
  <div class="flex items-center gap-xs">
    <span class="material-symbols-outlined text-primary text-display-md" style="font-variation-settings: 'FILL' 1;">security</span>
    <span class="font-display-md text-display-md font-extrabold text-primary tracking-tight">SupportTrack</span>
  </div>
</header>

<main class="flex-grow flex items-center justify-center px-margin pb-xl">
  <section class="w-full max-w-[480px] glass-panel rounded-xl p-lg performance-glow animate-in fade-in slide-in-from-bottom-4 duration-700">
    <div class="text-center mb-lg">
      <h1 class="text-3xl font-bold">Confirm your password</h1>
      <p class="mt-2 text-sm text-slate-300">This is a secure area of the application. Please confirm your password before continuing.</p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-md">
      @csrf

      <div class="space-y-xs">
        <label class="block text-sm font-semibold text-slate-300" for="password">Password</label>
        <input
          class="w-full bg-slate-900/20 border border-slate-700 rounded-lg px-md py-sm text-slate-100 outline-none"
          id="password" name="password" type="password" required autocomplete="current-password"/>
        @error('password')
          <p class="mt-2 text-sm text-rose-500">{{ $message }}</p>
        @enderror
      </div>

      <button class="w-full primary-gradient-btn text-slate-950 py-md px-md rounded-lg font-semibold transition-all active:scale-95" type="submit">
        Confirm
      </button>
    </form>

    <div class="text-center mt-md">
      <a class="text-sm text-slate-300 hover:text-blue-300" href="{{ route('dashboard') }}">Back to Dashboard</a>
    </div>
  </section>
</main>
</body>
</html>

