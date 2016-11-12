<?php
/*
Template Name: newslider
*/
get_header(); 

?>
  <div class="your-class">
    <div>your content</div>
    <div>your content</div>
    <div>your content</div>
  </div>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.your-class').slick({
        setting-name: setting-value
      });
    });
  </script>

<?php
//get the footer
get_footer();
?>