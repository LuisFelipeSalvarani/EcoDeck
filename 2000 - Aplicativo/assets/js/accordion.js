let toggles = document.getElementsByClassName("accordion-button");
let contentDiv = document.getElementsByClassName("accordion-conteudo");

for(let i=0; i<toggles.length; i++){
    toggles[i].addEventListener('click', ()=>{
        if ( parseInt(contentDiv[i].style.height) != contentDiv[i].scrollHeight){
            contentDiv[i].style.height = contentDiv[i].scrollHeight + "px";
            toggles[i].classList.toggle("invert");
        }else{
            contentDiv[i].style.height = "0px";
            toggles[i].classList.remove("invert");
        }

        for(let j=0; j=contentDiv.length; j++){
            if(j!==i){
                contentDiv[j].style.height = "0px";
                toggles[i].classList.remove("invert");
            }
        }
    });
}