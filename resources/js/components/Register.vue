<template>
<div class="col-sm-8 mx-auto">
  <div class="card mt-5">
    <div class="card-header">Register URLs</div>
    <div class="card-body">
      <p v-if="hasRegisterUrlResponse">{{ registerUrlResponse }}</p>
      <button @click="registerURLS" class="btn btn-primary">
        Register URL
      </button>
    </div>
  </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      hasRegisterUrlResponse: false,
      registerUrlResponse: "",
    };
  },
  methods: {
    registerURLS() {
      axios
        .post("/api/register", {})
        .then((response) => {
          this.hasRegisterUrlResponse = true;
          this.registerUrlResponse = response.data.ResponseDescription;
          console.log(response.data);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>
