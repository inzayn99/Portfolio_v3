<style>
    .lh-badge-wrap {
        display: flex;
        justify-content: center;
        padding: 32px 20px 40px;
    }

    .lh-badge {
        display: inline-flex;
        flex-direction: column;
        align-items: center;
        gap: 14px;
        background: #1a1a1a;
        border: 1px solid rgba(255,255,255,.07);
        border-radius: 16px;
        padding: 22px 32px 20px;
        max-width: 440px;
        width: 100%;
    }

    .lh-badge-title {
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        color: #555;
        display: flex;
        align-items: center;
        gap: 7px;
    }

    .lh-badge-title svg {
        width: 14px;
        height: 14px;
        fill: #42d392;
        flex-shrink: 0;
    }

    .lh-scores {
        display: flex;
        gap: 20px;
        align-items: center;
    }

    .lh-score-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 6px;
    }

    .lh-ring {
        position: relative;
        width: 72px;
        height: 72px;
    }

    .lh-ring svg {
        width: 72px;
        height: 72px;
        transform: rotate(-90deg);
    }

    .lh-ring-bg {
        fill: none;
        stroke: rgba(255,255,255,.06);
        stroke-width: 4;
    }

    .lh-ring-fill {
        fill: none;
        stroke-width: 4;
        stroke-linecap: round;
        stroke-dasharray: 188.5;
        transition: stroke-dashoffset 1.2s ease;
    }

    .lh-ring-fill.green  { stroke: #42d392; }
    .lh-ring-fill.orange { stroke: #f39c12; }
    .lh-ring-fill.red    { stroke: #e74c3c; }

    .lh-score-num {
        position: absolute;
        inset: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        font-weight: 800;
        color: #fff;
    }

    .lh-score-label {
        font-size: 10.5px;
        font-weight: 600;
        letter-spacing: .5px;
        color: #666;
        text-transform: uppercase;
    }

    .lh-divider {
        width: 1px;
        height: 60px;
        background: rgba(255,255,255,.06);
    }

    .lh-badge-footer {
        font-size: 10px;
        color: #383838;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .lh-badge-footer a {
        color: #42d392;
        text-decoration: none;
        opacity: .6;
    }

    .lh-badge-footer a:hover { opacity: 1; }

    @media (max-width: 480px) {
        .lh-scores { gap: 12px; }
        .lh-ring { width: 60px; height: 60px; }
        .lh-ring svg { width: 60px; height: 60px; }
        .lh-ring-fill { stroke-dasharray: 157; }
        .lh-score-num { font-size: 17px; }
    }
</style>

<div class="lh-badge-wrap">
    <div class="lh-badge" aria-label="Google Lighthouse scores">

        <div class="lh-badge-title">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2L8.5 8.5H2l5.5 4-2 7L12 16l6.5 3.5-2-7L22 8.5h-6.5z"/>
            </svg>
            Google Lighthouse Scores
        </div>

        <div class="lh-scores">
            @php
                $scores = [
                    ['label' => 'Performance',     'value' => 56],
                    ['label' => 'Accessibility',   'value' => 93],
                    ['label' => 'SEO',             'value' => 100],
                ];
                function lhColor(int $v): string {
                    return $v >= 90 ? 'green' : ($v >= 50 ? 'orange' : 'red');
                }
                // Circumference for r=30: 2π×30 ≈ 188.5
                function lhOffset(int $v): float {
                    return 188.5 - ($v / 100) * 188.5;
                }
            @endphp

            @foreach ($scores as $i => $s)
                @if ($i > 0)
                    <div class="lh-divider" aria-hidden="true"></div>
                @endif
                <div class="lh-score-item">
                    <div class="lh-ring">
                        <svg viewBox="0 0 72 72">
                            <circle class="lh-ring-bg" cx="36" cy="36" r="30"/>
                            <circle
                                class="lh-ring-fill {{ lhColor($s['value']) }}"
                                cx="36" cy="36" r="30"
                                data-offset="{{ lhOffset($s['value']) }}"
                                style="stroke-dashoffset: 188.5"
                            />
                        </svg>
                        <div class="lh-score-num">{{ $s['value'] }}</div>
                    </div>
                    <div class="lh-score-label">{{ $s['label'] }}</div>
                </div>
            @endforeach
        </div>

        <div class="lh-badge-footer">
            <span>Audited with</span>
            <a href="https://developer.chrome.com/docs/lighthouse/overview/" target="_blank" rel="noopener noreferrer">Google Lighthouse</a>
        </div>
    </div>
</div>

<script>
(function () {
    function animateLighthouse() {
        var rings = document.querySelectorAll('.lh-ring-fill');
        rings.forEach(function (ring) {
            var offset = parseFloat(ring.getAttribute('data-offset'));
            setTimeout(function () {
                ring.style.strokeDashoffset = offset;
            }, 300);
        });
    }

    // Animate when badge scrolls into view
    if ('IntersectionObserver' in window) {
        var badge = document.querySelector('.lh-badge');
        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    animateLighthouse();
                    observer.disconnect();
                }
            });
        }, { threshold: 0.3 });
        if (badge) observer.observe(badge);
    } else {
        animateLighthouse();
    }
})();
</script>
