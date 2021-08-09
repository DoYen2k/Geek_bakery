<div class="wrapper">
  <section class="container sweeties noselect">
    <h3 class="title">Sweeties</h3>
    <p style="margin-bottom: 15px;">Search for keyword: <b><?= $data['keyword'] ?></b></p>
    <?php if (!empty($data['cakes'])) : ?>
      <div class="sweeties__items">
        <?php foreach($data['cakes'] as $index => $cake) : ?>
          <div class="sweeties__items__mini">
            <img src="<?= IMAGES_CAKES_URL ?>/<?= $cake['image']?>" alt="sweeties image" class="sweeties__item__img"/>
            <div class="sweeties__item__name line__clamp__2">
              <a href="#/"><?= $cake['name']?></a>
            </div>
            <div class="sweeties__item__prices">
              <div class="sweeties__item__price"><?= number_format($cake['price'], 0, '', ',') ?>đ</div>
              <div class="sweeties__item__original__price">300.000đ</div>
            </div>
            <button class="btn btn__secondary">Add to cart +</button>
          </div>
        <?php endforeach ?>
      </div>
    <?php else : ?>
        <p style="display: flex; align-items: center;">Không có bánh này bạn êi, tìm bánh khác đê! </p>
    <?php endif; ?>
    <div style="margin-top: 40px;"></div>
  </section>
</div>