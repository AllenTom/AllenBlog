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
                                <a class="am-btn am-btn-danger">
                                    <i class="am-icon-trash"></i>
                                    删除
                                </a>
                                <a class="am-btn am-btn-warning">
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
    <div class="am-modal"></div>
    <div class="am-modal am-modal-prompt" tabindex="-1" id="add-category-prompt">
        <div class="am-modal-dialog">
            <div class="am-modal-hd">分类</div>
            <div class="am-modal-bd">
                请输入添加的分类
                <input type="text" class="am-modal-prompt-input" id="add-category-input">
            </div>
            <div class="am-modal-footer">
                <span class="am-modal-btn" data-am-modal-cancel>取消</span>
                <span class="am-modal-btn" data-am-modal-confirm>添加</span>
            </div>
        </div>
    </div>

</div>
<?= $this->element('public_script'); ?>
<script>
    $(function () {
        $('#example').DataTable();
    });
    $(function () {
        $('#add-category-toggle').on('click', function () {
            $('#add-category-prompt').modal({
                relatedTarget: this,
                onConfirm: function (e) {
                    let name = $('#add-category-input').val();
                    axios.post(
                        "/api/category/add", {
                            "name": name
                        }
                    ).then(res => window.location = '/admin/category')
                        .catch(err => console.log(err))
                },
                onCancel: function (e) {

                }
            });
        });
    });
</script>
<?= $this->element('layout-foot'); ?>
