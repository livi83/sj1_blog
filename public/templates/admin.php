<?php
require_once '../../app/core/App.php';
App::init();

$category = new Category();
$post = new Post();
$user = new User();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete') {
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $type = $_POST['type'] ?? '';

    if ($id > 0) {
        if ($type === 'category') {
            $category->delete($id);
        }

        if ($type === 'post') {
            $post->delete($id);
        }

        if ($type === 'user') {
            $user->delete($id);
        }
    }
    Redirect::redirect('admin.php');
    exit;
}

$categories = $category->all();
$posts = $post->all();
$users = $user->all();

include 'partials/header-admin.php';
?>

<main class="main-content">
    <div class="page-header">
        <h1 class="greeting">Blog CMS Admin Dashboard</h1>
        <p class="greeting-sub">Frontend pripravený pre správu blog postov, kategórií a používateľov.</p>
    </div>

    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(220px,1fr)); gap:1rem; margin-bottom:1.5rem;">
        <div class="card" style="padding:1.25rem;">
            <p style="margin:0; color:var(--text-secondary); font-size:0.875rem;">Celkom blog postov</p>
            <h3 style="margin:0.5rem 0 0;"><?php echo count($posts); ?></h3>
        </div>

        <div class="card" style="padding:1.25rem;">
            <p style="margin:0; color:var(--text-secondary); font-size:0.875rem;">Celkom kategórií</p>
            <h3 style="margin:0.5rem 0 0;"><?php echo count($categories); ?></h3>
        </div>

        <div class="card" style="padding:1.25rem;">
            <p style="margin:0; color:var(--text-secondary); font-size:0.875rem;">Celkom userov</p>
            <h3 style="margin:0.5rem 0 0;"><?php echo count($users); ?></h3>
        </div>

        <div class="card" style="padding:1.25rem;">
            <p style="margin:0; color:var(--text-secondary); font-size:0.875rem;">Draft posty</p>
            <h3 style="margin:0.5rem 0 0;">
                <?php
                    $draftCount = 0;
                    foreach ($posts as $p) {
                        if ($p->status === 'draft') {
                            $draftCount++;
                        }
                    }
                    echo $draftCount;
                ?>
            </h3>
        </div>
    </div>

    <div class="card" style="margin-bottom:1.5rem;">
        <div class="card-header">
            <div>
                <h3 class="card-title">Quick Actions</h3>
                <p class="card-subtitle">Ukážka akcií, ktoré budú študenti implementovať</p>
            </div>
        </div>
        <div style="display:flex; flex-wrap:wrap; gap:0.75rem; padding:0 1.5rem 1.5rem;">
            <a href="blog-post-create.php" class="btn">+ Create Blog Post</a>
            <a href="category-create.php" class="btn btn-ghost">+ Create Category</a>
            <a href="user-create.php" class="btn btn-ghost">+ Create User</a>
        </div>
    </div>

    <div class="card" id="blog-posts" style="margin-bottom:1.5rem;">
        <div class="card-header">
            <div>
                <h3 class="card-title">Blog Posts</h3>
                <p class="card-subtitle">CRUD pre blog posty</p>
            </div>
            <a href="blog-post-create.php" class="btn btn-ghost">+ New Post</a>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Názov</th>
                        <th>Slug</th>
                        <th>User ID</th>
                        <th>Vytvorené</th>
                        <th>Stav</th>
                        <th>Akcie</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($posts as $p): ?>
                        <tr>
                            <td>#<?php echo htmlspecialchars($p->id); ?></td>
                            <td>
                                <div style="font-weight:600;">
                                    <?php echo htmlspecialchars($p->title); ?>
                                </div>
                                <div style="font-size:0.8125rem; color:var(--text-secondary);">
                                    <?php echo htmlspecialchars($p->excerpt); ?>
                                </div>
                            </td>
                            <td><?php echo htmlspecialchars($p->slug); ?></td>
                            <td><?php echo htmlspecialchars($p->user_id); ?></td>
                            <td><?php echo htmlspecialchars($p->created_at); ?></td>
                            <td>
                                <?php if ($p->status === 'published'): ?>
                                    <span class="badge badge-green">Published</span>
                                <?php else: ?>
                                    <span class="badge badge-red">Draft</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div style="display:flex; gap:0.5rem; flex-wrap:wrap;">
                                    <a href="blog-post-edit.php?id=<?php echo $p->id; ?>" class="btn btn-ghost">
                                        Edit
                                    </a>

                                    <form method="POST" style="display:inline;" onsubmit="return confirm('Naozaj vymazať?')">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="type" value="post">
                                        <input type="hidden" name="id" value="<?php echo $p->id; ?>">
                                        <button type="submit" class="btn btn-ghost" style="color:red; cursor:pointer;">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    <?php if (empty($posts)): ?>
                        <tr>
                            <td colspan="7" style="text-align:center;">Žiadne blog posty neboli nájdené.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card" id="categories" style="margin-bottom:1.5rem;">
        <div class="card-header">
            <div>
                <h3 class="card-title">Categories</h3>
                <p class="card-subtitle">CRUD pre kategórie blogu</p>
            </div>
            <a href="category-create.php" class="btn btn-ghost">+ New Category</a>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Názov kategórie</th>
                        <th>Slug</th>
                        <th>Popis</th>
                        <th>Počet článkov</th>
                        <th>Akcie</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $cat): ?>
                        <tr>
                            <td>#<?php echo htmlspecialchars($cat->id); ?></td>
                            <td><?php echo htmlspecialchars($cat->name); ?></td>
                            <td><?php echo htmlspecialchars($cat->slug); ?></td>
                            <td><?php echo htmlspecialchars($cat->description); ?></td>
                            <td><?php echo htmlspecialchars($cat->posts_count); ?></td>
                            <td>
                                <div style="display:flex; gap:0.5rem; flex-wrap:wrap;">
                                    <a href="category-edit.php?id=<?php echo $cat->id; ?>" class="btn btn-ghost">
                                        Edit
                                    </a>

                                    <form method="POST" style="display:inline;" onsubmit="return confirm('Naozaj vymazať?')">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="type" value="category">
                                        <input type="hidden" name="id" value="<?php echo $cat->id; ?>">
                                        <button type="submit" class="btn btn-ghost" style="color:red; cursor:pointer;">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    <?php if (empty($categories)): ?>
                        <tr>
                            <td colspan="6" style="text-align:center;">Žiadne kategórie neboli nájdené.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card" id="users">
        <div class="card-header">
            <div>
                <h3 class="card-title">Users</h3>
                <p class="card-subtitle">CRUD pre používateľov, ktorí vytvárajú blog posty</p>
            </div>
            <a href="user-create.php" class="btn btn-ghost">+ New User</a>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Meno</th>
                        <th>Email</th>
                        <th>Rola</th>
                        <th>Počet postov</th>
                        <th>Akcie</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $u): ?>
                        <tr>
                            <td>#<?php echo htmlspecialchars($u->id); ?></td>
                            <td><?php echo htmlspecialchars($u->name); ?></td>
                            <td><?php echo htmlspecialchars($u->email); ?></td>
                            <td>
                                <?php if ($u->role === 'admin'): ?>
                                    <span class="badge badge-green">Admin</span>
                                <?php else: ?>
                                    <span class="badge badge-red">Author</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo htmlspecialchars($u->posts_count ?? 0); ?></td>
                            <td>
                                <div style="display:flex; gap:0.5rem; flex-wrap:wrap;">
                                    <a href="user-edit.php?id=<?php echo $u->id; ?>" class="btn btn-ghost">
                                        Edit
                                    </a>

                                    <form method="POST" style="display:inline;" onsubmit="return confirm('Naozaj vymazať?')">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="type" value="user">
                                        <input type="hidden" name="id" value="<?php echo $u->id; ?>">
                                        <button type="submit" class="btn btn-ghost" style="color:red; cursor:pointer;">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    <?php if (empty($users)): ?>
                        <tr>
                            <td colspan="6" style="text-align:center;">Žiadni používatelia neboli nájdení.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php include 'partials/footer-admin.php'; ?>