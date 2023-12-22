let sidebarOpen = false;
const sidebar = document.getElementById("sidebar");

function toggleSidebar() {
    if (sidebarOpen) {
        closeSidebar();
    } else {
        openSidebar();
    }
}

function openSidebar() {
    console.log("sidebar opened");
    sidebar.classList.add("sidebar-responsive");
    sidebarOpen = true;
}

function closeSidebar() {
    sidebar.classList.remove("sidebar-responsive");
    sidebarOpen = false;
}
