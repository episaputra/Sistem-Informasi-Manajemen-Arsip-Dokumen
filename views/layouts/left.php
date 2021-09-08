<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <?php if(!Yii::$app->user->isGuest):
                    ?>
                <p><?= ucfirst(Yii::$app->user->identity->nama) ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            <?php endif; ?>
            </div>
        </div>

        <?php
            $items = [
                ['label' => 'Menu', 'options' => ['class' => 'header']],
                ['label' => 'Home', 'icon' => 'home', 'url' => ['/site/index']],
            ];

            if(Yii::$app->user->identity->user_level=='Super Admin'){
                $items[] =
                    [
                        'label' => 'Data Master',
                        'icon' => 'database',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Jenis Barang', 'icon' => 'th-large', 'url' => ['/jenis-barang']],
                            ['label' => 'Jenis Pengadaan', 'icon' => 'chain', 'url' => ['/jenis-pengadaan']],
                            ['label' => 'Kategori Dokumen', 'icon' => 'file', 'url' => ['/kategori-dokumen']],
                            ['label' => 'Lokasi Barang', 'icon' => 'globe', 'url' => ['/lokasi-barang']],
                            ['label' => 'Pegawai', 'icon' => 'users', 'url' => ['/pegawai']],
                            ['label' => 'Perusahaan', 'icon' => 'bank', 'url' => ['/perusahaan']],
                        ]
                    ];
                $items[] = ['label' => 'Arsip Dokumen', 'icon' => 'folder', 'url' => ['/arsip-sdm']];
                $items[] = ['label' => 'Arsip Kontrak', 'icon' => 'folder-open', 'url' => ['/arsip-pengadaan']];
                $items[] = ['label' => 'Kelola Barang', 'icon' => 'cube', 'url' => ['/barang']];
                $items[] = ['label' => 'Kelola User', 'icon' => 'users', 'url' => ['/user']];
            }

            if(Yii::$app->user->identity->user_level=='Admin'){
                $items[] = ['label' => 'Kelola User', 'icon' => 'users', 'url' => ['/user']];
            }

            if(Yii::$app->user->identity->user_level=='Admin SDM'){
                $items[] = 
                    [
                        'label' => 'Data Master',
                        'icon' => 'database',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Kategori Dokumen', 'icon' => 'file', 'url' => ['/kategori-dokumen']],
                            ['label' => 'Pegawai', 'icon' => 'users', 'url' => ['/pegawai']],
                        ]
                    ];
                $items[] = ['label' => 'Arsip Dokumen', 'icon' => 'folder', 'url' => ['/arsip-sdm']];  
            }

            if(Yii::$app->user->identity->user_level=='Pegawai SDM'){
                $items[] = ['label' => 'Arsip Dokumen', 'icon' => 'folder', 'url' => ['/arsip-sdm']];
            }

            if(Yii::$app->user->identity->user_level=='Admin Pengadaan'){
                $items[] = 
                    [
                        'label' => 'Data Master',
                        'icon' => 'database',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Jenis Pengadaan', 'icon' => 'chain', 'url' => ['/jenis-pengadaan']],
                            ['label' => 'Perusahaan', 'icon' => 'bank', 'url' => ['/perusahaan']],
                        ]
                    ];
                $items[] = ['label' => 'Arsip Kontrak', 'icon' => 'folder-open', 'url' => ['/arsip-pengadaan']];  
            }

            if(Yii::$app->user->identity->user_level=='Pegawai Pengadaan'){
                $items[] = ['label' => 'Arsip Kontrak', 'icon' => 'folder-open', 'url' => ['/arsip-pengadaan']];
            }

            if(Yii::$app->user->identity->user_level=='Supervisor Pengadaan'){
                $items[] = ['label' => 'Arsip Kontrak', 'icon' => 'folder-open', 'url' => ['/arsip-pengadaan']];
            }

            if(Yii::$app->user->identity->user_level=='Admin Sekum'){
                $items[] = 
                    [
                        'label' => 'Data Master',
                        'icon' => 'database',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Jenis Barang', 'icon' => 'th-large', 'url' => ['/jenis-barang']],
                            ['label' => 'Lokasi Barang', 'icon' => 'globe', 'url' => ['/lokasi-barang']],
                        ]
                    ];
                $items[] = ['label' => 'Kelola Barang', 'icon' => 'cube', 'url' => ['/barang']];
            }

            $items[] = ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest];
        ?>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => $items,
            ]
        ) ?>

    </section>

</aside>
