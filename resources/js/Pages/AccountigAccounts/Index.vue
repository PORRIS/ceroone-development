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
import DataTablesCore from 'datatables.net-bs5'
DataTable.use(DataTablesCore);
import { Head, useForm } from '@inertiajs/vue3';
import {ref} from  'vue';

const columnsInvoices = [
    { name: 'id', title:'id',searchable: false, orderable: false, visible: false },
    { name: 'name', title:'Nombre', searchable: true, orderable: false, visible: true  },
    { name: 'type', title:'Tipo',  searchable: true, orderable: false, visible: true   },
    { name: 'accountNumber', title:'Cuenta',  searchable: true, orderable: false, visible: true   },
    { name: 'id', title:'',searchable: false, orderable: false, visible: true },
    { name: 'id', title:'',searchable: false, orderable: false, visible: true },
    { name: 'id', title:'',searchable: false, orderable: false, visible: true },
    { name: 'balance', title:'',  searchable: false, orderable: false, visible: false   },
    { name: 'iban', title:'',  searchable: false, orderable: false, visible: false   },
    { name: 'swift', title:'',  searchable: false, orderable: false, visible: false   }

];


const v = ref({id:'',name:'',type:'',accountNumber:'',balance:'',iban:'',swift:''});

const props = defineProps({
    accounts: {
        type: Object
    }
});

const form = useForm({
    id:'',name:'',type:'',accountNumber:'',balance:'',iban:'',swift:''
});

const filterInputs = useForm({
    acount1:'',
    acount2:''
});


const showModalInvoiceView = ref(false);
const showModalForm = ref(false);
const showModalDelete = ref(false);

const title = ref('');
const operation = ref(1);
const message = ref('');
const msj = ref('');
const classmessage = ref('hidden');

const openModalInvoicesView = (contact) => {
    v.value.id = contact[0];
    v.value.name = contact[1];
    v.value.type = contact[2];
    v.value.accountNumber = contact[3];
    v.value.balance =  contact[7];
    v.value.iban =  contact[8];
    v.value.swift =  contact[9];
    showModalInvoiceView.value = true;
}
const openModalDelete = (contact) => {
    showModalDelete.value = true;
    v.value.id = contact[0];
    v.value.name =  contact[1];
}
const openModalForm = (option,contact) => {
    showModalForm.value = true;
    operation.value = option;
    if(option === 1){
        title.value = 'Crear Cuenta';
    }else{
        title.value = 'Editar Cuenta';
        form.name =  contact[1];
        form.type =   contact[2];
        form.accountNumber = contact[3];
        form.balance = contact[7];
        form.iban = contact[8];
        form.swift = contact[9];
        v.value.id = contact[0];
    }
}

const closeModalView = () => {
    showModalInvoiceView.value = false;
}
const closeModalDelete = () => {
    showModalDelete.value = false;
}
const closeModalForm = () => {
    showModalForm.value = false;
    form.reset();
}

let dt1;
const inputtable3 = ref()
const filter = (option)=>{
    dt1 = inputtable3.value.dt;
    if(option === 1){
        dt1.ajax.url('/datatable/accounts/'+filterInputs.acount1+'/'+filterInputs.acount2).load();
    }else{
        filterInputs.reset();
        dt1.ajax.url('/datatable/accounts').load();
    }
}

const save = ()=>{
    //operacion de nuevo registro = 1
    if(operation.value === 1){
        form.post(route('accounts.store'),{
            onSuccess: () =>{ok('Contacto Creado')}
        });
    }else{
        //operacion actualizar
        form.put(route('accounts.update',v.value.id),{
            onSuccess: () =>{ok('Contacto Actualizado')}
        });
    }


}

const ok = (message)=>{
    closeModalForm();
    closeModalDelete();
    filter(2);
    form.reset();
    msj.value = message;
    classmessage.value = 'block';
    setTimeout(() => {
        classmessage.value = 'hidden';
    }, 5000);
}

const deleteInvoice = () =>{
    form.delete(route('accounts.destroy',v.value.id),{
        onSuccess: () =>{
            ok('Factura Eliminada')
        }
    })

}
const getLanguageSettings =() =>{
    return {
        search: 'Buscar',
        lengthMenu: 'Mostrar _MENU_ registros',
        loadingRecords: 'Cargando...',
        zeroRecords: 'No se encontraron resultados',
        infoFiltered: '(filtrado de un total de _MAX_ registros) ',
        infoEmpty: 'Mostrando registros del 0 al 0 de un total de 0 registros. ',
        emptyTable: 'Ningún dato disponible en esta tabla',
        info: 'Mostrando <b>_START_ a _END_</b> de _TOTAL_ registros. ',
        select: {
            rows: {
                _: "Tienes seleccionadas %d filas",
                0: "<b>Click</b> en una fila para seleccionarla",
                1: "1 fila seleccionada"
            }
        }
    };
}

