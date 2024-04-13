<template>
    <AppLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="text-white/60 bg-gray-700 overflow-hidden shadow-xl sm:rounded-lg"
                >
                    <OrderForm></OrderForm>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import OrderForm from "./Partials/Form/index.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { provide } from "vue";
const props = defineProps({
    delivery_methods: Array,
    customer: Object,
});

provide("delivery_methods", props.delivery_methods);
provide("customer", props.customer);
</script>

<style lang="scss" scoped></style>
