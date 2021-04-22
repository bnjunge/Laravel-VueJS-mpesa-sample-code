<template>
  <div class="col-sm-8 mx-auto">
    <div class="card mt-5">
      <div class="card-header">Test B2C</div>
      <div class="card-body">
        <p v-if="b2cHasResponse">{{ b2cResponse }}</p>
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
          v-model="remarks"
          type="text"
          placeholder="Remarks"
          class="form-control mb-3"
        />
        <button @click="initB2C" class="btn btn-primary">
          Simulate B2C
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
        b2cHasResponse: false,
        b2cResponse: '',
        phone: '',
        amount: '',
        remarks: ''
    };
  },
  methods: {
      initB2C(){
          axios.post('/api/init-b2c', {
              phone: this.phone,
              amount: this.amount,
              remarks: this.remarks
          })
          .then((response) => {
              this.b2cHasResponse = true
              this.b2cResponse = response.data.ResponseDescription
              console.log(response.data);
          })
          .catch((error) => {
              console.log(error);
          })
      }
  },
};
</script>
