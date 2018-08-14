 
 <?php
 /**
 * Template Name: Home
 */
	get_header();
	
	
 ?>
 <!-------- main article----->
    <article>
    <div class="article-section w3-animate-zoom">
       <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center article_section">
                       <?php echo get_field('first_title');?> 
                    </h3>
					<?php
					if (isset($_POST['submit']))
					{
					

					
					}
					$category_detail=get_the_category($id);//$post->ID
					$curcatid = $category_detail[0]->term_id;
					
					?>
					 <form id="fom" role="form" action="<?php echo get_the_permalink(384)?>" method="GET" class="form-inline banner-form">
					  <div class="form-inline banner-form my_form">
						<table class="article-table" style="width:100%">
						  <tr>
							<th>
							 <div class="form-group">
								<input id="sea" type="Search" name="search" class="form-control" id="exampleInputsearch" value="<?php echo $_GET["search"];?>" placeholder="Search Keyword">
							</div>
							</th>
							<th>
							<?php
							
								$terms = get_terms( 'category', array(
									'hide_empty' => false,
								) );


								?>
							<div class="form-group">
								<select id="cat" name="category1">
								<?php
				 
									$options = array();

										$categories = get_terms( array( 'taxonomy' => 'listing-category' ) );
										echo '<option value="">Select category</option>';
										foreach( $categories as $category ) {
											if($category->term_id == $curcatid)
											{
												$select = 'selected="selected"';
											}
											else{
												$select = '';
											}
											
											echo '<option '.$select.' value="'.$category->term_id.'">'.$category->name.'</option>';
						
						
											}
										
								?>
								</select>
							</div>
							</th> 
							<!--<th>
							  <div class="form-group">
								<select>
								  <option value="volvo">Select Make</option>
								  <option value="saab">Saab</option>
								  <option value="opel">Opel</option>
								  <option value="audi">Audi</option>
								</select>
							</div>
							</th>-->
							<!--<th>
							 <div class="form-group">
							   <select>
								  <option value="volvo">Select Make</option>
								  <option value="saab">Saab</option>
								  <option value="opel">Opel</option>
								  <option value="audi">Audi</option>
								</select>
							</div>
							</th>-->
							<th>
							<button id="sub" type="submit" name="submit" class="btn btn-primary  banner_form">
							   <i class="fa fa-search" aria-hidden="true"></i> Submit
							</button>
							</th>
						  </tr>
						</table>
					</div>
					</form>
                </div>
            </div>
        </div>
    </div>
    </article>
    
      
       <!-------- main article----->
    <div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 class="text-center dealer"><?php dynamic_sidebar('dealer1')?>  </h3>
				 
			</div>
		</div>
	</div>
      
      <!---- article2 section------>
     <div class="container">
		<div class="row">
		
		<?php
		
				$categories = get_terms( array( 'taxonomy' => 'listing-category' ) );
				foreach( $categories as $category ) {
					
					$args = array( 
					   'post_type' => 'dealer-listing',
					   'posts_per_page' => 1,
					   'post_status' => 'publish',
					   'orderby' => 'date',
					   'order' => 'DESC',
					   'post__not_in' => array($postid),
					   'tax_query' => array(
							array(
								'taxonomy' => 'listing-category',
								'field'    => 'id',
								'terms'    => $category->term_id,
							),
						),
					);
					$the_query = new WP_Query($args);
					if ( $the_query->have_posts() ) :
						while ( $the_query->have_posts() ) : $the_query->the_post();
						$imgLink = get_field('category_image', 'listing-category_'.$category->term_id);
						
						
			?>	
							<div class="col-md-4">
							<div class="product-box">
							<h4 class="text-center">
								<?php echo $category->name;?></h4>
							<a href="<?php echo get_term_link($category->term_id);?>"><img src="<?php echo $imgLink;?>"></a>
							<p class="text-center"<?php echo category_description($category->term_id);?></p>
							</div>
							</div>
			<?php					
					endwhile;
					wp_reset_postdata();
				endif;
				}
			?>
			
			
			
		</div>
    </div>
	
	<div class="banner-parth">
		 <div class="container">
			<div class="row">
				<div class="col-md-3">
				
					<img src="<?php echo get_field('home_logo');?>">
					<h3 class="text-center">
						<?php echo get_field('logo_title');?>
					</h3>
					<p>
						<?php echo get_field('logo_contant');?>
					</p>
				</div>
				<div class="col-md-3">
					<img src="<?php echo get_field('home_logo1');?>">
					<h3 class="text-center">
						<?php echo get_field('logo_title1');?>
					</h3>
					<p>
						<?php echo get_field('logo_contant1');?>
					</p>
				</div>
				<div class="col-md-3">
					<img src="<?php echo get_field('home_logo2');?>">
					<h3 class="text-center">
						<?php echo get_field('logo_title2');?>
					</h3>
					<p>
						<?php echo get_field('logo_contant2');?> 
					</p>
				</div>
				<div class="col-md-3">
					<img src="<?php echo get_field('home_logo3');?>">
					<h3 class="text-center">
						<?php echo get_field('logo_title3');?>
					</h3>
					<p>
						<?php echo get_field('logo_contant3');?> 
					</p>
				</div>
			</div>
		</div>
	</div>
	  <!----- banner parth--->
	  <div class="banner-parth-min">
		 <div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="text-center">
						<?php echo get_field('title');?> 
					</h3>
				</div>
			</div>
		  </div>
     <div class="container">
		<div class="row">
			<div class="col-md-6">
				<img src="<?php echo get_field('images');?>">
			</div>
			<div class="col-md-6">
				<p>
					<?php echo get_field('contant');?>  
				</p>
				<p>
					<?php echo get_field('contant');?>
				</p> 
				<a href="<?php echo get_the_permalink(31);?>"><button type="button" class="btn btn-lg btn-info">
					Read more
				</button></a>
			</div>
		</div>
     </div>
	  </div>
	<!----banner parth end----->
    <div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="tab-system">
				<h3 class="text-center">
					<?php dynamic_sidebar('perfect-dealer1')?>
				</h3>
			</div>
			</div>
		</div>
    </div>
     <div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="tabbable" id="tabs-956559">
					<ul class="nav nav-tabs show_toggle">
						<li class="nav-item">
							<a class="nav-link active show" href="#panel-752289" data-toggle="tab">NEW CAR</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#panel-555665" data-toggle="tab">NEW HOTEL</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#panel-555666" data-toggle="tab">NEW HOME</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#panel-555667" data-toggle="tab">ALL MY PRODUCT VIEW</a>
						</li>
					</ul>
					
					<div class="tab-content">
						
						<div class="tab-pane active show" id="panel-752289">
						<!----tab section--->
						<?php
					
							$categories = get_terms( array( 'taxonomy' => 'listing-category' ) );
								$args = array( 
								   'post_type' => 'dealer-listing',
								   'posts_per_page' => 4,
								   'post_status' => 'publish',
								   'orderby' => 'ID',
								   'order' => 'DESC',
									
								   'tax_query' => array(
										array(
											'taxonomy' => 'listing-category',
											'field'    => 'id',
											'terms'    => 27,
										),
									),
								);
								$the_query = new WP_Query($args);
								if ( $the_query->have_posts() ) :
									while ( $the_query->have_posts() ) : $the_query->the_post();
									$imgLink = wp_get_attachment_url( get_post_thumbnail_id() );
									
									
						?>	
									<div class="section-point">
									<img src="<?php echo $imgLink;?>">
									<div class="compare">
									 <input type="checkbox" id="myCheck"  onclick="myFunction()">COMPARE
									 </div>
									 <div class="view">
										VIEW DETAIL
									</div>
									</div>
						<?php					
								endwhile;
								wp_reset_postdata();
							endif;
							
						?>
						
						<!----tab section--->
						</div>
						<div class="tab-pane" id="panel-555665">
							<!----tab section--->
							<?php
					
							$categories = get_terms( array( 'taxonomy' => 'listing-category' ) );
								$args = array( 
								   'post_type' => 'dealer-listing',
								   'posts_per_page' => 4,
								   'post_status' => 'publish',
								   'orderby' => 'ID',
								   'order' => 'ASC',
									
								   'tax_query' => array(
										array(
											'taxonomy' => 'listing-category',
											'field'    => 'id',
											'terms'    => 32,
										),
									),
								);
								$the_query = new WP_Query($args);
								if ( $the_query->have_posts() ) :
									while ( $the_query->have_posts() ) : $the_query->the_post();
									$imgLink = wp_get_attachment_url( get_post_thumbnail_id() );
									
									
						?>	
									<div class="section-point">
									<img src="<?php echo $imgLink;?>">
									<div class="compare">
									<input type="checkbox" id="myCheck"  onclick="myFunction()">COMPARE
									</div>
									<div class="view">
										VIEW DETAIL
									</div>
									</div>
						<?php					
								endwhile;
								wp_reset_postdata();
							endif;
							
						?>
						<!----tab section--->
						</div>
						<div class="tab-pane" id="panel-555666">
							<!----tab section--->
							<?php
					
							$categories = get_terms( array( 'taxonomy' => 'listing-category' ) );
								$args = array( 
								   'post_type' => 'dealer-listing',
								   'posts_per_page' => 4,
								   'post_status' => 'publish',
								   'orderby' => 'ID',
								   'order' => 'ASC',
									
								   'tax_query' => array(
										array(
											'taxonomy' => 'listing-category',
											'field'    => 'id',
											'terms'    => 28,
										),
									),
								);
								$the_query = new WP_Query($args);
								if ( $the_query->have_posts() ) :
									while ( $the_query->have_posts() ) : $the_query->the_post();
									$imgLink = wp_get_attachment_url( get_post_thumbnail_id() );
									
									
						?>	
									<div class="section-point">
									<img src="<?php echo $imgLink;?>">
									<div class="compare">
									<input type="checkbox" id="myCheck"  onclick="myFunction()">COMPARE
									</div>
									<div class="view">
										VIEW DETAIL
									</div>
									</div>
						<?php					
								endwhile;
								wp_reset_postdata();
							endif;
							
						?>
						
						<!----tab section--->
						</div>
						<div class="tab-pane" id="panel-555667">
							<!----tab section--->
							<?php
					
							$categories = get_terms( array( 'taxonomy' => 'listing-category' ) );
								$args = array( 
								   'post_type' => 'dealer-listing',
								   'posts_per_page' => 4,
								   'post_status' => 'publish',
								   'orderby' => 'ID',
								   'order' => 'ASC',
									
								  
								);
								$the_query = new WP_Query($args);
								if ( $the_query->have_posts() ) :
									while ( $the_query->have_posts() ) : $the_query->the_post();
									$imgLink = wp_get_attachment_url( get_post_thumbnail_id() );
									
									
							?>	
									<div class="section-point">
									<img src="<?php echo $imgLink;?>">
									<div class="compare">
									<input type="checkbox" id="myCheck"  onclick="myFunction()">COMPARE
									</div>
									<div class="view">
										VIEW DETAIL
									</div>
									</div>
						<?php					
								endwhile;
								wp_reset_postdata();
							endif;
							
						?>
						
						<!----tab section--->
						</div>
					</div>
				</div>	
			</div>
		</div>
      </div>
	  
	  <?php
		get_footer();
	  ?>