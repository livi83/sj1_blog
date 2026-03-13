<?php
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
                <p class="card-subtitle">Frontend only ukážka formulára</p>
            </div>
            <span class="badge badge-green">Create</span>
        </div>

        <div style="padding:0 1.5rem 1.5rem;">
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(240px,1fr)); gap:1rem; margin-bottom:1rem;">
                <div>
                    <label style="display:block; margin-bottom:0.5rem; font-weight:500;">Názov kategórie</label>
                    <input type="text" placeholder="Napr. Fashion" style="width:100%; padding:0.85rem 1rem; border:1px solid var(--border-color); border-radius:12px; background:var(--surface-color); color:var(--text-primary);">
                </div>
                <div>
                    <label style="display:block; margin-bottom:0.5rem; font-weight:500;">Slug</label>
                    <input type="text" placeholder="napr. fashion" style="width:100%; padding:0.85rem 1rem; border:1px solid var(--border-color); border-radius:12px; background:var(--surface-color); color:var(--text-primary);">
                </div>
            </div>

            <div style="margin-bottom:1rem;">
                <label style="display:block; margin-bottom:0.5rem; font-weight:500;">Popis kategórie</label>
                <textarea rows="6" placeholder="Sem môže ísť krátky popis kategórie..." style="width:100%; padding:0.85rem 1rem; border:1px solid var(--border-color); border-radius:12px; background:var(--surface-color); color:var(--text-primary); resize:vertical;"></textarea>
            </div>

            <div style="display:flex; gap:0.75rem; flex-wrap:wrap;">
                <a href="admin.php" class="btn">Save Category</a>
                <a href="admin.php" class="btn btn-ghost">Cancel</a>
            </div>
        </div>
    </div>
</main>

<?php
    include 'partials/footer-admin.php';
?>