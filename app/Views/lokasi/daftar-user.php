<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <!-- <li class="breadcrumb-item"><a href="#">Lokasi</a></li> -->
        <li class="breadcrumb-item active" aria-current="page">Lokasi</li>
    </ol>
</nav>
<?php if (session()->has('success')) : ?>
    <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
        <div class="text-white"><?= session('success') ?></div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif ?>
<?php if (session()->has('danger')) : ?>
    <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
        <div class="text-white"><?= session('danger') ?></div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif ?>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Daftar User</h6>
                <!-- <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p> -->
                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <td>User</td>
                                <td>Lokasi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($user as $u) : ?>
                                <tr>
                                    <td><?= $u->user_nama ?></td>
                                    <td>
                                        <form target="_blank" action="<?= base_url('lokasi') ?>" method="post"><input type="hidden" name="user_token" value="<?= $u->user_token ?>"><button type="submit" class="badge bg-info border">Lihat Lokasi</button></form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>