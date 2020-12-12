<template>
  <div class="p-5">
    <b-modal ref="my-modal" hide-footer :title="`ข้อมูลลูกค้า : ${v.key}`">
      <div v-if="v.user">
        ชิ่อ : {{ v.user.first_name || "-" }} {{ v.user.last_name || "-" }}
        <br />
        หมายเลขบัตรปชช : {{ v.user.id_no || "-" }} <br />
        อีเมล : {{ v.user.email || "-" }} <br />
        เบอร์โทร : {{ v.user.tel || "-" }} <br />
      </div>
    </b-modal>
    <card>
      <div class="create-btn-group clearfix">
        <div class="float-left">
          <h3>{{ pageTitle }}</h3>
        </div>
        <div class="float-left ml-2"></div>
      </div>
      <!-- ////////// Page Title //////////-->
      <div class="clearfix mb-4">
        <div class="float-left form-inline">
          <div class="form-group">
            <label>Show</label>
            <select
              v-model="showItem"
              class="form-control mx-2"
              @change="fetch()"
            >
              <option
                :value="item.v"
                v-for="item in showItemOptions"
                :key="item.v"
              >
                {{ item.t }}
              </option>
            </select>
            <label>entries</label>
          </div>
          <!-- ////////// ITEM ENTRIES //////////-->
        </div>
        <div class="float-right form-inline">
          <div class="form-group">
            <label>Sort By:</label>
            <select
              v-model="sortBy"
              @change="fetch()"
              class="form-control ml-2"
            >
              <option value="desc">Sort Newest to Oldest</option>
              <option value="asc">Sort Oldest to Newest</option>
            </select>
          </div>
          <!-- ////////// SEARCH AND SORT //////////-->
        </div>
      </div>
      <div class="clear-fix paginate-group">
        <div class="float-left form-inline">
          <div class="form-group mb-4">
            <label>Search:</label>
            <input
              type="text"
              v-model="q"
              class="form-control ml-2"
              @input="fetch()"
              placeholder="Keyword ..."
            />
          </div>
        </div>
        <div class="float-right">
          <pagination
            :data="items"
            @pagination-change-page="fetch"
          ></pagination>
        </div>
      </div>
      <!-- ////////// Paginate TOP //////////-->

      <b-table
        striped
        hover
        :items="items.data"
        :fields="fields"
        :striped="true"
      >
        <template v-slot:cell(thumnails)="data">
          <img :src="data.item.image_url" height="100" />
        </template>
        <template v-slot:cell(actions)="data">
          <button class="btn btn-primary" @click="showModal(data.item)">
            <i class="far fa-user"></i> ข้อมูลติดต่อลูกค้า
          </button>
        </template>
      </b-table>

      <!-- ////////// TABLES //////////-->

      <div class="clear-fix paginate-group">
        <div class="float-right">
          <pagination
            :data="items"
            @pagination-change-page="fetch"
          ></pagination>
        </div>
      </div>
      <!-- ////////// Paginate BOTTOM //////////-->

      <div class="showing">
        Showing {{ items.from }} to {{ items.to }} of {{ items.total }} entries
        <hr class="mt-5" />
      </div>
      <!-- ////////// SWOWING //////////-->
    </card>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data: () => ({
    v: {},
    pageTitle: "ประวัติการขาย",
    items: {},
    showItem: 10,
    showItemOptions: [
      { v: 10, t: "10" },
      { v: 25, t: "25" },
      { v: 50, t: "50" },
      { v: 100, t: "100" },
    ],
    q: "",
    sortBy: "desc",
    fields: [
      { key: "key", label: "รหัสการซื้อ" },
      { key: "voucher.name", label: "ชื่อ Voucher" },
      { key: "voucher.hotel.name", label: "สาขาที่ขาย" },
      { key: "voucher.category.name", label: "หมวดหมู่" },
      { key: "price_sum", label: "ราคา (บาท)" },
      { key: "status_text", label: "สถานะ" },
      { key: "created_at_text", label: "ขายเมื่อ" },
      "actions",
    ],
  }),
  computed: {
    pageName() {
      return this.$route.name.split(".")[0];
    },
  },
  methods: {
    showModal(v) {
      this.v = v;
      this.$refs["my-modal"].show();
    },
    async fetch(page = 1) {
      const { data } = await axios.get(this.$api(this.pageName), {
        params: {
          page,
          item: this.showItem,
          q: this.q,
          sortBy: this.sortBy,
        },
      });
      this.items = data.items;
    },
    async del(id) {
      var result = confirm("Are you sure to delete this item?");
      if (result) {
        const { data } = await axios.post(
          this.$api(this.pageName + `/${id}/delete`),
          {
            id,
          }
        );

        this.fetch();
      }
    },
  },
  created() {
    this.fetch();
  },
};
</script>
