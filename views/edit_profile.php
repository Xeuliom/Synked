<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier mon profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
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
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 80px;
        }
        
        .edit-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            padding: 40px;
            width: 100%;
            max-width: 700px;
            margin: 20px auto;
            transition: transform 0.3s ease;
        }
        
        .edit-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }
        
        .edit-title {
            text-align: center;
            margin-bottom: 30px;
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark-color);
            position: relative;
            padding-bottom: 15px;
        }
        
        .edit-title::after {
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
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(99, 102, 241, 0.25);
        }
        
        .btn-group {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            margin-top: 30px;
        }
        
        .btn-save {
            background: var(--gradient);
            border: none;
            padding: 12px 25px;
            font-weight: 600;
            color: white;
            border-radius: 8px;
            transition: all 0.3s ease;
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        
        .btn-save:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.3);
            color: white;
        }
        
        .btn-cancel {
            background: white;
            border: 1px solid #e2e8f0;
            padding: 12px 25px;
            font-weight: 600;
            color: #64748b;
            border-radius: 8px;
            transition: all 0.3s ease;
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        
        .btn-cancel:hover {
            background: #f8fafc;
            color: var(--dark-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        
        .file-upload {
            position: relative;
            margin-bottom: 20px;
        }
        
        .file-upload-btn {
            background: #f1f5f9;
            border: 1px dashed #cbd5e1;
            padding: 30px;
            border-radius: 12px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .file-upload-btn:hover {
            background: #f8fafc;
            border-color: var(--primary-color);
        }
        
        .file-upload-icon {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 10px;
        }
        
        .file-upload-text {
            font-weight: 600;
            color: var(--dark-color);
        }
        
        .file-upload-subtext {
            color: #64748b;
            font-size: 0.9rem;
        }
        
        .file-input {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0;
            cursor: pointer;
        }
        
        .file-name {
            margin-top: 10px;
            font-size: 0.9rem;
            color: var(--primary-color);
            font-weight: 500;
        }
        
        @media (max-width: 768px) {
            .edit-card {
                padding: 25px;
                margin: 20px;
            }
            
            .btn-group {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <?php include __DIR__ . '/partials/navbar.php'; ?>

    <div class="edit-card animate__animated animate__fadeIn">
        <h2 class="edit-title">Modifier mon profil</h2>

        <form method="POST" enctype="multipart/form-data">
            <div class="mb-4">
                <label for="firstname" class="form-label">
                    <i class="fas fa-user"></i> Prénom
                </label>
                <input type="text" class="form-control" id="firstname" name="firstname" 
                       value="<?= htmlspecialchars($userData['firstname']) ?>" required>
            </div>

            <div class="mb-4">
                <label for="lastname" class="form-label">
                    <i class="fas fa-user"></i> Nom
                </label>
                <input type="text" class="form-control" id="lastname" name="lastname" 
                       value="<?= htmlspecialchars($userData['lastname']) ?>" required>
            </div>

            <div class="mb-4">
                <label for="email" class="form-label">
                    <i class="fas fa-envelope"></i> Email
                </label>
                <input type="email" class="form-control" id="email" name="email" 
                       value="<?= htmlspecialchars($userData['email']) ?>" required>
            </div>

            <div class="mb-4 file-upload">
                <label class="form-label">
                    <i class="fas fa-camera"></i> Photo de profil
                </label>
                <div class="file-upload-btn">
                    <div class="file-upload-icon">
                        <i class="fas fa-cloud-upload-alt"></i>
                    </div>
                    <div class="file-upload-text">Cliquez pour télécharger</div>
                    <div class="file-upload-subtext">JPEG, PNG (Max. 5MB)</div>
                    <input type="file" id="profile_image" name="profile_image" 
                           accept="image/*" class="file-input">
                </div>
                <div id="fileName" class="file-name">Aucun fichier sélectionné</div>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn-save">
                    <i class="fas fa-save"></i> Enregistrer
                </button>
                <a href="index.php?action=profile" class="btn-cancel">
                    <i class="fas fa-times"></i> Annuler
                </a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const fileInput = document.getElementById('profile_image');
        const fileNameText = document.getElementById('fileName');

        fileInput.addEventListener('change', () => {
            if (fileInput.files.length > 0) {
                fileNameText.textContent = fileInput.files[0].name;
                fileNameText.innerHTML += ` <span class="text-success"><i class="fas fa-check-circle"></i></span>`;
            } else {
                fileNameText.textContent = 'Aucun fichier sélectionné';
            }
        });
    </script>
</body>
</html>