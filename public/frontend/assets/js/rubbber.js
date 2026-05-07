const textEl = document.querySelectorAll('.rubber_band');
textEl.forEach(elm => {
    const text = elm.textContent;
    const letters = text.split("");
    let html = "";
    const makespan = letter => `<span class="letter">${letter}</span>`;
    letters.forEach(function(letter){
        if(letter == " "){ html += ` `; }
        else { html += makespan(letter); }
    });
    elm.innerHTML = html;
    let hoverEl = document.querySelectorAll('.letter');
    hoverEl.forEach(function(letter){
        letter.addEventListener('mouseover', hover);
        function hover(e){
            e.target.classList.add("rubber_band_animation");
            let close_hover = setInterval(function(){
                e.target.classList.remove("rubber_band_animation");
                clearInterval(close_hover);
            }, 1000);
        }
    });
});
