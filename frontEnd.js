var dom;
var box;

function getElementDOM()
{
    dom = document.querySelector("select");
    box = document.getElementById("textBox");    
    dom.addEventListener("change", textBox, false);
}

function textBox()
{
    switch(dom.selectedIndex)
    {
        case 0:
        case 1:            
        case 2:            
        case 3:
            box.style.visibility = "visible";
            break;
        default: 
            box.style.visibility = "hidden";
    }
}
window.addEventListener("load", getElementDOM, false);