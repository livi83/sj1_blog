<?php
require_once '../../app/core/App.php';
App::init();

$category = new Category();


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete') {
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $type = $_POST['type'] ?? '';

    if ($id > 0) {
        if ($type === 'category') {
            $category->delete($id);
        }
    }

    header('Location: admin.php');
    exit;
}

$categories = $category->all();

include 'partials/header-admin.php';
?>

<main class="main-content">
    <div class="page-header">
        <h1 class="greeting">Blog CMS Admin Dashboard</h1>
        <p class="greeting-sub">Frontend pripravený pre správu blog postov, kategórií a používateľov.</p>
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


</main>

<?php include 'partials/footer-admin.php'; ?>