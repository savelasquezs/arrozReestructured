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
                v-model="customer.address"
                title="Direcciónes del cliente"
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
import { ref, inject, computed } from "vue";
import Dropdown from "@/Components/Dropdown.vue";
import TextInput from "@/Components/TextInput.vue";
import { useForm } from "@inertiajs/vue3";
import SearchCustomersInput from "./SearchCustomerInput.vue";
defineProps({ customers: Array });

const customerSelected = ref();

const customer = useForm({
    name: null,
    address: null,
    remember: false,
});

function setCustomer(cust) {
    customerSelected.value = cust;
    customer.address = null;
}

const delivery_method_selected = ref();
const delivery_methods = inject("delivery_methods");

function setDeliveryMethod(id) {
    delivery_method_selected.value = id;
    console.log(id);
}
</script>

<style lang="scss" scoped></style>
