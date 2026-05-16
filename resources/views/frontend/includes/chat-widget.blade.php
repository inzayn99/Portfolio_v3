<style>
    /* ── Trigger button ─────────────────────────────────────────── */
    #aiChatBtn {
        position: fixed;
        bottom: 28px;
        right: 28px;
        z-index: 9999;
        width: 54px;
        height: 54px;
        border-radius: 50%;
        background: #1E1E1E;
        border: 1.5px solid #42d392;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 0 18px rgba(66,211,146,.25), 0 4px 20px rgba(0,0,0,.6);
        transition: transform .2s, box-shadow .2s, border-color .2s;
    }
    #aiChatBtn:hover {
        transform: scale(1.08);
        box-shadow: 0 0 28px rgba(66,211,146,.45), 0 6px 24px rgba(0,0,0,.7);
        border-color: #5de0a5;
    }
    #aiChatBtn svg { width: 22px; height: 22px; fill: #42d392; }
    #aiChatBtn .ai-close-icon { display: none; }
    #aiChatBtn.open .ai-chat-icon { display: none; }
    #aiChatBtn.open .ai-close-icon { display: block; }

    /* ── Chat window ────────────────────────────────────────────── */
    #aiChatWindow {
        position: fixed;
        bottom: 96px;
        right: 28px;
        z-index: 9998;
        width: 340px;
        max-height: 490px;
        background: #1E1E1E;
        border: 1px solid rgba(66,211,146,.18);
        border-radius: 14px;
        display: flex;
        flex-direction: column;
        box-shadow: 0 0 40px rgba(66,211,146,.08), 0 20px 60px rgba(0,0,0,.8);
        transform: scale(0.92) translateY(12px);
        opacity: 0;
        pointer-events: none;
        transition: opacity .22s, transform .22s;
        overflow: hidden;
    }
    #aiChatWindow.visible {
        opacity: 1;
        transform: scale(1) translateY(0);
        pointer-events: all;
    }

    /* ── Header ─────────────────────────────────────────────────── */
    .aic-header {
        padding: 13px 16px 12px;
        background: #171717;
        border-bottom: 1px solid rgba(66,211,146,.12);
        display: flex;
        align-items: center;
        gap: 11px;
        flex-shrink: 0;
    }
    .aic-avatar {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: #252525;
        border: 1.5px solid #42d392;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(66,211,146,.2);
    }
    .aic-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }
    .aic-header-text h5 {
        margin: 0;
        font-size: 13.5px;
        font-weight: 700;
        color: #fff;
        letter-spacing: .3px;
    }
    .aic-header-status {
        display: flex;
        align-items: center;
        gap: 5px;
        margin-top: 2px;
    }
    .aic-status-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #42d392;
        box-shadow: 0 0 6px #42d392;
        animation: aicPulse 2s infinite;
    }
    @keyframes aicPulse {
        0%, 100% { opacity: 1; }
        50%       { opacity: .4; }
    }
    .aic-header-status span {
        font-size: 11px;
        color: #42d392;
    }

    /* ── Messages ───────────────────────────────────────────────── */
    .aic-messages {
        flex: 1;
        overflow-y: auto;
        padding: 14px 13px 8px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        scrollbar-width: thin;
        scrollbar-color: rgba(66,211,146,.12) transparent;
    }
    .aic-messages::-webkit-scrollbar { width: 3px; }
    .aic-messages::-webkit-scrollbar-thumb {
        background: rgba(66,211,146,.15);
        border-radius: 4px;
    }

    .aic-msg {
        max-width: 84%;
        font-size: 12.5px;
        line-height: 1.55;
        padding: 9px 13px;
        border-radius: 12px;
        word-break: break-word;
    }
    .aic-msg.bot {
        background: #282828;
        border: 1px solid rgba(66,211,146,.1);
        color: #ccc;
        align-self: flex-start;
        border-bottom-left-radius: 3px;
    }
    .aic-msg.user {
        background: #42d392;
        color: #050505;
        font-weight: 500;
        align-self: flex-end;
        border-bottom-right-radius: 3px;
    }
    .aic-msg.typing {
        background: #282828;
        border: 1px solid rgba(66,211,146,.08);
        color: #42d392;
        align-self: flex-start;
        font-size: 12px;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .aic-dots span {
        display: inline-block;
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background: #42d392;
        animation: aicDot .9s infinite;
    }
    .aic-dots span:nth-child(2) { animation-delay: .2s; }
    .aic-dots span:nth-child(3) { animation-delay: .4s; }
    @keyframes aicDot {
        0%, 80%, 100% { opacity: .2; transform: scale(.8); }
        40%            { opacity: 1;  transform: scale(1); }
    }

    /* ── Suggestion chips ───────────────────────────────────────── */
    .aic-suggestions {
        padding: 2px 13px 11px;
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
        flex-shrink: 0;
    }
    .aic-chip {
        background: transparent;
        border: 1px solid rgba(66,211,146,.3);
        color: #42d392;
        font-size: 11px;
        padding: 5px 11px;
        border-radius: 20px;
        cursor: pointer;
        transition: background .15s, border-color .15s;
        white-space: nowrap;
    }
    .aic-chip:hover {
        background: rgba(66,211,146,.1);
        border-color: #42d392;
    }

    /* ── Input row ──────────────────────────────────────────────── */
    .aic-input-row {
        padding: 10px 12px;
        background: #171717;
        border-top: 1px solid rgba(66,211,146,.1);
        display: flex;
        gap: 8px;
        align-items: center;
        flex-shrink: 0;
    }
    #aiChatInput {
        flex: 1;
        background: #252525;
        border: 1px solid rgba(66,211,146,.18);
        border-radius: 20px;
        padding: 8px 15px;
        font-size: 12.5px;
        color: #e0e0e0;
        outline: none;
        transition: border-color .15s, box-shadow .15s;
    }
    #aiChatInput:focus {
        border-color: rgba(66,211,146,.5);
        box-shadow: 0 0 0 3px rgba(66,211,146,.06);
    }
    #aiChatInput::placeholder { color: #555; }

    #aiChatSend {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        background: #42d392;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        transition: background .15s, transform .15s, opacity .15s;
    }
    #aiChatSend:hover { background: #5de0a5; transform: scale(1.06); }
    #aiChatSend:disabled { opacity: .35; cursor: not-allowed; transform: none; }
    #aiChatSend svg { width: 14px; height: 14px; fill: #050505; }

    /* ── Powered-by footer ──────────────────────────────────────── */
    .aic-powered {
        text-align: center;
        padding: 5px 0 8px;
        font-size: 10px;
        color: #444;
        background: #171717;
        flex-shrink: 0;
    }
    .aic-powered span { color: #42d392; opacity: .5; }

    @media (max-width: 480px) {
        #aiChatWindow { width: calc(100vw - 32px); right: 16px; bottom: 84px; }
        #aiChatBtn { right: 16px; bottom: 16px; }
    }
</style>

{{-- Trigger button --}}
<button id="aiChatBtn" title="Chat with Jenny">
    <svg class="ai-chat-icon" viewBox="0 0 24 24">
        <path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2 10H6V10h12v2zm0-3H6V7h12v2z"/>
    </svg>
    <svg class="ai-close-icon" viewBox="0 0 24 24">
        <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
    </svg>
</button>

{{-- Chat window --}}
<div id="aiChatWindow">

    <div class="aic-header">
        <div class="aic-avatar">
            <img src="{{ asset('frontend/assets/images/jenny-avatar.avif') }}" alt="Jenny" width="38" height="38">
        </div>
        <div class="aic-header-text">
            <h5>Jenny</h5>
            <div class="aic-header-status">
                <div class="aic-status-dot"></div>
                <span>AI Assistant • Knows Arbaaz's work</span>
            </div>
        </div>
    </div>

    <div class="aic-messages" id="aicMessages">
        <div class="aic-msg bot">
            Hey! 👋 I'm Jenny, Arbaaz's AI assistant. I know all about his projects, skills, and blog posts — ask me anything!
        </div>
    </div>

    <div class="aic-suggestions" id="aicSuggestions">
        <span class="aic-chip">What projects has he built?</span>
        <span class="aic-chip">What are his skills?</span>
        <span class="aic-chip">Latest blog posts?</span>
        <span class="aic-chip">How to contact him?</span>
    </div>

    <div class="aic-input-row">
        <input type="text" id="aiChatInput" placeholder="Ask about projects, skills…" maxlength="300" autocomplete="off">
        <button id="aiChatSend" title="Send">
            <svg viewBox="0 0 24 24"><path d="M2 21l21-9L2 3v7l15 2-15 2z"/></svg>
        </button>
    </div>

    <div class="aic-powered">Powered by <span>Claude AI</span></div>
</div>

<script>
(function () {
    var btn       = document.getElementById('aiChatBtn');
    var win       = document.getElementById('aiChatWindow');
    var msgs      = document.getElementById('aicMessages');
    var input     = document.getElementById('aiChatInput');
    var sendBtn   = document.getElementById('aiChatSend');
    var chips     = document.getElementById('aicSuggestions');
    var chatUrl   = '{{ route("chat.send") }}';
    var csrfToken = '{{ csrf_token() }}';

    btn.addEventListener('click', function () {
        btn.classList.toggle('open');
        win.classList.toggle('visible');
        if (win.classList.contains('visible')) {
            setTimeout(function () { input.focus(); }, 200);
        }
    });

    chips.addEventListener('click', function (e) {
        if (e.target.classList.contains('aic-chip')) {
            input.value = e.target.textContent;
            chips.style.display = 'none';
            send();
        }
    });

    input.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' && !e.shiftKey) { e.preventDefault(); send(); }
    });
    sendBtn.addEventListener('click', send);

    function send() {
        var text = input.value.trim();
        if (!text) return;
        input.value = '';
        chips.style.display = 'none';

        addMsg(text, 'user');

        var typingEl = document.createElement('div');
        typingEl.className = 'aic-msg typing';
        typingEl.innerHTML = '<div class="aic-dots"><span></span><span></span><span></span></div>';
        msgs.appendChild(typingEl);
        msgs.scrollTop = msgs.scrollHeight;

        sendBtn.disabled = true;

        fetch(chatUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify({ message: text })
        })
        .then(function (r) { return r.json(); })
        .then(function (data) {
            typingEl.remove();
            addMsg(data.error || data.reply || 'No response.', 'bot');
        })
        .catch(function () {
            typingEl.remove();
            addMsg('Something went wrong. Please try again.', 'bot');
        })
        .finally(function () {
            sendBtn.disabled = false;
            input.focus();
        });
    }

    function addMsg(text, type) {
        var el = document.createElement('div');
        el.className = 'aic-msg ' + type;
        el.textContent = text;
        msgs.appendChild(el);
        msgs.scrollTop = msgs.scrollHeight;
        return el;
    }
})();
</script>
