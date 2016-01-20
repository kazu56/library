<div class="row">
    <?php foreach($book_list as $book): ?>
        <div class="col-xs-6 col-md-3">
            <div class="thumbnail" style="height: 480px">
                <a href="/library/book_lists/detail/<?= h($book['Book']['id']) ?>">
                    <img src="<?= h($book['Book']['book_image']) ?>" style="height: 250px">
                </a>
                <div class="caption" style="height: 200px">
                    <h3>
                        <a href="/library/book_lists/detail/<?= h($book['Book']['id']) ?>">
                        <?= h($book['Book']['title']) ?>
                    </a>
                    </h3>
                    <p>著者：<?= h($book['Book']['author']) ?></p>
                    <p>出版社：<?= h($book['Book']['publisher']) ?></p>
                </div>

                <!--
                <div class="caption">
                    <?php
                    echo $this->Html->link(
                        '詳細へ',
                        array(
                            'controller'=>'book_lists',
                            'action'=>'detail',
                            h($book['Book']['id'])
                        ),
                        array(
                            'class'=>'btn btn-default'
                        )
                    );
                    ?>
                </div>
                -->

            </div>
        </div>
    <?php endforeach ?>
</div>
