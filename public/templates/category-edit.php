<?php

require_once '../../app/core/App.php';
App::init();

$category = new Category();

// kontrola ID z URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

//ak neexistuje id alebo je 0
if (!$id) {
    Redirect::redirect('admin.php');
    exit;
}

// id existuje, nacitam si udaje kategorie
$cat = $category->find($id);

//ak nic nenaslo
if (!$cat) {
    Redirect::redirect('admin.php');
    exit;
}

// spracovanie formulára (UPDATE)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $name = $_POST['name'] ?? '';
    $slug = $_POST['slug'] ?? '';
    $description = $_POST['description'] ?? '';

    // jednoduchá validácia
    if ($id && $name && $slug) {
        $category->update($id, $name, $slug, $description);

        Redirect::redirect('admin.php');
    exit;
    }
}

include 'partials/header-admin.php';
?>

<main class="main-content">
    <div class="page-header">
        <h1 class="greeting">Edit Category</h1>
        <p class="greeting-sub">Samostatná stránka pre úpravu existujúcej kategórie.</p>
    </div>

    <div class="card">
        <div class="card-header">
            <div>
                <h3 class="card-title">Edit Category Form</h3>
                <p class="card-subtitle">Formulár pre úpravu kategórie</p>
            </div>
            <span class="badge badge-red">Edit</span>
        </div>

        <form method="POST" style="padding:0 1.5rem 1.5rem;">

            <input type="hidden" name="id" value="<?php echo htmlspecialchars($cat->id); ?>">

            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(240px,1fr)); gap:1rem; margin-bottom:1rem;">
                <div>
                    <label>Názov kategórie</label>
                    <input 
                        type="text" 
                        name="name"
                        value="<?php echo htmlspecialchars($cat->name); ?>"
                        required
                        style="width:100%; padding:0.85rem 1rem;"
                    >
                </div>

                <div>
                    <label>Slug</label>
                    <input 
                        type="text" 
                        name="slug"
                        value="<?php echo htmlspecialchars($cat->slug); ?>"
                        required
                        style="width:100%; padding:0.85rem 1rem;"
                    >
                </div>
            </div>

            <div style="margin-bottom:1rem;">
                <label>Popis kategórie</label>
                <textarea 
                    name="description"
                    rows="6"
                    style="width:100%; padding:0.85rem 1rem;"
                ><?php echo htmlspecialchars($cat->description); ?></textarea>
            </div>

            <div style="display:flex; gap:0.75rem;">
                <button type="submit" class="btn">Update Category</button>
                <a href="admin.php" class="btn btn-ghost">Cancel</a>
            </div>

        </form>
    </div>
</main>

<?php include 'partials/footer-admin.php'; ?>