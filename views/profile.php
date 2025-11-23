<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #6366f1;
            --secondary-color: #8b5cf6;
            --dark-color: #1e293b;
            --light-color: #f8fafc;
            --success-color: #10b981;
            --gradient: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        }
        
        body {
            background-color: #f1f5f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .profile-container {
            max-width: 700px;
            margin: 80px auto 40px;
            padding: 40px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }
        
        .profile-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }
        
        .profile-header {
            text-align: center;
            margin-bottom: 30px;
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--dark-color);
            position: relative;
            padding-bottom: 15px;
        }
        
        .profile-header::after {
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
        
        .profile-img-container {
            position: relative;
            width: 150px;
            height: 150px;
            margin: 0 auto 25px;
        }
        
        .profile-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid white;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .profile-img:hover {
            transform: scale(1.05);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
        }
        
        .profile-info {
            background: #f8fafc;
            padding: 30px;
            border-radius: 12px;
            margin-bottom: 25px;
            border: 1px solid rgba(0, 0, 0, 0.03);
        }
        
        .profile-field {
            display: flex;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .profile-field:last-child {
            border-bottom: none;
        }
        
        .profile-label {
            font-weight: 600;
            color: #64748b;
            width: 120px;
            display: flex;
            align-items: center;
        }
        
        .profile-label i {
            margin-right: 10px;
            color: var(--primary-color);
            width: 20px;
            text-align: center;
        }
        
        .profile-value {
            color: var(--dark-color);
            flex: 1;
            font-weight: 500;
        }
        
        .btn-edit {
            background: var(--gradient);
            border: none;
            padding: 12px 30px;
            font-weight: 600;
            letter-spacing: 0.5px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin: 20px auto 0;
            color: white;
            border-radius: 50px;
            transition: all 0.3s ease;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3);
            width: auto;
        }
        
        .btn-edit:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.4);
            color: white;
        }
        
        .btn-edit i {
            margin-left: 8px;
            transition: transform 0.3s ease;
        }
        
        .btn-edit:hover i {
            transform: translateX(3px);
        }
        
        .alert {
            max-width: 700px;
            margin: 20px auto;
            border-radius: 10px;
            padding: 15px 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            border: none;
        }
        
        @media (max-width: 768px) {
            .profile-container {
                margin: 60px 20px 30px;
                padding: 25px;
            }
            
            .profile-field {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .profile-label {
                margin-bottom: 5px;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <?php include __DIR__ . '/partials/navbar.php'; ?>

    <?php if (!empty($_SESSION['success'])): ?>
        <div class="alert alert-success animate__animated animate__fadeInDown"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
    <?php endif; ?>

    <div class="profile-container animate__animated animate__fadeIn">
        <h2 class="profile-header">Mon Profil</h2>

        <div class="profile-img-container">
            <?php
            $profileImage = (!empty($userData['profile_image']) && file_exists('uploads/' . $userData['profile_image']))
                ? 'uploads/' . $userData['profile_image']
                : 'assets/default.png';
            ?>
            <img src="<?= htmlspecialchars($profileImage) ?>" class="profile-img">
        </div>

        <div class="profile-info">
            <div class="profile-field">
                <span class="profile-label"><i class="fas fa-user"></i> Nom :</span>
                <span class="profile-value"><?= htmlspecialchars($userData['lastname']) ?></span>
            </div>
            <div class="profile-field">
                <span class="profile-label"><i class="fas fa-user"></i> Prénom :</span>
                <span class="profile-value"><?= htmlspecialchars($userData['firstname']) ?></span>
            </div>
            <div class="profile-field">
                <span class="profile-label"><i class="fas fa-envelope"></i> Email :</span>
                <span class="profile-value"><?= htmlspecialchars($userData['email']) ?></span>
            </div>
        </div>

        <a href="index.php?action=edit_profile" class="btn btn-edit">
            Modifier mon profil <i class="fas fa-arrow-right"></i>
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>