if (document.querySelector('.current')) {
    document.querySelector('.current').classList.remove("current");
}

switch (window.location.pathname) {
    case "/":
        document.querySelector("#homePageLink").classList.add("current");
        break;

    case "/catalog":
        document.querySelector("#stampsPageLink").classList.add("current");
        break;

    case "/costumize":
        document.querySelector("#costumizePageLink").classList.add("current");
        break;

    case "/contacts":
        document.querySelector("#contactsPageLink").classList.add("current");
        break;

    default:
        break;
}
