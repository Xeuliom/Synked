<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        :root {
            --primary-color: #6366f1;
            --secondary-color: #8b5cf6;
            --success-color: #10b981;
            --dark-color: #1e293b;
            --light-color: #f8fafc;
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
        
        .register-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            padding: 40px;
            width: 100%;
            max-width: 500px;
            transition: transform 0.3s ease;
        }
        
        .register-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
        }
        
        .register-title {
            text-align: center;
            margin-bottom: 30px;
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark-color);
            position: relative;
            padding-bottom: 15px;
        }
        
        .register-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--gradient);
            border-radius: 2px;
        }
        
        .form-label {
            font-weight: 600;
            color: #475569;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
        }
        
        .form-label i {
            margin-right: 10px;
            color: var(--primary-color);
            width: 20px;
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
        
        .btn-register {
            background: var(--gradient);
            border: none;
            padding: 12px;
            font-weight: 600;
            color: white;
            border-radius: 8px;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.3);
            color: white;
        }
        
        .btn-login {
            background: white;
            border: 1px solid #e2e8f0;
            padding: 12px;
            font-weight: 600;
            color: var(--success-color);
            border-radius: 8px;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .btn-login:hover {
            background: #f8fafc;
            border-color: var(--success-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            color: var(--success-color);
        }
        
        .password-container {
            position: relative;
        }
        
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 70%;
            transform: translateY(-50%);
            color: #94a3b8;
            cursor: pointer;
        }
        
        @media (max-width: 480px) {
            .register-card {
                padding: 30px 20px;
            }
            
            .register-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="register-card animate__animated animate__fadeIn">
        <h2 class="register-title">Créer un compte</h2>

        <form method="POST">
            <div class="mb-3">
                <label for="firstname" class="form-label">
                    <i class="fas fa-user"></i> Prénom
                </label>
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Votre prénom" required>
            </div>

            <div class="mb-3">
                <label for="lastname" class="form-label">
                    <i class="fas fa-user"></i> Nom
                </label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Votre nom" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">
                    <i class="fas fa-envelope"></i> Adresse Email
                </label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Votre email" required>
            </div>

            <div class="mb-4 password-container">
                <label for="password" class="form-label">
                    <i class="fas fa-lock"></i> Mot de passe
                </label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe" required>
                <i class="fas fa-eye password-toggle" id="togglePassword"></i>
            </div>

            <button class="btn btn-register" type="submit">
                <i class="fas fa-rocket"></i> S'inscrire
            </button>
        </form>

        <div class="text-center mt-3">
            <a href="index.php?action=login" class="btn btn-login">
                <i class="fas fa-sign-in-alt"></i> Déjà inscrit ? Se connecter
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Password toggle functionality
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        
        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>