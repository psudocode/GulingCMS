<?php
$segment = 1;
$total = $this->uri->total_segments();
$base = substr(base_url(), 0, -1);
echo '<ol class="breadcrumb"><li><a href="' . base_url() . '">home</a></li>';
?>

<?php while ($segment <= $total) : ?>
    <?php echo '<li><a href="' . $base . '/' . $this->uri->segment($segment) . '">' . $this->uri->segment($segment) . '</a></li>'; ?>
    <?php $base = $base . '/' . $this->uri->segment($segment); ?>
    <?php $segment++; ?>
<?php endwhile; ?>
<?php echo '</ol>'; ?>

<?php if ($posts) : ?>
    <?php foreach ($posts as $post) : ?>
        <?php if ($post) : ?>
            <!-- Posting Loops -->
            <div class="posting">
                <div class="panel panel-default post">

                    <?php if ($post->image_feature) : ?>
                        <div class="panel-heading" style="overflow: hidden; height: 300px;">
                            <img class="img-post-feature" src="<?= base_url() ?><?= $post->image_feature ?>" width="100%" />
                        </div>
                    <?php endif; ?>


                    <div class="panel-body">
                        <a href="#"><h2 class="lead"><?= $post->title ?></h2></a>

                        <div class="post-content">
                            <?= $post->content ?>
                        </div>
                        <br />


                        <span class="label label-default">Published November 20, 2010 by Ahmad Awdiyanto </span>
                        <br />


                        <?php
                        $cats = Post_to_category::all(array('post_id' => $post->id));
                        ?>

                        <?php if ($cats) : ?>
                            <span class="small under-categories label label-info">
                                <span class="category-titles">Categories :</span>
                                <?php foreach ($cats as $cat) : ?>
                                    <a href="<?= base_url('web/categories/' . Category::find($cat->category_id)->slug) ?>"><?php echo Category::find($cat->category_id)->title; ?></a> 
                                <?php endforeach; ?>
                            </span><br />
                        <?php endif; ?>






                        <?php
                        $tags = Post_to_tag::all(array('post_id' => $post->id));
                        ?>

                        <?php if ($tags) : ?>
                            <span class="small with-tags label label-info">
                                <span class="category-titles">Tags :</span>
                                <?php foreach ($tags as $tag) : ?>
                                    <a href="<?= base_url('web/tags/' . Tag::find($tag->tag_id)->slug) ?>"><?php echo Tag::find($tag->tag_id)->title; ?></a> 
                                <?php endforeach; ?>   
                            </span>
                        <?php endif; ?>



                    </div>
                    <div class="panel-footer">

                        <div class="col-lg-5 panfoot">
                            <?php
                            $comment_author_email = 'dhidyawdiyan@yahoo.co.id';
                            $gravatar_link = 'http://www.gravatar.com/avatar/' . md5($comment_author_email) . '?s=64';
                            echo '<img class="graphoto" src="' . $gravatar_link . '" />';
                            ?>              
                            <div class="post-writer"><span class="ket-kecil">Creator : </span><br /><a href=""><strong>Awdiyan</strong></a></div></div>
                        <div class="col-lg-3 panfoot pull-right">

                            <!-- AddToAny BEGIN -->
                            <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                <a class="a2a_dd" href="http://www.addtoany.com/share_save"></a>
                                <a class="a2a_button_facebook"></a>
                                <a class="a2a_button_twitter"></a>
                                <a class="a2a_button_google_plus"></a>
                            </div>
                            <script type="text/javascript" src="//static.addtoany.com/menu/page.js"></script>
                            <!-- AddToAny END -->

                        </div>
                        <div class="clearfix"></div>

                    </div>
                </div>

                <div class="row">
                    <?php 
                    $comments = Comment::find('all', array('post_id' => $post->id));
                    ?>
                    <?php foreach($comments as $comment) : ?>
                    <div class="comment-loop">
                        <div class="col-lg-2 visible-lg">
                            <?php
                            $comment_author_email_a = 'dhidyawdiyan@yahoo.co.id';
                            $gravatar_link = 'http://www.gravatar.com/avatar/' . md5($comment_author_email_a) . '?s=80';
                            echo '<img class="graphoto_c" src="' . $gravatar_link . '" />';
                            ?>             
                            <div class="clearfix"></div>
                        </div>
                        <div class="comment-content col-lg-10">
                            <a href=""><strong>Awdiyan</strong></a>
                            <div class="box-comment arrow_box">test Post Komentar</div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

            </div>
            <!-- END :: Posting Loops -->
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>