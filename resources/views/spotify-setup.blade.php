<!DOCTYPE html>
<html>
<head>
    <title>Spotify Setup</title>
    <style>
        body { background: #111; color: #fff; font-family: monospace; display: flex; align-items: center; justify-content: center; min-height: 100vh; margin: 0; }
        .box { background: #1a1a1a; border: 1px solid #333; border-radius: 10px; padding: 40px; max-width: 600px; width: 100%; }
        h2 { color: #1DB954; margin-top: 0; }
        .token { background: #0d0d0d; border: 1px solid #1DB954; border-radius: 6px; padding: 14px; word-break: break-all; font-size: 13px; color: #1DB954; margin: 16px 0; }
        .step { color: #aaa; font-size: 13px; line-height: 1.8; }
        code { background: #222; padding: 2px 6px; border-radius: 3px; color: #40d392; }
        button { background: #1DB954; border: none; color: #000; font-weight: 700; padding: 10px 20px; border-radius: 6px; cursor: pointer; font-size: 13px; margin-top: 10px; }
    </style>
</head>
<body>
    <div class="box">
        <h2>✅ Spotify Connected!</h2>
        <p class="step">Copy the refresh token below and add it to your <code>.env</code> file:</p>
        <div class="token" id="token">{{ $refresh_token }}</div>
        <button onclick="navigator.clipboard.writeText('{{ $refresh_token }}').then(()=>this.textContent='Copied!')">Copy Token</button>
        <p class="step" style="margin-top: 24px;">Add to <code>.env</code>:</p>
        <div class="token">SPOTIFY_REFRESH_TOKEN={{ $refresh_token }}</div>
        <p class="step">Then run: <code>php artisan config:clear</code> — and you're done!</p>
    </div>
</body>
</html>
