<?php
require_once '../../app/core/App.php';
App::init();

$post = new Post();
$posts = $post->all(); // vsetko

// Orezanie: začne od indexu 0 a vezme 3 prvky
$latestPosts = array_slice($posts, 0, 3);

include_once 'partials/header.php';
?>

<section id="slider" class="position-relative padding-xlarge no-padding-top">

	<div class="container">

		<div class="swiper main-slider overflow-hidden">
		    <div class="swiper-wrapper">

		        <div class="swiper-slide">
					<img src="../assets/images/slider-img1.jpg" class="slider-img img-fluid">
				  	<div class="carousel-text text-start">
				        <div class="story-title-wrap mt-3">
							<h2 class="story-title"><a href="single-post.php">The most powerful small sized robots in the world</a></h2>				
							<p>How did the hand pies look? Did you love the brownies? How many choux did you eat in one sitting? After  a gorgeous selection of our favorites for a client to send as a new year’s gift.</p>
							<div class="entry-meta">
								<span class="author"><span class="sp">by</span><span class="author-name">Jenny Matt</span></span>
								<span class="meta-date"><span class="sp">-</span><time class="published" datetime="">Feb 12, 2022</time></span>
							</div>
						</div>
				    </div>
				</div>

				<div class="swiper-slide">
					<img src="../assets/images/slider-img2.jpg" class="slider-img img-fluid">
				  	<div class="carousel-text text-start">
				        <div class="story-title-wrap mt-3">
							<h2 class="story-title"><a href="single-post.php">The most powerful small sized robots in the world</a></h2>				
							<p>How did the hand pies look? Did you love the brownies? How many choux did you eat in one sitting? After  a gorgeous selection of our favorites for a client to send as a new year’s gift.</p>
							<div class="entry-meta">
								<span class="author"><span class="sp">by</span><span class="author-name">Jenny Matt</span></span>
								<span class="meta-date"><span class="sp">-</span><time class="published" datetime="">Feb 12, 2022</time></span>
							</div>
						</div>
				    </div>
				</div>

				<div class="swiper-slide">
					<img src="../assets/images/slider-img3.jpg" class="slider-img img-fluid">
				  	<div class="carousel-text text-start">
				        <div class="story-title-wrap mt-3">
							<h2 class="story-title"><a href="single-post.php">The most powerful small sized robots in the world</a></h2>				
							<p>How did the hand pies look? Did you love the brownies? How many choux did you eat in one sitting? After  a gorgeous selection of our favorites for a client to send as a new year’s gift.</p>
							<div class="entry-meta">
								<span class="author"><span class="sp">by</span><span class="author-name">Jenny Matt</span></span>
								<span class="meta-date"><span class="sp">-</span><time class="published" datetime="">Feb 12, 2022</time></span>
							</div>
						</div>
				    </div>
				</div>
		    </div>
		</div>
	    <div class="swiper-icon swiper-arrow slider-arrow-next position-absolute top-0 bottom-0 end-0 d-flex align-items-center">
          <a href="#"><svg class="bi" width="60" height="60"><use xlink:href="#long-arrow-alt-right"></use></svg></a>
        </div>
	    <div class="swiper-icon swiper-arrow slider-arrow-prev position-absolute top-0 bottom-0 start-0 d-flex align-items-center">
          <a href="#"><svg class="bi" width="60" height="60"><use xlink:href="#long-arrow-alt-left"></use></svg></a>
        </div>
        <div class="swiper-pagination main-slider-pagination"></div>

	</div>
</section>

<section id="latest-posts" class="latest-posts margin-large">
	<div class="container">
		<div class="title-wrap d-flex justify-content-between">			
			<div class="section-header">
				<h4 class="elementary-title">Latest Posts</h4>
			</div>
			<a href="blog.php" class="button">All news<svg class="bi" width="18" height="18"><use xlink:href="#chevron-forward"></use></svg></a>
		</div>

		<div class="row">
			<?php if (!empty($latestPosts)): ?>
				<?php foreach ($latestPosts as $p): ?>
					<?php
						$imagePath = '../assets/images/item1.jpg';

						if (!empty($p->image)) {
							if (file_exists(__DIR__ . '/../uploads/' . $p->image)) {
								$imagePath = '../uploads/' . $p->image;
							} else {
								$imagePath = '../assets/images/' . $p->image;
							}
						}
					?>

					<div class="post-item col-md-4">
						<figure class="zoom-effect">
							<a href="single-post.php?id=<?php echo htmlspecialchars($p->id); ?>" class="zoom-in">
								<img src="<?php echo htmlspecialchars($imagePath); ?>" alt="stories" class="blogImg img-fluid">
							</a>
						</figure>

						<div class="story-title-wrap mt-3">

							<h3 class="story-title">
								<a href="single-post.php?id=<?php echo htmlspecialchars($p->id); ?>">
									<?php echo htmlspecialchars($p->title); ?>
								</a>
							</h3>

							<div class="entry-meta">
								<span class="author">
									<span class="sp">by</span>
									<span class="author-name">
										<?php echo htmlspecialchars($p->author_name ?? 'Unknown Author'); ?>
									</span>
								</span>

								<span class="meta-date">
									<span class="sp">-</span>
									<time class="published" datetime="<?php echo htmlspecialchars($p->created_at ?? ''); ?>">
										<?php echo !empty($p->created_at) ? date('M d, Y', strtotime($p->created_at)) : 'No date'; ?>
									</time>
								</span>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php else: ?>
				<div class="col-12">
					<p>Žiadne články neboli nájdené.</p>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>

<?php
include 'partials/footer.php';
?>