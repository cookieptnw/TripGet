<template>
  <div class="container">
    <div class="vc-box shadow mt-5">
      <div class="row">
        <div class="col-md-3">
          <img src="/images/img4.jpg" alt="" width="100%" />
        </div>
        <div class="col-md-5 mt-2">
          <p>VoucherChiangMai</p>
          <p>🚩 เชียงใหม่</p>
        </div>
        <div class="col-md-4 mt-2">
          <router-link :to="{ name: 'hotel.detail', params: { id: 1 } }"
            ><button class="btn btn-outline-primary btn-buy">
              ดูรายละเอียดร้านค้า
            </button></router-link
          >
          <router-link :to="{ name: 'hotel.shop', params: { id: 1 } }"
            ><button class="btn btn-outline-primary btn-buy">
              ดูร้านค้าเพิ่มเติม
            </button></router-link
          >
        </div>
      </div>
    </div>

    <div class="vc-box shadow mt-5">
      <div class="row">
        <div class="col-md-4 text-center mb-2">
          <h6>20</h6>
          <small class="text-muted">รายการ</small>
        </div>
        <div class="col-md-4 text-center mb-2">
          <h6>4</h6>
          <small class="text-muted">คะแนนร้านค้า</small>
        </div>
        <div class="col-md-4 text-center mb-2">
          <h6>98%</h6>
          <small class="text-muted">การตอบกลับ</small>
        </div>
      </div>
    </div>

    <div class="head-content">
      <div class="row">
        <div class="col col-md-8 flash-sale">
          <h3>Flash Sale</h3>
        </div>
        <div class="col col-md-4 text-right mt-3">
          <a href="#" class="text-right flash-sale">ดูทั้งหมด</a>
        </div>
      </div>
    </div>

    <div class="head-content text-center mt-2">
      <hr />
      <div class="row">
        <div class="col-md-3 same-shop-img mb-2">
          <img src="/images/img3.jpg" />
          <div class="flash-sale-shop-price">1,200 บาท</div>
        </div>
        <div class="col-md-3 same-shop-img mb-2">
          <img src="/images/img4.jpg" />
          <div class="flash-sale-shop-price">1,150 บาท</div>
        </div>
        <div class="col-md-3 same-shop-img mb-2">
          <img src="/images/img5.jpg" />
          <div class="flash-sale-shop-price">1,990 บาท</div>
        </div>
        <div class="col-md-3 same-shop-img mb-2">
          <img src="/images/img6.jpg" />
          <div class="flash-sale-shop-price">1,090 บาท</div>
        </div>
      </div>
      <hr />
    </div>

    <div class="card-deck mt-5 mb-5">
      <div class="card shadow">
        <img
          class="card-img-top"
          src="https://cms.dmpcdn.com/travel/2017/08/03/b831d834-c87d-46d8-9b45-672dca0e8df2.jpg"
          alt="Card image cap"
        />
        <div class="card-body">
          <h5 class="card-title">เกาะมุก</h5>
          <p class="card-text">
            เกาะมุก ได้ชื่อว่า “ถ้ำมรกตอันล้ำค่าแห่งอันดามัน”
            เป็นเกาะที่ใหญ่เป็นอันดับที่ 3
          </p>
        </div>
        <div class="card-footer">
          <div class="hotdeal-sold">
            <div class="progress hotdeal-sold-bar"></div>
          </div>
          <div class="hotdeal-price">
            <h6 class="text-right mt-2">1,200 บาท</h6>
          </div>
        </div>
      </div>

      <div class="card shadow">
        <img
          class="card-img-top"
          src="https://cms.dmpcdn.com/travel/2017/08/03/71bdbdd6-bc67-40a0-b9e5-b8155309592b.jpg"
          alt="Card image cap"
        />
        <div class="card-body">
          <h5 class="card-title">ไร่ชาฉุยฟง</h5>
          <p class="card-text">
            ไร่ชาฉุยฟง ตั้งอยู่ที่ อ.แม่จัน จ.เชียงราย เป็นแหล่งปลูกชาชั้นดี
          </p>
        </div>
        <div class="card-footer">
          <div class="hotdeal-sold">
            <div class="progress hotdeal-sold-bar"></div>
          </div>
          <div class="hotdeal-price">
            <h6 class="text-right mt-2">2,200 บาท</h6>
          </div>
        </div>
      </div>

      <div class="card shadow">
        <img
          class="card-img-top"
          src="https://cms.dmpcdn.com/travel/2017/08/03/33ae5382-06aa-4ff9-9bf4-eb30b328f29e.jpg"
          alt="Card image cap"
        />
        <div class="card-body">
          <h5 class="card-title">ชิงช้าต้นไม้</h5>
          <p class="card-text">
            จากจุดชมวิวบนต้นไม้นี้สามารถมองออกไปเห็นทิวเขาและพื้นที่ราบรอยต่อของ
            5 จังหวัด
          </p>
        </div>
        <div class="card-footer">
          <div class="hotdeal-sold">
            <div class="progress hotdeal-sold-bar"></div>
          </div>
          <div class="hotdeal-price">
            <h6 class="text-right mt-2">1,590 บาท</h6>
          </div>
        </div>
      </div>

      <div class="card shadow">
        <img
          class="card-img-top"
          src="https://cms.dmpcdn.com/travel/2017/08/03/2db619dd-b1f6-49ac-9c0a-c56ae8a1746a.jpg"
          alt="Card image cap"
        />
        <div class="card-body">
          <h5 class="card-title">เกาะตาชัย</h5>
          <p class="card-text">
            เกาะตาชัย ขึ้นชื่อเรื่องหาดทรายขาวราวคอฟฟี่เมต เป็นที่เที่ยวนิยมมากๆ
            ในไม่กี่ปีมานี้ค่ะ
          </p>
        </div>
        <div class="card-footer">
          <div class="hotdeal-sold">
            <div class="progress hotdeal-sold-bar"></div>
          </div>
          <div class="hotdeal-price">
            <h6 class="text-right mt-2">1,200 บาท</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { vouchers } from "../../dataMockup";

export default {
  middleware: "auth",
  data: () => ({
    vouchers,
  }),
  computed: {
    id() {
      return this.$route.params.id;
    },
    voucher() {
      let vouchersItems = [];
      this.vouchers.forEach((el) => {
        let v = el.vouchers;

        if (v) {
          vouchersItems.push(...v);
        }
      });
      return vouchersItems.find((el) => el.id == this.id);
    },
  },
};
</script>

<style></style>
