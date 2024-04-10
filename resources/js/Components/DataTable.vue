<template>
    <div class="bg-white relative border rounded-lg">
        <table class="w-full text-sm text-left text-grat-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th class="px-4 py-3">Pedido #</th>
                    <th class="px-4 py-3">Productos</th>
                    <th class="px-4 py-3">Total</th>
                    <th class="px-4 py-3">Pago</th>
                    <th class="px-4 py-3">Tipo Entrega</th>
                    <th class="px-4 py-3">Domiciliario</th>
                    <th class="px-4 py-3">Cobrar</th>
                    <th class="px-4 py-3">Cliente</th>
                    <th class="px-4 py-3">Dirección</th>
                    <th class="px-4 py-3">Regalo</th>
                    <th class="px-4 py-3">Notas</th>
                    <th class="px-4 py-3">Fecha</th>
                    <th class="px-4 py-3">Hora</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="order in orders" :key="order.id" class="border-b">
                    <td class="px-4 py-3 font-medium text-gray-900">
                        {{ order.id }}
                    </td>
                    <td class="px-4 py-3 font-medium text-gray-900">
                        {{ products(order.order_items) }}
                    </td>
                    <td class="px-4 py-3 font-medium text-gray-900"></td>
                    <td class="px-4 py-3 font-medium text-gray-900"></td>
                    <td class="px-4 py-3 font-medium text-gray-900"></td>
                    <td class="px-4 py-3 font-medium text-gray-900"></td>
                    <td class="px-4 py-3 font-medium text-gray-900"></td>
                    <td class="px-4 py-3 font-medium text-gray-900"></td>
                    <td class="px-4 py-3 font-medium text-gray-900"></td>
                    <td class="px-4 py-3 font-medium text-gray-900"></td>
                    <td class="px-4 py-3 font-medium text-gray-900"></td>
                    <td class="px-4 py-3 font-medium text-gray-900"></td>
                    <td class="px-4 py-3 font-medium text-gray-900"></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
const props = defineProps({ orders: Array });
const products = (orderItems) => {
    let allProducts = "";
    orderItems.forEach((orderItem) => {
        allProducts += ` ${orderItem.quantity} ${orderItem.product.name} ${orderItem.product.product_size.name} /`;
    });
    if (allProducts.length > 50) {
        return allProducts.slice(0, 50) + "...";
    } else if (orderItems.length == 1) {
        allProducts = allProducts.replace("/", "");
    }
    return allProducts.slice(0, allProducts.length - 1);
};
</script>

<style lang="scss" scoped></style>
