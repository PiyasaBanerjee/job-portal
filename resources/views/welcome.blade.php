<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Job Portal | Find Your Dream Job</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f8fafc;
            color: #0f172a;
        }

        /* ================= NAVBAR ================= */

        .navbar {
            height: 72px;
            background: rgba(255, 255, 255, 0.96);
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 7%;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            font-size: 24px;
            font-weight: 800;
            color: #2563eb;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: #2563eb;
            color: white;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .nav-links a {
            text-decoration: none;
            color: #475569;
            font-size: 15px;
            font-weight: 600;
            transition: 0.3s;
        }

        .nav-links a:hover {
            color: #2563eb;
        }

        .login-btn {
            padding: 10px 20px;
            border: 1px solid #2563eb;
            border-radius: 8px;
            color: #2563eb !important;
        }

        .login-btn:hover {
            background: #eff6ff;
        }

        .register-btn {
            padding: 11px 21px;
            background: #2563eb;
            color: white !important;
            border-radius: 8px;
        }

        .register-btn:hover {
            background: #1d4ed8;
        }

        /* ================= HERO ================= */

        .hero {
            min-height: 650px;
            padding: 90px 7% 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            background:
                radial-gradient(circle at 10% 20%, #dbeafe 0, transparent 25%),
                radial-gradient(circle at 90% 80%, #e0e7ff 0, transparent 25%),
                linear-gradient(135deg, #eff6ff, #ffffff);
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            max-width: 900px;
            position: relative;
            z-index: 2;
        }

        .hero-badge {
            display: inline-block;
            padding: 8px 16px;
            background: #dbeafe;
            color: #1d4ed8;
            border-radius: 30px;
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 22px;
        }

        .hero h1 {
            font-size: 60px;
            line-height: 1.1;
            letter-spacing: -2px;
            margin-bottom: 24px;
        }

        .hero h1 span {
            color: #2563eb;
        }

        .hero p {
            max-width: 700px;
            margin: auto;
            font-size: 19px;
            color: #64748b;
            line-height: 1.8;
            margin-bottom: 35px;
        }

        /* ================= SEARCH ================= */

        .search-box {
            max-width: 760px;
            margin: 0 auto 30px;
            background: white;
            padding: 10px;
            border-radius: 14px;
            box-shadow: 0 15px 40px rgba(15, 23, 42, 0.10);
            display: flex;
            gap: 10px;
            border: 1px solid #e2e8f0;
        }

        .search-input {
            flex: 1;
            border: none;
            outline: none;
            padding: 14px;
            font-size: 15px;
            color: #334155;
            background: transparent;
        }

        .search-btn {
            border: none;
            background: #2563eb;
            color: white;
            padding: 14px 25px;
            border-radius: 9px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
        }

        .search-btn:hover {
            background: #1d4ed8;
        }

        /* ================= BUTTONS ================= */

        .hero-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .primary-btn {
            background: #2563eb;
            color: white;
            text-decoration: none;
            padding: 14px 28px;
            border-radius: 9px;
            font-size: 16px;
            font-weight: 700;
            transition: 0.3s;
        }

        .primary-btn:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
        }

        .secondary-btn {
            background: white;
            color: #2563eb;
            text-decoration: none;
            padding: 14px 28px;
            border: 1px solid #bfdbfe;
            border-radius: 9px;
            font-size: 16px;
            font-weight: 700;
            transition: 0.3s;
        }

        .secondary-btn:hover {
            background: #eff6ff;
            transform: translateY(-2px);
        }

        /* ================= STATS ================= */

        .stats {
            background: white;
            padding: 35px 7%;
            border-bottom: 1px solid #e2e8f0;
        }

        .stats-container {
            max-width: 1000px;
            margin: auto;
            display: flex;
            justify-content: space-around;
            text-align: center;
            flex-wrap: wrap;
            gap: 25px;
        }

        .stat h3 {
            font-size: 30px;
            color: #2563eb;
            margin-bottom: 5px;
        }

        .stat p {
            color: #64748b;
            font-size: 14px;
        }

        /* ================= FEATURES ================= */

        .features {
            padding: 90px 7%;
            background: #ffffff;
            text-align: center;
        }

        .section-label {
            color: #2563eb;
            font-size: 14px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        .features h2 {
            font-size: 38px;
            margin-bottom: 15px;
        }

        .section-description {
            max-width: 650px;
            margin: 0 auto 50px;
            color: #64748b;
            line-height: 1.7;
        }

        .feature-container {
            max-width: 1100px;
            margin: auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .feature-card {
            padding: 35px 28px;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            background: white;
            text-align: left;
            transition: 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 15px 35px rgba(15, 23, 42, 0.08);
            border-color: #bfdbfe;
        }

        .feature-icon {
            width: 52px;
            height: 52px;
            background: #eff6ff;
            color: #2563eb;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
            margin-bottom: 20px;
        }

        .feature-card h3 {
            margin-bottom: 12px;
            font-size: 20px;
        }

        .feature-card p {
            color: #64748b;
            line-height: 1.7;
            font-size: 15px;
        }

        /* ================= CTA ================= */

        .cta {
            padding: 80px 7%;
            background: #2563eb;
            color: white;
            text-align: center;
        }

        .cta h2 {
            font-size: 38px;
            margin-bottom: 15px;
        }

        .cta p {
            max-width: 650px;
            margin: 0 auto 30px;
            line-height: 1.7;
            color: #dbeafe;
        }

        .cta-btn {
            display: inline-block;
            padding: 14px 28px;
            background: white;
            color: #2563eb;
            border-radius: 9px;
            text-decoration: none;
            font-weight: 700;
        }

        /* ================= FOOTER ================= */

        .footer {
            background: #0f172a;
            color: #cbd5e1;
            padding: 35px 7%;
        }

        .footer-content {
            max-width: 1100px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .footer-brand {
            font-size: 20px;
            font-weight: 800;
            color: white;
        }

        .footer p {
            font-size: 14px;
        }

        /* ================= MOBILE ================= */

        @media (max-width: 800px) {

            .navbar {
                padding: 0 20px;
            }

            .nav-links {
                gap: 8px;
            }

            .nav-links a:not(.login-btn):not(.register-btn) {
                display: none;
            }

            .hero {
                padding: 70px 20px;
            }

            .hero h1 {
                font-size: 42px;
                letter-spacing: -1px;
            }

            .hero p {
                font-size: 16px;
            }

            .search-box {
                flex-direction: column;
            }

            .search-btn {
                width: 100%;
            }

            .hero-buttons {
                flex-direction: column;
            }

            .stats-container {
                flex-direction: column;
            }

            .feature-container {
                grid-template-columns: 1fr;
            }

            .features h2,
            .cta h2 {
                font-size: 30px;
            }

            .footer-content {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <!-- ================= NAVBAR ================= -->

    <nav class="navbar">

        <a href="{{ url('/') }}" class="logo">
            <span class="logo-icon">J</span>
            Job Portal
        </a>

        <div class="nav-links">

            @guest

                <a href="{{ route('login') }}" class="login-btn">
                    Login
                </a>

                <a href="{{ route('register') }}" class="register-btn">
                    Register
                </a>

            @else

                @if(auth()->user()->role === 'candidate')

                    <a href="{{ route('candidate.dashboard') }}">
                        Dashboard
                    </a>

                @elseif(auth()->user()->role === 'recruiter')

                    <a href="{{ route('recruiter.dashboard') }}">
                        Dashboard
                    </a>

                @elseif(auth()->user()->role === 'admin')

                    <a href="{{ route('admin.dashboard') }}">
                        Dashboard
                    </a>

                @endif

            @endguest

        </div>

    </nav>


    <!-- ================= HERO ================= -->

    <section class="hero">

        <div class="hero-content">

            <div class="hero-badge">
                🚀 Build Your Future With Us
            </div>

            <h1>
                Find Your <span>Dream Job</span>
            </h1>

            <p>
                Discover exciting career opportunities, connect with
                great companies, and take the next step in your career.
            </p>

            <div class="search-box">

                <input
                    type="text"
                    class="search-input"
                    placeholder="Search for jobs, skills or companies..."
                >

                <button class="search-btn">
                    Search Jobs
                </button>

            </div>

            <div class="hero-buttons">

                @guest

                    <a href="{{ route('register') }}" class="primary-btn">
                        Get Started
                    </a>

                    <a href="{{ route('login') }}" class="secondary-btn">
                        Login
                    </a>

                @else

                    @if(auth()->user()->role === 'candidate')

                        <a href="{{ route('candidate.dashboard') }}" class="primary-btn">
                            Go to Dashboard
                        </a>

                    @elseif(auth()->user()->role === 'recruiter')

                        <a href="{{ route('recruiter.dashboard') }}" class="primary-btn">
                            Go to Dashboard
                        </a>

                    @elseif(auth()->user()->role === 'admin')

                        <a href="{{ route('admin.dashboard') }}" class="primary-btn">
                            Go to Dashboard
                        </a>

                    @endif

                @endguest

            </div>

        </div>

    </section>


    <!-- ================= STATS ================= -->

    <section class="stats">

        <div class="stats-container">

            <div class="stat">
                <h3>100+</h3>
                <p>Job Opportunities</p>
            </div>

            <div class="stat">
                <h3>50+</h3>
                <p>Companies</p>
            </div>

            <div class="stat">
                <h3>500+</h3>
                <p>Registered Candidates</p>
            </div>

            <div class="stat">
                <h3>24/7</h3>
                <p>Career Opportunities</p>
            </div>

        </div>

    </section>


    <!-- ================= FEATURES ================= -->

    <section class="features">

        <div class="section-label">
            Why Choose Us
        </div>

        <h2>
            Everything You Need
        </h2>

        <p class="section-description">
            Our job portal connects talented candidates with companies
            and makes the recruitment process simple and efficient.
        </p>

        <div class="feature-container">

            <div class="feature-card">

                <div class="feature-icon">
                    🔎
                </div>

                <h3>
                    Find Jobs
                </h3>

                <p>
                    Search and discover job opportunities that match
                    your skills, experience and career goals.
                </p>

            </div>


            <div class="feature-card">

                <div class="feature-icon">
                    🏢
                </div>

                <h3>
                    Hire Talent
                </h3>

                <p>
                    Recruiters can create companies, post jobs and
                    discover talented candidates.
                </p>

            </div>


            <div class="feature-card">

                <div class="feature-icon">
                    📈
                </div>

                <h3>
                    Build Your Career
                </h3>

                <p>
                    Create your profile, apply for jobs and track
                    your applications easily.
                </p>

            </div>

        </div>

    </section>


    <!-- ================= CTA ================= -->

    <section class="cta">

        <h2>
            Ready to Start Your Career?
        </h2>

        <p>
            Create your account today and discover new opportunities
            that can help you take the next step in your professional journey.
        </p>

        @guest

            <a href="{{ route('register') }}" class="cta-btn">
                Create Your Account
            </a>

        @else

            @if(auth()->user()->role === 'candidate')

                <a href="{{ route('candidate.dashboard') }}" class="cta-btn">
                    Open Dashboard
                </a>

            @elseif(auth()->user()->role === 'recruiter')

                <a href="{{ route('recruiter.dashboard') }}" class="cta-btn">
                    Open Dashboard
                </a>

            @elseif(auth()->user()->role === 'admin')

                <a href="{{ route('admin.dashboard') }}" class="cta-btn">
                    Open Dashboard
                </a>

            @endif

        @endguest

    </section>


    <!-- ================= FOOTER ================= -->

    <footer class="footer">

        <div class="footer-content">

            <div class="footer-brand">
                Job Portal
            </div>

            <p>
                © {{ date('Y') }} Job Portal. All rights reserved.
            </p>

        </div>

    </footer>

</body>
</html>