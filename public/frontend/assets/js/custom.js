// ==========================================================
// Sound Toggle — Web Audio API ambient generator
// ==========================================================
(function () {
    var ctx, masterGain, nodes = [], playing = false;

    function createAmbient() {
        ctx = new (window.AudioContext || window.webkitAudioContext)();
        masterGain = ctx.createGain();
        masterGain.gain.setValueAtTime(0, ctx.currentTime);
        masterGain.connect(ctx.destination);

        // Layer 1: deep bass drone
        function addOsc(freq, type, vol) {
            var osc  = ctx.createOscillator();
            var gain = ctx.createGain();
            osc.type      = type;
            osc.frequency.value = freq;
            gain.gain.value     = vol;
            osc.connect(gain);
            gain.connect(masterGain);
            osc.start();
            nodes.push(osc);
        }

        // Layer 2: filtered white noise (ambient texture)
        function addNoise() {
            var bufferSize = ctx.sampleRate * 3;
            var buffer     = ctx.createBuffer(1, bufferSize, ctx.sampleRate);
            var data       = buffer.getChannelData(0);
            for (var i = 0; i < bufferSize; i++) {
                data[i] = (Math.random() * 2 - 1) * 0.15;
            }
            var source = ctx.createBufferSource();
            source.buffer = buffer;
            source.loop   = true;

            var filter = ctx.createBiquadFilter();
            filter.type            = 'lowpass';
            filter.frequency.value = 400;
            filter.Q.value         = 0.5;

            var gain = ctx.createGain();
            gain.gain.value = 0.08;

            source.connect(filter);
            filter.connect(gain);
            gain.connect(masterGain);
            source.start();
            nodes.push(source);
        }

        addOsc(55,  'sine',     0.4);   // deep bass
        addOsc(110, 'sine',     0.2);   // low mid
        addOsc(165, 'triangle', 0.1);   // harmonic
        addOsc(220, 'sine',     0.06);  // upper harmonic
        addNoise();
    }

    function fadeIn() {
        masterGain.gain.cancelScheduledValues(ctx.currentTime);
        masterGain.gain.setValueAtTime(masterGain.gain.value, ctx.currentTime);
        masterGain.gain.linearRampToValueAtTime(0.6, ctx.currentTime + 1.5);
    }

    function fadeOut(cb) {
        masterGain.gain.cancelScheduledValues(ctx.currentTime);
        masterGain.gain.setValueAtTime(masterGain.gain.value, ctx.currentTime);
        masterGain.gain.linearRampToValueAtTime(0, ctx.currentTime + 1.5);
        setTimeout(cb, 1600);
    }

    function stopAll() {
        nodes.forEach(function (n) { try { n.stop(); } catch (e) {} });
        nodes = [];
        ctx.close();
        ctx = null;
    }

    document.addEventListener('DOMContentLoaded', function () {
        var btn     = document.getElementById('sound');
        var offSpan = document.getElementById('off');
        var onSpan  = document.getElementById('on');
        if (!btn || !offSpan || !onSpan) return;

        btn.addEventListener('click', function () {
            if (playing) {
                playing = false;
                offSpan.style.display = 'inline';
                onSpan.style.display  = 'none';
                btn.classList.remove('is-playing');
                fadeOut(stopAll);
            } else {
                playing = true;
                createAmbient();
                fadeIn();
                offSpan.style.display = 'none';
                onSpan.style.display  = 'inline';
                btn.classList.add('is-playing');
            }
        });
    });
}());

