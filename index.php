<?php get_header(); ?>

<h1 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h1>

<?php
    if (have_posts()):
        the_post(); 
        the_content();
	endif;
    
    edit_post_link('Edit', '<p>', '</p>');
    
    $postid = get_the_ID();
    if ( comments_open($postid) ) :
        $comments = get_comments(array(
            'post_id' => $postid,
            'status' => 'approve'
        ));
?>
<h3 class="comments-title">Comments</h3>
<ul class="comment-list">
<?php
        wp_list_comments(array(
            'per_page' => 10,
            'reverse_top_level' => false
        ), $comments);
?>
</ul>
<?php
        comment_form( array(), $postid );
    endif;
?>

<?php include 'allposts.php'; ?>

<?php get_footer(); ?>
