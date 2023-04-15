<?php if (is_singular(array('post', 'deal', 'snippet'))){?>
<span class="byline-rankmath byline-item">
<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs();?> </span>
<?php }?>
<style>.byline nav.rank-math-breadcrumb p:before {
    content: '\e829';
    font-family: 'md-icon';
    margin-right:5px;
}</style>