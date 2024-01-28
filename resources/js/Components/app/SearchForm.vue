<template lang="">
    <form class="w-[600px] h-[80px] flex items-center">
        <TextInput type="text" 
                   class="block w-full mr-2" 
                   v-model="form.search" 
                   autocomplete 
                   placeholder="Search For Files and Folders" 
        />
    </form>
</template>
<script setup>
// Imports
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';

// Uses
const form = useForm({
    search: ''
});

// Refs

// Props & Emit

// Computed

// Methods

// Hooks

</script>
<style lang="" scoped>
    
</style>