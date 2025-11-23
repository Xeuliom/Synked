<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Synked</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4cc9f0;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --success-color: #4bb543;
            --danger-color: #f72585;
            --warning-color: #f8961e;
            --info-color: #4895ef;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fa;
            color: var(--dark-color);
            line-height: 1.6;
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--primary-color) !important;
        }

        .greeting-container {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 20px rgba(67, 97, 238, 0.15);
        }

        .profile-header {
            background-color: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
        }

        .rounded-avatar {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid var(--primary-color);
            box-shadow: 0 4px 10px rgba(67, 97, 238, 0.2);
        }

        .post-form {
            background-color: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
        }

        .post-card {
            background: white;
            border: none;
            border-radius: 12px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.07);
            padding: 1.5rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 2rem;
        }

        .post-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .comment-box {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 12px 15px;
            margin-bottom: 10px;
            transition: background 0.2s ease;
        }

        .comment-box:hover {
            background: #e9ecef;
        }

        .comment-img {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .divider {
            height: 1px;
            background: linear-gradient(to right, transparent, #dee2e6, transparent);
            margin: 1.5rem 0;
        }

        .btn-like {
            transition: transform 0.2s ease;
        }

        .btn-like:hover {
            transform: scale(1.1);
        }

        .reaction-badge {
            font-size: 0.9rem;
            padding: 0.35rem 0.75rem;
            border-radius: 50px;
            background-color: rgba(248, 249, 250, 0.9);
            border: 1px solid #dee2e6;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .file-upload-btn {
            position: relative;
            overflow: hidden;
        }

        .file-upload-btn input[type="file"] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }

        .empty-state {
            padding: 3rem;
            text-align: center;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.07);
        }

        .empty-state img {
            width: 150px;
            margin-bottom: 1.5rem;
            opacity: 0.8;
        }

        .timestamp {
            font-size: 0.85rem;
            color: #6c757d;
        }

        .media-container {
            border-radius: 10px;
            overflow: hidden;
            margin: 1rem 0;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            text-align: center !important;
        }


        .quote-text {
            font-style: italic;
            color: var(--primary-color);
            font-weight: 500;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .alert-info {
            background-color: rgba(72, 149, 239, 0.15);
            border-color: rgba(72, 149, 239, 0.2);
            color: var(--dark-color);
        }

        .nav-pills .nav-link.active {
            background-color: var(--primary-color);
        }

        @media (max-width: 768px) {
            .post-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .rounded-avatar {
                width: 50px;
                height: 50px;
            }
        }
    </style>
</head>

<body>
    <?php include __DIR__ . '/partials/navbar.php'; ?>

    <div class="container py-4">
        <!-- Header with Date and Quote -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="timestamp">
                <?= date('l j F Y, H:i') ?>
            </div>
            <div class="quote-text">
                "<?= ["Restez curieux", "Exprimez-vous", "Chaque jour compte"][rand(0, 2)] ?>"
            </div>
        </div>

        <!-- Profile Header -->
        <div class="profile-header d-flex align-items-center">
            <?php
            $profileImage = (!empty($userData['profile_image']) && file_exists('uploads/' . $userData['profile_image']))
                ? 'uploads/' . $userData['profile_image']
                : 'assets/default.png';
            ?>
            <img src="<?= htmlspecialchars($profileImage) ?>" class="rounded-avatar">
            <div>
                <h4 class="mb-1 fw-bold"><?= htmlspecialchars($userData['firstname']) . ' ' . htmlspecialchars($userData['lastname']) ?></h4>
                <p class="mb-0 text-muted"><small>Bienvenue sur Synked</small></p>
            </div>
        </div>

        <!-- Greeting Alert -->
        <?php
        $hour = date('H');
        if ($hour < 12) $greeting = "🌅 Bonjour!";
        elseif ($hour < 18) $greeting = "☀️ Bon après-midi!";
        else $greeting = "🌙 Bonsoir!";
        ?>
        <div class="greeting-container">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h5 class="mb-1 fw-bold"><?= $greeting ?></h5>
                    <p class="mb-0">Prêt à partager quelque chose aujourd'hui ?</p>
                </div>
                <i class="fas fa-paper-plane fa-2x opacity-75"></i>
            </div>
        </div>

        <!-- Post Form -->
        <form method="POST" enctype="multipart/form-data" class="post-form">
            <div class="mb-3">
                <textarea class="form-control" name="content" placeholder="Quoi de neuf ?" rows="3" style="border-radius: 10px;" required></textarea>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <label class="btn btn-outline-primary rounded-pill me-2 file-upload-btn">
                        <i class="fas fa-image me-1"></i> Photo/Vidéo
                        <input type="file" id="mediaUpload" name="media" accept="image/*,video/*" class="d-none">
                    </label>
                    <span id="fileName" class="text-muted small ms-2">Aucun fichier sélectionné</span>
                </div>
                <button class="btn btn-primary px-4 rounded-pill" type="submit">
                    <i class="fas fa-paper-plane me-1"></i> Publier
                </button>
            </div>
        </form>

        <!-- Posts Section -->
        <?php if (empty($posts)): ?>
            <div class="empty-state">
                <img src="https://cdn-icons-png.flaticon.com/512/4076/4076549.png" alt="No posts">
                <h4 class="mb-2">Il n'y a pas encore de publications</h4>
                <p class="text-muted">Partagez quelque chose pour lancer la conversation !</p>
            </div>
        <?php else: ?>
            <?php foreach ($posts as $post): ?>
                <div class="post-card" data-aos="fade-up">
                    <!-- Post Header -->
                    <div class="d-flex align-items-center mb-3">
                        <?php
                        $profileImage = (!empty($userData['profile_image']) && file_exists('uploads/' . $userData['profile_image']))
                            ? 'uploads/' . $userData['profile_image']
                            : 'assets/default.png';
                        ?>
                        <img src="<?= htmlspecialchars($profileImage) ?>" class="rounded-avatar me-3">
                        <div class="flex-grow-1">
                            <h5 class="mb-0 fw-bold"><?= htmlspecialchars($post['firstname'] . ' ' . $post['lastname']) ?></h5>
                            <small class="text-muted"><?= htmlspecialchars($post['created_at']) ?></small>
                        </div>
                        <?php if ($post['user_id'] == $_SESSION['user_id']): ?>
                            <form method="POST">
                                <input type="hidden" name="delete_post_id" value="<?= $post['id'] ?>">
                                <button class="btn btn-sm btn-outline-danger rounded-pill">
                                    <i class="fas fa-trash-alt me-1"></i> Supprimer
                                </button>
                            </form>
                        <?php endif; ?>
                    </div>

                    <!-- Post Content -->
                    <p class="mb-3"><?= nl2br(htmlspecialchars($post['content'])) ?></p>

                    <!-- Media -->
                    <?php if (!empty($post['media'])): ?>
                        <?php
                        $fileExt = pathinfo($post['media'], PATHINFO_EXTENSION);
                        $mediaUrl = "uploads/" . htmlspecialchars($post['media']);
                        ?>

                        <div class="text-center">
                            <div class="media-container">
                                <?php if (in_array(strtolower($fileExt), ['jpg', 'jpeg', 'png', 'gif', 'webp'])): ?>
                                    <img src="<?= $mediaUrl ?>" class="img-fluid" style="max-width: 400px !important;" alt="Post media">
                                <?php elseif (in_array(strtolower($fileExt), ['mp4', 'webm', 'ogg'])): ?>
                                    <video controls class="w-100">
                                        <source src="<?= $mediaUrl ?>" type="video/<?= $fileExt ?>">
                                        Votre navigateur ne prend pas en charge la lecture vidéo.
                                    </video>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="divider"></div>

                    <!-- Reactions -->
                    <?php if (!empty($post['reactions'])): ?>
                        <div class="d-flex gap-2 mb-3 flex-wrap">
                            <?php foreach ($post['reactions'] as $reaction): ?>
                                <span class="reaction-badge">
                                    <?= htmlspecialchars($reaction['emoji']) ?> <?= $reaction['count'] ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Reaction Buttons -->
                    <div class="d-flex justify-content-around mb-3">
                        <form method="POST" class="d-inline">
                            <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
                            <?php foreach (["😍", "😂", "❤️", "😢", "😡"] as $emoji): ?>
                                <button type="submit" name="reaction_emoji" value="<?= $emoji ?>"
                                    class="btn btn-like bg-transparent border-0" title="<?= $emoji ?>">
                                    <?= $emoji ?>
                                </button>
                            <?php endforeach; ?>
                        </form>
                    </div>

                    <!-- Comments -->
                    <h6 class="mb-3" style="color: #ff85a2;"><i class="fas fa-comment-dots me-2"></i>Commentaires</h6>
                    <?php foreach ($post['comments'] as $comment): ?>
                        <?php
                        $commenterImage = (!empty($comment['profile_image']) && file_exists('uploads/' . $comment['profile_image']))
                            ? 'uploads/' . $comment['profile_image']
                            : 'assets/default.png';
                        ?>
                        <div class="comment-box mb-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-2">
                                    <img src="<?= htmlspecialchars($commenterImage) ?>" class="comment-img">
                                    <span class="comment-author"><?= htmlspecialchars($comment['firstname'] . ' ' . $comment['lastname']) ?>:</span>
                                    <span style="color: #666;"><?= nl2br(htmlspecialchars($comment['comment'])) ?></span>
                                </div>
                                <?php if ($comment['user_id'] == $_SESSION['user_id']): ?>
                                    <form method="POST">
                                        <input type="hidden" name="delete_comment_id" value="<?= $comment['id'] ?>">
                                        <button class="btn btn-outline-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <!-- Add Comment -->
                    <form method="POST" class="mt-3">
                        <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
                        <div class="input-group">
                            <input type="text" class="form-control rounded-start-pill" name="comment" placeholder="Ajouter un commentaire..." required>
                            <button class="btn btn-primary rounded-end-pill" type="submit">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </form>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <?php if (!empty($_SESSION['success'])): ?>
            <div class="alert alert-success text-center">
                <?= $_SESSION['success'];
                unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS animation
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
        // File upload display
        const fileInput = document.getElementById('mediaUpload');
        const fileNameText = document.getElementById('fileName');

        fileInput.addEventListener('change', () => {
            fileNameText.textContent = fileInput.files.length > 0 ?
                fileInput.files[0].name :
                'Aucun fichier sélectionné';
        });

        // Smooth scroll for page transitions
        document.addEventListener('DOMContentLoaded', function() {
            if (window.location.hash) {
                setTimeout(function() {
                    const element = document.querySelector(window.location.hash);
                    if (element) {
                        element.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                }, 300);
            }
        });
    </script>
</body>

</html>