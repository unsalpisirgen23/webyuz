<li class="nav-item<?= isset($menu->children) ? 'dropdown' : "" ?> " >

    <?php if (isset($menu->children)): ?>

        <a  href="<?= $menu->link ?>">
            <span><?= $menu->title ?></span> <i class="bi bi-chevron-down"></i>
        </a>

    <?php else: ?>
        <a class="nav-link <?=  $rows == 0 ? 'active' : null ?>" href="<?= $menu->link ?>"><?= $menu->title ?></a>
    <?php endif; ?>

    <?php if (isset($menu->children)): ?>
        <ul>
            <?php getHeaderNavbarMenu2($menu->children,$path)  ?>
        </ul>
    <?php endif; ?>
</li>