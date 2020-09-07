<?php headerAdmin($data) ?>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1>
                    <i class="fas fa-user-tag"></i> <?= $data['pageTitle'] ?>
                    <button class="btn btn-primary" type="button" onclick="openModal();"><i class="fas fa-plus-circle"></i> Nuevo</button>

                </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="<?=baseUrl();?>/roles"><?= $data['pageTitle'] ?></a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">Roles de usuario</div>
                </div>
            </div>
        </div>
    </main>
<?php footerAdmin($data); ?>