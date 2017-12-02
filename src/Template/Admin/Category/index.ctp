<?= $this->element('layout-head'); ?>
<button class="am-btn am-btn-primary" id="add-category-toggle">添加分类</button>
<div style="padding: 20px">
    <table class="am-table am-table-striped am-table-bordered am-table-compact" id="example">
        <thead>
        <tr>
            <th>名称</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($category as $item): ?>
            <tr class="odd gradeX">
                <td><?= $item->name ?></td>
                <td>
                    <a onclick="showDeleteDialog(<?= $item->id ?>)" class="am-btn am-btn-danger">
                        <i class="am-icon-trash"></i>
                        删除
                    </a>

                    <a onclick="showModifyDialog(<?= $item->id ?>)" class="am-btn am-btn-warning">
                        <i class="am-icon-edit"></i>
                        修改
                    </a>

                </td>
            </tr>
        <?php endforeach; ?>
        <!-- more data -->
        </tbody>
    </table>
</div>
</div>
</div>
<div class="am-modal am-modal-prompt" tabindex="-1" id="add-category-prompt">
    <div class="am-modal-dialog">
        <form action="/admin/category/add" method="post" id="add-category-form">
            <div class="am-modal-hd">分类</div>
            <div class="am-modal-bd">
                请输入添加的分类
                <input type="text" class="am-modal-prompt-input" name="name" id="add-category-input">
            </div>
            <div class="am-modal-footer">
                <span class="am-modal-btn" data-am-modal-cancel>取消</span>
                <span class="am-modal-btn" data-am-modal-confirm>添加</span>
            </div>
        </form>
    </div>
</div>
<div class="am-modal am-modal-prompt" tabindex="-1" id="modify-category-prompt">
    <div class="am-modal-dialog">
        <form action="/" method="post" id="modify-category-form">
            <div class="am-modal-hd">分类</div>
            <div class="am-modal-bd">
                将分类名称修改为
                <input type="text" class="am-modal-prompt-input" name="name" id="add-category-input">
            </div>
            <div class="am-modal-footer">
                <span class="am-modal-btn" data-am-modal-cancel>取消</span>
                <span class="am-modal-btn" data-am-modal-confirm>修改</span>
            </div>
        </form>
    </div>
</div>
<div class="am-modal am-modal-confirm" tabindex="-1" id="delete-category-prompt">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">分类</div>
        <div class="am-modal-bd">
            你，确定要删除这条记录吗？
        </div>
        <form action="/" method="post" id="delete-category-form">
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
        $('#example').DataTable();
    });
    $(() => {
        $('#add-category-toggle').on('click', (e) => {
            $('#add-category-prompt').modal({
                relatedTarget: this,
                onConfirm: function (e) {
                    $('#add-category-form').submit()
                },
                onCancel: function (e) {

                }
            });
        });
    });
    const showModifyDialog = (id) => {
        $('#modify-category-prompt').modal({
            relatedTarget: this,
            onConfirm: (e) => {
                const modifyForm = $('#modify-category-form');
                modifyForm.attr("action", `/admin/category/add?id=${id}`);
                modifyForm.submit();
            },
            onCancel: () => {

            },
        });
    };

    const showDeleteDialog = (id) => {
        $('#delete-category-prompt').modal({
            relatedTarget: this,
            onConfirm: (e) => {
                const modifyForm = $('#delete-category-form');
                modifyForm.attr("action", `/admin/category/delete?id=${id}`);
                modifyForm.submit();
            },
            onCancel: () => {

            },
        });
    };

</script>
<?= $this->element('layout-foot'); ?>
