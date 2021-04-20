<template>
    <div class="Login">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">Login</div>

                        <div class="card-body">
                            <form @submit.prevent="handleLogin()">
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail
                                        Address</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control mb-3" v-model="email">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control mb-3"
                                               v-model="password">
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Login
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
import axios from "axios";

export default {
    name: 'Login',
    data() {
        return {
            email        : '',
            password     : '',
            loginErrorMsg: null,
            loginUser:{}
        }
    },

    methods: {
        handleLogin() {
            axios.post('login', {
                email   : this.email,
                password: this.password
            }).then(response => {
                this.loginErrorMsg = response.data.message;
                if (!this.loginErrorMsg) {
                    localStorage.setItem('user', JSON.stringify(response.data));
                    this.$router.push('/');
                    this.$parent.$refs.navBar.showLoginButton = false;
                }
            }).catch(error => {
                console.error(error);
            }).finally(() => {});
        }
    },
    mounted() {
        if(localStorage.getItem('user')){
            this.loginUser = (JSON.parse(localStorage.getItem('user')));
            if(this.loginUser.user !== ""){
                this.$router.push('/');
            }
        }
    }

}
</script>
