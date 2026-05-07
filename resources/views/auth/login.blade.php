@php
    $setting = \App\Models\Setting::first();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login — {{ $setting->company_name ?? 'Admin' }}</title>
    <link rel="shortcut icon" type="image/jpg" href="{{ Storage::disk('uploads')->url($setting->company_favicon ?? '') }}"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/line-awesome@1.3.0/dist/line-awesome/css/line-awesome.min.css">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Poppins', sans-serif;
            background: #0e0e0e;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        /* subtle grid background */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,.03) 1px, transparent 1px);
            background-size: 40px 40px;
            pointer-events: none;
        }

        .login-wrap {
            position: relative;
            width: 100%;
            max-width: 420px;
            padding: 16px;
        }

        /* tag decoration */
        .tag-dec {
            display: block;
            font-size: 11px;
            letter-spacing: 2px;
            color: rgba(255,255,255,.18);
            font-family: 'Courier New', monospace;
            margin-bottom: 6px;
            user-select: none;
        }
        .tag-dec.tag-bottom { margin-top: 6px; margin-bottom: 0; }

        .login-card {
            background: rgba(255,255,255,.04);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255,255,255,.08);
            border-radius: 16px;
            padding: 40px 36px;
        }

        .login-logo {
            display: flex;
            justify-content: center;
            margin-bottom: 28px;
        }
        .login-logo img {
            max-height: 56px;
            max-width: 160px;
            object-fit: contain;
            filter: brightness(1.1);
        }

        .login-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 4px;
        }
        .login-sub {
            font-size: 12px;
            color: rgba(255,255,255,.35);
            margin-bottom: 28px;
            letter-spacing: .5px;
        }

        /* errors */
        .error-box {
            background: rgba(239,68,68,.1);
            border: 1px solid rgba(239,68,68,.3);
            border-radius: 8px;
            padding: 10px 14px;
            margin-bottom: 20px;
            font-size: 13px;
            color: #fca5a5;
        }
        .error-box ul { padding-left: 16px; }

        /* status */
        .status-box {
            background: rgba(34,197,94,.1);
            border: 1px solid rgba(34,197,94,.3);
            border-radius: 8px;
            padding: 10px 14px;
            margin-bottom: 20px;
            font-size: 13px;
            color: #86efac;
        }

        .field { margin-bottom: 18px; }

        .field label {
            display: block;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: rgba(255,255,255,.45);
            margin-bottom: 8px;
        }

        .field input {
            width: 100%;
            background: rgba(255,255,255,.05);
            border: 1px solid rgba(255,255,255,.1);
            border-radius: 8px;
            padding: 11px 14px;
            font-size: 14px;
            color: #fff;
            font-family: 'Poppins', sans-serif;
            outline: none;
            transition: border-color .2s ease, background .2s ease;
        }
        .field input::placeholder { color: rgba(255,255,255,.2); }
        .field input:focus {
            border-color: rgba(255,255,255,.3);
            background: rgba(255,255,255,.07);
        }

        .row-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 22px;
            gap: 12px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 12px;
            color: rgba(255,255,255,.35);
            cursor: pointer;
            user-select: none;
        }
        .remember input[type="checkbox"] {
            width: 15px;
            height: 15px;
            accent-color: #fff;
            cursor: pointer;
        }

        .forgot {
            font-size: 12px;
            color: rgba(255,255,255,.35);
            text-decoration: none;
            transition: color .2s ease;
        }
        .forgot:hover { color: rgba(255,255,255,.7); }

        .btn-login {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            margin-top: 24px;
            padding: 13px 24px;
            background: #fff;
            color: #0e0e0e;
            border: none;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            cursor: pointer;
            transition: opacity .2s ease, transform .15s ease;
        }
        .btn-login:hover { opacity: .88; transform: translateY(-1px); }
        .btn-login:active { transform: translateY(0); }
    </style>
</head>
<body>
    <div class="login-wrap">
        <span class="tag-dec">&lt;section id="admin"&gt;</span>

        <div class="login-card">
            @if ($setting->company_logo)
                <div class="login-logo">
                    <img src="{{ Storage::disk('uploads')->url($setting->company_logo) }}" alt="{{ $setting->company_name }}">
                </div>
            @endif

            <div class="login-title">Welcome back.</div>
            <div class="login-sub">Sign in to {{ $setting->company_name ?? 'your dashboard' }}</div>

            @if ($errors->any())
                <div class="error-box">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('status'))
                <div class="status-box">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="field">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required autofocus>
                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" placeholder="••••••••" required autocomplete="current-password">
                </div>

                <div class="row-bottom">
                    <label class="remember">
                        <input type="checkbox" name="remember" id="remember_me">
                        Remember me
                    </label>
                    @if (Route::has('password.request'))
                        <a class="forgot" href="{{ route('password.request') }}">Forgot password?</a>
                    @endif
                </div>

                <button type="submit" class="btn-login">
                    <i class="las la-sign-in-alt"></i> Log in
                </button>
            </form>
        </div>

        <span class="tag-dec tag-bottom">&lt;/section&gt;</span>
    </div>
</body>
</html>
