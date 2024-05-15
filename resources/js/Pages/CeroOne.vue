<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import {Head, useForm} from '@inertiajs/vue3';
import LoadingButton from "@/Components/LoadingButton.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {ref} from "vue";


const isLoading = ref(false);

function onSubmit() {
    isLoading.value = true;
    setTimeout(() => isLoading.value = false, 1000);
}


const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
});
</script>

<template>
    <Head title="Inicio" />
    <MainLayout>
        <template #header>
            Sincronizar Datos Holded
        </template>

        <div class="p-4 bg-white rounded-lg shadow-xs text-center">
            <p>Por favor sincronizar datos con API Holded</p>
             <PrimaryButton :disabled="form.processing">Sincronizar</PrimaryButton>
            <form @submit.prevent="onSubmit">
                <LoadingButton :is-loading="isLoading" class="text-white bg-rose-600 hover:bg-rose-600/80">
                    Save changes
                </LoadingButton>
            </form>
        </div>

      
    </MainLayout>

</template>
