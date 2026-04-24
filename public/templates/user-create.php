<?php
require_once '../../app/core/App.php';
App::init();

$user = new User();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $role = trim($_POST['role'] ?? 'author');
    $password = $_POST['password'] ?? '';
    $bio = trim($_POST['bio'] ?? '');

    if ($name !== '' && $email !== '' && $password !== '') {
        $user->create($name, $email, $password, $role, $bio);
        Redirect::redirect('admin.php');
        exit;
    }
}

include 'partials/header-admin.php';
?>

<main class="main-content">
    <div class="page-header">
        <h1 class="greeting">Create User</h1>
        <p class="greeting-sub">Samostatná stránka pre vytvorenie nového používateľa.</p>
    </div>

    <div class="card">
        <div class="card-header">
            <div>
                <h3 class="card-title">New User Form</h3>
                <p class="card-subtitle">Formulár na vytvorenie nového používateľa</p>
            </div>
            <span class="badge badge-green">Create</span>
        </div>

        <form method="POST" style="padding:0 1.5rem 1.5rem;">
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(240px,1fr)); gap:1rem; margin-bottom:1rem;">
                <div>
                    <label style="display:block; margin-bottom:0.5rem; font-weight:500;">Meno</label>
                    <input
                        type="text"
                        name="name"
                        value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>"
                        placeholder="Napr. Jenny Matt"
                        style="width:100%; padding:0.85rem 1rem; border:1px solid var(--border-color); border-radius:12px; background:var(--surface-color); color:var(--text-primary);"
                        required>
                </div>

                <div>
                    <label style="display:block; margin-bottom:0.5rem; font-weight:500;">Email</label>
                    <input
                        type="email"
                        name="email"
                        value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>"
                        placeholder="napr. jenny.matt@example.com"
                        style="width:100%; padding:0.85rem 1rem; border:1px solid var(--border-color); border-radius:12px; background:var(--surface-color); color:var(--text-primary);"
                        required>
                </div>
            </div>

            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(240px,1fr)); gap:1rem; margin-bottom:1rem;">
                <div>
                    <label style="display:block; margin-bottom:0.5rem; font-weight:500;">Rola</label>
                    <select
                        name="role"
                        style="width:100%; padding:0.85rem 1rem; border:1px solid var(--border-color); border-radius:12px; background:var(--surface-color); color:var(--text-primary);">
                        <option value="author" <?php echo (($_POST['role'] ?? '') === 'author') ? 'selected' : ''; ?>>Author</option>
                        <option value="editor" <?php echo (($_POST['role'] ?? '') === 'editor') ? 'selected' : ''; ?>>Editor</option>
                        <option value="admin" <?php echo (($_POST['role'] ?? '') === 'admin') ? 'selected' : ''; ?>>Admin</option>
                    </select>
                </div>

                <div>
                    <label style="display:block; margin-bottom:0.5rem; font-weight:500;">Heslo</label>
                    <input
                        type="password"
                        name="password"
                        placeholder="********"
                        style="width:100%; padding:0.85rem 1rem; border:1px solid var(--border-color); border-radius:12px; background:var(--surface-color); color:var(--text-primary);"
                        required>
                </div>
            </div>

            <div style="margin-bottom:1rem;">
                <label style="display:block; margin-bottom:0.5rem; font-weight:500;">Bio / Poznámka</label>
                <textarea
                    name="bio"
                    rows="6"
                    placeholder="Krátky popis používateľa..."
                    style="width:100%; padding:0.85rem 1rem; border:1px solid var(--border-color); border-radius:12px; background:var(--surface-color); color:var(--text-primary); resize:vertical;"><?php echo htmlspecialchars($_POST['bio'] ?? ''); ?></textarea>
            </div>

            <div style="display:flex; gap:0.75rem; flex-wrap:wrap;">
                <button type="submit" class="btn">Save User</button>
                <a href="admin.php" class="btn btn-ghost">Cancel</a>
            </div>
        </form>
    </div>
</main>

<?php include 'partials/footer-admin.php'; ?>