- [x] Fix Google OAuth/verification: add missing `google` config to `config/services.php`.
- [x] Make Google callback handling more robust (session-based flow, explicit `redirectUrl`, graceful error handling).
- [x] Remove Facebook login UI (no lingering Facebook routes/buttons remain).
- [x] Document `GOOGLE_CLIENT_ID` / `GOOGLE_CLIENT_SECRET` / `GOOGLE_REDIRECT_URI` in `.env.example`.
- [x] Remove stray `activitytrcaker-npontu.com-` gitlink (broken submodule reference).

## Verifying Google login

1. In `.env`, set `GOOGLE_CLIENT_ID` and `GOOGLE_CLIENT_SECRET` from the
   [Google Cloud console](https://console.cloud.google.com/apis/credentials).
2. Add an Authorized redirect URI in the Google console equal to
   `${APP_URL}/auth/google/callback` (e.g. `https://activitytracker.npontu.com/auth/google/callback`).
   Optionally set `GOOGLE_REDIRECT_URI` to the same value; if blank the app falls back to that route.
3. Clear caches: `php artisan config:clear && php artisan route:clear`.
4. Visit `/login` and click **Google**. You should be redirected to Google,
   then returned to `/dashboard` authenticated.
5. Sanity-check routes: `php artisan route:list | grep google`
   (expect `google.redirect` and `google.callback`).
