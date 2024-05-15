<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import DangerButton from '@/Components/DangerButton.vue';
import InputError from '@/Components/InputError.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import WarningButton from '@/Components/WarningButton.vue';
import DarkButton from '@/Components/DarkButton.vue';
import InputGroup from "@/Components/InputGroup.vue";
import SelectInput from "@/Components/SelectInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import DataTable from 'datatables.net-vue3';
import DataTablesCore from 'datatables.net'
import 'datatables.net-select';
import 'datatables.net-responsive';
DataTable.use(DataTablesCore);

const columns = [
    { data: 'name', title: 'name' },
    { data: 'email', title: 'email' }
];

import { Head, useForm } from '@inertiajs/vue3';
import {ref} from  'vue';


const v = ref({id:'',name:'',email:'',clientRecord:[],billCountryCode:''});

const props = defineProps({
    contacts: {
        type: Object
    },
    countries:{
        type: Object
    }
});

const form = useForm({
    id:'',
    name:'',
    email:'',
    billCountryCode:''
});


const showModalView = ref(false);
const showModalForm = ref(false);
const showModalDelete = ref(false);

const title = ref('');
const operation = ref(1);
const message = ref('');
const msj = ref('');
const classmessage = ref('hidden');

const openModalView = (contact) => {
    v.value.id = contact.id;
    v.value.name = contact.name;
    v.value.email = contact.email;
    v.value.clientRecord = contact.clientRecord;

    showModalView.value = true;
}
const openModalDelete = (contact) => {
    showModalDelete.value = true;
    v.value.id = contact.id;
    v.value.name = contact.name;
}
const openModalForm = (option,contact) => {
    showModalForm.value = true;
    operation.value = option;
    if(option === 1){
        title.value = 'Crear Contacto';
    }else{
        title.value = 'Editar Contacto';
        form.name =  contact.name;
        form.email =  contact.email;
        form.billCountryCode = contact.billCountryCode;
        v.value.id = contact.id;
    }
}

const closeModalView = () => {
    showModalView.value = false;
}
const closeModalDelete = () => {
    showModalDelete.value = false;
}
const closeModalForm = () => {
    showModalForm.value = false;
    form.reset();
}

const transformData = (string) => {
    let json = JSON.parse(string);
    let res = {};
    for (let key in json) {
        res[namesContact[key]] = json[key];
    }
    return res;
}

const save = ()=>{
    //operacion de nuevo registro = 1
    if(operation.value === 1){
        form.post(route('contacts.store'),{
            onSuccess: () =>{ok('Contacto Creado')}
        });
    }else{
        //operacion actualizar
        form.put(route('contacts.update',v.value.id),{
            onSuccess: () =>{ok('Contacto Actualizado')}
        });
    }

}

const ok = (message)=>{
    closeModalForm();
    closeModalDelete();
    form.reset();
    msj.value = message;
    classmessage.value = 'block';
    setTimeout(() => {
        classmessage.value = 'hidden';
    }, 5000);
}

const deleteContact = () =>{
    form.delete(route('contacts.destroy',v.value.id),{
        onSuccess: () =>{
            ok('Contacto Eliminado')
        }
    })

}


const namesContact =   {
    "num": "Numero",
    "name": "Nombre",
    "salesChannel": "canal de ventas",
    "expensesAccount": "cuenta de gastos",
    "dueDays": "Días Vencidos",
    "paymentDay": "Dia de pago",
    "paymentMethod": "Método de pago",
    "discount": "Descuento",
    "language": "Idioma",
    "currency":"Divisa",
    "salesTax": "Impuesto",
    "purchasesTax":"impuesto de compra",
    "accumulateInForm347":"Acumular modelo 347",
    "website":"Sitio web",
    "job": "Trabajo",
    "phone":"Telefono",
    "email":"Correo",
    "sendDocuments":"Enviar Archivo",
    "address":"Direccion",
    "city": "Ciudad",
    "postalCode": "Codigo Postal",
    "province": "Provincia",
    "country": "Pais",
    "countryCode": "Pais Codigo",
    "notes": "Notas",
    "privateNotes": "nota privada"
}


</script>

