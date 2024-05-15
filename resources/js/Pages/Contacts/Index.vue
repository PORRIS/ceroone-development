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
import { Head, useForm } from '@inertiajs/vue3';
import {ref} from  'vue';

const columnsContact = [
    { name: 'id', title:'id',searchable: false, orderable: false, visible: false },
    { name: 'name', title:'NOMBRE', searchable: true, orderable: false, visible: true  },
    { name: 'email', title:'CORREO',  searchable: true, orderable: false, visible: true   },
    { name: 'id', title:'',searchable: false, orderable: false, visible: true },
    { name: 'id', title:'',searchable: false, orderable: false, visible: true },
    { name: 'id', title:'',searchable: false, orderable: false, visible: true },
    { name: 'clientRecord', title:'',  searchable: false, orderable: false, visible: false   },
    { name: 'billAddress', title:'',  searchable: false, orderable: false, visible: false   },

];



const v = ref({id:'',name:'',email:'',clientRecord:[],billCountryCode:'',billAddres:[]});

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

const showModalContactView = ref(false);
const showModalContactForm = ref(false);
const showModalContactDelete = ref(false);

const title = ref('');
const operation = ref(1);
const message = ref('');
const msj = ref('');
const classmessage = ref('hidden');

const openModalContactView = (contact) => {
    v.value.id = contact[0];
    v.value.name = contact[1];
    v.value.email = contact[2];
    v.value.clientRecord =  contact[6];
    v.value.billAddres =  contact[7];

    showModalContactView.value = true;
}
const openModalContactDelete = (contact) => {
    showModalContactDelete.value = true;
    v.value.id = contact[0];
    v.value.name =  contact[2];
}
const openModalContactForm = (option,contact) => {
    showModalContactForm.value = true;
    operation.value = option;
    if(option === 1){
        title.value = 'Crear Contacto';
    }else{
        title.value = 'Editar Contacto';
        form.name =  contact[1];
        form.email =   contact[2];
        form.billCountryCode = contact[6];
        v.value.id = contact[0];
    }
}

const closeModalContactView = () => {
    showModalContactView.value = false;
}
const closeModalContactDelete = () => {
    showModalContactDelete.value = false;
}
const closeModalContactForm = () => {
    showModalContactForm.value = false;
    form.reset();
}

const transformContactData = (string) => {
        let json = JSON.parse(string);
        let res = {};
        for (let key in json) {
            res[namesContact[key]] = json[key];
        }
        return res;
}

const saveContact = ()=>{
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
    closeModalContactForm();
    closeModalContactDelete();
    reloadTable();
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
let dt1;
const inputtable2 = ref()
const reloadTable = ()=>{
    dt1 = inputtable2.value.dt;
    dt1.ajax.url('/datatable/contacts').load();

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
const boxes = document.getElementsByTagName("div");
boxes[0].classList.remove("dt-input");
</script>

<template>
	<Head title="Contactos" />

	<MainLayout>
		<template #header>
			Contactos
            <DarkButton @click="openModalContactForm(1)">
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
                    <DataTable :columns="columnsContact"    :options="options"  class="display nowrap"
                               ajax="/datatable/contacts" ref="inputtable2"  id="datatable1">

                        <template #column-3="props">
                            <SecondaryButton @click="openModalContactView(props.rowData)">Ver</SecondaryButton>
                        </template>
                        <template #column-4="props">
                            <WarningButton  @click="openModalContactForm(2,props.rowData)">Editar</WarningButton>
                        </template>
                        <template #column-5="props">
                            <DangerButton @click="openModalContactDelete(props.rowData)">Eliminar</DangerButton>
                        </template>

                    </DataTable>

				</div>
			</div>
		</div>

        <modal :show="showModalContactView" @close="closeModalContactView" >
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
                                Registro del cliente:
                            </p>
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                <ol>
                                    <li class="text-lg font-medium text-gray-900" v-for="(e,k) in transformContactData(v.clientRecord)">
                                        {{(k)+': '+e}}
                                    </li>
                                </ol>
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center bg-white rounded-lg shadow-xs ">
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                Direccion:
                            </p>
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                <ol>
                                    <li class="text-lg font-medium text-gray-900" v-for="(e,k) in transformContactData(v.billAddres)">
                                        {{(k)+': '+e}}
                                    </li>
                                </ol>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="m-6 flex justify-end">
                <SecondaryButton @click="closeModalContactView">Cancelar</SecondaryButton>
            </div>
        </modal>

        <modal :show="showModalContactForm" @close="closeModalContactForm">
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


                    <PrimaryButton @click="saveContact">Guardar</PrimaryButton>
                </div>

            </div>
            <div class="m-6 flex justify-end">
                <SecondaryButton @click="closeModalContactForm">Cancelar</SecondaryButton>
            </div>
        </modal>

        <modal :show="showModalContactDelete" @close="closeModalContactDelete">
            <div class="p-6">
                <p class="text-2xl text-gray-500">
                    Seguro desea elimiar el contacto
                    <span class="text-2xl font-medium text-gray-900">{{v.name}} </span>? </p>
                <PrimaryButton @click="deleteContact">Si, Eliminar</PrimaryButton>
            </div>
            <div class="m-6 flex justify-end">
                <SecondaryButton @click="closeModalContactDelete">Cancelar</SecondaryButton>
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
