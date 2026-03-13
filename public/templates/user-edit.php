<?php
   include 'partials/header-admin.php';
?>
<main class="main-content">
   <div class="page-header">
      <h1 class="greeting">Edit User</h1>
      <p class="greeting-sub">Samostatná stránka pre úpravu existujúceho používateľa.</p>
   </div>
   <div class="card">
      <div class="card-header">
         <div>
            <h3 class="card-title">Edit User Form</h3>
            <p class="card-subtitle">Predvyplnená ukážka edit formulára</p>
         </div>
         <span class="badge badge-red">Edit</span>
      </div>
      <div style="padding:0 1.5rem 1.5rem;">
         <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(240px,1fr)); gap:1rem; margin-bottom:1rem;">
            <div>
               <label style="display:block; margin-bottom:0.5rem; font-weight:500;">Meno</label>
               <input type="text" value="Jenny Matt" style="width:100%; padding:0.85rem 1rem; border:1px solid var(--border-color); border-radius:12px; background:var(--surface-color); color:var(--text-primary);">
            </div>
            <div>
               <label style="display:block; margin-bottom:0.5rem; font-weight:500;">Email</label>
               <input type="email" value="jenny.matt@example.com" style="width:100%; padding:0.85rem 1rem; border:1px solid var(--border-color); border-radius:12px; background:var(--surface-color); color:var(--text-primary);">
            </div>
         </div>
         <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(240px,1fr)); gap:1rem; margin-bottom:1rem;">
            <div>
               <label style="display:block; margin-bottom:0.5rem; font-weight:500;">Rola</label>
               <select style="width:100%; padding:0.85rem 1rem; border:1px solid var(--border-color); border-radius:12px; background:var(--surface-color); color:var(--text-primary);">
                  <option selected>Author</option>
                  <option>Editor</option>
                  <option>Admin</option>
               </select>
            </div>
            <div>
               <label style="display:block; margin-bottom:0.5rem; font-weight:500;">Nové heslo</label>
               <input type="password" placeholder="Nechať prázdne, ak sa nemení" style="width:100%; padding:0.85rem 1rem; border:1px solid var(--border-color); border-radius:12px; background:var(--surface-color); color:var(--text-primary);">
            </div>
         </div>
         <div style="margin-bottom:1rem;">
            <label style="display:block; margin-bottom:0.5rem; font-weight:500;">Bio / Poznámka</label>
            <textarea rows="6" style="width:100%; padding:0.85rem 1rem; border:1px solid var(--border-color); border-radius:12px; background:var(--surface-color); color:var(--text-primary); resize:vertical;">Author of the TechLight demo posts used in the admin panel.</textarea>
         </div>
         <div style="display:flex; gap:0.75rem; flex-wrap:wrap;">
            <a href="admin.php" class="btn">Update User</a>
            <a href="admin.php" class="btn btn-ghost">Cancel</a>
         </div>
      </div>
   </div>
</main>
<?php
   include 'partials/footer-admin.php';
   ?>