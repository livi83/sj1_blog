<?php
require_once '../../app/core/App.php';
App::init();

$postModel = new Post();
$allPosts = $postModel->all(); // Načítame úplne všetky články

include_once 'partials/header.php';
?>

<section id="intro" class="bg-light padding-large">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                <div class="page-title text-center">
                    <h2>Blog</h2>
                    <div class="breadcum-items">
                        <span class="item"><a href="home.php">Home /</a></span>
                        <span class="item colored">Blog</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="blog-section" class="bg-light padding-large">
    <div class="container">
        <div class="row">
            <?php if (!empty($allPosts)): ?>
                <?php foreach ($allPosts as $p): ?>
                    <?php
                        // Logika pre obrázok (rovnaká ako na home.php)
                        $imagePath = '../assets/images/item1.jpg'; // default
                        if (!empty($p->image)) {
                            if (file_exists(__DIR__ . '/../uploads/' . $p->image)) {
                                $imagePath = '../uploads/' . $p->image;
                            } else {
                                $imagePath = '../assets/images/' . $p->image;
                            }
                        }
                    ?>

                    <div class="post-item col-md-3 mb-4">
                        <figure class="zoom-effect">
                            <a href="single-post.php?id=<?php echo $p->id; ?>" class="zoom-in">
                                <img src="<?php echo htmlspecialchars($imagePath); ?>" alt="blog image" class="lgpostImg img-fluid">
                            </a>
                        </figure>
                        <div class="story-title-wrap mt-3">
                            <div class="post-meta"><a href="blog.php">Článok</a></div>
                            
                            <h3 class="story-title">
                                <a href="single-post.php?id=<?php echo $p->id; ?>">
                                    <?php echo htmlspecialchars($p->title); ?>
                                </a>
                            </h3>               
                            
                            <div class="entry-meta">
                                <span class="author">
                                    <span class="sp">by</span>
                                    <span class="author-name">
                                        <?php echo htmlspecialchars($p->author_name ?? 'Admin'); ?>
                                    </span>
                                </span>
                                <span class="meta-date">
                                    <span class="sp">-</span>
                                    <time class="published">
                                        <?php echo date('M d, Y', strtotime($p->created_at)); ?>
                                    </time>
                                </span>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p>Momentálne nie sú k dispozícii žiadne články.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php
include 'partials/footer.php';
?>