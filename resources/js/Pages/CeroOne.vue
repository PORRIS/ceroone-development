<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import {Head, useForm} from '@inertiajs/vue3';
import LoadingButton from "@/Components/LoadingButton.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {ref} from "vue";

const classmessage = ref('hidden');
const msj = ref('');
const title_msj= ref('');
const classnotification= ref('');
const classbg = ref('');
const syncData = (route)=>{
    classmessage.value = 'block';
    title_msj.value= 'Procesando...';
    classnotification.value = 'text-amber-500';
    msj.value = 'Sincronizando por favor no cierre el navegador...';
    classbg.value = 'bg-amber-500';
    fetch(route)
        .then(response => response.json())
        .then(function(data) {
            title_msj.value= 'Error';
            classnotification.value = 'text-red-500';
            classbg.value = 'bg-red-500';
            msj.value = data.message;
            if(data.status){
                title_msj.value= 'Exito';
                classnotification.value = 'text-green-500';
                classbg.value = 'bg-green-500';
            }
            classmessage.value = 'block';
            setTimeout(() => {
                classmessage.value = 'hidden';
            }, 10000);
        });
}
</script>

<template>
    <Head title="Inicio" />
    <MainLayout>
        <template #header>
            Sincronizar Datos Holded
        </template>
        <div class="p-4 bg-white rounded-lg shadow-xs text-center">
            <p>Por favor sincronizar datos de Cuentas con API Holded</p>
            <PrimaryButton @click="syncData('/synchronize/accounts')">Sincronizar Cuentas</PrimaryButton>
        </div>

        <div class="p-4 bg-white rounded-lg shadow-xs text-center">
            <p>Por favor sincronizar datos de Facturas con API Holded</p>
            <PrimaryButton @click="syncData('/synchronize/invoices')">Sincronizar Facturas</PrimaryButton>
        </div>

        <div class="p-4 bg-white rounded-lg shadow-xs text-center">
            <p>Por favor sincronizar datos de Contato con API Holded</p>
             <PrimaryButton @click="syncData('/synchronize/contacts')">Sincronizar Contactos</PrimaryButton>
            <div class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md" :class="classmessage">
                <div class="flex justify-center items-center w-12 " :class="classbg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6  text-white ">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                    </svg>

                </div>
                <div class="px-4 py-2 -mx-3">
                    <div class="mx-3">
                        <span class="font-semibold " :class="classnotification">{{ title_msj }}</span>
                        <p class="text-sm text-gray-600">{{msj}}</p>
                    </div>
                </div>
            </div>
        </div>


    </MainLayout>

</template>
