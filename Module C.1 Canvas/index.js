/** @type {HTMLCanvasElement} */
var canvas = document.getElementById("cnv")
var ctx = canvas.getContext("2d")
let kiri = -30;
function RequestAnm() {
    kiri += 2
    if (kiri >= 430) {
        kiri = -30;
    }
    // bg
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.beginPath();
    ctx.fillStyle = "green";
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    // lingkaran
    ctx.stroke();
    ctx.beginPath();
    ctx.fillStyle = "white";
    ctx.arc(kiri, canvas.height / 2, 30, 0, 2 * Math.PI)
    ctx.fill();
    requestAnimationFrame(RequestAnm)
}

window.onload = () => {
    RequestAnm();
}