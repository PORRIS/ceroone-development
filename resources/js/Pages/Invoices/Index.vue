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
    { name: 'contactName', title:'Nombre Contacto', searchable: true, orderable: false, visible: true  },
    { name: 'notes', title:'Notas',  searchable: false, orderable: false, visible: false   },
    { name: 'subtotal', title:'Sub Total',  searchable: true, orderable: false, visible: true   },
    { name: 'total', title:'Total',  searchable: true, orderable: false, visible: true   },
    { name: 'id', title:'',searchable: false, orderable: false, visible: true },
    { name: 'id', title:'',searchable: false, orderable: false, visible: true },
    { name: 'id', title:'',searchable: false, orderable: false, visible: true },
    { name: 'products', title:'',  searchable: false, orderable: false, visible: false   },

];

const v = ref({id:'',contactName:'',notes:'',subtotal:'',total:'',products:[]});

const props = defineProps({
    invoices: {
        type: Object
    }
});

const form = useForm({
    id:'',
    contactName:'',
    notes:'',
    subtotal:'',
    total:''
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
    v.value.contactName = contact[1];
    v.value.notes = contact[2];
    v.value.subtotal =  contact[3];
    v.value.total =  contact[4];
    v.value.products =  contact[8];


    showModalInvoiceView.value = true;
}
const openModalDelete = (contact) => {
    showModalDelete.value = true;
    v.value.id = contact[0];
    v.value.contactName =  contact[1];
}
const openModalForm = (option,contact) => {
    showModalForm.value = true;
    operation.value = option;
    if(option === 1){
        title.value = 'Crear Factura';
    }else{
        title.value = 'Editar Factura';
        form.contactName =  contact[1];
        form.notes =   contact[2];
        form.subtotal = contact[3];
        form.total = contact[4];
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



const save = ()=>{
    //operacion de nuevo registro = 1
    if(operation.value === 1){
        form.post(route('invoices.store'),{
            onSuccess: () =>{ok('Factura Creada')}
        });
    }else{
        //operacion actualizar
        form.put(route('invoices.update',v.value.id),{
            onSuccess: () =>{ok('Factura Actualizada')}
        });
    }

}

let dt1;
const inputtable = ref()
const reloadTable = ()=>{
    dt1 = inputtable.value.dt;
    dt1.ajax.url('/datatable/invoices').load();

}

const ok = (message)=>{
    closeModalForm();
    closeModalDelete();
    form.reset();
    reloadTable();
    msj.value = message;
    classmessage.value = 'block';
    setTimeout(() => {
        classmessage.value = 'hidden';
    }, 5000);
}

const deleteInvoice = () =>{
    form.delete(route('invoices.destroy',v.value.id),{
        onSuccess: () =>{
            ok('Factura Eliminada')
        }
    })

}
const transformContactData = (json) => {
    let res = {};
    for (let key in json) {
        if(key != 'tags')
            res[namesContact[key]] = json[key];
    }
    return res;
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
const namesContact =   {
    "date": "Fecha",
    "amount": "Monto",
    "name": "Nombre",
    "desc": "desc",
    "price": "Precio",
    "units": "Unidades",
    "projectid": "id proyecto",
    "discount": "Descuento",
    "tax": "Impuesto",
    "taxes":"Impuestos",
    "tags": "Tags",
    "retention":"Retención",
    "weight":"peso",
    "costPrice":"precio de coste",
    "sku": "sku",
    "account":"cuenta",
    "productId":"Id del producto",
    "variantId":"ID de variante"
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
                                 ajax="/datatable/invoices" ref="inputtable"  id="datatable2">

                        <template #column-5="props">
                            <SecondaryButton @click="openModalInvoicesView(props.rowData)">Ver</SecondaryButton>
                        </template>
                        <template #column-6="props">
                            <WarningButton  @click="openModalForm(2,props.rowData)">Editar</WarningButton>
                        </template>
                        <template #column-7="props">
                            <DangerButton @click="openModalDelete(props.rowData)">Eliminar</DangerButton>
                        </template>

                    </DataTable>
                </div>
            </div>
        </div>

        <modal :show="showModalInvoiceView" @close="closeModalView" :max-width="100" >
            <div class="p-6 ">
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <p>Nombre: <span class="text-lg font-medium text-gray-900">{{v.contactName}} </span></p>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <p>Nota: <span class="text-lg font-medium text-gray-900">{{v.notes}}</span></p>
                    </div>
                </div>
                <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-2">
                    <div class="flex items-center  bg-white rounded-lg shadow-xs" v-for="(e,k) in  JSON.parse(v.products)">
                        <div>
                            <p class="mb-2 font-medium text-gray-600 dark:text-gray-400">
                                Producto {{k}}:
                            </p>
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                <ol>
                                    <li class="text-lg font-medium text-gray-900" >
                                        <ol>
                                            <li class="text-lg font-medium text-gray-900" v-for="(j,i) in transformContactData(e)">
                                                {{(i)+': '+j}}
                                            </li>
                                        </ol>


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
                    <InputGroup :text="'Nombre'" :required="'required'" v-model="form.contactName" :type="'text'">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </InputGroup>
                    <InputError class="mt-1" :message="form.errors.contactName"></InputError>

                    <InputGroup :text="'Nota'" :required="'required'" v-model="form.notes" :type="'text'">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>

                    </InputGroup>
                    <InputError class="mt-1" :message="form.errors.notes"></InputError>

                    <InputGroup :text="'Sub Total'" :required="'required'" v-model="form.subtotal" :type="'text'">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                        </svg>
                    </InputGroup>
                    <InputError class="mt-1" :message="form.errors.subtotal"></InputError>

                    <InputGroup :text="'Total'" :required="'required'" v-model="form.total" :type="'text'">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                        </svg>

                    </InputGroup>
                    <InputError class="mt-1" :message="form.errors.total"></InputError>

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
                    Seguro desea elimiar la factura
                    <span class="text-2xl font-medium text-gray-900">{{v.contactName}} </span>? </p>
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


