<?php
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
            <h3 style="margin:0.5rem 0 0;">4</h3>
        </div>
        <div class="card" style="padding:1.25rem;">
            <p style="margin:0; color:var(--text-secondary); font-size:0.875rem;">Celkom kategórií</p>
            <h3 style="margin:0.5rem 0 0;">1</h3>
        </div>
        <div class="card" style="padding:1.25rem;">
            <p style="margin:0; color:var(--text-secondary); font-size:0.875rem;">Celkom userov</p>
            <h3 style="margin:0.5rem 0 0;">1</h3>
        </div>
        <div class="card" style="padding:1.25rem;">
            <p style="margin:0; color:var(--text-secondary); font-size:0.875rem;">Draft posty</p>
            <h3 style="margin:0.5rem 0 0;">1</h3>
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
                <p class="card-subtitle">CRUD pre blog posty: názov, obsah, kategória, vytvoril, čas vytvorenia</p>
            </div>
            <a href="blog-post-create.php" class="btn btn-ghost">+ New Post</a>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Názov</th>
                        <th>Kategória</th>
                        <th>Autor</th>
                        <th>Vytvorené</th>
                        <th>Stav</th>
                        <th>Akcie</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#101</td>
                        <td>
                            <div style="font-weight:600;">The most powerful small sized robots in the world</div>
                            <div style="font-size:0.8125rem; color:var(--text-secondary);">
                                How did the hand pies look? Did you love the brownies? How many choux did you eat in one sitting? After a gorgeous selection of our favorites for a client to send as a new year’s gift.
                            </div>
                        </td>
                        <td>Fashion</td>
                        <td>Jenny Matt</td>
                        <td>2022-02-12 09:00</td>
                        <td><span class="badge badge-green">Published</span></td>
                        <td>
                            <div style="display:flex; gap:0.5rem; flex-wrap:wrap;">
                                <a href="blog-post-edit.php" class="btn btn-ghost">Edit</a>
                                <a href="#" class="btn btn-ghost">Delete</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>#102</td>
                        <td>
                            <div style="font-weight:600;">10 Distinctive Features of the iPhone and iPod Touch</div>
                            <div style="font-size:0.8125rem; color:var(--text-secondary);">
                                Article visible in Latest Posts section.
                            </div>
                        </td>
                        <td>Fashion</td>
                        <td>Jenny Matt</td>
                        <td>2022-02-12 10:15</td>
                        <td><span class="badge badge-green">Published</span></td>
                        <td>
                            <div style="display:flex; gap:0.5rem; flex-wrap:wrap;">
                                <a href="blog-post-edit.php" class="btn btn-ghost">Edit</a>
                                <a href="#" class="btn btn-ghost">Delete</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>#103</td>
                        <td>
                            <div style="font-weight:600;">10 Things That Make the iPhone and iPod touch different</div>
                            <div style="font-size:0.8125rem; color:var(--text-secondary);">
                                Article visible in Latest Posts section.
                            </div>
                        </td>
                        <td>Fashion</td>
                        <td>Jenny Matt</td>
                        <td>2022-02-12 11:30</td>
                        <td><span class="badge badge-green">Published</span></td>
                        <td>
                            <div style="display:flex; gap:0.5rem; flex-wrap:wrap;">
                                <a href="blog-post-edit.php" class="btn btn-ghost">Edit</a>
                                <a href="#" class="btn btn-ghost">Delete</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>#104</td>
                        <td>
                            <div style="font-weight:600;">10 Things That Make the iPhone and iPod touch different</div>
                            <div style="font-size:0.8125rem; color:var(--text-secondary);">
                                Duplicate title from the third Latest Posts card, kept intentionally to match the source draft.
                            </div>
                        </td>
                        <td>Fashion</td>
                        <td>Jenny Matt</td>
                        <td>2022-02-12 12:45</td>
                        <td><span class="badge badge-red">Draft</span></td>
                        <td>
                            <div style="display:flex; gap:0.5rem; flex-wrap:wrap;">
                                <a href="blog-post-edit.php" class="btn btn-ghost">Edit</a>
                                <a href="#" class="btn btn-ghost">Delete</a>
                            </div>
                        </td>
                    </tr>
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
                        <th>Počet článkov</th>
                        <th>Akcie</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#1</td>
                        <td>Fashion</td>
                        <td>fashion</td>
                        <td>4</td>
                        <td>
                            <div style="display:flex; gap:0.5rem; flex-wrap:wrap;">
                                <a href="category-edit.php" class="btn btn-ghost">Edit</a>
                                <a href="#" class="btn btn-ghost">Delete</a>
                            </div>
                        </td>
                    </tr>
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
                    <tr>
                        <td>#1</td>
                        <td>Jenny Matt</td>
                        <td>jenny.matt@example.com</td>
                        <td><span class="badge badge-green">Author</span></td>
                        <td>4</td>
                        <td>
                            <div style="display:flex; gap:0.5rem; flex-wrap:wrap;">
                                <a href="user-edit.php" class="btn btn-ghost">Edit</a>
                                <a href="#" class="btn btn-ghost">Delete</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?php
    include 'partials/footer-admin.php';
?>