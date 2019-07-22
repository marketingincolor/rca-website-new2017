/**
 * Description:
 *  
 * Called when user clicks on a button on the blog page.
 * Sets hidden input rca_query to equal the button that was clicked.
 * Hidden input rca_query value is used for when the user clicks on the dropdown.
 *
 * @author  Doe
 * @param {string} templateURL page the function is called on.
 * @return {void}          
 */
$('.news-filter').on('click',function() {
    // Show Load More Button
    $('.load-more').show();
    var templateURL = afp_vars.templateURL;
    console.log(templateURL);
    var newsButton = $(this);

    // Start by removing state from news buttons.
    var allButtons = $('.news-filter');
    allButtons.removeClass('newsClick');

    // Add State if we click on a button.
    $(this).addClass('newsClick');
    var category = newsButton.attr('news_filter');
    //var total_posts = $('.rca_total_posts').val();


    filterNewsPosts(templateURL, category, ajaxFilterYear());

    // Add to hidden input
    $('.rca_query').attr('value', category);
});

/**
 * Description:
 *
 * Used for returning the category that was originally clicked on.
 * If nothing has been clicked on the string "all" is returned to show all blog posts.
 *
 * @author Doe
 * @return {string} Returns category stored in hidden input rca_query. This is saved using filterPosts().
 */
function getCategory() {
    var category = $('.rca_query').val();
    console.warn("The Category: " + category);
    return category;
}

/**
 * Description:
 *
 * Used for returning the TYPE of post (with addition of BLOG).
 *
 * @author ET
 * @return {string} Returns category stored in hidden input rca_type. This is saved using filterPosts().
 */
function getType() {
    var type = $('.rca_type').val();
    console.warn("The Type: " + type);
    return type;
}

/**
 * Description:
 *
 * Determines the year for AJAX year dropdown.
 * If user selects an option, that year is used. Otherwise, we use set beginning year through current year.
 * In simple terms, returns all years or year selected.
 *
 * @author  Doe 
 * @return {int} year
 */
function ajaxFilterYear() {

    // Set Start Date and End Date for Year Array.
    var date = new Date();
    var beginningYear = 2016;
    var currentYear = date.getFullYear();
    var yearArray = new Array();

    // Creates an Array of Years for posts to look for.
    for($i=beginningYear; $i <= currentYear; $i++) {
        yearArray.push($i);
    }

    // Gets selected item in dropdown.
    var select = document.getElementById("newsFilterSelect");
    selectedNode = select.options[select.selectedIndex].value;

    if(selectedNode == "" || selectedNode == "Year") {
        selectedNode = yearArray;
    }

    var dropdown_query = selectedNode;
    return dropdown_query;

}



/**
 * Description:
 * 
 * Ran from filterPosts()
 * POSTS data to filter-posts.php and adds to page-news.php.
 *
 * @author  Doe
 * @param {string} templateURL page the function was called on.
 * @param {string} category Category stored in hidden input rca_query
 * @param {array} dropdown_query array of years to query.
 * @return {void} AJAX call to filter-posts.php
*/
function filterNewsPosts(templateURL, category, dropdown_query) {

    // Offset will always be 0 when we click on top level button
    var offset = 0;
    var counter = $('.rca_offset');
    var content = $('.post-container');
    var counterValue = offset;
    counter.attr('value', counterValue);

    // If we don't have a category log an error to the console.
    if(category == "") {
        console.warn('RCA Information: No Category Selected. Showing All Posts...');
        category = 'all';
    }

    // If we don't have a year from the dropdown log an error to the console.
    if(dropdown_query == "" ) {
        console.warn('RCA Information: No dropdown query found.');
    }

    content.hide();


    console.log('Offset: ' + offset);

        $.ajax({
            url: templateURL + '/load-more.php',
            type: 'POST',
            beforeSend: function() {
                $('.spinner').fadeIn(500); 
            },
            data: {category : category, dropdown_query : dropdown_query, offset : counterValue },
            success: function(response) {
                        content.html(response).fadeIn(1000);
            },
            complete: function() { $('.spinner').fadeOut(500); }
        });

}

/**
 * Description:
 * 
 * Ran from select option on blog page. Doesn't display the loading animation.
 * POSTS data to filter-posts.php and adds to page-news.php.
 *
 * @author  Doe
 * @param {string} templateURL page the function was called on.
 * @param {string} category Category stored in hidden input rca_query
 * @param {array} dropdown_query array of years to query.
 * @return {void} AJAX call to filter-posts.php
*/
//function filterNewsPostsNoSpinner(templateURL, category, dropdown_query) {
$('#newsFilterSelect').on('change', function() {

    $('.load-more').show();

    var templateURL = afp_vars.templateURL;
    var category = getCategory();
    var newstype = getType();
    var dropdown_query = ajaxFilterYear();
    var total_posts = $('.rca_total_posts').attr('value', '0');
    console.warn('total posts: ' + Number(total_posts.val()));
    var offsetContainer = $('.rca_offset');
    var offsetValue = $('.rca_offset').val();
    
    offsetContainer.attr("value", Number(offsetValue));
    offsetValue = offsetContainer.val();

    if(newstype == "blog") {
        category = "blog";
    }
    // If we don't have a category log an error to the console.
    if(category == "") {
        console.warn('RCA Information: No Category Selected. Showing All Posts...');
    }

    if(category == "all"){
        console.warn("Viewing All Categories.");
    }

    // If we don't have a year from the dropdown log an error to the console.
    if(dropdown_query == "" ) {
        dropdown_query == '2017';
        console.warn('RCA Information: No dropdown query found.');
    }

    filterNewsPosts(templateURL, category, dropdown_query);
    //var content = $('.post-container');
    //content.hide();

})