<template>
    <Head title="Facturas" />

    <MainLayout>
        <template #header>
            Facturas
            <DarkButton @click="openModalForm(1)">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                </svg>
            </DarkButton>
        </template>

        <div class="p-4 bg-white rounded-lg shadow-xs">

            <div class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md" :class="classmessage">
                <div class="flex justify-center items-center w-12 bg-green-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6  text-white ">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                    </svg>

                </div>

                <div class="px-4 py-2 -mx-3">
                    <div class="mx-3">
                        <span class="font-semibold text-green-500">Exito</span>
                        <p class="text-sm text-gray-600">{{msj}}</p>
                    </div>
                </div>
            </div>

            <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
                <div class="overflow-x-auto w-full">

                    <DataTable  class="display"   width="100%">
                        <thead>
                        <tr>
                            <th>A</th>
                            <th>B</th>
                        </tr>
                        </thead>
                    </DataTable>
                    <DataTable :columns="columns" class="w-full whitespace-no-wrap" ajax="/datatable/contacts">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>

                        </tr>
                        </thead>
                    </DataTable>
                </div>
                <div
                    class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase bg-gray-50 border-t sm:grid-cols-9">
                    <pagination :links="contacts.links" />
                </div>
            </div>
        </div>

        <modal :show="showModalView" @close="closeModalView" >
            <div class="p-6 ">

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <p>Nombre: <span class="text-lg font-medium text-gray-900">{{v.name}} </span></p>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <p>Correo: <span class="text-lg font-medium text-gray-900">{{v.email}}</span></p>
                    </div>
                </div>
                <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-2">
                    <div class="flex items-center  bg-white rounded-lg shadow-xs ">
                        <div>
                            <p class="mb-2 font-medium text-gray-600 dark:text-gray-400">
                                Extra:
                            </p>
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                <ol>
                                    <li class="text-lg font-medium text-gray-900" v-for="(e,k) in transformData(v.clientRecord)">
                                        {{(k)+': '+e}}
                                    </li>
                                </ol>
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center bg-white rounded-lg shadow-xs ">
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                Extra:
                            </p>
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                <ol>
                                    <li class="text-lg font-medium text-gray-900" v-for="(e,k) in transformData(v.clientRecord)">
                                        {{(k)+': '+e}}
                                    </li>
                                </ol>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="m-6 flex justify-end">
                <SecondaryButton @click="closeModalView">Cancelar</SecondaryButton>
            </div>
        </modal>

        <modal :show="showModalForm" @close="closeModalForm">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">{{title}}</h2>
                <div class="mt-6 mb-6 space-y-2 max-w-xl">
                    <InputGroup :text="'Nombre'" :required="'required'" v-model="form.name" :type="'text'">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </InputGroup>
                    <InputError class="mt-1" :message="form.errors.name"></InputError>

                    <InputGroup :text="'Correo'" :required="'required'" v-model="form.email" :type="'text'">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 1 0-2.636 6.364M16.5 12V8.25" />
                        </svg>
                    </InputGroup>
                    <InputError class="mt-1" :message="form.errors.email"></InputError>

                    <SelectInput :text="'Pais'" :required="'required'" v-model="form.billCountryCode" :options="countries">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5" />
                        </svg>
                    </SelectInput>
                    <InputError class="mt-1" :message="form.errors.billCountryCode"></InputError>

                    <PrimaryButton @click="save">Guardar</PrimaryButton>
                </div>

            </div>
            <div class="m-6 flex justify-end">
                <SecondaryButton @click="closeModalForm">Cancelar</SecondaryButton>
            </div>
        </modal>

        <modal :show="showModalDelete" @close="closeModalDelete">
            <div class="p-6">
                <p class="text-2xl text-gray-500">
                    Seguro desea elimiar el contacto
                    <span class="text-2xl font-medium text-gray-900">{{v.name}} </span>? </p>
                <PrimaryButton @click="deleteContact">Si, Eliminar</PrimaryButton>
            </div>
            <div class="m-6 flex justify-end">
                <SecondaryButton @click="closeModalDelete">Cancelar</SecondaryButton>
            </div>
        </modal>

    </MainLayout>
</template>
<style>
@import 'datatables.net-dt';
</style>

