 <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Data <?=$judul?></h5>
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
                            <button type="button" class="btn btn-tool btn-outline-primary btn-sm" data-toggle="modal" data-target="#add-data"><i class="fas fa-plus"></i> Tambah <?=$judul?></button>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                         <table id="datatableJS" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 1%">No</th>
                                    <th>Satuan</th>
                                    <th>Deskripsi</th>
                                    <th style="width: 10%">Status</th>
                                    <th style="width: 10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($data as $key => $value) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value['unit'] ?></td>
                                        <td><?= $value['description'] ?></td>
                                        <td><?= $value['statusName'] ?></td>
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
                                    <th>Satuan</th>
                                    <th>Deskripsi</th>
                                    <th>Status</th>
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
                <h4 class="modal-title">Tambah Data <?=$judul?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('unit/add') ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputUnit">Satuan</label>
                        <input name="unit" type="text" id="inputUnit" class="form-control" placeholder="Satuan">
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Deskripsi</label>
                        <textarea name="description" id="inputDescription" class="form-control" rows="4" placeholder="Deskripsi"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputStatus">Status</label>
                        <select name="status" id="inputStatus" class="form-control custom-select">
                            <option value="" selected disabled>Pilih Status</option>
                            <?php foreach ($dataStatus as $status) { ?>
                                <option value="<?= $status['id'] ?>"><?= $status['status'] ?></option>
                             <?php } ?>
                        </select>
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
                    <h4 class="modal-title">Edit Data <?=$judul?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open('unit/update') ?>
                    <div class="modal-body">
                        <input name="id" value="<?= $value['id'] ?>" type="hidden">
                        <div class="form-group">
                            <label for="inputUnit">Satuan</label>
                            <input name="unit" value="<?= $value['unit'] ?>" type="text" id="inputUnit" class="form-control" placeholder="Satuan">
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Deskripsi</label>
                            <textarea name="description" id="inputDescription" class="form-control" rows="4" placeholder="Deskripsi"><?= $value['description'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputStatus">Status</label>
                            <select name="status" id="inputStatus" class="form-control custom-select">
                                <option value="" selected disabled>Pilih Status</option>
                                <?php foreach ($dataStatus as $status) { ?>
                                    <option value="<?= $status['id'] ?>" <?= ($status['id'] == $value['status']) ? 'selected' : '' ?>><?= $status['status'] ?></option>
                                <?php } ?>
                            </select>
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
                    <h4 class="modal-title">Hapus Data <?=$judul?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open('unit/delete') ?>
                    <div class="modal-body">
                        <input name="id" value="<?= $value['id'] ?>" type="hidden">
                        Apakah Anda Yakin Hapus  <b><?= $value['unit'] ?></b>
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
