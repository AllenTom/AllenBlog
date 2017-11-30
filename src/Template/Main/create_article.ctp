<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Amaze UI Admin index Examples</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="icon" type="image/png" href="/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <script src="/js/echarts.min.js"></script>
    <link rel="stylesheet" href="/css/amazeui.min.css"/>
    <link rel="stylesheet" href="/css/amazeui.datatables.min.css"/>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
</head>

<body data-type="widgets">
<script src="/js/theme.js"></script>
<div class="am-g tpl-g">
    <!-- 头部 -->
    <?= $this->element('header_nav'); ?>
    <!-- 风格切换 -->
    <div class="tpl-skiner">
        <div class="tpl-skiner-toggle am-icon-cog">
        </div>
        <div class="tpl-skiner-content">
            <div class="tpl-skiner-content-title">
                选择主题
            </div>
            <div class="tpl-skiner-content-bar">
                <span class="skiner-color skiner-white" data-color="theme-white"></span>
                <span class="skiner-color skiner-black" data-color="theme-black"></span>
            </div>
        </div>
    </div>
    <!-- 侧边导航栏 -->
    <?= $this->element('sidebar'); ?>


    <!-- 内容区域 -->
    <div class="tpl-content-wrapper" style="margin-top: 75px">

        <div class="container-fluid am-cf"
             style="background-color: white;margin-left: 16px;margin-right: 16px;margin-top: 20px;min-height: 500px">
            <form class="am-form" action="/api/article/add" method="post">
                <div class="am-input-group am-input-group-lg" style="margin-top: 16px">
                    <span class="am-input-group-label">标题</span>
                    <input type="text" class="am-form-field" placeholder="输入标题" name="title" id="input-title">
                </div>
                <div class="am-form-group">
                    <label for="select-category">选择分类</label>
                    <select id="select-category" name="category">
                        <?php foreach ($categoryList as $item): ?>
                            <option value="<?= $item->id ?>"><?= $item->name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="am-form-caret"></span>
                </div>
                <div class="am-form-group" style="margin-top: 36px">
                    <label for="doc-ta-1">文本域</label>

                    <div id="editor" type="text/plain" style="width:1024px;height:500px;"></div>


                </div>
                <button type="button" onclick="onArticleSubmit()" class="am-btn am-btn-primary">添加</button>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" charset="utf-8" src="/js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/js/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" charset="utf-8" src="lang/zh-cn/zh-cn.js"></script>
<script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
<script src="/js/amazeui.min.js"></script>
<script src="/js/amazeui.datatables.min.js"></script>
<script src="/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.bootcss.com/axios/0.17.1/axios.js"></script>
<script src="/js/app.js"></script>
<script>
    let ue = UE.getEditor('editor');

    const onArticleSubmit = () => {
        console.log(UE.getEditor('editor').getContent());
        axios.post(
            "/api/article/add", {
                title: $('#input-title').val(),
                category: $('#select-category').val(),
                content: UE.getEditor('editor').getContent()
            }
        ).then(res => window.location = '/admin/category')
            .catch(err => console.log(err))
    }

</script>
</body>

</html>
