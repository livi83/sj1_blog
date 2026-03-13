<?php
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
                <p class="card-subtitle">Predvyplnená ukážka edit formulára</p>
            </div>
            <span class="badge badge-red">Edit</span>
        </div>

        <div style="padding:0 1.5rem 1.5rem;">
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(240px,1fr)); gap:1rem; margin-bottom:1rem;">
                <div>
                    <label style="display:block; margin-bottom:0.5rem; font-weight:500;">Názov</label>
                    <input type="text" value="The most powerful small sized robots in the world" style="width:100%; padding:0.85rem 1rem; border:1px solid var(--border-color); border-radius:12px; background:var(--surface-color); color:var(--text-primary);">
                </div>
                <div>
                    <label style="display:block; margin-bottom:0.5rem; font-weight:500;">Kategória</label>
                    <select style="width:100%; padding:0.85rem 1rem; border:1px solid var(--border-color); border-radius:12px; background:var(--surface-color); color:var(--text-primary);">
                        <option selected>Fashion</option>
                    </select>
                </div>
            </div>

            <div style="margin-bottom:1rem;">
                <label style="display:block; margin-bottom:0.5rem; font-weight:500;">Obsah</label>
                <textarea rows="10" style="width:100%; padding:0.85rem 1rem; border:1px solid var(--border-color); border-radius:12px; background:var(--surface-color); color:var(--text-primary); resize:vertical;">How did the hand pies look? Did you love the brownies? How many choux did you eat in one sitting? After a gorgeous selection of our favorites for a client to send as a new year’s gift.</textarea>
            </div>

            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(240px,1fr)); gap:1rem; margin-bottom:1rem;">
                <div>
                    <label style="display:block; margin-bottom:0.5rem; font-weight:500;">Autor</label>
                    <select style="width:100%; padding:0.85rem 1rem; border:1px solid var(--border-color); border-radius:12px; background:var(--surface-color); color:var(--text-primary);">
                        <option selected>Jenny Matt</option>
                    </select>
                </div>
                <div>
                    <label style="display:block; margin-bottom:0.5rem; font-weight:500;">Čas vytvorenia</label>
                    <input type="datetime-local" value="2022-02-12T09:00" style="width:100%; padding:0.85rem 1rem; border:1px solid var(--border-color); border-radius:12px; background:var(--surface-color); color:var(--text-primary);">
                </div>
            </div>

            <div style="margin-bottom:1rem;">
                <label style="display:block; margin-bottom:0.5rem; font-weight:500;">Status</label>
                <select style="width:100%; padding:0.85rem 1rem; border:1px solid var(--border-color); border-radius:12px; background:var(--surface-color); color:var(--text-primary);">
                    <option>Draft</option>
                    <option selected>Published</option>
                </select>
            </div>

            <div style="display:flex; gap:0.75rem; flex-wrap:wrap;">
                <a href="admin.php" class="btn">Update Post</a>
                <a href="admin.php" class="btn btn-ghost">Cancel</a>
            </div>
        </div>
    </div>
</main>

<?php
    include 'partials/footer-admin.php';
?>