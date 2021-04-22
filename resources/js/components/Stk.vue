<template>
  <div class="col-sm-8 mx-auto">
    <div class="card mt-5">
      <div class="card-header">Test LNMO</div>
      <div class="card-body">
        <p v-if="stkHasResponse">{{ stkResponse }}</p>
        <input
          v-model="phone"
          type="number"
          placeholder="Phone Number"
          class="form-control mb-3"
        />
        <input
          v-model="amount"
          type="number"
          placeholder="Amount"
          class="form-control mb-3"
        />
        <input
          v-model="account"
          type="text"
          placeholder="Account"
          class="form-control mb-3"
        />
        <button @click="initiateSTK" class="btn btn-primary">
          Initiate LNMO
        </button>
      </div>
    </div>

    <div class="card mt-5">
      <div class="card-header">Verify LNMO</div>
      <div class="card-body">
        <p v-if="hasVerifyResponse">{{ verifyResponse }}</p>
        <input
          v-model="id"
          type="text"
          name="conversationID"
          class="form-control"
        />
        <button @click="verifyLNMO" class="btn btn-primary mt-4">
          Check Transaction
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      phone: "",
      stkHasResponse: false,
      stkResponse: "",
      id: "",
      verifyResponse: "",
      hasVerifyResponse: false,
      amount: 0,
      account: "",
    };
  },
  methods: {
    initiateSTK() {
      axios
        .post("api/stk", {
          amount: this.amount,
          account: this.account,
          phone: this.phone,
        })
        .then((res) => {
          this.stkHasResponse = true;
          this.stkResponse =
            res.data.ResponseDescription +
            " <br />CheckoutRequestID: " +
            res.data.CheckoutRequestID;
          console.log(res.data);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    verifyLNMO() {
      axios
        .post(window.location.href + "api/querystk", {
          id: this.id,
        })
        .then((resp) => {
          this.hasVerifyResponse = true;
          this.verifyResponse = resp.data.ResultDesc ?? resp.data.errorMessage;
          console.log(resp.data);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>
