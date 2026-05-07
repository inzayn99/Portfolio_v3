(function () {
    'use strict';

    // ── 1. Block right-click ─────────────────────────────────────────────────
    document.addEventListener('contextmenu', function (e) {
        e.preventDefault();
        e.stopPropagation();
        return false;
    }, true);

    // ── 2. Block all DevTools keyboard shortcuts ─────────────────────────────
    document.addEventListener('keydown', function (e) {
        var key = e.key || '';

        var blocked =
            key === 'F12' ||
            ((e.ctrlKey || e.metaKey) && e.shiftKey && 'ijcIJC'.indexOf(key) !== -1) ||
            ((e.ctrlKey || e.metaKey) && 'uUsSpPaA'.indexOf(key) !== -1) ||
            /^F\d{1,2}$/.test(key);

        if (blocked) {
            e.preventDefault();
            e.stopPropagation();
            return false;
        }
    }, true);

    // ── 3. Block text selection ──────────────────────────────────────────────
    document.addEventListener('selectstart', function (e) { e.preventDefault(); });

    // ── 4. Block drag & copy/cut ─────────────────────────────────────────────
    document.addEventListener('dragstart', function (e) { e.preventDefault(); });
    document.addEventListener('copy',      function (e) { e.preventDefault(); });
    document.addEventListener('cut',       function (e) { e.preventDefault(); });

    // ── 5. CSS-level selection disable ───────────────────────────────────────
    var style = document.createElement('style');
    style.innerHTML = '* { -webkit-user-select: none !important; -moz-user-select: none !important; user-select: none !important; }';
    document.head.appendChild(style);

    // ── 6. Override console methods ──────────────────────────────────────────
    (function () {
        var noop    = function () {};
        var methods = ['log','debug','info','warn','error','table','dir','dirxml',
                       'trace','group','groupCollapsed','groupEnd','time','timeEnd',
                       'profile','profileEnd','count'];
        methods.forEach(function (m) {
            try { console[m] = noop; } catch (e) {}
        });
    })();

    // ── 7. DevTools window-size detection (reliable, no false positives) ─────
    var devtoolsOpen   = false;
    var THRESHOLD      = 200;
    var redirected     = false;

    function handleDevTools() {
        if (redirected) return;
        redirected          = true;
        document.body.innerHTML = '';
        document.title          = '';
        window.location.replace('about:blank');
    }

    function checkDevTools() {
        // outerHeight includes browser chrome; when DevTools docks vertically
        // the difference grows well beyond 200px
        var heightDiff = window.outerHeight - window.innerHeight;
        var widthDiff  = window.outerWidth  - window.innerWidth;

        if (widthDiff > THRESHOLD || heightDiff > THRESHOLD) {
            if (!devtoolsOpen) {
                devtoolsOpen = true;
                handleDevTools();
            }
        } else {
            devtoolsOpen = false;
        }
    }

    // ── 8. Start polling after page is fully loaded ──────────────────────────
    window.addEventListener('load', function () {
        // Wait 1.5s after load so browser chrome settling doesn't false-trigger
        setTimeout(function () {
            checkDevTools();
            setInterval(checkDevTools, 1500);
        }, 1500);
    });

    window.addEventListener('resize', function () {
        // Small delay on resize too, to let browser finish re-layout
        setTimeout(checkDevTools, 300);
    });

})();
