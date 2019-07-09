  <template>
  <div>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <router-link :to="{ name: 'home' }">Home</router-link>
        </li>
        <li class="breadcrumb-item" aria-current="page">
          <router-link :to="{ name: 'subscribers.index' }">List Users</router-link>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Create User</li>
      </ol>
    </nav>
    <form @submit.prevent="onSubmit($event)">
      <div class="form-group row">
        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input
            type="email"
            class="form-control"
            id="inputEmail"
            v-model="subscriber.email"
            placeholder="email"
          />
          <span v-if="subscriber.error" class="text-danger">{{ messages.errors.email }}</span>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-light">Reset</button>
        </div>
      </div>
    </form>
  </div>
</template>
<script>
import api from "../api/subscribers";

export default {
  data() {
    return {
      subscriber: {
        email: "",
        error: false
      },
      messages: {
        errors: {
          email: "",
        }
      },
      loaded: false,
      saving: false
    };
  },
  computed: {},
  methods: {
    onSubmit(event) {
      api
        .create(this.subscriber)
        .then(response => {
          if (response.data) {
            this.$router.push({
              name: "subscribers.index"
            });
          }
          console.log(response);
        })
        .catch(error => {
          console.log(error.response.data);
          this.subscriber.error = true;
          this.messages.errors = error.response.data.errors;
        });
    }
  },
  created() {}
};
</script>