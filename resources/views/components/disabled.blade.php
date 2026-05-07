{{-- <script>

  document.addEventListener('DOMContentLoaded', () => {
    document.addEventListener('contextmenu', function (event) {
        event.preventDefault();
    });

    document.addEventListener('keydown', function (event) {
        if (
            event.key === 'F12' || // F12
            (event.ctrlKey && event.shiftKey && event.key === 'I') ||
            (event.ctrlKey && event.shiftKey && event.key === 'J') ||
            (event.ctrlKey && event.key === 'U') ||
            (event.metaKey && event.shiftKey && event.key === 'C') ||
            (event.ctrlKey && event.shiftKey && event.key === 'C')
        ) {
            event.preventDefault();
        }
    });

    document.addEventListener('mousedown', function (event) {
        if (event.button === 2 && (event.ctrlKey || event.metaKey)) {
            event.preventDefault();
        }
    });

    const blockInspect = function () {
        setTimeout(() => {
            (function detectDevTools() {
                const devtools = /./;
                devtools.toString = function () {
                    throw new Error('DevTools detected');
                };
                console.log('%c', devtools);
            })();
        }, 100);
    };

    window.onload = blockInspect;
});

</script> --}}
