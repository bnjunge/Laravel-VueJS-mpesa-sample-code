 <template>
  <div class="container">
    <div class="row mt-5">
      <div class="col-sm-8 mx-auto">
        <div class="card">
          <div class="card-header">
            Laravel Vue Implementation of the Daraja API
          </div>
          <div class="card-body">
            <p>Laravel is a PHP Framework that provides a robust and efficient workflow for 
              developing web applications with modern standards.
            </p>
            <p>Over the years, Laravel has grown to become the most popular PHP Framework of all time, with dozens
              of content and a large community which has seen it grow to an enormous framework with lots and lots of application areas.
            </p>
            <p>M-PESA on the other hand is Kenya's Techno-Fintech cutting edge mobile money platform, that currently serves
              over 30M users and has recently started making noice in the international space.
            </p>
            <p>Processing M-PESA payments via your Laravel Application is a must if you are to attact consumers who are in Kenya.
              This is not only easy, but an exciting venture to do Tutorials focused on Kenyan Developers. 
            </p>
            <p>
              Lets Dive into the 8 Part Series and develop using the resources we have. So glad you could make it.
            </p>
            <p>Feel Free as well to run tests on this application if you get stuck, we maintain this application as long as possible.
            </p>
            <p>
              If you get stuck, visit our website <a target="_blank" href="https://survtechnologies.co.ke">https://survtechnologies.co.ke</a> and live chat with one of 
              our experts to guide you through. A session will involve getting full source code, and will cost you a cup of Coffee.
            </p>
            <p>
              If you were able to integrate and feel indebted to leave our debts, feel free to <a href="https://survtechnologies.co.ke/daraja/coffee.html?ref=laravel-application" class="btn btn-sm btn-primary" target="_blank">Buy Coffee Here</a>,
              or, head over to our YouTube Channel and Subscribe and let us know you got this from our Laravel-Mpesa website!
            </p>
            <br>
            <p>Regards</p>
            <p>Benson Njunge</p>
            <p class="strong">Lead Developer, Surv Technologies</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
 <script>
export default {
  data() {
    return {
      consumer_key: "",
      consumer_secret: "",
      response: false,
      feedback: "",
    };
  },
  mounted() {
    console.log("Vue initialized");
  },
  methods: {
    saveTestData() {
      axios
        .post("/api/save-daraja-details", {
          consumer_key: this.consumer_key,
          consumer_secret: this.consumer_secret,
        })
        .then((response) => {
          if (response.data.code == 1) {
            this.response = true;
            this.feedback =
              `<p class='alert alert-success'>${response.data.msg}</p>`;
          } else {
            this.response = true;
            this.feedback =
              `<p class='alert alert-danger'>${response.data.msg}</p>`;
          }
          console.log(response.data);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>
 
 