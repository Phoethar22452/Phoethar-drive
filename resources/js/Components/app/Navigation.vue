<template lang="">
    <nav class="min-w-[200px]">
        <Link :href="route('myFiles')" class="h-[80px] px-3 flex items-center gap-3">
            <ApplicationLogo
                class="block h-9 w-auto fill-current text-gray-800"
            /> 
            PT-LaraStorage
        </Link>
        <div class="px-3">
            <CreateNewDropDown />

            <div class="py-3">
                <NavLink :href="route('myFiles')" :active="$page.url == '/my-files'">My Files</NavLink>
                <NavLink href="#">Shared With Me</NavLink>
                <NavLink href="#">Sharerd By Me</NavLink>
                <NavLink href="#">Trash</NavLink>
            </div>
        </div>
    </nav>
</template>

<script setup>
// Imports
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import CreateNewDropDown from '@/Components/app/CreateNewDropDown.vue';
import { Link } from '@inertiajs/vue3';
import NavLink from '@/Components/NavLink.vue';

</script>
<style lang="" scoped>

</style>