ready(colorsAddEvent());
ready(sizeAddEvent());

function ready(fn) {
    if (document.readyState === "complete" || document.readyState === "interactive") {
        setTimeout(fn, 1);
    } else {
        document.addEventListener("DOMContentLoaded", fn);
    }
}

function colorsAddEvent() {
    var colorContainer = document.getElementById("colorsList");

    var colors = colorContainer.getElementsByClassName("color");

    for (const color of colors) {
        console.log(color);
        color.addEventListener("click", () => {
            if (colorContainer.querySelector(".selected")) {
                colorContainer.querySelector(".selected").classList.remove("selected");
            }
            color.classList.add("selected");
            document.querySelector("#tshirt-image").src = `/storage/tshirt_base/` + color.querySelector("input").value + `.jpg`;
            document.getElementById("inputColorForm").value = color.querySelector("input").value;
        });
    }
}

function sizeAddEvent() {
    var sizeContainer = document.getElementById("sizesList");

    var sizes = sizeContainer.getElementsByClassName("size");

    for (const size of sizes) {
        size.addEventListener("click", () => {
            if (sizeContainer.querySelector(".selected")) {
                sizeContainer.querySelector(".selected").classList.remove("selected");
            }
            size.classList.add("selected");

            document.getElementById("inputSizeForm").value = size.querySelector("label").querySelector("input").value;
        });
    }
}
