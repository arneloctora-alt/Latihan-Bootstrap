<?php
require_once 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PKMB GBI TANGKIL</title>

    <!-- Bootstrap CSS lokal -->
    <link rel="stylesheet" href="bootstrap.min.css">

    <!-- CSS website yang sudah ada -->
    <link rel="stylesheet" href="style.css">

    <!-- jQuery dipertahankan sesuai kode awal -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- CSS tambahan: desain dipertahankan -->
    <style>
        html {
            scroll-behavior: smooth;
            scroll-padding-top: 80px;
        }

        section[id] {
            scroll-margin-top: 80px;
        }

        .navbar .nav-link {
            transition: color 0.3s ease;
        }

        .navbar .nav-link.active {
            color: #0d6efd !important;
            font-weight: bold;
        }

        .chart-container {
            position: relative;
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        #aboutChart {
            width: 100% !important;
        }

        @media (prefers-reduced-motion: reduce) {
            html {
                scroll-behavior: auto;
            }
        }
    </style>
</head>

<body>

    <!-- ================= NAVBAR ================= -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">

            <a class="navbar-brand" href="#home">
                <img
                    src="img/pkmb.jpg"
                    class="logo"
                    alt="Logo PKMB Tangkil">
            </a>

            <a class="navbar-brand" href="#home">
                PKMB TANGKIL
            </a>

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menu"
                aria-controls="menu"
                aria-expanded="false"
                aria-label="Buka navigasi">

                <span class="navbar-toggler-icon"></span>
            </button>

            <div
                class="collapse navbar-collapse justify-content-end"
                id="menu">

                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link active"
                           href="#home"
                           aria-current="page">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#contactus">Contact Us</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Feedback</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>


    <!-- ================= HOME ================= -->

    <section
        id="home"
        class="hero d-flex align-items-center text-center">

        <div class="container">

            <h1>PKMB GBI TANGKIL</h1>

            <p>Welcome to Our Website</p>

            <a
                href="#services"
                class="btn btn-light js-scroll-link">
                Learn More
            </a>

        </div>
    </section>


    <!-- ================= SERVICES ================= -->

    <section id="services" class="services py-5">

        <div class="container">

            <div class="text-center mb-5">

                <img
                    src="img/pngegg.png"
                    class="service-img img-fluid"
                    alt="Activities">

                <h2>Activities</h2>

                <p class="activities-desc">
                    Discover our activities, grow together in faith, and build meaningful
                    friendships through fellowship, sharing, and learning.
                </p>

            </div>

            <div class="row">
                <?php
                $sql = "SELECT * FROM kegiatan";
                $result = mysqli_query($conn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($kegiatan = mysqli_fetch_assoc($result)) {
                ?>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="service-box">

                            <h3>
                                <?= htmlspecialchars($kegiatan['judul']) ?>
                            </h3>

                            <?php if (!empty($kegiatan['jadwal'])) { ?>
                                <p>
                                    <?= htmlspecialchars($kegiatan['jadwal']) ?>
                                </p>
                            <?php } ?>

                            <p class="activity-desc">
                                <?= htmlspecialchars($kegiatan['deskripsi']) ?>
                            </p>

                        </div>
                    </div>

                <?php
                    }
                } else {
                    echo '<p class="text-center">Belum ada kegiatan.</p>';
                }
                ?>
            </div>

        </div>
    </section>


    <!-- ================= ABOUT ================= -->

    <section id="about" class="about py-5">

        <div class="container">

            <div class="text-center mb-4">
                <h2>About</h2>
                <p>About PKMB Tangkil</p>
            </div>

            <div class="row align-items-center">

                <!-- TEXT -->
                <div class="col-lg-6 mb-4 mb-lg-0">

                    <h3>PKMB GBI TANGKIL</h3>

                    <p>
                        We are a youth group from the Tangkil Indonesian Baptist Church,
                        a community of young people who come together to grow in faith,
                        build meaningful friendships, and serve God and others.

                        Under the guidance of our pastor, Pdt. Tatit Kristianto,
                        we seek to create a positive and supportive environment where
                        every young person can learn about God's Word, develop their
                        talents, and become an active part of the church and community.

                        Through worship, fellowship, service, and various youth activities,
                        we strive to grow together in faith and become young people who
                        reflect God's love in our daily lives.
                    </p>

                </div>

                <!-- GAMBAR -->
                <div class="col-lg-6">

                    <h3>Performance</h3>

                    <img
                        src="img/pkmb_all_new.jpg"
                        class="img-fluid rounded"
                        alt="Performance PKMB Tangkil">

                </div>

            </div>


            <!-- ================= GRAFIK CHART.JS ================= -->

            <div class="row mt-5">

                <div class="col-12">

                    <div class="text-center mb-4">

                        <h3>PKMB Statistics</h3>

                        <p>Monthly Youth Activity Statistics</p>

                    </div>

                    <div class="chart-container">

                        <canvas
                            id="aboutChart"
                            role="img"
                            aria-label="Grafik statistik kegiatan PKMB Tangkil">

                            Grafik statistik kegiatan PKMB Tangkil.

                        </canvas>

                    </div>

                </div>

            </div>

        </div>
    </section>


    <!-- ================= CONTACT US ================= -->

    <section id="contactus" class="contactus py-5">

        <div class="container">

            <div class="text-center mb-5">

                <img
                    src="img/KONTAK.png"
                    class="service-img img-fluid"
                    alt="Contact Us">

                <h2>Contact Us</h2>

            </div>

            <div class="row">

                <!-- INSTAGRAM -->
                <div class="col-lg-4 col-md-6 mb-4">

                    <div class="service-box">

                        <img
                            src="img/instagram.jpg"
                            class="service-img img-fluid"
                            alt="Instagram">

                        <p>
                            <a
                                href="https://www.instagram.com/tangkilbaptistyouth/"
                                target="_blank"
                                rel="noopener noreferrer">
                                @tangkilbaptistyouth
                            </a>
                        </p>

                    </div>

                </div>

                <!-- WHATSAPP -->
                <div class="col-lg-4 col-md-6 mb-4">

                    <div class="service-box">

                        <img
                            src="img/waaa.jpg"
                            class="service-img img-fluid"
                            alt="WhatsApp">

                        <p>
                            <a
                                href="https://wa.me/6288227351103"
                                target="_blank"
                                rel="noopener noreferrer">
                                +62 88227351103<br>
                            </a>
                        </p>

                    </div>

                </div>

                <!-- MAPS -->
                <div class="col-lg-4 col-md-6 mb-4">

                    <div class="service-box">

                        <img
                            src="img/maps.jpg"
                            class="service-img img-fluid"
                            alt="Lokasi PKMB Tangkil">

                        <p>
                            <a
                                href="https://maps.google.com/?q=Grompolan+Tangkil+Sragen"
                                target="_blank"
                                rel="noopener noreferrer">
                                Grompolan RT 02/07, Tangkil,
                                Sragen, Jawa Tengah
                            </a>
                        </p>

                    </div>

                </div>

            </div>

        </div>
    </section>


    <!-- ================= FEEDBACK ================= -->

    <section id="contact" class="contact py-5">

        <div class="container">

            <div class="text-center mb-4">
                <h2>Feedback</h2>
            </div>

            <form id="feedbackForm">

                <div class="row mb-3">

                    <div class="col-md-6 mb-3">

                        <input
                            type="text"
                            id="nama"
                            name="nama"
                            class="form-control"
                            placeholder="Nama"
                            required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control"
                            placeholder="Email"
                            required>

                    </div>

                </div>

                <div class="mb-3">

                    <textarea
                        id="pesan"
                        name="pesan"
                        class="form-control"
                        rows="5"
                        placeholder="Pesan"
                        required></textarea>

                </div>

                <button type="submit" class="btn btn-primary">
                    Send
                </button>

                <p
                    id="feedbackMessage"
                    class="mt-3"
                    aria-live="polite"></p>

            </form>

        </div>
    </section>


    <!-- ================= FOOTER ================= -->

    <footer class="footer text-center py-3">
        © 2026 Copyright PKMB TANGKIL
    </footer>


    <!-- ================= JAVASCRIPT LOKAL ================= -->

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/chart.js"></script>


    <!-- ================= JAVASCRIPT WEB-JS ================= -->

    <script>
        document.addEventListener("DOMContentLoaded", function () {

            // =====================================
            // 1. MENU ACTIVE DAN AUTO SCROLL
            // =====================================

            const navLinks = document.querySelectorAll(
                '.navbar .nav-link[href^="#"]'
            );

            const sections = document.querySelectorAll("section[id]");
            const menu = document.getElementById("menu");

            function setActiveMenu(sectionId) {

                navLinks.forEach(function (link) {

                    const targetId = link.getAttribute("href").substring(1);

                    if (targetId === sectionId) {
                        link.classList.add("active");
                        link.setAttribute("aria-current", "page");
                    } else {
                        link.classList.remove("active");
                        link.removeAttribute("aria-current");
                    }

                });
            }

            navLinks.forEach(function (link) {

                link.addEventListener("click", function (event) {

                    const targetId = link.getAttribute("href").substring(1);
                    const targetSection = document.getElementById(targetId);

                    if (!targetSection) {
                        return;
                    }

                    event.preventDefault();
                    setActiveMenu(targetId);

                    const reduceMotion = window.matchMedia(
                        "(prefers-reduced-motion: reduce)"
                    ).matches;

                    targetSection.scrollIntoView({
                        behavior: reduceMotion ? "auto" : "smooth",
                        block: "start"
                    });

                    if (
                        menu &&
                        menu.classList.contains("show") &&
                        window.bootstrap &&
                        window.bootstrap.Collapse
                    ) {
                        window.bootstrap.Collapse
                            .getOrCreateInstance(menu)
                            .hide();
                    }

                    history.replaceState(null, "", "#" + targetId);

                });
            });


            // =====================================
            // 2. ACTIVE MENU MENGIKUTI SCROLL
            // =====================================

            if ("IntersectionObserver" in window) {

                const observer = new IntersectionObserver(

                    function (entries) {

                        const visibleSections = entries
                            .filter(function (entry) {
                                return entry.isIntersecting;
                            })
                            .sort(function (a, b) {
                                return b.intersectionRatio - a.intersectionRatio;
                            });

                        if (visibleSections.length > 0) {
                            setActiveMenu(visibleSections[0].target.id);
                        }

                    },

                    {
                        root: null,
                        rootMargin: "-20% 0px -55% 0px",
                        threshold: [0, 0.1, 0.25, 0.5]
                    }

                );

                sections.forEach(function (section) {
                    observer.observe(section);
                });
            }


            // =====================================
            // 3. GRAFIK CHART.JS
            // =====================================

            const chartCanvas = document.getElementById("aboutChart");

            if (chartCanvas) {

                if (typeof Chart === "undefined") {

                    console.error(
                        "Chart.js tidak ditemukan. Periksa file js/chart.js."
                    );

                } else {

                    let aboutChart = null;

                    async function updateAboutChart() {

                        try {

                            const response = await fetch("data.php", {
                                cache: "no-store"
                            });

                            if (!response.ok) {
                                throw new Error(
                                    "HTTP error: " + response.status
                                );
                            }

                            const data = await response.json();

                            if (!Array.isArray(data)) {
                                throw new Error(
                                    "Respons data.php bukan array JSON: " +
                                    JSON.stringify(data)
                                );
                            }

                            const labels = data.map(function (item) {
                                return item.bulan;
                            });

                            const values = data.map(function (item) {
                                return Number(item.jumlah);
                            });

                            if (
                                values.some(function (value) {
                                    return !Number.isFinite(value);
                                })
                            ) {
                                throw new Error(
                                    "Ada nilai jumlah yang bukan angka."
                                );
                            }

                            if (aboutChart === null) {

                                aboutChart = new Chart(chartCanvas, {

                                    type: "bar",

                                    data: {
                                        labels: labels,

                                        datasets: [{
                                            label: "Jumlah Kegiatan",
                                            data: values,
                                            backgroundColor: "rgb(254, 228, 225)",
                                            borderColor: "rgb(254, 228, 225)",
                                            borderWidth: 1,
                                            borderRadius: 5
                                        }]
                                    },

                                    options: {
                                        responsive: true,
                                        maintainAspectRatio: true,

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
                                            },

                                            tooltip: {
                                                enabled: true
                                            }
                                        }
                                    }

                                });

                            } else {

                                aboutChart.data.labels = labels;
                                aboutChart.data.datasets[0].data = values;
                                aboutChart.update();

                            }

                            console.log("Data grafik berhasil dimuat:", data);

                        } catch (error) {

                            console.error("Grafik:", error);

                        }
                    }

                    // PENTING: jalankan fungsi grafik pertama kali.
                    updateAboutChart();

                    // Perbarui data setiap 5 detik.
                    setInterval(updateAboutChart, 5000);

                }
            }


            
            // =====================================
            // 4. FEEDBACK FORM - SIMPAN KE DATABASE
            // =====================================

            const feedbackForm = document.getElementById("feedbackForm");
            const feedbackMessage = document.getElementById("feedbackMessage");

            if (feedbackForm) {
                feedbackForm.addEventListener("submit", async function (event) {
                    event.preventDefault();

                    const submitButton = feedbackForm.querySelector(
                        'button[type="submit"]'
                    );

                    const originalText = submitButton.textContent;

                    submitButton.disabled = true;
                    submitButton.textContent = "Mengirim...";

                    try {
                        const response = await fetch("simpan_feedback.php", {
                            method: "POST",
                            body: new FormData(feedbackForm)
                        });

                        const result = await response.json();

                        if (!response.ok || !result.success) {
                            throw new Error(
                                result.message || "Feedback gagal dikirim."
                            );
                        }

                        alert(result.message);

                        feedbackMessage.textContent =
                            "Feedback berhasil terkirim.";

                        feedbackMessage.className = "mt-3 text-success";
                        feedbackForm.reset();

                    } catch (error) {
                        console.error("Feedback:", error);

                        alert(
                            error.message ||
                            "Feedback gagal dikirim. Silakan coba kembali."
                        );

                        feedbackMessage.textContent =
                            "Feedback gagal dikirim. Silakan coba kembali.";

                        feedbackMessage.className = "mt-3 text-danger";

                    } finally {
                        submitButton.disabled = false;
                        submitButton.textContent = originalText;
                    }
                });
            }
        });
                
            </script>

</body>
</html>
```