<template>
    <div class="min-w-96 p-3 bg-slate-700">
        <div class="flex gap-2 mb-5">
            <div v-for="orderId in ordersCount">
                <input
                    :id="'order_' + orderId"
                    type="radio"
                    :value="orderId"
                    v-model="currentOrder"
                    class="hidden"
                />
                <label
                    :for="'order_' + orderId"
                    class="bg-slate-800 p-2 text-white/60 rounded-t-md"
                    >Facturero {{ orderId }}</label
                >
            </div>
        </div>
        <OrderForm
            v-for="orderId in ordersCount"
            :class="currentOrder == orderId ? '' : 'hidden'"
            :customers="customers"
            :neighborhoods="neighborhoods"
        ></OrderForm>
    </div>
    <!--Tabs navigation-->

    <!--Tabs content-->
</template>

<script setup>
import { ref } from "vue";
import OrderForm from "@/Pages/Orders/Partials/Form/index.vue";
const currentOrder = ref();
const props = defineProps({
    customers: Array,
    neighborhoods: Array,
    ordersCount: Number,
});
</script>

<style scoped>
input[type="radio"]:checked + label {
    border-bottom: 1px solid #2563eb;
    font-weight: bold;
    color: white; /* Cambia el color del texto cuando está seleccionado */
}
</style>
