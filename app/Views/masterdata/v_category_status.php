 <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Data <?=$subjudul?></h5>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-right">
                            <button type="button" class="btn btn-tool btn-outline-primary btn-sm" data-toggle="modal" data-target="#add-data"><i class="fas fa-plus"></i> Tambah <?=$subjudul?></button>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                         <table id="datatableJS" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 1%">No</th>
                                    <th>Status</th>
                                    <th>Deskripsi</th>
                                    <th>Aktif</th>
                                    <th style="width: 10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($data as $key => $value) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value['status'] ?></td>
                                        <td><?= $value['description'] ?></td>
                                        <td><?= ($value['active']?'Aktif':'Tidak Aktif') ?></td>
                                        <td>
                                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-data<?= $value['id'] ?>"><i class="fas fa-pencil-alt"></i></button>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-data<?= $value['id'] ?>"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php }?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Status</th>
                                    <th>Deskripsi</th>
                                    <th>Aktif</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- ./card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>

<div class="modal fade" id="add-data">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data <?=$subjudul?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('category-status/add') ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputStatus">Status</label>
                        <input name="status" type="text" id="inputStatus" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Deskripsi</label>
                        <textarea name="description" id="inputDescription" class="form-control" rows="4"></textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            <?= form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php foreach ($data as $key => $value) { ?>
    <div class="modal fade" id="edit-data<?= $value['id'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data <?=$subjudul?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open('category-status/update') ?>
                    <div class="modal-body">
                        <input name="id" value="<?= $value['id'] ?>" type="hidden">
                        <div class="form-group">
                            <label for="inputStatus">Status</label>
                            <input name="status" value="<?=$value['status'] ?>" type="text" id="inputStatus" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Deskripsi</label>
                            <textarea name="description" id="inputDescription" class="form-control" rows="4"><?=$value['description'] ?></textarea>
                        </div>
                        <div class="form-check">
                            <input name="active" value="1" type="checkbox" class="form-check-input" id="inputActive"  <?=$value['active']?'checked':''?>>
                            <label class="form-check-label" for="inputActive">Aktif</label>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                <?= form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>

<?php foreach ($data as $key => $value) { ?>
    <div class="modal fade" id="delete-data<?= $value['id'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data <?=$subjudul?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open('category-status/delete') ?>
                    <div class="modal-body">
                        <input name="id" value="<?= $value['id'] ?>" type="hidden">
                        Apakah Anda Yakin Hapus <b><?= $value['status'] ?></b>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-primary">Ya</button>
                    </div>
                <?= form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>
