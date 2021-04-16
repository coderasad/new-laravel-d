<template>
    <div class="list">
        <div class="container">
            <div class="row">
                <div class="col-6 my-3 offset-3">
                    <form class="card card-body shadow-lg" method="post" @submit.prevent="listSubmit">
                        <h5>Accordion List Form</h5>
                        <div class="form-group">
                            <input v-model="title" :class="{ 'is-invalid' : title === '' && show }" type="text" placeholder="Input Your Title" class="form-control mb-2">
                            <textarea v-model="description" :class="{'is-invalid' : description === '' && show}" class="form-control mb-2" placeholder="Input Your Description..."></textarea>
                            <div class="form-group row">
                                <label for="color" class="col-sm-2 col-form-label">Color : </label>
                                <div class="col-sm-10 mt-2">
                                    <input v-model='color' type="color" class="" id="color" >
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'List',

    data() {
        return {
            title: '',
            description: '',
            color: '',
            show: false
        }
    },

    methods: {
        listSubmit() {
            if(this.title !== '' && this.description !== ''){
                this.$axios.post('blog-create',{
                    title: this.title,
                    description: this.description,
                    color: this.color,
                })
                .then(
                    this.title = '',
                    this.description = '',
                    this.color = '',
                    this.show = false
                );
            }else{
                this.show = true
            }
        },
    },

    mounted() {
        if(!this.$loginUser.user){
            alert('Hello Coder...!!')
            this.$router.push('/')
        }
    }


}
</script>

<style>
ul li {
    cursor: pointer;
}
</style>