const options = {
    responsive: true,
    select: true,
    processing: true,
    serverSide: true,
    autoWidth: false,
    scrollX: true,
    destroy: true,
    scrollCollapse: true,
    iDisplayLength: 10,
    deferRender: true,
    language: getLanguageSettings(),
}
const boxes = document.getElementsByTagName("div");
boxes[0].classList.remove("dt-input");
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
        <div class="p-6 ">

            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-5 group">

                    <SecondaryButton @click="filter(1)">Filtra</SecondaryButton>
                    <input class="ml-1 form-input"   v-model="filterInputs.acount1" placeholder="número de cuenta 1">
                    <input class="ml-1 form-input"  v-model="filterInputs.acount2" placeholder="número de cuenta 2">
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <SecondaryButton @click="filter(2)">Limpiar Filtro</SecondaryButton>
                </div>
            </div>
        </div>

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
                    <DataTable :columns="columnsInvoices"    :options="options"  class="display nowrap"
                               ajax="/datatable/accounts" ref="inputtable3"  id="datatable3">

                        <template #column-4="props">
                            <SecondaryButton @click="openModalInvoicesView(props.rowData)">Ver</SecondaryButton>
                        </template>
                        <template #column-5="props">
                            <WarningButton  @click="openModalForm(2,props.rowData)">Editar</WarningButton>
                        </template>
                        <template #column-6="props">
                            <DangerButton @click="openModalDelete(props.rowData)">Eliminar</DangerButton>
                        </template>

                    </DataTable>
                </div>
            </div>
        </div>

        <modal :show="showModalInvoiceView" @close="closeModalView" >
            <div class="p-6 ">

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <p>Nombre: <span class="text-lg font-medium text-gray-900">{{v.name}} </span></p>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <p>Tip: <span class="text-lg font-medium text-gray-900">{{v.type}}</span></p>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <p>Numero Cuenta: <span class="text-lg font-medium text-gray-900">{{v.accountNumber}} </span></p>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <p>Balance: <span class="text-lg font-medium text-gray-900">{{v.balance}}</span></p>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <p>Numero iban: <span class="text-lg font-medium text-gray-900">{{v.iban}} </span></p>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <p>Swift: <span class="text-lg font-medium text-gray-900">{{v.swift}}</span></p>
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
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" />
                        </svg>
                    </InputGroup>
                    <InputError class="mt-1" :message="form.errors.name"></InputError>

                    <InputGroup :text="'Tipo'" :required="'required'" v-model="form.type" :type="'text'">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>

                    </InputGroup>
                    <InputError class="mt-1" :message="form.errors.type"></InputError>

                    <InputGroup :text="'Numero Cuenta'" :required="'required'" v-model="form.accountNumber" :type="'text'">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                        </svg>

                    </InputGroup>
                    <InputError class="mt-1" :message="form.errors.accountNumber"></InputError>

                    <InputGroup :text="'Balance'" :required="'required'" v-model="form.balance" :type="'text'">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                        </svg>

                    </InputGroup>
                    <InputError class="mt-1" :message="form.errors.balance"></InputError>

                    <InputGroup :text="'Iban'" :required="'required'" v-model="form.iban" :type="'text'">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m6.75 7.5 3 2.25-3 2.25m4.5 0h3m-9 8.25h13.5A2.25 2.25 0 0 0 21 18V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v12a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>
                    </InputGroup>
                    <InputError class="mt-1" :message="form.errors.iban"></InputError>

                    <InputGroup :text="'Swift'" :required="'required'" v-model="form.swift" :type="'text'">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>
                    </InputGroup>
                    <InputError class="mt-1" :message="form.errors.swift"></InputError>



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
                    Seguro desea elimiar la Factura
                    <span class="text-2xl font-medium text-gray-900">{{v.name}} </span>? </p>
                <PrimaryButton @click="deleteInvoice">Si, Eliminar</PrimaryButton>
            </div>
            <div class="m-6 flex justify-end">
                <SecondaryButton @click="closeModalDelete">Cancelar</SecondaryButton>
            </div>
        </modal>

    </MainLayout>
</template>
<style>
@import 'datatables.net-dt';
div.dt-container select.dt-input {
    width:16%;
}
</style>


