<?php

require_once '../../app/core/App.php';
App::init();

$post = new Post();
$category = new Category();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if (!$id) {
    Redirect::redirect('admin.php');
    exit;
}

$singlePost = $post->find($id);

if (!$singlePost) {
    Redirect::redirect('admin.php');
    exit;
}

$categories = $category->all();
$selectedCategoryIds = $post->getCategoryIdsByPost($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
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

    if ($id && $title && $slug && $content && $user_id) {
        $post->update(
            $id,
            $title,
            $slug,
            $excerpt,
            $content,
            $image,
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
        <h1 class="greeting">Edit Blog Post</h1>
        <p class="greeting-sub">Samostatná stránka pre úpravu existujúceho blog postu.</p>
    </div>

    <div class="card">
        <div class="card-header">
            <div>
                <h3 class="card-title">Edit Post Form</h3>
                <p class="card-subtitle">Formulár pre úpravu blog postu</p>
            </div>
            <span class="badge badge-red">Edit</span>
        </div>

        <form method="POST" enctype="multipart/form-data" style="padding:0 1.5rem 1.5rem;">

            <input type="hidden" name="id" value="<?php echo htmlspecialchars($singlePost->id); ?>">

            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(240px,1fr)); gap:1rem; margin-bottom:1rem;">
                <div>
                    <label>Názov</label>
                    <input
                        type="text"
                        name="title"
                        value="<?php echo htmlspecialchars($singlePost->title); ?>"
                        required
                        style="width:100%; padding:0.85rem 1rem;"
                    >
                </div>

                <div>
                    <label>Slug</label>
                    <input
                        type="text"
                        name="slug"
                        value="<?php echo htmlspecialchars($singlePost->slug); ?>"
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
                    style="width:100%; padding:0.85rem 1rem;"
                ><?php echo htmlspecialchars($singlePost->excerpt); ?></textarea>
            </div>

            <div style="margin-bottom:1rem;">
                <label>Obsah</label>
                <textarea
                    name="content"
                    rows="10"
                    required
                    style="width:100%; padding:0.85rem 1rem;"
                ><?php echo htmlspecialchars($singlePost->content); ?></textarea>
            </div>
            <?php if ($singlePost->image): ?>
                <div style="margin-bottom:0.75rem;">
                    <img 
                        src="../uploads/<?php echo htmlspecialchars($singlePost->image); ?>" 
                        alt="Post image" 
                        style="max-width:200px; max-height:200px; border:1px solid #ddd; 
                        padding:0.5rem; border-radius:4px;"
                    >
                </div>
            <?php endif; ?>
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
                                <?php if (in_array($cat->id, $selectedCategoryIds)): ?>checked<?php endif; ?>
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
                        <option value="1" <?php if ($singlePost->user_id == 1) echo 'selected'; ?>>Admin User</option>
                        <option value="2" <?php if ($singlePost->user_id == 2) echo 'selected'; ?>>Eva Editorová</option>
                        <option value="3" <?php if ($singlePost->user_id == 3) echo 'selected'; ?>>Adam Autor</option>
                    </select>
                </div>

                <div>
                    <label>Publikované</label>
                    <input
                        type="datetime-local"
                        name="published_at"
                        value="<?php echo $singlePost->published_at ? date('Y-m-d\TH:i', strtotime($singlePost->published_at)) : ''; ?>"
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
                    <option value="draft" <?php if ($singlePost->status === 'draft') echo 'selected'; ?>>Draft</option>
                    <option value="published" <?php if ($singlePost->status === 'published') echo 'selected'; ?>>Published</option>
                </select>
            </div>

            <div style="display:flex; gap:0.75rem;">
                <button type="submit" class="btn">Update Post</button>
                <a href="admin.php" class="btn btn-ghost">Cancel</a>
            </div>

        </form>
    </div>
</main>

<?php include 'partials/footer-admin.php'; ?>