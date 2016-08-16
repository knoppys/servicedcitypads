<!-- Apartment Types -->	
	<div id="apartmenttypes">
		<div class="row">
		<div class="col-md-12">
			<h2 class="entry-section-title"><i class="fa fa-chevron-down"></i>Apartment Types</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?php
			if( has_children() ){
			    $postid = get_the_ID();
			    $args = array(
			        'post_parent' => $postid,
			        'post_type'   => 'any',
			        'numberposts' => -1,
			        'post_status' => 'any'
			    );
			    $children_array = get_children( $args, OBJECT );
			    if( is_array( $children_array ) ) {
			        foreach ($children_array as $child) {
			            $terms = get_the_terms( $child->ID, 'Apartment_type' );
			            if( is_array( $terms ) ) {
			                foreach ($terms as $term) {
			                    echo '<a href="' . $child->guid . '">' . $term->name . '</a><br/>';
			                }
			            }
			        }
			    }
			} elseif (!has_children()) {
			    if ( wp_get_post_parent_id( get_the_id() ) ){
			        $postid = wp_get_post_parent_id( get_the_id() );
			        $args = array(
			            'post_parent' => $postid,
			            'post_type'   => 'any',
			            'numberposts' => -1,
			            'post_status' => 'any'
			        );
			        $children_array = get_children( $args, OBJECT );
			        if( is_array( $children_array ) ) {
			            foreach ($children_array as $child) {
			                $terms = get_the_terms( $child->ID, 'Apartment_type' );
			                if( is_array( $terms ) ) {
			                    foreach ($terms as $term) {
			                        echo '<a href="' . $child->guid . '">' . $term->name . '</a><br/>';

			                    }
			                }
			            }
			        }
			    }
			} elseif( ( !has_children() ) && (!get_post_ancestors( $post->ID ))) {
			    echo 'on its own';
			} ?>
		</div>
	</div>
	</div>