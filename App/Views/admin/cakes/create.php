<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Create new cake</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT ?>/admin">Home</a></li>
          <li class="breadcrumb-item active"><a href="<?= DOCUMENT_ROOT ?>/admin/cakes">Cakes</a></li>
          <li class="breadcrumb-item active">Create</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="container-fluid">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Cake information</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="<?= DOCUMENT_ROOT ?>/admin/cakes/store" method="POST" enctype="multipart/form-data">
        <div class="card-body">
          <div class="row">
          <div class="form-group col">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Cake name">
          </div>
          <div class="form-group col">
            <label for="exampleInputPassword1">Category</label>
            <select name="categoryId" class="form-control" id="category">
              <option value="" disabled selected>Select one</option>
                <?php foreach ($data['categories'] as $index => $category) : ?>
                  <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                <?php endforeach; ?>
            </select>
          </div>
          </div>
          <div class="row">
            <div class="form-group col">
              <label for="price">Price</label>
              <input name="price" type="number" class="form-control" id="price" placeholder="Cake price" required />
            </div>
            <div class="form-group col">
              <label for="size">Size</label>
              <input name="size" class="form-control" id="size" type="number" required />
            </div>
          </div>
          <div class="row">
            <div class="form-group col">
              <label for="description">Description</label>
              <textarea class="form-control" name="description" id="description" required></textarea>
            </div>
            <div class="form-group col">
              <label for="image">Cake image</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="image" id="image">
                  <label class="custom-file-label" for="image">Choose file</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Upload</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer float-right">
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
      </form>
    </div>
  </div>
</section>