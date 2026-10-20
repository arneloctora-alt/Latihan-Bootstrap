
document.addEventListener("DOMContentLoaded", function () {

    // MENU DAN AUTO SCROLL
    const navLinks = document.querySelectorAll(
        '.navbar .nav-link[href^="#"]'
    );

    const sections = document.querySelectorAll(
        "section[id]"
    );

    function setActiveMenu(id) {
        navLinks.forEach(function (link) {
            const active = link.getAttribute("href") === "#" + id;

            link.classList.toggle("active", active);

            if (active) {
                link.setAttribute("aria-current", "page");
            } else {
                link.removeAttribute("aria-current");
            }
        });
    }

    // Saat menu diklik
    navLinks.forEach(function (link) {
        link.addEventListener("click", function (event) {
            const id = link.getAttribute("href").substring(1);
            const target = document.getElementById(id);

            if (!target) return;

            event.preventDefault();

            setActiveMenu(id);

            target.scrollIntoView({
                behavior: "smooth",
                block: "start"
            });

            // Tutup navbar pada tampilan mobile
            const menu = document.getElementById("menu");
            if (menu && menu.classList.contains("show")) {
                bootstrap.Collapse.getOrCreateInstance(menu).hide();
            }

            history.replaceState(null, "", "#" + id);
        });
    });

    // Menu aktif mengikuti section yang terlihat
    const observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                setActiveMenu(entry.target.id);
            }
        });
    }, {
        rootMargin: "-25% 0px -60% 0px",
        threshold: 0
    });

    sections.forEach(function (section) {
        observer.observe(section);
    });

    // GRAFIK CHART.JS PADA SECTION ABOUT
    const canvas = document.getElementById("aboutChart");

    if (canvas && typeof Chart !== "undefined") {
        new Chart(canvas, {
            type: "bar",

            data: {
                labels: [
                    "Januari",
                    "Februari",
                    "Maret",
                    "April",
                    "Mei",
                    "Juni"
                ],

                datasets: [{
                    label: "Jumlah Kegiatan",
                    data: [4, 6, 5, 8, 7, 10],
                    backgroundColor: "rgba(13, 110, 253, 0.65)",
                    borderColor: "rgb(13, 110, 253)",
                    borderWidth: 1,
                    borderRadius: 5
                }]
            },

            options: {
                responsive: true,

                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        },
                        title: {
                            display: true,
                            text: "Jumlah Kegiatan"
                        }
                    },

                    x: {
                        title: {
                            display: true,
                            text: "Bulan"
                        }
                    }
                },

                plugins: {
                    legend: {
                        display: true
                    },

                    title: {
                        display: true,
                        text: "Statistik Kegiatan PKMB Tangkil"
                    }
                }
            }
        });
    }
});
