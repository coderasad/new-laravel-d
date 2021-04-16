<template>
    <div class="list-old">
        <div class="container">
            <div class="row">
                <div class="col-6 my-3 offset-3">
                    <form class="card card-body shadow-lg" method="post" @submit.prevent="listSubmit">
                        <h5>List Form</h5>
                        <input v-model="inputData" type="text" placeholder="Input Your Item" class="form-control">
                        <select v-model="inputColor" name="" id="" class="form-control mt-3">
                            <option value="">--Select Color--</option>
                            <option value="bg-danger">Red</option>
                            <option value="bg-success">Green</option>
                            <option value="bg-warning">Yellow</option>
                        </select>
                        <button type="submit" class="btn btn-success mt-3">Submit</button>
                    </form>
                </div>
                <div class="col-6"></div>
                <div class="col-6">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center"
                            :class="list.bgColor" v-for=" (list, index ) in lists" :key="index">
                            <span class="w-100" @click="listAdd(list.listName, list.bgColor)">{{ list.listName }}</span>
                            <span @click="removeList(index)" class="badge badge-primary badge-pill">X</span>
                        </li>
                    </ul>
                </div>
                <div class="col-6">
                    <ul class="list-group">
                        <li v-if="show" class="list-group-item" :class="showColor">{{ showData }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'List-old',

    data() {
        return {
            lists: [],
            showData: '',
            showColor: '',
            show: false,
            inputData: '',
            inputColor: ''
        }
    },

    methods: {
        listSubmit() {
            if (this.inputData !== '') {
                this.lists.push({
                    'listName': this.inputData,
                    'bgColor': this.inputColor
                })
            } else {
                alert('Field Empty')
            }
            this.inputData = ''
            this.inputColor = ''
        },
        removeList(index) {
            this.lists.splice(index, 1)

        },
        listAdd(index, bgColor) {
            this.show = true
            this.showData = index;
            this.showColor = bgColor;
        }
    }


}
</script>

<style>
ul li {
    cursor: pointer;
}
</style>
