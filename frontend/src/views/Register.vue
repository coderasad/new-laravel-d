<template>
  <div class="Register">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">Register</div>

            <div class="card-body">
              <form @submit.prevent="handleSubmit()">

                <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                  <div class="col-md-6">
                    <input id="name" type="text" class="form-control mb-3" v-model="fullName">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                  <div class="col-md-6">
                    <input id="email" type="email" class="form-control mb-3" v-model="email" >
                  </div>
                </div>

                <div class="form-group row">
                  <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                  <div class="col-md-6">
                    <input id="password" type="password" class="form-control mb-3" v-model="password">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                  <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control mb-3" v-model="password_confirm">
                  </div>
                </div>

                <div class="form-group row mb-0">
                  <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                      Register
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Register',

  data(){
    return{
      fullName: '',
      email: '',
      password: '',
      password_confirm: ''
    }
  },
  methods:{
    handleSubmit(){
      this.$axios.post('register', {
          name: this.fullName,
          email: this.email,
          password: this.password,
          password_confirmation: this.password_confirm,
      })
      .then(
        this.$router.push('/login')
      )
      .catch(error => {
        alert(error.response.data.message)
      });
    },


  }

}
</script>
