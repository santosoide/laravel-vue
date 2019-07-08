<template>
  <div>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <router-link :to="{ name: 'home' }">Home</router-link>
        </li>
        <li class="breadcrumb-item" aria-current="page">
          <router-link :to="{ name: 'channels.index' }">List Channel</router-link>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Create Channel</li>
      </ol>
    </nav>
    <form @submit.prevent="onSubmit($event)">
      <!-- Field Code -->
      <div class="form-group row">
        <label for="inputCode" class="col-sm-2 col-form-label">Code</label>
        <div class="col-sm-10">
          <input
            type="text"
            class="form-control"
            id="inputCode"
            v-model="channel.code"
            placeholder="Code"
          />
          <span v-if="channel.error" class="text-danger">{{ messages.errors.code }}</span>
        </div>
      </div>
      <!-- Field Name -->
      <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
          <input
            type="text"
            class="form-control"
            id="inputName"
            v-model="channel.name"
            placeholder="Name"
          />
          <span v-if="channel.error" class="text-danger">{{ messages.errors.name }}</span>
        </div>
      </div>
      <!-- Field Description -->
      <div class="form-group row">
        <label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
          <input
            type="text"
            class="form-control"
            id="inputDescription"
            v-model="channel.description"
            placeholder="Description"
          />
          <span v-if="channel.error" class="text-danger">{{ messages.errors.description }}</span>
        </div>
      </div>
      <!-- Field Timezone -->
      <div class="form-group row">
        <label for="inputTimezone" class="col-sm-2 col-form-label">Timezone</label>
        <div class="col-sm-10">
          <input
            type="text"
            class="form-control"
            id="inputTimezone"
            v-model="channel.timezone"
            placeholder="Timezone"
          />
          <span v-if="channel.error" class="text-danger">{{ messages.errors.timezone }}</span>
        </div>
      </div>
      <!-- Field Theme -->
      <div class="form-group row">
        <label for="inputTheme" class="col-sm-2 col-form-label">Theme</label>
        <div class="col-sm-10">
          <input
            type="text"
            class="form-control"
            id="inputTheme"
            v-model="channel.theme"
            placeholder="Theme"
          />
          <span v-if="channel.error" class="text-danger">{{ messages.errors.theme }}</span>
        </div>
      </div>
      <!-- Field Hostname -->
      <div class="form-group row">
        <label for="inputHostname" class="col-sm-2 col-form-label">Hostname</label>
        <div class="col-sm-10">
          <input
            type="text"
            class="form-control"
            id="inputHostname"
            v-model="channel.hostname"
            placeholder="Hostname"
          />
          <span v-if="channel.error" class="text-danger">{{ messages.errors.hostname }}</span>
        </div>
      </div>
      <!-- Field Logo -->
      <div class="form-group row">
        <label for="inputLogo" class="col-sm-2 col-form-label">Logo</label>
        <div class="col-sm-10">
          <input
            type="text"
            class="form-control"
            id="inputLogo"
            v-model="channel.logo"
            placeholder="Logo"
          />
          <span v-if="channel.error" class="text-danger">{{ messages.errors.logo }}</span>
        </div>
      </div>
      <!-- Field Favicon -->
      <div class="form-group row">
        <label for="inputFavicon" class="col-sm-2 col-form-label">Favicon</label>
        <div class="col-sm-10">
          <input
            type="text"
            class="form-control"
            id="inputFavicon"
            v-model="channel.favicon"
            placeholder="Favicon"
          />
          <span v-if="channel.error" class="text-danger">{{ messages.errors.favicon }}</span>
        </div>
      </div>
      <!-- Field Home_Page_Content -->
      <div class="form-group row">
        <label for="inputHomePageContent" class="col-sm-2 col-form-label">Home Page</label>
        <div class="col-sm-10">
          <input
            type="text"
            class="form-control"
            id="inputHomePageContent"
            v-model="channel.home_page_content"
            placeholder="home_page_content"
          />
          <span v-if="channel.error" class="text-danger">{{ messages.errors.home_page_content }}</span>
        </div>
      </div>
      <!-- Field Footer_Content -->
      <div class="form-group row">
        <label for="inputFooterContent" class="col-sm-2 col-form-label">Footer</label>
        <div class="col-sm-10">
          <input
            type="text"
            class="form-control"
            id="inputFooterContent"
            v-model="channel.footer_content"
            placeholder="footer_content"
          />
          <span v-if="channel.error" class="text-danger">{{ messages.errors.footer_content }}</span>
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
import api from "../api/channels";

export default {
  data() {
    return {
      channel: {
        code: "",
        name: "",
        description: "",
        timezone: "",
        theme: "",
        hostname: "",
        logo: "",
        favicon: "",
        home_page_content: "",
        footer_content: "",
        error: false
      },
      messages: {
        errors: {
          code: "",
          name: "",
          description: "",
          timezone: "",
          theme: "",
          hostname: "",
          logo: "",
          favicon: "",
          home_page_content: "",
          footer_content: ""
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
        .create(this.channel)
        .then(response => {
          if (response.data) {
            this.$router.push({
              name: "channels.index"
            });
          }
          console.log(response);
        })
        .catch(error => {
          this.channel.error = true;
          this.messages.errors = error.response.data.errors;
        });
    }
  },
  created() {}
};
</script>