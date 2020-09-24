<template>
  <div>
    <div class="vc-box shadow mt-2">
      <img src="/images/content1.jpg" width="100%" />
      <div class="head-content mt-5">
        <h3 class="mb-4">ดำน้ำดูปะการัง กับ 15 เกาะภูเก็ต ในช่วงซัมเมอร์</h3>
        <p>
          หากพูดถึงการเดินทางไปเที่ยวทะเลในประเทศไทย
          เชื่อว่าใครหลายคนคงนึกถึงเกาะสวรรค์กับหาดทรายสวยๆ
          ในภาคใต้บ้านเราหนึ่งในจังหวัดที่ได้รับความนิยมเดินทางมาท่องเที่ยวมากที่สุดก็คงหนีไม่พ้นจังหวัดภูเก็ตอย่างแน่นอน
          เพราะนอกจากจะเป็นจุดหมายปลายทางที่เต็มไปด้วยสถานที่ท่องเที่ยวต่างๆ
          มากมายแล้ว ภูเก็ตยังขึ้นชื่อในเรื่องของน้ำใสทะเลสวย
          รวมไปถึงเกาะและหาดทรายขาวต่างๆ
          ที่นักท่องเที่ยวอย่างเราไม่ควรพลาดที่จะเดินทางไปสัมผัสด้วยตนเองสักครั้ง
          วันนี้เราจึงได้รวบรวม 15 เกาะและหาดในภูเก็ตมาให้เพื่อนๆ
          ได้เดินทางไปคลายร้อน ดำน้ำดูปะการัง
          และเล่นน้ำกันอย่างสนุกสนานในช่วงซัมเมอร์ที่ใกล้มาถึงนี้
        </p>
      </div>
    </div>
    <div class="vc-box shadow mt-4 mb-5">
      <div class="row">
        <div class="col-md-3 col-sm-6 same-shop-img mb-2">
          <img src="/images/content4.jpg" />
          <div class="same-shop-price">ดูเพิ่มเติม</div>
        </div>
        <div class="col-md-3 col-sm-6 same-shop-img mb-2">
          <img src="/images/content5.jpg" />
          <div class="same-shop-price">ดูเพิ่มเติม</div>
        </div>
        <div class="col-md-3 col-sm-6 same-shop-img mb-2">
          <img src="/images/content6.jpg" />
          <div class="same-shop-price">ดูเพิ่มเติม</div>
        </div>
        <div class="col-md-3 col-sm-6 same-shop-img mb-2">
          <img src="/images/content1.jpg" />
          <div class="same-shop-price">ดูเพิ่มเติม</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  middleware: "auth",

  metaInfo() {
    return { title: this.$t("Content") };
  },
};
</script>

<style>
</style>