    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cakes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT. "/admin/home"?>">Home</a></li>
              <li class="breadcrumb-item active">Cakes</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="Mytable" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Names</th>
                    <th>Prices</th>
                    <th>Sizes</th>
                    <th>Images</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($data['cakes'] as $index => $cake) : ?>
                        <tr>
                            <td><?=$index +1 ?></td>
                            <td><?=$cake['name']?></td>
                            <td><?=$cake['price']?></td>
                            <td><?=$cake['size']?></td>
                            <td><img style="max-width: 100px;" class="rounded img-thumbnail" src="<?= IMAGES_CAKES_URL ?>/<?= $cake['image']?>" alt="image cake"/></td>
                            <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-info">Edit</button>
                                <button type="button" class="btn btn-danger">Delete</button>
                            </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>