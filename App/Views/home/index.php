  <!-- banner -->
<div class="banner">
  <img src="<?= IMAGES_URL ?>/banner.png" alt="banner">
</div>
<!-- category -->
<div class="wrapper">
  <section class="container category noselect">
    <h3 class="title">Experience Flavours</h3>
    <ul class="category__items">
      <?php foreach($data['categories'] as $index => $type) :?>
        <a href="#/">
          <li class="category__item__mini">
            <img
            class="category__item-image"
            src="<?= IMAGE_CATEGORY_URL ?>/<?= $type['image'] ?>"
            alt="category image"
            />
            <div class="category__item__name"><?= $type['name'] ?></div>
            <div class="category__item__description"><?= $type['description'] ?></div>
          </li>
        </a>
      <?php endforeach ?>
    </ul>
  </section>
</div>

<!-- bestseller -->
<div class="bestseller__background">
  <div class="wrapper">
    
    <section class="container best__seller noselect">
      <div class="best__seller__left__arrow" onclick="pushSlide(-1)">
        <img src="<?= ICONS_URL ?>/Arrow_1.svg" alt="Previous">
      </div>
      <div class="title"><h3>Best Seller</h3></div>
      <?php foreach($data['bestSellers'] as $index =>$cake) :?>
        <div class="best__seller__items">
            <img src="<?= IMAGES_CAKES_URL ?>/<?= $cake['image'] ?>" alt="cake img" class="best__seller__item__img">
            <div class="best__seller__item__info">
              <div>
                  <h6 class="best__seller__item__info__name"> <?= $cake["name"] ?></h6>
                  <p class="best__seller__item__info__description">
                    Award yourself with this rich chocolate cake wonderfully
                    crammed with Cadbury Fuse and white chocolate chunks and
                    draped lusciously with molten chocolate. This perfect work of
                    art hides in every bite of chocolate that is a little nutty
                    and a lot of tasty!
                  </p>
              </div>
              <div>
                <div class="best__seller__item__info__price"><?= $cake["price"] ?></div>
                <div class="best__seller__item__info__original__price">400.000đ</div>
              </div>
              <button onClick="addToCart(<?= isset($_SESSION['user']) ? $_SESSION['user']['id'] : 0 ?>, <?= $cake['id'] ?>)" class="btn btn__primary">Add to cart +</button>
            </div>
        </div>
      <?php endforeach ?>
      <!-- <div class="btn__load"> -->
      <ul class="paging">
      <?php foreach($data['bestSellers'] as $index =>$cake) :?>
            <li class="paging-item" onclick="currentSlide(<?= $index+1 ?>)"></li>  
        <?php endforeach ?>
      </ul>
      <!-- </div> -->
      <div class="best__seller__right__arrow" onclick="pushSlide(1)">
        <img src="<?= ICONS_URL ?>/Arrow_2.svg" alt="Next">
      </div>
    </section>
    
  </div>
</div>
<!-- end bestseller -->

<div class="wrapper">
  <section class="container sweeties noselect">
    <h3 class="title">Sweeties</h3>
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
          <button onClick="addToCart(<?= isset($_SESSION['user']) ? $_SESSION['user']['id'] : 0 ?>, <?= $cake['id'] ?>)" class="btn btn__secondary">Add to cart +</button>
        </div>
      <?php endforeach ?>
    </div>
    <div class="paging__numbers noselect">
      <!-- left arrow svg -->
      <svg
        class="paging-number-left-arrow paging-left-arrow"
        width="34"
        height="35"
        viewBox="0 0 34 35"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
      >
        <circle
          cx="17"
          cy="17.9402"
          r="16.5"
          transform="rotate(-180 17 17.9402)"
          stroke="#848484"
        />
        <path
          d="M12.2387 16.935L18.8388 11.1495C19.1571 10.8704 19.6732 10.8704 19.9915 11.1495L20.7613 11.8242C21.079 12.1028 21.0797 12.5543 20.7626 12.8335L15.5319 17.4402L20.7626 22.0469C21.0797 22.3261 21.079 22.7776 20.7613 23.0561L19.9915 23.7309C19.6732 24.0099 19.1571 24.0099 18.8388 23.7309L12.2387 17.9454C11.9204 17.6664 11.9204 17.214 12.2387 16.935Z"
          fill="#848484"
        />
      </svg>
      <!-- end left arrow svg -->
      <div class="paging__number">1</div>
      <div class="paging__number paging-number--active">2</div>
      <div class="paging__number">3</div>
      <div class="paging__number">4</div>
      <div class="paging__number">5</div>
      <!-- right arrow svg -->
      <svg
        class="paging-number-right-arrow paging-right-arrow"
        width="34"
        height="34"
        viewBox="0 0 34 34"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
      >
        <circle cx="17" cy="17" r="16.5" stroke="#848484" />
        <path
          d="M21.7613 18.0052L15.1612 23.7907C14.8429 24.0698 14.3268 24.0698 14.0085 23.7907L13.2387 23.1159C12.921 22.8374 12.9203 22.3859 13.2374 22.1067L18.4681 17.5L13.2374 12.8933C12.9203 12.6141 12.921 12.1626 13.2387 11.8841L14.0085 11.2093C14.3268 10.9302 14.8429 10.9302 15.1612 11.2093L21.7613 16.9948C22.0796 17.2738 22.0796 17.7262 21.7613 18.0052Z"
          fill="#848484"
        />
      </svg>
      <!-- end right arrow svg -->
    </div>
  </section>
</div>