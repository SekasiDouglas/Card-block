<?php
/*
* Layout of our travel block  
*/

// Create id attribute allowing for custom "anchor" value.
$id = 'card-block' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'card-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

echo 'New Card Block ';
?>

<div id="<?php echo esc_attr( $id );?>" class="<?php echo esc_attr( $className );?>" >


<div class="text-info">
<?php

// Check rows exists.
if( have_rows('text_image') ):

    // Loop through rows.
    while( have_rows('text_image') ) : the_row();?>

    <div class ="items">
    <?php   
     // Load sub field value.
        $image = get_sub_field('image');
        $cardText = get_sub_field('text');?>
            <div class="img">
            <?php echo wp_get_attachment_image( $image['id'],'full ');?>
            </div>
            <?php if (!empty( $cardText )) {?>
            <p><?php echo esc_attr( $cardText )?>
            <?php }?></p>
    </div>
     <!-- End loop. -->
   <?php endwhile;

// No value.
else :
    // Do something...
endif;

?>

</div>

<?
//To add Padding and Margin to block.?>
<style>
<?php 
$padding = get_field('padding');

$top_padding = ! empty( $padding['top'] ) ? $padding['top'] . 'px' : '0px';
$right_padding = ! empty( $padding['right'] ) ? $padding['right'] . 'px' : '0px';
$bottom_padding = ! empty( $padding['bottom'] ) ? $padding['bottom'] . 'px' : '0px';
$left_padding = ! empty( $padding['left'] ) ? $padding['left'] . 'px' : '0px';
?>
<?php echo '#' .  esc_attr($id) ?> {
	padding: <?php echo $top_padding . ' ' . $right_padding . ' ' . $bottom_padding . ' ' . $left_padding . '';?>;
}

<?php $margin = get_field('margin');
$top_margin = ! empty( $margin['top'] ) ? $margin['top'] . 'px' : '0px';
$right_margin = ! empty( $margin['right'] ) ? $margin['right'] . 'px' : '0px';
$bottom_margin = ! empty( $margin['bottom'] ) ? $margin['bottom'] . 'px' : '0px';
$left_margin = ! empty( $margin['left'] ) ? $margin['left'] . 'px' : '0px';
?>
<?php echo '#' .  esc_attr($id) ?> {
	margin: <?php echo $top_margin . ' ' . $right_margin . ' ' . $bottom_margin . ' ' . $left_margin . '';?>;
}

/* To add the background color onto the block */
<?php 
$bgcolor = get_field('background_color');
?>
<?php echo '#' .  esc_attr($id) ?> {
	background-color: <?php echo esc_attr( $bgcolor );?>;
}

</style>
