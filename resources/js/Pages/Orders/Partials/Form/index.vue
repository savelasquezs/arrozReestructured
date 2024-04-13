<template>
    <!-- delivery_method -->

    <form class="max-w-sm mx-auto">
        <h1>{{ delivery_method_selected }}</h1>
        <div class="mb-5">
            <Dropdown :options="delivery_methods" title="Metodo de entrega" />

            <!-- Customer -->

            <TextInput
                v-model="customer.name"
                type="text"
                title="Holis, ingresa un texto"
            />

            <TextInput
                v-model="numero"
                title="Holis, ingresa un numero"
                type="number"
            />
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

const holis = ref("");
const delivery_method_selected = ref();
const delivery_methods = inject("delivery_methods");
const customer = inject("customer");
</script>

<style lang="scss" scoped></style>
