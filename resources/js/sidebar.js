document.addEventListener("DOMContentLoaded", function () {
    const hamburgerButton = document.getElementById("hamburger-button");
    const sidebar = document.getElementById("sidebar");
    const closeButton = document.getElementById("close-button");

    function openSidebar() {
        sidebar.classList.remove("-translate-x-full", "md:translate-x-0");
    }

    function closeSidebar() {
        sidebar.classList.add("-translate-x-full", "md:translate-x-0");
    }

    if (hamburgerButton) {
        hamburgerButton.addEventListener("click", function () {
            openSidebar();
        });
    }

    if (closeButton) {
        closeButton.addEventListener("click", function () {
            closeSidebar();
        });
    }

    document.addEventListener("click", function (event) {
        if (
            !sidebar.contains(event.target) &&
            !hamburgerButton.contains(event.target)
        ) {
            closeSidebar();
        }
    });
});
