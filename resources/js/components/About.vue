<template>
  <div class="col-sm-8 mx-auto">
    <div class="card mt-5">
      <div class="card-header">Your application Access Token</div>
      <div class="card-body">
        <p>{{ balance }}</p>
        <button @click="getAccessToken" class="btn btn-primary">
          Get Token
        </button>
      </div>
    </div>

    <!-- <div class="card mt-5">
      <div class="card-header">B2C Transaction</div>
      <div class="card-body">
        <input
          type="number"
          placeholder="Phone Number"
          class="form-control mb-3"
        />
        <input type="number" placeholder="Amount" class="form-control mb-3" />
        <input type="text" placeholder="Account" class="form-control mb-3" />
        <button class="btn btn-primary">Simulate B2C</button>
      </div>
    </div> -->
  </div>
</template>
<style scoped>
</style>
<script>
export default {
  data() {
    return {
      balance: "",
    };
  },
  mounted() {
    console.log("Vue ready");
  },
  methods: {
    getAccessToken() {
      axios
        .get("/api/at")
        .then((response) => {
          this.balance = response.data;
          console.log(response.data);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>
