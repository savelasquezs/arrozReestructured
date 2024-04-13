<template>
    <SearchInput
        v-model="query"
        class="w-full relative"
        title="Busca cliente por tenefono, dirección o nombre "
    >
        <div
            v-if="customers && customersShown"
            id="dropdown"
            class="z-10 divide-y divide-gray-100 rounded-lg shadow w-full bg-slate-900 absolute"
        >
            <ul
                class="py-2 text-sm text-gray-700 dark:text-gray-200"
                aria-labelledby="dropdownDefaultButton"
            >
                <li
                    v-if="customers.length > 0"
                    v-for="customer in customers"
                    @click="selectOption(customer)"
                >
                    <p
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                    >
                        {{ customer.name }} --
                        {{ customer.addresses[0]?.address || "" }}--{{
                            customer.addresses[1]?.address || ""
                        }}--{{ customer.phones[1]?.number || "" }}--{{
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
</template>

<script setup>
import SearchInput from "@/Components/SearchInput.vue";
import { router } from "@inertiajs/vue3";
import { ref, watch } from "vue";

const query = ref();

defineProps({ customers: Array });

const emit = defineEmits(["customerSelected"]);

const customersShown = ref(false);
const customerSelected = ref();

watch(query, () => {
    if (query.value == customerSelected.value?.name) {
        return;
    }
    router.get(
        "/ventas/create",
        { q: query.value },
        { preserveState: true, preserveScroll: true }
    );
    customersShown.value = true;
});

function selectOption(customer) {
    emit("customerSelected", customer);
    customerSelected.value = customer;
    query.value = customer.name;
    customersShown.value = false;
}
</script>

<style lang="scss" scoped></style>
