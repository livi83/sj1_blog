<?php

require_once '../../app/core/App.php';
App::init();
// vytvorenie objektu
$category = new Category();

// spracovanie formulára (CREATE)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'] ?? '';
    $slug = $_POST['slug'] ?? '';
    $description = $_POST['description'] ?? '';

    // jednoduchá validácia
    if ($name && $slug) {
        $category->create($name, $slug, $description);

        // redirect po uložení (aby sa neodosielal formulár znova)
        Redirect::redirect('admin.php');
        exit;
    }
}
include 'partials/header-admin.php';
?>

<main class="main-content">
    <div class="page-header">
        <h1 class="greeting">Create Category</h1>
        <p class="greeting-sub">Samostatná stránka pre vytvorenie novej kategórie.</p>
    </div>

    <div class="card">
        <div class="card-header">
            <div>
                <h3 class="card-title">New Category Form</h3>
                <p class="card-subtitle">Formulár pre vytvorenie kategórie</p>
            </div>
            <span class="badge badge-green">Create</span>
        </div>

        <form method="POST" style="padding:0 1.5rem 1.5rem;">

            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(240px,1fr)); gap:1rem; margin-bottom:1rem;">
                <div>
                    <label>Názov kategórie</label>
                    <input 
                        type="text" 
                        name="name"
                        placeholder="Napr. Fashion"
                        required
                        style="width:100%; padding:0.85rem 1rem;"
                    >
                </div>

                <div>
                    <label>Slug</label>
                    <input 
                        type="text" 
                        name="slug"
                        placeholder="napr. fashion"
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
                    placeholder="Sem môže ísť krátky popis..."
                    style="width:100%; padding:0.85rem 1rem;"
                ></textarea>
            </div>

            <div style="display:flex; gap:0.75rem;">
                <button type="submit" class="btn">Save Category</button>
                <a href="admin.php" class="btn btn-ghost">Cancel</a>
            </div>

        </form>
    </div>
</main>

<?php include 'partials/footer-admin.php'; ?>