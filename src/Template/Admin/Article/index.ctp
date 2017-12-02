<?= $this->element('layout-head'); ?>


<a href="/admin/article/editor" class="am-btn am-btn-primary">添加文章</a>
<div style="padding: 20px">
    <table class="am-table am-table-striped am-table-bordered am-table-compact" id="article-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>标题</th>
            <th>类别</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($article as $article): ?>
            <tr>
                <td><?= $article->id ?></td>
                <td><?= $article->title ?></td>
                <td><?= $article->category ?></td>
                <td>
                    <button type="button" class="am-btn am-btn-primary">修改</button>


                    <button type="button" onclick="showDeleteDialog(<?= $article->id ?>)" class="am-btn am-btn-danger">
                        删除
                    </button>

                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
</div>
<div class="am-modal am-modal-confirm" tabindex="-1" id="delete-article-prompt">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">分类</div>
        <div class="am-modal-bd">
            你，确定要删除这条记录吗？
        </div>
        <form action="/" method="post" id="delete-article-form">
        </form>
        <div class="am-modal-footer">
            <span class="am-modal-btn" data-am-modal-cancel>取消</span>
            <span class="am-modal-btn" data-am-modal-confirm>确定</span>
        </div>
    </div>
</div>
</div>
<?= $this->element('public_script'); ?>
<script>
    $(() => {
        $('#article-table').DataTable();
    });
    const showDeleteDialog = (id) => {
        $('#delete-article-prompt').modal({
            relatedTarget: this,
            onConfirm: (e) => {
                const modifyForm = $('#delete-article-form');
                modifyForm.attr("action", `/admin/article/${id}/delete`);
                modifyForm.submit();
            },
            onCancel: () => {

            },
        });
    };
</script>


<?= $this->element('layout-foot'); ?>
