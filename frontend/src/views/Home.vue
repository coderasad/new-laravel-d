<template>
  <div class="home">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <span v-if="loginContent" class="bg-warning d-block display-5 p-3 text-center">Please Create list</span>
          <span v-else class="bg-warning d-block display-5 p-3 text-center">Login first then make a list </span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    name: 'Home',
    data(){
        return{
            loginContent: false,
            loginUser:{},
            set token(value) {
                localStorage.setItem('token', value);
            }
        }
    },

    mounted() {
        if(localStorage.getItem('user')){
            this.loginUser = (JSON.parse(localStorage.getItem('user')));
            if(this.loginUser.user !== ""){
                this.loginContent = true
            }else{
                this.showLoginButton = false
            }
        }
    }

}
</script>
