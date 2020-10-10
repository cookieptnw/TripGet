const folderDirectory = window.config.fDir;
const assetDirectory = window.config.aDir;

import { mapGetters } from "vuex";
export default {
  computed: {
    ...mapGetters({
      user: "auth/user"
    })
  },
  methods: {
    aUrl: p => `${folderDirectory}${p}`,
    aAssetUrl: (p2, p1) => `${assetDirectory}assets/${p1 ? p1 + "/" : ""}${p2}`
  }
};
