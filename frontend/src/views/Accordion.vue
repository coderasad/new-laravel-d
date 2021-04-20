<template>
    <div class="Accordion">
        <div class="container">
            <div class="row">

                <div class="col-12">
                    <div class="accordion" id="accordionExample">

                        <div v-for="(blog, index) in blogs" :key="index" class="accordion-item">
                            <h2 class="accordion-header" :id="'headingOne' + blog.id">
                                <button @click="handleClass(blog.id)" class="accordion-button" type="button"
                                        :style="['test' + blog.id === className ? {background:blog.color}: '', index === 0 && show ? {background:blog.color}: '']"
                                        data-bs-toggle="collapse"
                                        :data-bs-target="'#collapseOne'  + blog.id" aria-expanded="true"
                                        :aria-controls="'collapseOne'  + blog.id">
                                    {{ blog.title }}
                                </button>
                            </h2>
                            <div :id="'collapseOne' + blog.id" class="accordion-collapse collapse"
                                 :class="{show : index === 0 }"
                                 :aria-labelledby="'headingOne' + blog.id"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    {{ blog.description }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Accordion',


    data() {
        return {
            blogs    : [],
            bgColor  : '',
            show     : true,
            className: '',
        }
    },

    methods: {
        handleClass(index) {
            this.className = 'test' + index
            this.show      = false
        }
    },

    mounted() {
        this.$axios.get('/blog-show')
            .then(response => (this.blogs = response.data.blog));

        if(localStorage.getItem('user')){
            this.loginUser = (JSON.parse(localStorage.getItem('user')));
            if(this.loginUser.user == ""){
                this.$router.push('/login');
            }
        }
        // if (!this.$loginUser.user) {
        //     this.$router.push('/login')
        // }
    }
}
</script>

<style>

.accordion-button:not(.collapsed) {
    background: #fff;
}
</style>
