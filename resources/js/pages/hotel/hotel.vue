<template>
  <div>
    <div
      id="carouselExampleIndicators"
      class="carousel slide"
      data-ride="carousel"
    >
      <ol class="carousel-indicators">
        <li
          data-target="#carouselExampleIndicators"
          data-slide-to="0"
          class="active"
        ></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="/images/img1.jpg" alt="First slide" />
        </div>
        <div class="carousel-item">
          <img
            class="d-block w-100"
            src="/images/img2.jpg"
            alt="Second slide"
          />
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="/images/img3.jpg" alt="Third slide" />
        </div>
      </div>
      <a
        class="carousel-control-prev"
        href="#carouselExampleIndicators"
        role="button"
        data-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a
        class="carousel-control-next"
        href="#carouselExampleIndicators"
        role="button"
        data-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <form class="mb-5">
      <div class="form-filter">
        <div class="row">
          <div class="col-md-3 col-sm-12">
            <div class="form-group">
              <select class="form-control" id="exampleFormControlSelect1">
                <option>Country</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
            <div class="form-group">
              <select class="form-control" id="exampleFormControlSelect1">
                <option>Price</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
            <div class="form-group">
              <select class="form-control" id="exampleFormControlSelect1">
                <option>Holiday</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
            <div class="form-group-search float-left">
              <input
                type="text"
                class="form-control"
                id="validationDefault03"
                placeholder="Search"
              />
            </div>
            <button
              class="btn btn-warning form-group-submit float-left"
              type="submit"
            >
              OK
            </button>
          </div>
        </div>
      </div>
    </form>

    <div class="hotel-list shadow mb-3">
      <div class="row">
        <div class="col-md-3">
          <img src="/images/img1.jpg" width="100%" />
        </div>
        <div class="col-md-9">
          <b-card-text>
            <div class="card-body">
              <h5 class="card-title">Monna Padong</h5>
              <p class="card-text">
                Enjoy the beautiful scenery of wooden canna, decorated with
                simple bamboo works.
              </p>
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-md-6 col-sm-6">
                  <div class="hotel-rating-bar">
                    <div>
                      <b-form-rating
                        id="rating-inline"
                        inline
                        value="4"
                      ></b-form-rating>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="hotel-price">
                    <h6 class="text-right mt-3 mb-3 w-100">499$</h6>
                  </div>
                </div>
                <div class="col-md-3 col-sm-12">
                  <div class="hotel-voucher">
                    <h6 class="text-right">
                      <router-link
                        :to="{ name: 'hotel.detail', params: { id: 1 } }"
                        ><button class="btn btn-outline-primary btn-buy">
                          Buy Voucher
                        </button></router-link
                      >
                    </h6>
                  </div>
                </div>
              </div>
            </div>
          </b-card-text>
        </div>
      </div>
    </div>

    <div class="hotel-list shadow mb-3">
      <div class="row">
        <div class="col-md-3">
          <img src="/images/img2.jpg" width="100%" />
        </div>
        <div class="col-md-9">
          <b-card-text>
            <div class="card-body">
              <h5 class="card-title">Monna Padong</h5>
              <p class="card-text">
                Enjoy the beautiful scenery of wooden canna, decorated with
                simple bamboo works.
              </p>
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-md-6 col-sm-6">
                  <div class="hotel-rating-bar">
                    <div>
                      <b-form-rating
                        id="rating-inline"
                        inline
                        value="4"
                      ></b-form-rating>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="hotel-price">
                    <h6 class="text-right mt-3 mb-3 w-100">499$</h6>
                  </div>
                </div>
                <div class="col-md-3 col-sm-12">
                  <div class="hotel-voucher">
                    <h6 class="text-right">
                      <button class="btn btn-outline-primary btn-buy">
                        Buy Voucher
                      </button>
                    </h6>
                  </div>
                </div>
              </div>
            </div>
          </b-card-text>
        </div>
      </div>
    </div>

    <div class="hotel-list shadow mb-3">
      <div class="row">
        <div class="col-md-3">
          <img src="/images/img3.jpg" width="100%" />
        </div>
        <div class="col-md-9">
          <b-card-text>
            <div class="card-body">
              <h5 class="card-title">Monna Padong</h5>
              <p class="card-text">
                Enjoy the beautiful scenery of wooden canna, decorated with
                simple bamboo works.
              </p>
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-md-6 col-sm-6">
                  <div class="hotel-rating-bar">
                    <div>
                      <b-form-rating
                        id="rating-inline"
                        inline
                        value="4"
                      ></b-form-rating>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="hotel-price">
                    <h6 class="text-right mt-3 mb-3 w-100">499$</h6>
                  </div>
                </div>
                <div class="col-md-3 col-sm-12">
                  <div class="hotel-voucher">
                    <h6 class="text-right">
                      <button class="btn btn-outline-primary btn-buy">
                        Buy Voucher
                      </button>
                    </h6>
                  </div>
                </div>
              </div>
            </div>
          </b-card-text>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  middleware: "auth",

  metaInfo() {
    return { title: "Hotel" };
  },
};
</script>

<style>
</style>