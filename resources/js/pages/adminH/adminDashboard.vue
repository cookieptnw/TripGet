<template>
  <div class="m-4">
    <card class="p-4">
      <div class="row">
        <div class="col-3">
          <div class="row" style="border: 1px dashed #ccc">
            <h1 class="pl-2 pt-2">Filter</h1>

            <div class="col-md-12">
              <div>
                <div>
                  <label for="date_from">ข้อมูลตั้งแต่</label>
                  <b-form-datepicker
                    id="date_from"
                    v-model="date_from"
                    class="mb-2"
                    required
                    @input="toChange()"
                  />
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div>
                <div>
                  <label for="date_to">ถึงวันที่</label>
                  <b-form-datepicker
                    id="date_to"
                    v-model="date_to"
                    class="mb-2"
                    required
                    @input="toChange()"
                  />
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="pb-4 button-filter">
                <button
                  class="btn btn-primary btn-lg w-100 mt-4"
                  @click="onSelectChange"
                >
                  ค้นหา
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6 offset-1">
          <h1>สรุปยอดขาย</h1>
          <pie-chart
            :chart-data="datacollection"
            :options="options"
            :height="200"
          />
        </div>
      </div>
    </card>
  </div>
</template>

<script>
import axios from "axios";
import PieChart from "~/components/PieChart.js";

export default {
  components: {
    PieChart,
  },
  data: () => ({
    stats: {},
    showEmpty: false,
    datacollection: null,
    byUserSelect: "all",
    date_from: null,
    date_to: null,
    options: {
      tooltips: {
        callbacks: {
          label: (tooltipItem, chart) => chart.labels[tooltipItem.index],
        },
      },
    },
  }),
  methods: {
    async fetch() {
      const { data } = await axios.get("/api/voucher_hotel_stats", {
        params: {
          date_from: this.date_from,
          date_to: this.date_to,
        },
      });
      this.stats = data.items;
      this.createChart();
    },
    createChart() {
      const stats = this.stats;
      const labels = stats.map((el) => `${el.voucher.name} : ${el.count}`);
      const totals = stats.map(({ count }) => count);

      const datasets = [
        {
          data: totals,
          backgroundColor: [
            "#FF6633",
            "#FFB399",
            "#FF33FF",
            "#FFFF99",
            "#00B3E6",
            "#E6B333",
            "#3366E6",
            "#999966",
            "#99FF99",
            "#B34D4D",
            "#80B300",
            "#809900",
            "#E6B3B3",
            "#6680B3",
            "#66991A",
            "#FF99E6",
            "#CCFF1A",
            "#FF1A66",
            "#E6331A",
            "#33FFCC",
            "#66994D",
            "#B366CC",
            "#4D8000",
            "#B33300",
            "#CC80CC",
            "#66664D",
            "#991AFF",
            "#E666FF",
            "#4DB3FF",
            "#1AB399",
            "#E666B3",
            "#33991A",
            "#CC9999",
            "#B3B31A",
            "#00E680",
            "#4D8066",
            "#809980",
            "#E6FF80",
            "#1AFF33",
            "#999933",
            "#FF3380",
            "#CCCC00",
            "#66E64D",
            "#4D80CC",
            "#9900B3",
            "#E64D66",
            "#4DB380",
            "#FF4D4D",
            "#99E6E6",
            "#6666FF",
          ],
        },
      ];

      this.datacollection = {
        labels,
        datasets,
      };
    },
    onSelectChange() {
      this.fetch();
    },
    toChange() {
      if (this.date_to < this.date_from) {
        alert("ต้องเลือกเวลาที่มากกว่าเวลาตั้งต้น");
        setTimeout(() => {
          this.date_to = "";
          this.date_from = "";
        }, 0);
      }
    },
  },
  created() {
    this.fetch();
  },
};
</script>

<style lang="scss" scoped>
.card {
  border-radius: 25px;
}
</style>
