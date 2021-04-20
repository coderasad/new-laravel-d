<template>
    <div id="app">
        <NavBar ref="navBar"></NavBar>
        <router-view/>
    </div>
</template>

<script>

import NavBar from "@/views/NavBar";
export default {
    name : "App",
    components:{
        NavBar
    }
}
</script>

