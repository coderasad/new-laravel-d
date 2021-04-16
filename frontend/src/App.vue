<template>
  <div id="app">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="bg-secondary navbar navbar-dark navbar-expand-sm ps-4">
            <a class="navbar-brand" href="#">Logo</a>
            <ul class="navbar-nav">
              <li class="nav-item active">
                  <router-link to="/" class="nav-link">Home</router-link>
              </li>
              <li v-if="hide" class="nav-item">
                  <router-link to="/list" class="nav-link">List</router-link>
              </li>
              <li v-if="hide" class="nav-item">
                  <router-link to="/accordion" class="nav-link">Accordion</router-link>
              </li>
            </ul>

            <ul v-if="show" class="navbar-nav ms-auto me-4">
              <li class="nav-item active">
                <router-link to="/login" class="nav-link">Login</router-link>
              </li>
              <li class="nav-item">
                <router-link to="/register" class="nav-link">Register</router-link>
              </li>
            </ul>

            <ul v-else class="navbar-nav ms-auto me-4">
              <li class="nav-item active">
                <a href="" @click="logOut" class="nav-link">Log Out</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
    <router-view/>
  </div>
</template>

<script>
  export default {
    data() {
      return {
          show: true,
          hide: false

      }
    },
    methods: {
      logOut() {
          localStorage.removeItem('user');
          this.$router.push('/login');
          this.show = true;
          this.hide = false
      }
    },
    mounted() {
        if(this.$loginUser.user){
            this.show = false;
            this.hide = true
        }else{
            this.show = true;
            this.hide = false
        }
    }


  }
</script>

