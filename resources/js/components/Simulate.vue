<template>
  <div class="col-sm-8 mx-auto">
    <div class="card mt-5">
      <div class="card-header">Simulate Transaction</div>
      <div class="card-body">
        <p v-if="hasSimulateResponse">{{ simulateResponse }}</p>
        <input
          type="number"
          v-model="amount"
          placeholder="Amount"
          class="form-control mb-3"
        />
        <input
          type="text"
          v-model="account"
          placeholder="Account"
          class="form-control mb-3"
        />
        <button @click="simulateTransaction" class="btn btn-primary">
          Simulate C2B
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      hasSimulateResponse: false,
      simulateResponse: "",
      amount: 0,
      account: "",
    };
  },
  methods: {
    simulateTransaction() {
      axios
        .post("api/simulate", {
          amount: this.amount,
          account: this.account,
        })
        .then((res) => {
          this.hasSimulateResponse = true;
          this.simulateResponse = res.data.ResponseDescription;
          console.log(res.data);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>
