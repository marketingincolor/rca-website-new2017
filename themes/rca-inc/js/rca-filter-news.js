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
function filterPosts(templateURL) {

    $('.news-filter').on('click',function(){

        var newsButton = $(this);

        // Start by removing state from news buttons.
        var allButtons = $('.news-filter');
        allButtons.removeClass('newsClick');

        // Add State if we click on a button.
        $(this).addClass('newsClick');
        var category = newsButton.attr('news_filter');

        filterNewsPosts(templateURL, category, ajaxFilterYear());

        // Add to hidden input
        $('.rca_query').attr('value', category);
    });
}


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
    return category;
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

    if(selectedNode == "" || selectedNode == "Year Published") {
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
            url: templateURL + '/filter-posts.php',
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
function filterNewsPostsNoSpinner(templateURL, category, dropdown_query) {

    // If we don't have a category log an error to the console.
    if(category == "") {
        console.warn('RCA Information: No Category Selected. Showing All Posts...');
        category = 'all';
    }

    // If we don't have a year from the dropdown log an error to the console.
    if(dropdown_query == "" ) {
        console.warn('RCA Information: No dropdown query found.');
    }

    var content = $('.post-container');
    //content.hide();


        $.ajax({
            url: templateURL + '/filter-posts.php',
            type: 'POST',
            data: {category : category, dropdown_query : dropdown_query },
            success: function(response) {
                        content.html(response).fadeIn(1000);
            },
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
function defaultNewsFilter(templateURL, category, dropdown_query) {

    var content = $('.post-container');
    $('#all').addClass('newsClick');

    $.ajax({
        url: templateURL + '/filter-posts.php',
        type: 'POST',
        beforeSend: function() {$('.spinner').fadeIn(500); },
        data: {category : category, dropdown_query : dropdown_query },
        success: function(response) {
                    content.html(response).fadeIn(1000);
        },
        complete: function() { $('.spinner').fadeOut(500); }
    });

}

/**
 * Description:
 * Used for retrieving posts on next button clicks.
 *
 * @author  Doe
 * @param  {string} templateURL    [Page the function was called on]
 * @param  {string} category       [Category that's being filtered]
 * @param  {int} dropdown_query [Year that's being filtered]
 * @return {void}                [AJAX call]
 */
function rcaNext(templateURL, category, dropdown_query) {
    var offset = 5;
    var counter = $('.rca_offset');
    var content = $('.post-container');
    var counterValue = Number(counter.val()) + Number(offset);
    counter.attr('value', counterValue);

    $.ajax({
        url: templateURL + '/filter-posts.php',
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
 * Used for retrieving posts on previous button clicks.
 * 
 * @param  {string} templateURL    [description]
 * @param  {stirng} category       [description]
 * @param  {string} dropdown_query [description]
 * @return {void}                  [description]
 */
function rcaPrevious(templateURL, category, dropdown_query) {
    var offset = 5;
    var counter = $('.rca_offset');
    var content = $('.post-container');
    var counterValue = Number(counter.val()) - Number(offset);
    counter.attr('value', counterValue);
    $.ajax({
        url: templateURL + '/filter-posts.php',
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

function rca_get_dots(category) {



}