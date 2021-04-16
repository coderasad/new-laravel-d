<template>
  <div class="home">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <span v-if="show" class="bg-warning d-block display-5 p-3 text-center">Please Create list</span>
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
            show : true
        }
    },

    mounted() {
        this.show = !!this.$loginUser.user;
    }

}
</script>
