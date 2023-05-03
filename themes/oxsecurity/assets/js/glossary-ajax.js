function ajaxGetCat(cat){
	loadmore_el = jQuery(".load-more");
	search_el = document.getElementById("search-term");
    console.log("search",search_el.value);
    if(!cat) cat = current_cat;
    current_cat = cat;
	addOrUpdateURLParam("ct", current_cat)
    jQuery.post(glossary_ajax_script.ajaxurl,{action:"glos_post_ajax", cat:cat, s: search_el.value},function(data){
        jQuery(".glossary-page-list").html(data);
        loadMore(6);
    },"html");
    
    catMenuItems = document.querySelectorAll(".glossary-cat-menu li");
    for(const item of catMenuItems){
        item.classList.remove('selected');
        if(item.dataset.catSlug==cat){
            item.classList.add('selected');
        }        
    }
}