// ==========================================================
// Mouse Effect — award-level fluid trails
// ==========================================================
(function (window) {
    var ctx,
        target   = { x: window.innerWidth / 2, y: window.innerHeight / 2 },
        tendrils = [],
        drawOpacity = 0,
        lastMove    = 0,
        settings    = {};

    settings.trails    = 25;
    settings.size      = 60;
    settings.friction  = 0.50;
    settings.dampening = 0.22;
    settings.tension   = 0.988;

    function Tendril(options) {
        this.spring = options.spring || 0.45;
        this.nodes  = [];
        for (var i = 0; i < settings.size; i++) {
            this.nodes.push({ x: target.x, y: target.y, vx: 0, vy: 0 });
        }
    }

    Tendril.prototype = {
        update: function () {
            var spring = this.spring,
                node   = this.nodes[0],
                prev, i, n;

            node.vx += (target.x - node.x) * spring;
            node.vy += (target.y - node.y) * spring;

            for (i = 0, n = this.nodes.length; i < n; i++) {
                node = this.nodes[i];
                if (i > 0) {
                    prev = this.nodes[i - 1];
                    node.vx += (prev.x - node.x) * spring;
                    node.vy += (prev.y - node.y) * spring;
                    node.vx += prev.vx * settings.dampening;
                    node.vy += prev.vy * settings.dampening;
                }
                node.vx *= settings.friction;
                node.vy *= settings.friction;
                node.x  += node.vx;
                node.y  += node.vy;
                spring  *= settings.tension;
            }
        },

        draw: function (alpha) {
            var nodes = this.nodes,
                n     = nodes.length,
                x, y, a, b, i;

            ctx.beginPath();
            ctx.moveTo(nodes[0].x, nodes[0].y);

            for (i = 1; i < n - 2; i++) {
                a = nodes[i];
                b = nodes[i + 1];
                x = (a.x + b.x) * 0.5;
                y = (a.y + b.y) * 0.5;
                ctx.quadraticCurveTo(a.x, a.y, x, y);
            }

            a = nodes[i];
            b = nodes[i + 1];
            ctx.quadraticCurveTo(a.x, a.y, b.x, b.y);

            ctx.strokeStyle = 'rgba(100, 255, 218, ' + (0.35 * alpha) + ')';
            ctx.lineWidth   = 1;
            ctx.shadowBlur  = 0;
            ctx.stroke();
            ctx.closePath();
        }
    };

    function init(event) {
        document.removeEventListener('mousemove', init);
        document.removeEventListener('touchstart', init);
        document.addEventListener('mousemove', mousemove);
        document.addEventListener('touchmove', mousemove, { passive: false });
        document.addEventListener('touchstart', touchstart);
        mousemove(event);
        reset();
        loop();
    }

    function reset() {
        tendrils = [];
        for (var i = 0; i < settings.trails; i++) {
            tendrils.push(new Tendril({
                spring: 0.02 + 0.5 * (i / settings.trails)
            }));
        }
    }

    function loop() {
        if (!ctx.running) return;

        var idle    = Date.now() - lastMove;
        var target_opacity = idle < 100 ? 1 : 0;

        // Smooth fade in/out
        drawOpacity += (target_opacity - drawOpacity) * (target_opacity > drawOpacity ? 0.12 : 0.04);

        ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);

        if (drawOpacity > 0.01) {
            ctx.save();
            for (var i = 0; i < settings.trails; i++) {
                tendrils[i].update();
                tendrils[i].draw(drawOpacity);
            }
            ctx.restore();
        }

        requestAnimationFrame(loop);
    }

    function mousemove(event) {
        if (event.touches) {
            target.x = event.touches[0].pageX;
            target.y = event.touches[0].pageY;
        } else {
            target.x = event.clientX;
            target.y = event.clientY;
        }
        lastMove = Date.now();
        event.preventDefault();
    }

    function touchstart(event) {
        if (event.touches.length === 1) {
            target.x = event.touches[0].pageX;
            target.y = event.touches[0].pageY;
            lastMove = Date.now();
        }
    }

    window.requestAnimationFrame =
        window.requestAnimationFrame ||
        window.webkitRequestAnimationFrame ||
        window.mozRequestAnimationFrame ||
        function (fn) { window.setTimeout(fn, 1000 / 60); };

    window.onload = function () {
        ctx = document.getElementById('canvas').getContext('2d');
        ctx.running = true;
        document.addEventListener('mousemove', init);
        document.addEventListener('touchstart', init);
        resize();
    };

    window.addEventListener('resize', resize);

    function resize() {
        ctx.canvas.width  = window.innerWidth;
        ctx.canvas.height = window.innerHeight;
        reset();
    }
})(window);
//=============================================================
// Part 1 javascript functionality ends here
//=============================================================
$(document).ready(function () {
    if (
      !$('#myCanvas').tagcanvas(
        {
          textColour: '#4FB1BE',
          outlineColour: 'transparent',
          reverse: true,
          depth: 0.8,
          maxSpeed: 0.05,
          weight: true,
        },
        'tags',
      )
    ) {
      // something went wrong hide the canvas container,
      $('#myCanvasContainer')
    }
  })

//=============================================================
// Disable inspect
//=============================================================

//   document.addEventListener('DOMContentLoaded', () => {
//     document.addEventListener('contextmenu', function (event) {
//         event.preventDefault();
//     });

