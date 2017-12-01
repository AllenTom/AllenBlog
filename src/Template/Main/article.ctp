<?= $this->element('layout-head'); ?>
<a href="/admin/articles/create" class="am-btn am-btn-primary">添加文章</a>

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
    <?php foreach ($articleList as $article): ?>
        <tr>
            <td><?= $article->id ?></td>
            <td><?= $article->title ?></td>
            <td><?= $article->category ?></td>
            <td>
                <button type="button" class="am-btn am-btn-primary">修改</button>
                <button type="button" onclick="deleteArticle(<?= $article->id ?>)" class="am-btn am-btn-danger">删除
                </button>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</div>
</div>
</div>
<?= $this->element('public_script'); ?>
<script>

    $('#example').DataTable({});

    const deleteArticle = (id) => {
        axios.post(`/api/article/${id}/delete`)
            .then(response => window.location = '/admin/articles')
            .catch(err => console.log(err))
    };

</script>


<?= $this->element('layout-foot'); ?>
