
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // ── Hamburger / Sidebar Toggle ──────────────────────────────
    (function () {
        const sidebar       = document.getElementById('sidebar');
        const overlay       = document.getElementById('sidebar-overlay');
        const desktopBtn    = document.getElementById('hamburger-btn');
        const mobileBtn     = document.getElementById('mobile-hamburger-btn');

        const isMobile = () => window.innerWidth <= 768;

        function openMobile() {
            sidebar.classList.add('mobile-open');
            overlay.classList.add('active');
            if (mobileBtn) mobileBtn.classList.add('is-open');
            document.body.style.overflow = 'hidden';
        }

        function closeMobile() {
            sidebar.classList.remove('mobile-open');
            overlay.classList.remove('active');
            if (mobileBtn) mobileBtn.classList.remove('is-open');
            document.body.style.overflow = '';
        }

        function toggleDesktop() {
            sidebar.classList.toggle('collapsed');
            if (desktopBtn) desktopBtn.classList.toggle('is-open');
        }

        function handleToggle() {
            if (isMobile()) {
                sidebar.classList.contains('mobile-open') ? closeMobile() : openMobile();
            } else {
                toggleDesktop();
            }
        }

        if (desktopBtn) desktopBtn.addEventListener('click', handleToggle);
        if (mobileBtn)  mobileBtn.addEventListener('click', handleToggle);
        if (overlay)    overlay.addEventListener('click', closeMobile);

        // Close on nav link click (mobile)
        sidebar.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', () => { if (isMobile()) closeMobile(); });
        });

        // Handle window resize
        window.addEventListener('resize', () => {
            if (!isMobile()) closeMobile();
        });
    })();

    // Legacy shim so any inline onclick="toggleSidebar()" still works
    function toggleSidebar() {
        document.getElementById('hamburger-btn')?.click();
    }

    // Initialize Charts
    document.addEventListener('DOMContentLoaded', function() {
        // Shipment Volume Chart
        const shipmentCtx = document.getElementById('shipmentChart').getContext('2d');
        new Chart(shipmentCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                datasets: [{
                    label: 'Shipments',
                    data: [120, 150, 180, 200, 240, 280, 300],
                    borderColor: '#003366',
                    backgroundColor: 'rgba(0, 51, 102, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            drawBorder: false
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });

        // Status Distribution Chart
        const statusCtx = document.getElementById('statusChart').getContext('2d');
        new Chart(statusCtx, {
            type: 'doughnut',
            data: {
                labels: ['Delivered', 'In Transit', 'Processing', 'Pending'],
                datasets: [{
                    data: [45, 25, 20, 10],
                    backgroundColor: [
                        '#001f3f',
                        '#003366',
                        '#004080',
                        '#0056b3'
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                cutout: '70%',
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        // Set active nav link
        const currentPath = window.location.pathname;
        document.querySelectorAll('.nav-link').forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === currentPath) {
                link.classList.add('active');
            }
        });
    });

    // Notification click handler
    document.querySelector('.notification-btn').addEventListener('click', function() {
        alert('You have 3 unread notifications');
    });
</script>
</body>
</html>