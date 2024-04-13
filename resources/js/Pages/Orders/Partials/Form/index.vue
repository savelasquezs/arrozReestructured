<template>
    <!-- delivery_method -->

    <form class="max-w-5xl mx-auto" @submit.prevent="">
        <div class="mb-5">
            <Dropdown
                :options="delivery_methods"
                title="Metodo de entrega"
                @selectedId="setDeliveryMethod"
            />

            <!-- Customer -->

            <div v-if="delivery_method_selected == '2'">
                <div class="flex justify-start items-center">
                    <SearchInput
                        class="w-full relative"
                        title="Busca cliente por tenefono, dirección o nombre "
                    >
                        <div
                            v-if="customers"
                            id="dropdown"
                            class="z-10 divide-y divide-gray-100 rounded-lg shadow w-full bg-slate-900 absolute"
                        >
                            <ul
                                class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDefaultButton"
                            >
                                <li
                                    v-if="customers"
                                    v-for="customer in customers"
                                    @click="selectOption(customer)"
                                >
                                    <p
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                    >
                                        {{ customer.name }} --
                                        {{ customer.addresses[0].address }}--{{
                                            customer.addresses[1]?.address ||
                                            ""
                                        }}--{{ customer.phones[1].number }}--{{
                                            customer.phones[2]?.number || ""
                                        }}
                                    </p>
                                </li>
                                <li v-else @click="showCustomers = false">
                                    <p
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                    >
                                        No tenemos opciones para mostrar
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </SearchInput>
                </div>
            </div>
            <!-- <TextInput
                v-model="customer.name"
                type="text"
                title="Holis, ingresa un texto"
            />

            <TextInput
                v-model="customer.address"
                title="Holis, ingresa un numero"
                type="number"
            /> -->
            {{ holis }}
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
import SearchInput from "@/Components/SearchInput.vue";

defineProps({ customers: Array });

const customer = useForm({
    name: null,
    address: null,
    remember: false,
});

const holis = ref("");
const delivery_method_selected = ref();
const delivery_methods = inject("delivery_methods");

function setDeliveryMethod(id) {
    delivery_method_selected.value = id;
    console.log(id);
}
</script>

<style lang="scss" scoped></style>
