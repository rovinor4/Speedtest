var jam = 0;
var detik = 0;


function ubahWaktuJam(jam) {
    var x = jam.split("");

    document.getElementById("jam1").className = x[0] > 0 ? "angka a" + x[0] : "angka";
    document.getElementById("jam2").className = x[1] > 0 || x[0] > 0 ? "angka a" + x[1] : "angka";
    document.getElementById("jam3").className = x[2] > 0 || x[1] > 0 ? "angka a" + x[2] : "angka";
}
function ubahWaktuDetik(detik) {
    var x = detik.split("");
    document.getElementById("det1").className = x[0] > 0 ? "angka a" + x[0] : "angka";
    document.getElementById("det2").className = x[1] > 0 ? "angka a" + x[1] : "angka";
}

var strp;
document.getElementById("str").onclick = () => {
    strp = setInterval(() => {
        detik++;
        if (detik > 59) {
            detik = 0;
            jam++;
        }
        ubahWaktuJam(jam.toString().padStart(3, '0'));
        ubahWaktuDetik(detik.toString().padStart(2, '0'));
    }, 10);

}


document.getElementById("stp").onclick = () => {
    clearInterval(strp);
}

document.getElementById("rs").onclick = () => {
    jam = 0
    detik = 0
    ubahWaktuJam(jam.toString().padStart(3, '0'));
    ubahWaktuDetik(detik.toString().padStart(2, '0'));
}





