<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    // ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    // ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    // ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    // ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Surat Masuk', 'icon' => 'file', 'url' => ['/surat-masuk/index']],
                    ['label' => 'Disposisi', 'icon' => 'file', 'url' => ['/disposisi/index']],
                    [
                        'label' => 'Master',
                        'icon' => 'dashboard',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Jabatan', 'icon' => 'file-code-o', 'url' => ['/jabatan/index'],],
                            ['label' => 'Keamanan', 'icon' => 'file-code-o', 'url' => ['/keamanan/index'],],
                            ['label' => 'Kecepatan', 'icon' => 'file-code-o', 'url' => ['/kecepatan/index'],],
                        ],
                    ],
                    [
                        'label' => 'User Management',
                        'icon' => 'users',
                        'url' => '#',
                        'items' => [
                            ['label' => 'User', 'icon' => 'user', 'url' => ['/user/index'],],
                            ['label' => 'Role', 'icon' => 'file-code-o', 'url' => ['/mimin/role/index'],],
                            ['label' => 'Route', 'icon' => 'file-code-o', 'url' => ['/mimin/route/index'],],
                        ],
                    ],
                    
                ],
            ]
        ) ?>

    </section>

</aside>