/**
 * Description:
 * 
 * Magically "View All" posts when the page is loaded.
 *
 * @author  Doe
 * @param  {[string]} templateURL    [Path to page where function is ran]
 * @param  {[string]} category       [defaults to "all" to view all blog posts]
 * @param  {[array]} dropdown_query ["defaults to get all years"]
 * @return {[void]}                [AJAX request]
 */
function defaultNewsFilter(templateURL, dropdown_query) {

    var urlParams = new URLSearchParams(window.location.search);
    function getUrlParameter(name) {
        name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
        var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
        var results = regex.exec(location.search);
        return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
    };

    var cat = getUrlParameter("cat");

    if(cat == "news") {
        $('#filter-news').addClass('newsClick');
        $('.rca_query').attr('value', 'news');
    }

    if(cat == "events") {
        $('#events').addClass('newsClick');
        $('.rca_query').attr('value', 'events');
    }

    if(cat == "press-releases") {
        $('#press').addClass('newsClick');
        $('.rca_query').attr('value', 'press-releases');

    }

    if(cat == "") {
        $('#all').addClass('newsClick');
        $('.rca_query').attr('value', 'all');

    }

    console.log("Catagory " + cat);
    var offsetContainer = $('.rca_offset');
    var offsetValue = $('.rca_offset').val();
    offsetContainer.attr("value", Number(offsetValue) );
    var content = $('.post-container');
    // $('#all').addClass('newsClick');

    $.ajax({
        url: templateURL + '/load-more.php',
        type: 'POST',
        beforeSend: function() {$('.spinner').fadeIn(500); },
        data: {category : cat, dropdown_query : dropdown_query },
        success: function(response) {
                    content.html(response).fadeIn(1000);
        },
        complete: function() { $('.spinner').fadeOut(500); }
    });

}



/**
 * Description:
 * 
 * Magically "View All" posts when the page is loaded.
 *
 * @author  Doe
 * @param  {[string]} templateURL    [Path to page where function is ran]
 * @param  {[string]} category       [defaults to "all" to view all blog posts]
 * @param  {[array]} dropdown_query ["defaults to get all years"]
 * @return {[void]}                [AJAX request]
 */
function defaultBlogFilter(templateURL, dropdown_query) {

    var urlParams = new URLSearchParams(window.location.search);
    function getUrlParameter(name) {
        name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
        var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
        var results = regex.exec(location.search);
        return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
    };

    var cat = getUrlParameter("cat");

    if(cat == "pharmaceutical") {
        $('#pharmaceutical').addClass('newsClick');
        $('.rca_query').attr('value', 'pharmaceutical');
    }

    if(cat == "medical-device") {
        $('#medical-device').addClass('newsClick');
        $('.rca_query').attr('value', 'medical-device');
    }

    if(cat == "biologics") {
        $('#biologics').addClass('newsClick');
        $('.rca_query').attr('value', 'biologics');

    }

    if(cat == "") {
        $('#all').addClass('newsClick');
        //$('.rca_query').attr('value', 'all');
        $('.rca_query').attr('value', 'blog');
        cat = "blog";
    }

    console.log("Category " + cat);
    var offsetContainer = $('.rca_offset');
    var offsetValue = $('.rca_offset').val();
    offsetContainer.attr("value", Number(offsetValue) );
    var content = $('.post-container');
    // $('#all').addClass('newsClick');

    $.ajax({
        url: templateURL + '/load-more.php',
        type: 'POST',
        beforeSend: function() {$('.spinner').fadeIn(500); },
        data: {category : cat, dropdown_query : dropdown_query },
        success: function(response) {
                    content.html(response).fadeIn(1000);
        },
        complete: function() { $('.spinner').fadeOut(500); }
    });

}







$('.load-more').on('click', function() {
    //var total_posts = $('.rca_total_posts').attr('value', '0');
    var templateURL = afp_vars.templateURL;
    var content = $('.post-container');
    var offsetContainer = $('.rca_offset');
    var offsetValue = $('.rca_offset').val();
    offsetContainer.attr("value", Number(offsetValue) + 5);
    offsetValue = offsetContainer.val();

    $.ajax({
        url: templateURL + '/load-more.php',
        type: 'POST',
        beforeSend: function() {$('.spinner').fadeIn(500); },
        data: {category : getCategory(), dropdown_query : ajaxFilterYear(), offset : offsetValue },
        success: function(response) {
                    content.append(response).fadeIn(1000);
        },
        complete: function() { 
            total_posts = $('.rca_total_posts').val();
            if(total_posts < 5) {
                $('.load-more').hide();
            }
            $('.spinner').fadeOut(500); 

        }
    });  
});
 