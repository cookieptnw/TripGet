<template>
  <div>
    <div class="vc-box shadow mt-5">
      <div class="row">
        <div class="col-md-3">
          <img src="/images/img6.jpg" alt="" width="100%" />
        </div>
        <div class="col-md-5 mt-2">
          <h3>$699-$499</h3>
          <h5>Stock : 12</h5>
        </div>
        <div class="col-md-4 mt-2">
          <button class="btn btn-primary btn-buy">Adult</button>
          <button class="btn btn-outline-primary btn-buy">Child</button>
        </div>
      </div>
    </div>

    <div class="vc-box shadow mt-3 mb-5">
      <div class="head-content">
        <h3>Customer information</h3>
      </div>
      <form>
        <div class="form-group">
          <label for="exampleFormControlInput1">Name</label>
          <input
            type="text"
            class="form-control"
            id="exampleFormControlInput1"
            placeholder="FirstName LastName "
          />
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1"> ID Card Number</label>
          <input
            type="number"
            class="form-control"
            id="exampleFormControlInput1"
            placeholder="1-xxxx-xxxxx-xx-x"
          />
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Email address</label>
          <input
            type="email"
            class="form-control"
            id="exampleFormControlInput1"
            placeholder="name@example.com"
          />
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Mobile</label>
          <input
            type="number"
            class="form-control"
            id="exampleFormControlInput1"
            placeholder="087-xxx-xxxx"
          />
        </div>
        <small class="text-muted">
          *Children receive a voucher at the time of arrival.</small
        >
      </form>

      <div class="total">
        <hr />
        <div class="row">
          <div class="col-md-9 text-right">Quantity</div>
          <div class="col-md-1 text-center">-</div>
          <div class="col-md-1 text-center total-num">1</div>
          <div class="col-md-1 text-center">+</div>
        </div>
        <hr />
      </div>

      <button class="btn btn-primary w-100">Add to Cart</button>
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