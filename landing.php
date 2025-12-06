<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow - Organize Your Student Life</title>
    <link rel="stylesheet" href="style.css">

    <style>
        /* Landing page styling */
        
        .hero-container {
            width: 100%;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
            padding: 60px 40px;
            background: radial-gradient(circle at 30% 10%, rgba(255, 79, 216, 0.25), transparent 60%),
                        radial-gradient(circle at 80% 70%, rgba(122, 90, 245, 0.3), transparent 50%),
                        #0F0F0F;
            position: relative;
            overflow: hidden;
        }

        /* Animated gradient orbs */
        .hero-container::before,
        .hero-container::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.3;
            animation: float 20s ease-in-out infinite;
        }

        .hero-container::before {
            width: 400px;
            height: 400px;
            background: #7A5AF5;
            top: -100px;
            left: -100px;
            animation-delay: 0s;
        }

        .hero-container::after {
            width: 500px;
            height: 500px;
            background: #FF4FD8;
            bottom: -150px;
            right: -150px;
            animation-delay: 10s;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0); }
            50% { transform: translate(50px, 50px); }
        }

        /* Logo/Brand */
        .logo {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #7A5AF5, #FF4FD8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: fadeInDown 0.8s ease-out;
            position: relative;
            z-index: 1;
        }

        .hero-title {
            font-size: 62px;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 20px;
            color: white;
            animation: fadeInUp 1s ease-out 0.2s backwards;
            position: relative;
            z-index: 1;
        }

        .hero-subtitle {
            font-size: 19px;
            font-weight: 300;
            color: #C7AFFF;
            max-width: 680px;
            margin-bottom: 45px;
            line-height: 1.6;
            animation: fadeInUp 1s ease-out 0.4s backwards;
            position: relative;
            z-index: 1;
        }

        /* CTA Buttons */
        .cta-buttons {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            justify-content: center;
            animation: fadeInUp 1s ease-out 0.6s backwards;
            position: relative;
            z-index: 1;
        }

        .hero-btn {
            padding: 18px 45px;
            font-size: 17px;
            border-radius: 15px;
            background: linear-gradient(135deg, #7A5AF5, #FF4FD8);
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 600;
            box-shadow: 0px 8px 25px rgba(122, 90, 245, 0.4);
            border: none;
            position: relative;
            overflow: hidden;
        }

        .hero-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: 0.5s;
        }

        .hero-btn:hover::before {
            left: 100%;
        }

        .hero-btn:hover {
            box-shadow: 0px 12px 35px rgba(255, 79, 216, 0.6);
            transform: translateY(-3px);
        }

        .hero-btn-secondary {
            padding: 18px 45px;
            font-size: 17px;
            border-radius: 15px;
            background: rgba(255, 255, 255, 0.05);
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 500;
            border: 1px solid rgba(255,255,255,0.1);
        }

        .hero-btn-secondary:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(122, 90, 245, 0.5);
            transform: translateY(-3px);
            box-shadow: 0px 8px 25px rgba(122, 90, 245, 0.2);
        }

        /* Features section */
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 25px;
            max-width: 900px;
            margin-top: 80px;
            animation: fadeInUp 1s ease-out 0.8s backwards;
            position: relative;
            z-index: 1;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.03);
            padding: 25px;
            border-radius: 18px;
            border: 1px solid rgba(255,255,255,0.05);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            background: rgba(255, 255, 255, 0.05);
            border-color: rgba(122, 90, 245, 0.3);
            transform: translateY(-5px);
        }

        .feature-icon {
            font-size: 36px;
            margin-bottom: 12px;
        }

        .feature-card h3 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 8px;
            color: white;
        }

        .feature-card p {
            font-size: 14px;
            color: #bbbbbb;
            margin: 0;
            line-height: 1.5;
        }

        /* Animations */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 42px;
            }
            
            .hero-subtitle {
                font-size: 16px;
            }
            
            .cta-buttons {
                flex-direction: column;
                width: 100%;
                max-width: 300px;
            }
            
            .hero-btn, .hero-btn-secondary {
                width: 100%;
            }
            
            .features {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<div class="hero-container">
    <div class="logo">✨ TaskFlow</div>
    
    <h1 class="hero-title">Organize Your<br>Student Life</h1>

    <p class="hero-subtitle">
        Where student productivity meets simplicity.
        Plan smarter, study better, and stay on top of everything.
    </p>

    <div class="cta-buttons">
        <a href="login.php" class="hero-btn">Get Started</a>
    </div>

    <div class="features">
    <div class="feature-card">
        <div class="feature-icon">⚡</div>
        <h3>Fast & Effortless</h3>
        <p>Manage tasks without the overwhelm.</p>
    </div>

    <div class="feature-card">
        <div class="feature-icon">🎨</div>
        <h3>Designed for Students</h3>
        <p>A workspace that feels clean, calm, and organized.</p>
    </div>

    <div class="feature-card">
        <div class="feature-icon">📱</div>
        <h3>Always Within Reach</h3>
        <p>Access your tasks on any device, anytime.</p>
    </div>
</div>

</body>
</html>