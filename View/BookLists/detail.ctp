<div class="row">
    <div class="col-md-3">
        <p><img src="<?= $book_list['Book']['book_image'] ?>" class="img-responsive" alt="book image"></p>
    </div>
    <div class="col-md-9">
        <?php echo $this->Session->flash(); ?>
        <h3><?= h($book_list['Book']['title']) ?></h3>
        <p>著者: <?= h($book_list['Book']['author']) ?></p>
        <p>出版社: <?= h($book_list['Book']['publisher']) ?></p>
        <table class="table">
            <thead>
            <tr>
                <th style="width: 10%">No</th>
                <th style="width: 20%">保管場所</th>
                <th style="width: 20%">ステータス</th>

                <?php if($user['role'] == 0): ?>
                    <th style="width: 20%">貸出/返却</th>
                    <th style="width: 40%">貸出先</th>
                <?php endif; ?>

            </tr>
            </thead>
            <tbody>
            <?php foreach($possessed_book_list as $i=>$possessed_book): ?>
                <tr>
                    <td><?= $i+1 ?></td>
                    <td><?= h($possessed_book['PossessedBook']['location']) ?></td>
                    <td>
                        <?php
                        if($possessed_book['PossessedBook']['status'] == 0){
                            echo '<strong>在庫あり</strong>';
                        }elseif($possessed_book['PossessedBook']['status'] == 1) {
                            echo '<strong>貸出中</strong>';
                        }
                        ?>
                    </td>
                    <?php if($user['role'] == 0): ?>
                        <td>
                            <?php if($possessed_book['PossessedBook']['status'] == 0): ?>
                                <button id="btn_open_borrow_book_modal" class="btn btn-success btn-sm" data-possessed_book_id="<?php echo $possessed_book['PossessedBook']['id']; ?>">
                                    <span class="glyphicon glyphicon-ok"></span>貸出
                                </button>
                            <?php elseif($possessed_book['PossessedBook']['status'] == 1) :?>
                                <a class="btn btn-danger btn-sm" href="../return_book/<?php echo $possessed_book['PossessedBook']['id']; ?>" onclick="return confirm('返却処理を行ってよろしいですか？')">
                                    <span class="glyphicon glyphicon-ok"></span>返却
                                </a>
                            <?php endif;?>
                        </td>
                        <td>
                            <?php
                            echo $possessed_book['PossessedBook']['borrow_user'];
                            ?>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <a href="<?= h($book_list['Book']['amazon_link']) ?>" class="btn-amazon-detail" target="_blank">
            <img src="/library/img/btn_amazon_detail.png" width="150" height="20">
        </a>

    </div>
</div>

<hr>

<!--
<div class="row">
<?php if(!empty($book_list['RecommendList'])):?>
    <h4><strong>おすすめコメント</strong></h4>
    <?php foreach($book_list['RecommendList'] as $recommend): ?>
        <section style="margin-bottom: 52px">
            <pre><?= h($recommend['body']) ?></pre>
        </section>
    <?php endforeach ?>
<?php endif;?>
</div>
-->

<?php //レビュー・書評投稿用モーダル ?>
<div class="modal fade" id="write_impression_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">閉じる</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    <span class="glyphicon glyphicon-pencil"></span>
                    レビュー･書評を書く
                </h4>
            </div>
            <div class="modal-body">
                <form id="write_impression_form" action="/library/book_lists/write_impression/<?= h($book_list['Book']['id'])?>" method="post">
                    <textarea rows="12" style="width:100% " placeholder="レビューを記入してください。" name="impressions"></textarea>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                <button type="button" class="btn btn-primary" id="write_impression_btn">保存</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php //貸出処理モーダル ?>
<?php if($user['role'] == 0): ?>
    <div class="modal fade" id="borrow_book_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="width: 700px">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">閉じる</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        <span class="glyphicon glyphicon-ok"></span>
                        貸出処理
                    </h4>
                </div>
                <form action="../borrow_book" method="post" class="form-horizontal">
                    <input type="hidden" id="possessed_book_id" name="possessed_book_id">

                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-md-2 control-label">社員名</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control validate[required]" name="borrow_user" placeholder="社員名">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id="btn_borrow">
                            <span class="glyphicon glyphicon-ok"></span>完了
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?php endif;?>