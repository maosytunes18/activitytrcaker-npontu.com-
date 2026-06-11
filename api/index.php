<?php

/**
 * Serverless entrypoint for Vercel (vercel-php runtime).
 *
 * On Vercel the project filesystem is read-only at runtime; only /tmp is
 * writable. Create the directories Laravel needs for compiled views, cache
 * and sessions before booting, then hand off to the normal public entrypoint.
 */
foreach (['/tmp/views', '/tmp/cache', '/tmp/sessions'] as $dir) {
    if (! is_dir($dir)) {
        @mkdir($dir, 0777, true);
    }
}

require __DIR__.'/../public/index.php';
