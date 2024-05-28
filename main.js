function scrollCarousel(direction) {
    const carousel = document.querySelector(".carousel");
    const scrollAmount = direction * carousel.offsetWidth;
    carousel.scrollBy({
        left: scrollAmount,
        behavior: "smooth",
    });
}


function showPage(pageId, event, category) {
    event.preventDefault(); // Prevent the default behavior of the anchor element

    // Get the current category container
    var categoryContainer = document.querySelector(`.${category}`);

    // Hide all pages in the current category
    var allPages = categoryContainer.querySelectorAll(".page");
    allPages.forEach(function(page) {
        page.classList.remove("active");
    });

    // Show the selected page in the current category
    var selectedPage = categoryContainer.querySelector(`#${pageId}`);
    selectedPage.classList.add("active");
}

function openModal(modalId) {
    document.getElementById(modalId).style.display = "block";
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = "none";
}

// Close the modal when the user clicks anywhere outside of the modal
window.onclick = function(event) {
    if (event.target.classList.contains('modal')) {
        event.target.style.display = "none";
    }
}

function toggleDropdown() {
    var dropdownContent = document.getElementById("dropdownContent");
    dropdownContent.style.display = (dropdownContent.style.display === "none") ? "block" : "none";
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.gg-chevron-down')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.style.display === "block") {
                openDropdown.style.display = "none";
            }
        }
    }
}
