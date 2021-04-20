<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="bg-secondary navbar navbar-dark navbar-expand-sm ps-4">
                    <a class="navbar-brand" href="#">Logo</a>
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <router-link to="/" class="nav-link">Home</router-link>
                        </li>
                        <li v-if="showLoginButton===false" class="nav-item">
                            <router-link to="/list" class="nav-link">List</router-link>
                        </li>
                        <li v-if="showLoginButton===false" class="nav-item">
                            <router-link to="/accordion" class="nav-link">Accordion</router-link>
                        </li>
                    </ul>

                    <ul v-if="showLoginButton" class="navbar-nav ms-auto me-4">
                        <li class="nav-item active">
                            <router-link to="/login" class="nav-link">Login</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/register" class="nav-link">Register</router-link>
                        </li>
                    </ul>

                    <ul v-else class="navbar-nav ms-auto me-4">
                        <li class="nav-item active">
                            <a href="" @click.prevent="logOut" class="nav-link">Log Out</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "NavBar",
    data() {
        return {
            showLoginButton: true,
            loginUser:{}
        }
    },
    methods: {
        logOut() {
            localStorage.removeItem('user');
            this.$router.push('/login');
            this.showLoginButton = true;
        }
    },
    mounted() {
        if(localStorage.getItem('user')){
            this.loginUser = (JSON.parse(localStorage.getItem('user')));
            if(this.loginUser.user !== ""){
                this.showLoginButton = false
            }else{
                this.showLoginButton = true
            }
        }

        // this.showLoginButton = !this.$loginUser.user;
    }
}
</script>
