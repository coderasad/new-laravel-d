<template>
    <h1>This is heading</h1>
</template>

<script>
export default {
    name: "test",

    data(){
        return{
            testData : 'asda'
        }
    },
    mounted() {
        console.log(this.$parent.showLoginButton)
    }
}
</script>

<style scoped>

</style>
