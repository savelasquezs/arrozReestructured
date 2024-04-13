<template>
    <AppLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 min-h-max">
                <div
                    class="text-white/60 bg-gray-700 overflow-hidden shadow-xl sm:rounded-lg"
                >
                    <OrderForm :customers="customers"></OrderForm>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import OrderForm from "./Partials/Form/index.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { watch } from "vue";
import { provide } from "vue";
const props = defineProps({
    delivery_methods: Array,
    customer: Object,
    customers: Array,
});

provide("delivery_methods", props.delivery_methods);
</script>

<style lang="scss" scoped></style>
