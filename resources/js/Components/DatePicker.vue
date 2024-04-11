<template>
    <VueDatePicker
        v-model="date"
        range
        :preset-dates="presetDates"
        clearable
        :enable-time-picker="false"
        locale="es"
        cancelText="Cancelar"
        selectText="Seleccionar"
        dark
        :preview-format="format"
        :format="format"
        @update:model-value="$emit('dateRangeSelected', date)"
    >
        <template #preset-date-range-button="{ label, value, presetDate }">
            <span
                role="button"
                :tabindex="0"
                @click="presetDate(value)"
                @keyup.enter.prevent="presetDate(value)"
                @keyup.space.prevent="presetDate(value)"
            >
                {{ label }}
            </span>
        </template>
    </VueDatePicker>
</template>

<script setup>
import {
    startOfMonth,
    startOfWeek,
    endOfWeek,
    endOfMonth,
    startOfYear,
    endOfYear,
    subMonths,
    addDays,
    startOfToday,
    subDays,
} from "date-fns";
import { onMounted, ref } from "vue";
import VueDatePicker from "@vuepic/vue-datepicker";
import "@vuepic/vue-datepicker/dist/main.css";
const date = ref();

onMounted(() => {
    const startDate = new Date();
    const endDate = addDays(new Date(), 1);
    date.value = [startDate, endDate];
});

const format = (date) => {
    const dayS = date[0].getDate();
    const monthS = date[0].getMonth() + 1;
    const yearS = date[0].getFullYear();
    if (date.length === 1) {
        return ` ${dayS}/${monthS}/${yearS}`;
    }

    const dayF = date[1].getDate();
    const monthF = date[1].getMonth() + 1;
    const yearF = date[1].getFullYear();

    return ` ${dayS}/${monthS}/${yearS}-${dayF}/${monthF}/${yearF}`;
};

// Obtiene la fecha actual y el inicio del mes actual
const currentDate = new Date();
const startOfMonthDate = startOfMonth(currentDate);

// Calcula el inicio y el fin de los períodos de pago actual y anterior
const currentPayPeriodStart =
    startOfMonthDate.getDate() < 15
        ? startOfMonthDate
        : addDays(startOfMonthDate, 14);
const currentPayPeriodEnd = addDays(currentPayPeriodStart, 14);
const previousPayPeriodStart = subMonths(currentPayPeriodStart, 1);
const previousPayPeriodEnd = addDays(currentPayPeriodStart, -1);

const startOfThisWeek = startOfWeek(currentDate);

// Calcula el inicio y el fin de la semana pasada
const startOfLastWeekDate = subDays(startOfThisWeek, 7);
const endOfLastWeekDate = addDays(startOfLastWeekDate, 6);

// Calcula el inicio y el fin del fin de semana actual
const startOfThisWeekend = startOfWeek(currentDate, { weekStartsOn: 5 }); // 5 es Viernes
const endOfThisWeekend = addDays(startOfThisWeekend, 2); // Añade 2 días para llegar a domingo

// Calcula el inicio y el fin del fin de semana pasado
const startOfLastWeekend = startOfWeek(startOfLastWeekDate, {
    weekStartsOn: 5,
}); // 5 es Viernes
const endOfLastWeekend = addDays(startOfLastWeekend, 2); // Añade 2 días para llegar a domingo

// Define el array de fechas predefinidas, incluyendo los períodos de pago actual y anterior
const presetDates = ref([
    { label: "Hoy", value: [startOfToday(), startOfToday()] },
    { label: "This week", value: [startOfThisWeek, endOfWeek(currentDate)] },
    { label: "Last week", value: [startOfLastWeekDate, endOfLastWeekDate] },
    { label: "Current Weekend", value: [startOfThisWeekend, endOfThisWeekend] },
    { label: "Last Weekend", value: [startOfLastWeekend, endOfLastWeekend] },
    {
        label: "Esta quincena",
        value: [currentPayPeriodStart, currentPayPeriodEnd],
    },
    {
        label: "Quincena pasada",
        value: [previousPayPeriodStart, previousPayPeriodEnd],
    },

    { label: "Este mes", value: [startOfMonthDate, endOfMonth(currentDate)] },
    {
        label: "Mes pasado",
        value: [
            startOfMonth(subMonths(currentDate, 1)),
            endOfMonth(subMonths(currentDate, 1)),
        ],
    },
    {
        label: "Este año",
        value: [startOfYear(currentDate), endOfYear(currentDate)],
    },
]);
</script>
