var i = 0;
var cls = document.querySelectorAll(".main span");
var Timer

function clear() {
    i = 0;
    cls.forEach(element => {
        element.classList.remove("remove");
    });

}
function Mulai() {
    Timer = setInterval(() => {
        console.log(i);
        if (i >= cls.length) {
            clear();
        } else {
            cls[i].classList.add("remove");
            i++
        }
    }, 1000);
}

window.onresize = () => {
    clearInterval(Timer);
    clear();
    Mulai();
}


Mulai();