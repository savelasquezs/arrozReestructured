<template>
    <!-- delivery_method -->

    <form class="max-w-5xl mx-auto" @submit.prevent="">
        <div class="mb-5">
            <Dropdown
                :options="delivery_methods"
                title="Metodo de entrega"
                v-model="delivery_method_selected"
            />

            <!-- Customer -->

            <div v-if="delivery_method_selected == 'Delivery'">
                <div class="flex justify-start items-center">
                    <SearchCustomersInput
                        :customers="customers"
                        @customerSelected="setCustomer"
                    />
                </div>
            </div>
            <TextInput
                v-model="customer.name"
                type="text"
                title="Holis, ingresa un texto"
            />
            <Dropdown
                v-if="customerSelected"
                :options="customerSelected.addresses"
                title="Direccion de entrega"
                v-model="addressSelected"
            />
            <TextInput
                v-model="customer.delivery_address"
                type="text"
                title="Dirección de entrega"
            />
            <NeighborhoodForm
                v-model="neighborhood_selected"
                :neighborhoods="neighborhoods"
            />
            <TextInput
                v-model="customer.shipping_value"
                type="number"
                title="Valor domi"
            />
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
import { useForm, useRemember } from "@inertiajs/vue3";
import SearchCustomersInput from "./SearchCustomerInput.vue";
import NeighborhoodForm from "@/Components/Neighborhood/NeighborhoodForm.vue";

const props = defineProps({ customers: Array, neighborhoods: Array });

const customerSelected = ref();
const addressSelected = ref();
const neighborhood_selected = ref();

const customer = useForm({
    name: null,
    delivery_address: null,
    neighborhood: null,
    shipping_value: null,
});

function setCustomer(cust) {
    customerSelected.value = cust;
    customer.delivery_address = null;
    customer.name = cust.name;
}

const delivery_method_selected = ref();
const delivery_methods = inject("delivery_methods");

watch(addressSelected, (value) => {
    console.log(value);
    const address = customerSelected.value.addresses.find(
        (ad) => ad.address == value
    );
    customer.delivery_address = value;
    const completeNeighboorhood = props.neighborhoods.find(
        (n) => n.id == address.neighborhood_id
    );
    neighborhood_selected.value = completeNeighboorhood.name;
    console.log(address);
    customer.neighborhood = completeNeighboorhood.name;
    customer.shipping_value = address.shipping_value;
});
</script>

<style lang="scss" scoped></style>
