<?php

/*Remove the p tags for page and post content*/
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );


/*Hide Admin Bar*/
add_filter('show_admin_bar', '__return_false');


//Enable support for thumbnails
add_theme_support( 'post-thumbnails' ); 


/*Pagination Navigation*/
function testimonial_pagination_nav(){

    global $testimonials_query; //Initiate global testimonial query object. This only works because this function is called into the document where the global object is declared.
    
    //Check if there are more than 1 page of testimonial posts to show to the user. If yes, show the pagination buttons.
    if($testimonials_query->max_num_pages > 1){

       echo '<div class="col-lg-12">' . "\n";

       /** Previous Post Link */
       if(get_previous_posts_link()){
           printf('<a href="'. get_previous_posts_page_link() .'" data-pagination-button="off" id="left-pagination-arrow" class="pagination-buttons"><i class="fa fa-angle-left"></i></a>');
       }                                    

       /** Next Post Link */
       //Only show the next pagination button if the max number of pages has not been met yet
       if(get_next_posts_link('',$testimonials_query->max_num_pages)){
           printf('<a href="'. get_next_posts_page_link() .'" data-pagination-button="off" id="right-pagination-arrow" class="pagination-buttons"><i class="fa fa-angle-right"></i></a>');
       }

       echo '</div>' . "\n";
   }
}
    



