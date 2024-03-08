<template>
    <MenuItem v-slot="{ active }" class="text-gray-700 block px-4 py-2 text-sm relative"
                    >
        <a href="javascript:void(0);" class="text-gray-700 block px-4 py-2 text-sm">
            Upload Files
            <input @change="onChange" 
                type="file" 
                class="absolute left-0 top-0 bottom-0 right-0 cursor-pointer opacity-0"
                multiple
            >
        </a>
    </MenuItem>
</template>
  
<script setup>
// Importsbottom-0 right-0 cursor-pointer
import { MenuItem } from '@headlessui/vue';
import { FILE_UPLOAD_STARTED, emitter } from '@/event-bus.js';

// Uses

// Refs

// Props & Emit

// Computed

// Methods
function onChange(event) {
    emitter.emit(FILE_UPLOAD_STARTED, event.target.files);
}

// Hooks

</script>
<style lang="" scoped>
    
</style>