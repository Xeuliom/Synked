<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        :root {
            --primary-color: #6366f1;
            --secondary-color: #8b5cf6;
            --dark-color: #1e293b;
            --light-color: #f8fafc;
            --error-color: #ef4444;
            --gradient: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        }
        
        body {
            background-color: #f1f5f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .login-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            padding: 40px;
            width: 100%;
            max-width: 420px;
            transition: transform 0.3s ease;
        }
        
        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
        }
        
        .logo-container {
            text-align: center;
            margin-bottom: 25px;
        }
        
        .logo {
            height: 100px;
            width: auto;
            margin-bottom: 5px;
        }
        
        .login-title {
            text-align: center;
            margin-bottom: 30px;
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark-color);
            position: relative;
            padding-bottom: 15px;
        }
        
        .login-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: var(--gradient);
            border-radius: 2px;
        }
        
        .form-control {
            padding: 12px 15px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(99, 102, 241, 0.25);
        }
        
        .form-control::placeholder {
            color: #94a3b8;
        }
        
        .input-icon {
            position: relative;
        }
        
        .input-icon i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
        }
        
        .input-icon input {
            padding-left: 45px;
        }
        
        .btn-login {
            background: var(--gradient);
            border: none;
            padding: 12px;
            font-weight: 600;
            color: white;
            border-radius: 8px;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 10px;
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.3);
        }
        
        .form-check {
            margin: 20px 0;
        }
        
        .form-check-input {
            width: 1.2em;
            height: 1.2em;
            margin-top: 0.15em;
        }
        
        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .form-check-label {
            color: #64748b;
            font-size: 0.95rem;
            margin-left: 8px;
        }
        
        .login-footer {
            text-align: center;
            margin-top: 25px;
            color: #64748b;
        }
        
        .login-footer a {
            color: var(--primary-color);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .login-footer a:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }
        
        .error-message {
            background-color: #fee2e2;
            color: var(--error-color);
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .error-message i {
            font-size: 1.1rem;
        }
        
        @media (max-width: 480px) {
            .login-card {
                padding: 30px 20px;
            }
            
            .login-title {
                font-size: 1.5rem;
            }
            
            .logo {
                height: 50px;
            }
        }
    </style>
</head>
<body>
    <div class="login-card animate__animated animate__fadeIn">
        <!-- Logo Container -->
        <div class="logo-container">
            <img src="assets/normal.png" alt="Website Logo" class="logo">
            <!-- Alternatively, you can use text logo -->
            <!-- <div class="text-logo" style="font-size: 2rem; font-weight: 700; color: var(--primary-color);">YourLogo</div> -->
        </div>
        
        <h2 class="login-title">Se connecter</h2>

        <?php if (isset($login_error)): ?>
            <div class="error-message">
                <i class="fas fa-exclamation-circle"></i>
                <?php echo htmlspecialchars($login_error); ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="input-icon mb-3">
                <i class="fas fa-envelope"></i>
                <input type="email" class="form-control" name="email" placeholder="Adresse email" required>
            </div>
            
            <div class="input-icon mb-3">
                <i class="fas fa-lock"></i>
                <input type="password" class="form-control" name="password" placeholder="Mot de passe" required>
            </div>
            
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember" name="remember">
                <label class="form-check-label" for="remember">Se souvenir de moi</label>
            </div>
            
            <button class="btn btn-login" type="submit">
                <i class="fas fa-sign-in-alt"></i> Connexion
            </button>
        </form>

        <div class="login-footer">
            <p>Pas encore inscrit ? <a href="index.php?action=register">Créer un compte</a></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>