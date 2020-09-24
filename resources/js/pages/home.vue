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

    <form>
      <div class="form-filter">
        <div class="row">
          <div class="col-md-2 col-sm-12">
            <div class="form-group">
              <select class="form-control" id="exampleFormControlSelect1">
                <option>Hotel</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
          </div>
          <div class="col-md-2 col-sm-12">
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
          <div class="col-md-2 col-sm-12">
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
          <div class="col-md-2 col-sm-12">
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
          <div class="col-md-4 col-sm-12">
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

    <div class="head-content">
      <div class="row">
        <div class="col col-md-8">
          <h3>Hot Deal</h3>
        </div>
        <div class="col col-md-4 text-right mt-3">
          <a href="#" class="text-right">SEE MORE ></a>
        </div>
      </div>
    </div>

    <div class="card-deck">
      <div class="card shadow">
        <img class="card-img-top" src="/images/img1.jpg" alt="Card image cap" />
        <div class="card-body">
          <h5 class="card-title">Noursabah Pattaya</h5>
          <p class="card-text">Free upgrade to Deluxe with Balcony</p>
        </div>
        <div class="card-footer">
          <div class="hotdeal-sold">
            <div class="progress hotdeal-sold-bar">
              <div
                class="progress-bar bg-info"
                role="progressbar"
                style="width: 50%"
                aria-valuenow="50"
                aria-valuemin="0"
                aria-valuemax="100"
              ></div>
              <p class="hotdeal-sold-total p-3">15 Sold</p>
            </div>
          </div>
          <div class="hotdeal-price">
            <h6 class="text-right mt-2">499$</h6>
          </div>
        </div>
      </div>

      <div class="card shadow">
        <img class="card-img-top" src="/images/img2.jpg" alt="Card image cap" />
        <div class="card-body">
          <h5 class="card-title">Noursabah Pattaya</h5>
          <p class="card-text">Free upgrade to Deluxe with Balcony</p>
        </div>
        <div class="card-footer">
          <div class="hotdeal-sold">
            <div class="progress hotdeal-sold-bar">
              <div
                class="progress-bar bg-info"
                role="progressbar"
                style="width: 50%"
                aria-valuenow="50"
                aria-valuemin="0"
                aria-valuemax="100"
              ></div>
              <p class="hotdeal-sold-total p-3">15 Sold</p>
            </div>
          </div>
          <div class="hotdeal-price">
            <h6 class="text-right mt-2">499$</h6>
          </div>
        </div>
      </div>

      <div class="card shadow">
        <img class="card-img-top" src="/images/img3.jpg" alt="Card image cap" />
        <div class="card-body">
          <h5 class="card-title">Noursabah Pattaya</h5>
          <p class="card-text">Free upgrade to Deluxe with Balcony</p>
        </div>
        <div class="card-footer">
          <div class="hotdeal-sold">
            <div class="progress hotdeal-sold-bar">
              <div
                class="progress-bar bg-info"
                role="progressbar"
                style="width: 50%"
                aria-valuenow="50"
                aria-valuemin="0"
                aria-valuemax="100"
              ></div>
              <p class="hotdeal-sold-total p-3">15 Sold</p>
            </div>
          </div>
          <div class="hotdeal-price">
            <h6 class="text-right mt-2">499$</h6>
          </div>
        </div>
      </div>
    </div>

    <div class="head-content">
      <h3>Lifestyle Travel</h3>
    </div>

    <div class="card-deck">
      <div class="card shadow">
        <img class="card-img-top" src="/images/img4.jpg" alt="Card image cap" />
        <div class="card-body">
          <h5 class="card-title">Noursabah Pattaya</h5>
          <p class="card-text">Free upgrade to Deluxe with Balcony</p>
        </div>
        <div class="card-footer">
          <div class="hotdeal-sold">
            <div class="progress hotdeal-sold-bar"></div>
          </div>
          <div class="hotdeal-price">
            <h6 class="text-right mt-2">499$</h6>
          </div>
        </div>
      </div>

      <div class="card shadow">
        <img class="card-img-top" src="/images/img5.jpg" alt="Card image cap" />
        <div class="card-body">
          <h5 class="card-title">Noursabah Pattaya</h5>
          <p class="card-text">Free upgrade to Deluxe with Balcony</p>
        </div>
        <div class="card-footer">
          <div class="hotdeal-sold">
            <div class="progress hotdeal-sold-bar"></div>
          </div>
          <div class="hotdeal-price">
            <h6 class="text-right mt-2">499$</h6>
          </div>
        </div>
      </div>

      <div class="card shadow">
        <img class="card-img-top" src="/images/img6.jpg" alt="Card image cap" />
        <div class="card-body">
          <h5 class="card-title">Noursabah Pattaya</h5>
          <p class="card-text">Free upgrade to Deluxe with Balcony</p>
        </div>
        <div class="card-footer">
          <div class="hotdeal-sold">
            <div class="progress hotdeal-sold-bar"></div>
          </div>
          <div class="hotdeal-price">
            <h6 class="text-right mt-2">499$</h6>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-5 mb-5">
      <div class="row">
        <div class="col col-md-6">
          <div class="category-home text-center shadow mb-3">
            <routerLink :to="{ name: 'hotel' }">
              <h3 class="text-white">HOTEL</h3>
            </routerLink>
          </div>
        </div>
        <div class="col col-md-6">
          <div class="category-home text-center shadow mb-3">
            <routerLink :to="{ name: 'restaurant' }">
              <h3 class="text-white">RESTAURANT</h3>
            </routerLink>
          </div>
        </div>
        <div class="col col-md-6">
          <div class="category-home text-center shadow mb-3">
            <routerLink :to="{ name: 'tourist' }">
              <h3 class="text-white">TOURIST</h3>
            </routerLink>
          </div>
        </div>
        <div class="col col-md-6">
          <div class="category-home text-center shadow mb-3">
            <routerLink :to="{ name: 'travel_guide' }">
              <h3 class="text-white">TRAVEL GUIDE</h3>
            </routerLink>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  middleware: "auth",

  metaInfo() {
    return { title: this.$t("home") };
  },
};
</script>

<style>
a {
  text-decoration: none;
}
.form-filter {
  width: 100%;
  padding: 15px;
  background-color: #4582ec;
}
.form-group-search {
  width: 80%;
}
.form-group-search input {
  border-radius: 5px 0px 0px 5px !important;
}
.form-group-submit {
  margin-top: 0.5px;
  width: 20%;
  height: 42.5px;
  border-radius: 0px 5px 5px 0px !important;
}
.head-content {
  margin-top: 35px;
  margin-bottom: 20px;
}
.hotdeal-sold {
  width: 70%;
  float: left;
}
.hotdeal-price {
  width: 30%;
  float: left;
  font-weight: 300;
}
.hotdeal-sold-total p {
  font-weight: 300;
}
.progress {
  height: 2rem !important;
}
.category-home {
  padding: 35px 20px 35px 20px;
  background-color: #195dfc;
  border-radius: 5px;
}
</style>