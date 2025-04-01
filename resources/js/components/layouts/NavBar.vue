<template>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <Link class="navbar-brand"
        href="/">
        <i class="fas fa-home"></i>
    </Link>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <Link class="nav-link"
                href="/contacts/add">
                <i class="fas fa-user-plus"></i>
            </Link>
        </li>
        
        </ul>
    </div>
    </nav>
    </template>

<script setup>
    import { Link } from '@inertiajs/vue3';
</script>

<style scoped>
</style>
