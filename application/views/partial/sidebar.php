<div class="panel panel-default sidebar">
    <div class="panel-heading"><strong>Categories</strong></div>
    <div class="panel-body">
        <ul class="list-group">
            <?php
            $cats = Category::find('all');

            foreach ($cats as $cat) {
                echo '<li class="list-group-item">';
                echo anchor('web/categories/' . $cat->id, $cat->title);
                echo '<span class="badge">';
                
                echo Post_to_category::count(array('category_id' => $cat->id));
                
                echo '</span>';
                echo '</li>';
            }
            ?>
        </ul>
    </div>
</div>