<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - KostManage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3a0ca3;
            --accent-color: #4cc9f0;
            --success-color: #2a9d8f;
            --warning-color: #e9c46a;
            --danger-color: #e63946;
            --light-bg: #f8f9fa;
            --sidebar-width: 250px;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light-bg);
            min-height: 100vh;
        }
        
        .dashboard-wrapper {
            display: flex;
            min-height: 100vh;
        }
        
        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            position: fixed;
            height: 100vh;
            transition: all 0.3s;
            z-index: 1000;
        }
        
        .sidebar-header {
            padding: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .app-logo {
            font-size: 1.5rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .app-logo i {
            color: var(--accent-color);
            font-size: 2rem;
        }
        
        .sidebar-menu {
            padding: 20px 0;
        }
        
        .nav-item {
            margin-bottom: 5px;
        }
        
        .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s;
            text-decoration: none;
        }
        
        .nav-link:hover, .nav-link.active {
            color: white;
            background: rgba(255,255,255,0.1);
            border-left: 4px solid var(--accent-color);
        }
        
        .nav-link i {
            width: 20px;
            text-align: center;
        }
        
        .sidebar-footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            padding: 20px;
            border-top: 1px solid rgba(255,255,255,0.1);
        }
        
        /* Main Content Styles */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            transition: all 0.3s;
        }
        
        .top-navbar {
            background: white;
            padding: 15px 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .search-box {
            width: 300px;
        }
        
        .user-menu {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .notification-badge {
            position: relative;
            cursor: pointer;
        }
        
        .badge-count {
            position: absolute;
            top: -5px;
            right: -5px;
            background: var(--danger-color);
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }
        
        /* Content Area */
        .content-area {
            padding: 30px;
        }
        
        .welcome-card {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 15px;
        }
        
        .icon-kamar { background: rgba(67, 97, 238, 0.1); color: var(--primary-color); }
        .icon-penyewa { background: rgba(42, 157, 143, 0.1); color: var(--success-color); }
        .icon-pendapatan { background: rgba(233, 196, 106, 0.1); color: var(--warning-color); }
        .icon-kosong { background: rgba(230, 57, 70, 0.1); color: var(--danger-color); }
        
        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .stat-label {
            color: #6c757d;
            font-size: 0.9rem;
        }
        
        .chart-container {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }
        
        .recent-activity {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        .activity-item {
            display: flex;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }
        
        .activity-item:last-child {
            border-bottom: none;
        }
        
        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        }
        
        .icon-success { background: rgba(42, 157, 143, 0.1); color: var(--success-color); }
        .icon-warning { background: rgba(233, 196, 106, 0.1); color: var(--warning-color); }
        .icon-info { background: rgba(76, 201, 240, 0.1); color: var(--accent-color); }
        
        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .menu-toggle {
                display: block !important;
            }
            
            .search-box {
                width: 200px;
            }
        }
        
        .menu-toggle {
            display: none;
            background: none;
            border: none;
            color: var(--primary-color);
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="dashboard-wrapper">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="app-logo">
                    <i class="bi bi-house-heart-fill"></i>
                    <span>KostManage</span>
                </div>
            </div>
            
            <nav class="sidebar-menu">
                <div class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="bi bi-speedometer2"></i>
                        <span>Dashboard</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="bi bi-door-closed"></i>
                        <span>Kamar</span>
                        <span class="badge bg-success ms-auto">12</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="bi bi-people"></i>
                        <span>Penyewa</span>
                        <span class="badge bg-info ms-auto">8</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="bi bi-cash-stack"></i>
                        <span>Pembayaran</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="bi bi-file-text"></i>
                        <span>Laporan</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="bi bi-gear"></i>
                        <span>Pengaturan</span>
                    </a>
                </div>
            </nav>
            
            <div class="sidebar-footer">
                <div class="user-profile">
                    <div class="user-avatar">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div>
                        <div class="fw-bold">{{ Auth::user()->name }}</div>
                        <small class="text-white-50">{{ Auth::user()->email }}</small>
                    </div>
                </div>
            </div>
        </aside>
        
        <!-- Main Content -->
        <main class="main-content" id="mainContent">
            <!-- Top Navbar -->
            <nav class="top-navbar">
                <div class="d-flex align-items-center gap-3">
                    <button class="menu-toggle" id="menuToggle">
                        <i class="bi bi-list"></i>
                    </button>
                    <div class="search-box">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                            <input type="text" class="form-control" placeholder="Cari kamar, penyewa...">
                        </div>
                    </div>
                </div>
                
                <div class="user-menu">
                    <div class="notification-badge">
                        <i class="bi bi-bell" style="font-size: 1.2rem;"></i>
                        <span class="badge-count">3</span>
                    </div>
                    <div class="dropdown">
                        <div class="user-profile dropdown-toggle" data-bs-toggle="dropdown">
                            <div class="user-avatar">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <div>
                                <div class="fw-bold">{{ Auth::user()->name }}</div>
                                <small class="text-muted">Admin</small>
                            </div>
                            <i class="bi bi-chevron-down"></i>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i> Profil</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i> Pengaturan</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            
            <!-- Content Area -->
            <div class="content-area">
                <!-- Welcome Card -->
                <div class="welcome-card">
                    <h3>Selamat Datang, {{ Auth::user()->name }}! 👋</h3>
                    <p class="mb-0">Berikut adalah ringkasan aktivitas kost Anda hari ini</p>
                </div>
                
                <!-- Stats Grid -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon icon-kamar">
                            <i class="bi bi-door-closed"></i>
                        </div>
                        <div class="stat-value">12</div>
                        <div class="stat-label">Total Kamar</div>
                        <small class="text-success"><i class="bi bi-arrow-up"></i> 2 kamar baru bulan ini</small>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon icon-penyewa">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <div class="stat-value">8</div>
                        <div class="stat-label">Penyewa Aktif</div>
                        <small class="text-success"><i class="bi bi-arrow-up"></i> 80% terisi</small>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon icon-pendapatan">
                            <i class="bi bi-cash-stack"></i>
                        </div>
                        <div class="stat-value">Rp 8.4JT</div>
                        <div class="stat-label">Pendapatan Bulan Ini</div>
                        <small class="text-success"><i class="bi bi-arrow-up"></i> 15% dari bulan lalu</small>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon icon-kosong">
                            <i class="bi bi-house-x"></i>
                        </div>
                        <div class="stat-value">4</div>
                        <div class="stat-label">Kamar Kosong</div>
                        <small class="text-warning"><i class="bi bi-clock"></i> Butuh perhatian</small>
                    </div>
                </div>
                
                <!-- Charts -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="chart-container">
                            <h5 class="mb-4">Pendapatan 6 Bulan Terakhir</h5>
                            <canvas id="revenueChart" height="250"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="chart-container">
                            <h5 class="mb-4">Status Kamar</h5>
                            <canvas id="roomStatusChart" height="250"></canvas>
                        </div>
                    </div>
                </div>
                
                <!-- Recent Activity -->
                <div class="recent-activity">
                    <h5 class="mb-4">Aktivitas Terbaru</h5>
                    
                    <div class="activity-item">
                        <div class="activity-icon icon-success">
                            <i class="bi bi-cash"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1">Pembayaran diterima</h6>
                            <p class="mb-0 text-muted">Budi Santoso membayar kamar A1 untuk bulan November</p>
                            <small class="text-muted">2 jam yang lalu</small>
                        </div>
                        <span class="badge bg-success">Rp 1.200.000</span>
                    </div>
                    
                    <div class="activity-item">
                        <div class="activity-icon icon-warning">
                            <i class="bi bi-exclamation-triangle"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1">Pembayaran terlambat</h6>
                            <p class="mb-0 text-muted">Siti Rahayu belum membayar kamar B3 (jatuh tempo 5 Nov)</p>
                            <small class="text-muted">1 hari yang lalu</small>
                        </div>
                        <span class="badge bg-warning text-dark">Tertunda</span>
                    </div>
                    
                    <div class="activity-item">
                        <div class="activity-icon icon-info">
                            <i class="bi bi-person-plus"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1">Penyewa baru</h6>
                            <p class="mb-0 text-muted">Rina Melati mendaftar sebagai penyewa kamar C2</p>
                            <small class="text-muted">3 hari yang lalu</small>
                        </div>
                        <span class="badge bg-info">Baru</span>
                    </div>
                    
                    <div class="activity-item">
                        <div class="activity-icon icon-success">
                            <i class="bi bi-check-circle"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1">Maintenance selesai</h6>
                            <p class="mb-0 text-muted">Perbaikan AC di kamar A3 telah selesai dilakukan</p>
                            <small class="text-muted">1 minggu yang lalu</small>
                        </div>
                        <span class="badge bg-success">Selesai</span>
                    </div>
                </div>
            </div>
        </main>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        // Toggle sidebar on mobile
        document.getElementById('menuToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });
        
        // Revenue Chart
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        const revenueChart = new Chart(revenueCtx, {
            type: 'line',
            data: {
                labels: ['Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt'],
                datasets: [{
                    label: 'Pendapatan (Juta)',
                    data: [7.2, 7.5, 8.0, 7.8, 8.2, 8.4],
                    borderColor: '#4361ee',
                    backgroundColor: 'rgba(67, 97, 238, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + value + 'JT';
                            }
                        }
                    }
                }
            }
        });
        
        // Room Status Chart
        const roomCtx = document.getElementById('roomStatusChart').getContext('2d');
        const roomChart = new Chart(roomCtx, {
            type: 'doughnut',
            data: {
                labels: ['Terisi', 'Kosong', 'Maintenance'],
                datasets: [{
                    data: [8, 3, 1],
                    backgroundColor: [
                        '#2a9d8f',
                        '#e63946',
                        '#e9c46a'
                    ],
                    borderWidth: 2,
                    borderColor: '#fff'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
        
        // Auto-close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            const menuToggle = document.getElementById('menuToggle');
            
            if (window.innerWidth <= 768 && 
                !sidebar.contains(event.target) && 
                !menuToggle.contains(event.target) &&
                sidebar.classList.contains('active')) {
                sidebar.classList.remove('active');
            }
        });
        
        // Update user name from Laravel auth
        document.addEventListener('DOMContentLoaded', function() {
            // Update all user name elements
            const userElements = document.querySelectorAll('.user-avatar, .user-profile .fw-bold');
            userElements.forEach(el => {
                if (el.classList.contains('user-avatar')) {
                    el.textContent = '{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}';
                } else if (el.classList.contains('fw-bold')) {
                    el.textContent = '{{ Auth::user()->name }}';
                }
            });
        });
    </script>
</body>
</html>