//     document.addEventListener('keydown', function (event) {
//         if (
//             event.key === 'F12' || // F12
//             (event.ctrlKey && event.shiftKey && event.key === 'I') ||
//             (event.ctrlKey && event.shiftKey && event.key === 'J') ||
//             (event.ctrlKey && event.key === 'U') ||
//             (event.metaKey && event.shiftKey && event.key === 'C') ||
//             (event.ctrlKey && event.shiftKey && event.key === 'C')
//         ) {
//             event.preventDefault();
//         }
//     });

//     document.addEventListener('mousedown', function (event) {
//         if (event.button === 2 && (event.ctrlKey || event.metaKey)) {
//             event.preventDefault();
//         }
//     });

//     const blockInspect = function () {
//         setTimeout(() => {
//             (function detectDevTools() {
//                 const devtools = /./;
//                 devtools.toString = function () {
//                     throw new Error('DevTools detected');
//                 };
//                 console.log('%c', devtools);
//             })();
//         }, 100);
//     };

//     window.onload = blockInspect;
// });


// ==========================================================
// Magic Wall — independent random flip per tile
// ==========================================================
document.addEventListener('DOMContentLoaded', function () {

    var FLIP_DURATION  = 3000;  // ms — how long the fold takes
    var STAY_MIN       = 2500;  // ms — minimum time showing back face
    var STAY_MAX       = 5000;  // ms — maximum time showing back face
    var WAIT_MIN       = 3000;  // ms — minimum wait before next flip
    var WAIT_MAX       = 10000; // ms — maximum wait before next flip
    var EASE           = 'cubic-bezier(0.645, 0.045, 0.355, 1.000)';

    function rand(min, max) {
        return min + Math.random() * (max - min);
    }

    function initTile(tile) {
        var front    = tile.querySelector('.mw-tile-front');
        var hover    = tile.querySelector('.mw-hover');
        var timer    = null;
        var hovered  = false;
        var flipped  = false;

        function setTransform(deg, duration) {
            front.style.transition = 'transform ' + duration + 'ms ' + EASE;
            front.style.transform  = 'perspective(900px) rotateY(' + deg + 'deg)';
        }

        function flipToBack() {
            if (hovered) return;
            flipped = true;
            setTransform(180, FLIP_DURATION);
            timer = setTimeout(flipToFront, rand(STAY_MIN, STAY_MAX));
        }

        function flipToFront() {
            if (hovered) return;
            flipped = false;
            setTransform(0, FLIP_DURATION);
            timer = setTimeout(flipToBack, rand(WAIT_MIN, WAIT_MAX));
        }

        // Start each tile at a random offset so they don't all flip together
        timer = setTimeout(flipToBack, rand(0, WAIT_MAX));

        // Hover: flip open instantly, keep open, show overlay
        tile.addEventListener('mouseenter', function () {
            hovered = true;
            clearTimeout(timer);
            setTransform(180, FLIP_DURATION);
        });

        tile.addEventListener('mouseleave', function () {
            hovered = false;
            setTransform(0, FLIP_DURATION);
            // Resume auto-flip after the tile returns to front
            timer = setTimeout(flipToBack, FLIP_DURATION + rand(WAIT_MIN, WAIT_MAX));
        });
    }

    document.querySelectorAll('.mw-tile').forEach(initTile);
});

// ==========================================================
// Load More Blogs — AJAX pagination
// ==========================================================
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.load-more-blogs-btn').forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            e.preventDefault();

            var page    = btn.dataset.page;
            var perPage = btn.dataset.perPage || 8;
            var url     = btn.dataset.url + '?page=' + page + '&per_page=' + perPage;
            var gridId  = btn.dataset.grid;
            var wrapId  = btn.dataset.wrap;

            btn.disabled = true;
            btn.innerHTML = '<i class="las la-spinner la-spin"></i> Loading…';

            fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                .then(function (res) { return res.json(); })
                .then(function (data) {
                    if (data.html) {
                        var grid = document.getElementById(gridId);
                        var wrap = document.getElementById(wrapId);
                        // insert new cards before the button wrap
                        wrap.insertAdjacentHTML('beforebegin', data.html);
                    }
                    if (data.has_more) {
                        btn.disabled = false;
                        btn.innerHTML = 'Load more Blogs <span class="load-more-blogs-arrow">↓</span>';
                        btn.dataset.page = data.next_page;
                    } else {
                        var wrap = document.getElementById(wrapId);
                        if (wrap) wrap.style.display = 'none';
                    }
                })
                .catch(function (err) {
                    console.error(err);
                    btn.disabled = false;
                    btn.innerHTML = 'Load more Blogs <span class="load-more-blogs-arrow">↓</span>';
                });
        });
    });
});
