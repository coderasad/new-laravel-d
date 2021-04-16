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
                                    {{ blog.title }}<span v-if="show2 === 1">Test show</span>
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
            blogs: [],
            bgColor: '',
            test: 'accordion-button:not(.collapsed)',
            show: true,
            show2: 0,
            className: '',
            ami: ''
        }
    },

    methods: {
        handleClass(index) {
            this.className = 'test' + index
            this.show = false
            // this.show2 = 1
            if(this.show2 === 1){
                this.show2 = 0
            }else{
                this.show2 = 1
            }
            this.ami = this.className+this.show2
            console.log('show2', this.ami)
        }
    },

    mounted() {
        this.$axios.get('/blog-show')
            .then(response => (this.blogs = response.data.blog));

    }
}
</script>

<style>
.accordion-button:focus {

}

.accordion-button:not(.collapsed) {
    background: #fff;
}
</style>
