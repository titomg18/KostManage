<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Penyewa - KostManage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #667EEA;
            --primary-light: #8EA1FF;
            --primary-dark: #5A67D8;
            --secondary: #8B5CF6;
            --accent: #10B981;
            --warning: #F59E0B;
            --danger: #EF4444;
            --dark: #1F2937;
            --gray-800: #374151;
            --gray-700: #4B5563;
            --gray-600: #6B7280;
            --gray-500: #9CA3AF;
            --gray-400: #D1D5DB;
            --gray-300: #E5E7EB;
            --gray-200: #F3F4F6;
            --gray-100: #F9FAFB;
            --white: #FFFFFF;
            --sidebar-width: 280px;
            --border-radius-lg: 20px;
            --border-radius-md: 12px;
            --border-radius-sm: 8px;
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.07);
            --shadow-lg: 0 10px 25px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            background-color: var(--gray-100);
            color: var(--dark);
            min-height: 100vh;
            overflow-x: hidden;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
        }
        
        .dashboard-wrapper {
            display: flex;
            min-height: 100vh;
        }
        
        /* Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            background: var(--white);
            color: var(--gray-700);
            position: fixed;
            height: 100vh;
            transition: var(--transition);
            z-index: 1000;
            border-right: 1px solid var(--gray-300);
            padding: 24px 0;
            display: flex;
            flex-direction: column;
        }
        
        .sidebar-header {
            padding: 0 24px 24px;
            border-bottom: 1px solid var(--gray-200);
            margin-bottom: 24px;
        }
        
        .app-logo {
            font-size: 1.8rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--primary);
        }
        
        .app-logo i {
            font-size: 2.2rem;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .sidebar-menu {
            flex: 1;
            padding: 0 16px;
        }
        
        .nav-item {
            margin-bottom: 4px;
        }
        
        .nav-link {
            color: var(--gray-700);
            padding: 14px 16px;
            display: flex;
            align-items: center;
            gap: 14px;
            transition: var(--transition);
            text-decoration: none;
            border-radius: var(--border-radius-md);
            font-weight: 500;
            position: relative;
        }
        
        .nav-link:hover {
            color: var(--primary);
            background-color: var(--gray-100);
        }
        
        .nav-link.active {
            color: var(--white);
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }
        
        .nav-link i {
            font-size: 1.3rem;
            width: 24px;
            text-align: center;
            transition: var(--transition);
        }
        
        .sidebar-footer {
            padding: 24px;
            border-top: 1px solid var(--gray-200);
            margin-top: auto;
        }
        
        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            transition: var(--transition);
            background-color: var(--gray-100);
        }
        
        /* Top Navbar */
        .top-navbar {
            background-color: var(--white);
            padding: 20px 32px;
            box-shadow: var(--shadow-sm);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
            border-bottom: 1px solid var(--gray-300);
        }
        
        .navbar-left {
            display: flex;
            align-items: center;
            gap: 24px;
        }
        
        .menu-toggle {
            background: none;
            border: none;
            color: var(--gray-600);
            font-size: 1.5rem;
            cursor: pointer;
            transition: var(--transition);
            width: 40px;
            height: 40px;
            border-radius: var(--border-radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .menu-toggle:hover {
            background-color: var(--gray-100);
            color: var(--primary);
        }
        
        .search-box {
            width: 320px;
        }
        
        .search-box .input-group {
            border-radius: var(--border-radius-md);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gray-300);
        }
        
        .search-box .input-group-text {
            background-color: var(--white);
            border: none;
            color: var(--gray-500);
        }
        
        .search-box input {
            border: none;
            padding: 12px 15px;
            font-size: 0.95rem;
            background-color: var(--white);
        }
        
        .search-box input:focus {
            box-shadow: none;
            outline: none;
        }
        
        .navbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .notification-badge {
            position: relative;
            cursor: pointer;
            transition: var(--transition);
        }
        
        .notification-badge i {
            font-size: 1.4rem;
            color: var(--gray-600);
            transition: var(--transition);
        }
        
        .notification-badge:hover i {
            color: var(--primary);
        }
        
        .badge-count {
            position: absolute;
            top: -6px;
            right: -6px;
            background: linear-gradient(135deg, var(--danger), #F87171);
            color: var(--white);
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            border: 2px solid var(--white);
        }
        
        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
        }
        
        .user-avatar {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-weight: 700;
            font-size: 1.1rem;
            box-shadow: 0 4px 8px rgba(102, 126, 234, 0.3);
        }
        
        /* Content Area */
        .content-area {
            padding: 32px;
        }
        
        /* Header Section */
        .header-section {
            margin-bottom: 32px;
        }
        
        .header-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 8px;
        }
        
        .header-subtitle {
            color: var(--gray-600);
            font-size: 1rem;
        }
        
        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 24px;
            margin-bottom: 36px;
        }
        
        .stat-card {
            background-color: var(--white);
            border-radius: var(--border-radius-lg);
            padding: 24px;
            box-shadow: var(--shadow-md);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            border: 1px solid var(--gray-200);
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }
        
        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
        }
        
        .stat-icon {
            width: 56px;
            height: 56px;
            border-radius: var(--border-radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            color: var(--white);
        }
        
        .icon-penyewa { 
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
        }
        
        .icon-aktif { 
            background: linear-gradient(135deg, var(--accent), #34D399);
        }
        
        .icon-menunggak { 
            background: linear-gradient(135deg, var(--danger), #F87171);
        }
        
        .icon-nonaktif { 
            background: linear-gradient(135deg, var(--warning), #FBBF24);
        }
        
        .stat-trend {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 0.85rem;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 20px;
            background-color: var(--gray-100);
        }
        
        .trend-up {
            color: var(--accent);
        }
        
        .trend-down {
            color: var(--danger);
        }
        
        .stat-value {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 8px;
            color: var(--dark);
            font-family: 'Poppins', sans-serif;
        }
        
        .stat-label {
            color: var(--gray-600);
            font-size: 0.95rem;
            font-weight: 500;
            margin-bottom: 12px;
        }
        
        .stat-footer {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--gray-500);
            font-size: 0.85rem;
        }
        
        /* Table Styles */
        .table-container {
            background-color: var(--white);
            border-radius: var(--border-radius-lg);
            padding: 24px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--gray-200);
            margin-bottom: 36px;
        }
        
        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }
        
        .table-header h5 {
            font-weight: 600;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .table-header h5 i {
            color: var(--primary);
        }
        
        .table-responsive {
            border-radius: var(--border-radius-md);
            overflow: hidden;
            border: 1px solid var(--gray-300);
        }
        
        .table {
            margin-bottom: 0;
        }
        
        .table thead {
            background-color: var(--gray-100);
        }
        
        .table th {
            font-weight: 600;
            color: var(--gray-700);
            border-bottom: 2px solid var(--gray-300);
            padding: 16px;
        }
        
        .table td {
            padding: 16px;
            vertical-align: middle;
            border-color: var(--gray-300);
        }
        
        .table tbody tr {
            transition: var(--transition);
        }
        
        .table tbody tr:hover {
            background-color: var(--gray-50);
        }
        
        /* Status Badges */
        .badge-status {
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.8rem;
            border: none;
        }
        
        .badge-aktif {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--accent);
        }
        
        .badge-nonaktif {
            background-color: rgba(107, 114, 128, 0.1);
            color: var(--gray-600);
        }
        
        .badge-menunggak {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }
        
        /* Action Buttons */
        .btn-action {
            width: 36px;
            height: 36px;
            border-radius: var(--border-radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 2px;
            transition: var(--transition);
        }
        
        .btn-action:hover {
            transform: translateY(-2px);
        }
        
        /* Quick Actions */
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 36px;
        }
        
        .action-card {
            background-color: var(--white);
            border-radius: var(--border-radius-lg);
            padding: 20px;
            box-shadow: var(--shadow-md);
            transition: var(--transition);
            border: 1px solid var(--gray-200);
            text-align: center;
            cursor: pointer;
        }
        
        .action-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
            border-color: var(--primary);
        }
        
        .action-icon {
            width: 60px;
            height: 60px;
            border-radius: var(--border-radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            font-size: 1.8rem;
            color: var(--white);
            background: linear-gradient(135deg, var(--primary), var(--secondary));
        }
        
        .action-card h6 {
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--dark);
        }
        
        .action-card p {
            color: var(--gray-600);
            font-size: 0.9rem;
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .search-box {
                width: 250px;
            }
        }
        
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
            
            .search-box {
                display: none;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .top-navbar {
                padding: 16px 20px;
            }
            
            .content-area {
                padding: 20px;
            }
            
            .quick-actions {
                grid-template-columns: 1fr;
            }
        }
        
        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .fade-in {
            animation: fadeIn 0.5s ease-out;
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: var(--gray-200);
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, var(--primary-light), var(--primary));
        }
        
        /* Date Display */
        .date-display {
            background-color: var(--gray-100);
            padding: 8px 16px;
            border-radius: var(--border-radius-md);
            font-weight: 500;
            color: var(--gray-700);
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
        }
        
        /* Modal Styles */
        .modal-content {
            border-radius: var(--border-radius-lg);
            border: none;
            box-shadow: var(--shadow-lg);
        }
        
        .modal-header {
            background-color: var(--gray-100);
            border-bottom: 1px solid var(--gray-300);
            border-radius: var(--border-radius-lg) var(--border-radius-lg) 0 0;
            padding: 20px 24px;
        }
        
        .modal-footer {
            background-color: var(--gray-100);
            border-top: 1px solid var(--gray-300);
            border-radius: 0 0 var(--border-radius-lg) var(--border-radius-lg);
            padding: 20px 24px;
        }
        
        /* Form Styles */
        .form-control, .form-select {
            border-radius: var(--border-radius-md);
            border: 2px solid var(--gray-300);
            padding: 12px 16px;
            transition: var(--transition);
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        /* Alert Styles */
        .alert-custom {
            border-radius: var(--border-radius-md);
            border: none;
            box-shadow: var(--shadow-sm);
        }
    </style>
</head>
<body>
    <div class="dashboard-wrapper">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="app-logo">
                    <i class="bi bi-buildings"></i>
                    <span>KostManage</span>
                </div>
            </div>
            
            <nav class="sidebar-menu">
                <div class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="bi bi-house"></i>
                        <span>Dashboard</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('rooms.index') }}" class="nav-link">
                        <i class="bi bi-door-closed"></i>
                        <span>Kamar</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('penyewas.index') }}" class="nav-link active">
                        <i class="bi bi-people"></i>
                        <span>Penyewa</span>
                        @if(($totalPenyewa ?? 0) > 0)
                        <span class="badge bg-primary ms-auto" style="background: linear-gradient(135deg, var(--primary), var(--secondary))!important;">
                            {{ $totalPenyewa ?? 0 }}
                        </span>
                        @endif
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('payments.index') }}" class="nav-link">
                        <i class="bi bi-cash-coin"></i>
                        <span>Pembayaran</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="bi bi-file-earmark-text"></i>
                        <span>Laporan</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="bi bi-gear"></i>
                        <span>Pengaturan</span>
                    </a>
                </div>
                <div class="nav-item mt-4">
                    <a href="#" class="nav-link">
                        <i class="bi bi-question-circle"></i>
                        <span>Bantuan</span>
                    </a>
                </div>
            </nav>
            
            <div class="sidebar-footer">
                <div class="user-profile dropdown-toggle" data-bs-toggle="dropdown">
                    <div class="user-avatar">
                        {{ substr(Auth::user()->name, 0, 2) }}
                    </div>
                    <div>
                        <div class="fw-bold">{{ Auth::user()->name }}</div>
                        <small class="text-muted">{{ Auth::user()->role }}</small>
                    </div>
                </div>
                <div class="dropdown-menu dropdown-menu-end shadow-lg border-0">
                    <a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i> Profil</a>
                    <a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i> Pengaturan</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </aside>
        
        <!-- Main Content -->
        <main class="main-content" id="mainContent">
            <!-- Top Navbar -->
            <nav class="top-navbar">
                <div class="navbar-left">
                    <button class="menu-toggle" id="menuToggle">
                        <i class="bi bi-list"></i>
                    </button>
                    <div class="search-box d-none d-md-block">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                            <input type="text" class="form-control" placeholder="Cari penyewa..." id="searchInput">
                        </div>
                    </div>
                    <div class="date-display d-none d-lg-flex">
                        <i class="bi bi-calendar3"></i>
                        <span id="currentDate">Loading...</span>
                    </div>
                </div>
                
                <div class="navbar-right">
                    <div class="notification-badge">
                        <i class="bi bi-bell"></i>
                        <span class="badge-count">{{ $menunggakPenyewa ?? 0 }}</span>
                    </div>
                    <div class="user-profile dropdown-toggle" data-bs-toggle="dropdown">
                        <div class="user-avatar">
                            {{ substr(Auth::user()->name, 0, 2) }}
                        </div>
                        <div class="d-none d-md-block">
                            <div class="fw-bold">{{ Auth::user()->name }}</div>
                            <small class="text-muted">{{ Auth::user()->role }}</small>
                        </div>
                        <i class="bi bi-chevron-down d-none d-md-block"></i>
                    </div>
                </div>
            </nav>
            
            <!-- Content Area -->
            <div class="content-area">
                <!-- Header -->
                <div class="header-section">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h1 class="header-title">Manajemen Penyewa</h1>
                            <p class="header-subtitle">Kelola data penyewa kost Anda dengan mudah</p>
                        </div>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPenyewaModal">
                            <i class="bi bi-plus-circle me-2"></i>Tambah Penyewa
                        </button>
                    </div>
                </div>
                
                <!-- Stats Grid -->
                <div class="stats-grid">
                    <div class="stat-card fade-in">
                        <div class="stat-header">
                            <div class="stat-icon icon-penyewa">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <div class="stat-trend trend-up">
                                <i class="bi bi-arrow-up"></i>
                                Total
                            </div>
                        </div>
                        <div class="stat-value">{{ $totalPenyewa }}</div>
                        <div class="stat-label">Total Penyewa</div>
                        <div class="stat-footer">
                            <i class="bi bi-person-badge"></i>
                            <span>Semua penyewa terdaftar</span>
                        </div>
                    </div>
                    
                    <div class="stat-card fade-in" style="animation-delay: 0.1s;">
                        <div class="stat-header">
                            <div class="stat-icon icon-aktif">
                                <i class="bi bi-check-circle"></i>
                            </div>
                            <div class="stat-trend trend-up">
                                <i class="bi bi-arrow-up"></i>
                                {{ $totalPenyewa > 0 ? round(($aktifPenyewa/$totalPenyewa)*100, 0) : 0 }}%
                            </div>
                        </div>
                        <div class="stat-value">{{ $aktifPenyewa }}</div>
                        <div class="stat-label">Penyewa Aktif</div>
                        <div class="stat-footer">
                            <i class="bi bi-check2-all"></i>
                            <span>Penyewa berstatus aktif</span>
                        </div>
                    </div>
                    
                    <div class="stat-card fade-in" style="animation-delay: 0.2s;">
                        <div class="stat-header">
                            <div class="stat-icon icon-menunggak">
                                <i class="bi bi-exclamation-triangle"></i>
                            </div>
                            <div class="stat-trend trend-down">
                                <i class="bi bi-exclamation-triangle"></i>
                                Perhatian
                            </div>
                        </div>
                        <div class="stat-value">{{ $menunggakPenyewa }}</div>
                        <div class="stat-label">Menunggak</div>
                        <div class="stat-footer">
                            <i class="bi bi-clock"></i>
                            <span>Butuh penagihan</span>
                        </div>
                    </div>
                    
                    <div class="stat-card fade-in" style="animation-delay: 0.3s;">
                        <div class="stat-header">
                            <div class="stat-icon icon-nonaktif">
                                <i class="bi bi-person-x"></i>
                            </div>
                            <div class="stat-trend">
                                <i class="bi bi-info-circle"></i>
                                Non Aktif
                            </div>
                        </div>
                        <div class="stat-value">{{ $nonaktifPenyewa }}</div>
                        <div class="stat-label">Penyewa Nonaktif</div>
                        <div class="stat-footer">
                            <i class="bi bi-x-circle"></i>
                            <span>Penyewa sudah keluar</span>
                        </div>
                    </div>
                </div>
                
                <!-- Filter Section -->
                <div class="table-container fade-in">
                    <div class="table-header">
                        <h5><i class="bi bi-funnel"></i> Daftar Penyewa</h5>
                        <div class="d-flex gap-2">
                            <select class="form-select form-select-sm" style="width: auto;" id="statusFilter">
                                <option value="">Semua Status</option>
                                <option value="aktif">Aktif</option>
                                <option value="nonaktif">Nonaktif</option>
                                <option value="menunggak">Menunggak</option>
                            </select>
                            <button class="btn btn-sm btn-outline-primary" onclick="resetFilters()">
                                <i class="bi bi-arrow-clockwise"></i> Reset
                            </button>
                        </div>
                    </div>
                    
                    @if(session('success'))
                    <div class="alert alert-success alert-custom fade show mb-3" role="alert">
                        <i class="bi bi-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif
                    
                    @if(session('error'))
                    <div class="alert alert-danger alert-custom fade show mb-3" role="alert">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif
                    
                    <div class="table-responsive">
                        <table class="table table-hover" id="penyewasTable">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>No. KTP</th>
                                    <th>No. HP</th>
                                    <th>Email</th>
                                    <th>Kamar</th>
                                    <th>Status</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($penyewas as $penyewa)
                                <tr data-status="{{ $penyewa->status }}">
                                    <td>
                                        <div class="fw-bold">{{ $penyewa->nama }}</div>
                                        @if($penyewa->pekerjaan)
                                        <small class="text-muted">{{ $penyewa->pekerjaan }}</small>
                                        @endif
                                    </td>
                                    <td>{{ $penyewa->no_ktp }}</td>
                                    <td>{{ $penyewa->no_hp }}</td>
                                    <td>{{ $penyewa->email ?? '-' }}</td>
                                    <td>
                                        @if($penyewa->room)
                                            <div class="fw-bold">{{ $penyewa->room->nomor_kamar }}</div>
                                            <small class="text-muted">{{ $penyewa->room->tipe_kamar }}</small>
                                            <br>
                                            <small>Rp {{ number_format($penyewa->room->harga_sewa, 0, ',', '.') }}</small>
                                            <div class="mt-1">
                                                <button class="btn btn-sm btn-outline-danger remove-room-btn" 
                                                        onclick="removeRoomAssignment({{ $penyewa->id }}, '{{ $penyewa->nama }}')">
                                                    <i class="bi bi-house-x"></i> Kosongkan
                                                </button>
                                            </div>
                                        @else
                                            <span class="text-muted">-</span>
                                            <div class="mt-1">
                                                <button class="btn btn-sm btn-outline-primary assign-room-btn" 
                                                        data-id="{{ $penyewa->id }}"
                                                        data-nama="{{ $penyewa->nama }}">
                                                    <i class="bi bi-house-add"></i> Assign Kamar
                                                </button>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm dropdown-toggle status-badge 
                                                @if($penyewa->status == 'aktif') btn-success
                                                @elseif($penyewa->status == 'menunggak') btn-danger
                                                @else btn-secondary @endif"
                                                type="button" data-bs-toggle="dropdown">
                                                {{ ucfirst($penyewa->status) }}
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item change-status" 
                                                       href="#"
                                                       data-id="{{ $penyewa->id }}"
                                                       data-status="aktif">
                                                        <i class="bi bi-check-circle text-success me-2"></i>Aktif
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item change-status" 
                                                       href="#"
                                                       data-id="{{ $penyewa->id }}"
                                                       data-status="nonaktif">
                                                        <i class="bi bi-x-circle text-secondary me-2"></i>Nonaktif
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item change-status" 
                                                       href="#"
                                                       data-id="{{ $penyewa->id }}"
                                                       data-status="menunggak">
                                                        <i class="bi bi-exclamation-triangle text-danger me-2"></i>Menunggak
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td>
                                        <small>{{ Str::limit($penyewa->alamat, 50) }}</small>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <button class="btn btn-action btn-outline-primary edit-penyewa" 
                                                    data-id="{{ $penyewa->id }}"
                                                    data-nama="{{ $penyewa->nama }}"
                                                    data-no_ktp="{{ $penyewa->no_ktp }}"
                                                    data-no_hp="{{ $penyewa->no_hp }}"
                                                    data-email="{{ $penyewa->email }}"
                                                    data-alamat="{{ $penyewa->alamat }}"
                                                    data-pekerjaan="{{ $penyewa->pekerjaan }}"
                                                    data-status="{{ $penyewa->status }}"
                                                    data-tanggal_masuk="{{ $penyewa->tanggal_masuk }}"
                                                    data-tanggal_keluar="{{ $penyewa->tanggal_keluar }}"
                                                    title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button class="btn btn-action btn-outline-info view-penyewa" 
                                                    data-id="{{ $penyewa->id }}"
                                                    title="Detail">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                            <button class="btn btn-action btn-outline-danger delete-penyewa" 
                                                    data-id="{{ $penyewa->id }}"
                                                    data-nama="{{ $penyewa->nama }}"
                                                    title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4">
                                        <div class="text-muted">
                                            <i class="bi bi-people display-4"></i>
                                            <p class="mt-3">Belum ada data penyewa</p>
                                            <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#addPenyewaModal">
                                                <i class="bi bi-plus-circle me-2"></i>Tambah Penyewa Pertama
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination -->
                    @if($penyewas->hasPages())
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div class="text-muted">
                            Menampilkan {{ $penyewas->firstItem() }} - {{ $penyewas->lastItem() }} dari {{ $penyewas->total() }} penyewa
                        </div>
                        <div>
                            {{ $penyewas->links() }}
                        </div>
                    </div>
                    @endif
                </div>
                
                <!-- Quick Actions -->
                <div class="quick-actions">
                    <div class="action-card fade-in" onclick="window.location.href='{{ route('penyewas.index') }}'">
                        <div class="action-icon">
                            <i class="bi bi-list-ul"></i>
                        </div>
                        <h6>Lihat Semua Penyewa</h6>
                        <p>Tampilkan semua data penyewa</p>
                    </div>
                    
                    <div class="action-card fade-in" style="animation-delay: 0.1s;" data-bs-toggle="modal" data-bs-target="#addPenyewaModal">
                        <div class="action-icon">
                            <i class="bi bi-person-plus"></i>
                        </div>
                        <h6>Tambah Penyewa</h6>
                        <p>Tambah penyewa baru ke sistem</p>
                    </div>
                    
                    <div class="action-card fade-in" style="animation-delay: 0.2s;" onclick="filterByStatus('menunggak')">
                        <div class="action-icon">
                            <i class="bi bi-exclamation-triangle"></i>
                        </div>
                        <h6>Penyewa Menunggak</h6>
                        <p>Lihat penyewa yang menunggak</p>
                    </div>
                    
                    <div class="action-card fade-in" style="animation-delay: 0.3s;" onclick="window.print()">
                        <div class="action-icon">
                            <i class="bi bi-printer"></i>
                        </div>
                        <h6>Cetak Laporan</h6>
                        <p>Cetak daftar penyewa</p>
                    </div>
                </div>
            </div>
        </main>
    </div>
    
    <!-- Add Penyewa Modal -->
    <div class="modal fade" id="addPenyewaModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Penyewa Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('penyewas.store') }}" method="POST" id="addPenyewaForm">
                    @csrf
                    <div class="modal-body">
                        @if ($errors->any())
                        <div class="alert alert-danger alert-custom fade show mb-3" role="alert">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            <strong>Terjadi Kesalahan:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        @endif
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Nama Lengkap *</label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required>
                                @error('nama')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">No. KTP *</label>
                                <input type="text" name="no_ktp" class="form-control @error('no_ktp') is-invalid @enderror" value="{{ old('no_ktp') }}" required maxlength="16">
                                @error('no_ktp')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">No. HP *</label>
                                <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}" required>
                                @error('no_hp')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Pekerjaan</label>
                                <input type="text" name="pekerjaan" class="form-control" value="{{ old('pekerjaan') }}" placeholder="Contoh: Karyawan Swasta">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Status *</label>
                                <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                                    <option value="">Pilih Status</option>
                                    <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                                    <option value="menunggak" {{ old('status') == 'menunggak' ? 'selected' : '' }}>Menunggak</option>
                                </select>
                                @error('status')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Kamar</label>
                                <select name="room_id" class="form-select @error('room_id') is-invalid @enderror">
                                    <option value="">Pilih Kamar (Opsional)</option>
                                    @foreach($kamarKosong as $kamar)
                                    <option value="{{ $kamar->id }}" {{ old('room_id') == $kamar->id ? 'selected' : '' }}>
                                        {{ $kamar->nomor_kamar }} - {{ $kamar->tipe_kamar }} (Rp {{ number_format($kamar->harga_sewa, 0, ',', '.') }})
                                    </option>
                                    @endforeach
                                </select>
                                @error('room_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Tanggal Masuk</label>
                                <input type="date" name="tanggal_masuk" class="form-control @error('tanggal_masuk') is-invalid @enderror" value="{{ old('tanggal_masuk') }}">
                                @error('tanggal_masuk')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Tanggal Keluar</label>
                                <input type="date" name="tanggal_keluar" class="form-control @error('tanggal_keluar') is-invalid @enderror" value="{{ old('tanggal_keluar') }}">
                                @error('tanggal_keluar')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label">Alamat *</label>
                                <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3" required placeholder="Alamat lengkap penyewa">{{ old('alamat') }}</textarea>
                                @error('alamat')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Penyewa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Edit Penyewa Modal -->
    <div class="modal fade" id="editPenyewaModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Penyewa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="" method="POST" id="editPenyewaForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Nama Lengkap *</label>
                                <input type="text" name="nama" id="edit_nama" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">No. KTP *</label>
                                <input type="text" name="no_ktp" id="edit_no_ktp" class="form-control" required maxlength="16">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">No. HP *</label>
                                <input type="text" name="no_hp" id="edit_no_hp" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" id="edit_email" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Pekerjaan</label>
                                <input type="text" name="pekerjaan" id="edit_pekerjaan" class="form-control" placeholder="Contoh: Karyawan Swasta">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Status *</label>
                                <select name="status" id="edit_status" class="form-select" required>
                                    <option value="aktif">Aktif</option>
                                    <option value="nonaktif">Nonaktif</option>
                                    <option value="menunggak">Menunggak</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Tanggal Masuk</label>
                                <input type="date" name="tanggal_masuk" id="edit_tanggal_masuk" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Tanggal Keluar</label>
                                <input type="date" name="tanggal_keluar" id="edit_tanggal_keluar" class="form-control">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Alamat *</label>
                                <textarea name="alamat" id="edit_alamat" class="form-control" rows="3" required placeholder="Alamat lengkap penyewa"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Update Penyewa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Detail Penyewa Modal -->
    <div class="modal fade" id="detailPenyewaModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Penyewa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 text-center mb-4">
                            <div class="user-avatar mx-auto" style="width: 100px; height: 100px; font-size: 2rem;">
                                <span id="detail_avatar">JD</span>
                            </div>
                            <h5 class="mt-3" id="detail_nama"></h5>
                            <span class="badge" id="detail_status_badge"></span>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">No. KTP</label>
                                    <p class="fw-bold" id="detail_no_ktp"></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">No. HP</label>
                                    <p class="fw-bold" id="detail_no_hp"></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">Email</label>
                                    <p class="fw-bold" id="detail_email">-</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">Pekerjaan</label>
                                    <p class="fw-bold" id="detail_pekerjaan">-</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">Kamar</label>
                                    <p class="fw-bold" id="detail_kamar">-</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">Tanggal Masuk</label>
                                    <p class="fw-bold" id="detail_tanggal_masuk">-</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">Tanggal Keluar</label>
                                    <p class="fw-bold" id="detail_tanggal_keluar">-</p>
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label text-muted">Alamat</label>
                                    <p class="fw-bold" id="detail_alamat"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" id="editFromDetail">Edit Data</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus penyewa <strong id="penyewaName"></strong>?</p>
                    <p class="text-danger"><small>Data yang dihapus tidak dapat dikembalikan.</small></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form id="deleteForm" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Assign Room Modal -->
    <div class="modal fade" id="assignRoomModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tetapkan Kamar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="assignRoomForm">
                    @csrf
                    <div class="modal-body">
                        <p>Menetapkan kamar untuk: <strong id="assignPenyewaName"></strong></p>
                        <input type="hidden" id="assignPenyewaId">
                        
                        <div class="mb-3">
                            <label class="form-label">Pilih Kamar</label>
                            <select id="assignRoomSelect" class="form-select" required>
                                <option value="">Loading...</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tetapkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Set current date
        const now = new Date();
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        document.getElementById('currentDate').textContent = now.toLocaleDateString('id-ID', options);
        
        // Toggle sidebar on mobile
        document.getElementById('menuToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });
        
        // Auto-close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const menuToggle = document.getElementById('menuToggle');
            
            if (window.innerWidth <= 768 && 
                !sidebar.contains(event.target) && 
                !menuToggle.contains(event.target) &&
                sidebar.classList.contains('active')) {
                sidebar.classList.remove('active');
            }
        });
        
        // Update time every minute
        function updateTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });
            const dateString = now.toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
            document.getElementById('currentDate').textContent = `${dateString} • ${timeString}`;
        }
        
        setInterval(updateTime, 60000);
        updateTime();
        
        // Search functionality
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('#penyewasTable tbody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        });
        
        // Filter functionality
        document.getElementById('statusFilter').addEventListener('change', filterTable);
        
        function filterTable() {
            const statusFilter = document.getElementById('statusFilter').value;
            const rows = document.querySelectorAll('#penyewasTable tbody tr');
            
            rows.forEach(row => {
                const status = row.getAttribute('data-status');
                const statusMatch = !statusFilter || status === statusFilter;
                row.style.display = statusMatch ? '' : 'none';
            });
        }
        
        function filterByStatus(status) {
            document.getElementById('statusFilter').value = status;
            filterTable();
        }
        
        function resetFilters() {
            document.getElementById('statusFilter').value = '';
            document.getElementById('searchInput').value = '';
            const rows = document.querySelectorAll('#penyewasTable tbody tr');
            rows.forEach(row => row.style.display = '');
        }
        
        // Update status via AJAX
        document.querySelectorAll('.change-status').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                
                const penyewaId = this.getAttribute('data-id');
                const newStatus = this.getAttribute('data-status');
                const button = this.closest('.dropdown').querySelector('.status-badge');
                
                // Show confirmation for menunggak status
                if (newStatus === 'menunggak') {
                    if (!confirm('Ubah status penyewa menjadi menunggak?')) {
                        return;
                    }
                }
                
                fetch(`/penyewas/${penyewaId}/status`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ status: newStatus })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update button appearance
                        button.classList.remove('btn-success', 'btn-secondary', 'btn-danger');
                        
                        if (newStatus === 'aktif') {
                            button.classList.add('btn-success');
                        } else if (newStatus === 'nonaktif') {
                            button.classList.add('btn-secondary');
                        } else {
                            button.classList.add('btn-danger');
                        }
                        
                        button.textContent = data.new_status.charAt(0).toUpperCase() + data.new_status.slice(1);
                        
                        // Update data-status attribute on table row
                        const row = button.closest('tr');
                        row.setAttribute('data-status', newStatus);
                        
                        // Show success message
                        showAlert('success', data.message);
                    }
                })
                .catch(error => {
                    showAlert('error', 'Gagal mengubah status penyewa');
                });
            });
        });
        
        // Edit penyewa functionality
        document.querySelectorAll('.edit-penyewa').forEach(button => {
            button.addEventListener('click', function() {
                const penyewaId = this.getAttribute('data-id');
                const form = document.getElementById('editPenyewaForm');
                form.action = `/penyewas/${penyewaId}`;
                
                // Fill form with data
                document.getElementById('edit_nama').value = this.getAttribute('data-nama');
                document.getElementById('edit_no_ktp').value = this.getAttribute('data-no_ktp');
                document.getElementById('edit_no_hp').value = this.getAttribute('data-no_hp');
                document.getElementById('edit_email').value = this.getAttribute('data-email') || '';
                document.getElementById('edit_pekerjaan').value = this.getAttribute('data-pekerjaan') || '';
                document.getElementById('edit_status').value = this.getAttribute('data-status');
                document.getElementById('edit_alamat').value = this.getAttribute('data-alamat') || '';
                document.getElementById('edit_tanggal_masuk').value = this.getAttribute('data-tanggal_masuk') || '';
                document.getElementById('edit_tanggal_keluar').value = this.getAttribute('data-tanggal_keluar') || '';
                
                // Show modal
                const editModal = new bootstrap.Modal(document.getElementById('editPenyewaModal'));
                editModal.show();
            });
        });
        
        // View penyewa detail
        document.querySelectorAll('.view-penyewa').forEach(button => {
            button.addEventListener('click', function() {
                const penyewaId = this.getAttribute('data-id');
                const row = this.closest('tr');
                
                // Get all data from the row
                const nama = this.getAttribute('data-nama');
                const no_ktp = this.getAttribute('data-no_ktp');
                const no_hp = this.getAttribute('data-no_hp');
                const email = this.getAttribute('data-email') || '-';
                const pekerjaan = this.getAttribute('data-pekerjaan') || '-';
                const status = this.getAttribute('data-status');
                const alamat = this.getAttribute('data-alamat');
                const tanggal_masuk = this.getAttribute('data-tanggal_masuk') || '-';
                const tanggal_keluar = this.getAttribute('data-tanggal_keluar') || '-';
                
                // Get room info if exists
                const roomInfo = row.querySelector('.fw-bold') ? 
                    row.querySelector('.fw-bold').textContent + ' (' + row.querySelector('.text-muted').textContent + ')' : 
                    '-';
                
                // Update modal content
                document.getElementById('detail_avatar').textContent = nama.split(' ').map(n => n[0]).join('').toUpperCase().substring(0, 2);
                document.getElementById('detail_nama').textContent = nama;
                document.getElementById('detail_no_ktp').textContent = no_ktp;
                document.getElementById('detail_no_hp').textContent = no_hp;
                document.getElementById('detail_email').textContent = email;
                document.getElementById('detail_pekerjaan').textContent = pekerjaan;
                document.getElementById('detail_kamar').textContent = roomInfo;
                document.getElementById('detail_alamat').textContent = alamat;
                document.getElementById('detail_tanggal_masuk').textContent = tanggal_masuk;
                document.getElementById('detail_tanggal_keluar').textContent = tanggal_keluar;
                
                // Update status badge
                const statusBadge = document.getElementById('detail_status_badge');
                statusBadge.className = 'badge badge-status badge-' + status;
                statusBadge.textContent = status.charAt(0).toUpperCase() + status.slice(1);
                
                // Set edit button functionality
                document.getElementById('editFromDetail').onclick = function() {
                    bootstrap.Modal.getInstance(document.getElementById('detailPenyewaModal')).hide();
                    
                    const editModal = new bootstrap.Modal(document.getElementById('editPenyewaModal'));
                    
                    // Pre-fill edit form
                    const editForm = document.getElementById('editPenyewaForm');
                    editForm.action = `/penyewas/${penyewaId}`;
                    document.getElementById('edit_nama').value = nama;
                    document.getElementById('edit_no_ktp').value = no_ktp;
                    document.getElementById('edit_no_hp').value = no_hp;
                    document.getElementById('edit_email').value = email !== '-' ? email : '';
                    document.getElementById('edit_pekerjaan').value = pekerjaan !== '-' ? pekerjaan : '';
                    document.getElementById('edit_status').value = status;
                    document.getElementById('edit_alamat').value = alamat;
                    document.getElementById('edit_tanggal_masuk').value = tanggal_masuk !== '-' ? tanggal_masuk : '';
                    document.getElementById('edit_tanggal_keluar').value = tanggal_keluar !== '-' ? tanggal_keluar : '';
                    
                    editModal.show();
                };
                
                // Show modal
                const detailModal = new bootstrap.Modal(document.getElementById('detailPenyewaModal'));
                detailModal.show();
            });
        });
        
        // Delete penyewa functionality
        document.querySelectorAll('.delete-penyewa').forEach(button => {
            button.addEventListener('click', function() {
                const penyewaId = this.getAttribute('data-id');
                const penyewaName = this.getAttribute('data-nama');
                
                document.getElementById('penyewaName').textContent = penyewaName;
                document.getElementById('deleteForm').action = `/penyewas/${penyewaId}`;
                
                const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
                deleteModal.show();
            });
        });
        
        // Assign room functionality
        document.querySelectorAll('.assign-room-btn').forEach(button => {
            button.addEventListener('click', function() {
                const penyewaId = this.getAttribute('data-id');
                const penyewaNama = this.getAttribute('data-nama');
                
                // Show room selection modal
                const modal = new bootstrap.Modal(document.getElementById('assignRoomModal'));
                modal.show();
                
                // Set penyewa info
                document.getElementById('assignPenyewaName').textContent = penyewaNama;
                document.getElementById('assignPenyewaId').value = penyewaId;
                
                // Load available rooms
                loadAvailableRooms();
            });
        });
        
        // Load available rooms for assignment
        function loadAvailableRooms() {
            // PERBAIKAN DI SINI: ganti "rooms.available" menjadi "penyewas.available-rooms"
            fetch('{{ route("penyewas.available-rooms") }}')
                .then(response => response.json())
                .then(rooms => {
                    const select = document.getElementById('assignRoomSelect');
                    select.innerHTML = '<option value="">Pilih Kamar</option>';
                    
                    rooms.forEach(room => {
                        const option = document.createElement('option');
                        option.value = room.id;
                        option.textContent = room.nomor_kamar + ' - ' + room.tipe_kamar + ' (Rp ' + room.harga_sewa.toLocaleString('id-ID') + ')';
                        select.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error loading rooms:', error);
                    showAlert('error', 'Gagal memuat daftar kamar');
                });
        }
        
        // Assign room form submission
        document.getElementById('assignRoomForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const penyewaId = document.getElementById('assignPenyewaId').value;
            const roomId = document.getElementById('assignRoomSelect').value;
            
            if (!roomId) {
                alert('Silakan pilih kamar!');
                return;
            }
            
            fetch(`/penyewas/${penyewaId}/assign-room`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ room_id: roomId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showAlert('success', data.message);
                    setTimeout(() => location.reload(), 1000);
                } else {
                    showAlert('error', data.message);
                }
            })
            .catch(error => {
                showAlert('error', 'Gagal menetapkan kamar');
            });
        });
        
        // Remove room assignment
        function removeRoomAssignment(penyewaId, penyewaNama) {
            if (confirm(`Kosongkan kamar dari ${penyewaNama}?`)) {
                fetch(`/penyewas/${penyewaId}/remove-room`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ _method: 'DELETE' })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showAlert('success', data.message);
                        setTimeout(() => location.reload(), 1000);
                    }
                })
                .catch(error => {
                    showAlert('error', 'Gagal mengosongkan kamar');
                });
            }
        }
        
        // Add hover effect to action cards
        const actionCards = document.querySelectorAll('.action-card');
        actionCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
        
        // Add hover effect to stat cards
        const statCards = document.querySelectorAll('.stat-card');
        statCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
        
        // Initialize dropdowns
        const dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
        dropdownElementList.map(function (dropdownToggleEl) {
            return new bootstrap.Dropdown(dropdownToggleEl);
        });
        
        // Show alert function
        function showAlert(type, message) {
            const alert = `
                <div class="alert alert-${type} alert-dismissible fade show position-fixed" 
                     style="top: 20px; right: 20px; z-index: 9999; min-width: 300px;">
                    <i class="bi bi-${type === 'success' ? 'check-circle' : 'exclamation-triangle'} me-2"></i>
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            `;
            document.body.insertAdjacentHTML('beforeend', alert);
            
            setTimeout(() => {
                const alertElement = document.querySelector('.alert.position-fixed');
                if (alertElement) {
                    alertElement.remove();
                }
            }, 5000);
        }
        
        // Auto dismiss alerts after 5 seconds
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);
    </script>
</body>
</html>
