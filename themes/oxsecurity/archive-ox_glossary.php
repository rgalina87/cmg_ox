<?php
/* Template Name: Glossary */
get_header();
?>

<h1>Glossary Page</h1>
<div class="glossary-page">
	<div class="cats-and-search">
		<ul class="glossary-cat-menu">
		<?php
echo '<li onclick="ajaxGetCat(\'all\')" data-cat-slug="all" class="btn btn-default">All</li>';
$categories = get_terms('glossary_category', array('hide_empty' => true));
for ($c = 0; $c < 3; $c++) {
    $category = $categories[$c];
    // echo '<li class="'.$selected.'"><a class="btn btn-default" href="?cat=' . $category->slug . '">' . $category->name . '</a></li>';
    echo '<li onclick="ajaxGetCat(\'' . $category->slug . '\')" data-cat-slug="' . $category->slug . '" class="btn btn-default">' . $category->name . '</li>';
} ?>

		<li class="cat-menu-more-button" onclick="showMoreMenu()">
			More
			<img src="<?php echo get_stylesheet_directory_uri() . "/images/Arrow.svg" ?>"/>
			<ul class="cat-menu-more">
			<?php
for ($c = 3; $c < count($categories); $c++) {
    $category = $categories[$c];
    // echo '<li class="'.$selected.'"><a class="btn btn-default" href="?cat=' . $category->slug . '">' . $category->name . '</a></li>';
    echo '<li onclick="ajaxGetCat(\'' . $category->slug . '\')" data-cat-slug="' . $category->slug . '" class="btn btn-default">' . $category->name . '</li>';
}
?>
			</ul>
		</li>

		</ul>

		<div class="search-input-wrap">
			<div class="search-input">
				<input oninput="searchInput()" type="text" id="search-term" name="search-term" value="" placeholder="Search keyword..." />
				<img src="<?php echo get_stylesheet_directory_uri() . "/images/Search.svg" ?>"/>
			</div>
		</div>
	</div>

	<div class="glossary-list-container">
		<ul class="glossary-page-list">
			<?php // ajax into this ?>
		</ul>
		<div class="load-more" onclick="loadMore()">Load More</div>
	</div>
</div>

<script>
	loadmore_el = jQuery(".load-more");
	popCatMenu = jQuery(".cat-menu-more");

	function searchInput(){
		if( document.getElementById("search-term").value.length < 3
		|| document.getElementById("search-term").value.length == 0 ){
			return;
		} else {
		ajaxGetCat();
		}
	}

	function loadMore(n_start){
		<?php // fake load more by showing more items ?>
		if(n_start) curSeenItems = n_start;
		else curSeenItems += 3;
		console.log("loadMore: ",curSeenItems);

		itmEls = document.querySelectorAll(".glossary-page-list > li");
		console.log("items:",itmEls.length);

		if(curSeenItems>itmEls.length){
			loadmore_el.fadeOut();
		} else {
			loadmore_el.fadeIn();
		}

		for(itm=1;itm<=curSeenItems;itm++){
			console.log("itm: ", itm);
			jQuery( ".glossary-page-list li:nth-child("+itm+")" ).fadeIn();
		}
	}

	function showMoreMenu(){
		popCatMenu.fadeToggle(200);
	}

	function addOrUpdateURLParam (key, value) {
		const searchParams = new URLSearchParams(window.location.search)
		searchParams.set(key, value)
		const newRelativePathQuery = window.location.pathname + "?" + searchParams.toString()
		history.pushState(null, "", newRelativePathQuery)
	}
	//addOrUpdateURLParam("glossary_category", cat)

	var catFromUrl = '';
	<?php
if (isset($_GET['ct'])) {
    echo "catFromUrl = '" . $_GET["ct"] . "'; ";
}
?>
	setTimeout(()=>{
		ajaxGetCat( catFromUrl ? catFromUrl : 'all');
	},100);
</script>

<?php // style is in css/glosary ?>

<?php get_footer();?>
