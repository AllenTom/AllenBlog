<div id="sidebar" class="left-sidebar" style="position: fixed">
    <!-- 用户信息 -->
    <div class="tpl-sidebar-user-panel">
        <div class="tpl-user-panel-slide-toggleable">
            <div class="tpl-user-panel-profile-picture">
                <img src="/img/user04.png" alt="">
            </div>
            <span class="user-panel-logged-in-text">
              <i class="am-icon-circle-o am-text-success tpl-user-panel-status-icon"></i>
              禁言小张
          </span>
            <a href="javascript:;" class="tpl-user-panel-action-link"> <span class="am-icon-pencil"></span> 账号设置</a>
        </div>
    </div>

    <!-- 菜单 -->
    <ul class="sidebar-nav">
        <li class="sidebar-nav-heading">Components <span class="sidebar-nav-heading-info"> 附加组件</span></li>
        <li class="sidebar-nav-link">
            <a href="/admin" class="<?php if ($tabIndex == 'home'):?> active <?php endif; ?>">
                <i class="am-icon-home sidebar-nav-link-logo"></i> 首页
            </a>
        </li>
        <li class="sidebar-nav-link">
            <a href="/admin/category" class="<?php if ($tabIndex == 'category'):?> active <?php endif; ?>">
                <i class="am-icon-table sidebar-nav-link-logo"></i> 分类
            </a>
        </li>
        <li class="sidebar-nav-link">
            <a href="/admin/articles" class="<?php if ($tabIndex == 'article'):?> active <?php endif; ?>">
                <i class="am-icon-table sidebar-nav-link-logo"></i> 文章
            </a>
        </li>
        <li class="sidebar-nav-link">
            <a href="/admin/profile" class="<?php if ($tabIndex == 'profile'):?> active <?php endif; ?>">
                <i class="am-icon-calendar sidebar-nav-link-logo"></i> 个性化
            </a>
        </li>
    </ul>
</div>
