<template>
    <div class="app">
        <div >
            <div class="row flex-nowrap">
                <Sidebar /> 
                <router-view />
            </div>
        </div>
    </div>
</template>

<script setup>
import Sidebar from "../js/components/Sidebar.vue";
</script>

<style lang="scss"></style>
