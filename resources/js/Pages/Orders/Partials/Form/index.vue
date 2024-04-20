<template>
    <!-- delivery_method -->

    <form class="min-w-2xl mx-auto min-h-96 relative" @submit.prevent="">
        <div class="absolute right-1 top-1 text-xs">
            {{ delivery_method_selected }}
        </div>
        <div class="mb-5">
            <button
                class="text-xs bg-slate-900 rounded-md text-white/60 hover:text-white p-2 m-1"
                v-if="delivery_method_selected"
                @click="changeDeliverymethod"
            >
                Cambiar tipo Entrega
            </button>
            <button
                @click="searchingCustomer = true"
                v-if="!searchingCustomer"
                class="text-xs bg-slate-900 rounded-md text-white/60 p-2 m-1 hover:text-white"
            >
                Cambiar Cliente
            </button>
            <Dropdown
                v-if="!delivery_method_selected"
                :options="delivery_methods"
                title="Metodo de entrega"
                v-model="delivery_method_selected"
            />

            <!-- Customer -->

            <div v-if="delivery_method_selected == 'Delivery'">
                <div class="flex justify-start items-center">
                    <SearchCustomersInput
                        v-if="searchingCustomer"
                        :customers="customers"
                        @customerSelected="setCustomer"
                    />
                    <CustomerForm
                        :neighborhoods="neighborhoods"
                        @customerSaved="handleCustomer"
                    />
                </div>
            </div>

            <div class="flex gap-2 items-center justify-between">
                <TextInput v-model="customer.name" type="text" title="Nombre" />

                <div class="text-xs" v-if="addressSelected">
                    <p>Barrio:</p>
                    <p class="text-white">{{ neighborhood_selected }}</p>
                </div>
                <TextInput
                    v-if="addressSelected"
                    v-model="customer.shipping_value"
                    type="number"
                    title="Valor domi"
                    disabled
                />
            </div>
            <div v-if="customerSelected">
                <div class="flex gap-2 items-center">
                    <Dropdown
                        v-if="customerSelected"
                        :options="customerSelected.addresses"
                        title="Direccion de entrega"
                        v-model="addressSelected"
                    />
                    <AddressForm
                        :neighborhoods="neighborhoods"
                        :customerId="customerSelected.id"
                        @addressSaved="handleAddressSaved"
                        :addressToEdit="adddressWithNeigh"
                        @addressEdited="replaceAddressFromForm"
                    />
                </div>
            </div>
        </div>

        <button
            type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        >
            Submit
        </button>
    </form>
</template>

<script setup>
import { ref, inject, computed, watch } from "vue";
import Dropdown from "@/Components/Dropdown.vue";
import TextInput from "@/Components/TextInput.vue";
import { useForm } from "@inertiajs/vue3";
import SearchCustomersInput from "./SearchCustomerInput.vue";
import AddressForm from "@/Components/Address/AddressForm.vue";
import CustomerForm from "@/Components/Customer/CustomerForm.vue";

const searchingCustomer = ref(true);
const props = defineProps({ customers: Array, neighborhoods: Array });

const customerSelected = ref();
const addressSelected = ref();
const neighborhood_selected = ref();
const idAddressSelected = ref();

const adddressWithNeigh = computed(
    () =>
        `${addressSelected.value}/${neighborhood_selected.value}/${customer.shipping_value}/${idAddressSelected.value}`
);

const customer = useForm({
    name: null,
    delivery_address: null,
    neighborhood: null,
    shipping_value: null,
});

function setCustomer(cust) {
    customerSelected.value = cust;
    searchingCustomer.value = false;
    customer.delivery_address = null;
    customer.name = cust.name;
    addressSelected.value = cust.addresses[0].address;
}

function handleAddressSaved(address) {
    addressSelected.value = address;
    customerSelected.value = props.customers.find(
        (customer) => (customer.id = customerSelected.value.id)
    );
}

function handleCustomer(customerName) {
    setTimeout(() => {
        const customerToFind = props.customers.find(
            (customer) =>
                customer.name.toLowerCase() == customerName.toLowerCase()
        );
        console.log(customerToFind);
        setCustomer(customerToFind);
        addressSelected.value = customerToFind.addresses[0].address;
    }, 1000);
}

const delivery_method_selected = ref();
const delivery_methods = inject("delivery_methods");

function replaceValues(value) {
    console.log(customerSelected.value.addresses);
    const address = customerSelected.value.addresses.find(
        (ad) => ad.address == value
    );
    console.log(address);
    idAddressSelected.value = address.id;

    customer.delivery_address = value;
    const completeNeighboorhood = props.neighborhoods.find(
        (n) => n.id == address.neighborhood_id
    );
    neighborhood_selected.value = completeNeighboorhood.name;
    console.log(neighborhood_selected.value);

    customer.neighborhood = completeNeighboorhood.name;
    customer.shipping_value = address.shipping_value;
}

function replaceAddressFromForm(form) {
    console.log(form);
    const address = customerSelected.value.addresses.find(
        (ad) => ad.address == addressSelected.value
    );

    addressSelected.value = address.address = form.address;
    setTimeout(() => {
        const neighborhoodName = props.neighborhoods.find(
            (n) => n.id == form.neighborhood_id
        ).name;

        neighborhood_selected.value = neighborhoodName;
        setTimeout(() => {
            customer.shipping_value = form.shipping_value;
        }, 200);
    }, 200);
    idAddressSelected.value = address.id;
}

watch(addressSelected, (value) => {
    if (addressSelected.value) {
        replaceValues(value);
    }
});

function changeDeliverymethod() {
    if (delivery_method_selected.value == "Delivery") {
        delivery_method_selected.value = "ToTake";

        customerSelected.value = null;
        addressSelected.value = null;
        neighborhood_selected.value = null;
    } else {
        delivery_method_selected.value = "Delivery";
    }
}
</script>

<style lang="scss" scoped></style>
