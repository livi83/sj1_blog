<?php

require_once '../../app/core/App.php';
App::init();

$post = new Post();
$category = new Category();

$categories = $category->all();

// spracovanie formulára (CREATE)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $slug = $_POST['slug'] ?? '';
    $excerpt = $_POST['excerpt'] ?? '';
    $content = $_POST['content'] ?? '';
    $image = $_POST['image'] ?? 'item1.jpg';
    $status = $_POST['status'] ?? 'draft';
    $user_id = isset($_POST['user_id']) ? (int)$_POST['user_id'] : 0;
    $published_at = $_POST['published_at'] ?? null;
    $categoryIds = $_POST['category_ids'] ?? [];

    if ($published_at === '') {
        $published_at = null;
    }

    // jednoduchá validácia
    if ($title && $slug && $content && $user_id) {
        //tu bude validacia obrazka
        $imageName = 'item1.jpg';

        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $uploadDir = __DIR__ . '/../../public/uploads/';

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $originalName = $_FILES['image']['name'];
            $tmpName = $_FILES['image']['tmp_name'];

            $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];

            if (in_array($extension, $allowedExtensions)) {
                $imageName = time() . '-' . basename($originalName);
                move_uploaded_file($tmpName, $uploadDir . $imageName);
            }
        }

        $post->create(
            $title,
            $slug,
            $excerpt,
            $content,
            $imageName,
            $status,
            $user_id,
            $published_at,
            $categoryIds
        );
        Redirect::redirect('admin.php');
        exit;
    }
    
}

include 'partials/header-admin.php';
?>

<main class="main-content">
    <div class="page-header">
        <h1 class="greeting">Create Blog Post</h1>
        <p class="greeting-sub">Samostatná stránka pre vytvorenie nového blog postu.</p>
    </div>

    <div class="card">
        <div class="card-header">
            <div>
                <h3 class="card-title">New Post Form</h3>
                <p class="card-subtitle">Formulár pre vytvorenie blog postu</p>
            </div>
            <span class="badge badge-green">Create</span>
        </div>

        <form method="POST" enctype="multipart/form-data" style="padding:0 1.5rem 1.5rem;">

            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(240px,1fr)); gap:1rem; margin-bottom:1rem;">
                <div>
                    <label>Názov</label>
                    <input
                        type="text"
                        name="title"
                        placeholder="Zadaj názov blog postu"
                        required
                        style="width:100%; padding:0.85rem 1rem;"
                    >
                </div>

                <div>
                    <label>Slug</label>
                    <input
                        type="text"
                        name="slug"
                        placeholder="napr. moj-prvy-clanok"
                        required
                        style="width:100%; padding:0.85rem 1rem;"
                    >
                </div>
            </div>

            <div style="margin-bottom:1rem;">
                <label>Excerpt</label>
                <textarea
                    name="excerpt"
                    rows="3"
                    placeholder="Krátky úvod alebo zhrnutie článku..."
                    style="width:100%; padding:0.85rem 1rem;"
                ></textarea>
            </div>

            <div style="margin-bottom:1rem;">
                <label>Obsah</label>
                <textarea
                    name="content"
                    rows="10"
                    placeholder="Sem príde obsah blog postu..."
                    required
                    style="width:100%; padding:0.85rem 1rem;"
                ></textarea>
            </div>

            <div style="margin-bottom:1rem;">
                <label>Obrázok</label>
                <input
                    type="file"
                    name="image"
                    accept=".jpg,.jpeg,.png,.webp"
                    style="width:100%; padding:0.85rem 1rem;"
                >
            </div>

            <div style="margin-bottom:1rem;">
                <label>Kategórie</label>
                <div style="display:flex; flex-wrap:wrap; gap:1rem; margin-top:0.5rem;">
                    <?php foreach ($categories as $cat): ?>
                        <label style="display:flex; align-items:center; gap:0.35rem;">
                            <input
                                type="checkbox"
                                name="category_ids[]"
                                value="<?php echo htmlspecialchars($cat->id); ?>"
                            >
                            <?php echo htmlspecialchars($cat->name); ?>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>

            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(240px,1fr)); gap:1rem; margin-bottom:1rem;">
                <div>
                    <label>Autor</label>
                    <select
                        name="user_id"
                        required
                        style="width:100%; padding:0.85rem 1rem;"
                    >
                        <option value="">Vyber autora</option>
                        <option value="1">Admin User</option>
                        <option value="2">Eva Editorová</option>
                        <option value="3">Adam Autor</option>
                    </select>
                </div>

                <div>
                    <label>Publikované</label>
                    <input
                        type="datetime-local"
                        name="published_at"
                        style="width:100%; padding:0.85rem 1rem;"
                    >
                </div>
            </div>

            <div style="margin-bottom:1rem;">
                <label>Status</label>
                <select
                    name="status"
                    style="width:100%; padding:0.85rem 1rem;"
                >
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                </select>
            </div>

            <div style="display:flex; gap:0.75rem;">
                <button type="submit" class="btn">Save Post</button>
                <a href="admin.php" class="btn btn-ghost">Cancel</a>
            </div>

        </form>
    </div>
</main>

<?php include 'partials/footer-admin.php'; ?>