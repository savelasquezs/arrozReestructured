<template>
    <div class="bg-slate-700 relative p-2 rounded-lg">
        <div class="flex items-center justify-between">
            <!-- SearchBar -->

            <SearchForm @searchMade="handleSearchFilter" />
            <div
                class="flex items-center justify-between text-sm font-semibold"
            >
                <DatePicker @dateRangeSelected="handleFilterDate" />
                <!-- Radio buttons -->
                <label
                    class="flex mr-4 items-center flex-nowrap"
                    v-for="delivery_method in deliveryMethodsFilter"
                    :key="delivery_method"
                >
                    <input
                        type="radio"
                        v-model="delivery_method_filter"
                        :value="delivery_method"
                    />
                    <span class="whitespace-nowrap ml-1">{{
                        delivery_method
                    }}</span>
                </label>
                <label class="flex mr-4 items-center flex-nowrap">
                    <input
                        type="radio"
                        v-model="delivery_method_filter"
                        value=""
                    />
                    <span class="whitespace-nowrap ml-1">Todo</span>
                </label>
                <!-- List of filter for statuses -->

                <select name="" id="" v-model="delivery_person_filter">
                    <option value="">Domiciliario...</option>
                    <option
                        v-for="deliveryPerson in deliveryPeopleFilter"
                        :value="deliveryPerson"
                    >
                        {{ deliveryPerson }}
                    </option>
                </select>
            </div>
        </div>
        <table class="w-full text-sm text-left text-white/60">
            <thead class="text-xs text-white uppercase bg-slate-800">
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
                <tr
                    v-for="order in filteredData"
                    :key="order.id"
                    class="border-b"
                >
                    <td class="px-4 py-3 font-medium text-white/80">
                        {{ order.id }}
                    </td>
                    <td class="px-4 py-3 font-medium text-white/80">
                        {{ products(order.order_items) }}
                    </td>
                    <td class="px-4 py-3 font-medium text-white/80">
                        {{ currencyFormat(order.total) }}
                    </td>
                    <td class="px-4 py-3 font-medium text-white/80"></td>
                    <td class="px-4 py-3 font-medium text-white/80">
                        {{ order.delivery_method }}
                    </td>
                    <td class="px-4 py-3 font-medium text-white/80">
                        {{ order.delivery_person.name }}
                    </td>
                    <td class="px-4 py-3 font-medium text-white/80">
                        {{ currencyFormat(order.amount_to_collect) }}
                    </td>
                    <td class="px-4 py-3 font-medium text-white/80">
                        {{ order.customer.name }}
                    </td>
                    <td class="px-4 py-3 font-medium text-white/80">
                        {{ order.delivery_address }}
                    </td>
                    <td class="px-4 py-3 font-medium text-white/80">
                        {{ order.gift }}
                    </td>
                    <td class="px-4 py-3 font-medium text-white/80">
                        {{ order.description }}
                    </td>
                    <td class="px-4 py-3 font-medium text-white/80">
                        {{ new Date(order.created_at).toLocaleDateString() }}
                    </td>
                    <td class="px-4 py-3 font-medium text-white/80">
                        {{ new Date(order.created_at).toLocaleTimeString() }}
                    </td>
                    <td class="px-4 py-3 flex items-center justify-end">
                        <!-- <Link
                            as="button"
                            class="text-indigo-500 hover:underline"
                            >Details</Link
                        > -->
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { ref, computed } from "vue";
import SearchForm from "@/Components/SearchForm.vue";
import DatePicker from "@/Components/DatePicker.vue";
const props = defineProps({ orders: Array });

const filtro = ref("");
const delivery_person_filter = ref("");
const delivery_method_filter = ref("");
const date_filter = ref([]);

function handleFilterDate(dates) {
    if (Array.isArray(dates) && dates.length === 2 && dates[1] !== null) {
        const [start, end] = dates;
        date_filter.value = [start, end];
    } else {
        date_filter.value = [];
    }
}

function handleSearchFilter(value) {
    filtro.value = value;
}

const filteredData = computed(() => {
    let toReturn = props.orders;
    if (filtro.value !== "") {
        toReturn = toReturn.filter(
            (order) =>
                order.id == filtro.value ||
                order.delivery_address
                    .toLowerCase()
                    .includes(filtro.value.toLowerCase()) ||
                order.customer.name
                    .toLowerCase()
                    .includes(filtro.value.toLowerCase())
        );
    }
    if (delivery_person_filter.value !== "") {
        toReturn = toReturn.filter(
            (order) =>
                order.delivery_person.name == delivery_person_filter.value
        );
    }
    if (delivery_method_filter.value !== "") {
        toReturn = toReturn.filter(
            (order) => order.delivery_method == delivery_method_filter.value
        );
    }
    if (date_filter.value.length == 2) {
        toReturn = toReturn.filter((order) => {
            return (
                new Date(order.createdAt) >= date_filter.value[0] &&
                new Date(order.createdAt) <= date_filter.value[1]
            );
        });
    }
    return toReturn;
});

const deliveryPeopleFilter = computed(() =>
    props.orders.reduce((acc, curr) => {
        if (!acc.includes(curr.delivery_person.name))
            acc.push(curr.delivery_person.name);
        return acc;
    }, [])
);

const deliveryMethodsFilter = computed(() =>
    props.orders.reduce((acc, curr) => {
        if (!acc.includes(curr.delivery_method)) acc.push(curr.delivery_method);
        return acc;
    }, [])
);

const products = (orderItems) => {
    let allProducts = "";
    orderItems.forEach((orderItem) => {
        allProducts += ` ${orderItem.quantity} ${orderItem.product} /`;
    });
    if (allProducts.length > 50) {
        return allProducts.slice(0, 50) + "...";
    } else if (orderItems.length == 1) {
        allProducts = allProducts.replace("/", "");
    }
    return allProducts.slice(0, allProducts.length - 1);
};

function currencyFormat(number) {
    return new Intl.NumberFormat("es-CO", {
        style: "currency",
        currency: "COP",
        maximumFractionDigits: 0,
    }).format(number);
}
</script>

<style lang="scss" scoped></style>
