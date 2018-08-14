<?php  
/**
 * Template Name: custom submit_post
 */
get_header();
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
            <h3 class="text-center dealer"><li id="text-5" class="widget widget_text"><h2 class="widgettitle"></h2>
			</li></h3>
			<?php

    $current_user = wp_get_current_user();
	$postid = $current_user->ID;
		
	
		  
    if (isset($_POST['update']))
	{   		  		
	    $title=$_POST['Posttitle'];
		$content=$_POST['Postcontent'];
		$category=$_POST['category123'];
		$customfield=$_POST['price'];
		
		$my_post = array(
			'post_type'		=> 'dealer-listing',
			'post_title'    => $title,
			'post_content'  => $content,
			'post_category' => $category,		
			
		);
		 
	
	$new_post = wp_insert_post($my_post);
		 if (!function_exists('wp_generate_attachment_metadata')){
                require_once(ABSPATH . "wp-admin" . '/includes/image.php');
                require_once(ABSPATH . "wp-admin" . '/includes/file.php');
                require_once(ABSPATH . "wp-admin" . '/includes/media.php');
            }
			if(!empty($_FILES['customthumbnail']['name']))
			{
             if ($_FILES) {
                foreach ($_FILES as $file => $array) {
                    if ($_FILES[$file]['error'] !== UPLOAD_ERR_OK) {
                        return "upload error : " . $_FILES[$file]['error'];
                    }
                    $attach_id = media_handle_upload( $file, $new_post );
                }   
            }
            if ($attach_id > 0){
                //and if you want to set that image as Post  then use:
                add_post_meta($new_post,'_thumbnail_id',$attach_id);
            }
			}	   
			 wp_set_object_terms( $new_post,$_POST['category123'], 'listing-category' );
			add_post_meta($new_post,'price',$customfield);
			  
			$category = get_the_category();
				if(!empty($category)){
						$categorylist = array();
						foreach($category as $cat){
							$categorylist[]=$cat->name;
						}
					}
				
	}	
?>


<form class="form" action="" method="post" enctype="multipart/form-data">
<table>
<tr><td><input type="file" name="customthumbnail" id="customthumbnail"></td></tr>
<tr><td>Post title <input class="input" type="textfield" name="Posttitle" value="<?php echo $current_user->post_title ?>"></td></tr>
<tr><td>Post Body  <input class="input1" type="textfield" name="Postcontent" value="<?php echo $current_user->post_content ?>"></td></tr>
<?php 

$terms = get_terms( 'listing-category', array(
    'hide_empty' => false,
) );


?>
   
<tr><td>Categorys<select class="select" name="category123[]" >
<?php
			 
				$options = array();

				$categories = get_terms( array( 'taxonomy' => 'listing-category' ) );
				foreach( $categories as $category ) {
					echo '<option value="'.$category->name.'">'.$category->name.'</option>';
					
					
				}
				
				
				
			
?>
		</select></td></tr>
		
	
<tr><td>Price<input class="price" type="text" name="price">
<tr><td><input class="input3" type="submit" name="update"></td></tr>
</table>
</form>
		</div>
	</div>
</div>
<?php 
 get_footer();
?>