<template>
    <div class="h-screen bg-gray-50 flex w-full gap-4">
        <Navigation />
        <main @drop.prevent="handleDrop"
              @dragover.prevent="onDragover"
              @dragleave.prevent="onDragLeave"
            class="flex flex-col flex-1 px-4 overflow-hidden"
            :class="dragOver ? 'dropzone' : ''"
        >
            <template v-if="dragOver" class="text-gray-500 text-center py-8 text-sm">
                Drop Files Here To Upload!
            </template>
            <template v-else>
                <div class="flex items-center justify-between w-full">
                    <SearchForm />
                    <UserSettingsDropDown />
                </div>
                <div class="flex-1 flex flex-col overflow-hidden">
                    <slot />
                </div>
            </template>
        </main>
    </div>
</template>

<script setup>
// Imports
import Navigation from '@/Components/app/Navigation.vue';
import SearchForm from '@/Components/app/SearchForm.vue';
import UserSettingsDropDown from '@/Components/app/UserSettingsDropDown.vue';
import { FILE_UPLOAD_STARTED, emitter } from '@/event-bus';
import {handleError, onMounted, ref} from "vue";

// Uses

// Refs
const dragOver = ref(false);

// Props & Emit

// Computed

// Methods
function handleDrop(event) {
    dragOver.value = false;
    const files = event.dataTransfer.files;
    console.log(files);

    if (!files.length) {
        return;
    }
    uploadFiles(files);
}

function onDragover() {
    dragOver.value = true;
}

function onDragLeave() {
    dragOver.value = false;
}

function uploadFiles(files) {
    console.log(files);
}

// Hooks
onMounted( () => {
    emitter.on(FILE_UPLOAD_STARTED, uploadFiles);
});

</script>

<style scoped>
    .dropzone {
        width: 100%;
        height: 100%;
        color: #8d8d8d;
        border: 2px dotted gray;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>