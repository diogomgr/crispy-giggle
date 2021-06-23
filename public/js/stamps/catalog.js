var list = document.getElementsByTagName("body")[0],
    selectedEstampas = [];
ready(() => {
    list = document.getElementById("bs-select-1") || document.getElementsByTagName("body")[0];

    selectedEstampas = list.querySelectorAll("li.selected");
});


function ready(fn) {
    if (document.readyState === "complete" || document.readyState === "interactive") {
        setTimeout(fn, 1);
    } else {
        document.addEventListener("DOMContentLoaded", fn);
    }
}

function selectedCategory(badgeName, badgeId) {
    var classBadges = document.getElementById("listBadges");
    var badge = document.createElement("span");
    var listInput = document.querySelector("#listOfCategories");
    if (classBadges.querySelector("#" + badgeId) != null) {
        return;
    }
    badge.classList.add("badge", "category-badge");
    badge.id = badgeId;
    badge.textContent = badgeName;
    badge.addEventListener("click", () => {
        badge.remove();
        listInput.value = listInput.value.replace(badgeId + ';', '');
    });

    listInput.value += badgeId + ';';
    classBadges.append(badge);
}
