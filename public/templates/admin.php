<?php
require_once '../../app/core/App.php';
App::init();

Auth::requireLogin();

$category = new Category();
$post = new Post();
$user = new User();

$isAdmin = Auth::isAdmin();

/*
    DELETE akcie
*/
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'delete') {
    $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
    $type = $_POST['type'] ?? '';

    if ($id > 0) {

        if ($type === 'post') {
            $post->delete($id);
        }

        if ($type === 'category') {
            $category->delete($id);
        }

        if ($type === 'user') {
            if (!$isAdmin) {
                http_response_code(403);
                exit('Nemáte oprávnenie.');
            }

            $user->delete($id);
        }
    }

    Redirect::redirect('admin.php');
}

/*
    Dáta
*/
$categories = $category->all();
$posts = $post->all();
$users = $isAdmin ? $user->all() : [];

/*
    Draft count
*/
$draftCount = 0;
foreach ($posts as $p) {
    if ($p->status === 'draft') {
        $draftCount++;
    }
}

include 'partials/header-admin.php';
?>

<main class="main-content">
    <div class="page-header">
        <h1 class="greeting">Admin Dashboard</h1>
        <p class="greeting-sub">
            Prihlásený používateľ s rolou: 
            <strong><?php echo $isAdmin ? 'Admin' : 'Author'; ?></strong>
        </p>
    </div>

    <!-- Stats -->
    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(220px,1fr)); gap:1rem; margin-bottom:1.5rem;">
        <div class="card" style="padding:1.25rem;">
            <p>Posty</p>
            <h3><?php echo count($posts); ?></h3>
        </div>

        <div class="card" style="padding:1.25rem;">
            <p>Kategórie</p>
            <h3><?php echo count($categories); ?></h3>
        </div>

        <?php if ($isAdmin): ?>
            <div class="card" style="padding:1.25rem;">
                <p>Používatelia</p>
                <h3><?php echo count($users); ?></h3>
            </div>
        <?php endif; ?>

        <div class="card" style="padding:1.25rem;">
            <p>Draft</p>
            <h3><?php echo $draftCount; ?></h3>
        </div>
    </div>

    <!-- Actions -->
    <div class="card" style="margin-bottom:1.5rem;">
        <div style="padding:1.5rem;">
            <a href="blog-post-create.php" class="btn">+ Post</a>
            <a href="category-create.php" class="btn btn-ghost">+ Category</a>

            <?php if ($isAdmin): ?>
                <a href="user-create.php" class="btn btn-ghost">+ User</a>
            <?php endif; ?>
        </div>
    </div>

    <!-- POSTS -->
    <div class="card" style="margin-bottom:1.5rem;">
        <div class="card-header">
            <h3>Blog Posts</h3>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Názov</th>
                    <th>User</th>
                    <th>Stav</th>
                    <th>Akcie</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($posts as $p): ?>
                    <tr>
                        <td>#<?php echo $p->id; ?></td>
                        <td><?php echo htmlspecialchars($p->title); ?></td>
                        <td><?php echo $p->user_id; ?></td>
                        <td><?php echo $p->status; ?></td>
                        <td>
                            <a href="blog-post-edit.php?id=<?php echo $p->id; ?>">Edit</a>

                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="type" value="post">
                                <input type="hidden" name="id" value="<?php echo $p->id; ?>">
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- CATEGORIES -->
    <div class="card" style="margin-bottom:1.5rem;">
        <div class="card-header">
            <h3>Categories</h3>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Názov</th>
                    <th>Akcie</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($categories as $c): ?>
                    <tr>
                        <td>#<?php echo $c->id; ?></td>
                        <td><?php echo htmlspecialchars($c->name); ?></td>
                        <td>
                            <a href="category-edit.php?id=<?php echo $c->id; ?>">Edit</a>

                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="type" value="category">
                                <input type="hidden" name="id" value="<?php echo $c->id; ?>">
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- USERS (len admin) -->
    <?php if ($isAdmin): ?>
        <div class="card">
            <div class="card-header">
                <h3>Users</h3>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Meno</th>
                        <th>Email</th>
                        <th>Akcie</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($users as $u): ?>
                        <tr>
                            <td>#<?php echo $u->id; ?></td>
                            <td><?php echo htmlspecialchars($u->name); ?></td>
                            <td><?php echo htmlspecialchars($u->email); ?></td>
                            <td>
                                <a href="user-edit.php?id=<?php echo $u->id; ?>">Edit</a>

                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="type" value="user">
                                    <input type="hidden" name="id" value="<?php echo $u->id; ?>">
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</main>

<?php include 'partials/footer-admin.php'; ?>