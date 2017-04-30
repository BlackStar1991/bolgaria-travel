<?php
 /**
 * Template Name: Comments-page
 */
 ?>
<?php get_header(); ?>







<style>
.comment-meta{
    margin-bottom: 5px;
    width: 100%;
    max-width: 1000px;
}
.fn{
color: #7caad1;
    font-size: 20px;
}
.comment{
width: 100%;
    max-width: 1000px;
    margin: 0 auto;
    padding: 10px;
    border: 2px solid #1e73be;
    border-radius: 10px;
list-style: none;
margin-bottom: 10px;
}
.commentlist{
padding: 20px;
}
.fn a{font-size: 20px;}

.comment-count{    margin: 0 auto;
    display: block;
    width: 100%;
    max-width: 1000px;
    text-align: center;}
</style> 
 <div class="comment-count">
<p>Выводить <a class="link" href='http://wpcreate.ru/komentarii-dlya-sajta?number=10'>10</a>,
 <a class="link" href='/komentarii-dlya-sajta?number=30'>30</a>,
 <a class="link" href='/komentarii-dlya-sajta?number=50'>50</a>,
 <a class="link" href='komentarii-dlya-sajta?number=100'>100</a>,
 <a class="link" href='/komentarii-dlya-sajta?number=200'>200</a> комментариев на странице.</p>
</div>
 <?php if (isset($_GET['number'])) { $number=$_GET['number'];}else{ $number = 25;}
 page_comments(500, 1000,'',1,50);
 ?>

<?php get_footer(); ?>




