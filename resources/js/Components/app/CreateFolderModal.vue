<template lang="">
    <modal :show="modelValue" @show="onShow" max-width="sm">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900"> 
                Create New Folder
            </h2>
            <div class="mt-6">
                <InputLabel for="FolderName" value="Folder Name"></InputLabel>
                <TextInput 
                    type="text" 
                    ref="folderNameInput"
                    id="FolderName" 
                    v-model="form.name" 
                    name="name"
                    class="mt-1 block w-full"
                    :class="form.errors.name ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : ''"
                    placeholder="Folder Name" 
                    @keyup.enter="createFolder"
                >
                </TextInput>
                <InputError :message="form.errors.name" class="mt-2"></InputError>
            </div>
            <div class="mt-6 flex justify-end">
                <SecondaryButton @click="closeModal">Cancle</SecondaryButton>
                <PrimaryButton class="ml-3" :class="{ 'opacity-25': form.processing }" @click="createFolder" :disable="form.processing">Submit</PrimaryButton>
            </div>
        </div>
    </modal>
</template>

<script setup>
// Imports
import Modal from '@/Components/Modal.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, usePage } from '@inertiajs/vue3';
import { ref,nextTick } from "vue";

// Uses
const form = useForm({   
    'name': '' ,
    'parent_id' : null
});
const page = usePage();

// Refs
const folderNameInput = ref(null);

// Props & Emit
const {modelValue} = defineProps({
    modelValue: Boolean
});

const emit = defineEmits([
    'update:modelValue'
]);

// Computed

// Methods
function onShow() { 
    nextTick(() => folderNameInput.value.focus());
}

function createFolder() {
    form.parent_id = page.props.folder.data.id;
    console.log(form.parent_id);
    form.post(route('folder.create'), {
        preserveScroll: true,
        onSuccess: () => {
            closeModal();
            form.reset();
            // Show Success Notification
        },
        onError: () => folderNameInput.value.focus()
        
    });
    console.log('createFolder');
}

function closeModal() {
    emit('update:modelValue');
    form.clearErrors();
    form.reset();
    console.log('closeModal');
}

// Hooks

</script>
<style lang="" scoped>
    
</style>