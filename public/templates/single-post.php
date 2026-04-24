<?php
require_once '../../app/core/App.php';
App::init();

$postModel = new Post();

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$post = $postModel->find($id);

include_once 'partials/header.php';
?>

<?php if ($post): ?>
    <?php
        $imagePath = '../assets/images/item1.jpg';

        if (!empty($post->image)) {
            if (file_exists(__DIR__ . '/../uploads/' . $post->image)) {
                $imagePath = '../uploads/' . $post->image;
            } else {
                $imagePath = '../assets/images/' . $post->image;
            }
        }
    ?>

    <section id="intro" class="bg-light padding-large">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                    <div class="page-title text-center">
                        <h2><?php echo htmlspecialchars($post->title); ?></h2>
                        <div class="breadcum-items">
                            <span class="item"><a href="home.php">Home /</a></span>
                            <span class="item"><a href="blog.php">Blog /</a></span>
                            <span class="item colored"><?php echo htmlspecialchars($post->title); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="single-post" class="bg-light padding-large">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">

                    <figure class="mb-4">
                        <img 
                            width="400"
                            src="<?php echo htmlspecialchars($imagePath); ?>" 
                            alt="<?php echo htmlspecialchars($post->title); ?>" 
                            
                        >
                    </figure>

                    <div class="entry-meta mb-3">
                        <span class="author">
                            <span class="sp">by</span>
                            <span class="author-name">
                                <?php echo htmlspecialchars($post->author_name ?? 'Admin'); ?>
                            </span>
                        </span>

                        <?php if (!empty($post->created_at)): ?>
                            <span class="meta-date">
                                <span class="sp">-</span>
                                <time class="published">
                                    <?php echo date('M d, Y', strtotime($post->created_at)); ?>
                                </time>
                            </span>
                        <?php endif; ?>
                    </div>

                    <?php if (!empty($post->excerpt)): ?>
                        <p class="lead">
                            <?php echo htmlspecialchars($post->excerpt); ?>
                        </p>
                    <?php endif; ?>

                    <div class="post-content">
                        <?php echo nl2br(htmlspecialchars($post->content)); ?>
                    </div>

                    <div class="mt-5">
                        <a href="blog.php" class="btn btn-dark">Späť na blog</a>
                    </div>

                </div>
            </div>
        </div>
    </section>

<?php else: ?>

    <section id="intro" class="bg-light padding-large">
        <div class="container">
            <div class="text-center">
                <h2>Článok sa nenašiel</h2>
                <p>Požadovaný článok neexistuje alebo bol odstránený.</p>
                <a href="blog.php" class="btn btn-dark">Späť na blog</a>
            </div>
        </div>
    </section>

<?php endif; ?>

<?php
include 'partials/footer.php';
?>